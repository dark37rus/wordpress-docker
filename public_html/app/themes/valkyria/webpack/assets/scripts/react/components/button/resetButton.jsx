import React, { useState } from 'react';

export const ResetButton = (props) => (
      <button
        className={props.className}
        onClick={props.onClick}
      >
        {props.value}
      </button>
);
