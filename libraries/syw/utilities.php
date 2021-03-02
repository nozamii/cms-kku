<?php
/**
 * @copyright	Copyright (C) 2011 Simplify Your Web, Inc. All rights reserved.
 * @license		GNU General Public License version 3 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

require_once dirname(__FILE__).'/vendor/Mobile_Detect.php';

jimport('joomla.filesystem.file');

class SYWUtilities
{
	static $isMobile = null;
	static $SVGSprites = array();

	/*
	 * Determines if the device is mobile
	 */
	static function isMobile($use_joomla_library = false)
	{
		if (!isset(self::$isMobile)) {

			if ($use_joomla_library) {
				jimport('joomla.environment.browser');
				$browser = JBrowser::getInstance();
				self::$isMobile = $browser->isMobile();
			} else {
				$detect = new SYW_Mobile_Detect;
				self::$isMobile = $detect->isMobile();
			}
		}

		return self::$isMobile;
	}

	/*
	 * DEPRECATED
	 * Returns the google font found in a font family or false if none is found
	 * The returned font is of format "Google Font"
	 */
	static function googleFont($font_family)
	{
		$google_font = false;

		$standard_fonts = array();
		$standard_fonts[] = "Palatino Linotype";
		$standard_fonts[] = "Book Antiqua";
		$standard_fonts[] = "MS Serif";
		$standard_fonts[] = "New York";
		$standard_fonts[] = "Times New Roman";
		$standard_fonts[] = "Arial Black";
		$standard_fonts[] = "Comic Sans MS";
		$standard_fonts[] = "Lucida Sans Unicode";
		$standard_fonts[] = "Lucida Grande";
		$standard_fonts[] = "Trebuchet MS";
		$standard_fonts[] = "MS Sans Serif";
		$standard_fonts[] = "Courier New";
		$standard_fonts[] = "Lucida Console";

		$fonts = explode(',', $font_family);
		foreach ($fonts as $font) {
			if (substr_count($font, '"') == 2) { // found a font with 2 quotes
				$font = trim($font, '"');
				foreach ($standard_fonts as $standard_font) {
					if (strcasecmp($standard_font, $font) == 0) { // identical fonts
						return false;
					}
				}
				$google_font = $font;
			}
		}

		return $google_font;
	}

	/*
	* Returns the google font found in a font family
	* The returned font is of format "Google Font"
	*/
	static function getGoogleFont($font_family)
	{
		$google_font = '';

		$standard_fonts = array();
		$standard_fonts[] = "Palatino Linotype";
		$standard_fonts[] = "Book Antiqua";
		$standard_fonts[] = "MS Serif";
		$standard_fonts[] = "New York";
		$standard_fonts[] = "Times New Roman";
		$standard_fonts[] = "Arial Black";
		$standard_fonts[] = "Comic Sans MS";
		$standard_fonts[] = "Lucida Sans Unicode";
		$standard_fonts[] = "Lucida Grande";
		$standard_fonts[] = "Trebuchet MS";
		$standard_fonts[] = "MS Sans Serif";
		$standard_fonts[] = "Courier New";
		$standard_fonts[] = "Lucida Console";

		$fonts = explode(',', $font_family);
		foreach ($fonts as $font) {
			if (substr_count($font, '"') == 2) { // found a font with 2 quotes
				$font = trim($font, '"');
				foreach ($standard_fonts as $standard_font) {
					if (strcasecmp($standard_font, $font) == 0) { // identical fonts
						return '';
					}
				}
				$google_font = $font;
			}
		}

		return $google_font;
	}

	/*
	 * Transform "Google Font" into Google+Font for use in <link> tag
	 */
	static function getSafeGoogleFont($google_font)
	{
		$font = str_replace(' ', '+', $google_font); // replace spaces by +
		return trim($font, '"');
	}

	/*
	 * Convert a hexa decimal color code to its RGB equivalent
	 *
	 * @param string $hexStr (hexadecimal color value)
	 * @param boolean $returnAsString (if set true, returns the value separated by the separator character. Otherwise returns associative array)
	 * @param string $seperator (to separate RGB values. Applicable only if second parameter is true.)
	 * @return array or string (depending on second parameter. Returns False if invalid hex color value)
	 */
	static function hex2RGB($hexStr, $returnAsString = false, $seperator = ',')
	{
	    $hexStr = preg_replace("/[^0-9A-Fa-f]/", '', $hexStr); // Gets a proper hex string
	    $rgbArray = array();
	    if (strlen($hexStr) == 6) { // if a proper hex code, convert using bitwise operation. No overhead... faster
	        $colorVal = hexdec($hexStr);
	        $rgbArray['red'] = 0xFF & ($colorVal >> 0x10);
	        $rgbArray['green'] = 0xFF & ($colorVal >> 0x8);
	        $rgbArray['blue'] = 0xFF & $colorVal;
	    } elseif (strlen($hexStr) == 3) { // if shorthand notation, need some string manipulations
	        $rgbArray['red'] = hexdec(str_repeat(substr($hexStr, 0, 1), 2));
	        $rgbArray['green'] = hexdec(str_repeat(substr($hexStr, 1, 1), 2));
	        $rgbArray['blue'] = hexdec(str_repeat(substr($hexStr, 2, 1), 2));
	    } else {
	        return false; //Invalid hex color code
	    }

	    return $returnAsString ? implode($seperator, $rgbArray) : $rgbArray; // returns the rgb string or the associative array
	}

	/*
	 * Determine if the Joomla version is Joomla 3
	*/
	static function isJoomla3($and_over = false)
	{
		$version = new JVersion();
		$jversion = explode('.', $version->getShortVersion());
		if ($and_over) {
			if (intval($jversion[0]) > 2) { // Joomla! 3+
				return true;
			}
		} else {
			if (intval($jversion[0]) > 2 && intval($jversion[0]) < 4) { // Joomla! 3 only
				return true;
			}
		}

		return false;
	}

	/*
	 * Bootstrap conversion function (handles Bootstrap 2,3 and 4)
	 * returns default class if Bootstrap version is unknown (or 0)
	 */
	static function getBootstrapProperty($property, $bootstrap_version = 2)
	{
	    $bootstrap_version = intval($bootstrap_version);
	    switch ($property) {

	        // buttons

	        case 'btn': return 'btn'; break; // exists for all versions

	        case 'btn-default': // no default in B2 nor B4
	        	if ($bootstrap_version == 0 || $bootstrap_version == 3) { return 'btn-default'; }
	            break;
	        case 'btn-primary': return 'btn-primary'; break;
	        case 'btn-secondary': // not in B2 nor B3
	        	if ($bootstrap_version == 0 || $bootstrap_version >= 4) { return 'btn-secondary'; }
	            break;
	        case 'btn-info': return 'btn-info'; break;
	        case 'btn-warning': return 'btn-warning'; break;
	        case 'btn-danger': return 'btn-danger'; break;
	        case 'btn-success': return 'btn-success'; break;
	        case 'btn-link': return 'btn-link'; break;
	        case 'btn-inverse': // no inverse for B3 and B4
	        	if ($bootstrap_version == 0 || $bootstrap_version == 2) { return 'btn-inverse'; }
	            break;
	        case 'btn-light': // not in B2 nor B3
	        	if ($bootstrap_version == 0 || $bootstrap_version >= 4) { return 'btn-light'; }
	            break;
	        case 'btn-dark': // not in B2 nor B3
	        	if ($bootstrap_version == 0 || $bootstrap_version >= 4) { return 'btn-dark'; }
	            break;
	        case 'btn-block': return 'btn-block'; break;
	        case 'btn-large':
	            if ($bootstrap_version == 2) { return 'btn-large'; }
	            return 'btn-lg';
	            break;
	        case 'btn-small':
	            if ($bootstrap_version == 2) { return 'btn-small'; }
	            return 'btn-sm';
	            break;
	        case 'btn-mini': // no xs in B4
	            if ($bootstrap_version == 2) { return 'btn-mini'; }
	            if ($bootstrap_version == 0 || $bootstrap_version == 3) { return 'btn-xs'; }
	            return 'btn-sm';
	            break;

	        // labels

	        case 'label':
	        	if ($bootstrap_version < 4) { return 'label'; }
	            return 'badge';
	            break;
	        case 'label-default': // no default in B2 nor B4
	        	if ($bootstrap_version == 0 || $bootstrap_version == 3) { return 'label-default'; }
	            break;
	        case 'label-primary': // no primary in B2
	        	if ($bootstrap_version == 0 || $bootstrap_version == 3) { return 'label-primary'; }
	            if ($bootstrap_version >= 4) { return 'badge-primary'; }
	            break;
	        case 'label-secondary': // not in B2 nor B3
	        	if ($bootstrap_version == 0 || $bootstrap_version >= 4) { return 'badge-secondary'; }
	            break;
	        case 'label-info':
	            if ($bootstrap_version < 4) { return 'label-info'; }
	            return 'badge-info';
	            break;
	        case 'label-warning':
	            if ($bootstrap_version < 4) { return 'label-warning'; }
	            return 'badge-warning';
	            break;
	        case 'label-important':
	            if ($bootstrap_version == 2) { return 'label-important'; }
	            if ($bootstrap_version == 0 || $bootstrap_version == 3) { return 'label-danger'; }
	            return 'badge-danger';
	            break;
	        case 'label-success':
	            if ($bootstrap_version < 4) { return 'label-success'; }
	            return 'badge-success';
	            break;
	        case 'label-inverse': // no inverse for B3 and B4
	        	if ($bootstrap_version == 0 || $bootstrap_version == 2) { return 'label-inverse'; }
	            break;
	        case 'label-light': // not in B2 nor B3
	        	if ($bootstrap_version == 0) { return 'label-light'; }
	            if ($bootstrap_version >= 4) { return 'badge-light'; }
	            break;
	        case 'label-dark': // not in B2 nor B3
	        	if ($bootstrap_version == 0) { return 'label-dark'; }
	            if ($bootstrap_version >= 4) { return 'badge-dark'; }
	            break;

	        // badges-pills

	        case 'badge':
	        	if ($bootstrap_version < 4) { return 'badge'; }
	            return 'badge badge-pill';
	            break;
	        case 'badge-default': // no default in B2, B3 nor B4
	        	if ($bootstrap_version == 0) { return 'badge-default'; }
	        	break;
	        case 'badge-primary': // no primary in B2 nor B3
	        	if ($bootstrap_version == 0 || $bootstrap_version >= 4) { return 'badge-primary'; }
	            break;
	        case 'badge-secondary': // not in B2 nor B3
	        	if ($bootstrap_version == 0 || $bootstrap_version >= 4) { return 'badge-secondary'; }
	            break;
	        case 'badge-info': // not in B3
	        	if ($bootstrap_version == 0 || $bootstrap_version == 2 || $bootstrap_version >= 4) { return 'badge-info'; }
	            break;
	        case 'badge-warning': // not in B3
	        	if ($bootstrap_version == 0 || $bootstrap_version == 2 || $bootstrap_version >= 4) { return 'badge-warning'; }
	            break;
	        case 'badge-important': // not in B3
	            if ($bootstrap_version == 2) { return 'badge-important'; }
	            if ($bootstrap_version == 0 || $bootstrap_version >= 4) { return 'badge-danger'; }
	            break;
	        case 'badge-success': // not in B3
	        	if ($bootstrap_version == 0 || $bootstrap_version == 2 || $bootstrap_version >= 4) { return 'badge-success'; }
	            break;
	        case 'badge-inverse': // no inverse for B3 and B4
	        	if ($bootstrap_version == 0 || $bootstrap_version == 2) { return 'badge-inverse'; }
	            break;
	        case 'badge-light': // not in B2 nor B3
	        	if ($bootstrap_version == 0 || $bootstrap_version >= 4) { return 'badge-light'; }
	            break;
	        case 'badge-dark': // not in B2 nor B3
	        	if ($bootstrap_version == 0 || $bootstrap_version >= 4) { return 'badge-dark'; }
	            break;

	        // alerts

	        case 'alert': return 'alert'; break; // exists for all versions

	        case 'alert-primary': // not in B2 nor B3
	        	if ($bootstrap_version == 0 || $bootstrap_version >= 4) { return 'alert-primary'; }
	            break;
	        case 'alert-secondary': // not in B2 nor B3
	        	if ($bootstrap_version == 0 || $bootstrap_version >= 4) { return 'alert-secondary'; }
	            break;
	        case 'alert-info': return 'alert-info'; break;
	        case 'alert-success': return 'alert-success'; break;
	        case 'alert-warning': // no B2
	        	if ($bootstrap_version == 0 || $bootstrap_version >= 3) { return 'alert-warning'; }
	            break;
	        case 'alert-error':
	            if ($bootstrap_version == 2) { return 'alert-error'; }
	            return 'alert-danger';
	            break;
	        case 'alert-light': // not in B2 nor B3
	        	if ($bootstrap_version == 0 || $bootstrap_version >= 4) { return 'alert-light'; }
	            break;
	        case 'alert-dark': // not in B2 nor B3
	        	if ($bootstrap_version == 0 || $bootstrap_version >= 4) { return 'alert-dark'; }
	            break;

	        // pagination

	        case 'pagination': return 'pagination'; break; // exists for all versions

	        case 'pagination-large':
	            if ($bootstrap_version == 2) { return 'pagination-large'; }
	            return 'pagination-lg';
	            break;
	        case 'pagination-small':
	            if ($bootstrap_version == 2) { return 'pagination-small'; }
	            return 'pagination-sm';
	            break;
	        case 'pagination-mini':
	            if ($bootstrap_version == 0) { return 'pagination-xs'; }
	            if ($bootstrap_version == 2) { return 'pagination-mini'; }
	            return 'pagination-sm';
	            break;
	        case 'pagination-left':
	        	if ($bootstrap_version == 0) { return 'pagination-left'; }
	        	break;
	        case 'pagination-center':
	        	if ($bootstrap_version == 0) { return 'pagination-center'; }
	            if ($bootstrap_version >= 4) { return 'justify-content-center'; }
	            break;
	        case 'pagination-right':
	        	if ($bootstrap_version == 0) { return 'pagination-right'; }
	            if ($bootstrap_version >= 4) { return 'justify-content-end'; }
	            break;

	        // align

	        case 'float-right':
	        	if ($bootstrap_version == 0 || $bootstrap_version >= 4) { return 'float-right'; }
	            return 'pull-right';
	            break;
	        case 'float-left':
	        	if ($bootstrap_version == 0 || $bootstrap_version >= 4) { return 'float-left'; }
	            return 'pull-left';
	            break;
	        case 'float-none':
	        	if ($bootstrap_version == 0 || $bootstrap_version >= 4) { return 'float-none'; }
	            break;

	        // clearfix exists for all versions

	        // hidden on the phone

	        case 'hidden-phone':
	        	switch ($bootstrap_version) {
	        		case 0: case 2: return 'hidden-phone'; break;
	        		case 3: return 'hidden-xs'; break;
	        		default: return 'd-none d-sm-block'; break;
	        	}
	        	break;
	    }

	    return '';
	}

	/**
	 * output inline svg with reusable sprites and avoid duplicate code
	 *
	 * @param string $spriteId
	 * @param array $svg_attributes
	 * @param array $path_attributes
	 */
	//static function getInlineSVG($spriteName, $path = JURI::root(true).'/media/syw/svg')
	static function getInlineSVG($spriteId, $svg_attributes, $path_attributes)
	{
		$output = '';

		if (!isset(self::$SVGSprites['syw_' .$spriteId])) {

			$output .= '<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">';

			$attributes = '';
			if (isset($svg_attributes['viewbox'])) {
				$attributes .= ' viewBox="' . $svg_attributes['viewbox'] . '"';
			}

			$output .= '<symbol id="' . $spriteId . '"' . $attributes . '>';

			$attributes = '';
			foreach ($path_attributes as $attribute => $value) {
				$attributes .= ' ' . $attribute . '="' . $value . '"';
			}

			$output .= '<path' . $attributes . '></path>';

			$output .= '</symbol>';

			$output .= '</svg>';

			self::$SVGSprites['syw_' .$spriteId] = true;
		}

		$attributes = '';
		foreach ($svg_attributes as $attribute => $value) {
			if ($attribute != 'viewbox') {
				$attributes .= ' ' . $attribute . '="' . $value . '"';
			}
		}

		$output .= '<svg' . $attributes . '>';

		$output .= '<use xlink:href="#' . $spriteId . '" />';

		$output .= '</svg>';

		return $output;
	}

	/**
	 * Output the <picture> or <img> HTML element according to the image source
	 * Follows web standards and ensures proper fallbacks
	 * If the image extension is webp, it adds a png fallback
	 *
	 * @param string $src the image source
	 * @param string $alt the image alt attribute
	 * @param array $attributes attributes to be added to the <img> element (can contain width and height for the image)
	 * @param boolean $lazy_load lazy load the image
	 * @param boolean $high_resolution handle high resolution devices
	 * @param array breakpoints the possible breakpoints to use for media queries (ordered from lower to higher)
	 * @param boolean check the file existence, use when full control over the creation of images
	 * @return string the <picture> or <img> element
	 */
	public static function getImageElement($src, $alt, $attributes = array(), $lazy_load = false, $high_resolution = false, $breakpoints = null, $check_files = true)
	{
		$html = '';

		$extensions_needing_fallbacks = array('webp', 'avif');
		$mime_types = array('jpg' => 'image/jpeg', 'jpeg' => 'image/jpeg', 'png' => 'image/png', 'gif' => 'image/gif', 'webp' => 'image/webp', 'avif' => 'image/avif');
		$possible_fallback_extensions = array('png', 'jpg');

		// get the image extension and the image path from $src
		$source_path = JFile::stripExt($src);
		$source_extension = JFile::getExt($src);

		if (!$lazy_load) {
			$attributes['loading'] = 'eager';
		} else {
			$attributes['loading'] = 'lazy';
		}

		if (!empty($breakpoints)) {

			$html .= '<picture>';

			foreach ($breakpoints as $breakpoint) {

				$source_highres_breakpoint = false;
				if ($high_resolution) {
					if ($check_files) {
						if (JFile::exists(JPATH_SITE . '/' . $source_path . '_' . $breakpoint . '@2x.' . $source_extension)) {
							$source_highres_breakpoint = true;
						}
					} else {
						$source_highres_breakpoint = true;
					}
				}

				$fallback_breakpoint = false;
				$fallback_extension_breakpoint = 'png';
				$fallback_highres_breakpoint = false;

				if (in_array($source_extension, $extensions_needing_fallbacks)) {

					if ($check_files) {
						foreach ($possible_fallback_extensions as $possible_fallback_extension) {
							if (JFile::exists(JPATH_SITE . '/' . $source_path . '_' . $breakpoint . '.' . $possible_fallback_extension)) {
								$fallback_breakpoint = true;
								$fallback_extension_breakpoint = $possible_fallback_extension;
								if ($high_resolution && JFile::exists(JPATH_SITE . '/' . $source_path . '_' . $breakpoint . '@2x.' . $possible_fallback_extension)) {
									$fallback_highres_breakpoint = true;
								}
								break;
							}
						}
					} else {
						$fallback_breakpoint = true;
						if ($high_resolution) {
							$fallback_highres_breakpoint = true;
						}
					}
				}

				$html .= '<source type="' . $mime_types[$source_extension] . '" media="(max-width: ' . $breakpoint . 'px)" srcset="' . $source_path . '_' . $breakpoint . '.' . $source_extension . ($source_highres_breakpoint ? ' 1x,' . $source_path . '_' . $breakpoint . '@2x.' . $source_extension . ' 2x' : '') . '">';
				if ($fallback_breakpoint) {
					$html .= '<source type="' . $mime_types[$fallback_extension_breakpoint] . '" media="(max-width: ' . $breakpoint . 'px)" srcset="' . $source_path . '_' . $breakpoint . '.' . $fallback_extension_breakpoint . ($fallback_highres_breakpoint ? ' 1x,' . $source_path . '_' . $breakpoint . '@2x.' . $fallback_extension_breakpoint . ' 2x' : '') . '">';
				}
			}

			$source_highres = false;
			if ($high_resolution) {
				if ($check_files) {
					if (JFile::exists(JPATH_SITE . '/' . $source_path . '@2x.' . $source_extension)) {
						$source_highres = true;
					}
				} else {
					$source_highres = true;
				}
			}

			$fallback = false;
			$fallback_extension = 'png';
			$fallback_highres = false;

			if (in_array($source_extension, $extensions_needing_fallbacks)) {

				if ($check_files) {
					foreach ($possible_fallback_extensions as $possible_fallback_extension) {
						if (JFile::exists(JPATH_SITE . '/' . $source_path . '.' . $possible_fallback_extension)) {
							$fallback = true;
							$fallback_extension = $possible_fallback_extension;
							if ($high_resolution && JFile::exists(JPATH_SITE . '/' . $source_path . '@2x.' . $possible_fallback_extension)) {
								$fallback_highres = true;
							}
							break;
						}
					}
				} else {
					$fallback = true;
					if ($high_resolution) {
						$fallback_highres = true;
					}
				}
			}

			if ($fallback) {
				$html .= '<source type="' . $mime_types[$source_extension] . '" srcset="' . $src . ($source_highres ? ' 1x,' . $source_path . '@2x.' . $source_extension . ' 2x' : '') . '">';
			}

			if ($fallback) {
				if ($fallback_highres) {
					$attributes['srcset'] = $source_path . '@2x.' . $fallback_extension . ' 2x';
				}
			} else {
				if ($source_highres) {
					$attributes['srcset'] = $source_path . '@2x.' . $source_extension . ' 2x';
				}
			}

			$html .= JHtml::_('image', $fallback ? $source_path . '.' . $fallback_extension : $src, $alt, $attributes);

			$html .= '</picture>';

		} else {

			$source_highres = false;
			if ($high_resolution) {
				if ($check_files) {
					if (JFile::exists(JPATH_SITE . '/' . $source_path . '@2x.' . $source_extension)) {
						$source_highres = true;
					}
				} else {
					$source_highres = true;
				}
			}

			$fallback = false;
			$fallback_extension = 'png';
			$fallback_highres = false;

			if (in_array($source_extension, $extensions_needing_fallbacks)) {

				if ($check_files) {
					foreach ($possible_fallback_extensions as $possible_fallback_extension) {
						if (JFile::exists(JPATH_SITE . '/' . $source_path . '.' . $possible_fallback_extension)) {
							$fallback = true;
							$fallback_extension = $possible_fallback_extension;
							if ($high_resolution && JFile::exists(JPATH_SITE . '/' . $source_path . '@2x.' . $possible_fallback_extension)) {
								$fallback_highres = true;
							}
							break;
						}
					}
				} else {
					$fallback = true;
					if ($high_resolution) {
						$fallback_highres = true;
					}
				}
			}

			if ($fallback) {
				$html .= '<picture>';
			}

			if ($fallback) {
				$html .= '<source type="' . $mime_types[$source_extension] . '" srcset="' . $src . ($source_highres ? ' 1x,' . $source_path . '@2x.' . $source_extension . ' 2x' : '') . '">';
			}

			if ($fallback) {
				if ($fallback_highres) {
					$attributes['srcset'] = $source_path . '@2x.' . $fallback_extension . ' 2x';
				}
			} else {
				if ($source_highres) {
					$attributes['srcset'] = $source_path . '@2x.' . $source_extension . ' 2x';
				}
			}

			$html .= JHtml::_('image', $fallback ? $source_path . '.' . $fallback_extension : $src, $alt, $attributes);

			if ($fallback) {
				$html .= '</picture>';
			}
		}

		return $html;
	}

}
?>
