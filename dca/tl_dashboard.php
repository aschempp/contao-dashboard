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
 * Table tl_dashboard
 */
$GLOBALS['TL_DCA']['tl_dashboard'] = array
(

    // Config
    'config' => array
    (
        'dataContainer'               => 'Table',
        'enableVersioning'            => false,
        'label'                       => &$GLOBALS['TL_LANG']['MOD']['dashboard'][0],
        'onload_callback'             => array
        (
            array('tl_dashboard', 'saveUser'),
            array('tl_dashboard', 'checkPermission'),
        ),
        'sql' => array
        (
            'keys' => array
            (
                'id' => 'primary',
            )
        )
    ),

    // List
    'list' => array
    (
        'sorting' => array
        (
            'mode'                    => 5,
            'fields'                  => array('headline'),
            'flag'                    => 1,
            'panelLayout'             => 'search,limit',
            'paste_button_callback'   => array('tl_dashboard', 'pasteItem'),
            'icon'                    => 'system/modules/dashboard/assets/icon.png',
        ),
        'label' => array
        (
            'fields'                  => array('headline'),
            'format'                  => '%s',
        ),
        'global_operations' => array
        (
            'settings' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['tl_dashboard']['settings'],
                'href'                => 'table=tl_dashboard_settings',
                'icon'                => 'settings.gif',
                'attributes'          => 'onclick="Backend.getScrollOffset();"',
            ),
            'all' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['MSC']['all'],
                'href'                => 'act=select',
                'class'               => 'header_edit_all',
                'attributes'          => 'onclick="Backend.getScrollOffset();"',
            )
        ),
        'operations' => array
        (
            'edit' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['tl_dashboard']['edit'],
                'href'                => 'act=edit',
                'icon'                => 'edit.gif',
                'button_callback'     => array('tl_dashboard', 'buttonAccess'),
            ),
            'copy' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['tl_dashboard']['copy'],
                'href'                => 'act=paste&amp;mode=copy',
                'icon'                => 'copy.gif',
                'attributes'          => 'onclick="Backend.getScrollOffset();"',
                'button_callback'     => array('tl_dashboard', 'buttonAccess'),
            ),
            'cut' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['tl_dashboard']['cut'],
                'href'                => 'act=paste&amp;mode=cut',
                'icon'                => 'cut.gif',
                'attributes'          => 'onclick="Backend.getScrollOffset();"',
                'button_callback'     => array('tl_dashboard', 'buttonAccess'),
            ),
            'delete' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['tl_dashboard']['delete'],
                'href'                => 'act=delete',
                'icon'                => 'delete.gif',
                'attributes'          => 'onclick="if (!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\')) return false; Backend.getScrollOffset();"',
                'button_callback'     => array('tl_dashboard', 'buttonAccess'),
            ),
            'show' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['tl_dashboard']['show'],
                'href'                => 'act=show',
                'icon'                => 'show.gif',
            )
        )
    ),

    // Palettes
    'palettes' => array
    (
        '__selector__'                => array('addImage', 'restrictUsers', 'restrictGroups'),
        'default'                     => '{text_legend},headline,text,addImage;{restrict_legend},mandatory,restrictUsers,restrictGroups;{publish_legend},published,start,stop;{expert_legend:hide},style,bgcolor,cssID'
    ),

    // Subpalettes
    'subpalettes' => array
    (
        'addImage'                    => 'singleSRC,alt,imagemargin,size,caption,floating,fullsize',
        'restrictUsers'               => 'users',
        'restrictGroups'              => 'groups',
    ),

    // Fields
    'fields' => array
    (
        'id' => array
        (
            'sql'                     => "int(10) unsigned NOT NULL auto_increment"
        ),
        'pid' => array
        (
            'sql'                     => "int(10) unsigned NOT NULL default '0'"
        ),
        'tstamp' => array
        (
            'sql'                     => "int(10) unsigned NOT NULL default '0'"
        ),
        'sorting' => array
        (
            'sql'                     => "int(10) unsigned NOT NULL default '0'"
        ),
        'createdBy' => array
        (
            'sql'                     => "int(10) unsigned NOT NULL default '0'"
        ),
        'headline' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_dashboard']['headline'],
            'inputType'               => 'text',
            'exclude'                 => true,
            'eval'                    => array('maxlength'=>255, 'tl_class'=>'long'),
            'sql'                     => "varchar(255) NOT NULL default ''"
        ),
        'text' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_dashboard']['text'],
            'inputType'               => 'textarea',
            'exclude'                 => true,
            'eval'                    => array('mandatory'=>true, 'rte'=>'tinyMCE', 'helpwizard'=>true, 'tl_class'=>'long'),
            'explanation'             => 'insertTags',
            'sql'                     => "mediumtext NULL"
        ),
        'addImage' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_dashboard']['addImage'],
            'inputType'               => 'checkbox',
            'exclude'                 => true,
            'eval'                    => array('submitOnChange'=>true),
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'singleSRC' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_dashboard']['singleSRC'],
            'inputType'               => 'fileTree',
            'exclude'                 => true,
            'eval'                    => array('fieldType'=>'radio', 'files'=>true, 'filesOnly'=>true, 'extensions'=>\Config::get('validImageTypes'), 'mandatory'=>true, 'tl_class'=>'clr'),
            'sql'                     => "binary(16) NULL"
        ),
        'size' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_dashboard']['size'],
            'inputType'               => 'text',
            'eval'                    => array('multiple'=>true, 'size'=>2, 'rgxp'=>'digit', 'nospace'=>true, 'tl_class'=>'w50'),
            'sql'                     => "varchar(255) NOT NULL default ''"
        ),
        'alt' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_dashboard']['alt'],
            'inputType'               => 'text',
            'exclude'                 => true,
            'eval'                    => array('mandatory'=>true, 'rgxp'=>'extnd', 'maxlength'=>255, 'tl_class'=>'long'),
            'sql'                     => "varchar(255) NOT NULL default ''"
        ),
        'caption' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_dashboard']['caption'],
            'search'                  => true,
            'inputType'               => 'text',
            'exclude'                 => true,
            'eval'                    => array('rgxp'=>'extnd', 'maxlength'=>255, 'tl_class'=>'w50'),
            'sql'                     => "varchar(255) NOT NULL default ''"
        ),
        'floating' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_dashboard']['floating'],
            'inputType'               => 'radioTable',
            'exclude'                 => true,
            'options'                 => array('above', 'left', 'right', 'below'),
            'eval'                    => array('cols'=>4, 'tl_class'=>'w50'),
            'reference'               => &$GLOBALS['TL_LANG']['MSC'],
            'sql'                     => "varchar(32) NOT NULL default ''"
        ),
        'imagemargin' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_dashboard']['imagemargin'],
            'inputType'               => 'trbl',
            'exclude'                 => true,
            'options'                 => array('px', '%', 'em', 'pt', 'pc', 'in', 'cm', 'mm'),
            'eval'                    => array('includeBlankOption'=>true, 'tl_class'=>'w50'),
            'sql'                     => "varchar(255) NOT NULL default ''"
        ),
        'fullsize' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_dashboard']['fullsize'],
            'inputType'               => 'checkbox',
            'exclude'                 => true,
            'eval'                    => array('tl_class'=>'w50'),
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'mandatory' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_dashboard']['mandatory'],
            'inputType'               => 'checkbox',
            'exclude'                 => true,
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'restrictUsers' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_dashboard']['restrictUsers'],
            'inputType'               => 'checkbox',
            'exclude'                 => true,
            'eval'                    => array('submitOnChange'=>true),
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'users' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_dashboard']['users'],
            'inputType'               => 'checkbox',
            'foreignKey'              => 'tl_user.username',
            'eval'                    => array('multiple'=>true),
            'sql'                     => "mediumtext NULL"
        ),
        'restrictGroups' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_dashboard']['restrictGroups'],
            'inputType'               => 'checkbox',
            'exclude'                 => true,
            'eval'                    => array('submitOnChange'=>true),
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'groups' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_dashboard']['groups'],
            'inputType'               => 'checkbox',
            'foreignKey'              => 'tl_user_group.name',
            'eval'                    => array('multiple'=>true),
            'sql'                     => "mediumtext NULL"
        ),
        'bgcolor' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_dashboard']['bgcolor'],
            'inputType'               => 'text',
            'exclude'                 => true,
            'eval'                    => array('maxlength'=>6, 'rgxp'=>'alnum', 'colorpicker'=>true, 'tl_class'=>'w50 wizard'),
            'sql'                     => "varchar(6) NOT NULL default ''"
        ),
        'style' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_dashboard']['style'],
            'inputType'               => 'text',
            'exclude'                 => true,
            'eval'                    => array('maxlength'=>255, 'tl_class'=>'long'),
            'sql'                     => "varchar(255) NOT NULL default ''"
        ),
        'cssID' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_dashboard']['cssID'],
            'inputType'               => 'text',
            'exclude'                 => true,
            'eval'                    => array('multiple'=>true, 'size'=>2, 'maxlength'=>240, 'tl_class'=>'w50'),
            'sql'                     => "varchar(255) NOT NULL default ''"
        ),
        'published' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_dashboard']['published'],
            'inputType'               => 'checkbox',
            'filter'                  => true,
            'flag'                    => 2,
            'exclude'                 => true,
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'start' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_dashboard']['start'],
            'inputType'               => 'text',
            'exclude'                 => true,
            'eval'                    => array('maxlength'=>10, 'rgxp'=>'date', 'datepicker'=>$this->getDatePickerString(), 'tl_class'=>'w50 wizard'),
            'sql'                     => "varchar(10) NOT NULL default ''"
        ),
        'stop' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_dashboard']['stop'],
            'inputType'               => 'text',
            'exclude'                 => true,
            'eval'                    => array('maxlength'=>10, 'rgxp'=>'date', 'datepicker'=>$this->getDatePickerString(), 'tl_class'=>'w50 wizard'),
            'sql'                     => "varchar(10) NOT NULL default ''"
        ),
    )
);


