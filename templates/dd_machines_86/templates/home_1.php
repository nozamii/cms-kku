<!DOCTYPE html>
<html dir="ltr">
<head>
	<meta charset="utf-8" />
    <?php
        $base = $document->getBase();
        if (!empty($base)) {
            echo '<base href="' . $base . '" />';
            $document->setBase('');
        }
    ?>
     <?php 
	$app = JFactory::getApplication();
    $tplparams	= $app->getTemplate(true)->params;
	$close_slideshow = htmlspecialchars($tplparams->get('close_slideshow'));
	$close_text = htmlspecialchars($tplparams->get('close_text'));
	$fc = htmlspecialchars($tplparams->get('fc'));
	$tc = htmlspecialchars($tplparams->get('tc'));
	$gc = htmlspecialchars($tplparams->get('gc'));
	$pc = htmlspecialchars($tplparams->get('pc'));
	$allicon = htmlspecialchars($tplparams->get('allicon'));
    $ac = htmlspecialchars($tplparams->get('ac'));
	$close_box = htmlspecialchars($tplparams->get('close_box'));
	$close_contact = htmlspecialchars($tplparams->get('close_contact'));
	$circlec = htmlspecialchars($tplparams->get('circlec'));
	$close_ib = htmlspecialchars($tplparams->get('close_ib'));
	$mc = htmlspecialchars($tplparams->get('mc'));
	$closeterms = htmlspecialchars($tplparams->get('closeterms'));
$closeprivacy = htmlspecialchars($tplparams->get('closeprivacy'));
$emailclose = htmlspecialchars($tplparams->get('emailclose'));
$telephoneclose = htmlspecialchars($tplparams->get('telephoneclose'));
$skypeclose = htmlspecialchars($tplparams->get('skypeclose'));

	?>
<link href="<?php echo $document->params->get('fav'); ?>" rel="icon" type="image/x-icon" />
    <script>
    var themeHasJQuery = !!window.jQuery;
</script>
<script src="<?php echo addThemeVersion($document->templateUrl . '/jquery.js'); ?>"></script>
<script>
    window._$ = jQuery.noConflict(themeHasJQuery);
</script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="<?php echo addThemeVersion($document->templateUrl . '/bootstrap.min.js'); ?>"></script>
<link class="" href='//fonts.googleapis.com/css?family=Archivo+Black:regular&subset=latin' rel='stylesheet' type='text/css'>
<script src="<?php echo addThemeVersion($document->templateUrl . '/CloudZoom.js'); ?>" type="text/javascript"></script>
    
    <?php echo $document->head; ?>
    <?php if ($GLOBALS['theme_settings']['is_preview'] || !file_exists($themeDir . '/css/bootstrap.min.css')) : ?>
    <link rel="stylesheet" href="<?php echo addThemeVersion($document->templateUrl . '/css/bootstrap.css'); ?>" media="screen" />
    <?php else : ?>
    <link rel="stylesheet" href="<?php echo addThemeVersion($document->templateUrl . '/css/bootstrap.min.css'); ?>" media="screen" />
    <?php endif; ?>
    <?php if ($GLOBALS['theme_settings']['is_preview'] || !file_exists($themeDir . '/css/template.min.css')) : ?>
    <link rel="stylesheet" href="<?php echo addThemeVersion($document->templateUrl . '/css/template.css'); ?>" media="screen" />
    <?php else : ?>
    <link rel="stylesheet" href="<?php echo addThemeVersion($document->templateUrl . '/css/template.min.css'); ?>" media="screen" />
    <?php endif; ?>
    <!--[if lte IE 9]>
    <link rel="stylesheet" href="<?php echo addThemeVersion($document->templateUrl . '/css/template.ie.css'); ?>" media="screen"/>
    <![endif]-->
    <?php if(('edit' == JRequest::getVar('layout') || 'form' == JRequest::getVar('view')) ||
        ('com_config' == JRequest::getVar('option') || 'config.display.modules' == JRequest::getVar('controller'))) : ?>
    <link rel="stylesheet" href="<?php echo addThemeVersion($document->templateUrl . '/css/media.css'); ?>" media="screen" />
    <script src="<?php echo addThemeVersion($document->templateUrl . '/js/template.js'); ?>"></script>
    <?php endif; ?>
    <script src="<?php echo addThemeVersion($document->templateUrl . '/script.js'); ?>"></script>
    <!--[if lte IE 9]>
    <script src="<?php echo addThemeVersion($document->templateUrl . '/script.ie.js'); ?>"></script>
    <![endif]-->
    
