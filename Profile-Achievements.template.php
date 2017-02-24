<?php

function template_achievements_currency()
{
	global $txt, $context, $settings;

	echo '
		<div class="cat_bar">
			<h3 class="catbg"><img src="', $settings['default_theme_url'], '/images/achievements-images/money-bag-big.png" alt="" class="icon">', $txt['profile_currency'], '</h3>
		</div>
		<p class="information">
			', $txt['currency_balance'], ': ', currency_display($context['current_currency']), '
		</p>';

	echo '
		<table class="table_grid" style="width:100%">
			<thead>
				<tr class="title_bar">
					<th scope="col">', $txt['currency_date'], '</th>
					<th scope="col">', $txt['currency_received'], '</th>
					<th scope="col">', $txt['currency_spent'], '</th>
					<th></th>
				</tr>
			</thead>
			<tbody>';

	if (empty($context['transactions']))
	{
		echo '
				<tr class="windowbg">
					<td colspan="4" class="centertext">', $txt['no_transactions'], '</td>
				</tr>';
	}
	else
	{
		foreach ($context['transactions'] as $transaction)
		{
			echo '
				<tr class="windowbg">
					<td>', $transaction['date'], '</td>
					<td class="righttext">', !empty($transaction['recd']) ? currency_display($transaction['recd']) : '', '</td>
					<td class="righttext">', !empty($transaction['sent']) ? currency_display($transaction['sent']) : '', '</td>
					<td>', $transaction['msg'], '</td>
				</tr>';
		}
	}

	echo '
			</tbody>
		</table>';
}

?>