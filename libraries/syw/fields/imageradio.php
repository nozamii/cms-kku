<?php
/**
 * @copyright	Copyright (C) 2011 Simplify Your Web, Inc. All rights reserved.
 * @license		GNU General Public License version 3 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die ;

jimport('joomla.form.formfield');

class JFormFieldImageRadio extends JFormField
{
	public $type = 'ImageRadio';

	protected $use_global;
	protected $image_height;

	protected function getInput()
	{
		// Initialize variables.
		$html = array();

		// Initialize some field attributes.
		$class_attribute = !empty($this->class) ? ' class="radio ' . $this->class . '"' : ' class="radio"';
		$required  = $this->required ? ' required aria-required="true"' : '';
		$autofocus = $this->autofocus ? ' autofocus' : '';
		$disabled  = $this->disabled ? ' disabled' : '';
		$readonly  = $this->readonly;

		// Start the radio field output.
		$html[] = '<fieldset id="' . $this->id . '"' . $class_attribute . $required . $autofocus . $disabled . '>';

		// Get the field options.
		$options = $this->getOptions();

		JHtml::_('stylesheet', 'syw/fonts-min.css', false, true);
		JHtml::_('bootstrap.tooltip');

		// Build the radio field output.
		foreach ($options as $i => $option) {

			// Initialize some option attributes.
			$checked = ((string) $option->value == (string) $this->value) ? ' checked="checked"' : '';
			$class_attribute = !empty($option->class) ? ' class="' . $option->class . '"' : '';
			$class = !empty($option->class) ? ' ' . $option->class : '';

			$disabled = !empty($option->disable) || ($readonly && !$checked);

			$disabled = $disabled ? ' disabled' : '';

			// Initialize some JavaScript option attributes.
			$onclick = !empty($option->onclick) ? ' onclick="' . $option->onclick . '"' : '';
			$onchange = !empty($option->onchange) ? ' onchange="' . $option->onchange . '"' : '';

			$html[] = '<input type="radio" id="' . $this->id . $i . '" name="' . $this->name . '" value="'
				. htmlspecialchars($option->value, ENT_COMPAT, 'UTF-8') . '"' . $checked . $class_attribute . $required . $onclick
				. $onchange . $disabled . ' />';

			$title =  JText::alt($option->text, preg_replace('/[^a-zA-Z0-9_\-]/', '_', $this->fieldname));

			$style = '';
			if ($this->image_height > 0) {
				$style = ' style="height: ' . $this->image_height . 'px; line-height: ' . $this->image_height . 'px"';
			}

			$html[] = '<label title="'. $title .'" for="' . $this->id . $i . '" class="hasTooltip'.$class.'"' . $style . '>';
			if ($option->image) {
				$html[] = '<img style="margin: 0" src="'.JURI::root().$option->image.'" alt="'. $title .'" />';
			} else if ($option->icon) {
				$html[] = '<i class="'.$option->icon.'"></i>&nbsp;'.$title;
			} else {
				$html[] = $title;
			}
			$html[] = '</label>';

			$required = '';
		}

		$html[] = '</fieldset>';

		return implode($html);
	}

	protected function getOptions()
	{
		$options = array();

		$global_value = '';

		if ($this->use_global) {

			$image = '';
			$icon = '';

			$component  = JFactory::getApplication()->input->getCmd('option');
			if ($component == 'com_menus') { // we are in the context of a menu item
				$uri = new JUri($this->form->getData()->get('link'));
				$component = $uri->getVar('option', 'com_menus');
			}

			$params = JComponentHelper::getParams($component);
			$value  = $params->get($this->fieldname);

			if (!is_null($value)) {
				$value = (string) $value;

				foreach ($this->element->xpath('option') as $option) {
					if (isset($option['value']) && (string) $option['value'] === $value) {

						if (isset($option['imagesrc'])) {
							$image = (string) $option['imagesrc'];
						}

						if (isset($option['icon'])) {
							$icon = (string) $option['icon'];
						}

						$global_value = JText::_((string) $option);

						break;
					}
				}
			}

			$tmp = JHtml::_('select.option', '', $global_value ? JText::sprintf('JGLOBAL_USE_GLOBAL_VALUE', $global_value) : JText::_('JGLOBAL_USE_GLOBAL'), 'value', 'text', false);

			$tmp->image = $image;
			$tmp->icon = $icon;

			$options[] = $tmp;
		}

		foreach ($this->element->children() as $option) {

			// Only add <option /> elements.
			if ($option->getName() != 'option') {
				continue;
			}

			$disabled = (string) $option['disabled'];
			$disabled = ($disabled == 'true' || $disabled == 'disabled' || $disabled == '1');

			// Create a new option object based on the <option /> element.
			$tmp = JHtml::_('select.option', (string) $option['value'], trim((string) $option), 'value', 'text', $disabled);

			// Set some option attributes.
			$tmp->class = (string) $option['class'];

			// Set some JavaScript option attributes.
			$tmp->onclick = (string) $option['onclick'];
			$tmp->onchange = (string) $option['onchange'];

			$tmp->image = '';
			if (isset($option['imagesrc'])) {
				$tmp->image = (string) $option['imagesrc'];

				// global value unknown (happens when global config has not yet been saved), take the biggest image height to ensure all radio fields have the same height
				if ($this->use_global && empty($global_value)) {
					$image_info = @getimagesize(JURI::root() . $tmp->image);
					if ($image_info[1] > $this->image_height) {
						$this->image_height = $image_info[1];
					}
				}
			}

			$tmp->icon = '';
			if (isset($option['icon'])) {
				$tmp->icon = (string) $option['icon'];
			}

			// Add the option object to the result set.
			$options[] = $tmp;
		}

		reset($options);

		return $options;
	}

	public function setup(SimpleXMLElement $element, $value, $group = null)
	{
		$return = parent::setup($element, $value, $group);

		if ($return) {
			$this->use_global = ((string)$this->element['global'] == "true" || (string)$this->element['useglobal'] == "true") ? true : false;
			$this->image_height = 0;
		}

		return $return;
	}
}
