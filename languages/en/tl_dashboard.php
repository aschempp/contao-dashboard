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
$GLOBALS['TL_LANG']['tl_dashboard']['headline']     	= array('Headline', 'Please enter the headline of the post.');
$GLOBALS['TL_LANG']['tl_dashboard']['text']        		= array('Post message', 'Please enter the text for this post. The post can contain inserttags.');
$GLOBALS['TL_LANG']['tl_dashboard']['addImage']     	= array('Add an image', 'If you choose this option, an image will be added to the post.');
$GLOBALS['TL_LANG']['tl_dashboard']['floating']    		= array('Image alignment', 'Please choose the image alignment. An image can be displayed above or on the top left or top right side of the text.');
$GLOBALS['TL_LANG']['tl_dashboard']['imagemargin'] 		= array('Image margin', 'Please enter the top, right, bottom and left margin and the unit. Image margin is the space inbetween an image and its neighbour elements.');
$GLOBALS['TL_LANG']['tl_dashboard']['singleSRC']   		= array('Source file', 'Please select a file or a folder from the files directory.');
$GLOBALS['TL_LANG']['tl_dashboard']['alt']         		= array('Alternative text', 'In order to make images or movies accessible, you should always provide an alternative text including a short description of their content.');
$GLOBALS['TL_LANG']['tl_dashboard']['caption']     		= array('Image caption', 'If you enter a short text here, it will be displayed below the image. Leave this field blank to disable the feature.');
$GLOBALS['TL_LANG']['tl_dashboard']['size']        		= array('Image width and height', 'Please enter either the image width, the image height or both measures to resize the image. If you leave both fields blank, the original image size will be displayed.');
$GLOBALS['TL_LANG']['tl_dashboard']['fullsize']    		= array('Fullsize view', 'If you choose this option, the image can be viewed fullsize by clicking it.');
$GLOBALS['TL_LANG']['tl_dashboard']['mandatory']     	= array('Mandatory', 'If a message is mandatory, the user must accept it before using the backend.');
$GLOBALS['TL_LANG']['tl_dashboard']['restrictUsers']    = array('Restrict users', 'You can restrict this post to certain backend users.');
$GLOBALS['TL_LANG']['tl_dashboard']['users']    		= array(' ', 'Please check the users you want to see this post. Please be aware that group rights will extend the user list.');
$GLOBALS['TL_LANG']['tl_dashboard']['restrictGroups']   = array('Restrict groups', 'You can restrict this post to certain backend groups.');
$GLOBALS['TL_LANG']['tl_dashboard']['groups']    		= array(' ', 'Please check the groups you want to see this post.');
$GLOBALS['TL_LANG']['tl_dashboard']['published']    	= array('Published', 'The post will not be visible on your backend until it is published.');
$GLOBALS['TL_LANG']['tl_dashboard']['start']	        = array('Show from', 'If you enter a date here the current post will not be shown on the website before this day.');
$GLOBALS['TL_LANG']['tl_dashboard']['stop']  	        = array('Show until', 'If you enter a date here the current post will not be shown on the website after this day.');
$GLOBALS['TL_LANG']['tl_dashboard']['bgcolor']			= array('Background color', 'You can specify a background color for dashbaord to highlight this message.');
$GLOBALS['TL_LANG']['tl_dashboard']['style']			= array('CSS Style', 'You can specify custom CSS style tags here.');
$GLOBALS['TL_LANG']['tl_dashboard']['cssID']			= array('Style sheet ID and class', 'Here you can enter a style sheet ID (id attribute) and one or more style sheet classes (class attributes) to format the module element using CSS.');


/**
 * Buttons
 */
$GLOBALS['TL_LANG']['tl_dashboard']['new']        		= array('New post', 'Create a new post on the dashboard');
$GLOBALS['TL_LANG']['tl_dashboard']['edit']       		= array('Edit post', 'Edit post ID %s');
$GLOBALS['TL_LANG']['tl_dashboard']['copy']       		= array('Copy post', 'Copy post ID %s');
$GLOBALS['TL_LANG']['tl_dashboard']['cut']        		= array('Move post', 'Move post ID %s');
$GLOBALS['TL_LANG']['tl_dashboard']['delete']     		= array('Delete post', 'Delete post ID %s');
$GLOBALS['TL_LANG']['tl_dashboard']['show']       		= array('Post details', 'Show details of post ID %s');
$GLOBALS['TL_LANG']['tl_dashboard']['pasteafter'] 		= array('Paste after', 'Paste after post ID %s');
$GLOBALS['TL_LANG']['tl_dashboard']['pasteinto']  		= array('Paste into', 'Paste on top');
$GLOBALS['TL_LANG']['tl_dashboard']['settings']			= array('Settings', 'Edit Dashboard settings');


/**
 * Legends
 */
$GLOBALS['TL_LANG']['tl_dashboard']['text_legend']		= 'Headline and Text';
$GLOBALS['TL_LANG']['tl_dashboard']['restrict_legend']	= 'Access protection';
$GLOBALS['TL_LANG']['tl_dashboard']['publish_legend']	= 'Publish settings';
$GLOBALS['TL_LANG']['tl_dashboard']['expert_legend']	= 'Expert settings';


/**
 * References
 */
$GLOBALS['TL_LANG']['MSC']['tl_dashboard']['accept']	= 'Accept';

