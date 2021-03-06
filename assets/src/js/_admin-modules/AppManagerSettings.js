import $ from 'jquery';
import AdminAjaxEvents from './AdminAjaxEvents';

class AppManagerSettings extends AdminAjaxEvents {
  constructor() {
    super();
    this.init();
    // COLLECTING AJAX INFO
    this.ajaxUrl = ajaxData.ajax_url;
    this.usersListAjaxFunction = 'get_current_user_list';
    this.usersPointAddAjaxFunction = 'add_user_points_ajax';
    // COLLECTING ELEMENTS
    this.button = $('#selflist-find-user-button');
    this.userSearchInput = $('#selflist-search-user');
    this.userSearchText;

    this.setEvents();
  }

  init = () => {
    console.log('ES6 From WPAdmin ...');
    // alert(this.button);
  };

  setEvents = () => {
    this.button.on('click', this.clickHandler);
  };

  testAjax = () => {
    console.log('Test Ajax Clicked ... how many times?');
  };

  clickHandler = () => {
    this.userSearchText = this.userSearchInput.val();
    this.listUsersAjax();
  };
}

export default AppManagerSettings;
