<?php
/**
 * @copyright	Copyright (C) 2011 Simplify Your Web, Inc. All rights reserved.
 * @license		GNU General Public License version 3 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Installer\Installer;
use Joomla\CMS\Installer\InstallerHelper;

jimport('joomla.filesystem.file');
jimport('joomla.filesystem.folder');

/**
 * Script file for the packaged Truly Responsive Slides module
 */
class pkg_trulyresponsiveslidesInstallerScript
{
	static $version = '2.0.1';
	static $minimum_needed_library_version = '1.6.3';
	static $available_languages = array('en-GB', 'fa-IR', 'fr-FR', 'nl-NL', 'pl-PL', 'ru-RU', 'sl-SI', 'tr-TR');
	static $download_link = 'https://simplifyyourweb.com/downloads/syw-extension-library';
	static $changelog_link = 'https://simplifyyourweb.com/free-products/truly-responsive-slides/file/369-truly-responsive-slides';
	static $translation_link = 'https://simplifyyourweb.com/translators';

	/**
	 * Called before an install/update method
	 *
	 * @return  boolean  True on success
	 */
	public function preflight($type, $parent)
	{
	    // make sure we are under Joomla 3.8 or over

		if (version_compare(JVERSION, '3.8.0', 'lt') || version_compare(JVERSION, '3.11.0', 'gt')) {
			// keep JFactory and JText so that if installed in Joomla < 3.8, it does not crash but shows the message
			JFactory::getApplication()->enqueueMessage(JText::sprintf('JOOMLA_REQUIRED_VERSION', '3.8', 'https://simplifyyourweb.com/free-products/truly-responsive-slides#downloads'), 'error');
			return false;
		}

	    if ($type == 'install' || $type == 'update') {

		// check if syw library is present

    		if (!\JFolder::exists(JPATH_ROOT.'/libraries/syw')) {

    			if (!$this->installOrUpdatePackage($parent, 'lib_syw')) {
    				$message = Text::_('SYWLIBRARY_INSTALLFAILED').'<br /><a href="'.self::$download_link.'" target="_blank">'.Text::_('SYWLIBRARY_DOWNLOAD').'</a>';
    				Factory::getApplication()->enqueueMessage($message, 'error');
    				return false;
    			}

    			Factory::getApplication()->enqueueMessage(Text::sprintf('SYWLIBRARY_INSTALLED', self::$minimum_needed_library_version), 'message');

    		} else {
    		    jimport('syw.version', JPATH_LIBRARIES);

    			if (SYWVersion::isCompatible(self::$minimum_needed_library_version)) {

    				Factory::getApplication()->enqueueMessage(Text::_('SYWLIBRARY_COMPATIBLE'), 'message');

    			} else {

    				if (!$this->installOrUpdatePackage($parent, 'lib_syw')) {
    					$message = Text::_('SYWLIBRARY_UPDATEFAILED').'<br />'.Text::_('SYWLIBRARY_UPDATE');
    					Factory::getApplication()->enqueueMessage($message, 'error');
    					return false;
    				}

    				Factory::getApplication()->enqueueMessage(Text::sprintf('SYWLIBRARY_UPDATED', self::$minimum_needed_library_version), 'message');
    			}
    		}
	    }

		return true;
	}

