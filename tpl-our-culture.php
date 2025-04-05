<?php
/*
* Template Name: Our Culture Page Template 
*/

get_header();

?>

<div id="homeowners-intro" class="o-panel o-panel--homeowners-intro u-margin-top-230">
    <div class="c-homeowners-intro c-homeowners-intro--our-cultures">
        <div class="grid-container">
            <div class="grid-x grid-padding-x align-middle">
                <div class="cell medium-10">
                    <div class="c-careers-intro__headings">
                        <h4 class="u-sub-title u-sub-title--orange text-left wow wow-visible">OUR CULTURE</h4>
                        <h1 class="c-homeowners-intro__title u-ls-2 wow wow-visible"><?php echo get_field('hero_title'); ?></h1>

                        <p class="wow wow-visible"><?php echo get_field('hero_sub_title'); ?></p>
                    </div>
                </div><!--/ Intro Headings --> 

                <div class="cell medium-14 c-homeowners-intro__image-col c-homeowners-intro__image-col--our-culture">
                    <div class="c-homeowners-intro__image c-homeowners-intro__image--our-culture u-plain-relative">
                        <?php if (get_field('hero_photo')) { ?>
                            <img class="u-plain-absolute u-tweenmax-image-hero" src="<?php echo get_field('hero_photo'); ?>" alt="">
							<img class="u-plain-placeholder" src="<?php echo get_field('hero_photo'); ?>" alt="">
                        <?php }else { ?>
                            <img style="background: #f3f3f3;" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/placeholder-image.png" alt="">
                        <?php } ?>
                    </div>
                </div><!--/ careers Intro Text -->
            </div>
        </div>
    </div>
</div><!-- End Intro Panel -->

<div id="our-cultures-content" class="o-panel o-panel--our-cultures-content">
    <div class="c-our-cultures-content">
        <div class="grid-container">
            <div class="grid-x grid-padding-x">
                <div class="cell medium-24 large-11 c-our-cultures-content__img-col">
                    <div class="c-careers-intro__images c-careers-intro__images--our-cultures">
                        <?php $delay = 0.2; if( have_rows('oc_photos') ): 
                            while( have_rows('oc_photos') ) : the_row(); ?>
                                <div class="c-careers-intro__img" data-delay="<?php echo $delay; ?>">
									<div class="u-plain-relative">
                                    <?php $delay = $delay + 0.1; ?>
                                    <?php if (get_sub_field('oc_photo')) { ?>
                                        <img class="u-plain-absolute u-tweenmax-image" src="<?php echo get_sub_field('oc_photo'); ?>" alt="">
										<img class="u-plain-placeholder" src="<?php echo get_sub_field('oc_photo'); ?>" alt="">
                                    <?php }else { ?>
                                        <img class="u-plain-absolute u-tweenmax-image" style="background: #f3f3f3;" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/placeholder-image.png" alt="">
										<img class="u-plain-placeholder" style="background: #f3f3f3;" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/placeholder-image.png" alt="">
                                    <?php } ?>
									</div>
                                </div>
                            <?php endwhile; 
                        endif; ?>
                    </div>
                </div><!--/ Our Story Text Image -->

                <div class="cell medium-24 large-13">
                    <div class="c-careers-intro__text wow wow-visible">
                        <?php echo get_field('oc_text'); ?>
                    </div><!--/ Our Story Text -->
                </div>
            </div>
        </div>
    </div>
</div><!-- End Our Cultures Content Panel -->

<div id="testimonials-blue" class="o-panel o-panel--testimonials-blue">
    <div class="c-testimonials-blue c-testimonials-blue--our-cultures">
        <?php //include(TEMPLATEPATH.'/inc/testimonials.php'); ?>

        <div class="grid-container">
            <div class="grid-x grid-padding-x align-bottom c-testimonials-blue__grid">
                <div class="cell auto">
                    <div class="c-testimonials-blue__title">
                        <?php if( get_field('wit_show_sub_title') == 'Yes' ) { ?>
                            <h4 class="u-sub-title u-sub-title--orange text-left wow wow-visible"><?php echo get_field('wit_sub_title'); ?></h4>
                        <?php } ?>
                        <h2 class="wow wow-visible"><?php echo get_field('wit_title'); ?></h2>

                        <?php if( get_field('wit_show_text') == 'Yes' ) { ?>
                            <p class="wow wow-visible"><?php echo get_field('wit_text'); ?></p>
                        <?php } ?>
                    </div>
                </div><!--/ Title -->

                <div class="cell shrink">
                    <div class="c-testimonials-blue__arrows">
                        <div class="c-testimonials-blue__arrows-wrap">
                            <button id="testimonial-prev" class="c-testimonials-blue__prev slick-arrow">
                                <img class="c-testimonials-blue__p-gray" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/arrow-gray-left.png" alt="">
                                <img class="c-testimonials-blue__p-blue" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/arrow-blue-left.png" alt="">
                            </button>
                            <button id="testimonial-next" class="c-testimonials-blue__next slick-arrow">
                                <img class="c-testimonials-blue__n-gray" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/arrow-gray.png" alt="">
                                <img class="c-testimonials-blue__n-blue" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/arrow-blue.png" alt="">
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/ Title Area -->

        <div class="c-testimonials-blue__slide-col">
            <div class="c-testimonials-blue__slider">
                <div class="js-testimonials-blue-slider">
                    <?php $delay = 0.2; if( have_rows('testimonial_slider') ): 
                        while( have_rows('testimonial_slider') ) : the_row(); ?>
                            <div class="c-testimonials-blue__item wow wow-visible" data-delay="<?php echo $delay; ?>">
                                <?php $delay = $delay + 0.1; ?>
                                <div class="c-testimonials-blue__item-wrap">
                                    <div class="c-testimonials-blue__img">
                                        <?php if( get_sub_field('testimonial_photo') ) { ?>
                                            <img src="<?php echo get_sub_field('testimonial_photo'); ?>" alt="">
                                        <?php }else{ ?> 
                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/placeholder-image.png" alt="">
                                        <?php } ?>
                                    </div><!--/ Img -->

                                    <div class="c-testimonials-blue__text">
                                        <p><?php echo get_sub_field('testimonial_description'); ?></p>

                                        <div class="c-testimonials-blue__client">
                                            <strong><?php echo get_sub_field('testimonial_author_name'); ?></strong>
                                            <?php echo get_sub_field('author_designation'); ?>
                                        </div>

                                        <span class="c-testimonials-blue__quote">
                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/quote.png" alt="">
                                        </span>
                                    </div>
                                </div>
                            </div><!--/ testimonials-blue Item -->
                        <?php endwhile; 
                    endif; ?>
                </div>
            </div>
        </div>
    </div>
</div><!-- End testimonials-blue Panel -->

<div id="cta-regular" class="o-panel o-panel--cta-regular">
    <div class="grid-container">
        <div class="c-cta-regular c-cta-regular--our-cultures">
            <h1 class="c-cta-regular__title c-cta-regular__title--our-cultures u-ls-2 wow wow-visible"><?php echo get_field('faq_cta_title'); ?></h1>

            <div class="c-cta-regular__buttons c-cta-regular__buttons--our-cultures wow wow-visible">
                <a class="u-button u-button--orange" href="<?php echo get_field('orange_button_link'); ?>">Meet the team</a>
                <a class="u-button u-button--red" href="<?php echo get_field('red_button_link'); ?>">Join IMG!</a>
            </div>
        </div>
    </div>
</div>
    
<?php get_footer(); ?>