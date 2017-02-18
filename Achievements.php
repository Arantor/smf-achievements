<?php

if (!defined('SMF'))
	die('No direct access...');

function integrate_achievements(&$actionArray)
{
	global $settings;
	addInlineCss('
span.generic_icons.currency { background: url(' . $settings['default_theme_url'] . '/images/achievements-images/money-bag.png); }');

	// Time to add our hooks for the rest of the achievements facilities.
	add_integration_function(
		'integrate_pre_profile_areas',
		'integrate_achievements_profile_menu',
		false,
		'$sourcedir/Profile-Achievements.php'
	);
	add_integration_function(
		'integrate_profile_popup',
		'integrate_achievements_popup',
		false
	);
}

?>