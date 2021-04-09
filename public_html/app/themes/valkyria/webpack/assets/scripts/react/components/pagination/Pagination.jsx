import React from "react";
import {PaginationList} from "./PaginationList";
import {PaginationArrow} from "./PaginationArrow";

export const Pagination = (props) => {
	if (props.array.length > 1) {
		return (
			<div className="selections__pagination pagination">

				<PaginationArrow
					type={'prev'}
					state={props.state}
					changePage={props.changePage}
					array={props.array}
				/>
				<PaginationList value={props}/>
				<PaginationArrow
					type={'next'}
					state={props.state}
					changePage={props.changePage}
					array={props.array}
				/>

			</div>

		)
	} else {
		return false
	}

}
