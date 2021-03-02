<?php
/**
 * @copyright	Copyright (C) 2011 Simplify Your Web, Inc. All rights reserved.
 * @license		GNU General Public License version 3 or later; see LICENSE.txt
 */

defined( '_JEXEC' ) or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Form\FormHelper;

FormHelper::loadFieldClass('list');

/**
 * Author selection
 */
class JFormFieldAuthorSelect extends \JFormFieldList
{
	public $type = 'AuthorSelect';

	protected function getOptions()
	{
		$options = array();

		if ($this->option == 'com_k2') {
			\JLoader::register('SYWK2', JPATH_LIBRARIES.'/syw/k2.php');

			if (SYWK2::exists()) {

				$db = Factory::getDbo();

				$query = $db->getQuery(true);

				$query->select($db->quoteName('id', 'value'));
				$query->select($db->quoteName('name', 'text'));
				$query->from($db->quoteName('#__users'));
				$query->where('id IN (select distinct(created_by) from #__k2_items)');
				$query->order('name', 'ASC');

				$db->setQuery($query);

				try {
					$authors = $db->loadObjectList();
				} catch (\DatabaseExceptionExecuting $e) {
					$authors = array();
				}

				$options = array_merge($options, $authors);
			}
		} else {

			$db = Factory::getDbo();

			$query = $db->getQuery(true);

			$query->select($db->quoteName('id', 'value'));
			$query->select($db->quoteName('name', 'text'));
			$query->from($db->quoteName('#__users'));
			$query->where('id IN (select distinct(created_by) from #__content)');
			$query->order('name', 'ASC');

// 			$query = $db->getQuery(true)
// 			->select('u.id AS value, u.name AS text')
// 			->from('#__users AS u')
// 			->join('INNER', '#__content AS c ON c.created_by = u.id')
// 			->group('u.id, u.name')
// 			->order('u.name');

			$db->setQuery($query);

			try {
				$authors = $db->loadObjectList();
			} catch (\DatabaseExceptionExecuting $e) {
				$authors = array();
			}

			$options = array_merge($options, $authors);
		}

		// Merge any additional options in the XML definition.
		$options = array_merge(parent::getOptions(), $options);

		return $options;
	}

	public function setup(\SimpleXMLElement $element, $value, $group = null)
	{
		$return = parent::setup($element, $value, $group);

		if ($return) {
			$this->option = isset($this->element['option']) ? $this->element['option'] : '';
		}

		return $return;
	}
}
?>