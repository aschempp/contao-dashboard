
/**
 * Place dashboard on the right place (before shortcuts)
 */
window.addEvent('domready', function() {

	$('mod_dashboard').inject('tl_shortcuts', 'before');

});