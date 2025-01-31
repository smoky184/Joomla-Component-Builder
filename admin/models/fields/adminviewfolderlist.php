<?php
/**
 * @package    Joomla.Component.Builder
 *
 * @created    30th April, 2015
 * @author     Llewellyn van der Merwe <http://www.joomlacomponentbuilder.com>
 * @gitea      Joomla Component Builder <https://git.vdm.dev/joomla/Component-Builder>
 * @github     Joomla Component Builder <https://github.com/vdm-io/Joomla-Component-Builder>
 * @copyright  Copyright (C) 2015 Vast Development Method. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import the list field type
jimport('joomla.form.helper');
JFormHelper::loadFieldClass('list');

/**
 * Adminviewfolderlist Form Field class for the Componentbuilder component
 */
class JFormFieldAdminviewfolderlist extends JFormFieldList
{
	/**
	 * The adminviewfolderlist field type.
	 *
	 * @var		string
	 */
	public $type = 'adminviewfolderlist';

	/**
	 * Method to get a list of options for a list input.
	 *
	 * @return	array    An array of JHtml options.
	 */
	protected function getOptions()
	{
		// get custom folder files
		$localfolder = JPATH_COMPONENT_ADMINISTRATOR.'/views';
		// set the default
		$options = array();
		// import all needed classes
		jimport('joomla.filesystem.folder');
		// now check if there are files in the folder
		if (JFolder::exists($localfolder) && $folders = JFolder::folders($localfolder))
		{
			if ($this->multiple === false)
			{
				$options[] = JHtml::_('select.option', '', JText::_('COM_COMPONENTBUILDER_SELECT_AN_ADMIN_VIEW'));
			}
			foreach ($folders as $folder)
			{
				$options[] = JHtml::_('select.option', $folder, ComponentbuilderHelper::safeString($folder, 'W'));
			}
		}
		return $options;
	}
}
