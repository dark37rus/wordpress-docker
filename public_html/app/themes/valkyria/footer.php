</main>

<footer class="footer">

    <div class="footer__container container">
        <?php

        /**
         * @hooked footer_site_content() - 10
         */
        do_action('footer_site');
        ?>
    </div>

</footer>
<div id="svg-icons"></div>
<div class="hidden">
    <?= do_shortcode('[contact-form-7 id="163" title="Квиз"]'); ?>
</div>

<?php wp_footer(); ?>
</body>
</html>