class tl_dashboard extends Backend
{

    /**
     * Import a back end user
     */
    public function __construct()
    {
        parent::__construct();
        $this->import('BackendUser', 'User');
    }


    /**
     * Check the permissions
     */
    public function checkPermission()
    {
        if ($this->User->isAdmin)
        {
            return;
        }

        unset($GLOBALS['TL_DCA']['tl_dashboard']['list']['global_operations']['settings']);

        if ($GLOBALS['TL_CONFIG']['dashboardAccess'] == 'private')
        {
            $arrIds = $this->Database->prepare("SELECT id FROM tl_dashboard WHERE createdBy=?")->execute($this->User->id)->fetchEach('id');

            if (strlen($this->Input->get('id')) && !in_array($this->Input->get('id'), $arrIds) && $this->Input->get('act') != 'show')
            {
                $this->log('No permission for dashboard ID ' . $this->Input->get('id'), 'tl_dashboard checkPermission', TL_ACCESS);
                $this->redirect('typolight/main.php?act=error');
            }
        }
    }


    /**
     * Generate a paste button and return it as HTML string
     * @param object
     * @param array
     * @param string
     * @param boolean
     * @param array
     * @return string
     */
    public function pasteItem(DataContainer $dc, $row, $table, $cr, $arrClipboard=false)
    {
        $imagePasteAfter = $this->generateImage('pasteafter.gif', sprintf($GLOBALS['TL_LANG'][$dc->table]['pasteafter'][1], $row['id']));
        $imagePasteInto = $this->generateImage('pasteinto.gif', sprintf($GLOBALS['TL_LANG'][$dc->table]['pasteinto'][1], $row['id']));

        if ($row['id'] == 0)
        {
            return '<a href="'.$this->addToUrl('act='.$arrClipboard['mode'].'&amp;mode=2&amp;pid='.$row['id'].'&amp;id='.$arrClipboard['id']).'" title="'.specialchars(sprintf($GLOBALS['TL_LANG'][$dc->table]['pasteinto'][1], $row['id'])).'" onclick="Backend.getScrollOffset();">'.$imagePasteInto.'</a> ';
        }

        return (($arrClipboard['mode'] == 'cut' && $arrClipboard['id'] == $row['id']) || $cr) ? $this->generateImage('pasteafter_.gif').' ' : '<a href="'.$this->addToUrl('act='.$arrClipboard['mode'].'&amp;mode=1&amp;pid='.$row['id'].'&amp;id='.$arrClipboard['id']).'" title="'.specialchars(sprintf($GLOBALS['TL_LANG'][$dc->table]['pasteafter'][1], $row['id'])).'" onclick="Backend.getScrollOffset();">'.$imagePasteAfter.'</a> ';
    }


    /**
     * Return the access button
     * @param array
     * @param string
     * @param string
     * @param string
     * @param string
     * @param string
     * @return string
     */
    public function buttonAccess($row, $href, $label, $title, $icon, $attributes)
    {
        return ($this->User->isAdmin || $GLOBALS['TL_CONFIG']['dashboardAccess'] != 'private' || $row['createdBy'] == $this->User->id) ? '<a href="'.$this->addToUrl($href.'&amp;id='.$row['id']).'" title="'.specialchars($title).'"'.$attributes.'>'.$this->generateImage($icon, $label).'</a> ' : $this->generateImage(preg_replace('/\.gif$/i', '_.gif', $icon)).' ';
    }


    /**
     * Save the user as author
     * @param object
     */
    public function saveUser($dc)
    {
        if ($this->Input->get('act') == 'edit')
        {
            $this->Database->prepare("UPDATE tl_dashboard SET createdBy=? WHERE createdBy=0 AND id=?")->execute($this->User->id, $dc->id);
        }
    }
}
