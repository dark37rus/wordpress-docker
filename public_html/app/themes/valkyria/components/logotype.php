<?php $logo = get_field( 'logo', 'options' )['image']; ?>
<?php if ( $logo ): ?>
    <a href="/" class="<?=$class ?? null?> logotype">
        <div class="logotype__image">
            <?php
            echo file_get_contents( $logo );
            ?>
        </div>
    </a>
<?php endif;?>
