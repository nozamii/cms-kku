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
?>

  <!-- Load Facebook SDK for JavaScript -->
  
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/<?php echo $language ?>/sdk.js#xfbml=1&version=v2.9";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

  <div class="fb-share-button" 
  data-href="<?php echo $href ?>"
  data-layout="<?php echo $fblayout?>"
  data-size="<?php echo $size?>"
  data-mobileiframe="<?php echo $mobileiframe ?>"

  
  ></div>