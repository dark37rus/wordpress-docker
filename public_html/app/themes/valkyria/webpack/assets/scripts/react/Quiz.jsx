import React, { useEffect, useState } from 'react';
import { useStateGroup } from 'react-use-state-group/dist';
import { render } from 'react-dom';
import { Progress } from './components/progress/Progress';
import { QuizList } from './components/quiz/QuizList';
import { Reward } from './components/Reward';
import copyText from '../components/copyText';

export default function Quiz() {
  const [data, setData] = useState();

  const [texts, setTexts] = useState();

  const [quest, setQuest] = useState({
    numberQuest: 0,

  });

  const [errors, setErrors] = useStateGroup({
    empty: {
      error: false,
    },
  });

  function setError(error) {
    setErrors[error]({
      error: true,
    });

    setTimeout(() => {
      setErrors.empty({
        error: false,
      });
    }, 15000);
  }

  const [answersList, setAnswersList] = useState();

  const [answerOutput, setAnswerOutput] = useState([]);

  useEffect(() => {
    fetch('/wp-json/rest/v1/quiz')
      .then((response) => response.json())
      .then((data) => {
        setData(data.quiz);
        setTexts(data.texts);
        updateAnswersList(data.quiz);
      });
  }, []);

  function updateAnswersList(data) {
    setAnswersList({
      values: data.quests[quest.numberQuest] ? data.quests[quest.numberQuest].answers.map((answer) => ({
        value: answer.name,
        isChecked: false,
      })) : [],
    });

    setErrors.empty({
      error: false,
    });
  }

  function changeQuest() {
    if (answersList.values.find((item) => item.isChecked)) {
      setQuest({
        numberQuest: ++quest.numberQuest,
      });
      updateAnswersList(data);
      const answerBundle = [];
      answersList.values.map((answ) => {
        if (answ.isChecked) {
          answerBundle.push(answ.isChecked);
        }
      });

      answerOutput.push(
        {
          quest: data.quests[--quest.numberQuest].quest,
          answers: answerBundle,
        },
      );
    } else {
      setError('empty');
    }
    console.log(answersList);
  }

  function selectAnswer(event) {
    const answers = answersList.values;

    answers.forEach((answer) => {
      if (answer.value === event.currentTarget.querySelector('.answer__name').innerHTML) {
        if (answer.isChecked !== false) {
          answer.isChecked = false;
        } else {
          answer.isChecked = event.currentTarget.querySelector('.answer__name').innerHTML;
        }
      }
    });

    setAnswersList({ values: answers });
  }

  function setCookie() {
    document.cookie = `coupon=${data.coupon}; path=/`;
  }

  async function sendResult(results) {
    const resultsList = results.map((item, index) => (`\n Вопрос ${++index}: ${item.quest} \n Ответы:  ${item.answers}`));
    const formInput = document.querySelector('#quiz-answers');
    const sendButton = document.querySelector('#quiz-send');

    formInput.value = await resultsList;
    await sendButton.click();
    // formInput.parentNode.submit()
  }

  if (data && texts) {
    const currentQuest = data.quests[quest.numberQuest];

    const currentNumberPage = quest.numberQuest + 1;
    const numberOfQuestions = data.quests.length;
    if (!data.quests[quest.numberQuest]) {
      sendResult(answerOutput);
      setCookie();
    }
    return (
      <div className='quiz__container container fade'>
        <h2 className='quiz__title title title--secondary'>{data.title}</h2>

        <Progress
          class='quiz__progress'
          parts={numberOfQuestions}
          part={currentNumberPage}
          text={texts}
        />

        <div className='quiz__content'>
          {!!data.quests[quest.numberQuest]

          && (
            <>
              <div className='quiz__question'>{currentQuest.quest}</div>

              <QuizList
                selectAnswer={selectAnswer}
                answersList={answersList}
                answers={currentQuest.answers}
                numberQuest={quest.numberQuest}
              />
            </>
          )}
          {
            !data.quests[quest.numberQuest]
            && (
              <>
                <h4 className='quiz__accent title'>{texts.last.title}</h4>
                <p className='quiz__text'>
                  {texts.last.discount}
                  {' '}
                  {data.stock}
                  %
                </p>
                <p className='quiz__text'>{texts.last.descr}</p>

                <div className='coupon'>
                  <input
                    type='text'
                    className='coupon__output input'
                    defaultValue={data.coupon}
                    onClick={() => copyText('.coupon__output')}
                    readOnly='readonly'
                  />

                  <button
                    className='button button--transparent button--with-icon'
                    onClick={() => copyText('.coupon__output')}
                  >
                    <span className='button__icon icon icon--copy' />
                    {texts.copy}
                  </button>
                </div>

              </>
            )
          }
        </div>

        <div className='quiz__footer'>
          {!!data.quests[quest.numberQuest]
          && (
            <button
              className='quiz__button button button--primary button--next'
              onClick={changeQuest}
            >
              {texts.button_next}
            </button>
          )}
          {!data.quests[quest.numberQuest]
          && (
            <button
              className='quiz__button button button--primary button--next'
              onClick={() => document.querySelector('.quiz')
                .remove()}
            >
              {texts.button_end}
            </button>
          )}

          <Reward
            class='quiz__reward'
            parts={numberOfQuestions}
            part={currentNumberPage}
            size={data.stock}
            text={texts}
          />

          {
            errors.empty.error
            && <div className='quiz__error error fade'>{texts.error.empty}</div>
          }
        </div>
      </div>
    );
  }
  return false;
}