	/**
	 * Called after an install/update method
	 *
	 * @return  boolean  True on success
	 */
	public function postflight($type, $parent, $results)
	{
	    if ($type == 'install' || $type == 'update') {

	        echo '<p style="margin: 10px 0 20px 0">';
	        echo '<img src="../modules/mod_trulyresponsiveslides/images/logo.png" />';
	        echo '<br /><br /><span class="label">'.Text::sprintf('PKG_TRULYRESPONSIVESLIDES_VERSION', self::$version).'</span>';
	        echo '<br /><br />Olivier Buisard @ <a href="http://www.simplifyyourweb.com" target="_blank">Simplify Your Web</a>';
	        echo '</p>';

     		// language test

     		$current_language = Factory::getLanguage()->getTag();
     		if (!in_array($current_language, self::$available_languages)) {
     			Factory::getApplication()->enqueueMessage('The ' . Factory::getLanguage()->getName() . ' language is missing for this extension.<br /><a href="' . self::$translation_link . '" target="_blank">Please consider contributing to its translation</a>', 'notice');
     		}

     		// link to Quickstart

     		$message = Text::sprintf('PKG_TRULYRESPONSIVESLIDES_INFO_LEARN', 'https://simplifyyourweb.com/documentation/truly-responsive-slides/quickstart-guide');
     		$message .= '<br /><br /><a href="https://simplifyyourweb.com/documentation/truly-responsive-slides/quickstart-guide" target="_blank"><img src="../modules/mod_trulyresponsiveslides/images/quickstart.png" /></a>';

     		Factory::getApplication()->enqueueMessage($message, 'notice');

     		// remove the old module update site for when it was not packaged

     		$this->removeUpdateSite('module', 'mod_trulyresponsiveslides');
     		$this->removeUpdateSite('package', 'pkg_trulyresponsiveslides', '', 'http://www.barejoomlatemplates.com/autoupdates/trulyresponsiveslides/trulyresponsiveslides-pkg-update.xml');
		}

		if ($type == 'update') {

			// update warning

			Factory::getApplication()->enqueueMessage(Text::sprintf('PKG_TRULYRESPONSIVESLIDES_WARNING_RELEASENOTES', self::$changelog_link), 'warning');

			// delete unnecessary files

			$files = array(
				'/modules/mod_trulyresponsiveslides/css/stylemaster.css.php',
				'/modules/mod_trulyresponsiveslides/css/flexslider-min.css',
				'/modules/mod_trulyresponsiveslides/css/flexslider.css',
				'/modules/mod_trulyresponsiveslides/js/jquery.flexslider-min.js',
				'/modules/mod_trulyresponsiveslides/js/jquery.flexslider.js',
				'/modules/mod_trulyresponsiveslides/js/jquery.flexslider.extend-min.js',
				'/modules/mod_trulyresponsiveslides/js/jquery.flexslider.extend.js',
				'/modules/mod_trulyresponsiveslides/images/loading.png'
			);

			foreach ($files as $file) {
				if (\JFile::exists(JPATH_ROOT.$file) && !\JFile::delete(JPATH_ROOT.$file)) {
					Factory::getApplication()->enqueueMessage(Text::sprintf('PKG_TRULYRESPONSIVESLIDES_ERROR_DELETINGFILEFOLDER', $file), 'warning');
				}
			}

			// remove old cached headers which may interfere with fixes, updates or new additions

			$filenames_to_delete = array();

			if (function_exists('glob')) {

				$filenames = glob(JPATH_SITE.'/cache/mod_trulyresponsiveslides/style_*.css');
	 			if ($filenames != false) {
	 				$filenames_to_delete = array_merge($filenames_to_delete, $filenames);
	 			}

	 			$filenames = glob(JPATH_SITE.'/cache/mod_trulyresponsiveslides/animation_*.js');
	 			if ($filenames != false) {
	 				$filenames_to_delete = array_merge($filenames_to_delete, $filenames);
	 			}

				// from previous versions

				$filenames = glob(JPATH_ROOT.'/modules/mod_trulyresponsiveslides/css/style_*.css');
				if ($filenames != false) {
					$filenames_to_delete = array_merge($filenames_to_delete, $filenames);
				}

				$filenames = glob(JPATH_ROOT.'/modules/mod_trulyresponsiveslides/js/animation_*.js');
				if ($filenames != false) {
					$filenames_to_delete = array_merge($filenames_to_delete, $filenames);
				}
			}

			foreach ($filenames_to_delete as $filename) {
				if (\JFile::exists($filename) && !\JFile::delete($filename)) {
					Factory::getApplication()->enqueueMessage(Text::sprintf('PKG_TRULYRESPONSIVESLIDES_ERROR_DELETINGFILEFOLDER', $filename), 'warning');
				}
			}

			// overrides warning

			$defaultemplate = $this->getDefaultTemplate();

			if ($defaultemplate) {
				$overrides_path = JPATH_ROOT.'/templates/'.$defaultemplate.'/html/';

				if (\JFolder::exists($overrides_path.'mod_trulyresponsiveslides')) {
					Factory::getApplication()->enqueueMessage(Text::_('PKG_TRULYRESPONSIVESLIDES_WARNING_OVERRIDES'), 'warning');
				}
			}

			// transition type changes

			$db = Factory::getDBO();

			$query = $db->getQuery(true);

			$query->select('id');
			$query->select('params');
			$query->from('#__modules');
			$query->where($db->quoteName('module').'='.$db->quote('mod_trulyresponsiveslides'));

			$db->setQuery($query);

			$trs_instances = array();
			try {
				$trs_instances = $db->loadObjectList();
			} catch (\RuntimeException $e) {
				Factory::getApplication()->enqueueMessage(Text::_('JERROR_AN_ERROR_HAS_OCCURRED'), 'error');
				return false;
			}

			foreach ($trs_instances as $trs_instance) {

				// get info fields and transform them into new subform

				$instance_params = json_decode($trs_instance->params, true);

				$changes_made = false;

				if (isset($instance_params['direction'])) {

					if ($instance_params['type'] === 'slide' && $instance_params['direction'] === 'vertical') {
						$instance_params['type'] = 'slidev';

						$changes_made = true;
					}
				}

				if ($changes_made) {

					$query->clear();

					$query->update('#__modules');
					$query->set($db->quoteName('params').'='.$db->quote(json_encode($instance_params)));
					$query->where($db->quoteName('id').'='.$db->quote($trs_instance->id));

					$db->setQuery($query);

					try {
						$db->execute();
					} catch (\RuntimeException $e) {
						Factory::getApplication()->enqueueMessage(Text::_('JERROR_AN_ERROR_HAS_OCCURRED'), 'error');
						return false;
					}
				}
			}
		}

		return true;
	}