</head>
<style>
.bd-slide-5 {background-image: url(<?php echo $document->params->get('foto1'); ?>);}
.bd-slide-18 {background-image: url(<?php echo $document->params->get('foto2'); ?>);}
.bd-slide-19 {background-image: url(<?php echo $document->params->get('foto3'); ?>);}
.bd-slide-20 {background-image: url(<?php echo $document->params->get('foto4'); ?>);}
.bd-layoutbox-5{background-image: url(<?php echo $document->params->get('bgm'); ?>)}


</style>
<body class=" bootstrap bd-body-1 bd-pagebackground">
    <div data-affix
     data-offset=""
     data-fix-at-screen="top"
     data-clip-at-control="top"
     
 data-enable-lg
     
 data-enable-md
     
 data-enable-sm
     
     class=" bd-affix-1"><header class=" bd-headerarea-1">
        <div class=" bd-layoutbox-1 clearfix">
    <div class="bd-container-inner">
        <div class=" bd-layoutcontainer-17">
    <div class="bd-container-inner">
        <div class="container-fluid">
            <div class="row
                
                
 bd-row-align-top
                
                ">
                <div class=" 
 col-sm-12">
    <div class="bd-layoutcolumn-75"><div class="bd-vertical-align-wrapper"><div class=" bd-layoutbox-20 clearfix">
    <div class="bd-container-inner">
        <div class=" bd-animation-19 animated" data-animation-name="zoomIn"
                                    data-animation-event="onload"
                                    data-animation-duration="1000ms"
                                    data-animation-delay="0ms"
                                    data-animation-infinited="false"
                                    ><?php
$app = JFactory::getApplication();
$themeParams = $app->getTemplate(true)->params;
$sitename = $app->getCfg('sitename');
$logoSrc = '';
ob_start();
?>
<?php echo JURI::base() . 'templates/' . JFactory::getApplication()->getTemplate(); ?>/images/logo.png
<?php
$logoSrc = ob_get_clean();
$logoLink = '';
if ($themeParams->get('logoFile'))
{
$logoSrc = JURI::root() . $themeParams->get('logoFile');
}
if ($themeParams->get('logoLink'))
{
$logoLink = $themeParams->get('logoLink');
}
?>
<a class=" bd-logo-5" href="<?php echo $logoLink; ?>">
<img class=" bd-imagestyles" src="<?php echo $logoSrc; ?>" alt="<?php echo $sitename; ?>">
</a></div>
    </div>
</div></div></div>
</div>
	
		<?php if ($close_contact == 1) { ?><div class=" 
 col-sm-12">
    <div class="bd-layoutcolumn-76"><div class="bd-vertical-align-wrapper"><p class=" bd-textblock-16 bd-tagstyles">
    <font size="4"><b>
    <?php echo $document->params->get('name'); ?></b>&nbsp;</font>
</p>
	
		<p class=" bd-textblock-10 bd-tagstyles">
    <?php echo $document->params->get('telephone'); ?>&nbsp;<div style="">&nbsp;<?php echo $document->params->get('email'); ?>
</div>
</p></div></div>
</div><?php } ?>
            </div>
        </div>
    </div>
</div>
    </div>
</div>
	
		<?php
    renderTemplateFromIncludes('hmenu_1', array());
?>
</header></div>
	
		<div class=" bd-layoutbox-4 clearfix">
    <div class="bd-container-inner">
        <?php
    renderTemplateFromIncludes('joomlaposition_17');
?>
    </div>
