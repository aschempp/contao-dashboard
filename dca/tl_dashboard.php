<?php if (!defined('TL_ROOT')) die('You can not access this file directly!');

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2010 Leo Feyer
 *
 * Formerly known as TYPOlight Open Source CMS.
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


$this->loadDataContainer('tl_style');


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
		'onload_callback'				=> array
		(
			array('tl_dashboard', 'saveUser'),
			array('tl_dashboard', 'checkPermission'),
		),
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
            'icon'                    => 'system/modules/dashboard/html/icon.png',
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
				'class'               => 'header_dashboard_settings',
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
		'headline' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_dashboard']['headline'],
			'inputType'               => 'text',
			'exclude'                 => true,
			'eval'                    => array('maxlength'=>255, 'tl_class'=>'long'),
		),
		'text' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_dashboard']['text'],
			'inputType'               => 'textarea',
			'exclude'                 => true,
			'eval'                    => array('mandatory'=>true, 'rte'=>'tinyMCE', 'helpwizard'=>true, 'tl_class'=>'long'),
			'explanation'             => 'insertTags'
		),
		'addImage' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_dashboard']['addImage'],
			'inputType'               => 'checkbox',
			'exclude'                 => true,
			'eval'                    => array('submitOnChange'=>true)
		),
		'singleSRC' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_dashboard']['singleSRC'],
			'inputType'               => 'fileTree',
			'exclude'                 => true,
			'eval'                    => array('fieldType'=>'radio', 'files'=>true, 'filesOnly'=>true, 'extensions'=>'jpg,jpeg,gif,png', 'mandatory'=>true, 'tl_class'=>'clr')
		),
		'size' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_dashboard']['size'],
			'inputType'               => 'text',
			'eval'                    => array('multiple'=>true, 'size'=>2, 'rgxp'=>'digit', 'nospace'=>true, 'tl_class'=>'w50')
		),
		'alt' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_dashboard']['alt'],
			'inputType'               => 'text',
			'exclude'                 => true,
			'eval'                    => array('mandatory'=>true, 'rgxp'=>'extnd', 'maxlength'=>255, 'tl_class'=>'long')
		),
		'caption' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_dashboard']['caption'],
			'search'                  => true,
			'inputType'               => 'text',
			'exclude'                 => true,
			'eval'                    => array('rgxp'=>'extnd', 'maxlength'=>255, 'tl_class'=>'w50')
		),
		'floating' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_dashboard']['floating'],
			'inputType'               => 'radioTable',
			'exclude'                 => true,
			'options'                 => array('above', 'left', 'right', 'below'),
			'eval'                    => array('cols'=>4, 'tl_class'=>'w50'),
			'reference'               => &$GLOBALS['TL_LANG']['MSC']
		),
		'imagemargin' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_dashboard']['imagemargin'],
			'inputType'               => 'trbl',
			'exclude'                 => true,
			'options'                 => array('px', '%', 'em', 'pt', 'pc', 'in', 'cm', 'mm'),
			'eval'                    => array('includeBlankOption'=>true, 'tl_class'=>'w50')
		),
		'fullsize' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_dashboard']['fullsize'],
			'inputType'               => 'checkbox',
			'exclude'                 => true,
			'eval'                    => array('tl_class'=>'w50'),
		),
		'mandatory' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_dashboard']['mandatory'],
			'inputType'               => 'checkbox',
			'exclude'                 => true,
		),
		'restrictUsers' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_dashboard']['restrictUsers'],
			'inputType'               => 'checkbox',
			'exclude'                 => true,
			'eval'					  => array('submitOnChange'=>true),
		),
		'users' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_dashboard']['users'],
			'inputType'               => 'checkbox',
			'foreignKey'              => 'tl_user.username',
			'eval'					  => array('multiple'=>true),
		),
		'restrictGroups' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_dashboard']['restrictGroups'],
			'inputType'               => 'checkbox',
			'exclude'                 => true,
			'eval'					  => array('submitOnChange'=>true),
		),
		'groups' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_dashboard']['groups'],
			'inputType'               => 'checkbox',
			'foreignKey'              => 'tl_user_group.name',
			'eval'					  => array('multiple'=>true),
		),
		'bgcolor' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_dashboard']['bgcolor'],
			'inputType'               => 'text',
			'exclude'                 => true,
			'eval'                    => array('maxlength'=>6, 'rgxp'=>'alnum', 'colorpicker'=>true, 'tl_class'=>'w50 wizard'),
			'wizard' => array
			(
				array('tl_style', 'colorPicker')
			)
		),
		'style' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_dashboard']['style'],
			'inputType'               => 'text',
			'exclude'                 => true,
			'eval'                    => array('maxlength'=>255, 'tl_class'=>'long'),
		),
		'cssID' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_dashboard']['cssID'],
			'inputType'               => 'text',
			'exclude'                 => true,
			'eval'                    => array('multiple'=>true, 'size'=>2, 'maxlength'=>240, 'tl_class'=>'w50'),
		),
		'published' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_dashboard']['published'],
			'inputType'               => 'checkbox',
			'filter'                  => true,
			'flag'                    => 2,
			'exclude'                 => true,
		),
		'start' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_dashboard']['start'],
			'inputType'               => 'text',
			'exclude'                 => true,
			'eval'                    => array('maxlength'=>10, 'rgxp'=>'date', 'datepicker'=>$this->getDatePickerString(), 'tl_class'=>'w50 wizard'),
		),
		'stop' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_dashboard']['stop'],
			'inputType'               => 'text',
			'exclude'                 => true,
			'eval'                    => array('maxlength'=>10, 'rgxp'=>'date', 'datepicker'=>$this->getDatePickerString(), 'tl_class'=>'w50 wizard'),
		),
	)
);


/**
 * The wizard array is no longer needed in Contao 3
 */
if (version_compare(VERSION, '3.0', '>='))
{
	unset($GLOBALS['TL_DCA']['tl_dashboard']['fields']['bgcolor']['wizard']);
}


class tl_dashboard extends Backend
{
	
	public function __construct()
	{
		parent::__construct();
		
		$this->import('BackendUser', 'User');
	}
	
	
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
	
	
	public function buttonAccess($row, $href, $label, $title, $icon, $attributes)
	{
		return ($this->User->isAdmin || $GLOBALS['TL_CONFIG']['dashboardAccess'] != 'private' || $row['createdBy'] == $this->User->id) ? '<a href="'.$this->addToUrl($href.'&amp;id='.$row['id']).'" title="'.specialchars($title).'"'.$attributes.'>'.$this->generateImage($icon, $label).'</a> ' : $this->generateImage(preg_replace('/\.gif$/i', '_.gif', $icon)).' ';
	}


	public function checkPermission()
	{
		if ($this->User->isAdmin)
			return;
			
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
	
	
	public function saveUser($dc)
	{
		if ($this->Input->get('act') == 'edit')
		{
			$this->Database->prepare("UPDATE tl_dashboard SET createdBy=? WHERE createdBy=0 AND id=?")->execute($this->User->id, $dc->id);
		}
	}
}

