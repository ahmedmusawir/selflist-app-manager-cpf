import React, { Component } from 'react';

class ReactAdminApp extends React.Component {
  handleClick(e) {
    console.log('Running React WP Admin App');
    // alert('Running React WP Admin App');
  }

  render() {
    return (
      <div className="app-content container">
        <h1 className="jumbotron">React WP Admin App Works!</h1>
        <article>
          <h3>Bootstrap 4 Added - Updated 16 Aug 2021</h3>
          <p>
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cupiditate
            eos fugiat vel necessitatibus dolores molestiae quas, praesentium
            similique, est minima consequatur sit aspernatur nostrum nulla et
            maxime maiores distinctio possimus!
          </p>
          <button className="btn btn-danger" onClick={this.handleClick}>
            Click Works!
          </button>
        </article>
      </div>
    );
  }
}

export default ReactAdminApp;
// ReactDOM.render(<ReactAppOne />, document.getElementById('app1'));
