import React from "react";

export const ItemArticles = (props) => {

    return (
        <div className={'item-articles mb-30 ' + props.className} data-aos={"fade-zoom-in"}>
            <div className={'item-articles__wrapper'}>
                <div className="item-articles__info">
                    <small className={'item-articles__date'}>
                        {props.post.post_date}
                    </small>
                    <a href={props.link} className={'mv-10'}>
                        <div className={'item-articles__title title'}>
                            {props.title}
                        </div>
                    </a>
                    <div className={'item-articles__content'}>
                        {props.fields['blog_short_desc']['value']}
                    </div>

                    <a href={props.link} className={'button button--secondary'}>Читать статью</a>
                </div>
                <div className="item-articles__image">
                    <a href={props.link}><img src={props.thumb} alt={props.title}/></a>
                </div>
            </div>
        </div>
    )
}
