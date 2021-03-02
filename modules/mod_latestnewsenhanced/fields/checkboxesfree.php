<?php
/**
 * @copyright	Copyright (C) 2011 Simplify Your Web, Inc. All rights reserved.
 * @license		GNU General Public License version 3 or later; see LICENSE.txt
*/

defined( '_JEXEC' ) or die;

use Joomla\CMS\Form\FormHelper;

FormHelper::loadFieldClass('checkboxes');

class JFormFieldCheckboxesFree extends \JFormFieldCheckboxes
{
	public $type = 'CheckboxesFree';

	protected function getOptions()
	{
		$options = parent::getOptions();

		foreach ($options as $option) {
			if ($option->disable == true) {
				$option->text = $option->text . ' <span class="label label-important">Pro</span>';
			}
		}

		return $options;
	}
}
?>