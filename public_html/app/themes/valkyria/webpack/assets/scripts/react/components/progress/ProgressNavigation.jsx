import React from "react";

export const ProgressNavigation = (props) => {

	return (
		<div className="progress__header">
			<span className="progress__name">{props.text.question} </span>
			<span className="progress__current">{props.part > props.parts ? props.parts : props.part}</span>
			<span className="progress__separate"> {props.text.question_separate} </span>
			<span className="progress__max">{props.parts}</span>
		</div>
	)
}