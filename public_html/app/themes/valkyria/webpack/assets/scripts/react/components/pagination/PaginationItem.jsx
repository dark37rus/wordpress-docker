import React from 'react';

export const PaginationItem = (props) => (
  !props.separate
  && (
    <span
      className={`pagination__page fade ${props.state === props.index ? 'pagination__page--selected' : ''}`}
      onClick={() => props.changePage(props.index)}
    >
  {props.page}
</span>
  )

);
