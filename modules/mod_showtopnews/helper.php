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
defined('_JEXEC') or die('Restricted access');
require_once JPATH_SITE.'/components/com_content/helpers/route.php';
jimport('joomla.application.component.model');
JModelLegacy::addIncludePath(JPATH_SITE.'/components/com_content/models', 'ContentModel');

abstract class modshowtopnewsHelper{	
	static function getList($params){
		$app	= JFactory::getApplication();
		$db		= JFactory::getDbo();
		$model = JModelLegacy::getInstance('Articles', 'ContentModel', array('ignore_request' => true));
		// Set application parameters in model
		$appParams = JFactory::getApplication()->getParams();
		$model->setState('params', $appParams);
		
		// Set the filters based on the module params
		$model->setState('list.start', 0);
		$model->setState('list.limit', (int) $params->get('count', 5));
		$model->setState('filter.published', 1);
		
		$userId = JFactory::getUser()->get('id');
		switch ($params->get('user_id')){
			case 'by_me':
				$model->setState('filter.author_id', (int) $userId);
				break;
			case 'not_me':
				$model->setState('filter.author_id', $userId);
				$model->setState('filter.author_id.include', false);
				break;
			case '0':
				break;
			default:
				$model->setState('filter.author_id', (int) $params->get('user_id'));
				break;}		
		//  Featured switch
		switch ($params->get('show_featured')){
			case '1':
				$model->setState('filter.featured', 'only');
				break;
			case '0':
				$model->setState('filter.featured', 'hide');
				break;
			default:
				$model->setState('filter.featured', 'show');
				break;}
		$model->setState('list.select', 'a.fulltext, a.id, a.title, a.alias, a.introtext, a.state, a.catid, a.created, a.created_by, a.created_by_alias,' .
			' a.modified, a.modified_by, a.publish_up, a.publish_down, a.images, a.urls, a.attribs, a.metadata, a.metakey, a.metadesc, a.access,' .
			' a.hits, a.featured' );
	
		// Access filter
		$access = !JComponentHelper::getParams('com_content')->get('show_noauth');
		$authorised = JAccess::getAuthorisedViewLevels(JFactory::getUser()->get('id'));
		$model->setState('filter.access', $access);
		// Category filter
		$model->setState('filter.category_id', $params->get('catid', array()));
		// Filter by language
		$model->setState('filter.language',$app->getLanguageFilter());
		// Set ordering
		$model->setState('list.ordering', $params->get('ordering', 'a.ordering'));
		$model->setState('list.direction', $params->get('ordering_direction', 'ASC'));
		//	Retrieve Content
		$items = $model->getItems();
		foreach ($items as &$item) {
			$item->slug = $item->id.':'.$item->alias;
			$item->catslug = $item->catid.':'.$item->category_alias;
			$item->date 		= $item->created;
			$item->title 		= htmlspecialchars( $item->title );
			$item->introtext 	= JHtml::_('content.prepare', $item->introtext);
			$item->link 		= JRoute::_(ContentHelperRoute::getArticleRoute($item->slug, $item->catslug));
		}	
		return $items;
	}	

	// CREATE Image Thumbs
	function createThumbs( $pathToImages, $pathToThumbs, $thumbWidth ,$thumbheight , $mode,$style=NULL){
		is_dir(dirname($pathToThumbs)) || mkdir_recursive(dirname($pathToThumbs), $mode);
		is_dir($pathToThumbs) || @mkdir($pathToThumbs, $mode);
		 $pathToImages =  str_ireplace('"','',$pathToImages);
		 $url=explode('/',$pathToImages);
		  $fname = end($url);
		  $ext=explode('.',end($url));		  
		// parse path for the extension
		  $info = end($ext);
		// continue only if this is a JPEG or GIF or PNG image
		if ( strtolower($info) == 'jpg' || strtolower($info) == 'gif' || strtolower($info) == 'png') {
		  // load image and get image size
		  $img = imagecreatefromjpeg( "{$pathToImages}" );
		  $width = imagesx( $img );
		  $height = imagesy( $img );
		  // calculate thumbnail size
		  $new_width = $thumbWidth;
		  $new_height = $thumbheight ;
		  // floor( $height * ( $thumbWidth / $width ) );
		  // create a new tempopary image
		  $tmp_img = imagecreatetruecolor( $new_width, $new_height );
		  // copy and resize old image into new image 
		  imagecopyresized( $tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height );
		  // save thumbnail into a file
		  $fname_ex=explode('.',"{$fname}");
		  $fnames=$fname_ex[0].'-'.$new_width.'x'.$new_height.'.'.strtolower($info);
		  
		  imagejpeg( $tmp_img, "{$pathToThumbs}".$fnames );
		}
	   }

	function findeImgSrc($text){	
	   preg_match_all('/<img[^>]+>/i',$text, $result); 
	   $img = array();
	   preg_match_all('/src=("[^"]*")/i',$result[0][0], $img);
	   return $img[1][0];
	}
	
