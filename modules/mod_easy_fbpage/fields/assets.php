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

class JFormFieldAssets extends JFormField {

	protected $type = 'assets';
	

	public function renderField($options = array()) {
		
		$doc = JFactory::getDocument();
		
		$doc->addStyleSheet(JUri::root()."modules/mod_easy_fbpage/assets/css/modStyler.css");
		$doc->addScript(JUri::root()."modules/mod_easy_fbpage/assets/js/modStyler.js");
		
		return;
	}
}
		
	
			
		