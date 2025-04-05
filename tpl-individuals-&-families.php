
<?php /*
 * Template Name: Individuals & Families Page Template
 */

get_header(); ?>

<div id="if-intro" class="o-panel o-panel--if-intro u-margin-top-190">
	<div class="c-if-intro">
        <div class="grid-container">
            <div class="grid-x c-if-intro__grid-x c-if-intro__grid-x--main">
                <div class="cell medium-24 large-12 c-if-intro__text-box">
                    <div class="c-if-intro__text">
                        <?php if (get_field('hero_show_back_link') == 'Yes') { ?>
                            <h4 class="u-sub-title u-sub-title--orange text-left wow wow-visible" data-delay="0.9"><a href="<?php echo get_field(
                              'hero_back_link'); ?>"><i class="fas fa-chevron-left"></i> Personal Insurance</a></h4>
                        <?php } ?>
            			<h1 class="c-if-intro__title u-ls-2 wow wow-visible" data-delay="0.9"><?php echo get_field('hero_title'); ?></h1>

                        <p class="wow wow-visible" data-delay="0.9"><?php echo get_field('hero_sub_title'); ?></p>

                        <div class="c-if-intro__buttons wow wow-visible" data-delay="0.9">
                            <a class="u-button" href="<?php echo get_field('hero_orange_button_link'); ?>"><?php echo get_field('hero_orange_button_label'); ?></a>
                            <a class="u-button u-button--red js-down-btn" href="<?php echo get_field('hero_red_btn_link'); ?>"><?php echo get_field('hero_red_button_label'); ?></a>
                        </div>
                    </div>
                </div><!--/ Intro Headings --> 

                <div class="cell medium-24 large-12 c-if-intro__image-box">
                    <div class="c-if-intro__image c-if-intro__image--d-img u-eadge-top-right hide-for-small-only u-fatty-hero-image-trigger--families">
                        <div class="u-fatty-div u-fatty-div--families u-tweenmax-image-hero" style="background-image: url(<?php echo get_field('hero_photo'); ?>);"></div>
						<img class="u-fatty-image-placeholder" src="<?php echo get_field('hero_photo'); ?>" alt="">
                    </div>

                    <div class="c-if-intro__image u-eadge-top-right show-for-small-only u-fatty-hero-mobile-image-trigger--families">
                        <div class="u-fatty-div u-fatty-div--families-mobile u-tweenmax-image-hero" style="background-image: url(<?php echo get_field('hero_mobile_photo'); ?>);"></div>
						<img class="u-fatty-image-placeholder" src="<?php echo get_field('hero_mobile_photo'); ?>" alt="">
                    </div>
                </div><!--/ Intro Text -->
            </div>

            <h4 class="c-if-intro__btm-text u-ls-1 wow wow-visible" <?php echo wp_is_mobile() ? '': 'data-delay=".9"'; ?>><?php echo get_field('hero_intro_text'); ?></h4>
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
                        <?php $delay = 0.2; if (have_rows('lc_section_items')):
                            while (have_rows('lc_section_items')): the_row(); ?>
                                <div class="cell medium-12 wow wow-visible" data-delay="<?php echo $delay; ?>">
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
        </div>
    </div>
</div><!-- End Coverage Panel -->

<div id="brand-slider" class="o-panel o-panel--brand-slider">
    <div class="c-brand-slider c-brand-slider--if">
        <div class="grid-container">
            <h3 class="c-brand-slider__title c-brand-slider__title--if wow wow-visible"><?php echo get_field('ls_title'); ?></h3>

			<div class="c-brand-slider__wrap">
				<button class="c-brand-slider__arrow c-brand-slider__left-arrow">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo-slider-left-arrow.png" alt="" />
				</button>
	            <div class="js-brand-slider wow wow-visible">
	                <?php if (have_rows('ls_logo_slider')):
	                    while (have_rows('ls_logo_slider')): the_row(); ?>
	                        <div class="c-brand-slider__logo">
	                            <img src="<?php echo get_sub_field('ls_logo'); ?>" alt="">
	                        </div><!--/ Brand Logo -->
	                    <?php endwhile;
	                endif; ?>
	            </div>
				<button class="c-brand-slider__arrow c-brand-slider__right-arrow">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo-slider-right-arrow.png" alt="" />
				</button>
			</div>
        </div>
    </div>
</div><!-- End Brand Slider Panel -->

