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
use Joomla\CMS\Plugin\PluginHelper;

jimport('joomla.filesystem.folder');
\JLoader::register('SYWK2', JPATH_LIBRARIES.'/syw/k2.php');

FormHelper::loadFieldClass('list');

class JFormFieldHeadSelect extends \JFormFieldList
{
	public $type = 'HeadSelect';

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
			$k2extrafields = self::getK2Fields(array('date', 'image'));
		}

		if (\JFolder::exists(JPATH_ADMINISTRATOR . '/components/com_fields') && ComponentHelper::isEnabled('com_fields') && ComponentHelper::getParams('com_content')->get('custom_fields_enable', '1')) {

			$field_types = array('calendar', 'media');

			if (PluginHelper::isEnabled('fields', 'sywicon')) {
				$field_types[] = 'sywicon';
			}

			if (PluginHelper::isEnabled('fields', 'acfyoutube')) {
			    $field_types[] = 'acfyoutube';
			}

			// get the custom fields
			$customfields = self::getCoreFields($field_types);
		}

		// images

		$options[] = HTMLHelper::_('select.optgroup', Text::_('MOD_LATESTNEWSENHANCEDEXTENDED_VALUE_IMAGEGROUP'));

		$options[] = HTMLHelper::_('select.option', 'image', Text::_('MOD_LATESTNEWSENHANCEDEXTENDED_VALUE_IMAGE'), 'value', 'text', $disable = false);
		if (SYWK2::exists()) {
			$options[] = HTMLHelper::_('select.option', 'imageintro', Text::_('MOD_LATESTNEWSENHANCEDEXTENDED_VALUE_IMAGEINTRO_WITHK2'), 'value', 'text', $disable = false);
			$options[] = HTMLHelper::_('select.option', 'imagefull', Text::_('MOD_LATESTNEWSENHANCEDEXTENDED_VALUE_IMAGEFULL_WITHK2'), 'value', 'text', $disable = false);
			$options[] = HTMLHelper::_('select.option', 'allimagesasc', Text::_('MOD_LATESTNEWSENHANCEDEXTENDED_VALUE_ALLIMAGESASC_WITHK2'), 'value', 'text', $disable = false);
			$options[] = HTMLHelper::_('select.option', 'allimagesdesc', Text::_('MOD_LATESTNEWSENHANCEDEXTENDED_VALUE_ALLIMAGESDESC_WITHK2'), 'value', 'text', $disable = false);
		} else {
			$options[] = HTMLHelper::_('select.option', 'imageintro', Text::_('MOD_LATESTNEWSENHANCEDEXTENDED_VALUE_IMAGEINTRO'), 'value', 'text', $disable = false);
			$options[] = HTMLHelper::_('select.option', 'imagefull', Text::_('MOD_LATESTNEWSENHANCEDEXTENDED_VALUE_IMAGEFULL'), 'value', 'text', $disable = false);
			$options[] = HTMLHelper::_('select.option', 'allimagesasc', Text::_('MOD_LATESTNEWSENHANCEDEXTENDED_VALUE_ALLIMAGESASC'), 'value', 'text', $disable = false);
			$options[] = HTMLHelper::_('select.option', 'allimagesdesc', Text::_('MOD_LATESTNEWSENHANCEDEXTENDED_VALUE_ALLIMAGESDESC'), 'value', 'text', $disable = false);
		}

		$options[] = HTMLHelper::_('select.option', 'author', Text::_('MOD_LATESTNEWSENHANCEDEXTENDED_VALUE_AUTHORCONTACT') . ' (Pro)', 'value', 'text', $disable = true);
		if (SYWK2::exists()) {
			$options[] = HTMLHelper::_('select.option', 'authork2user', Text::_('MOD_LATESTNEWSENHANCEDEXTENDED_VALUE_AUTHORK2USER') . ' (Pro)', 'value', 'text', $disable = true);
		}

		$group_options = self::getFieldGroup('com_content', $customfields, 'media');
		$options = array_merge($options, $group_options);

		if (SYWK2::exists()) {
			$group_options = self::getFieldGroup('com_k2', $k2extrafields, 'image');
			$options = array_merge($options, $group_options);
		}

		$options[] = HTMLHelper::_('select.optgroup', Text::_('MOD_LATESTNEWSENHANCEDEXTENDED_VALUE_IMAGEGROUP'));

		// icons

		if (PluginHelper::isEnabled('fields', 'sywicon')) {
			$group_options = self::getFieldGroup('com_content', $customfields, 'sywicon');
			if (!empty($group_options)) {
				$options[] = HTMLHelper::_('select.optgroup', Text::_('MOD_LATESTNEWSENHANCEDEXTENDED_VALUE_ICONGROUP'));
				$options = array_merge($options, $group_options);
				$options[] = HTMLHelper::_('select.optgroup', Text::_('MOD_LATESTNEWSENHANCEDEXTENDED_VALUE_ICONGROUP'));
			}
		}

		// calendars

		$options[] = HTMLHelper::_('select.optgroup', Text::_('MOD_LATESTNEWSENHANCEDEXTENDED_VALUE_CALENDARGROUP'));

		$options[] = HTMLHelper::_('select.option', 'calendar', Text::_('MOD_LATESTNEWSENHANCEDEXTENDED_VALUE_CALENDAR'), 'value', 'text', $disable = false);

		$group_options = self::getFieldGroup('com_content', $customfields, 'calendar');
		$options = array_merge($options, $group_options);

		if (SYWK2::exists()) {
			$group_options = self::getFieldGroup('com_k2', $k2extrafields, 'date');
			$options = array_merge($options, $group_options);
		}

		$options[] = HTMLHelper::_('select.optgroup', Text::_('MOD_LATESTNEWSENHANCEDEXTENDED_VALUE_CALENDARGROUP'));

		// videos

		if (PluginHelper::isEnabled('fields', 'acfdailymotion')
		    || PluginHelper::isEnabled('fields', 'acffacebookvideo')
		    || PluginHelper::isEnabled('fields', 'acfhtml5video')
		    || PluginHelper::isEnabled('fields', 'acfvimeo')
		    || PluginHelper::isEnabled('fields', 'acfyoutube')) {

		    $options[] = HTMLHelper::_('select.optgroup', Text::_('MOD_LATESTNEWSENHANCEDEXTENDED_VALUE_VIDEOGROUP'));

    		if (PluginHelper::isEnabled('fields', 'acfdailymotion')) {
    		    $group_options = self::getFieldGroup('com_content', $customfields, 'acfdailymotion');
    		    if (!empty($group_options)) {
    		        $options = array_merge($options, $group_options);
    		    }
    		}

    		if (PluginHelper::isEnabled('fields', 'acffacebookvideo')) {
    		    $group_options = self::getFieldGroup('com_content', $customfields, 'acffacebookvideo');
    		    if (!empty($group_options)) {
    		        $options = array_merge($options, $group_options);
    		    }
    		}

    		if (PluginHelper::isEnabled('fields', 'acfhtml5video')) {
    		    $group_options = self::getFieldGroup('com_content', $customfields, 'acfhtml5video');
    		    if (!empty($group_options)) {
    		        $options = array_merge($options, $group_options);
    		    }
    		}

    		if (PluginHelper::isEnabled('fields', 'acfvimeo')) {
    		    $group_options = self::getFieldGroup('com_content', $customfields, 'acfvimeo');
    		    if (!empty($group_options)) {
    		        $options = array_merge($options, $group_options);
    		    }
    		}

    		if (PluginHelper::isEnabled('fields', 'acfyoutube')) {
    		    $group_options = self::getFieldGroup('com_content', $customfields, 'acfyoutube');
    		    if (!empty($group_options)) {
    		        $options = array_merge($options, $group_options);
    		    }
    		}

    		$options[] = HTMLHelper::_('select.optgroup', Text::_('MOD_LATESTNEWSENHANCEDEXTENDED_VALUE_VIDEOGROUP'));
		}

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
					//$options[] = HTMLHelper::_('select.optgroup', Text::_('MOD_LATESTNEWSENHANCEDEXTENDED_VALUE_K2EXTRAFIELDS'));
				}

				$options[] = HTMLHelper::_('select.option', 'k2field:'.$field->type.':'.$field->id, 'K2: '.$field->group_name.': '.$field->name . ' (Pro)', 'value', 'text', $disable = true);

				$fields_count++;
			}

			if ($fields_count > 0) {
				//$options[] = HTMLHelper::_('select.optgroup', Text::_('MOD_LATESTNEWSENHANCEDEXTENDED_VALUE_K2EXTRAFIELDS'));
			}
		}

		if ($option == 'com_content') {

			// organize the fields according to their group

			$fieldsPerGroup = array(
				0 => array()
			);

			$groupTitles = array(
				0 => Text::_('MOD_LATESTNEWSENHANCEDEXTENDED_VALUE_NOGROUPFIELD')
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
				//$options[] = HTMLHelper::_('select.optgroup', Text::_('MOD_LATESTNEWSENHANCEDEXTENDED_VALUE_JOOMLAFIELDS'));

				foreach ($fieldsPerGroup as $group_id => $groupFields) {

					if (!$groupFields) {
						continue;
					}

					foreach ($groupFields as $field) {
						$options[] = HTMLHelper::_('select.option', 'jfield:'.$field->type.':'.$field->id, $groupTitles[$group_id].': '.$field->title . ' (Pro)', 'value', 'text', $disable = true);
					}
				}

				//$options[] = HTMLHelper::_('select.optgroup', Text::_('MOD_LATESTNEWSENHANCEDEXTENDED_VALUE_JOOMLAFIELDS'));
			}
		}

		return $options;
	}
}
?>