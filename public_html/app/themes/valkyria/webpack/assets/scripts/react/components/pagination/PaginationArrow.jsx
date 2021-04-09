import React from "react";

export const PaginationArrow = (props) => {
	const classPrev = 'pagination__arrow--prev navigation-arrow--prev'
	const classNext = 'pagination__arrow--right navigation-arrow--next'

	const currentPage = props.state
	let page = props.state

	let downPage = currentPage - 1 >= 0
	let upPage = currentPage + 2 <= props.array.length

	return (
			<button
				className={`pagination__arrow  navigation-arrow navigation-arrow--secondary ${props.type === 'prev' ? classPrev : classNext}`}
				onClick={() => props.changePage(props.type === 'prev' ? (downPage ? --page : page) : (upPage ? ++page : page))}
				disabled={props.type === 'prev' ? (downPage ? '' : 'disabled') : (upPage ? '' : 'disabled') }
			/>
	)
}
