<?php
/** 
* @package Easy Facebook Page 
* @version 1.1
* @author JoomBoost 
* @website	https://www.joomboost.com 
* @copyright Copyright © 2012 - 2017 JoomBoost 
* @license GNU/GPL http://www.gnu.org/copyleft/gpl.html 
**/
defined( '_JEXEC' ) or die;

jimport('joomla.form.formfield');

class JFormFieldFormatrange extends JFormField {

	protected $type = 'formatrange';
	
	

	public function getInput() {
		
		$doc = JFactory::getDocument();
		
		
		$range_max = $this->getAttribute('max');
		$range_min = $this->getAttribute('min');
		
		$range_script = "function {$this->id}OutputUpdate(vol) {
								document.querySelector('#volume{$this->id}').value = vol;
							}";
		
		
		$doc->addScriptDeclaration($range_script);	
		
		return '<input 	type=range 
						name="'.$this->name.'"
						min="'.$range_min.'"
						max="'.$range_max.'" 
						value="'.$this->value.'"
						class="input-medium"
						id="fader"
						step="1"
						oninput="'.$this->id.'OutputUpdate(value+\'px\')">

				<output for="fader" id="volume'.$this->id.'"class="badge badge-warning">'.$this->value.'px</output>';

	}
}
		
	
			
		