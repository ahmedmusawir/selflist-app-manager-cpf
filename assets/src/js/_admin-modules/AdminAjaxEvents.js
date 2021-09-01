import $ from 'jquery';
import AddPointsAjaxEvents from './AddPointsAjaxEvents';

class AdminAjaxEvents extends AddPointsAjaxEvents {
  constructor() {
    super();
    // this.init();
    // COLLECTING AJAX INFO
    this.ajaxUrl = ajaxData.ajax_url;
    this.usersListAjaxFunction = 'get_current_user_list';
    // ELEMENTS
    this.userListResults = $('#user-list-box');

    // USER IDS ARRAY
    this.userIds = [];
  }

  init = () => {
    console.log('Admin Ajax ...');
  };

  listUsersAjax = () => {
    // console.log('Running the Ajax ...');

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
        // RESETTING USER IDS
        this.userIds = [];
        // DISABLING ADD POINT FORM
        this.userPointsAddButton.prop('disabled', true);
        this.userPointsInput.prop('disabled', true);
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
    const selectedUserId = e.target.dataset.userid;

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
      this.userPointsInput.prop('disabled', true);
    }
  };
}

export default AdminAjaxEvents;
