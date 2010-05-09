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
 * Default settings
 */
$GLOBALS['TL_CONFIG']['dashboardMode'] = 'automatic';
$GLOBALS['TL_CONFIG']['dashboardAccess'] = 'public';
$GLOBALS['TL_CONFIG']['dashboardLimit'] = '0';


/**
 * Back end modules
 */
array_insert($GLOBALS['BE_MOD']['system'], 2, array
(
	'dashboard' => array
	(
		'tables'		=> array('tl_dashboard', 'tl_dashboard_settings'),
		'icon'			=> 'system/modules/dashboard/html/icon.png',
		'stylesheet'	=> 'system/modules/dashboard/html/dashboard.css',
	)
));

