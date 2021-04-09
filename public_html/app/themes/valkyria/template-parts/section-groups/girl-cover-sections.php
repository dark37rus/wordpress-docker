<?php
$categories = get_terms('main-taxonomies');
if ($categories) :
    foreach ($categories as $category) :
        if (get_field('show_in_page', 'term_' . $category->term_id)[0] === 'home') :
            tpl::render('template-parts/sections/girl-cover', [
                'category'      => $category,
                'category_id'   => $category->term_id,
                'category_name' => $category->slug
            ]);
        endif;
    endforeach;
endif;
