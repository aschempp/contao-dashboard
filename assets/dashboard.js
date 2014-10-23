/**
 * dashboard extension for Contao Open Source CMS
 *
 * @copyright  Copyright (c) 2008-2014, terminal42 gmbh
 * @author     terminal42 gmbh <info@terminal42.ch>
 * @license    http://opensource.org/licenses/lgpl-3.0.html LGPL
 * @link       http://github.com/terminal42/contao-dashboard
 */


/**
 * Place dashboard on the right place (before shortcuts)
 */
window.addEvent('domready', function() {
    $('mod_dashboard').inject('tl_shortcuts', 'before');
});

