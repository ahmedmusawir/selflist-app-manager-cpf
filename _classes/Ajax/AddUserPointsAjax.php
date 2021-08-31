<?php
/**
 * AJAX GET USERS FOR APP MANAGER
 */

namespace CPF\Ajax;

class AddUserPointsAjax
{

 public function setup_ajax_handlers()
 {

  add_action(
   'wp_ajax_add_user_points_ajax',
   array($this, 'add_user_points_ajax')
  );

  add_action(
   'wp_ajax_nopriv_add_user_points_ajax',
   array($this, 'add_user_points_ajax')
  );

 }

 public function add_user_points_ajax()
 {
  // COLLECTING THE SEARCH TEXT
  $user_id_array   = $_POST['userIdArray'];
  $user_new_points = $_POST['userNewPoints'];

  echo '<pre>';
  print_r($user_id_array);
  echo 'Points: ' . $user_new_points;
  echo '</pre>';

  // $current_user_id = get_current_user_id();
  // $current_available_user_points = get_field('selflist_points', 'user_' . $current_user_id);
  // USER POINTS AFTER PAYMENT
  // $post_payment_user_points = $current_available_user_points - $payment_points;

// UPDATE USER POINTS
  // Will return false if the previous value is the same as $new_value.
  // $points_updated = update_user_meta($current_user_id, 'selflist_points', $post_payment_user_points);

  // if (!$userNewPoints) {
  //  echo "Please insert the new points you want to add...";
  //  wp_die();
  // }

  wp_die();

 }

}