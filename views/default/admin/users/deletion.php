<?php

/*
 * Satheesh PM, BARC Mumbai
 * www.satheesh.anushaktinagar.net
*/

//Terminating Members name
$options = array(
    'metadata_names' => 'inactive_message',
    'types' => 'user',
    'limit' => false,
    'full_view' => false,
    'pagination' => false,
    'list_type' => 'gallery',
    'gallery_class' => 'elgg-gallery-users',
    'order_by_metadata' => array('name' => 'inactive_message', 'direction' => ASC, 'as' => 'integer')
);
$members = new ElggBatch('elgg_get_entities_from_metadata', $options);
$title = elgg_echo('login_reminder:members');
$body = '';
    foreach ($members as $member) {
            $body .= '<a href="'.elgg_get_site_url().'profile/'.$member->username.'">'.$member->name.'</a> ('.$member->inactive_message.') | ';
        }
echo elgg_view_module('inline', $title, $body);
