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
 * Fields
 */
$GLOBALS['TL_LANG']['tl_dashboard']['headline']     	= array('Überschrift', 'Bitte geben Sie die Überschrift für diese Nachricht ein.');
$GLOBALS['TL_LANG']['tl_dashboard']['text']        		= array('Nachricht', 'Bitte geben Sie die Nachricht ein. Die Nachricht kann InsertTags (Platzhalter) enthalten.');
$GLOBALS['TL_LANG']['tl_dashboard']['addImage']     	= array('Ein Bild hinzufügen', 'Wenn Sie diese Option wählen, wird der Nachricht ein Bild hinzugefügt.');
$GLOBALS['TL_LANG']['tl_dashboard']['floating']    		= array('Bildausrichtung', 'Bitte wählen Sie die Ausrichtung des Bildes. Ein Bild kann oberhalb des Textes oder auf der oberen linken oder rechten Seite des Textes angezeigt werden.');
$GLOBALS['TL_LANG']['tl_dashboard']['imagemargin'] 		= array('Bildabstand', 'Bitte geben Sie den oberen, rechten, unteren und linken Bildabstand sowie die Einheit ein. Der Bildabstand ist der Abstand zwischen einem Bild und seinen benachbarten Elementen.');
$GLOBALS['TL_LANG']['tl_dashboard']['singleSRC']   		= array('Quelldatei', 'Bitte wählen Sie eine Datei aus der Dateiübersicht.');
$GLOBALS['TL_LANG']['tl_dashboard']['alt']         		= array('Alternativer Text', 'Damit Bilder oder Filme barrierefrei dargestellt werden können, sollten sie immer einen alternativen Text mit einer kurzen Beschreibung des Inhaltes enthalten.');
$GLOBALS['TL_LANG']['tl_dashboard']['caption']     		= array('Bildunterschrift', 'Wenn Sie hier einen Text eingeben, wird dieser unterhalb des Bildes angezeigt. Lassen Sie das Feld leer, um keine Bildunterschrift zu verwenden.');
$GLOBALS['TL_LANG']['tl_dashboard']['size']        		= array('Bildbreite und Bildhöhe', 'Geben Sie entweder die Bildbreite, die Bildhöhe oder beide Werte ein, um die Bildgröße anzupassen. Wenn Sie keine Angaben machen, wird das Bild in seiner Originalgröße angezeigt.');
$GLOBALS['TL_LANG']['tl_dashboard']['fullsize']    		= array('Großansicht', 'Wenn Sie diese Option wählen, öffnet sich bei Anklicken des Bildes dessen Großansicht.');
$GLOBALS['TL_LANG']['tl_dashboard']['mandatory']     	= array('Erzwingen', 'Die Nachricht muss vom Benutzer gelesen und akzeptiert werden, bevor er das Backend nutzen kann.');
$GLOBALS['TL_LANG']['tl_dashboard']['restrictUsers']    = array('Benutzer einschränken', 'Zeigen Sie diese Nachricht nur für bestimmte Backend-Benutzer an.');
$GLOBALS['TL_LANG']['tl_dashboard']['users']    		= array(' ', 'Wählen Sie die Benutzer, welche die Nachricht sehen sollen. Beachten Sie dass Gruppen die Benutzerrechte überschreiben.');
$GLOBALS['TL_LANG']['tl_dashboard']['restrictGroups']   = array('Gruppen einschränken', 'Zeigen Sie diese Nachricht nur für bestimmte Benutzergruppen an.');
$GLOBALS['TL_LANG']['tl_dashboard']['groups']    		= array(' ', 'Wählen Sie die Benutzergruppen, welche diese Nachricht sehen sollen.');
$GLOBALS['TL_LANG']['tl_dashboard']['published']    	= array('Veröffentlicht', 'Solange Sie diese Option nicht wählen, ist die Nachricht nicht sichtbar.');
$GLOBALS['TL_LANG']['tl_dashboard']['start']	        = array('Anzeigen ab', 'Wenn Sie hier ein Datum erfassen, wird die Nachricht erst ab diesem Tag angezeigt.');
$GLOBALS['TL_LANG']['tl_dashboard']['stop']  	        = array('Anzeigen bis', 'Wenn Sie hier ein Datum erfassen, wird die Nachricht nur bis zu diesem Tag angezeigt.');
$GLOBALS['TL_LANG']['tl_dashboard']['bgcolor']			= array('Hintergrundfarbe', 'Sie können eine Hintergrundfarbe festlegen, um diese Nachricht auffallend zu gestalten.');
$GLOBALS['TL_LANG']['tl_dashboard']['style']			= array('CSS Style', 'Geben Sie hier eigenen CSS Style angaben ein.');
$GLOBALS['TL_LANG']['tl_dashboard']['cssID']			= array('Stylesheet-ID und -Klasse', 'Hier können Sie eine Stylesheet-ID (id attribute) sowie eine odere mehrere Stylesheet-Klassen (class attribute) eingeben, um die Nachricht mittles CSS formatieren zu können.');


/**
 * Buttons
 */
$GLOBALS['TL_LANG']['tl_dashboard']['new']        		= array('Neue Nachricht', 'Erstellen Sie eine neue Nachricht im Dashboard');
$GLOBALS['TL_LANG']['tl_dashboard']['edit']       		= array('Nachricht bearbeiten', 'Nachricht ID %s bearbeiten');
$GLOBALS['TL_LANG']['tl_dashboard']['copy']       		= array('Nachricht kopieren', 'Nachricht ID %s kopieren');
$GLOBALS['TL_LANG']['tl_dashboard']['cut']        		= array('Nachricht verschieben', 'Nachricht ID %s verschieben');
$GLOBALS['TL_LANG']['tl_dashboard']['delete']     		= array('Nachricht löschen', 'Nachricht ID %s löschen');
$GLOBALS['TL_LANG']['tl_dashboard']['show']       		= array('Nachrichtendetails', 'Details der Nachricht ID %s anzeigen');
$GLOBALS['TL_LANG']['tl_dashboard']['pasteafter'] 		= array('Danach einfügen', 'Nach der Nachricht ID %s einfügen');
$GLOBALS['TL_LANG']['tl_dashboard']['pasteinto'] 		= array('Am Anfang einfügen', 'Am Anfang einfügen');
$GLOBALS['TL_LANG']['tl_dashboard']['settings']			= array('Einstellungen', 'Einstellungen des Dashboard bearbeiten');


/**
 * Legends
 */
$GLOBALS['TL_LANG']['tl_dashboard']['text_legend']		= 'Überschrift und Inhalt';
$GLOBALS['TL_LANG']['tl_dashboard']['restrict_legend']	= 'Zugriffsschutz';
$GLOBALS['TL_LANG']['tl_dashboard']['publish_legend']	= 'Veröffentlichung';
$GLOBALS['TL_LANG']['tl_dashboard']['expert_legend']	= 'Experten-Einstellungen';


/**
 * References
 */
$GLOBALS['TL_LANG']['MSC']['tl_dashboard']['accept']	= 'Akzeptieren';

