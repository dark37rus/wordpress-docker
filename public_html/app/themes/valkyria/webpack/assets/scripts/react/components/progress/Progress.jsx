import React, {useState} from "react";
import {Loader} from "../loader/Loader";
import {ProgressNavigation} from "./ProgressNavigation";

export const Progress = (props) => {

	const parts = props.parts

	const partSize = 100/parts

	let part = props.part

	let load = --part * partSize > 100 ? 100 : part * partSize

	return (
		<div className={`${props.class} progress`}>

			<ProgressNavigation part={++part} parts={parts} text={props.text}/>

			<Loader class={'progress__load'} load={load} />

		</div>
	)
}