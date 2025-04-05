
<?php
/*
* Template Name: Businesses Page Template 
*/

get_header();

?>

<div id="businesses-intro" class="o-panel o-panel--businesses-intro u-margin-top-190">
	<div class="c-businesses-intro">
        <div class="grid-container">
            <div class="grid-x c-businesses-intro__grid-x">
                <div class="cell medium-24 large-12 c-businesses-intro__text-box">
                    <div class="c-businesses-intro__text">
                        <?php if( get_field('hero_show_back_link') == 'Yes' ) { ?>
                            <h4 class="u-sub-title u-sub-title--red text-left wow wow-visible" data-delay="0.9"><?php echo get_field('hero_back_link'); ?></h4>
                        <?php } ?>

            			<h1 class="c-businesses-intro__title u-ls-2 wow wow-visible" data-delay="0.9"><?php echo get_field('hero_title'); ?></h1>

                        <p class="wow wow-visible" data-delay="0.9"><?php echo get_field('hero_sub_title'); ?></p>

                        <div class="c-businesses-intro__buttons wow wow-visible" data-delay="0.9">
                            <a class="u-button u-button--blue" href="<?php echo get_field('hero_blue_button_link'); ?>"><?php echo get_field('hero_blue_button_label'); ?></a>
                            <a class="u-button u-button--red js-down-btn" href="<?php echo get_field('hero_red_button_link'); ?>"><?php echo get_field('hero_red_button_label'); ?></a>
                        </div>
                    </div>
                </div><!--/ Intro Headings --> 

                <div class="cell medium-24 large-12 c-businesses-intro__image-box">
                    <div class="c-businesses-intro__image u-eadge-top-right hide-for-small-only u-fatty-hero-image-trigger">
						<div class="u-fatty-div u-fatty-div--business u-tweenmax-image-hero" style="background-image: url(<?php echo get_field('hero_photo'); ?>);"></div>
						<img class="u-fatty-image-placeholder" src="<?php echo get_field('hero_photo'); ?>" alt="">
                    </div>

                    <div class="c-businesses-intro__image u-eadge-top-right show-for-small-only u-fatty-hero-mobile-image-trigger">
						<div class="u-fatty-div u-fatty-div--business-mobile u-tweenmax-image-hero" style="background-image: url(<?php echo get_field('hero_mobile_photo'); ?>);"></div>
						<img class="u-fatty-image-placeholder" src="<?php echo get_field('hero_mobile_photo'); ?>" alt="">
                    </div>
                </div><!--/ Intro Text -->
            </div>

            <h4 class="c-businesses-intro__btm-text u-ls-1 wow wow-visible" <?php echo wp_is_mobile() ? '': 'data-delay=".9"'; ?>><?php echo get_field('hero_intro_text'); ?></h4>
        </div>
	</div>
</div><!-- End IF Intro Panel -->

<div id="if-services" class="o-panel o-panel--if-service">
    <div class="c-if-service">
        <div class="grid-container">
            <div class="c-if-service__options">
                <div class="c-if-service__header">
                    <h1 class="c-if-service__title u-ls-2 wow wow-visible"><?php echo get_field('lc_left_col_title'); ?></h1>
                </div><!--/ Text -->

                <div class="c-if-service__items">
                    <div class="grid-x grid-padding-x c-if-service__grid-x">
                        <?php $delay = 0.2; if( have_rows('lc_section_items') ): 
                            while( have_rows('lc_section_items') ) : the_row(); ?>
                                <div class="cell medium-12 wow wow-visible" <?php echo $delay; ?>>
									<?php $delay = $delay + 0.1; ?>
                                    <div class="c-if-service__icon">
                                        <div class="c-if-service__img">
                                            <img src="<?php echo get_sub_field('lc_icon'); ?>" alt="">
                                        </div>
                                        
                                        <div class="c-if-service__text">
                                            <h4 class="c-if-service__name"><?php echo get_sub_field('lc_title'); ?></h4>
                                            <p><?php echo get_sub_field('lc_text'); ?></p>
                                        </div>
                                    </div>
                                </div><!--/ Option Item -->
                            <?php endwhile;
                        endif; ?>
                    </div>
                </div>
            </div><!--/ Coverage Options -->

            <div class="c-if-service-cta wow wow-visible">
                <h2 class="c-if-service-cta__title"><?php echo get_field('cta_title'); ?></h2>
                <a class="u-button u-button--red c-if-service-cta__button" href="<?php echo get_field('lc_button_link'); ?>">Learn more about the IMG Edge</a>
            </div>
        </div>
    </div>