</div>
	
		<?php if ($close_slideshow == 1) { ?><div class=" bd-bottomcornersshadow-1"><div id="carousel-3" class=" bd-slider-3 carousel slide">
    

    

    

    <div class="bd-slides carousel-inner">
        <div class=" bd-slide-5 item"
    
 data-url="<?php echo $document->params->get('l1'); ?>"
    
    >
    <div class="bd-container-inner">
        <div class="bd-container-inner-wrapper">
            <div class=" bd-animation-4 animated" data-animation-name="fadeInRight"
                                    data-animation-event="slidein"
                                    data-animation-duration="1000ms"
                                    data-animation-delay="0ms"
                                    data-animation-infinited="false"
                                    
 data-animation-display="none">
<div class=" bd-animation-5 animated" data-animation-name="fadeOutRight"
                                    data-animation-event="slideout"
                                    data-animation-duration="1000ms"
                                    data-animation-delay="0ms"
                                    data-animation-infinited="false"
                                    >
<h1 class=" bd-textblock-37 bd-tagstyles">
    <?php if ($close_text == 1) { ?><?php echo $document->params->get('s1'); ?><?php } ?>
</h1>
</div>
</div>
	
		<div class=" bd-animation-7 animated" data-animation-name="fadeInRight"
                                    data-animation-event="slidein"
                                    data-animation-duration="1000ms"
                                    data-animation-delay="500ms"
                                    data-animation-infinited="false"
                                    
 data-animation-display="none">
<div class=" bd-animation-8 animated" data-animation-name="fadeOutRight"
                                    data-animation-event="slideout"
                                    data-animation-duration="1000ms"
                                    data-animation-delay="200ms"
                                    data-animation-infinited="false"
                                    >
<h1 class=" bd-textblock-13 bd-tagstyles">
   <?php if ($close_text == 1) { ?> <?php echo $document->params->get('s2'); ?><?php } ?>
</h1>
</div>
</div>
        </div>
    </div>
</div>
	
		<div class=" bd-slide-18 item"
    
 data-url="<?php echo $document->params->get('l2'); ?>"
    
    >
    <div class="bd-container-inner">
        <div class="bd-container-inner-wrapper">
            <div class=" bd-animation-70 animated" data-animation-name="zoomIn"
                                    data-animation-event="slidein"
                                    data-animation-duration="1000ms"
                                    data-animation-delay="0ms"
                                    data-animation-infinited="false"
                                    
 data-animation-display="none">
<div class=" bd-animation-71 animated" data-animation-name="zoomOut"
                                    data-animation-event="slideout"
                                    data-animation-duration="1000ms"
                                    data-animation-delay="0ms"
                                    data-animation-infinited="false"
                                    >
<p class=" bd-textblock-38 bd-tagstyles">
    <?php if ($close_text == 1) { ?><?php echo $document->params->get('s3'); ?><?php } ?>
</p>
</div>
</div>
	
		<div class=" bd-animation-12 animated" data-animation-name="fadeInRight"
                                    data-animation-event="slidein"
                                    data-animation-duration="1000ms"
                                    data-animation-delay="500ms"
                                    data-animation-infinited="false"
                                    >
<div class=" bd-animation-13 animated" data-animation-name="fadeOutRight"
                                    data-animation-event="slideout"
                                    data-animation-duration="1000ms"
                                    data-animation-delay="200ms"
                                    data-animation-infinited="false"
                                    >
<h1 class=" bd-textblock-18 bd-tagstyles">
    <?php if ($close_text == 1) { ?> <?php echo $document->params->get('s4'); ?><?php } ?>
</h1>
</div>
</div>
        </div>
    </div>
</div>
	
		<div class=" bd-slide-19 item"
    
 data-url="<?php echo $document->params->get('l3'); ?>"
    
    >
    <div class="bd-container-inner">
        <div class="bd-container-inner-wrapper">
            <div class=" bd-animation-74 animated" data-animation-name="zoomIn"
                                    data-animation-event="slidein"
                                    data-animation-duration="1000ms"
                                    data-animation-delay="0ms"
                                    data-animation-infinited="false"
                                    >
<div class=" bd-animation-75 animated" data-animation-name="zoomOut"
                                    data-animation-event="slideout"
                                    data-animation-duration="1000ms"
                                    data-animation-delay="0ms"
                                    data-animation-infinited="false"
                                    >
<p class=" bd-textblock-42 bd-tagstyles">
   <?php if ($close_text == 1) { ?> <?php echo $document->params->get('s5'); ?><?php } ?>
</p>
</div>
</div>
	
		<div class=" bd-animation-1 animated" data-animation-name="fadeInRight"
                                    data-animation-event="slidein"
                                    data-animation-duration="1000ms"
                                    data-animation-delay="500ms"
                                    data-animation-infinited="false"
                                    
 data-animation-display="none">
<div class=" bd-animation-2 animated" data-animation-name="fadeOutRight"
                                    data-animation-event="slideout"
                                    data-animation-duration="1000ms"
                                    data-animation-delay="200ms"
                                    data-animation-infinited="false"
                                    >
<h1 class=" bd-textblock-20 bd-tagstyles">
   <?php if ($close_text == 1) { ?><?php echo $document->params->get('s6'); ?><?php } ?>
</h1>
</div>
</div>
        </div>
    </div>
</div>
	
		<div class=" bd-slide-20 item"
    
 data-url="<?php echo $document->params->get('l4'); ?>"
    
    >
    <div class="bd-container-inner">
        <div class="bd-container-inner-wrapper">
            <div class=" bd-animation-74 animated" data-animation-name="zoomIn"
                                    data-animation-event="slidein"
                                    data-animation-duration="1000ms"
                                    data-animation-delay="0ms"
                                    data-animation-infinited="false"
                                    >
<div class=" bd-animation-75 animated" data-animation-name="zoomOut"
                                    data-animation-event="slideout"
                                    data-animation-duration="1000ms"
                                    data-animation-delay="0ms"
                                    data-animation-infinited="false"
                                    >
<p class=" bd-textblock-42 bd-tagstyles">
    <?php if ($close_text == 1) { ?><?php echo $document->params->get('s7'); ?><?php } ?>
</p>
</div>
</div>
	
		<div class=" bd-animation-1 animated" data-animation-name="fadeInRight"
                                    data-animation-event="slidein"
                                    data-animation-duration="1000ms"
                                    data-animation-delay="500ms"
                                    data-animation-infinited="false"
                                    
 data-animation-display="none">
<div class=" bd-animation-2 animated" data-animation-name="fadeOutRight"
                                    data-animation-event="slideout"
                                    data-animation-duration="1000ms"
                                    data-animation-delay="200ms"
                                    data-animation-infinited="false"
                                    >
<h1 class=" bd-textblock-20 bd-tagstyles">
   <?php if ($close_text == 1) { ?><?php echo $document->params->get('s8'); ?><?php } ?>
</h1>
</div>
</div>
        </div>
    </div>
</div>
    </div>

    

    

    
        <div class="left-button">
    <a class=" bd-carousel-6" href="#">
        <span class=" bd-icon-24"></span>
    </a>
</div>

<div class="right-button">
    <a class=" bd-carousel-6" href="#">
        <span class=" bd-icon-24"></span>
    </a>
</div>

    <script>
        if ('undefined' !== typeof initSlider){
            initSlider('.bd-slider-3', 'left-button', 'right-button', '.bd-carousel-6', '.bd-indicators', 5200, "hover", true, true);
        }
    </script>
</div></div><?php } ?>
	
		<?php if ($circlec == 1) { ?><div class=" bd-animation-16 animated" data-animation-name="flash"
                                    data-animation-event="onload"
                                    data-animation-duration="1000ms"
                                    data-animation-delay="0ms"
                                    data-animation-infinited="false"
                                    ><section class=" bd-section-3 bd-tagstyles bd-custom-image" id="section4" data-section-title="Four Columns">
    <div class="bd-vertical-align-section-wrapper">
        <div class=" bd-layoutcontainer-3">
    <div class="bd-container-inner">
        <div class="container-fluid">
            <div class="row
                
 bd-row-flex
                
 bd-row-align-top
                
                ">
                <div class=" 
 col-lg-6
 col-sm-12">
    <div class="bd-layoutcolumn-9"><div class="bd-vertical-align-wrapper"><a class="bd-imagelink-1  " href="<?php echo $document->params->get('cl1'); ?>">
<img class=" bd-imagestyles" src="<?php echo $document->params->get('cf1'); ?>">
</a>
	
		<h3 class=" bd-textblock-1 bd-tagstyles">
    <?php echo $document->params->get('ct1'); ?>
</h3>
	
		<p class=" bd-textblock-2 bd-tagstyles">
    <?php echo $document->params->get('cte1'); ?>
</p></div></div>
</div>
	
		<div class=" 
 col-lg-6
 col-sm-12">
    <div class="bd-layoutcolumn-18"><div class="bd-vertical-align-wrapper"><a class="bd-imagelink-2  " href="<?php echo $document->params->get('cl2'); ?>">
<img class=" bd-imagestyles" src="<?php echo $document->params->get('cf2'); ?>">
</a>
	
		<h3 class=" bd-textblock-3 bd-tagstyles">
    <?php echo $document->params->get('ct2'); ?>
</h3>
	
		<p class=" bd-textblock-4 bd-tagstyles">
    <?php echo $document->params->get('cte2'); ?>
</p></div></div>
</div>
	
		<div class=" 
 col-lg-6
 col-sm-12">
    <div class="bd-layoutcolumn-20"><div class="bd-vertical-align-wrapper"><a class="bd-imagelink-3  " href="<?php echo $document->params->get('cl3'); ?>">
<img class=" bd-imagestyles" src="<?php echo $document->params->get('cf3'); ?>">
</a>
	
		<h3 class=" bd-textblock-5 bd-tagstyles">
    <?php echo $document->params->get('ct3'); ?>
</h3>
	
		<p class=" bd-textblock-6 bd-tagstyles">
   <?php echo $document->params->get('cte3'); ?>
</p></div></div>
</div>
	
		<div class=" 
 col-lg-6
 col-sm-12">
    <div class="bd-layoutcolumn-22"><div class="bd-vertical-align-wrapper"><a class="bd-imagelink-4  " href="<?php echo $document->params->get('cl4'); ?>">
<img class=" bd-imagestyles" src="<?php echo $document->params->get('cf4'); ?>">
</a>
	
		<h3 class=" bd-textblock-7 bd-tagstyles">
    <?php echo $document->params->get('ct4'); ?>
</h3>
	
		<p class=" bd-textblock-9 bd-tagstyles">
    <?php echo $document->params->get('cte4'); ?>
</p></div></div>
</div>
            </div>
        </div>
    </div>
</div>
    </div>
</section></div><?php } ?>
	
		<?php if ($close_ib == 1) { ?><section class=" bd-section-1 bd-tagstyles" id="section4" data-section-title="Two Thirds">
    <div class="bd-vertical-align-section-wrapper">
        <div class=" bd-layoutcontainer-10">
    <div class="bd-container-inner">
        <div class="container-fluid">
            <div class="row
                
 bd-row-flex
                
 bd-row-align-middle
                
                ">
                <div class=" 
 col-sm-16">
    <div class="bd-layoutcolumn-23"><div class="bd-vertical-align-wrapper"><div class=" bd-animation-3 animated" data-animation-name="fadeInLeft"
                                    data-animation-event="scroll"
                                    data-animation-duration="1000ms"
                                    data-animation-delay="0ms"
                                    data-animation-infinited="false"
                                    >
<h3 class=" bd-textblock-8 bd-tagstyles">
   <?php echo $document->params->get('it1'); ?>
</h3>
</div>
	
		<div class=" bd-animation-6 animated" data-animation-name="fadeInUp"
                                    data-animation-event="scroll"
                                    data-animation-duration="1000ms"
                                    data-animation-delay="300ms"
                                    data-animation-infinited="false"
                                    >
<p class=" bd-textblock-11 bd-tagstyles">
    <?php echo $document->params->get('it2'); ?>
</p>
</div></div></div>
</div>
	
		<div class=" 
 col-sm-8">
    <div class="bd-layoutcolumn-24"><div class="bd-vertical-align-wrapper"><div class=" bd-animation-10 animated" data-animation-name="fadeInRight"
                                    data-animation-event="scroll"
                                    data-animation-duration="1000ms"
                                    data-animation-delay="100ms"
                                    data-animation-infinited="false"
                                    ><a href="<?php echo $document->params->get('ibl'); ?>" class=" bd-linkbutton-1 bd-button-23 bd-icon-4"   >
<?php echo $document->params->get('ibn'); ?>
</a></div></div></div>
</div>
            </div>
        </div>
    </div>
</div>
    </div>
</section><?php } ?>
	
		<div class=" bd-layoutbox-2 clearfix">
    <div class="bd-container-inner">
        <?php
    renderTemplateFromIncludes('joomlaposition_10');
