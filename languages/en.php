<?php

/*
 * Satheesh PM, BARC Mumbai
 * www.satheesh.anushaktinagar.net
 */



$english = array(
 
'login_reminder:yes' => 'Yes',
'login_reminder:no' => 'No',
'login_reminder:1month' => '1 Month Ago',
'login_reminder:2month' => '2 Months Ago',
'login_reminder:3month' => '3 Months Ago',
'login_reminder:6month' => '6 Months Ago',
'login_reminder:9month' => '9 Months Ago',
'login_reminder:12month' => '12 Months Ago',
'login_reminder:18month' => '18 Months Ago',
'login_reminder:24month' => '24 Months Ago',
'login_reminder:50years' => 'Never Logged In',
'login_reminder:notloggedin' => 'Never Logged in before',
'login_reminder:members' => 'Members with Inactive Message Counter',
'admin:users:deletion' => 'Terminating Members',

'login_reminder:info' => 'Thank you very much for downloading Login Reminder. Your Comments and Suggestions are always welcome and you are always free to contact Me for any Support or Modification through My <a href="http://satheesh.anushaktinagar.net" target="_blank"><font color="blue"><b>Personal website</b></font></a><br /><br />Just enabling this plugin will not work. You must setup a cron job in your site control panel for fifteen minutes and weekly. You can use <b>curl yoursite.com/cron/fifteenmin</b> or <b>curl yoursite.com/cron/weekly</b> in the command field',

'login_reminder:login_reminder' => 'Run a fifteen minutes cron to send Login Reminder to Members',
'login_reminder:login_reminder_week' => 'Run a weekly cron to swith ON the sending of Login Reminder to Members',
'login_reminder:remindertime' => 'Send <b>Login Reminder</b> to Members whos last login was on',
'login_reminder:terminationtime' => 'Send <b>Termination Reminder</b> to Members whos last login was on',
'login_reminder:terminationcounter' => 'Select the number of Messages to be send before Termination',
'login_reminder:deletion' => 'Allow <b>Deletion</b> of inactive members',
'login_reminder:send' => 'Total number of Batches processed (10 users per batch)',   
'login_reminder:login_reminder_on_cron' =>'Login Reminder Sending Swithched ON',
'login_reminder:login_reminder_off_cron' =>'Not sending any Login Reminder Messages',
'login_reminder:login_reminder_send_cron_false' =>'No members to send Login Reminder. Or Reminder setting is Off',
'login_reminder:login_reminder_send_cron_true' =>'Login Reminder was send to some Members',
    

//Missed You Message
'login_reminder:missedyou:subject' => 'We Missed You',
'login_reminder:missedyou' => "

Dear %s,

Once you were very active here and has contributed a lot to %s site. Now a days you are not online, yes we could understand you may be busy, but We missed your posts, comments and valuable suggestions in this website

Your last login was on '%s' and a lot has changed since your last visit. Once again we love to see you active in %s website. Come back and visit your site soon, let us share what you think of the improvements.

Your Login Detail are

Username : %s
Email: %s
Password Reset URL : %s

Thanking You
Administrator
%s
%s

Automated Login Reminder Message mailed by %s Site on %s since you were not logged in to the site for more than a couple of months. You will get this message weekly once till you login.
",

//Account Inactive Message
'login_reminder:login_message:subject' => 'Not Online for a longer time',
'login_reminder:login_message' => "

Dear %s,

It has been found that your account associated with this email id (%s) was inactive for a long time. Your last login to your account in %s site was on %s.

Your Login Detail are

Username : %s
Email: %s
Password Reset URL : %s
Login Reminder Message Counter : %s

Thanking You
Administrator
%s
%s

Automated Login Reminder Message mailed by %s Site on %s.
Login Reminder Message Counter : %s
Your account will be terminated after you receive 5 more messages like this which are send once in a week. To avoid account termination please log in to your Site.
",     

//Account Termination Message    
'login_reminder:account_terminated:subject' =>'Your Account Terminated',
'login_reminder:account_terminated' =>'
Dear %s,

This is a automated message to inform you that your account in %s Site ( %s ) associated with this email ID ( %s ) has been terminated because of long term inactivity. Your Last login to the site was on : %s

Any way you can always register a new account at any time through the following Link
%s

Thank You
Administrator
%s
%s
Automated Account Termination Message mailed by %s Site on %s.
',

//Welcome back message
'login_reminder:welcomeback:subject' =>'Welcome Back',
'login_reminder:welcomeback' =>'
Dear %s,

Happy to see you back again in %s site.. Hope you will be enjoying the site..

Thank You
Administrator
%s
%s
Automated Account Retrieve Message mailed by %s Site on %s.
',
    
);
					
add_translation("en", $english);





