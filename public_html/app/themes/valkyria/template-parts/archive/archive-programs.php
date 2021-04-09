<section class="section">
    <div class="container">
        <?php
        $category = get_post_type() . '-taxonomies';
        $terms = get_terms($category);

        if ($terms) :
            foreach ($terms as $term) :
                if ($term->slug !== 'recommended') :
                    ?>

                    <h2 class="title title--secondary"><?= $term->name ?></h2>

                    <?php
                    $posts = get_posts([
                        'post_type'  => get_post_type(),
                        'order'      => 'ASC',
                        'orderby'    => 'menu_order',
                        'meta_query' => array(
                            'key'     => 'price'
                        ),
                        'tax_query'  => [
                            [
                                'taxonomy' => $category,
                                'field'    => 'slug',
                                'terms'    => $term->slug
                            ]
                        ]
                    ]);

                    if ($posts) :
                        ?>
                        <div class="section__grid grid grid--col-3">
                            <?php
                            foreach ($posts as $post) :
                                setup_postdata($post);
                                get_template_part('components/cards/card', '',
                                    [
                                        'class'       => 'card--horizontal',
                                        'price'       => get_field('program-info')['price'],
                                        'title'       => get_the_title(),
                                        'title_class' => '',
                                        'description' => get_field('program-description'),
                                        'time'        => get_field('program-info')['time'],
                                        'link'        => get_permalink(),
                                        'image'       => get_the_post_thumbnail_url()
                                    ]
                                );
                            endforeach;
                            wp_reset_postdata();
                            ?>
                        </div>
                    <?php
                    endif;
                    ?>

                <?php
                endif;
            endforeach;

        endif;
        ?>
    </div>
</section>
