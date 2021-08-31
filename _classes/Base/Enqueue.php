<?php
/**
 * MPF Scripts Enqueue Class
 */
namespace CPF\Base;

class Enqueue
{

 public function __construct()
 {

 }

 public function initialize()
 {
  add_action('admin_enqueue_scripts', array($this, 'enqueue_admin_styles'));
  add_action('admin_enqueue_scripts', array($this, 'enqueue_admin_scripts'));

  add_action('wp_enqueue_scripts', array($this, 'enqueue_public_styles'));
  add_action('wp_enqueue_scripts', array($this, 'enqueue_public_scripts'));

 }

 public function enqueue_admin_styles()
 {

  wp_enqueue_style(

   'CPF-admin-style',
   CYBERIZE_PLUGIN_DIR . '/assets/dist/css/admin.min.css',
   array(),
   '1.0'

  );
 }

 public function enqueue_public_styles()
 {

  wp_enqueue_style(

   'CPF-public-style',
   CYBERIZE_PLUGIN_DIR . '/assets/dist/css/public.min.css',
   array(),
   '1.0'

  );
 }

 public function enqueue_admin_scripts()
 {

  wp_enqueue_script(

   'CPF-admin-script',
   CYBERIZE_PLUGIN_DIR . '/assets/dist/js/admin.min.js',
   array('jquery'),
   '1.0'

  );

  wp_localize_script('CPF-admin-script', 'ajaxData', array(
   'root_url' => get_site_url(),
   'ajax_url' => admin_url('admin-ajax.php'),
   'nonce'    => wp_create_nonce('wp_rest')
  ));

  // wp_enqueue_script(

  //  'moose-bootstrap-4',
  //  'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js',
  //  array('jquery'),
  //  '1.0',
  //  true

  // );

 }

 public function enqueue_public_scripts()
 {

  wp_enqueue_script(

   'CPF-public-script',
   CYBERIZE_PLUGIN_DIR . '/assets/dist/js/public.min.js',
   array('jquery'),
   '1.0',
   true

  );

  // wp_enqueue_script(

  //  'moose-bootstrap-4',
  //  'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js',
  //  array('jquery'),
  //  '1.0',
  //  true

  // );
 }
}