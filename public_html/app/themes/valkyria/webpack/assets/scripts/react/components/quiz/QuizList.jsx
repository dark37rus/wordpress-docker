import React, { useEffect, useState } from 'react';

export const QuizList = (props) => {

  if (props.answersList) {
    return (

      <div className="quiz__wrapper">
        <ul className="quiz__list list">
          {
            props.answers.map((answer, index) => {
              return (

                <li className="quiz__answer answer" onClick={props.selectAnswer}
                    key={answer.name + props.numberQuest}>
                  <div className="answer__image">
                    <img src={answer.image} alt={answer.name}/>
                  </div>

                  <div className="answer__heading">

                    <div
                      className={`answer__checkbox checkbox ${props.answersList.values[index].isChecked ? 'checkbox--checked' : ''}`}>
                      <span className="checkbox__box"/>
                    </div>
                    <div className="answer__name">{answer.name}</div>
                  </div>


                </li>
              );
            })
          }

        </ul>
      </div>
    );
  } else {
    return false;
  }
};
