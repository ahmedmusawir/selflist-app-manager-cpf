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

  if (!$user_new_points) {
   echo "Please insert the new points you want to add...";

   wp_die();
  }

  // echo '<pre>';
  // print_r($user_id_array);
  // echo 'New Points: ' . $user_new_points;
  // echo '</pre>';

  foreach ($user_id_array as $current_user_id) {

   // GETTING USER DATA BY ID
   $user_obj  = get_userdata($current_user_id);
   $user_name = $user_obj->display_name;

   echo '<div class="border p-3" data-userID="' . $user->ID . '" >';

   $current_available_user_points = get_field('selflist_points', 'user_' . $current_user_id);
   echo '<h5 class="badge badge-dark">CURRENT POINTS OF ' . $user_name . ' (ID:' . $current_user_id . ') IS ' . $current_available_user_points . '</h5>';
   // USER POINTS AFTER ADDING NEW POINTS
   $user_total_points = $current_available_user_points + $user_new_points;
   echo '<br><h5 class="badge badge-danger">USER NEW POINTS: ' . $user_total_points . '</h5>';
   // UPDATE USER POINTS
   // Will return false if the previous value is the same as $new_value.
   $points_updated = update_user_meta($current_user_id, 'selflist_points', $user_total_points);
   //  echo '<br>POINTS UPDATED: ' . $points_updated;

   echo '</div>';

  }

  wp_die();

 }

}