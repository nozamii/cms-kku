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
 */?>
<?php // no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
$row=1;
$i=1;
$thumbWidth=$thumbwidth	;
// create main div for show news
print '<div class="shtp-main" style="width:'.$mod_width.'px;">'; ?>
<?php // Find  Main news and other news ?>
<?php foreach ($list as $item): ?>
<?php 	 $title  = $item->title;
		 $introtext = $item->introtext;
		 $introtext=str_replace('<p>&nbsp;</p>',' ',$introtext);
	if($row <=$maintitle  ){ 
		 $main_text[$i][0]=  modshowtopnewsHelper::showtitle($title , TRUE ,$titlelimit ,$mod_width ,$item->link,$style);
		 $main_text[$i][1]=  modshowtopnewsHelper::showimg($title , $introtext,$show_image,$custom_image_show,$imageconvert,$pathToThumbs,$thumbwidth,$thumbheight,$row,$style,$width,$image_float,$opacity);
		 $main_text[$i][2]=  modshowtopnewsHelper::showtext($introtext,$textlimit,$style);
	}else{
	     $sub_text[$i][0]=   modshowtopnewsHelper::showtitle($title , FALSE ,$titlelimit ,$mod_width ,$item->link,$style);
	  	 $sub_text[$i][1]=   modshowtopnewsHelper::showimg($title , $introtext,$show_image,$custom_image_show,$imageconvert,$pathToThumbs,$thumbwidth,$thumbheight,$row,$style,$width,$image_float,$opacity);		
		 $sub_text[$i][2]=  modshowtopnewsHelper::showtext($introtext,$textlimit,$style);
	}
		++$row;
		++$i; 
	 endforeach; ?>
<?php  // Print and Show Style?>     
<?php  $main_count = count($main_text);
	   $sub_count  = count($sub_text);
       $row_num=1;
	   // Main News
	   print '<div class="main'.$style.'" style="width:'.$mod_width1.'px; text-align:justify;  position:relative;">';
	   for($i=1;$i<=$main_count;$i++){
        print modshowtopnewsHelper::display_main($main_text[$i][0],$main_text[$i][1],$main_text[$i][2],0,$mod_width,$mod_width1,$mod_width2,$show_text,$custom_text_show, $row_num,$style);
		$row_num++;}
	   print '</div>';
	  // Sub News 
	   print '<div class="sub'.$style.'" style="width:'.$mod_width2.'px; text-align:justify; position:relative;">';
		for($j=1;$j<=$sub_count;$j++){
	    print '<div class="sub-'.$style.'">';
		print  modshowtopnewsHelper::display_sub($sub_text[$i][0],$sub_text[$i][1],$sub_text[$i][2],0,$mod_width,$mod_width1,$mod_width2,$show_text,$custom_text_show, $row_num ,$style);				
		print '</div>';
		 $i++;
		 $row_num++;}
	   print '</div>'?>
	</div>
    
  