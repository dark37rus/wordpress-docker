import React from 'react';
import { render } from 'react-dom';
import loadableVisibility from 'react-loadable-visibility/loadable-components';
import { LoaderComponent } from './components/LoaderComponent';
import getCookie from '../components/getCookie';
import Additions from './Additions';
import Articles from './Articles';

// import './Selections'

const Quiz = loadableVisibility(() => import('./Quiz'), {
  fallback: <LoaderComponent />,
});

const Selections = loadableVisibility(() => import('./Selections'), {
  fallback: <LoaderComponent />,
});

if (document.querySelector('.selections')) {
  render(<Selections />, document.querySelector('.selections'));
}

if (document.querySelector('.quiz') && !getCookie('coupon')) {
  render(<Quiz />, document.querySelector('.quiz'));
}

if (document.querySelector('#additions')) {
  render(<Additions />, document.querySelector('#additions'));
}

if (document.querySelector('#articles')) {
  render(<Articles />, document.querySelector('#articles'));
}
