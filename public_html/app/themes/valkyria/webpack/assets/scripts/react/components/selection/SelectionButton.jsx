import React, {useState} from "react";

export const SelectionButton = (props) => {
	return (
		<button
			className={`selection selection--button button ${props.state === props.value ? 'selection--button-active' : ''}`}
			onClick={() => props.change(props.filter, (props.state === props.value ? null : props.value))}
		>{props.value}</button>
	)
}