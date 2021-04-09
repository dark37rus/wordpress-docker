import React, { useState } from 'react';

export const QuizContent = (props) => {

  return (
    <div className="quiz__content">
      <div className="quiz__question">Какой образ девушки вы хотели бы видеть?</div>

        <ul className="quiz__list list">
          <li className="quiz__quest quest">
            <div className="quest__image">
              <img src="" alt=""/>
            </div>

            <div className="quest__checkbox checkbox">
              <span className="checkbox__box"/>
            </div>
          </li>
        </ul>
    </div>
  );
};