<div id="product-grid" class="o-panel o-panel--product-grid">
    <div class="grid-container">
        <div class="c-product-grid">
            <div class="c-product-grid__header c-product-grid__header--main text-center">
                <h1 class="c-product-grid__title u-ls-2 wow wow-visible"><?php echo get_field('ps_title'); ?></h1>
				<div class="wow wow-visible">
                	<?php echo get_field('ps_text'); ?>
				</div>
            </div><!--/ Product Header -->

            <div class="grid-x grid-padding-x">
                <?php $delay = 0.2; if (have_rows('ps_products')):
                    while (have_rows('ps_products')): the_row(); ?>
                        <div class="cell medium-12 large-6 c-product-grid__col wow wow-visible" data-delay="<?php echo $delay; ?>">
							<?php $delay = $delay + 0.1; ?>
                            <a class="c-product-grid__box" href="<?php echo get_sub_field(
                              'psp_more_link'
                            ); ?>">
                                <img class="c-product-grid__img" src="<?php echo get_sub_field(
                                  'psp_normal_icon'
                                ); ?>" alt="">
                                <img class="c-product-grid__img-hover" src="<?php echo get_sub_field(
                                  'psp_hover_icon'
                                ); ?>" alt="">

                                <h4 class="c-product-grid__name"><?php echo get_sub_field(
                                  'psp_title'
                                ); ?></h4>
                                <p><?php echo get_sub_field('psp_text'); ?></p>

                                <span class="c-product-grid__more">Learn More</span>
                            </a>
                        </div><!--/ Product Item -->
                    <?php endwhile;
                endif; ?>
            </div><!--/ Main Products -->

            <div class="c-other-product">
                <div class="grid-x grid-padding-x">
                    <?php $delay = 0.2; if (have_rows('op_other_products')):
                      while (have_rows('op_other_products')):
                        the_row(); ?>
                            <div class="cell medium-12 large-6 c-other-product__col wow wow-visible" data-delay="<?php echo $delay; ?>">
								<?php $delay = $delay + 0.1; ?>
                                <a class="c-other-product__box" href="<?php echo get_sub_field(
                                  'op_more_link'
                                ); ?>">
                                    <div class="c-other-product__icon-box">
                                        <div class="c-other-product__icon">
                                            <img class="c-other-product__img" src="<?php echo get_sub_field(
                                              'op_normal_icon'
                                            ); ?>" alt="">
                                            <img class="c-other-product__img-hover" src="<?php echo get_sub_field(
                                              'op_hover_icon'
                                            ); ?>" alt="">
                                        </div>
                                        <h4 class="c-other-product__name"><?php echo get_sub_field(
                                          'op_title'
                                        ); ?></h4>
                                    </div>
                                    
                                    <div class="c-other-product__text">
                                        <p><?php echo get_sub_field(
                                          'op_text'
                                        ); ?></p>
                                        <span class="c-other-product__read-more">Learn More</span>
                                    </div>
                                </a>
                            </div><!--/ Other Product Item -->
                        <?php
                      endwhile;
                    endif; ?>
                </div>
            </div><!--/ Other Products -->

            <div class="c-product-cta">
                <p class="wow wow-visible"><?php echo get_field('op_cta_text'); ?></p>

                <div class="c-product-cta__button wow wow-visible">
                    <a class="u-button u-button--red" href="<?php echo get_field(
                      'op_cta_button_link'
                    ); ?>">Request a Quote</a>
                </div>
            </div><!--/ Product CTA -->
        </div>
    </div>
</div><!-- End Other Products Panel -->

<div id="services" class="o-panel o-panel--services">
    <div class="c-services">
        <div class="grid-container">
            <div class="c-services__text">
                <h4 class="u-sub-title wow wow-visible"><?php echo get_field('bs_sub_title'); ?></h4>
                <h1 class="c-services__title u-ls-2 wow wow-visible"><?php echo get_field(
                  'bs_title'
                ); ?></h1>

				<div class="wow wow-visible">
                	<?php echo get_field('bs_text'); ?>
				</div>

                <div class="c-services__button wow wow-visible">
                    <a class="u-button u-button--blue" href="<?php echo get_field(
                      'bs_button_link'
                    ); ?>">Discover what makes IMG different</a>
                </div>
            </div>
        </div>
    </div>
</div><!-- End Services Panel -->

<div id="testimonials" class="o-panel o-panel--testimonials">
    <div class="c-testimonials">
        <?php include TEMPLATEPATH . '/inc/testimonials.php'; ?>
    </div>
</div><!-- End Testimonials Panel -->

<div id="meet-the-team" class="o-panel o-panel--meet-the-team">
    <div class="c-meet-the-team">
        <div class="grid-container">
            <div class="grid-x grid-padding-x">
                <div class="cell medium-24 large-12">
                    <img class="c-meet-the-team__dot wow wow-visible" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/img-dots.png" alt="">

                    <div class="c-meet-the-team__text wow wow-visible">
                        <h1 class="c-meet-the-team__title u-ls-2"><?php echo get_field(
                          'mt_title'
                        ); ?></h1>

                        <?php echo get_field('mt_text'); ?>

                        <a class="u-button c-meet-the-team__button" href="<?php echo get_field(
                          'mt_button_link'
                        ); ?>">Meet the Team</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="c-meet-the-team__img c-meet-the-team__img--if u-eadge-bottom-left u-fatty-image-trigger--families u-fatty-image-round-top-left u-tweenmax-target">
            <img class="u-fatty-image u-fatty-image--families u-tweenmax-image" src="<?php echo get_field('mt_photo'); ?>" alt="">
			<img class="u-fatty-image-placeholder" src="<?php echo get_field('mt_photo'); ?>" alt="">
        </div>
    </div>
</div><!-- End Meet The Team Panel -->
	
<?php include TEMPLATEPATH . '/inc/faq.php'; ?>

<?php include TEMPLATEPATH . '/inc/dark-blue-cta.php'; ?>

<?php get_footer(); ?>