?>
    </div>
</div>
	
		<div class=" bd-stretchtobottom-1 bd-stretch-to-bottom" data-control-selector=".bd-contentlayout-9"><div class="bd-sheetstyles bd-contentlayout-9 ">
    <div class="bd-container-inner">
        <div class="bd-flex-vertical bd-stretch-inner">
            
            <div class="bd-flex-horizontal bd-flex-wide">
                
 <?php renderTemplateFromIncludes('sidebar_area_3'); ?>
                <div class="bd-flex-vertical bd-flex-wide">
                    
 <?php renderTemplateFromIncludes('sidebar_area_5'); ?>
                    <div class=" bd-layoutitemsbox-27 bd-flex-wide">
    <div class=" bd-content-9">
    <div class="bd-container-inner">
        <?php
            $document = JFactory::getDocument();
            echo $document->view->renderSystemMessages();
            $document->view->componentWrapper('common');
            echo '<jdoc:include type="component" />';
        ?>
    </div>
</div>
</div>
                    
 <?php renderTemplateFromIncludes('sidebar_area_6'); ?>
                </div>
                
 <?php renderTemplateFromIncludes('sidebar_area_2'); ?>
            </div>
            
 <?php renderTemplateFromIncludes('sidebar_area_4'); ?>
        </div>
    </div>
