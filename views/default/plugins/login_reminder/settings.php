<?php

/*
 * Satheesh PM, BARC Mumbai
 * www.satheesh.anushaktinagar.net
 */
if (!isset($vars['entity']->reminder)) {
	$vars['entity']->reminder = 'no';
}
if (!isset($vars['entity']->counter)) {
	$vars['entity']->counter = '0';
}
if (!isset($vars['entity']->logintime)) {
	$vars['entity']->logintime = '-3 months';
}
if (!isset($vars['entity']->deletion)) {
	$vars['entity']->deletion = 'yes';
}
if (!isset($vars['entity']->terminationtime)) {
	$vars['entity']->terminationtime = '-12 months';
}
if (!isset($vars['entity']->terminationcounter)) {
	$vars['entity']->terminationcounter = '5';
}
echo "<div class='admin_settings'>".elgg_echo('login_reminder:info').'</div>';

echo "<div class='admin_settings'>".elgg_echo('login_reminder:login_reminder')." : ";
echo elgg_view('input/dropdown', array(
        'name' => 'params[reminder]',
        'options_values' => array(
                'yes' => elgg_echo('login_reminder:yes'),
                'no' => elgg_echo('login_reminder:no'),
        ),
        'value' => $vars['entity']->reminder,
        ));
echo elgg_view('input/text', array(
        'name' => 'params[counter]',
        'value' => $vars['entity']->counter,
        ));
echo "<br />".elgg_echo('login_reminder:remindertime')." : ";
echo elgg_view('input/dropdown', array(
        'name' => 'params[logintime]',
        'options_values' => array(
                '-1 month' => elgg_echo('login_reminder:1month'),
                '-2 months' => elgg_echo('login_reminder:2month'),
                '-3 months' => elgg_echo('login_reminder:3month'),
                '-6 months' => elgg_echo('login_reminder:6month'),
        ),
        'value' => $vars['entity']->logintime,
        ));

echo "<br />".elgg_echo('login_reminder:deletion')." : ";
echo elgg_view('input/dropdown', array(
        'name' => 'params[deletion]',
        'options_values' => array(
                'yes' => elgg_echo('login_reminder:yes'),
                'no' => elgg_echo('login_reminder:no'),
        ),
        'value' => $vars['entity']->deletion,
        ));
if(($vars['entity']->deletion) == 'yes'){
echo "<br />".elgg_echo('login_reminder:terminationtime')." : ";

echo elgg_view('input/dropdown', array(
        'name' => 'params[terminationtime]',
        'options_values' => array(
                '-9 month' => elgg_echo('login_reminder:9month'),
                '-12 months' => elgg_echo('login_reminder:12month'),
                '-18 months' => elgg_echo('login_reminder:18month'),
                '-24 months' => elgg_echo('login_reminder:24month'),
                '-50 years' => elgg_echo('login_reminder:50years'),
        ),
        'value' => $vars['entity']->terminationtime,
        ));

echo "<br />".elgg_echo('login_reminder:terminationcounter')." : ";

echo elgg_view('input/dropdown', array(
        'name' => 'params[terminationcounter]',
        'options_values' => array(
                '3' => elgg_echo('3'),
                '5' => elgg_echo('5'),
                '7' => elgg_echo('7'),
                '10' => elgg_echo('10'),
        ),
        'value' => $vars['entity']->terminationcounter,
        ));
}
echo "</div>";

echo "<div class='admin_settings'>".elgg_echo('login_reminder:send')." : ";
echo ($vars['entity']->counter)/10;
echo '</div>';