<?php

/*
* Satheesh PM, BARC Mumbai
* www.satheesh.anushaktinagar.net
*/


elgg_register_event_handler('init', 'system', 'login_reminder_init');

function login_reminder_init(){
    elgg_extend_view('css/admin', 'login_reminder/admin');
    elgg_register_admin_menu_item('administer', 'deletion', 'users');
    elgg_register_event_handler('login', 'user', 'login_reminder_user_check');
    elgg_register_plugin_hook_handler('cron', 'fifteenmin', 'login_reminder_send_cron');
    elgg_register_plugin_hook_handler('cron', 'weekly', 'login_reminder_on_cron');
    elgg_register_library('login_reminder_functions', elgg_get_plugins_path() . 'login_reminder/lib/login_reminder.php');
    elgg_load_library('login_reminder_functions');
}

