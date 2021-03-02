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

// Facebook Params

$pagename	 			= $params->get('page_name','JoomBoost');
$url					= $params->get('page_url','https://www.facebook.com/joomboost/');
$tabs 					= implode("," , $params->get('page_tabs',''));
$hide_cover				= !$params->get('hide_cover','0');
$show_facepile			= $params->get('show_facepile','1');
$hide_cta				= !$params->get('hide_cta','0');
$small_header			= $params->get('small_header','0');
$adapt_container_width	= $params->get('adapt_container_width','0');
$width 					= $params->get('width','340');
$height 				= $params->get('height','500');
$mlang 					= $params->get('language','en_GB');
$autolanguage			= $params->get('autolanguage','1');



$jlang					= str_replace('-', '_', JFactory::getLanguage()->getTag());


$fblangs 				= array("af_ZA","gn_PY","ay_BO","az_AZ","id_ID","ms_MY","jv_ID","bs_BA","ca_ES","cs_CZ","ck_US","cy_GB","da_DK","se_NO",
								"de_DE","et_EE","ثn_IN","en_PI",	"en_GB","en_UD","en_US","es_LA","es_CL","es_CO","es_ES","es_MX","es_VE","eo_EO","eu_ES","tl_PH",
								"fo_FO","fr_FR","fr_CA","fy_NL","ga_IE","gl_ES","ko_KR","hr_HR","xh_ZA","zu_ZA","is_IS","it_IT","ka_GE","sw_KE","tl_ST","ku_TR",
								"lv_LV","fb_LT","lt_LT","li_NL","la_VA","hu_HU","mg_MG","mt_MT","nl_NL","nl_BE","ja_JP","nb_NO","nn_NO","uz_UZ","pl_PL","pt_BR",
								"pt_PT","qu_PE","ro_RO","rm_CH","ru_RU","sq_AL","sk_SK","sl_SI","so_SO","fi_FI","sv_SE","th_TH","vi_VN","tr_TR","zh_CN","zh_TW",
								"zh_HK","el_GR","gx_GR","be_BY","bg_BG","kk_KZ","mk_MK","mn_MN","sr_RS","tt_RU","tg_TJ","uk_UA","hy_AM","yi_DE","he_IL","ur_PK",
								"ar_AR","ps_AF","fa_IR","sy_SY","ne_NP","mr_IN","sa_IN","hi_IN","bn_IN","pa_IN","gu_IN","ta_IN","te_IN","kn_IN","ml_IN","km_KH");


		
$language				= (($autolanguage && in_array($jlang, $fblangs))) ? $jlang : $mlang; 



// Add Stylesheet
$doc 			= JFactory::getDocument();

// load layout
require JModuleHelper::getLayoutPath('mod_easy_fbpage', $params->get('layout', 'default'));
