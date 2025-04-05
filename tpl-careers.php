<?php
/*
* Template Name: Careers Page Template 
*/

get_header();

?>

<div id="careers-intro" class="o-panel o-panel--careers-intro u-margin-top-230">
    <div class="c-careers-intro">
        <div class="grid-container">
            <div class="grid-x grid-padding-x">
                <div class="cell medium-15">
                    <div class="c-careers-intro__headings">
                        <?php if( get_field('hero_show_back_link') == 'Yes' ) { ?>
                            <h4 class="u-sub-title u-sub-title--orange text-left wow wow-visible" data-delay="0.9">
                                <a href="<?php echo get_field('hero_back_link'); ?>"><i class="fas fa-angle-left"></i> JOIN OUR FAMILY</a>
                            </h4>
                        <?php }else { ?>
                            <h4 class="u-sub-title u-sub-title--orange text-left wow wow-visible" data-delay="0.9">JOIN OUR FAMILY</h4>
                        <?php } ?>
                        <h1 class="c-careers-intro__title u-ls-2 wow wow-visible" data-delay="0.9"><?php echo get_field('hero_title'); ?></h1>

                        <p class="wow wow-visible" data-delay="0.9"><?php echo get_field('hero_sub_title'); ?></p>
                    </div>
                </div><!--/ Intro Headings --> 

                <div class="cell medium-9">
                    <div class="c-careers-intro__images">
                        <?php $delay = 0.2; if( have_rows('hero_photos') ):
                            while( have_rows('hero_photos') ) : the_row(); ?>
                                <div class="c-careers-intro__img" data-delay="<?php echo $delay; ?>">
									<div class="u-plain-relative">
	                                    <?php $delay = $delay + 0.1; ?>
	                                    <img class="u-plain-absolute u-tweenmax-image-hero" src="<?php echo get_sub_field('hero_g_photo'); ?>" alt="">
										<img class="u-plain-placeholder" src="<?php echo get_sub_field('hero_g_photo'); ?>" alt="">
									</div>
                                </div>
                            <?php endwhile;
                        endif; ?>
                    </div>
                </div><!--/ careers Intro Text -->

                <div class="cell">
                    <div class="c-open-position">
                        <h3 class="c-open-position__title"><?php echo get_field('position_title'); ?></h3>

                        <?php $delay = 0.2; if( have_rows('open_positions') ) : ?>
                            <ul>
                                <?php while( have_rows('open_positions') ) : the_row(); ?> 
                                    <li class="wow wow-visible" data-delay="<?php echo $delay; ?>">
                                        <span>
                                            <?php if(get_sub_field('position_small_title')){ ?>
                                                <div class="c-open-position__samll-title"><?php echo get_sub_field('position_small_title'); ?></div>
                                            <?php } ?>
                                            <?php echo get_sub_field('position'); ?>
                                        </span>
                                        <a class="u-button" href="<?php echo get_sub_field('position_button_link'); ?>" target="_blank"><?php echo get_sub_field('position_button_label'); ?></a>
                                    </li>
                                    <?php $delay = $delay + 0.1; ?>
                                <?php endwhile; ?>
                            </ul>
                        <?php endif; ?>

                        <div class="c-careers-intro__buttons text-center wow wow-visible" data-delay="0.9">
                            <a class="u-button u-button--blue" href="<?php echo get_field('hero_button_link'); ?>" target="_blank"><?php echo get_field('hero_button_label'); ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <span class="u-eadge--btm-white"></span>
    </div>
</div><!-- End Intro Panel -->

<div id="about-service" class="o-panel o-panel--about-service">
    <div class="c-about-service">
        <div class="grid-container">
            <div class="c-about-service__text">
                <h1 class="c-about-service__title u-ls-2 wow wow-visible"><?php echo get_field('is_title'); ?></h1>
                <div class="wow wow-visible">
                    <?php echo get_field('is_text'); ?>
                </div>
            </div>

            <div class="c-about-service__image-box">
                <img class="c-about-service__dots wow wow-visible" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/img-dots.png" alt="">
                <div class="c-about-service__image u-eadge-bottom-left u-fatty-image-trigger--careers wow wow-visible">
                    <img class="u-fatty-image u-fatty-image--careers u-tweenmax-image" src="<?php echo get_field('is_photo'); ?>" alt="">
					<img class="u-fatty-image-placeholder" src="<?php echo get_field('is_photo'); ?>" alt="">
                </div>
            </div>
        </div>
    </div>
</div><!-- End About Panel -->

