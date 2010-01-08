<?php if (!defined('TL_ROOT')) die('You can not access this file directly!');

/**
 * TYPOlight webCMS
 * Copyright (C) 2005 Leo Feyer
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 2.1 of the License, or (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at http://www.gnu.org/licenses/.
 *
 * PHP version 5
 * @copyright  Andreas Schempp 2009
 * @author     Andreas Schempp <andreas@schempp.ch>
 * @license    LGPL
 */


/**
 * Load dashboard on be_welcome
 */
if (TL_MODE == 'BE' && !strlen($_GET['do']) && $GLOBALS['TL_CONFIG']['dashboardMode'] != 'manual')
{
	$GLOBALS['TL_JAVASCRIPT']['dashboard']	= 'system/modules/dashboard/html/dashboard.js';
	$GLOBALS['TL_CSS']['dashboard'] 		= 'system/modules/dashboard/html/dashboard.css';
	
	$dashboard = new Dashboard();

	$GLOBALS['TL_LANG']['MSC']['welcomeTo'] .= '</h1>' . $dashboard->generate() . '<h1 style="display:none">&nbsp;';
}