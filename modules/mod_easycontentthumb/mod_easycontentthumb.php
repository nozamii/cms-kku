<?php
/**
 * @package 	Easy Content Thumb
 * @version 	1.0
 * @author 		JoomBoost
 * @website		https://www.joomboost.com
 * @copyright 	Copyright (C) 2012 - 2016 JoomBoost
 * @license 	GNU/GPL http://www.gnu.org/copyleft/gpl.html
**/

//no direct access
defined('_JEXEC') or die();
// Path assignments
$jebase = JURI::base();
if(substr($jebase, -1)=="/") { $nanobase = substr($jebase, 0, -1); }
$modURL 	= JURI::base().'modules/mod_easycontentthumb';
$jQuery = $params->get("jQuery");
$imgPath = $params->get("imgPath");
$captionAnim = $params->get("captionAnim","0");
$title = $params->get("title");
$text = $params->get("text");
$linkUrl = $params->get("linkUrl");
$linkText = $params->get("linkText");
$maxW = $params->get("maxW","300");
$btnBg = $params->get("btnBg","#08c");
$btnBgT = $params->get("btnBgT","#fff");
$btnBgH = $params->get("btnBgH","#fff");
$btnBgTH = $params->get("btnBgTH","#08c");

// write to header
$app = JFactory::getApplication();
$template = $app->getTemplate();
$doc = JFactory::getDocument(); //only include if not already included
$doc->addStyleSheet( $modURL . '/css/style.css');
$style = '
#je_caption-container.je_caption'.$module->id.' { max-width:'.$maxW.'px}
#je_caption-container.je_caption'.$module->id.' .caption a.learn-more {background: '.$btnBg.';color: '.$btnBgT.';}
#je_caption-container.je_caption'.$module->id.' .caption a.learn-more:hover {background:'.$btnBgH.'; color: '.$btnBgTH.';}
'; 
$doc->addStyleDeclaration( $style );
if ($params->get('jQuery')) {$doc->addScript ('http://code.jquery.com/jquery-latest.pack.js');}

$doc = JFactory::getDocument();
// normal caption animation
if ($captionAnim == "0") { $js = "
jQuery(document).ready(function() {
	jQuery('.je_caption".$module->id."').hover(
		function(){
			jQuery(this).find('.caption').show();
		},
		function(){
			jQuery(this).find('.caption').hide();
		}
	);
});
";}
// fade-in caption animation
if ($captionAnim == "1") { $js = "
jQuery(document).ready(function() { 
	jQuery('.je_caption".$module->id."').hover(
		function(){
			jQuery(this).find('.caption').fadeIn(250);
		},
		function(){
			jQuery(this).find('.caption').fadeOut(250);
		}
	);
});
";}
// slide-down caption animation
if ($captionAnim == "2") { $js = "
jQuery(document).ready(function() {	
	jQuery('.je_caption".$module->id."').hover(
		function(){
			jQuery(this).find('.caption').slideDown(250);
		},
		function(){
			jQuery(this).find('.caption').slideUp(250);
		}
	);
});	
";}

?> 
<script>
<?php echo $js; ?>
</script>
	<div id="je_caption">
    	<div id="je_caption-container" class="je_caption<?php echo $module->id ?>">
        	<div class="caption">
            	<h3><?php echo $title; ?></h3>
                <p><?php echo $text; ?></p>
                <?php if ($linkUrl != "") { ?><p><a href="<?php echo $linkUrl; ?>" class="learn-more"><?php echo $linkText; ?></a></p><?php } ?>
            </div>
        	<img src="<?php echo $imgPath ?>" />
        </div>
    </div>
    