	function findeImgAlt($text,$title){	
	   preg_match_all('/<img[^>]+>/i',$text, $result); 
	   $img = array();
	   preg_match_all('/alt=("[^"]*")/i',$result[0][0], $img);
	   if(empty($img[1][0]))
	     $img[1][0]='"'.$title.'"';
		return  $img[1][0];
	}
	function findeImgTitle($text,$title){	
	   preg_match_all('/<img[^>]+>/i',$text, $result); 
	   $img = array();
	   preg_match_all('/title=("[^"]*")/i',$result[0][0], $img);
	   if(empty($img[1][0]))
	     $img[1][0]='"'.$title.'"';
		return  $img[1][0];
	}
	
	function removeImg($text){  return $text = preg_replace("/<img[^>]+\>/i"," ", $text); }	
	
	// Create Title 
	function showtitle($title , $maintitle, $titlelimit ,$width, $item ,$style){	
	if($maintitle==TRUE){
		if($titlelimit==0){ 
			   return  '<div class="shtp-header-'.$style.'" style="'.$width.'px;"><h3 title="'.$title.'"><a href="'.$item. '" title="'.$title.'">'.$title.'</a></h3></div>';
			 }else{
			    return '<div class="shtp-header-'.$style.'" style="'.$width.'px;"><h3><a href="'.$item. '" title="'.$title.'">'. modshowtopnewsHelper::getText($title, $titlelimit).'</a></h3></div>';
			}
		}else{	
		if($titlelimit==0){ 
			   return  '<div class="shtp-header-sub-'.$style.'" style="'.$width.'px;"><h3 title="'.$title.'"><a href="'.$item. '" title="'.$title.'">'.$title.'</a></h3></div>';
			 }else{
			    return '<div class="shtp-header-sub-'.$style.'" style="'.$width.'px;"><h3><a href="'.$item. '" title="'.$title.'">'. modshowtopnewsHelper::getText($title, $titlelimit).'</a></h3></div>';
			}	  
			}
  	}
    // SHOW Image
	function showimg($title ,$introtext,$show_image,$custom_image_show,$imageconvert,$pathToThumbs,$thumbwidth,$thumbheight,$row,$style,$width,$float,$opacity){
		if($show_image==3){
			return '';
		}else{
			if($show_image==0 || $show_image==1){	
				$imgsrc = modshowtopnewsHelper::findeImgSrc($introtext); 
			}elseif($show_image==2 && $row <=  $custom_image_show){
				$imgsrc = modshowtopnewsHelper::findeImgSrc($introtext); 
			}elseif($show_image==3){
				$imgsrc = NULL;
			}
		if($imgsrc==NULL || $imgsrc=='' ){
			return '';
			}else{
				$imgalt = modshowtopnewsHelper::findeImgAlt($introtext,$title); 
				$imgtitle = modshowtopnewsHelper::findeImgTitle($introtext,$title); 
				if($imageconvert!==0){	
					$url=explode('/',$imgsrc);
			  	    $thumbing =  end($url);
					$thumbing =  str_ireplace('"','', $thumbing);
					$thumbing_img = explode('.',$thumbing);
			 	    $thumbing_img_final=$thumbing_img[0].'-'.$thumbwidth.'x'.$thumbheight.'.'.end($thumbing_img);
					
					modshowtopnewsHelper::createThumbs( $imgsrc , $pathToThumbs, $thumbwidth ,$thumbheight, '0755' ,$style ); 
					$Img='<div class="shtp-image-'.$style.'" style="width:'.$width.'px;"><center><img alt='.$imgalt.' title='.$imgtitle.' src="'.$pathToThumbs.$thumbing_img_final.'"  style="float:'.$float.';opacity:'.$opacity.';filter:alpha(opacity='.( $opacity * 100 ).');clear:'.$float.'!important;" hspace="10" vspace="5"/></center></div>';			 
				}else{
					$Img='<div class="shtp-image-'.$style.'" style="width:'.$width.'px;"><img alt='.$imgalt.' title='.$imgtitle.' src='.$imgsrc.' style="float:'.$float.';opacity:'.$opacity.';filter:alpha(opacity='.( $opacity * 100 ).'); clear:'.$float.'!important; " hspace="10" vspace="5"/></div>';
				    }				
			if($show_image==0 && $row==1 ){
					return $Img;
			}elseif($show_image==1){
					return $Img;
			}elseif($show_image==2 && $row <=  $custom_image_show){
					return $Img;
			}else{
				    return '';
			}
			
			}
		}
	}
// Show description
function showtext($introtext,$textlimit,$style){
			$introtext=str_ireplace('<p>&nbsp;</p>',' ',$introtext);
			if($textlimit!==0){
				$introtext=modshowtopnewsHelper::removeImg($introtext);
				$introtext=modshowtopnewsHelper::getText($introtext, $textlimit);
				}
			return	$introtext='<div class="shtp-text-'.$style.'"><p>'.$introtext.'</p></div>';
	}
	
