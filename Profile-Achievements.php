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

function achievements_currency($memID)
{
	global $context, $smcFunc, $cur_profile, $txt;

	loadTemplate('Profile-Achievements');

	$context['current_currency'] = $cur_profile['member_currency'];

	$context['transactions'] = [];
	$request = $smcFunc['db_query']('', '
		SELECT id_audit, curr_recd, curr_sent, curr_src, curr_dest, transaction_timestamp
		FROM {db_prefix}achievements_audit
		WHERE id_member = {int:mem}
		ORDER BY transaction_timestamp DESC',
		[
			'mem' => $memID,
		]
	);
	while ($row = $smcFunc['db_fetch_assoc']($request))
	{
		// Now figure out the message we're going to show people
		$reason = !empty($row['curr_src']) ? $row['curr_src'] : $row['curr_dest'];
		if (!empty($txt['currency_' . $reason]))
		{
			$msg = $txt['currency_' . $reason];
		}
		elseif (strpos($reason, 'makechr:') === 0)
		{
			$msg = sprintf($txt['currency_makechr'], substr($reason, 8));
		}

		$context['transactions'][$row['id_audit']] = [
			'date' => timeformat($row['transaction_timestamp']),
			'recd' => $row['curr_recd'],
			'sent' => $row['curr_sent'],
			'msg' => $msg,
		];
	}
}

?>