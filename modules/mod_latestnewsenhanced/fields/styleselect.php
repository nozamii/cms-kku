<?php
/**
 * @copyright	Copyright (C) 2011 Simplify Your Web, Inc. All rights reserved.
 * @license		GNU General Public License version 3 or later; see LICENSE.txt
*/

defined( '_JEXEC' ) or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Form\FormHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Uri\Uri;

jimport('joomla.filesystem.folder');
jimport('joomla.filesystem.file');

FormHelper::loadFieldClass('dynamicsingleselect');

class JFormFieldStyleSelect extends JFormFieldDynamicSingleSelect
{
	public $type = 'StyleSelect';

	protected function getOptions()
	{
		$options = array();
		$options_disabled = array();

		$lang = Factory::getLanguage();

		$path = '/modules/mod_latestnewsenhanced/styles/overall';

		$optionsArray = \JFolder::folders(JPATH_SITE.$path);

		foreach ($optionsArray as $option) {

			$upper_option = strtoupper($option);

			//$lang->load('mod_latestnewsenhancedextended_style_overall_'.$option);

			$translated_option = Text::_('MOD_LATESTNEWSENHANCEDEXTENDED_STYLE_OVERALL_'.$upper_option.'_LABEL');

			$description = '';
			if (empty($translated_option) || substr_count($translated_option, 'LATESTNEWSENHANCEDEXTENDED') > 0) {
				$translated_option = ucfirst($option);
			} else {
				$description = Text::_('MOD_LATESTNEWSENHANCEDEXTENDED_STYLE_OVERALL_'.$upper_option.'_DESC');
				if (substr_count($description, 'LATESTNEWSENHANCEDEXTENDED') > 0) {
					$description = '';
				}
			}

			$image_hover = '';
			if (\JFile::exists(JPATH_ROOT.$path.'/'.$option.'/'.$option.'_hover.png')) {
				$image_hover = Uri::root(true).$path.'/'.$option.'/'.$option.'_hover.png';
			}

			if (\JFile::exists(JPATH_ROOT.$path.'/'.$option.'/style.css.php')) {
				$options[] = array($option, $translated_option, $description, Uri::root(true).$path.'/'.$option.'/'.$option.'.png', $image_hover);
			} else {
				$options_disabled[] = array($option, $translated_option . ' (Pro)', $description, Uri::root(true).$path.'/'.$option.'/'.$option.'.png', $image_hover, 'disabled', 'Pro');
			}
		}

		$options = array_merge($options, $options_disabled);

		return $options;
	}

	public function setup(\SimpleXMLElement $element, $value, $group = null)
	{
		$return = parent::setup($element, $value, $group);

		if ($return) {
			$this->width = 150;
			$this->height = 100;
		}

		return $return;
	}
}
?>