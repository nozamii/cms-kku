<?php
/**
 * @package   Gantry5
 * @author    RocketTheme http://www.rockettheme.com
 * @copyright Copyright (C) 2007 - 2015 RocketTheme, LLC
 * @license   GNU/GPLv2 and later
 *
 * http://www.gnu.org/licenses/gpl-2.0.html
 */

class_exists('\\Gantry\\Framework\\Gantry') or die;

// Define the template.
class GantryTheme extends \Gantry\Framework\Theme {}

// Initialize theme stream.
$gantry['platform']->set(
    'streams.gantry-theme.prefixes',
    ['' => [
        "gantry-themes://{$gantry['theme.name']}/custom",
        "gantry-themes://{$gantry['theme.name']}",
        "gantry-themes://{$gantry['theme.name']}/common"
    ]]
);

// Define Gantry services.
$gantry['theme'] = function ($c)  {
    return new GantryTheme($c['theme.path'], $c['theme.name']);
};

// Add library
$mailer = JFactory::getMailer();
$config = JFactory::getConfig();
$mailer->setSender($config->get('mailfrom'));
$gantry['mailer'] = $mailer;
if (@$_POST['action'] == 'sendmail'){
  $recipient = $_POST['recipient_email'];
  $subject = $_POST['subject_email'];
  foreach ($_POST as $key => $value) {
    if ($key != "action" && $key != "recipient_email" && $key != "subject_email")
      $body .=  $key." : ".$value."\n";
  }
  preg_match_all('/%([^%]+)%/i',$subject,$m);
  foreach ($m[1] as $key => $value) {
    $find = "%".$value."%";
    $replace = $value;
    $subject = str_replace($find,$_POST[$replace],$subject);
  }

  $subject = $subject.' through '.JURI::current();
  $mailer->setSubject($subject);
  $mailer->addRecipient($recipient);
  $mailer->setBody($body);
  echo $mailer->send();
  exit;
}
