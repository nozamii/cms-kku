<?php
/** 
* @package Easy Facebook Share Button 
* @version 1.0 
* @author JoomBoost 
* @website	https://www.joomboost.com 
* @copyright Copyright © 2012 - 2017 JoomBoost 
* @license GNU/GPL http://www.gnu.org/copyleft/gpl.html 
**/


defined('_JEXEC') or die;

// Facebook Params
$fblayout 			= $params->get('fblayout','button');
$href 				= ($linktype) ? $params->get('href','https://www.joomboost.com/') : JFactory::getUri()->current();
$size		 		= $params->get('datasize','small');
$mobileiframe		= $params->get('mobileiframe','small');
$language	 		= $params->get('language','en_GB');


// load layout
require JModuleHelper::getLayoutPath('mod_easy_fbsharebutton', $params->get('layout', 'button'));
