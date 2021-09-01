import $ from 'jquery';
import AdminAjaxEvents from './AdminAjaxEvents';

class AppManagerSettings extends AdminAjaxEvents {
  constructor() {
    super();
    this.init();
    // COLLECTING ELEMENTS
    this.button = $('#selflist-find-user-button');
    this.userSearchInput = $('#selflist-search-user');
    this.userSearchText;
    this.userTESTButton = $('#selflist-TEST-button');

    this.setEvents();
  }

  init = () => {
    console.log('ES6 From WPAdmin ...');
    // alert(this.button);
  };

  setEvents = () => {
    this.button.on('click', this.clickHandler);
    this.userTESTButton.on('click', this.testAjax);
  };

  testAjax = () => {
    console.log('Test Ajax Clicked ... how many times?');
  };

  clickHandler = () => {
    this.userSearchText = this.userSearchInput.val();
    console.log('Find User clicked');
    // alert(this.userSearchText);
    this.listUsersAjax();
  };
}

export default AppManagerSettings;

// $(() => {
//   new AppManagerSettings();
// });

// jQuery(($) => {
//   new AppManagerSettings();
// });

// jQuery(function ($) {
//   new AppManagerSettings();
// });
