<?php
/**
 * @copyright	Copyright (C) 2011 Simplify Your Web, Inc. All rights reserved.
 * @license		GNU General Public License version 3 or later; see LICENSE.txt
 */

defined( '_JEXEC' ) or die;

JFormHelper::loadFieldClass('dynamicsingleselect');

class JFormFieldTransitionSelect extends JFormFieldDynamicSingleSelect
{
    public $type = 'TransitionSelect';

    protected $items;

    protected function getOptions()
    {
        $options = array();

        $imagefolder = JURI::root(true) . '/media/syw_trulyresponsiveslides/images/transitions/';

        foreach ($this->items as $key => $value) {
        	$options[] = array($key, $value['label'], '', $imagefolder . $value['image']);
        }

        return $options;
    }

    public function setup(SimpleXMLElement $element, $value, $group = null)
    {
        $return = parent::setup($element, $value, $group);

        if ($return) {
            $this->width = 100;
            $this->height = 72;

            $this->items = array();
            $this->items['slide'] = array('label' => JText::_('MOD_TRULYRESPONSIVESLIDER_TRANSITION_VALUE_SLIDEH'), 'image' => 'transition_slideh.png');
            $this->items['slidev'] = array('label' => JText::_('MOD_TRULYRESPONSIVESLIDER_TRANSITION_VALUE_SLIDEV'), 'image' => 'transition_slidev.png');
            $this->items['fade'] = array('label' => JText::_('MOD_TRULYRESPONSIVESLIDER_VALUE_FADE'), 'image' => 'transition_fade.png');
            $this->items['zoomin'] = array('label' => JText::_('MOD_TRULYRESPONSIVESLIDER_TRANSITION_VALUE_ZOOMIN'), 'image' => 'transition_zoomin.png');
            $this->items['zoomout'] = array('label' => JText::_('MOD_TRULYRESPONSIVESLIDER_TRANSITION_VALUE_ZOOMOUT'), 'image' => 'transition_zoomout.png');
        }

        return $return;
    }
}
?>