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


class Dashboard extends Module
{	
	/**
	 * Dummys to allow inherit of class Module
	 */
	public function __construct() {}
	public function compile() {}
	
	/**
	 * Generate and output the backend dashboard
	 */
	public function generate()
	{
		if (!BE_USER_LOGGED_IN)
			return;
			
		$this->User = BackendUser::getInstance();
		$this->Database = Database::getInstance();
		$this->String = String::getInstance();
			
		$validRows = array();
		$arrRow = $this->Database->prepare("SELECT * FROM tl_dashboard WHERE published = 1 OR start > 0 OR stop > 0 ORDER BY sorting")
					   			 ->execute(time(), time())
					   			 ->fetchAllAssoc();
					   			 
		foreach( $arrRow as $row )
		{
			if (!$row['published'] || ($row['start'] > 0 && $row['start'] > time()) || ($row['stop'] > 0 && $row['stop'] < time()))
			{
				continue;
			}
			
			if ($row['restrictGroups'] || $row['restrictUsers'])
			{
				if ($row['restrictGroups'] && count(array_intersect($this->User->groups, deserialize($row['groups']))) > 0)
				{
					$validRows[] = $row;
					continue;
				}
				
				if ($row['restrictUsers'] && in_array($this->User->id, deserialize($row['users'])))
				{
					$validRows[] = $row;
					continue;
				}
			}
			else
			{
				$validRows[] = $row;
				continue;
			}
		}
		
		$strBuffer = '<div id="mod_dashboard">';
		
		foreach( $validRows as $row )
		{
			// Output headline
			if (strlen($row['headline']))
			{
				$objTemplate = new BackendTemplate('ce_headline');
				$objTemplate->hl = 'h2';
				$objTemplate->class = 'ce_headline';
				$objTemplate->headline = $row['headline'];
				$strBuffer .= $objTemplate->parse();
			}
		
			$objTemplate = new BackendTemplate('ce_text');
			$objTemplate->class = 'ce_text';
	
			$text = $this->String->encodeEmail($row['text']);
			$text = str_ireplace(array('<u>', '</u>'), array('<span style="text-decoration:underline;">', '</span>'), $text);
			$text = str_ireplace(array('</p>', '<br /><br />'), array("</p>\n\n", "<br /><br />\n\n"), $text);
	
			// Use an image instead of the title
			if ($row['addImage'] && strlen($row['singleSRC']) && is_file(TL_ROOT . '/' . $row['singleSRC']))
			{
				// Fullsize view
				if ($row['fullsize'])
				{
					$objTemplate = new BackendTemplate('ce_text_image_fullsize');
					$objTemplate->class = 'ce_text_image_fullsize';
				}
	
				// Simple view
				else
				{
					$objTemplate = new BackendTemplate('ce_text_image');
					$objTemplate->class = 'ce_text_image';
				}
	
				$size = deserialize($row['size']);
				$arrImageSize = getimagesize(TL_ROOT . '/' . $row['singleSRC']);
	
				// Adjust image size in the back end
				if ($arrImageSize[0] > 640 && ($size[0] > 640 || !$size[0]))
				{
					$size[0] = 640;
					$size[1] = floor(640 * $arrImageSize[1] / $arrImageSize[0]);
				}
	
				$src = $this->getImage($this->urlEncode($row['singleSRC']), $size[0], $size[1]);
	
				if (($imgSize = @getimagesize(TL_ROOT . '/' . $src)) !== false)
				{
					$objTemplate->imgSize = ' ' . $imgSize[3];
				}
	
				$objTemplate->src = $src;
				$objTemplate->width = $arrImageSize[0];
				$objTemplate->height = $arrImageSize[1];
				$objTemplate->alt = specialchars($row['alt']);
				$objTemplate->addBefore = ($row['floating'] != 'below');
				$objTemplate->margin = $this->generateMargin(deserialize($row['imagemargin']), 'padding');
				$objTemplate->float = in_array($row['floating'], array('left', 'right')) ? sprintf(' float:%s;', $row['floating']) : '';
				$objTemplate->caption = $row['caption'];
			}
			
			$cssID = deserialize($row['cssID']);
			
			if (strlen($cssID[0]))
				$objTemplate->cssID = ' id="'.$cssID[0].'"';
				
			if (strlen($cssID[1]))
				$objTemplate->class .= ' '.$cssID[1];
	
			$objTemplate->text = $text;
			$objTemplate->style = strlen($row['bgcolor']) ? 'background-color: #' . $row['bgcolor'] : '';
			$objTemplate->style .= $row['style'];
			$strBuffer .= $this->replaceBackendTags($objTemplate->parse());
		}
		
		$strBuffer .= '<br /></div>';
		
		return $strBuffer;
	}
	
	
	public function replaceBackendTags($strBuffer)
	{
		if ($GLOBALS['TL_CONFIG']['disableInsertTags'])
		{
			return $strBuffer;
		}

		$tags = array();
		preg_match_all('/{{[^}]+}}/i', $strBuffer, $tags);

		// Replace tags
		foreach ($tags[0] as $tag)
		{
			$elements = explode('::', trim(str_replace(array('{{', '}}'), array('', ''), $tag)));

			switch (strtolower($elements[0]))
			{
				// Front end user
				case 'user':
					if (!BE_USER_LOGGED_IN)
					{
						$strBuffer = str_replace($tag, '', $strBuffer);
						break;
					}

					$this->import('BackendUser', 'User');
					$strBuffer = str_replace($tag, $this->User->$elements[1], $strBuffer);
					break;
			}
		}

		return $this->replaceInsertTags($strBuffer);
	}
}