	function getText($text, $limit) {
		switch ($limit) {
			case 0 :
				$text = $text;
				break;
			default :
				$text = explode(' ',$text);
				$text=implode(' ', array_slice($text,0,$limit)).'...';
				break;
		}		
		return $text;
	}
	
        function display_main($title,$image,$text,$style,$mod_width,$mod_width1,$mod_width2,$show_text,$custom_text_show, $row_num ,$style){
	    if($style==0){
		 $html='<div class="shtp-maintitle-'.$style.'" style="width:'.$mod_width.'px;">';
	 if($show_text==0 && $row_num==1){
		 $html=$html.$title.$image.$text;
	 }elseif($show_text==1){
		 $html=$html.$title.$image.$text;
	 }elseif($show_text==2 && $custom_text_show >= $row_num ){		
	     $html=$html.$title.$image.$text;
	 }elseif($show_text==3){
		 $html=$html.$title.$image;	
	 }
		 return $html=$html.'</div>';
		}elseif($style==1){
	     $html='<div class="shtp-maintitle-'.$style.'" style="width:'.$mod_width.'px;">';
	 if($show_text==0 && $row_num==1){
		 $html=$html.$image.$title.$text;
	 }elseif($show_text==1){
		 $html=$html.$image.$title.$text;
	 }elseif($show_text==2 && $custom_text_show >= $row_num ){		
	     $html=$html.$image.$title.$text;
	 }elseif($show_text==3){
		 $html=$html.$image.$title;	
	 }
		 return $html=$html.'</div>';
}elseif($style==2 || $style==3 ||$style==4 ){
	     $html='<div class="shtp-maintitle-'.$style.'" style="width:'.$mod_width1.'px;">';
	 if($show_text==0 && $row_num==1){
		 $html=$html.$image.$title.$text;
	 }elseif($show_text==1){
		 $html=$html.$image.$title.$text;
	 }elseif($show_text==2 && $custom_text_show >= $row_num ){		
	     $html=$html.$image.$title.$text;
	 }elseif($show_text==3){
		 $html=$html.$image.$title;	
	 }
		 return $html=$html.'</div>';		 
		}	
	}
	
	function display_sp($style){
	if($style==0){
		 $html='<div class="shtp-sp-'.$style.'" style="width:'.$mod_width.'px;">&nbsp;</div>';
		 return $html;
		}elseif($style==1){
	    
		}	
	}
	
    function display_sub($title,$image,$text,$style,$mod_width,$mod_width1,$mod_width2,$show_text,$custom_text_show, $row_num ,$style){
if($style==0){
   //$html='' ;
	 $html='<div class="shtp-subtitle-'.$style.'" style="width:'.$mod_width.'px;">';
    if($show_text==0){
     $html=$html.$title.$image;
	}elseif($show_text==1){
		 $html=$html.$title.$image.$text;
	}elseif($show_text==2  && $custom_text_show >= $row_num  ){		
	     $html=$html.' '.$title.' '.$image.' '.$text;
	}elseif($show_text==2  && $custom_text_show < $row_num  ){		
	     $html=$html.' '.$title.' '.$image;
    }elseif($show_text==3   ){	 
		 $html=$html.$title.$image;	
	}
	 return $html=$html.'</div>';
 }elseif($style==1  ){
	 $html='<div class="shtp-subtitle-'.$style.'" style="width:'.$mod_width.'px;">';
    if($show_text==0){
		 $html=$html.$image.$title;
	}elseif($show_text==1){
		 $html=$html.$image.$title.$text;
	}elseif($show_text==2  && $custom_text_show >= $row_num  ){		
	     $html=$html.' '.$image.' '.$title.' '.$text;
	}elseif($show_text==2  && $custom_text_show < $row_num  ){		
	     $html=$html.' '.$image.' '.$title;
    }elseif($show_text==3   ){	 
		 $html=$html.$image.$title;	
	}
	 return $html=$html.'</div>';
}elseif($style==2 || $style==3 || $style==4 ){	 	
	 $html='<div class="shtp-subtitle-'.$style.'" style="width:'.$mod_width2.'px;">';
    if($show_text==0){
		 $html=$html.$image.$title;
	}elseif($show_text==1){
		 $html=$html.$image.$title.$text;
	}elseif($show_text==2  && $custom_text_show >= $row_num  ){		
	     $html=$html.' '.$image.' '.$title.' '.$text;
	}elseif($show_text==2  && $custom_text_show < $row_num  ){		
	     $html=$html.' '.$image.' '.$title;
    }elseif($show_text==3  ){	 
		 $html=$html.$image.$title;	
	}
		 return $html=$html.'</div>';		 
    }		
	
 }
}
?>