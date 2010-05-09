<?php if (!defined('TL_ROOT')) die('You can not access this file directly!');

/**
 * TYPOlight Open Source CMS
 * Copyright (C) 2005-2010 Leo Feyer
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 3 of the License, or (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at <http://www.gnu.org/licenses/>.
 *
 * PHP version 5
 * @copyright  Andreas Schempp 2009-2010
 * @author     Andreas Schempp <andreas@schempp.ch>
 * @license    http://opensource.org/licenses/lgpl-3.0.html
 * @version    $Id$
 */


/**
 * Fields
 */
$GLOBALS['TL_LANG']['tl_dashboard_settings']['dashboardMode']	= array('Backend Dashboard Mode', 'Please select here if you want to manually adjust the be_welcome tempalte. Otherwise Dashboard will integrate itself, but Javascript is required for optimal functionality.');
$GLOBALS['TL_LANG']['tl_dashboard_settings']['dashboardAccess']	= array('Access rights', 'Please choose who can access the dashboard posts.');
$GLOBALS['TL_LANG']['tl_dashboard_settings']['dashboardLimit']	= array('Post limit', 'Enter a number higher 0 to only show this amount of posts on the intro page. All other messages will be hidden inside an accordion.');


/**
 * References
 */
$GLOBALS['TL_LANG']['tl_dashboard_settings']['automatic']		= 'Automatic';
$GLOBALS['TL_LANG']['tl_dashboard_settings']['manual']			= 'Manual';
$GLOBALS['TL_LANG']['tl_dashboard_settings']['edit']			= 'Edit Dashboard settings';
$GLOBALS['TL_LANG']['tl_dashboard_settings']['public']			= 'All users can edit all posts';
$GLOBALS['TL_LANG']['tl_dashboard_settings']['private']			= 'Users can only edit their posts (except admins)';


/**
 * Legends
 */
$GLOBALS['TL_LANG']['tl_dashboard_settings']['settings_legend']	= 'Dashboard settings';

