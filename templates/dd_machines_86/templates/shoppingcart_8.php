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
<body class=" bootstrap bd-body-8 bd-pagebackground">
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
	
		<div class="container  bd-containereffect-12"><div class="bd-sheetstyles bd-contentlayout-8 ">
    <div class="bd-container-inner">
        <div class="bd-flex-vertical bd-stretch-inner">
            
            <div class="bd-flex-horizontal bd-flex-wide">
                
 <?php renderTemplateFromIncludes('sidebar_area_3'); ?>
                <div class="bd-flex-vertical bd-flex-wide">
                    
                    <div class=" bd-layoutitemsbox-26 bd-flex-wide">
    <div class=" bd-content-8">
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
                    
                </div>
                
            </div>
            
        </div>
    </div>
</div></div>
	
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
    <?php if ($emailclose== 1) { ?><i class="icon-envelope"></i> <?php echo $document->params->get('emf'); ?> <?php } ?>
<?php if ($telephoneclose == 1) { ?><i class="icon-dialer"></i> <?php echo $document->params->get('tef'); ?><?php } ?>
<?php if ($skypeclose == 1) { ?><i class="icon-skype"></i> <?php echo $document->params->get('skype'); ?><?php } ?>
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
</body>
</html>