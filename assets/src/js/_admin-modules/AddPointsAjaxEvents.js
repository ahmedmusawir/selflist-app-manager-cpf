import $ from 'jquery';

class AddPointsAjaxEvents {
  constructor() {
    // this.init();
    // COLLECTING AJAX INFO
    this.usersPointAddAjaxFunction = 'add_user_points_ajax';

    // ELEMENTS
    this.userPointsAddButton = $('#selflist-add-user-points-button');
    this.userPointsInput = $('#selflist-user-points');
    this.userPointsResultBox = $('#user-points-box');

    this.setEvents();
  }

  init = () => {
    // console.log('Add Points Ajax ...');
  };

  setEvents = () => {
    this.userPointsAddButton.on('click', this.addUserPointsAjax);
  };

  addUserPointsAjax = (e) => {
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
        // console.log(res);
        this.userPointsResultBox.html(res);
        this.userPointsInput.val('');
      })
      .fail(() => {
        console.log('Ajax Failed! In ' + this.usersPointAddAjaxFunction);
      })
      .always(() => {
        // console.log('Ajax Dynamic Loaction Filter Complete');
      });
  };
}

export default AddPointsAjaxEvents;