</div></div>
	
		<div class=" bd-layoutcontainer-28">
    <div class="bd-container-inner">
        <div class="container-fluid">
            <div class="row
                
 bd-row-flex
                
 bd-row-align-top
                
                ">
                <div class=" 
 col-md-6
 col-sm-12
 col-xs-24">
    <div class="bd-layoutcolumn-60"><div class="bd-vertical-align-wrapper"><?php
    renderTemplateFromIncludes('joomlaposition_2');
?></div></div>
</div>
	
		<div class=" 
 col-md-6
 col-sm-12
 col-xs-24">
    <div class="bd-layoutcolumn-61"><div class="bd-vertical-align-wrapper"><?php
    renderTemplateFromIncludes('joomlaposition_3');
?></div></div>
</div>
	
		<div class=" 
 col-md-6
 col-sm-12
 col-xs-24">
    <div class="bd-layoutcolumn-62"><div class="bd-vertical-align-wrapper"><?php
    renderTemplateFromIncludes('joomlaposition_4');
?></div></div>
</div>
	
		<div class=" 
 col-md-6
 col-sm-12
 col-xs-24">
    <div class="bd-layoutcolumn-63"><div class="bd-vertical-align-wrapper"><?php
    renderTemplateFromIncludes('joomlaposition_5');
