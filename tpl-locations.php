
<?php
/*
* Template Name: Locations Page Template 
*/

get_header();

?>

<div id="intro" class="o-panel o-panel--intro u-margin-top-230">
	<div class="c-intro c-locations-intro">
        <div class="grid-container">
            <div class="grid-x grid-padding-x align-middle">
                <div class="cell medium-15 large-shrink">
                    <div class="c-intro__headings">
                        <h4 class="u-sub-title u-sub-title--orange text-left c-locations-intro__readcrumb wow wow-visible" data-delay="0.3">
                            <a href="<?php bloginfo('url'); ?>/contact-us/#our-locations"> All Locations</a>
                        </h4>
            			<h2 class="c-intro__title c-locations-intro__title u-ls-2 wow wow-visible" data-delay="0.4"><?php echo get_field( 'loc_intro_title' ); ?></h2>
                        
                        <div class="c-intro__text c-locations-intro__text wow wow-visible" data-delay="0.5">
                            <p><?php echo get_field('loc_intro_sub_title'); ?></p>
                        </div>
                    </div>
                </div><!--/ Intro Headings --> 

                <div class="cell medium-9 large-auto">
                    <div class="c-intro__image c-locations-intro__img wow wow-visible" data-delay="0.6">
                        <img src="<?php echo get_field('loc_intro_image'); ?>" alt="Intro Img">
                    </div>
                </div><!--/ Intro Text -->
            </div>
        </div>
	</div>
</div><!-- End Intro Panel -->

<div id="locations-details" class="o-panel o-panel--locations-details">
    <div class="c-locations-details wow wow-visible">
        <div class="grid-container c-locations-details__container">
            <div class="grid-x grid-padding-x">
                <div class="cell medium-10 large-6">
                    <div class="c-locations-details__text">
                        <?php echo get_field('contact_information'); ?>
                    </div>
                </div>
                <div class="cell medium-14 large-10">
                    <div class="c-locations-details__text c-locations-details__hours">
                        <?php echo get_field('office_hours'); ?>

                        <?php if( get_field('holiday_hours_on_off') == 'On' ) { ?>
                            <h4><?php echo get_field('hh_title'); ?></h4>
                            <p><?php echo get_field('holiday_hours'); ?></p>
                        <?php  } ?>
                    </div>
                </div>
                <div class="cell medium-24 large-8">
                    <div class="c-locations-details__map">
                        <?php echo get_field('location_map'); ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="c-locations-details__buttons wow wow-visible">
            <a class="u-button u-button--red js-down-btn" href="<?php echo get_field('loc_red_button_link'); ?>"><?php echo get_field('loc_red_button_label'); ?></a>
            <a class="u-button u-button--orange js-down-btn" href="<?php echo get_field('loc_orange_button_link'); ?>"><?php echo get_field('loc_orange_button_label'); ?></a>
        </div>
    </div>
</div><!-- End Locations Details Section -->

<div id="locations-services" class="o-panel o-panel--locations-services">
    <div class="c-locations-services">
        <div class="grid-container">
            <div class="c-locations-services__text wow wow-visible">
                <div class="col-span-1">
                    <?php echo get_field('ls_left_text'); ?>
                </div>
                <div class="col-span-2">
                    <?php echo get_field('ls_right_text'); ?>
                </div>
            </div><!--/ Text -->

            <div class="grid-x grid-padding-x c-who-we-serve__grid wow wow-visible">
                <?php if( have_rows('cta_boxes') ): ?>
                    <?php $count = 1; while( have_rows('cta_boxes') ) : the_row(); ?>
                        <div class="cell small-24 medium-12 large-8 c-who-we-serve__col c-locations-services__col">
                        	<a class="c-who-we-serve__box c-locations-services__box" href="<?php echo get_sub_field('ls_cta_more_link'); ?>" style="background-color: <?php echo get_sub_field('ls_cta_box_color'); ?>;">
                                <div class="c-who-we-serve__box-wrap">
                                    <h3 class="c-who-we-serve__title"><?php echo get_sub_field('ls_cta_title'); ?></h3>
                                    <p><?php echo get_sub_field('ls_cta_text'); ?></p>
                                    <button class="c-who-we-serve__more">Learn More </button>
                                </div>
                            </a>
                        </div><!--/ Grid Item -->
                    <?php $count++; endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div><!-- End Locations Services Section -->

<div id="video" class="o-panel o-panel--video">
    <div class="c-video wow wow-visible">
        <div class="grid-container c-video__container">
            <h3 class="c-video__title"><?php echo get_field('video_title'); ?></h3>

            <div class="c-video__embed">
                <?php echo get_field('video_embed'); ?>
            </div>
        </div>
    </div>
</div><!-- End Video Section -->

<div id="photo-gallery" class="o-panel o-panel--photo-gallery">
    <div class="c-photo-gallery wow wow-visible">
        <div class="grid-container">
            <?php echo do_shortcode(get_field('gallery_shortcode')); ?>
        </div>
    </div>
</div><!-- End Photo Gallery Section -->

<div id="img-review" class="o-panel o-panel--img-review">
    <div class="c-img-review wow wow-visible">
        <div class="grid-container">
            <?php echo do_shortcode(get_field('review_shortcode')); ?>
        </div>
    </div>
</div><!-- End Review Section -->

<div id="contact-form" class="o-panel o-panel--contact-form">
    <span class="u-eadge-contact-form--location hide-for-small-only"></span>
    <span class="u-eadge-contact-form u-eadge-contact-form__locatiion show-for-small-only"></span>
    
    <div class="c-contact-form c-location-contact-form">
        <div class="grid-container">
            <div class="grid-x grid-padding-x">
                <div class="cell medium-24 large-10">
                    <div class="c-contact-form__heading">
                        <h1 class="c-contact-form__title u-ls-2 wow wow-visible"><?php echo get_field('form_title'); ?></h1>
                        <p class="wow wow-visible"><?php echo get_field('form_text'); ?></p>
                    </div>
                </div>

                <div class="cell medium-24 large-14 wow wow-visible">
                    <?php echo do_shortcode('[gravityform id="2" title=false description=false ajax=true tabindex="70"]'); ?>
                </div>
            </div>
        </div>
    </div>
</div><!-- End Contact Form Section -->

<?php get_footer(); ?>