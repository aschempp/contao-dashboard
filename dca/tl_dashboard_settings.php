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
 * System configuration for dashboard
 */
$GLOBALS['TL_DCA']['tl_dashboard_settings'] = array
(

    // Config
    'config' => array
    (
        'dataContainer'               => 'File',
        'closed'                      => true,
        'onload_callback'             => array
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
            'label'            => &$GLOBALS['TL_LANG']['tl_dashboard_settings']['dashboardMode'],
            'inputType'        => 'radio',
            'options'          => array('automatic','manual'),
            'reference'        => &$GLOBALS['TL_LANG']['tl_dashboard_settings'],
            'default'          => 'automatic',
        ),
        'dashboardAccess' => array
        (
            'label'            => &$GLOBALS['TL_LANG']['tl_dashboard_settings']['dashboardAccess'],
            'inputType'        => 'radio',
            'options'          => array('public', 'private'),
            'reference'        => &$GLOBALS['TL_LANG']['tl_dashboard_settings'],
            'default'          => 'all',
        ),
        'dashboardLimit' => array
        (
            'label'            => &$GLOBALS['TL_LANG']['tl_dashboard_settings']['dashboardLimit'],
            'inputType'        => 'text',
            'default'          => '0',
            'eval'             => array('rgxp'=>'digit'),
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

