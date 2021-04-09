import React, { useState } from 'react';
import { Filter } from '../filter/Filter';
import { ResetButton } from '../button/resetButton';

export const Filters = (props) => (
  <>
    <div className='selections__filters filters'>
      <h3 className='filters__title title'>{props.texts.title}</h3>

      <div className='filters__group'>

        {
            props.filters
            && props.filters.map((filter) => (
              <Filter
                texts={props.texts}
                change={props.change}
                type={filter.type}
                value={filter.value}
                name={filter.name}
                key={filter.name}
                filter={filter.filter}
                state={filter.state}
              />
            ))
          }
      </div>

    </div>
  </>
);
