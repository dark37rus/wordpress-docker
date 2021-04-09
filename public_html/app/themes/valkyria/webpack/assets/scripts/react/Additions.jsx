import React, {useEffect, useState} from 'react';
import {ItemAdditions} from "./components/items/itemAdditions";
import {Pagination} from "./components/pagination/Pagination";

export default function Additions() {

    const [data, setData] = useState();

    const [countPosts, setCountPosts] = useState();

    const [maxPages, setMaxPages] = useState();

    const [thisPage, setThisPage] = useState({
        currentPage: 0,
        countOnPagePosts: 12,
    });

    function changePage(page) {
        setThisPage({currentPage: page});
    }

    function countPages(posts, postsOnPage){
        setMaxPages(Math.ceil(posts / postsOnPage));
    }

    useEffect(() => {
        fetch('/wp-json/rest/v1/additions/?page_id=' + thisPage.currentPage + '&count=' + thisPage.countOnPagePosts)
            .then((response) => response.json())
            .then(result => {
                setData(result.posts)
                setCountPosts(result.count);
                countPages(result.count.publish, thisPage.countOnPagePosts)
            });
    }, [thisPage]);

    if (data && countPosts && maxPages) {
        console.log(data);
        return (
            <>
                <div className={'archive-additions__items row'}>
                    {

                        data.map((item) => (
                            <ItemAdditions
                                key={item.post.ID}
                                link={item.url}
                                className={'col-12 col-md-6 col-xl-4'}
                                title={item.post.post_title}
                                content={item.post.post_content}
                                thumb={item.thumb}
                                price={item.fields['add_price']['value']}
                                currency={item.fields['add_price']['append']}
                            />
                        ))
                    }
                </div>
                <div className="row">

                </div>
            </>
        )
    } else {
        return false;
    }


}
