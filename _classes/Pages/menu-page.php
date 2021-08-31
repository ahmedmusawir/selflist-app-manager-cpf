<?php
/**
 * THIS IS THE APP MANAGER MENU PAGE
 */

function selflist_app_manager_settings_page()
{

 add_menu_page(
  'App Manager Portal',
  'App Manger',
  'manage_options',
  'app-manager',
  'selflist_settings_page_markup',
  'dashicons-businesswoman',
  200
 );

}

add_action('admin_menu', 'selflist_app_manager_settings_page');

function selflist_settings_page_markup()
{

 if (!current_user_can('manage_options')) {
  return;
 }

//  HTML VIEW STARTS
 echo '<h1>' . get_admin_page_title() . '</h1>';

 include '_view/settings-page-content.php';
//  HTML VIEW ENDS
}

function enqueue_scripts()
{

 wp_enqueue_script(
  'selflist-app-manager',
  get_template_directory_uri() . '/assets/dist/js/script-admin.min.js',
  ['jquery'],
  '1.0',
  false
 );

 wp_localize_script('selflist-app-manager', 'selflistAdminData', array(
  'root_url' => get_site_url(),
  'ajax_url' => admin_url('admin-ajax.php'),
  'nonce'    => wp_create_nonce('wp_rest')
 ));

}

add_action('admin_enqueue_scripts', 'enqueue_scripts');