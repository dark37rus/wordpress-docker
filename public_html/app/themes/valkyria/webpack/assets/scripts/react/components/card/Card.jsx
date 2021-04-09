import React, { useState } from 'react';

export const Card = (props) => (
  <>
    <a href={props.link} className={`card link ${props.class}`}>
      <div className='card__image'>
        <img
          src={props.image}
          alt={props.name}
        />
      </div>

      <h3 className='card__title title'>{`${props.title} ${props.age ? `, ${props.age}` : ''}`}</h3>

      <ul className='params list'>
        {
          props.params
          && props.params.map((param) => (
            <li className='params__item' key={Object.values(param)}>
              <div className='params__name'>{Object.values(param)}</div>
              <div className='params__subname'>{Object.keys(param)}</div>
            </li>
          ))
        }
      </ul>

    </a>
  </>
);
