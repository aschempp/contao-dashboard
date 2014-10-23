<?php

/**
 * dashboard extension for Contao Open Source CMS
 *
 * @copyright  Copyright (c) 2008-2014, terminal42 gmbh
 * @author     terminal42 gmbh <info@terminal42.ch>
 * @license    http://opensource.org/licenses/lgpl-3.0.html LGPL
 * @link       http://github.com/terminal42/contao-dashboard
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
