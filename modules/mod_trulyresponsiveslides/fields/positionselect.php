<?php
/**
 * @copyright	Copyright (C) 2011 Simplify Your Web, Inc. All rights reserved.
 * @license		GNU General Public License version 3 or later; see LICENSE.txt
 */

defined( '_JEXEC' ) or die;

JFormHelper::loadFieldClass('dynamicsingleselect');

class JFormFieldPositionSelect extends JFormFieldDynamicSingleSelect
{
    public $type = 'PositionSelect';

    protected $items;

    protected function getOptions()
    {
        $options = array();

        $imagefolder = JURI::root(true) . '/media/syw_trulyresponsiveslides/images/positions/';

        foreach ($this->items as $key => $value) {
        	$options[] = array($key, $value['label'], '', $imagefolder . $value['image'] . '.png');
        }

        return $options;
    }

    public function setup(SimpleXMLElement $element, $value, $group = null)
    {
        $return = parent::setup($element, $value, $group);

        if ($return) {
            $this->width = 100;
            $this->height = 62;

            $this->items = array();
            $this->items['c'] = array('label' => JText::_('MOD_TRULYRESPONSIVESLIDER_POSITION_VALUE_C'), 'image' => 'position_c');
            $this->items['s'] = array('label' => JText::_('MOD_TRULYRESPONSIVESLIDER_POSITION_VALUE_S'), 'image' => 'position_s');
            $this->items['se'] = array('label' => JText::_('MOD_TRULYRESPONSIVESLIDER_POSITION_VALUE_SE'), 'image' => 'position_se');
            $this->items['sw'] = array('label' => JText::_('MOD_TRULYRESPONSIVESLIDER_POSITION_VALUE_SW'), 'image' => 'position_sw');
            $this->items['n'] = array('label' => JText::_('MOD_TRULYRESPONSIVESLIDER_POSITION_VALUE_N'), 'image' => 'position_n');
            $this->items['ne'] = array('label' => JText::_('MOD_TRULYRESPONSIVESLIDER_POSITION_VALUE_NE'), 'image' => 'position_ne');
            $this->items['nw'] = array('label' => JText::_('MOD_TRULYRESPONSIVESLIDER_POSITION_VALUE_NW'), 'image' => 'position_nw');
        }

        return $return;
    }
}
?>