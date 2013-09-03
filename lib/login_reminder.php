<?php

/*
* Satheesh PM, BARC Mumbai
* www.satheesh.anushaktinagar.net
*/


//Function to switch on Login Reminders weekly
function login_reminder_on_cron($hook, $entity_type, $returnvalue, $params){
if (elgg_get_plugin_setting('reminder_week', 'login_reminder') != "yes"){
    elgg_set_plugin_setting('reminder', 'yes', 'login_reminder');
    return $returnvalue.elgg_echo("login_reminder:login_reminder_on_cron");
}else{
    return $returnvalue.elgg_echo("login_reminder:login_reminder_off_cron");
}
}

//Check logged in users for a inactive message tag, if yes remove it 
function login_reminder_user_check(){
    if(isset(elgg_get_logged_in_user_entity()->inactive_message)){
        elgg_get_logged_in_user_entity()->deleteMetadata('inactive_message');
        $name = elgg_get_logged_in_user_entity()->name;
        $email = elgg_get_logged_in_user_entity()->email;
        $siteurl = elgg_get_site_entity()->url;
        $sitename = elgg_get_site_entity()->name;
        $siteemail = elgg_get_site_entity()->email;
        $from = $sitename.' <'.$siteemail.'>';
        $mail_today = date('dS F Y. h:i:s A', strtotime('now')); 
        $message = sprintf(elgg_echo('login_reminder:welcomeback'), $name, $sitename, $sitename, $siteurl, $sitename, $mail_today);
        elgg_send_email($from, $email, elgg_echo('login_reminder:welcomeback:subject'), $message);
    }
}

//Function to send Login Reminders to not logged in users and option to Terminate them
function login_reminder_send_cron($hook, $entity_type, $returnvalue, $params) {
    if (elgg_get_plugin_setting('reminder', 'login_reminder') == "yes"){
        elgg_set_ignore_access(true);
        $counter = elgg_get_plugin_setting('counter', 'login_reminder');
        $db_prefix = elgg_get_config('dbprefix');
        $joins = array("JOIN {$db_prefix}users_entity u on e.guid = u.guid");
        $mc = elgg_get_plugin_setting('terminationcounter', 'login_reminder');
        $last_time_login_missed_you = elgg_get_plugin_setting('logintime', 'login_reminder');
        $last_time_login_termination = elgg_get_plugin_setting('terminationtime', 'login_reminder');
        $time = strtotime($last_time_login_missed_you);

        $siteurl = elgg_get_site_entity()->url;
        $sitename = elgg_get_site_entity()->name;
        $siteemail = elgg_get_site_entity()->email;
        $from = $sitename.' <'.$siteemail.'>';
        $register = $siteurl.'register';
        $resetpwd = $siteurl."forgotpassword";
        $mail_today = date('dS F Y. h:i:s A', strtotime('now')); 

        $options_login_reminder = array(
            'types' => 'user',
            'limit' => 10,
            'full_view' => false,
            'pagination' => true,
            'joins' => $joins,
            'wheres' => "u.last_login < {$time}",
            'offset' => $counter,
        );

        $entities = elgg_get_entities_from_metadata($options_login_reminder); 
        if($entities){
            $counter = $counter + 10;
            elgg_set_plugin_setting('counter', $counter, 'login_reminder');
            foreach ($entities as $entity) {
                $name = $entity->name;
                $username = $entity->username;
                $email = $entity->email;
                $login = $entity->last_login;
                if ($email){
                    if($login <= strtotime($last_time_login_termination)){
                        if ($login == 0 ){
                            $login_date = elgg_echo('login_reminder:notloggedin');
                        }else{
                            $login_date = date("dS F Y. h:i:s A", $login);
                        }

                        if(!isset($entity->inactive_message)){
                            $entity->inactive_message = "1";
                        }else{
                            $entity->inactive_message = $entity->inactive_message + 1;
                        }
                        $message_counter = $entity->inactive_message;

                        if($message_counter > $mc){
                            if (elgg_get_plugin_setting('deletion', 'login_reminder') == "yes"){
                                $message = sprintf(elgg_echo('login_reminder:account_terminated'), $name, $sitename, $siteurl, $email, $login_date, $register, $sitename, $siteurl, $sitename, $mail_today);
                                elgg_send_email($from, $email, elgg_echo('login_reminder:account_terminated:subject'), $message);

//Delete the User
                                $entity->delete();
                            }
                        }else{
                            $message = sprintf(elgg_echo('login_reminder:login_message'), $name, $email, $sitename, $login_date, $username, $email, $resetpwd, $message_counter, $sitename, $siteurl, $sitename, $mail_today, $message_counter);
                            elgg_send_email($from, $email, elgg_echo('login_reminder:login_message:subject'), $message);
                        }
                    }else{
                        $login_date = date("dS F Y. h:i:s A", $login);
                        $message = sprintf(elgg_echo('login_reminder:missedyou'), $name, $sitename, $login_date, $sitename, $username, $email, $resetpwd, $sitename, $siteurl, $sitename, $mail_today);
                        elgg_send_email($from, $email, elgg_echo('login_reminder:missedyou:subject'), $message);
                    }
                }
            }
        }else{
        elgg_set_plugin_setting('counter', '0', 'login_reminder');
        elgg_set_plugin_setting('reminder', 'no', 'login_reminder');
        }
        return $returnvalue.elgg_echo("login_reminder:login_reminder_send_cron_true");
    }
    elgg_set_ignore_access(false);
    return $returnvalue.elgg_echo("login_reminder:login_reminder_send_cron_false");
}
