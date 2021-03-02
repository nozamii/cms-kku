<?php
/**
 * Asia net pardaz :: Show Top News
 * 
 * @package    Asia net pardaz :: Show Top News
 * @subpackage Modules
 * @link 
 * @license        GNU/GPL, see LICENSE.php
 * mod_ShowTopNews is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 */
// no direct access
defined('_JEXEC') or die('Restricted access');
JHtml::_('behavior.framework', true);
		$maintitle		= trim($params->get('maintitle', 1));	
		$titlelimit		= trim($params->get('titlelimit', 0));	
		$mod_width	    = trim($params->get('mod_width',  400));
		$mod_width1	    = trim($params->get('mod_width1', 250));
		$mod_width2	    = trim($params->get('mod_width2', 150));
		
		$show_text      = trim($params->get('show_text', 0));	
 $custom_text_show      = trim($params->get('custom_text_show', 0));       
		$textlimit		= trim($params->get('deslimit', 0));
		
		
		$show_image     = trim($params->get('show_image', 0));
		$image_float    = trim($params->get('image_float', ''));	
 $custom_image_show     = trim($params->get('custom_image_show', 0));	
		
		$pathToThumbs   = trim($params->get('image_directory', 'images/showtopnews_thumbs/'));
        $imageconvert   = trim($params->get('imageconvert', 0));	
		$thumbwidth		= trim($params->get('thumbwidth', 100));
		$thumbheight	= trim($params->get('thumbheight', 100));
		$opacity        = trim($params->get('opacity', 0.5));	
		
		$style          = trim($params->get('styles',0));	



$document = JFactory::getDocument();
$document->addStyleSheet(JURI::base(true) . '/modules/mod_showtopnews/assets/css/style.css', 'text/css' );
require_once __DIR__ . '/helper.php';
$list = modshowtopnewsHelper::getList($params);
require(JModuleHelper::getLayoutPath('mod_showtopnews'));?>