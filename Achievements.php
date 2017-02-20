<?php

if (!defined('SMF'))
	die('No direct access...');

function integrate_achievements()
{
	global $settings;

	if (file_exists($settings['default_theme_dir'] . '/css/achievements.css'))
	{
		loadCSSFile('achievements.css', ['default_theme' => true], 'achievements');
		addInlineCss('
span.generic_icons.currency { background: url(' . $settings['default_theme_url'] . '/images/achievements-images/money-bag.png); }');
	}

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

function currency_display($amount)
{
	global $modSettings, $settings;

	$split_amounts = [
		'tier_1' => 0,
		'tier_2' => 0,
		'tier_3' => 0,
	];

	if (!empty($modSettings['currency_tier_1_multiplier']))
	{
		$tier1 = $modSettings['currency_tier_1_multiplier'];
		if (!empty($modSettings['currency_tier_2_multiplier']))
			$tier1 *= $modSettings['currency_tier_2_multiplier'];

		$split_amounts['tier_1'] = floor($amount / $tier1);
		$amount = $amount % $tier1;
	}

	if (!empty($modSettings['currency_tier_2_multiplier']))
	{
		$split_amounts['tier_2'] = floor($amount / $modSettings['currency_tier_2_multiplier']);
		$amount = $amount % $modSettings['currency_tier_2_multiplier'];
	}

	$split_amounts['tier_3'] = (int) $amount;

	$string = '';

	if ($split_amounts['tier_1'])
		$string .= '<span class="currency gold" title="' . $modSettings['currency_tier_1'] . '">' . $split_amounts['tier_1'] . ' <span class="image"></span></span>';

	if ($split_amounts['tier_1'] || $split_amounts['tier_2'])
		$string .= '<span class="currency silver" title="' . $modSettings['currency_tier_2'] . '">' . $split_amounts['tier_2'] . ' <span class="image"></span></span>';

	$string .= '<span class="currency copper" title="' . $modSettings['currency_tier_3'] . '">' . $split_amounts['tier_3'] . ' <span class="image"></span></span>';

	return $string;
}

?>