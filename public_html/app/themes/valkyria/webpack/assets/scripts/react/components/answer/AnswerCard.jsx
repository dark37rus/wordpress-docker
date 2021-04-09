import React, { useState } from 'react';

export const AnswerCard = (props) => (
  <li className='quiz__asnwer answer answer--card' onClick={selectAnswer}
      key={answer.name + quest.numberQuest}>
    <div className='answer__image'>
      <img src={answer.image} alt={answer.name}/>
    </div>

    <div className='answer__heading'>

      <div className='answer__checkbox checkbox'>
        <span className='checkbox__box'/>
      </div>
      <div className='answer__name'>{answer.name}</div>
    </div>
  </li>
);