	private function getDefaultTemplate()
	{
		$db = Factory::getDBO();

		$query = $db->getQuery(true);

		$query->select('template');
		$query->from('#__template_styles');
		$query->where($db->quoteName('client_id').'= 0');
		$query->where($db->quoteName('home').'= 1');

		$db->setQuery($query);

		$defaultemplate = '';

		try {
			$defaultemplate = $db->loadResult();
		} catch (RuntimeException $e) {
			if ($db->getErrorNum()) {
				Factory::getApplication()->enqueueMessage($db->getErrorMsg(), 'warning');
			} else {
				Factory::getApplication()->enqueueMessage(Text::_('JERROR_AN_ERROR_HAS_OCCURRED'), 'error');
			}
		}

		return $defaultemplate;
	}

	private function removeUpdateSite($type, $element, $folder = '', $location = '')
	{
	    $db = Factory::getDBO();

	    $query = $db->getQuery(true);

	    $query->select('extension_id');
	    $query->from('#__extensions');
	    $query->where($db->quoteName('type').'='.$db->quote($type));
	    $query->where($db->quoteName('element').'='.$db->quote($element));
	    if ($folder) {
	        $query->where($db->quoteName('folder').'='.$db->quote($folder));
	    }

	    $db->setQuery($query);

	    $extension_id = '';
	    try {
	        $extension_id = $db->loadResult();
	    } catch (RuntimeException $e) {
	        Factory::getApplication()->enqueueMessage(Text::_('JERROR_AN_ERROR_HAS_OCCURRED'), 'error');
	        return false;
	    }

	    if ($extension_id) {

	        $query->clear();

	        $query->select('update_site_id');
	        $query->from('#__update_sites_extensions');
	        $query->where($db->quoteName('extension_id').'='.$db->quote($extension_id));

	        $db->setQuery($query);

	        $updatesite_id = array(); // can have several results
	        try {
	            $updatesite_id = $db->loadColumn();
	        } catch (RuntimeException $e) {
	            Factory::getApplication()->enqueueMessage(Text::_('JERROR_AN_ERROR_HAS_OCCURRED'), 'error');
	            return false;
	        }

	        if (empty($updatesite_id)) {
	            return false;
	        } else if (count($updatesite_id) == 1) {

	            $query->clear();

	            $query->delete($db->quoteName('#__update_sites'));
	            $query->where($db->quoteName('update_site_id').' = '.$db->quote($updatesite_id[0]));

	            $db->setQuery($query);

	            try {
	                $db->execute();
	            } catch (RuntimeException $e) {
	                Factory::getApplication()->enqueueMessage(Text::_('JERROR_AN_ERROR_HAS_OCCURRED'), 'error');
	                return false;
	            }
	        } else { // several update sites exist for the same extension therefore we need to specify which to delete

	            if ($location) {
	                $query->clear();

	                $query->delete($db->quoteName('#__update_sites'));
	                $query->where($db->quoteName('update_site_id').' IN ('.implode(',', $updatesite_id).')');
	                $query->where($db->quoteName('location').' = '.$db->quote($location));

	                $db->setQuery($query);

	                try {
	                    $db->execute();
	                } catch (RuntimeException $e) {
	                    Factory::getApplication()->enqueueMessage(Text::_('JERROR_AN_ERROR_HAS_OCCURRED'), 'error');
	                    return false;
	                }
	            } else {
	                return false;
	            }
	        }
	    } else {
	        return false;
	    }

	    return true;
	}

	private function installOrUpdatePackage($parent, $package_name, $installation_type = 'install')
	{
		// Get the path to the package

		$sourcePath = $parent->getParent()->getPath('source');
		$sourcePackage = $sourcePath . '/packages/'.$package_name.'.zip';

		// Extract and install the package

		$package = InstallerHelper::unpack($sourcePackage);
		$tmpInstaller = new Installer();

		try {
			if ($installation_type == 'install') {
				$installResult = $tmpInstaller->install($package['dir']);
			} else {
				$installResult = $tmpInstaller->update($package['dir']);
			}
		} catch (\Exception $e) {
			return false;
		}

		return true;
	}

	/**
	 * Called on installation
	 *
	 * @return  boolean  True on success
	 */
	public function install($parent) {}

	/**
	 * Called on update
	 *
	 * @return  boolean  True on success
	 */
	public function update($parent) {}

	/**
	 * Called on uninstallation
	 */
	public function uninstall($parent) {}

}
?>