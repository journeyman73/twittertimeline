<?php
################################################################################################
#  Twitter Timeline for Opencart 1.5.6.x                                                       #
################################################################################################

/*
 * This file contains the english version of any static text required by your module in the admin area.
 * If you want to translate your module to another language, the idea is that you can just replace the
 * right hand column below with the changed language, rather than modifying every file in your module.
 * 
 * We will call these language strings through in the controller to make them available in the view. 
 * 
 * For your module, think about any text that you want to display and add it in here. Also replace all the
 * "My Module" text for the name of your module.
 * 
 */

// Example field added (see related part in admin/controller/module/my_module.php)
//$_['my_module_example'] = 'Example Extra Text';



// Heading Goes here:
$_['heading_title']    = 'Twitter Timeline';


// Text
$_['text_module']      = 'Modules';
$_['text_success']     = 'Success: You have modified Twitter Timeline';
$_['text_content_top']    = 'Content Top';
$_['text_content_bottom'] = 'Content Bottom';
$_['text_column_left']    = 'Column Left';
$_['text_column_right']   = 'Column Right';
$_['tab_connect']      = 'api Connection';
$_['tab_display']      = 'Display';

// Entry
$_['entry_limit']         = 'Tweet Display Limit:';
$_['entry_layout']        = 'Layout:';
$_['entry_position']      = 'Position:';
$_['entry_status']        = 'Status:';
$_['entry_sort_order']    = 'Sort Order:';

$_['entry_twitter_screen_name']               = 'Screen Name:<br />The screen name of the user for whom to return results for';
$_['entry_twitter_cache_expire']	            = 'Cache Expire:<br />How often to update cache file';
$_['entry_twitter_api_url']	                  = 'Twitter api url:';
$_['entry_twitter_oauth_access_token']	      = 'Twitter oauth access token:';
$_['entry_twitter_oauth_access_token_secret']	= 'Twitter oauth access token secret:';
$_['entry_twitter_consumer_key']	            = 'Twitter consumer key:';
$_['entry_twitter_consumer_secret']	          = 'Twitter consumer secret:';
$_['entry_twitter_count']	                    = 'Count:<br />Specifies the number of tweets to try and cache';
$_['entry_twitter_exclude_replies']	          = 'Exclude Replies:<br />When set to yes, This parameter will prevent replies from appearing in the returned timeline';
$_['entry_twitter_include_rts']	              = 'Include Retweets:<br />When set to no, the timeline will strip any native retweets';

// Error
$_['error_twitter_screen_name']               = 'Screen Name required!';
$_['error_twitter_cache_expire']              = 'Cache value required!';
$_['error_twitter_api_url']                   = 'Twitter api url required!';
$_['error_twitter_oauth_access_token']        = 'Twitter oauth access token required!';
$_['error_twitter_oauth_access_token_secret'] = 'Twitter oauth access token secret required!';
$_['error_twitter_consumer_key']              = 'Twitter consumer key required!';
$_['error_twitter_consumer_secret']           = 'Twitter consumer secret required!';
$_['error_twitter_count']	                    = 'Specify the number of tweets to try and cache';
$_['error_twitter_exclude_replies']	          = 'Prevent replies from appearing in the returned timeline';
$_['error_twitter_include_rts']	              = 'Include Retweets:<br />When set to no, the timeline will strip any native retweets';
?>