import $ from 'jquery';

class AdminAjaxEvents {
  constructor() {
    // this.init();
    // COLLECTING AJAX INFO
    this.ajaxUrl = ajaxData.ajax_url;
    this.usersListAjaxFunction = 'get_current_user_list';
    this.usersPointAddAjaxFunction = 'add_user_points_ajax';
    // ELEMENTS
    this.userListResults = $('#user-list-box');
    this.userPointsAddButton = $('#selflist-add-user-points-button');
    // this.userTESTButton = $('#selflist-TEST-button');
    this.userPointsInput = $('#selflist-user-points');
    this.userPointsResultBox = $('#user-points-box');
    // USER IDS ARRAY
    this.userIds = [];
    this.setEvents();
  }

  init = () => {
    console.log('Admin Ajax ...');
  };

  setEvents = () => {
    this.userPointsAddButton.on('click', this.AddUserPointsAjax);
    // this.userTESTButton.on('click', this.testAjax);
    // this.userPointsAddButton.off();
  };

  // testAjax = () => {
  //   console.log('Test Ajax Clicked ... how many times?');
  // };

  listUsersAjax = () => {
    console.log('Running the Ajax ...');
    // console.log(this.userSearchText);

    // AJAX FUNCTION
    $.ajax({
      url: this.ajaxUrl,
      type: 'post',
      data: {
        action: this.usersListAjaxFunction,
        searchText: this.userSearchText,
      },
    })
      .done((res) => {
        // console.log(res);
        this.userListResults.html(res);
        this.addSelectEvents();
      })
      .fail(() => {
        console.log('Ajax Failed! In ' + this.usersListAjaxFunction);
      })
      .always(() => {
        // console.log('Ajax Dynamic Loaction Filter Complete');
      });
  };

  addSelectEvents = () => {
    this.userCheckBox = $('.user-checkbox');
    this.userCheckBox.on('change', this.selectUsers);
  };

  selectUsers = (e) => {
    const selectedUser = e.target.checked;
    // console.log(selectedUser);
    const selectedUserId = e.target.dataset.userid;
    // console.log(selectedUserId);

    // CHECKING FOR CHECKBOX CHECKED
    if (selectedUser == true) {
      this.userIds.push(selectedUserId);
    } else {
      this.userIds.pop(selectedUserId);
    }

    console.log(this.userIds);

    // ENABLE & DISABLE POINT ADD FORM
    if (this.userIds.length !== 0) {
      this.userPointsAddButton.removeAttr('disabled');
      this.userPointsInput.removeAttr('disabled');
    } else {
      this.userPointsAddButton.prop('disabled', true);
      this.userPointsInput.addClass('disabled');
      // this.userPointsInput.prop('disabled', true);
    }
  };

  AddUserPointsAjax = () => {
    console.log('Add points clicked');
    // AJAX FUNCTION
    $.ajax({
      url: this.ajaxUrl,
      type: 'post',
      data: {
        action: this.usersPointAddAjaxFunction,
        userIdArray: this.userIds,
        userNewPoints: this.userPointsInput.val(),
      },
    })
      .done((res) => {
        console.log(res);
        this.userPointsResultBox.html(res);
      })
      .fail(() => {
        console.log('Ajax Failed! In ' + this.usersPointAddAjaxFunction);
      })
      .always(() => {
        // console.log('Ajax Dynamic Loaction Filter Complete');
      });
  };
}

export default AdminAjaxEvents;
