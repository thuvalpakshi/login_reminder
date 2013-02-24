What this plugin do:

1. Will send out a 'missed you' message to members who were not logged in to the site for a specific time. Time can be set from the settings page.

2. Option to delete a inactive member automatically... Before deletion user will get a certain number of inactive reminder message in his/her registered email, one per week... If fails to login, account will be deleted with an account deletion email notification.

3. If logins after getting such inactive reminder message, the inactive tag will be removed from the user.

4. Will send the messages once in 15 minutes. After sending out 'missed you message' or 'login reminder message' sending will get switched off.

5. When weekly cron runs login reminder sending will be switched on.

6. Can view the users with inactive message counter at Admin panel.. Administer >> users >> Termination Users

What you need :

Two working cron jobs in cpanel.. if you don't know how to set cron in cpanel... please refer to the tutorial by webgalli at http://www.webgalli.com/blog/how-to-create-cron-job-for-elgg/the cron job required are

1. 5 minutes  [can use the command Your-site-URL/cron/fifteenmin]

2. weekly [can use the command Your-Site-URL/cron/weekly]

How to install

1. Disable and delete the sitecron plugin if you are using

2. upload this plugin and enable..

3. do the settings..!

4. remember to create the cron jobs for 15 min and weekly in cpanel.