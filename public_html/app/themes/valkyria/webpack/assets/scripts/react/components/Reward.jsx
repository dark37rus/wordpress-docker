import React, {useState} from "react";

export const Reward = (props) => {

	const size = props.size
	const parts = props.parts
	const part = props.part - 1

	const currentSize = size/parts*part > size ? size : size/parts*part

	return (
		<div className={`${props.class} reward`}>
			<div className="reward__text">{props.text.discount}</div>
			<div className="reward__percent">{Math.floor(currentSize)}%</div>
		</div>
	)
}