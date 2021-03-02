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
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport('joomla.form.formfield');
class JFormFieldAsset extends JFormField
{
	protected	$type = 'Asset';
	
	protected function getInput() {
		$doc = JFactory::getDocument();	

		return null;
	}
} 
?>