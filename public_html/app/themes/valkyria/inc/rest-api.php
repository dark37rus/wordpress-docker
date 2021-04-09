<?php

add_filter('amp_enable_ssr', '__return_true');

add_action(
    'rest_api_init', function () {

    register_rest_route(
        'rest/v1', '/girls', [
        'methods'             => 'GET',
        'callback'            => 'get_girls',
        'permission_callback' => '__return_true'
    ]);
});
function get_girls(WP_REST_Request $request)
{
    $girls = get_posts(
        [
            'post_type'   => 'girls',
            'numberposts' => '-1',
        ]
    );

    $girls = array_map(
        function ($post) {
            $post_data['id']    = $post->ID;
            $post_data['title'] = esc_html($post->post_title);
            $post_data['url']   = get_permalink($post->ID);
            $post_data['image'] = get_the_post_thumbnail_url($post->ID);


            $group_params = get_field('params_girl', $post->ID);

            $post_data['age']    = $group_params['age'] ?? null;
            $post_data['growth'] = [ __('[:ru]Рост[:en]Growth[:]') => $group_params['growth'] ] ?? null;
            $post_data['weight'] = [ __('[:ru]Вес[:en]Weight[:]') => $group_params['weight'] ] ?? null;
            $post_data['bust']   = [ __('[:ru]Грудь[:en]Bust[:]') => $group_params['bust'] ] ?? null;
            $post_data['descr']  = $group_params['descr'] ?? null;

            return $post_data;
        }, $girls
    );

    $text = [
        'button_find' => __('[:ru]Подобрать девушку[:en]Pick up a girl[:]'),
        'title'       => __('[:ru]Подберите мастера[:en]Pick a master[:]'),
        'input'       => [
            'from' => __('[:ru]от[:en]from[:]'),
            'to'   => __('[:ru]до[:en]to[:]'),
        ]

    ];

    return [
        'girls' => $girls,
        'texts' => $text
    ];

}

function getAdditions(WP_REST_Request $request)
{
    $posts = Site::getPosts(
        'additions',
        [
            'thumb_size'     => 'large',
            'posts_per_page' => $request->get_param('count'),
            'paged'          => $request->get_param('page_id')
        ]
    );

    $count = wp_count_posts('additions');

    return ['posts' => $posts, 'count' =>  $count];
}
add_action(
    'rest_api_init', function () {

    register_rest_route(
        'rest/v1', '/additions/', [
        'methods'             => 'GET',
        'callback'            => 'getAdditions',
        'permission_callback' => '__return_true',
        'args'                => [
            'page_id' => [
                'type'    => 'integer',
                'default' => 1,
            ],
            'count' => [
                'type'    => 'integer',
                'default' => 12,
            ],
        ],
    ]);
});

function getArticles(WP_REST_Request $request)
{
    $posts = Site::getPosts(
        'articles',
        [
            'thumb_size'     => 'large',
            'posts_per_page' => $request->get_param('count'),
            'paged'          => $request->get_param('page_id')
        ]
    );

    $count = wp_count_posts('articles');

    return ['posts' => $posts, 'count' =>  $count];
}
add_action(
    'rest_api_init', function () {

    register_rest_route(
        'rest/v1', '/articles/', [
        'methods'             => 'GET',
        'callback'            => 'getArticles',
        'permission_callback' => '__return_true',
        'args'                => [
            'page_id' => [
                'type'    => 'integer',
                'default' => 1,
            ],
            'count' => [
                'type'    => 'integer',
                'default' => 12,
            ],
        ],
    ]);
});


function get_quiz(WP_REST_Request $request)
{

    $quiz = get_field('quiz', 'options');

    $text = [
        'button_next'       => __('[:ru]Дальше[:en]Next[:]'),
        'discount'          => __('[:ru]Ваша скидка[:en]Your discount[:]'),
        'error'             => [
            'empty' => __('[:ru]Выберите хотя бы 1 ответ[:en]Choose at least 1 answer[:]')
        ],
        'question'          => __('[:ru]Вопрос[:en]Question[:]'),
        'last'              => [
            'title'    => __('[:ru]Спасибо за пройденный опрос![:en]Thank you for taking the survey![:]'),
            'discount' => __('[:ru]Ваша скидка составляет[:en]Your discount is[:]'),
            'descr'    => __('[:ru]Скопируйте этот промокод и вставьте в форму записи[:en]Copy this promo code and paste it into the registration form[:]'),
        ],
        'copy'              => __('[:ru]Скопировать[:en]Copy[:]'),
        'button_end'        => __('[:ru]Завершить[:en]To complete[:]'),
        'question_separate' => __('[:ru]из[:en]of[:]'),

    ];

    return [
        'quiz'  => $quiz,
        'texts' => $text
    ];

}
add_action(
    'rest_api_init', function () {

    register_rest_route(
        'rest/v1', '/quiz', [
                     'methods'             => 'GET',
                     'callback'            => 'get_quiz',
                     'permission_callback' => '__return_true'
                 ]
    );

}
);
