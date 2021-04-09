import React, { useEffect, useState } from 'react';
import { useStateGroup } from 'react-use-state-group';
import { Pagination } from './components/pagination/Pagination';
import { Card } from './components/card/Card';
import { Filters } from './components/filters/Filters';
import { ResetButton } from './components/button/resetButton';

export default function Selections() {
  // Объявляем новую переменную состояния "data"
  const [data, setData] = useState();

  const [statusFilters, setStatusFilters] = useState(0);

  // Объявляем новую переменную состояния "texts"
  const [texts, setTexts] = useState();

  // Объявляем новую переменную состояния "filters"
  const [filters, setFilter] = useStateGroup({
    bust: '',
    age: '',
    growth: ['', ''],
    weight: ['', ''],
  });

  // Объявляем новую переменную состояния "thisPage"
  const [thisPage, setThisPage] = useState({
    currentPage: 0,
  });

  useEffect(() => {
    fetch('/wp-json/rest/v1/girls')
      .then((response) => response.json())
      .then((girls) => {
        setData(girls.girls);
        setTexts(girls.texts);
      });
  }, []);

  function changePage(page) {
    setThisPage({ currentPage: page });
  }

  function getDataFilterElements(cardsData) {
    const filterArray = [];

    cardsData.map((card, index, array) => {
      if (
        (filters.bust ? filters.bust === +Object.values(card.bust)[0] : true)
        && (!(filters.growth[0] !== '' && filters.growth[0] > +Object.values(card.growth)))
        && (!(filters.growth[1] !== '' && filters.growth[1] < +Object.values(card.growth)))
        && (!(filters.weight[0] !== '' && filters.weight[0] > +Object.values(card.weight)))
        && (!(filters.weight[1] !== '' && filters.weight[1] < +Object.values(card.weight)))
      ) {
        filterArray.push(card);
      }
    });

    return filterArray;
  }

  function chunkArray(listItems, limitElements) {
    const results = [];
    while (listItems.length) {
      results.push(listItems.splice(0, limitElements));
    }
    return results;
  }

  function changeFilter(name, values) {
    if (Array.isArray(values) && values.length > 1) {
      const minValue = values[0];
      let maxValue = values[1];

      if (maxValue < minValue && maxValue !== '') {
        maxValue = minValue;
        setFilter[name]([minValue, maxValue]);
      } else {
        setFilter[name]([minValue, maxValue]);
      }
      setThisPage({
        currentPage: 0,
      });
    } else {
      setFilter[name](values);
      setThisPage({
        currentPage: 0,
      });
    }
  }

  function clearFilter() {
    for (const key in setFilter) {
      if (key === 'bust') {
        setFilter[key]('');
      } else {
        setFilter[key](['', '']);
      }
    }
  }

  if (data && texts) {
    const result = chunkArray(getDataFilterElements(data), 12);
    const listElements = result[thisPage.currentPage];

    return (
      <div className='selections__container container'>
        <div className='selections__column'>
          <Filters
            texts={texts}
            change={changeFilter}
            filters={
              [
                {
                  type: 'button',
                  value: { bust: [1, 2, 3] },
                  name: Object.keys(data[0].bust),
                  state: filters.bust,
                  filter: 'bust',
                },
                {
                  type: 'input',
                  value: { growth: [120, 190] },
                  name: Object.keys(data[0].growth),
                  state: filters.growth,
                  filter: 'growth',
                },
                {
                  type: 'input',
                  value: { weight: [40, 60] },
                  state: filters.weight,
                  name: Object.keys(data[0].weight),
                  filter: 'weight',
                },
              ]
            }
          />
          <ResetButton
            className='button button--secondary button-group__item button--section-color link'
            onClick={() => clearFilter()}
            value='Очистить фильтр'
          />

        </div>

        <div className='selections__column'>
          <div className='selections__content'>
            {
              listElements
              && listElements.map((card) => (
                <Card
                  key={card.title}
                  title={card.title}
                  params={[card.growth, card.weight, card.bust]}
                  image={card.image}
                  class='card--vertical card--with-background p-15 fade'
                  age={card.age}
                  link={card.url}
                />
              ))
            }
          </div>
          <Pagination changePage={changePage} array={result} state={thisPage.currentPage} />
        </div>

      </div>
    );
  }
  return false;
}