<div id="what-we-offer" class="o-panel o-panel--what-we-offer">
    <div class="c-what-we-offer">
        <div class="grid-container">
            <div class="grid-x grid-padding-x">
                <div class="cell medium-24 large-10">
                    <div class="c-what-we-offer__text">
                        <h1 class="c-what-we-offer__title u-ls-2 wow wow-visible"><?php echo get_field('wwo_title'); ?></h1>
                        <div class="wow wow-visible">
                            <?php echo get_field('wwo_text'); ?>
                        </div>
                    </div>
                </div>

                <div class="cell medium-24 large-14">
                    <div class="c-what-we-offer__items">
                        <div class="c-what-we-offer__icons">
                            <?php $delay = 0.2; if( have_rows('wwo_offers') ):
                                while( have_rows('wwo_offers') ) : the_row(); ?>
                                    <div class="c-what-we-offer__item wow wow-visible" data-delay="<?php echo $delay; ?>">
                                    <?php $delay = $delay + 0.1; ?>
                                        <div class="c-what-we-offer__icon">
                                            <img src="<?php echo get_sub_field('wwo_icon'); ?>" alt="">
                                        </div>
                                        <p><?php echo get_sub_field('wwo_text'); ?></p>
                                    </div><!--/ Icon Item -->
                                <?php endwhile;
                            endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- End What Ee Offer Panel -->

<div id="our-story" class="o-panel o-panel--our-story">
    <div class="c-our-story">
        <div class="grid-container">
            <div class="grid-x grid-padding-x">
                <div class="cell medium-12">
                    <div class="c-our-story__image-box">
                        <h1 class="c-our-story__title wow wow-visible"><?php echo get_field('oc_title'); ?></h1>
                        <div class="wow wow-visible">
                            <?php echo get_field('left_col_text'); ?>
                        </div>

                        <div class="c-our-story__img c-our-story__img--careers u-plain-relative">
                            <img class="u-plain-absolute u-tweenmax-image" src="<?php echo get_field('oc_photo'); ?>" alt="">
							<img class="u-plain-placeholder" src="<?php echo get_field('oc_photo'); ?>" alt="">
                        </div>
                    </div>
                </div><!--/ Our Story Text Image -->

                <div class="cell medium-12">
                    <div class="wow wow-visible">
                        <?php echo get_field('right_col_text'); ?>
                    </div>

                    <div class="c-our-story__buttons wow wow-visible">
                        <a class="u-button u-button--red c-our-story__button" href="<?php echo get_field('oc_red_button_link'); ?>"><?php echo get_field('oc_red_button_label'); ?></a>
                        <a class="u-button c-our-story__button" href="<?php echo get_field('oc_orange_button_link'); ?>" target="_blank"><?php echo get_field('oc_orange_button_label'); ?></a>
                    </div>
                </div><!--/ Our Story Text -->
            </div>
        </div>
    </div>
</div><!-- End Our Story Panel -->

<div id="testimonials-blue" class="o-panel o-panel--testimonials-blue">
    <div class="c-testimonials-blue">
        <?php //include(TEMPLATEPATH.'/inc/testimonials.php'); ?>

        <div class="grid-container fluid">
            <div class="grid-x grid-padding-x">
                <div class="cell medium-24 large-11 c-testimonials-blue__title-col">
                    <div class="c-testimonials-blue__title">
                        <?php if( get_field('wit_show_sub_title') == 'Yes' ) { ?>
                            <h4 class="u-sub-title u-sub-title--orange text-left wow wow-visible"><?php echo get_field('wit_sub_title'); ?></h4>
                        <?php } ?>
                        <h2 class="wow wow-visible"><?php echo get_field('wit_title'); ?></h2>

                        <?php if( get_field('wit_show_text') == 'Yes' ) { ?>
                            <p class="wow wow-visible"><?php echo get_field('wit_text'); ?></p>
                        <?php } ?>

                        <div class="c-testimonials-blue__arrows wow wow-visible">
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
                        </div><!--/ Arrows -->
                    </div>
                </div><!--/ Title -->

                <div class="cell medium-24 large-13 c-testimonials-blue__slide-col">
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
        </div>
    </div>
</div><!-- End testimonials-blue Panel -->

<div id="cta-regular" class="o-panel o-panel--cta-regular">
    <div class="grid-container">
        <div class="c-cta-regular c-cta-regular--careers text-center">
            <h1 class="c-cta-regular__title c-cta-regular__title--careers u-ls-2 wow wow-visible"><?php echo get_field('faq_cta_title'); ?></h1>
			<div class="wow wow-visible">
	            <a class="u-button u-button--orange u-button--careers" href="<?php echo get_field('faq_cta_button_link'); ?>" target="_blank"><?php echo get_field('faq_cta_button_label'); ?></a>
			</div>
        </div>
    </div>
</div>
    
<?php get_footer(); ?>