import $ from 'jquery';

class TestPubModule {
  constructor() {
    this.init();
    // COLLECTING ELEMENTS
    this.button = $('#primary');
    this.setEvents();
  }

  init = () => {
    console.log('Test PUBLIC Module from CPF 3.0  ...');
  };

  setEvents = () => {
    this.button.on('click', this.clickHandler);
  };

  clickHandler = () => {
    console.log('CPF 3: Public side click!');
    // alert('CPF 3: Public side click!');
  };
}

export default TestPubModule;
