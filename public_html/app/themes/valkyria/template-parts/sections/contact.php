<section class="section contact pv-50">
    <div class="contact__container container">
        <div class="row">
            <div class="contact__board col-12 col-md-6 col-lg-4">
                <div class="contact__content">
                    <h2 class="contact__title title title--primary"><?= GlobalVars::$contacts_caption ?></h2>

                    <div class="contact__phone" style="
                     display: flex;
                     align-items: center;
                     font-size: 2em;" data-aos="fade-right">
                        <span class="icon-whatsapp icon_size_medium box_whatsapp mr-15"></span>
                        <a href="<?=GlobalVars::$link_whatsapp?>" class="contact__phone-link"><?=phone_format(GlobalVars::$whatsapp)?></a>
                    </div>

                    <div class="contact__description mb-30">
                        <span class="icon-map icon_size_large mr-5" style="color: #FF6F1E;"></span>
                        <?= get_field('city_info', 'options'); ?>
                    </div>

                    <div class="contact__work-time">
                        <?=get_field('work_time', 'options')?>
                    </div>
                </div>
            </div>
            <div class="contact__map map col-12 col-md-6 col-lg-8" id="map"
                 data-map-coordinat-weight="<?= get_field('map', 'options')['map_weight']; ?>"
                 data-map-coordinat-Longitude="<?= get_field('map', 'options')['map_Longitude']; ?>"
                 data-address="<?= get_field('map', 'options')['map_address']; ?>"></div>
        </div>
    </div>
</section>
