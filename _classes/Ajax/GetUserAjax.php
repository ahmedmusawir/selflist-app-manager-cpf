<?php
/**
 * AJAX GET USERS FOR APP MANAGER
 */

namespace CPF\Ajax;

class GetUserAjax
{

 public function setup_ajax_handlers()
 {

  add_action(
   'wp_ajax_get_current_user_list',
   array($this, 'get_current_user_list')
  );

  add_action(
   'wp_ajax_nopriv_get_current_user_list',
   array($this, 'get_current_user_list')
  );

 }

 public function get_current_user_list()
 {
  // COLLECTING THE SEARCH TEXT
  $search_text = $_POST['searchText'];
  // echo 'Search Text: ' . $search_text;
  if (!$search_text) {
   echo "Please insert a search text...";
   wp_die();
  }

// ARGS FOR THE USER QUERY
  $args = array(
   'number'         => -1,
   'search'         => '*' . $search_text . '*',
   'search_columns' => ['display_name', 'user_email', 'user_nicename', 'user_login', 'ID']
  );

  // THE USER QUERY W/ SEARCH
  $user_query = new \WP_User_Query($args);

  // THE USER LOOP
  if (!empty($user_query->get_results())) {
   foreach ($user_query->get_results() as $user) {

    $acf_user_id         = 'user_' . $user->ID;
    $user_current_points = get_field('selflist_points', $acf_user_id);

    echo '<div class="border p-3" data-userID="' . $user->ID . '" >';
    echo '<input class="user-checkbox" data-userID="' . $user->ID . '" type="checkbox">';

    echo 'User found: ' . $user->display_name . '<br>';
    echo '<span class="badge badge-danger">User ID: ' . $user->ID . ' </span><span class="badge badge-dark">Current User Points: ' . $user_current_points . '</span><br>';

    echo '</div>';

   }
  } else {

   echo 'No users found.';

  }

  wp_die();

 }

}