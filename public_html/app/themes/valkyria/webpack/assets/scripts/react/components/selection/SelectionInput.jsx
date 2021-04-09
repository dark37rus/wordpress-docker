import React from 'react';

export const SelectionInput = (props) => {
  let minValue = props.state[0];
  const maxValue = props.state[1];

  const minBaseValue = Object.values(props.value)[0][0];
  const maxBaseValue = Object.values(props.value)[0][1];

  return (
    <>
      <input
        type='number'
        className='input selection selection--input'
        onChange={() => props.change(
          props.filter,
          [minValue = +event.target.value > maxBaseValue ? maxBaseValue : (+event.target.value !== 0 ? +event.target.value : ''), maxValue],
        )}
        value={minValue}
        min={minBaseValue}
        maxLength='3'
        max={maxBaseValue}
        placeholder={`${props.texts.input.from}:`}
      />

      <input
        type='number'
        value={maxValue}

        onChange={() => props.change(
          props.filter,
          [minValue, +event.target.value > maxBaseValue ? maxBaseValue : (+event.target.value !== 0 ? +event.target.value : '')],
        )}
        maxLength='3'
        min={minBaseValue}
        max={maxBaseValue}
        className='input selection selection--input'
        placeholder={`${props.texts.input.to}:`}
      />
    </>
  );
};
