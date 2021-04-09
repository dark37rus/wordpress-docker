<?php

add_action('footer_site', 'footer_site_content', 10);
function footer_site_content(){
    tpl::render( 'components/logotype', [ 'class' => 'footer__logotype' ] );
    tpl::render( 'components/navigation', [ 'class' => 'footer__navigation' ] );
    tpl::render( 'blocks/socials', [ 'class' => 'footer__socials' ] );
    tpl::render( 'components/link', [ 'class' => 'footer__link', 'text' => __('[:ru]Политика конфиденциальности[:en]Privacy policy[:]') ] );
}
