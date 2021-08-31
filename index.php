<?php
/**
 *
 * Plugin Name: SelfList App Manager 2.0 CPF
 * Plugin URI: https://cyberizegroup.com
 * Description: Display a short notice above the post content.
 * Version:  2.0
 * Author URI:  https://www.linkedin.com/in/ahmedmusawir
 * License:  GPL-2.0+
 *
 */

//If this file is called directly, abort.
if (!defined('WPINC')) {
 die("Cannot Access Directly");
}

define('CYBERIZE_PLUGIN_DIR', plugins_url('', __FILE__));

require __DIR__ . '\vendor\autoload.php';

// Set up Ajax
$user_list = new CPF\Ajax\GetUserAjax();
$user_list->setup_ajax_handlers();
$add_points = new CPF\Ajax\AddUserPointsAjax();
$add_points->setup_ajax_handlers();

// Enqueue Scripts & Styles
$enqueue = new CPF\Base\Enqueue();
$enqueue->initialize();

// App Manager Admin Page
$app_man = new CPF\Pages\AppManager();