?></div></div>
</div>
            </div>
        </div>
    </div>
</div>
	
		<?php if ($mc == 1) { ?><div class=" bd-layoutbox-5 clearfix">
    <div class="bd-container-inner">
        <div class=" bd-animation-11 animated" data-animation-name="zoomInUp"
                                    data-animation-event="scroll"
                                    data-animation-duration="1000ms"
                                    data-animation-delay="0ms"
                                    data-animation-infinited="false"
                                    ><div class="bd-imagestyles bd-googlemap-2 ">
    <div class="embed-responsive" style="height: 100%; width: 100%;">
        <iframe class="embed-responsive-item"
                src="http://maps.google.com/maps?output=embed&q=<?php echo $document->params->get('map1'); ?>, <?php echo $document->params->get('map2'); ?>&t=m"></iframe>
    </div>
</div>
</div>
	
		
    </div>
</div><?php } ?>
	
		<footer class=" bd-footerarea-1">
        <section class=" bd-section-6 bd-tagstyles" id="section3" data-section-title="Footer Simple With Two Containers">
    <div class="bd-vertical-align-section-wrapper">
        <div class=" bd-layoutbox-15 clearfix">
    <div class="bd-container-inner">
        <div class=" bd-layoutbox-17 clearfix">
    <div class="bd-container-inner">
        <p class=" bd-textblock-15 bd-tagstyles">
    © Copyright <?php echo date("Y");?>, <?php echo $document->params->get('footer1'); ?>. All Rights Reserved. 
