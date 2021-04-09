import React from "react";

export const ItemAdditions = (props) => {

    return (
        <div className={'item-additions mb-30 ' + props.className} data-aos={"fade-zoom-in"}>
            <div className={'item-additions__wrapper'}>
                <div className={'item-additions__link'}>
                    <a href={props.link}>
                        <img
                        src={props.thumb}
                        alt={props.title}
                        className={'item-additions__image'}
                        width={'100%'}
                        height={'120px'}/>
                    </a>
                    <a href={props.link}><h2 className={'item-additions__title title'}>{props.title}</h2></a>
                    <div className={'item-additions__desc'}>{props.content}</div>
                    <div className={'item-additions__price'}>{props.price} {props.currency}</div>
                </div>
            </div>
        </div>
    )
}
