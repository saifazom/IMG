
<?php
/*
* Template Name: About Page Template 
*/

get_header();

?>

<div id="about-us" class="o-panel o-panel--about-us u-margin-top-230">
	<div class="c-about-us">
        <div class="grid-container">
            <div class="c-about-us__text">
                <h4 class="u-sub-title wow wow-visible" data-delay="0.9"><?php echo get_field('about_sub_title'); ?></h4>
    			<h1 class="c-about-us__title u-ls-2 wow wow-visible" data-delay="0.9"><?php echo get_field('about_title'); ?></h1>

                <p class="c-about-us__sub-title wow wow-visible" data-delay="0.9"><?php echo get_field('about_text'); ?></p>
            </div><!--/ About Text -->

            <div class="c-about-us__img-box">
                <img class="c-about-us__dots wow wow-visible" data-delay="0.9" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/img-dots.png" alt="">

                <div class="c-about-us__img u-plain-relative">
                    <img class="u-plain-absolute u-tweenmax-image" src="<?php echo get_field('about_photo'); ?>" alt="">
					<img class="u-plain-placeholder" src="<?php echo get_field('about_photo'); ?>" alt="">
                </div>
            </div><!--/ About Image -->

            <div class="c-about-us__text">
                <h1 class="c-about-us__title u-ls-2 wow wow-visible" data-delay="0.9"><?php echo get_field('slogan_title'); ?></h1>
                <p class="c-about-us__sub-title wow wow-visible" data-delay="0.9"><?php echo get_field('about_slogan_text'); ?></p>
            </div><!--/ About Slogan -->
				
			<?php if( get_field('show_blue_hide_banner') == 'Show' ): ?>
				<!-- About us Banner -->
				<div class="c-about-us__banner">
					<?php if( get_field('about_blue_banner_image') ): ?>
					<div class="c-about-us__banner-logo-wrap">
						<img class="c-about-us__banner-logo  wow wow-visible" data-delay="0.9" src="<?php echo get_field('about_blue_banner_image') ?>" alt="" />
					</div>
					<?php endif; ?>
					
					<div class="c-about-us__banner-text">
						<p  class="wow wow-visible" data-delay="0.9"><?php echo get_field('about_blue_banner_text'); ?></p>
					</div>
				</div>
			<?php endif; ?>
        </div>
	</div>
</div><!-- End About Us Panel -->

<div id="our-mission" class="o-panel o-panel--our-mission">
    <span class="u-eadge--top"></span>

    <div class="c-our-mission">
        <div class="grid-container">
            <div class="grid-x grid-padding-x">
                <div class="cell medium-12">
                    <div class="c-our-mission__text">
                        <h4 class="u-sub-title text-left wow wow-visible"><?php echo get_field('om_sub_title'); ?></h4>
                        <h1 class="c-our-mission__title wow wow-visible"><?php echo get_field('om_title'); ?></h1>

                        <p class="c-our-mission__sub-title wow wow-visible"><?php echo get_field('om_text'); ?></p>
                    </div>
                </div><!--/ Our Mission Text -->

                <div class="cell medium-12">
                    <div class="c-our-mission__img u-plain-relative">
                        <img class="u-plain-absolute u-tweenmax-image" src="<?php echo get_field('om_photo'); ?>" alt="">
						<img class="u-plain-placeholder" src="<?php echo get_field('om_photo'); ?>" alt="">
                    </div>
                </div><!--/ Our Mission Image -->
            </div>
        </div>
    </div>
</div><!-- End Our Mission Panel -->

<div id="our-story" class="o-panel o-panel--our-story">
    <div class="c-our-story">
        <div class="grid-container">
            <div class="grid-x grid-padding-x">
                <div class="cell medium-12">
                    <div class="c-our-story__image-box">
                        <h1 class="c-our-story__title wow wow-visible"><?php echo get_field('os_title'); ?></h1>

                        <div class="wow wow-visible">
                            <?php echo get_field('os_left_col_text'); ?>
                        </div>

                        <div class="c-our-story__img u-plain-relative">
                            <img class="u-plain-absolute u-tweenmax-image" src="<?php echo get_field('os_photo'); ?>" alt="">
							<img class="u-plain-placeholder" src="<?php echo get_field('os_photo'); ?>" alt="">
                        </div>
                    </div>
                </div><!--/ Our Story Text Image -->

                <div class="cell medium-12">
                    <div class="wow wow-visible">
                        <?php echo get_field('os_right_col_text'); ?>
                    </div>

                    <div class="c-our-story__buttons wow wow-visible">
                        <a class="u-button u-button--red c-our-story__button" href="<?php echo get_field('os_red_button_link'); ?>"><?php echo get_field('os_red_button_label'); ?></a>
                        <a class="u-button c-our-story__button" href="<?php echo get_field('os_orange_button_link'); ?>"><?php echo get_field('os_orange_button_label'); ?></a>
                    </div>
                </div><!--/ Our Story Text -->
            </div>
        </div>
    </div>
</div><!-- End Our Story Panel -->

