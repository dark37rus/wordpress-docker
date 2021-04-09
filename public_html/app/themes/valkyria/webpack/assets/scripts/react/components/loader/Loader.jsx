import React, { useState } from 'react';

export const Loader = (props) => (
  <div className={`${props.class} loader`}>
    <div className='loader__fill' style={{ width: `${props.load}%` }} />
  </div>
);
