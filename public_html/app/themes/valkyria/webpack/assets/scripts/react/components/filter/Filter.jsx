import React, { useState } from 'react';
import { SelectionButton } from '../selection/SelectionButton';
import { SelectionInput } from '../selection/SelectionInput';

export const Filter = (props) => (
  <>
    <div className='filter'>
      <h4 className='filter__title title title--small'>{props.name}</h4>
      <div className='filter__selections'>
        {
          props.type === 'button'
          && Object.values(props.value)[0].map((item) => (
            <SelectionButton
              state={props.state}
              value={item}
              key={item}
              filter={props.filter}
              change={props.change}
            />
          ))
        }
        {
          props.type === 'input'
          && Object.values(props.value)[0].length === 2
          && (
            <SelectionInput
              change={props.change}
              filter={props.filter}
              value={props.value}
              state={props.state}
              texts={props.texts}
            />
          )
        }
      </div>
    </div>

  </>
);
