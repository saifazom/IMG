
<?php
/*
* Template Name: Businesses: Services Page Template 
*/

get_header();

?>

<div id="homeowners-intro" class="o-panel o-panel--homeowners-intro u-margin-top-195">
    <div class="c-homeowners-intro c-homeowners-intro--service">
        <div class="grid-container">
            <div class="grid-x grid-padding-x align-middle">
                <div class="cell medium-10">
                    <div class="c-homeowners-intro__headings">
                        <?php if( get_field('hero_show_back_link') == 'Yes' ) { ?>
                            <h4 class="u-sub-title u-sub-title--orange text-left wow wow-visible" data-delay="0.9"><a href="<?php echo get_field('hero_back_link'); ?>"><i class="fas fa-angle-left"></i> Commercial Insurance</a></h4>
                        <?php }else{ ?>
                            <h4 class="u-sub-title u-sub-title--orange text-left wow wow-visible" data-delay="0.9">Commercial Insurance</h4>
                        <?php } ?>
                        <h1 class="c-homeowners-intro__title u-ls-2 wow wow-visible" data-delay="0.9"><?php echo get_field('hero_title'); ?></h1>

						<div class=" wow wow-visible" data-delay="0.9">
	                        <p><?php echo get_field('hero_sub_title'); ?></p>
							<a class="u-button u-button--blue js-down-btn" data-delay="0.9" href="<?php echo get_field('hero_button_link'); ?>">Learn More</a>
						</div>
                    </div>
                </div><!--/ Intro Headings --> 

                <div class="cell medium-14 c-homeowners-intro__image-col">
                    <div class="c-homeowners-intro__image u-eadge-top-left u-plain-relative">
                        <img class="u-plain-absolute u-tweenmax-image-hero" src="<?php echo get_field('hero_photo'); ?>" alt="">
						<img class="u-plain-placeholder" src="<?php echo get_field('hero_photo'); ?>" alt="">
                    </div>
                </div><!--/ Homeowners Intro Text -->
            </div>

            <div class="c-homeowners-intro__btm-text c-homeowners-intro__btm-text--services wow wow-visible" data-delay="0.9">
                <?php echo get_field('intro_text'); ?>
            </div>
        </div>
    </div>
</div><!-- End Intro Panel -->

<div id="if-services" class="o-panel o-panel--if-service">
    <div class="c-if-service c-if-service--main">
        <div class="grid-container">
            <div class="c-if-service__top-text text-center">
                <h1 class="c-if-service__title u-ls-2 wow wow-visible"><?php echo get_field('services_title'); ?></h1>
                <p class="wow wow-visible"><?php echo get_field('services_sub_title'); ?></p>
            </div>

            <div class="grid-x grid-padding-x- c-if-service__grid-x">
                <?php $delay = 0.2; if( have_rows('service_items') ): 
                    while( have_rows('service_items') ) : the_row(); ?>
                        <div class="cell medium-12 large-8 wow wow-visible" data-delay="<?php echo $delay; ?>">
                            <?php $delay = $delay + 0.1; ?>
                            <div class="c-if-service__icon">
                                <div class="c-if-service__img">
                                    <img src="<?php echo get_sub_field('service_icon'); ?>" alt="">
                                </div>

                                <div class="c-if-service__text">
                                    <h4 class="c-if-service__name"><?php echo get_sub_field('service_title'); ?></h4>
                                    <?php echo get_sub_field('service_text'); ?>
                                </div>
                            </div>
                        </div><!--/ Option Item -->
                    <?php endwhile; 
                endif; ?>
            </div>
        </div>
    </div>
</div><!-- End Coverage Panel -->

<div id="team-section" class="o-panel o-panel--team-section">
    <div class="c-team-section">
        <div class="grid-container">
            <div class="grid-x grid-padding-x">
                <div class="cell medium-12">
                    <div class="c-team-section__images">
                        <?php $delay = 0.2; if( have_rows('mtt_photos') ): 
                            while( have_rows('mtt_photos') ) : the_row(); ?>
                                <div class="c-team-section__img wow wow-visible" data-delay="<?php echo $delay; ?>">
                                    <?php $delay = $delay + 0.1; ?>
									<div class="u-plain-relative">
                                    	<img class="u-plain-absolute u-tweenmax-image" src="<?php echo get_sub_field('mtt_photo'); ?>" alt="">
										<img class="u-plain-placeholder" src="<?php echo get_sub_field('mtt_photo'); ?>" alt="">
									</div>
                                </div>
                            <?php endwhile; 
                        endif; ?>
                    </div>
                </div>

                <div class="cell medium-12 c-team-section__text-col">
                    <div class="c-team-section__text">
                        <img class="c-team-section__dots wow wow-visible" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/img-dots.png" alt="">

                        <h1 class="c-team-section__title u-ls-2 wow wow-visible"><?php echo get_field('mtt_title'); ?></h1>
						<div class="wow wow-visible">
	                        <p><?php echo get_field('mtt_sub_title'); ?></p>
	                        <a class="u-button u-button--red c-team-section__button" href="<?php echo get_field('mtt_button_link'); ?>">Meet the Team</a>
						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- End Team Section Panel -->

<?php get_footer(); ?>