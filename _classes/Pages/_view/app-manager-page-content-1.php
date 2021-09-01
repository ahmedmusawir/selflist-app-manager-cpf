<!-- SETTINGS PAGE CONTENT VIEW  -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
  integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<!-- USER SEARCH INPUT BOX   -->
<article class="container">
  <h1><?php echo get_admin_page_title() ?></h1>

  <div class="row">
    <section class="col-12 col-sm-12 col-md-6">
      <div class="wrap">

        <h1 class="text-danger">Search For User Accounts</h1>
        <!-- <label for="search-user">Find User</label> -->
        <input class="form-control" type="text" name="search-user" id="selflist-search-user"
          placeholder="find user by username, display name or id or email">
        <input id="selflist-find-user-button" class="btn btn-danger mt-2" type="button" value="FIND USER">

      </div>

      <!-- USER SEARCH RESULT DISPLAY -->
      <div id="user-list-box" class="p-3 card bg-light">

      </div>

    </section>
    <section class="col-12 col-sm-12 col-md-6">
      <!-- ADDING POINTS -->
      <div class="wrap">

        <h1 class="text-danger">Add Points To User Accounts</h1>
        <!-- <label for="search-user">Find User</label> -->
        <input class="form-control" type="number" name="selflist-user-points" id="selflist-user-points"
          placeholder="insert points to add to user account (numbers only)">
        <input id="selflist-add-user-points-button" class="btn btn-info mt-2" type="button" value="ADD POINTS">

      </div>
      <!-- ADD POINTS RESULT DISPLAY -->
      <div id="user-points-box" class="p-3 card bg-light">

      </div>
    </section>
  </div>
  <!-- REACT APP 2 -->
  <div class="row">
    <section id="app2"></section>
  </div>
</article>