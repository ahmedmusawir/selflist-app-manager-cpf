/**
 * ADMIN MAIN SCRIPT
 */
import $ from 'jquery';
// import TestAdminModule from './_admin-modules/TestAdminModule';
import AppManagerSettings from './_admin-modules/AppManagerSettings';
// import AdminAjaxEvents from './_admin-modules/AdminAjaxEvents';
// import AddPointsAjaxEvents from './_admin-modules/AddPointsAjaxEvents';

class App {
  constructor() {
    console.info('ES8 App ADMIN Initialized!');
    // LAUNCING TEST MODULES
    // new TestAdminModule();
    // APP MANAGER JS
    new AppManagerSettings();
    // new AdminAjaxEvents();
    // new AddPointsAjaxEvents();
  }
}

// INSTANTIATING APP
$(() => {
  new App();
});
