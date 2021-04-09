<?php
get_header();

    tpl::render( 'template-parts/sections/main-section' );
    tpl::render( 'template-parts/section-groups/girl-cover-sections' );
    tpl::render( 'template-parts/sections/interior' );
    tpl::render( 'template-parts/sections/advantages' );
    tpl::render( 'template-parts/sections/seo' );
    tpl::render( 'template-parts/sections/contact' );

get_footer();
