import $ from 'jquery';

class TestAdminModule {
  constructor() {
    this.init();
    // COLLECTING ELEMENTS
    this.button = $('#wpbody');
    this.setEvents();
  }

  init = () => {
    console.log('Admin Module from CPF 3.0  ...');
  };

  setEvents = () => {
    this.button.on('click', this.clickHandler);
  };

  clickHandler = () => {
    console.log('clicked up from Sample Module ...');
    // alert('Wrap Clicked: From CPF 3');
  };
}

export default TestAdminModule;
