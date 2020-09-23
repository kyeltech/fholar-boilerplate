<?php
// fhola
$iparray = array("127.0.0.1", "::1");
$remote = (in_array($_SERVER['REMOTE_ADDR'], $iparray)) ? TRUE : FALSE;
$local_remote = (strpos($_SERVER['REMOTE_ADDR'], "192.168.") !== FALSE) ? TRUE : FALSE;

// site name
$sitename = 'MyWishlist';

// define base urls 
$base_url_local = '/fhorla_boilerplate/';
$base_url = 'http://wishlist.greenmousetech.com/';

// alternative base urls
$alt_base_url_local = NULL;
$alt_base_url = NULL;

// define root dir
$root_dir_local = 'fhorla_boilerplate';
$root_dir = 'wishlist.greenmousetech.com';

// index page for app
$index_page = '';

// user shopping cart
$use_shopping_cart = TRUE;

// cart session name can be changed
$cart_sess_name = NULL;

// cart attr name
$cart_attr_name = NULL;

// define 404 page path
$err404 = 'view/404.php';

$debug = FALSE;

// emailing smtp configuration
$smtp['host'] = 'greenmousetech.com';
$smtp['username'] = 'michael@greenmousetech.com';
$smtp['password'] = 'Mike_2019';
$smtp['secure'] = 'ssl';
$smtp['port'] = '465';


// 404 page path
define("PAGE_404", $err404);

// debug
define("DEBUG",$debug);

// site title
define("TITLE", "");

// site name
define("SITENAME",$sitename);

// preloader
define("PRELOADER", FALSE);

// define index page
define("INDEX_PAGE", $index_page);

if($remote == TRUE){
    // base url local env
    define("BASE_URL", $base_url_local);
    // alt base url local env
    define("ALT_BASE_URL", $alt_base_url_local);
    // root dir local env
    define("ROOT_DIR", $root_dir_local);
}
else{
    // check for local remote connection
    // local testing
    // optional - access from remote computer
    if($local_remote == TRUE){
        // base url local env
        define("BASE_URL", $base_url_local);
        // alt base url local env
        define("ALT_BASE_URL", $alt_base_url_local);
        // root dir local env
        define("ROOT_DIR", $root_dir_local);
    }
    else{
        // base url online env
        define("BASE_URL", $base_url);
        // alt base url production env
        define("ALT_BASE_URL", $alt_base_url);
        // root dir online env
        define("ROOT_DIR", $root_dir);      
    }
}

define("USE_SHOPPING_CART", $use_shopping_cart);

// define cart name
define("FHOLA_CART", $cart_sess_name);

// cart attribute session name
define("CART_ATTR", $cart_attr_name);

define('SMTP',$smtp);
// fhola