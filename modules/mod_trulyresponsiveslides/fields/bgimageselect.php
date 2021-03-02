<?php
/**
 * @copyright	Copyright (C) 2011 Simplify Your Web, Inc. All rights reserved.
 * @license		GNU General Public License version 3 or later; see LICENSE.txt
*/

defined( '_JEXEC' ) or die;

use Joomla\CMS\Component\ComponentHelper;
use Joomla\CMS\Form\FormHelper;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;

jimport('joomla.filesystem.folder');
\JLoader::register('SYWK2', JPATH_LIBRARIES.'/syw/k2.php');

FormHelper::loadFieldClass('list');

class JFormFieldBGImageSelect extends \JFormFieldList
{
	public $type = 'BGImageSelect';

	static $core_fields = null;
	static $k2_fields = null;

	static function getCoreFields($allowed_types = array())
	{
		if (!isset(self::$core_fields)) {
			\JLoader::register('FieldsHelper', JPATH_ADMINISTRATOR . '/components/com_fields/helpers/fields.php');
			$fields = FieldsHelper::getFields('com_content.article');

			self::$core_fields = array();

			if (!empty($fields)) {
				foreach ($fields as $field) {
					if (!empty($allowed_types) && !in_array($field->type, $allowed_types)) {
						continue;
					}
					self::$core_fields[] = $field;
				}
			}
		}

		return self::$core_fields;
	}

	static function getK2Fields($allowed_types = array())
	{
		if (!isset(self::$k2_fields)) {
			self::$k2_fields = SYWK2::getK2Fields($allowed_types);
		}

		return self::$k2_fields;
	}

	protected function getOptions()
	{
		$options = array();

		$k2extrafields = array();
		$customfields = array();

		if (SYWK2::exists()) {
			// get K2 extra fields
			$k2extrafields = self::getK2Fields(array('image'));
		}

		if (\JFolder::exists(JPATH_ADMINISTRATOR . '/components/com_fields') && ComponentHelper::isEnabled('com_fields') && ComponentHelper::getParams('com_content')->get('custom_fields_enable', '1')) {
			// get the custom fields
			$customfields = self::getCoreFields(array('media'));
		}

		//$options[] = HTMLHelper::_('select.option', 'default', Text::_('JDEFAULT'), 'value', 'text', $disable = false);

		$group_options = self::getFieldGroup('com_content', $customfields, 'media');
		$options = array_merge($options, $group_options);

		if (SYWK2::exists()) {
			$group_options = self::getFieldGroup('com_k2', $k2extrafields, 'image');
			$options = array_merge($options, $group_options);
		}

		// merge any additional options in the XML definition.
		$options = array_merge(parent::getOptions(), $options);

		return $options;
	}

	protected function getFieldGroup($option, $fields, $type)
	{
		$options = array();

		if (empty($fields)) {
			return $options;
		}

		if ($option == 'com_k2') {

			$fields_count = 0;
			foreach ($fields as $field) {

				if ($field->type != $type) {
					continue;
				}

				if ($fields_count == 0) {
					//$options[] = JHtml::_('select.optgroup', Text::_('MOD_TRULYRESPONSIVESLIDER_VALUE_K2EXTRAFIELDS'));
				}

				$options[] = HTMLHelper::_('select.option', 'k2field:'.$field->type.':'.$field->id, 'K2: '.$field->group_name.': '.$field->name . ' (Pro)', 'value', 'text', $disable = true);

				$fields_count++;
			}

			if ($fields_count > 0) {
				//$options[] = JHtml::_('select.optgroup', Text::_('MOD_TRULYRESPONSIVESLIDER_VALUE_K2EXTRAFIELDS'));
			}
		}

		if ($option == 'com_content') {

			// organize the fields according to their group

			$fieldsPerGroup = array(
				0 => array()
			);

			$groupTitles = array(
				0 => Text::_('MOD_TRULYRESPONSIVESLIDER_VALUE_NOGROUPFIELD')
			);

			$fields_exist = false;
			foreach ($fields as $field) {

				if ($field->type != $type) {
					continue;
				}

				if (!array_key_exists($field->group_id, $fieldsPerGroup)) {
					$fieldsPerGroup[$field->group_id] = array();
					$groupTitles[$field->group_id] = $field->group_title;
				}

				$fieldsPerGroup[$field->group_id][] = $field;
				$fields_exist = true;
			}

			// loop trough the groups

			if ($fields_exist) {
				//$options[] = JHtml::_('select.optgroup', Text::_('MOD_TRULYRESPONSIVESLIDER_VALUE_JOOMLAFIELDS'));

				foreach ($fieldsPerGroup as $group_id => $groupFields) {

					if (!$groupFields) {
						continue;
					}

					foreach ($groupFields as $field) {
						$options[] = HTMLHelper::_('select.option', 'jfield:'.$field->type.':'.$field->id, $groupTitles[$group_id].': '.$field->title . ' (Pro)', 'value', 'text', $disable = true);
					}
				}

				//$options[] = JHtml::_('select.optgroup', Text::_('MOD_TRULYRESPONSIVESLIDER_VALUE_JOOMLAFIELDS'));
			}
		}

		return $options;
	}
}
?>