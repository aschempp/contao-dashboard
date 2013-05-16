<?php

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2010 Leo Feyer
 *
 * Formerly known as TYPOlight Open Source CMS.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 *
 * PHP version 5
 * @copyright  Terminal42 2013
 * @author     Andreas Schempp <andreas.schempp@terminal42.ch>
 * @author     Kamil Kuźmiński <kamil.kuzminski@terminal42.ch>
 * @license    LGPL
 */


/**
 * System configuration for dashboard
 */
$GLOBALS['TL_DCA']['tl_dashboard_settings'] = array
(

	// Config
	'config' => array
	(
		'dataContainer'               => 'File',
		'closed'                      => true,
		'onload_callback'			=> array
		(
			array('tl_dashboard_settings', 'checkPermission'),
		),
	),

	// Palettes
	'palettes' => array
	(
		'default'                     => '{settings_legend},dashboardMode,dashboardAccess,dashboardLimit',
	),

	// Fields
	'fields' => array
	(
		'dashboardMode' => array
		(
			'label'			=> &$GLOBALS['TL_LANG']['tl_dashboard_settings']['dashboardMode'],
			'inputType'		=> 'radio',
			'options'		=> array('automatic','manual'),
			'reference'		=> &$GLOBALS['TL_LANG']['tl_dashboard_settings'],
			'default'		=> 'automatic',
		),
		'dashboardAccess' => array
		(
			'label'			=> &$GLOBALS['TL_LANG']['tl_dashboard_settings']['dashboardAccess'],
			'inputType'		=> 'radio',
			'options'		=> array('public', 'private'),
			'reference'		=> &$GLOBALS['TL_LANG']['tl_dashboard_settings'],
			'default'		=> 'all',
		),
		'dashboardLimit' => array
		(
			'label'			=> &$GLOBALS['TL_LANG']['tl_dashboard_settings']['dashboardLimit'],
			'inputType'		=> 'text',
			'default'		=> '0',
			'eval'			=> array('rgxp'=>'digit'),
		),
	)
);


class tl_dashboard_settings extends Backend
{
	
	/**
	 * Check the permissions
	 */
	public function checkPermission()
	{
		$this->import('BackendUser', 'User');
		
		if (!$this->User->isAdmin)
		{
			$this->log('Only admins can access dashboard module!', 'tl_dashboard_settings checkPermission()', TL_ACCESS);
			$this->redirect('typolight/main.php?act=error');
		}
	}
}

