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
 * @copyright  terminal42 gmbh 2009-2013
 * @author     Andreas Schempp <andreas.schempp@terminal42.ch>
 * @author     Kamil Kuźmiński <kamil.kuzminski@terminal42.ch>
 * @license    LGPL
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
        'tables'        => array('tl_dashboard', 'tl_dashboard_settings'),
        'icon'          => 'system/modules/dashboard/assets/icon.png',
        'stylesheet'    => 'system/modules/dashboard/assets/dashboard.min.css',
    )
));


/**
 * Hooks
 */
$GLOBALS['TL_HOOKS']['getSystemMessages'][] = array('Dashboard', 'addSystemMessages');
