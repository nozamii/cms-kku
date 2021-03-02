<?php
/**
 * @version    $Id$
 * @package    JSN Extension Framework 2
 * @author     JoomlaShine Team <support@joomlashine.com>
 * @copyright  Copyright (C) 2012 JoomlaShine.com. All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 *
 * Websites: http://www.joomlashine.com
 * Technical Support:  Feedback - http://www.joomlashine.com/contact-us/get-support.html
 */

// No direct access to this file.
defined('_JEXEC') or die('Restricted access');

// Define necessary constants for the plugin.
define('JSNEXTFW_ID', 'ext_framework2');
define('JSNEXTFW_VERSION', '1.1.6');
define('JSNEXTFW_RELEASED_DATE', '02/01/2021');

define('JSNEXTFW_PATH', dirname(__FILE__));
define('JSNEXTFW_URL', JUri::root(true) . '/plugins/system/jsnextfw');

// Define common URLs for communicating with JoomlaShine server.
$urls = array(
	'JSN_SUPPORT_URL' => 'https://www.joomlashine.com/forum.html',
	'JSN_CUSTOMER_AREA_URL' => 'https://www.joomlashine.com/customer-area/licenses.html',
	'JSN_POST_CLIENT_INFO_URL' => 'https://www.joomlashine.com/index.php?option=com_lightcart&view=clientinfo&task=clientinfo.getclientinfo',

	'JSN_VERSIONING_URL' => 'https://www.joomlashine.com/versioning/product_version.php',
	'JSN_GET_BANNER_URL' => 'https://www.joomlashine.com/index.php?option=com_lightcart&view=adsbanners&task=adsbanners.getBanners&tmpl=component&type=json',

	'JSN_GET_TOKEN_URL' => 'https://www.joomlashine.com/index.php?option=com_lightcart&view=token&task=token.gettoken',
	'JSN_GET_LICENSE_URL' => 'https://www.joomlashine.com/index.php?option=com_lightcart&view=authenticationapi&task=authenticationapi.getEdition&tmpl=component',
	'JSN_JOIN_TRIAL_URL' => 'https://www.joomlashine.com/index.php?option=com_lightcart&view=authenticationapi&task=authenticationapi.createTrialOrder&tmpl=component',

	'JSN_GET_PRODUCT_UPDATE_URL' => 'https://www.joomlashine.com/index.php?option=com_lightcart&view=authenticationapi&task=authenticationapi.getUpdate&tmpl=component',
	'JSN_GET_DEPENDENCY_UPDATE_URL' => 'https://www.joomlashine.com/index.php?option=com_lightcart&controller=remoteconnectauthentication&task=authenticate&tmpl=component&upgrade=yes',

	'JSN_GET_FEEDBACK_OPTIONS_URL' => 'https://www.joomlashine.com/index.php?option=com_lightcart&view=authenticationapi&task=authenticationapi.getFeedbackOptions&type=product-uninstall&tmpl=component',
	'JSN_POST_CUSTOMER_FEEDBACK_URL' => 'https://www.joomlashine.com/index.php?option=com_lightcart&view=authenticationapi&task=authenticationapi.collectFeedback&feedback_type=product&feedback_sub_type=uninstall&tmpl=component'
);

foreach ($urls as $key => $url)
{
	defined($key) || define($key, $url);
}
