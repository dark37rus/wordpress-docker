import React from "react";
import {PaginationItem} from "./PaginationItem";

export const PaginationList = (props) => {
	let maxPagination = 4

	return (
		<div className="pagination__selections">
			{props.value.array &&
			props.value.array.map((item, index) => {
				const page = index+1

					if (page === maxPagination) {
						return (
							<span className="pagination__page pagination__page--separate" key={index}>...</span>
						)
					}

					return (
						<PaginationItem
							index={index}
							state={props.value.state}
							key={index}
							separate={page >= maxPagination && page !== props.value.array.length}
							page={page}
							changePage={props.value.changePage}
						/>
					)

			})

			}
		</div>

	)
}
