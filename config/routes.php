<?php
// Assign views to controllers

// * for numeric data values
// $ for alpha data values
// *$ for alphanumeric data values
// $$ for any data value

// passing args to urls
/*
for url having arguments tied directly to the index method of their controllers
    e.g
    'welcome' => 'welcome/1/*'
    
    where welcome is the controller
    1 is the no of arguments to be passed to the method
    * is the data type to be passed...
    
for url having arguments tied directly to a custom method of their controllers
    e.g
    'new_page' => 'welcome/{new_page}/1/*'
    
    where welcome is the controller
    {new_page} is custom method of the class. NB methods are wrapped around curly braces
    1 is the no of arguments to be passed to the method
    * is the data type to be passed...
*/

$assign = array(
    // visitors pages
    'welcome' => 'welcome/',
    'new_page' => 'welcome/{new_page}/1/*',
    'hello' => 'welcome/{hello}',
    'signin' => 'user_auth_profile/{signin}',
    'signup' => 'user_auth_profile/{signup}',
    'verify' => 'user_auth_profile/{verify}/1/$$',
    'build' => 'Pages/{build}',

    // api requests
    'api_create_account' => 'Api/{create_account}',
    'api_signin' => 'Api/{signin}',
    'api_profile_update' => 'Api/{profile_update}',
    'api_security_update' => 'Api/{security_update}',
    'api_console_signin' => 'Api/{console_signin}',

    // account api requests
    'api_create_event' => 'Api/{create_event}',
    'api_save_event_tags' => 'Api/{save_event_tags}',
    'api_get_event_tags' => 'Api/{get_event_tags}',
    'api_choose_address' => 'Api/{choose_address}',
    'api_update_event' => 'Api/{update_event}',
    'api_update_event_tags' => 'Api/{update_event_tags}',
    
    'gifts' => 'Pages/{gifts}',
    'registry' => 'Pages/{registry}',
    'how_it_works' => 'Pages/{how_it_works}',
    'faqs' => 'Pages/{faqs}',
    'contact' => 'Pages/{contact}',
    
    // account pages
    'account_index' => 'user_auth_profile/{dashboard}',
    'profile' => 'user_auth_profile/{user_profile}',
    'event' => 'user_auth_profile/{user_event}/1/$$',
    'my-events' => 'user_auth_profile/{my_events}',
    'my-event' => 'user_auth_profile/{my_event}/2/$$',
    'view_trans' => 'user_auth_profile/{trans_details}/1/*',
    'signout' => 'user_auth_profile/{signout}',
    
    // console pages
    'console' => 'Pages/{console}',
    'users' => 'Console/{users}',
    'events' => 'Console/{events}',
    'new_product' => 'Console/{new_product}',
    'new_orders' => 'Console/{new_orders}',
    'fulfilled_orders' => 'Console/{fulfilled_orders}',
    'security' => 'Console/{security}',
    'transactions' => 'Console/{transactions}',

);



define('ASG',$assign);