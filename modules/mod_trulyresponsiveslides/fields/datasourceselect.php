<?php
/**
 * @copyright	Copyright (C) 2011 Simplify Your Web, Inc. All rights reserved.
 * @license		GNU General Public License version 3 or later; see LICENSE.txt
*/

defined( '_JEXEC' ) or die;

use Joomla\CMS\Form\FormHelper;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;

FormHelper::loadFieldClass('list');

class JFormFieldDatasourceSelect extends \JFormFieldList
{
	public $type = 'DatasourceSelect';

	protected function getOptions()
	{
		$options = array();

		\JLoader::register('SYWK2', JPATH_LIBRARIES.'/syw/k2.php');

		$options[] = HTMLHelper::_('select.option', 'k2', Text::_('MOD_TRULYRESPONSIVESLIDER_VALUE_K2ITEMS'), 'value', 'text', $disable = !SYWK2::exists());

		$options = array_merge(parent::getOptions(), $options);

		return $options;
	}
}
?>