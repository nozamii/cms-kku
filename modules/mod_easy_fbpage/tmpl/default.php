<?php
/** 
* @package Easy Facebook Page
* @version 1.1
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
  js.src = "//connect.facebook.net/<?php echo $language?>/sdk.js#xfbml=1&version=v2.9";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


<div class="fb-page" 
data-href="<?php echo $url ?>" 
data-tabs="<?php echo $tabs ?>"
data-small-header="<?php echo $small_header ?>"
data-adapt-container-width="<?php echo $adapt_container_width ?>"
data-hide-cover="<?php echo $hide_cover ?>"
data-width="<?php echo $width ?>"
data-height="<?php echo $height ?>"
data-show-facepile="<?php echo $show_facepile ?>"><blockquote cite="<?php echo $url ?>" class="fb-xfbml-parse-ignore">
<a href="<?php echo $url ?>">"<?php echo $pagename ?>"</a></blockquote></div>