</div><!-- End Coverage Panel -->

<div id="product-grid" class="o-panel o-panel--product-grid">
    <div class="grid-container">
        <div class="c-product-grid">
            <div class="c-product-grid__header c-product-grid__header--bu text-center">
                <h1 class="c-product-grid__title u-ls-2 wow wow-visible"><?php echo get_field('ps_title'); ?></h1>
				<div class="wow wow-visible">
                	<?php echo get_field('ps_text'); ?>
				</div>
            </div><!--/ Product Header -->

            <div class="grid-x grid-padding-x">
                <?php $delay = 0.2; if( have_rows('ps_products') ): 
                    while( have_rows('ps_products') ) : the_row(); ?>
                        <div class="cell medium-12 large-6 c-product-grid__col wow wow-visible" data-delay="<?php echo $delay; ?>">
							<?php $delay = $delay + 0.1; ?>
                            <a class="c-product-grid__box c-product-grid__box--bu" href="<?php echo get_sub_field('psp_more_link'); ?>">
                                <img class="c-product-grid__img" src="<?php echo get_sub_field('psp_normal_icon'); ?>" alt="">
                                <img class="c-product-grid__img-hover" src="<?php echo get_sub_field('psp_hover_icon'); ?>" alt="">

                                <h4 class="c-product-grid__name"><?php echo get_sub_field('psp_title'); ?></h4>
                                <p><?php echo get_sub_field('psp_text'); ?></p>

                                <span class="c-product-grid__more c-product-grid__more--bu">Learn More</span>
                            </a>
                        </div><!--/ Product Item -->
                    <?php endwhile;
                endif; ?>
            </div><!--/ Main Products -->

            <div class="c-other-product">
                <div class="grid-x grid-padding-x">
                    <?php $delay = 0.2;  if( have_rows('op_other_products') ): 
                        while( have_rows('op_other_products') ) : the_row(); ?>
                            <div class="cell medium-12 large-6 c-other-product__col wow wow-visible" data-delay="<?php echo $delay; ?>">
								<?php $delay = $delay + 0.1; ?>
                                <a class="c-other-product__box c-other-product__box--bu" href="<?php echo get_sub_field('op_more_link'); ?>">
                                    <div class="c-other-product__icon-box">
                                        <div class="c-other-product__icon">
                                            <img class="c-other-product__img" src="<?php echo get_sub_field('op_normal_icon'); ?>" alt="">
                                            <img class="c-other-product__img-hover" src="<?php echo get_sub_field('op_hover_icon'); ?>" alt="">
                                        </div>
                                        <h4 class="c-other-product__name"><?php echo get_sub_field('op_title'); ?></h4>
                                    </div>

                                    <div class="c-other-product__text  c-other-product__text--bu">
                                        <p><?php echo get_sub_field('op_text'); ?></p>
                                        <span class="c-other-product__read-more">Learn More</span>
                                    </div>
                                </a>
                            </div><!--/ Other Product Item -->
                        <?php endwhile;
                    endif; ?>
                </div>
            </div><!--/ Other Products -->

            <div class="c-product-cta">
                <p class="wow wow-visible"><?php echo get_field('op_cta_title'); ?></p>

                <div class="c-product-cta__button wow wow-visible">
                    <a class="u-button u-button--blue" href="<?php echo get_field('op_cta_button_link'); ?>">Request a Quote</a>
                </div>
            </div><!--/ Product CTA -->
        </div>
    </div>
</div><!-- End Other Products Panel -->

