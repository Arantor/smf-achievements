<?php

if (!defined('SMF'))
	die('No direct access...');

function integrate_achievements_profile_menu(&$profile_areas)
{
	global $txt;
	loadLanguage('achievements/Achievements');

	$profile_areas['edit_profile']['areas']['currency'] = [
		'label' => $txt['profile_currency'],
		'function' => 'achievements_currency',
		'permission' => [
			'own' => 'is_not_guest',
			'any' => [],
		],
		'icon' => 'currency',
	];
}

function integrate_achievements_popup(&$profile_items)
{
	global $txt;
	$profile_items[] = [
		'menu' => 'edit_profile',
		'area' => 'currency',
		'title' => $txt['my_currency'],
	];
}

?>