<div id="our-values" class="o-panel o-panel--our-values">
    <div class="c-our-values text-center">
        <div class="grid-container">
            <h1 class="c-our-values__heading u-ls-2 wow wow-visible"><?php echo get_field('ov_title'); ?></h1>
            <p class="c-our-values__sub-heading wow wow-visible"><?php echo get_field('ov_sub_title'); ?></p>

            <div class="grid-x grid-padding-x c-our-values__grid-x">
                <?php $delay = 0.2; if( have_rows('our_values_items') ): 
                    while( have_rows('our_values_items') ) : the_row(); ?>
                        <div class="cell small-24 medium-12 large-6 wow wow-visible" data-delay="<?php echo $delay; ?>">
                            <?php $delay = $delay + 0.1; ?>
                            <div class="c-our-values__text-box">
                                <div class="c-our-values__icon">
                                    <img src="<?php echo get_sub_field('ov_icon'); ?>" alt="">
                                </div><!--/ Icon -->

                                <div class="c-our-values__text">
                                    <h4 class="c-our-values__title u-ls-1"><?php echo get_sub_field('ovi_title'); ?></h4>
                                    <p><?php echo get_sub_field('ov_text'); ?></p>
                                </div>
                            </div>
                        </div><!--/ Our Value Item -->
                    <?php endwhile; 
                endif; ?>
            </div>

            <div class="c-our-values__cta wow wow-visible">
                <h4 class="c-our-values__cta-title u-ls-1"><?php echo get_field('cta_text'); ?></h4>
                <a class="u-button" href="<?php echo get_field('cta_button_link'); ?>">Join the team!</a>
            </div><!--/ Our Value CTA -->
        </div>
    </div>
</div><!-- End Our Value Panel -->

<div id="culture-of-service" class="o-panel o-panel--culture-of-service">
    <div class="c-culture-of-service">
        <div class="grid-container">
            <div class="grid-x grid-padding-x">
                <div class="cell medium-10 large-7">
                    <div class="c-culture-of-service__headings">
                        <h1 class="c-culture-of-service__title u-ls-2 wow wow-visible"><?php echo get_field('cs_title'); ?></h1>
                        <h4 class="c-culture-of-service__sub-title wow wow-visible"><?php echo get_field('cs_sub_title'); ?></h4>
                    </div>
                </div>
                <div class="cell medium-14 large-17">
                    <div class="c-culture-of-service__text wow wow-visible">
                        <?php echo get_field('cs_text'); ?>
                    </div>
                </div>
            </div>

            <div class="c-cs-testimonial">
                <div class="js-culture-slider">
                    <?php if( have_rows('cs_testimonials_&_videos') ): 
                        while( have_rows('cs_testimonials_&_videos') ) : the_row(); ?>
                            <div class="c-cs-testimonial__item">
                                <div class="grid-x grid-padding-x">
                                    <div class="cell c-cs-testimonial__col wow wow-visible">
                                        <div class="c-cs-testimonial__text">
                                            <p>“<?php echo get_sub_field('cs_testimonial_text'); ?>”</p>

                                            <div class="c-cs-testimonial__name">
                                                <p><strong><?php echo get_sub_field('cs_name'); ?></strong>
                                                <?php echo get_sub_field('cs_designation'); ?></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="cell c-cs-testimonial__video-col wow wow-visible">
                                        <div class="c-cs-video">
                                            <div class="c-cs-video__embed">
                                                <?php echo get_sub_field('cs_video_embed'); ?>
                                            </div>

                                            <h4 class="c-cs-video__title u-ls-1"><?php echo get_sub_field('video_title'); ?></h4>
                                        </div>
                                    </div>
                                </div>
                            </div><!--/ Slide Item -->
                        <?php endwhile; 
                    endif; ?>
                </div>

                <button id="testimonial-next" class="c-cs-testimonial__next wow wow-visible">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/arrow-blue.png" alt="">
                </button>
            </div><!--/ Content Slider -->

            <div class="c-photo-gallery wow wow-visible">
                <?php echo do_shortcode('[modula id="3245"]'); ?>
            </div><!-- Photo Gallery -->

            <div class="c-past-event">
                <h2 class="c-past-event__heading wow wow-visible"><?php echo get_field('pe_heading'); ?></h2>

                <div class="grid-x grid-padding-x wow wow-visible">
                    <?php if(have_rows('pe_events')) : $count = 1;
                        while(have_rows('pe_events')) : the_row(); ?>
                            <div class="cell medium-8">
                                <a class="c-past-event__img" href="<?php echo get_sub_field('pe_image'); ?>" data-rel="lightcase:collection<?php echo $count; ?>">
                                    <img src="<?php echo get_sub_field('pe_image'); ?>" alt="">
                                </a>
                                <h3 class="c-past-event__title"><?php echo get_sub_field('pe_title'); ?></h3>
								<?php 
									$gallery_images = get_sub_field('gallery_images');
								?>
								<div style="display: none">
									<?php foreach( $gallery_images as $image ): ?>
										<a href="<?php echo $image; ?>" data-rel="lightcase:collection<?php echo $count; ?>"></a>
									<?php endforeach; ?>
								</div>
                            </div>
                        <?php $count++; endwhile; 
                    endif; ?>
                </div>

                <?php //echo do_shortcode('[modula id="3336"]'); ?>
            </div><!--/ Past Event -->

            <div class="c-culture-of-service__social c-follow-social">
                <h1 class="c-follow-social__title u-ls-2 wow wow-visible">Follow our journey.</h1>
                <p class="c-follow-social__sub-title wow wow-visible">Join us on social media.</p>
                
                <div class="u-social u-social--follow-social wow wow-visible">
                    <?php if( have_rows('social_liinks') ): 
                        while( have_rows('social_liinks') ) : the_row(); ?>
                            <a href="<?php echo get_sub_field('sl_link'); ?>" target="_blank"><i class="<?php echo get_sub_field('sl_class_name'); ?>"></i></a>
                        <?php endwhile; 
                    endif; ?>
                </div>
            </div>
        </div>
    </div>
</div><!-- End Culture of Service Panel -->

<?php get_footer(); ?>