<div id="bu-coverage-opt" class="o-panel o-panel--bu-coverage-opt">
    <div class="c-bu-coverage-opt">
        <div class="grid-container">
            <div class="c-bu-coverage-opt__text">
                <h1 class="c-bu-coverage-opt__title u-ls-2 wow wow-visible"><?php echo get_field('industries_title'); ?></h1>
				<div class="wow wow-visible">
                	<?php echo get_field('industries_text'); ?>
				</div>
            </div>
            <div class="grid-x c-bu-coverage-opt__grid-x">
                <?php $delay = 0.2; if( have_rows('industrie_items') ): 
                    while( have_rows('industrie_items') ) : the_row(); ?>
                        <div class="cell c-bu-coverage-opt__col wow wow-visible" data-delay="<?php echo $delay; ?>">
							<?php $delay = $delay + 0.1; ?>
                            <a class="c-bu-coverage-opt__icon" href="<?php echo get_sub_field('ii_link'); ?>">
                                <img class="c-bu-coverage-opt__img" src="<?php echo get_sub_field('ii_normal_icon'); ?>" alt="">
                                <img class="c-bu-coverage-opt__img-hover" src="<?php echo get_sub_field('ii_hover_icon'); ?>" alt="">
                                <h4 class="c-bu-coverage-opt__name"><?php echo get_sub_field('ii_title'); ?></h4>
                            </a>
                        </div><!--/ Option Item -->
                    <?php endwhile;
                endif; ?>
            </div>

            <div class="c-product-cta">
                <h2 class="c-product-cta__title wow wow-visible"><?php echo get_field('ii_cta_title'); ?></h2>
                <p class="wow wow-visible"><?php echo get_field('ii_sub_title'); ?></p>

                <div class="c-product-cta__button c-product-cta__button--btm wow wow-visible">
                    <a class="u-button u-button--red" href="<?php echo get_field('ii_button_link'); ?>">Request a Free Consultation</a>
                </div>
            </div>
        </div>
    </div>
</div><!-- End Coverage Panel -->

<div id="commercial-services" class="o-panel o-panel--commercial-services">
    <span class="u-eadge--top"></span>
    <div class="c-commercial-services">
        <div class="grid-container">
            <div class="c-commercial-services__text">
                <h4 class="u-sub-title wow wow-visible"><?php echo get_field('cs_sub_title'); ?></h4>
                <h1 class="c-commercial-services__title wow wow-visible"><?php echo get_field('cs_title'); ?></h1>

				<div class="wow wow-visible">
                	<?php echo get_field('cs_text'); ?>
				</div>

                <div class="c-commercial-services__button wow wow-visible">
                    <a class="u-button u-button--blue" href="<?php echo get_field('cs_button_link'); ?>">Discover our policyholder services</a>
                </div>
            </div>
        </div>
    </div>
</div><!-- End Services Panel -->

<div id="testimonials==" class="o-panel== o-panel--testimonials==">
    <div class="c-testimonials==">
        <?php //include(TEMPLATEPATH.'/inc/testimonials.php'); ?>
    </div>
</div><!-- End Testimonials Panel -->

<div id="meet-the-team" class="o-panel o-panel--meet-the-team">
    <div class="c-meet-the-team c-meet-the-team--business">
        <div class="grid-container">
            <div class="grid-x grid-padding-x">
                <div class="cell medium-24 large-12">
                    <img class="c-meet-the-team__dot wow wow-visible" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/img-dots.png" alt="">

                    <div class="c-meet-the-team__text">
                        <h1 class="c-meet-the-team__title u-ls-2 wow wow-visible" data-delay="0.2"><?php echo get_field('mt_title'); ?></h1>
                        <div class="wow wow-visible" data-delay="0.3">
							<div><?php echo get_field('mt_text'); ?></div>
							<a class="u-button c-meet-the-team__button" href="<?php echo get_field('mt_button_link'); ?>">Meet the Team</a>
						</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="c-meet-the-team__img u-eadge-bottom-left u-fatty-image-trigger--business u-fatty-image-round-top-left u-tweenmax-target">
            <img class="u-fatty-image u-fatty-image--business u-tweenmax-image" src="<?php echo get_field('mt_photo'); ?>" alt="">
			<img class="u-fatty-image-placeholder u-fatty-image-placeholder--business" src="<?php echo get_field('mt_photo'); ?>" alt="">
        </div>
    </div>
</div><!-- End Meet The Team Panel -->

<?php include(TEMPLATEPATH.'/inc/faq.php'); ?>

<?php include(TEMPLATEPATH.'/inc/dark-blue-cta.php'); ?>

<?php get_footer(); ?>