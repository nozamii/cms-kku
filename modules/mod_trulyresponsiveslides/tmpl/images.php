<?php
/**
 * @copyright	Copyright (C) 2011 Simplify Your Web, Inc. All rights reserved.
 * @license		GNU General Public License version 3 or later; see LICENSE.txt
 */

	// no direct access
	defined('_JEXEC') or die;

	use Joomla\CMS\Language\Text;
	use Joomla\CMS\Uri\Uri;

	require_once(JPATH_SITE.'/modules/mod_trulyresponsiveslides/helpers/helper.php');

	jimport('syw.utilities', JPATH_LIBRARIES);
	jimport('syw.cache', JPATH_LIBRARIES);

	if ($layout != 'images') {
		$errors[] = array(Text::_('MOD_TRULYRESPONSIVESLIDER_ERROR_WRONGLAYOUT'), 'error');
	} elseif (is_null($list)) {
		$errors[] = array(Text::_('MOD_TRULYRESPONSIVESLIDER_ERROR_FOLDERDOESNOTEXIST'), 'error');
	} elseif (empty($list)) {
		$errors[] = array(Text::_('MOD_TRULYRESPONSIVESLIDER_ERROR_NOSLIDE'), 'warning');
	} else {

		$thumb_width_percent = '';

		$directory = $params->get('images_folder');

		$result = modTrulyResponsiveSlidesHelper::createImages($params, $class_suffix, $list, 'images'.$directory.'/');
		if (!$result) {
			$errors[] = array(Text::_('MOD_TRULYRESPONSIVESLIDER_ERROR_NOIMAGESCREATED'), 'warning');
		}

		$list = modTrulyResponsiveSlidesHelper::getImageList($params, $class_suffix, $list, 'images'.$directory.'/');

		if ($animation == 'withthumb') {

			$result = modTrulyResponsiveSlidesHelper::createThumbnails($params, $class_suffix, $list, '');
			if (!$result) {
				$errors[] = array(Text::_('MOD_TRULYRESPONSIVESLIDER_ERROR_NOTHUMBNAILSCREATED'), 'warning');
			}

			// set number of thumbs images per line when not in a carousel -> % of space taken
			if (!empty($max_width)) {
				$thumb_width_percent = 100 / floor(floatval($max_width) / floatval($thumb_width));
			}
		}

		/* alts */

		$alts = array_map('trim', (array) explode("\n", $params->get('alts')));

		$extended_alts = array();
		foreach ($alts as $alt) {
			$alt = trim($alt, 'x');
			if (!empty($alt)) {
				$extended_alts[] = $alt;
			} else {
				$extended_alts[] = '';
			}
		}

		/* caption, position */

		$captions = array_map('trim', (array) explode("\n", $params->get('captions')));
		$coordinate = $default_position;

		$extended_captions = array();
		foreach ($captions as $caption) {
			$caption = trim($caption, 'x');
			if (!empty($caption)) {
				$extended_caption = '<div class="innercaption coordinate-'.$coordinate.' simple_caption">';
				$extended_caption .= '<div class="caption_content">'.$caption.'</div>';
				$extended_caption .= '</div>';
				$extended_captions[] = $extended_caption;
			} else {
				$extended_captions[] = '';
			}
		}

		$params->set('thumb_width_percent', $thumb_width_percent);

		// caching the stylesheet

		$cache_css = new TRS_CSSFileCache('mod_trulyresponsiveslides', $params);
		if (!empty($style_overrides)) {
			$cache_css->addDeclaration($style_overrides);
		}
		$result = $cache_css->cache('style_'.$module->id.'.css', $clear_header_files_cache);

		if ($result) {
			$doc->addStyleSheet(Uri::base(true).'/cache/mod_trulyresponsiveslides/style_'.$module->id.'.css');
		}

		// caching the scripts

		$extra_class = ' ';
		$scriptDeclaration = 'jQuery(document).ready(function($) {';

		switch ($animation) {
			case 'withthumb':
				$extra_class .= 'auto_thumbs';
				$scriptDeclaration .= modTrulyResponsiveSlidesHelper::getSliderWithThumbJavascript($params, $class_suffix);
				break;
			default:
				$extra_class .= 'basic';
				$scriptDeclaration .=  modTrulyResponsiveSlidesHelper::getBasicSliderJavascript($params, $class_suffix);
				break;
		}

		$scriptDeclaration .= '});';

		// create javascript file

		$cache_js = new TRS_JSAnimationFileCache('mod_trulyresponsiveslides', $params);
		$cache_js->addDeclaration($scriptDeclaration, 'js');

		if ($inline_scripts) {
			$doc->addScriptDeclaration($cache_js->getBuffer(true));
		} else {
			$result = $cache_js->cache('animation_'.$module->id.'.js', $clear_header_files_cache);

			if ($result) {
				$doc->addScript(Uri::base(true).'/cache/mod_trulyresponsiveslides/animation_'.$module->id.'.js');
			}
		}
	}
?>

<?php if ($show_errors && !empty($errors)) : ?>
	<?php foreach ($errors as $error) : ?>
		<div class="alert <?php echo SYWUtilities::getBootstrapProperty('alert-'.$error[1], $bootstrap_version); ?>">
			<?php echo $error[0]; ?>
		</div>
	<?php endforeach; ?>
<?php endif; ?>

<?php if ($layout == 'images' && !is_null($list) && !empty($list) && empty($errors)) : ?>
	<div id="trs_<?php echo $class_suffix; ?>"<?php if ($isMobile) : ?> class="mobile"<?php endif; ?>>
		<?php if (trim($params->get('pretext', ''))) : ?>
			<div class="pretext">
				<?php if ($params->get('allow_plugins_prepost', 0)) : ?>
					<?php echo HtmlHelper::_('content.prepare', $params->get('pretext')); ?>
				<?php else : ?>
					<?php echo $params->get('pretext'); ?>
				<?php endif; ?>
			</div>
		<?php endif; ?>
		<div class="flexslidercontainer<?php echo $extra_class; ?>">
			<?php if ($animation == 'withthumb') : ?>
				<?php echo modTrulyResponsiveSlidesHelper::getSliderWithThumbHtml($params, $list, $extended_alts, $extended_captions, null, Uri::root(true), $class_suffix); ?>
			<?php else : ?>
				<?php echo modTrulyResponsiveSlidesHelper::getBasicSliderHtml($params, $list, $extended_alts, $extended_captions, null, Uri::root(true), $class_suffix); ?>
			<?php endif; ?>
		</div>
		<?php if ($params->get('out_captions', 0)) : ?>
			<?php echo modTrulyResponsiveSlidesHelper::getOutCaptionsHtml($params, count($list), $extended_captions, null, $class_suffix); ?>
		<?php endif; ?>
		<?php if (trim($params->get('posttext', ''))) : ?>
			<div class="posttext">
				<?php if ($params->get('allow_plugins_prepost', 0)) : ?>
					<?php echo HTMLHelper::_('content.prepare', $params->get('posttext')); ?>
				<?php else : ?>
					<?php echo $params->get('posttext'); ?>
				<?php endif; ?>
			</div>
		<?php endif; ?>
	</div>
<?php endif; ?>
