<?php
/**
 * THIS IS THE APP MANAGER MENU PAGE CLASS
 */
namespace CPF\Pages;

class AppManager
{

 public function __construct()
 {
  // echo "<h1>WHAT THE FUCK<h1>";
  add_action('admin_menu', [$this, 'selflist_app_manager_settings_page']);
 }

 public function selflist_app_manager_settings_page()
 {

  add_menu_page(
   'App Manager Portal',
   'App Manger',
   'manage_options',
   'app-manager',
   [$this, 'selflist_settings_page_markup'],
   'dashicons-businesswoman',
   200
  );

 }

 public function selflist_settings_page_markup()
 {

  if (!current_user_can('manage_options')) {
   return;
  }

//  HTML VIEW STARTS

  include '_view/app-manager-page-content.php';
  //  HTML VIEW ENDS
 }

}