<?php if ($closeterms == 1) { ?><a href="<?php echo $document->params->get('termsl'); ?>" style=""><?php echo $document->params->get('terms'); ?></a> <?php } ?>/ <?php if ($closeprivacy == 1) { ?><a href="<?php echo $document->params->get('privacyl'); ?>" style=""><?php echo $document->params->get('privacy'); ?></a><?php } ?>
</p>
    </div>
</div>
	
		<div class=" bd-layoutbox-16 clearfix">
    <div class="bd-container-inner">
       <?php if ($allicon == 1) { ?> <div class=" bd-socialicons-3">
    
        <?php if ($fc == 1) { ?><a target="_blank" class=" bd-socialicon-9 bd-socialicon" href="<?php echo $document->params->get('facebook'); ?>">
    <span></span><span></span>
</a><?php } ?>
    
        <?php if ($tc == 1) { ?><a target="_blank" class=" bd-socialicon-10 bd-socialicon" href="<?php echo $document->params->get('twitter'); ?>">
    <span></span><span></span>
</a><?php } ?>
    
        <?php if ($gc == 1) { ?><a target="_blank" class=" bd-socialicon-11 bd-socialicon" href="<?php echo $document->params->get('google'); ?>">
    <span></span><span></span>
</a><?php } ?>
    
        <?php if ($pc == 1) { ?><a target="_blank" class=" bd-socialicon-12 bd-socialicon" href="<?php echo $document->params->get('pinterest'); ?>">
    <span></span><span></span>
</a><?php } ?>
</div><?php } ?>
	
		<p class=" bd-textblock-14 bd-tagstyles">
    <?php if ($emailclose== 1) { ?><i class="icon-envelope"></i>  <?php echo $document->params->get('emf'); ?> <?php } ?>
<?php if ($telephoneclose == 1) { ?><i class="icon-dialer"></i>  <?php echo $document->params->get('tef'); ?><?php } ?>
<?php if ($skypeclose == 1) { ?><i class="icon-skype"></i>  <?php echo $document->params->get('skype'); ?><?php } ?>
</p>
    </div>
</div>
    </div>
</div>
    </div>
</section>
</footer>
	
		<div data-animation-time="250" class=" bd-smoothscroll-3"><a href="#" class=" bd-backtotop-1">
    <span class=" bd-icon-66"></span>
</a></div>
	
		<div class=" bd-layoutbox-3 clearfix">
    <div class="bd-container-inner">
        <div class=" bd-animation-17 animated" data-animation-name="fadeInLeft"
                                    data-animation-event="scroll"
                                    data-animation-duration="1000ms"
                                    data-animation-delay="0ms"
                                    data-animation-infinited="false"
                                    >
<div class=" bd-animation-18 animated" data-animation-name="bounce"
                                    data-animation-event="scroll"
                                    data-animation-duration="1000ms"
                                    data-animation-delay="800ms"
                                    data-animation-infinited="false"
                                    >
<p class=" bd-textblock-12 bd-tagstyles">
    <font color="#ffffff">
    Design by:</font><font color="#f0ad4e"> www.diablodesign.eu
</font>
</p>
</div>
</div>
    </div>
</div>
<?php if ($ac == 1) { ?><script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', '<?php echo $document->params->get('analytics'); ?>', 'auto');
  ga('send', 'pageview');

</script><?php } ?>
</body>
</html>