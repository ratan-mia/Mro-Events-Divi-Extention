// External Dependencies
import React, { Component } from 'react';

// Internal Dependencies
import './style.css';

class MroEvents extends Component {
  // The Unique Module Slug 
  static slug = 'myex_custom_module';

  render() {
    const title = this.props.title;
    const content = this.props.content(); // For tiny_mce field type we have to use content() method

    return (
      <div>
        <h1>{title}</h1>
        <p>{content}</p>
      </div>
    );
  }
}

export default MroEvents;