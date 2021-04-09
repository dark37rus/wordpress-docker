import React, {useEffect, useState} from 'react';
import {ItemArticles} from "./components/items/itemArticles";

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
        fetch('/wp-json/rest/v1/articles/?page_id=' + thisPage.currentPage + '&count=' + thisPage.countOnPagePosts)
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
                <div className={'archive-articles__items row'}>
                    {

                        data.map((item) => (
                            <ItemArticles
                                key={item.post.ID}
                                post={item.post}
                                link={item.url}
                                className={'col-12'}
                                title={item.post.post_title}
                                content={item.post.post_content}
                                thumb={item.thumb}
                                fields={item.fields}
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
