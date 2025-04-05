<?php 

get_header();

$homepage_id = 8;

?>
<div id="hero" class="o-panel o-panel--hero">
    <div class="c-hero">
        <?php if( have_rows('hero_slider', $homepage_id) ): ?>
            <div class="c-hero__mobile-caption show-for-small-only">
                <h1 class="c-hero__title wow wow-visible"><?php echo get_field('hero_mbl_title', $homepage_id); ?></h1>

                <p class="wow wow-visible"><?php echo get_field('hero_mbl_sub_title', $homepage_id); ?></p>

                <div class="c-hero__button-area wow wow-visible">
                    <a class="u-button" href="<?php echo get_field('hero_mbl_orange_button_link', $homepage_id); ?>"><?php echo get_field('hero_mbl_orange_button_label', $homepage_id); ?></a>
                    <a class="u-button u-button--red js-down-btn==" href="<?php echo get_field('hero_mbl_red_button_link', $homepage_id); ?>"><?php echo get_field('hero_mbl_red_button_label', $homepage_id); ?></a>
                </div>
            <?php endif; ?>
        </div><!--/ Show For Mobile -->

        <div id="wowslider-container1">
            <?php if( have_rows('hero_slider', $homepage_id) ): $count = 1; ?>
                <div class="ws_images">
                    <ul>
                        <?php while( have_rows('hero_slider', $homepage_id) ) : the_row(); ?>
                            <li>
								<?php
									$hero_img = get_sub_field('hero_photo', $homepage_id);
									if(wp_is_mobile() && get_sub_field('hero_photo_mobile', $homepage_id)){
										$hero_img = get_sub_field('hero_photo_mobile', $homepage_id);
									}
								?>
                                <div id="" class="c-hero__slide-img" style="background-image: url(<?php echo $hero_img; ?>);">
                                    <img src="<?php echo $hero_img; ?>" alt="Slider <?php echo $count; ?>" title="">
                                </div>
                                <div class="grid-container c-hero__container">
                                    <div class="grid-x grid-padding-x c-hero__grid">
                                        <div class="cell small-24 medium-15">
                                            <h1 class="c-hero__title wow wow-visible"><?php echo get_sub_field('hero_title', $homepage_id); ?></h1>
                                            <p class="wow wow-visible"><?php echo get_sub_field('hero_text', $homepage_id); ?></p>

                                            <div class="c-hero__button-area wow wow-visible">
                                                <a class="u-button" href="<?php echo get_sub_field('hero_button_link', $homepage_id); ?>" target="<?php  if(get_sub_field('target') == '_self'){echo '_self';}else{echo '_blank';} ?>"><?php echo get_sub_field('hero_button_label', $homepage_id); ?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        <?php $count++; endwhile; ?>
                    </ul>
                </div>
                <div class="ws_bullets">
                    <div>
                        <?php while( have_rows('hero_slider', $homepage_id) ) : the_row(); ?>
                            <a href="#">
                                <span><?php echo $count; ?></span>
                            </a>
                        <?php $count++; endwhile; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div><!-- End Hero Panel -->

<?php if( get_field('announc_show_hide', $homepage_id) == 'Show' ) { ?>
    <div id="announcement" class="o-panel o-panel--announcement">
        <div class="c-announcement">
            <div class="grid-container">
                <h2 class="c-announcement__heading wow wow-visible">Compare quotes from top-rated insurance carriers</h2>

                <div class="grid-x grid-padding-x c-announcement__grid-x wow wow-visible">
                    <div class="cell medium-shrink">
                        <h3 class="c-announcement__title"><?php echo get_field('announc_title', $homepage_id); ?></h3>
                    </div>

                    <div class="cell medium-auto">
                        <div class="c-announcement__bar">
                            <?php echo get_field('announc_text', $homepage_id); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<div id="who-we-serve" class="o-panel o-panel--who-we-serve">
    <div class="c-who-we-serve">
        <div class="grid-container">
            <div class="c-who-we-serve__header">
                <h1 class="c-who-we-serve__heading u-ls-2 wow wow-visible"><?php echo get_field('wws_heading', $homepage_id); ?></h1>
                <p class="wow wow-visible"><?php echo get_field('wws_text', $homepage_id); ?></p>
            </div><!--/ Who we serve Header -->

            <?php if( have_rows('wws_boxes', $homepage_id) ): ?>
                <div class="grid-x grid-padding-x c-who-we-serve__grid wow wow-visible">
                    <?php $count = 1; while( have_rows('wws_boxes', $homepage_id) ) : the_row(); ?>
                        <div class="cell small-24 medium-12 large-8 c-who-we-serve__col"">
                        	<a class="c-who-we-serve__box" href="<?php echo get_sub_field('wws_b_more_link', $homepage_id); ?>" style="background-color: <?php echo get_sub_field('wws_box_color', $homepage_id); ?>;">
                                <div class="c-who-we-serve__box-wrap">
                                    <div class="c-who-we-serve__icon">
                                        <img src="<?php echo get_sub_field('wws_b_icon', $homepage_id); ?>" alt="">
                                    </div>

                                    <h3 class="c-who-we-serve__title"><?php echo get_sub_field('wws_b_title', $homepage_id); ?></h3>

                                    <p><?php echo get_sub_field('wws_b_text', $homepage_id); ?></p>

                                    <button  class="c-who-we-serve__more">Learn More </button>
                                </div>
                            </a>
                        </div><!--/ Grid Item -->
                    <?php $count++; endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div><!-- End Who We Serve Panel -->

<?php include(TEMPLATEPATH.'/inc/dark-blue-cta.php'); ?>

<div id="why-img" class="o-panel o-panel--why-img">
    <div class="c-why-img">
        <div class="grid-container fluid">
            <div class="c-why-img__header">
                <h4 class="u-sub-title wow wow-visible"><?php echo get_field('wi_small_heading', $homepage_id); ?></h4>
                <h2 class="c-why-img__heading wow wow-visible"><?php echo get_field('wi_heading', $homepage_id); ?></h2>

                <p class="wow wow-visible"><?php echo get_field('wi_sub_heading', $homepage_id); ?></p>
            </div><!--/ Why IMG Header -->

            <div class="grid-x grid-padding-x c-why-img__grid">
                <?php if( have_rows('why_img_texts', $homepage_id) ): $delay = 0.2; ?>
                    <?php while( have_rows('why_img_texts', $homepage_id) ) : the_row();  ?>
                        <div class="cell small-24 medium-12 c-why-img__col wow wow-visible" data-delay="<?php echo $delay; ?>">
							<?php $delay = $delay + 0.1; ?>
                            <div class="c-why-img__text">
                                <h3 class="c-why-img__title"><?php echo get_sub_field('wi_title', $homepage_id); ?></h3>

                                <p><?php echo get_sub_field('wi_text', $homepage_id); ?></p>
                            </div>
                        </div><!--/ Text Col -->
                    <?php endwhile; ?>
                <?php endif; ?>

                <div class="cell small-24 medium-12 c-why-img__col">
                    <div class="c-why-img__image">
                        <div class="c-why-img__image-edge u-tweenmax-target">
                            <div class="c-why-img__image-wrap u-fatty-image-wrap u-tweenmax-target">
                                <img class="u-fatty-image u-fatty-image--index u-tweenmax-image" src="<?php echo get_field('wi_parallax_image', $homepage_id); ?>" alt="">
                                <img class="u-fatty-image-placeholder" src="<?php echo get_field('wi_parallax_image', $homepage_id); ?>" alt="">
                            </div>
                        </div>
                    </div>
                </div><!--/ Text Col -->
			</div>
            
			<div class="grid-x grid-padding-x c-why-img__grid c-why-img__grid--blue-wrap">
                <div class="cell small-24 medium-24 large-12 c-why-img__col">
                    <div class="c-why-img__help">
						<div class="wow wow-visible">
                        	<?php echo get_field('wi_blue_box_content', $homepage_id); ?>
						</div>
                    </div>
                </div><!--/ Text Col -->

                <div class="cell small-24 medium-24 large-12 c-why-img__cta-col">
                    <div class="c-why-img__cta wow wow-visible">
                        <h2>Get started now.</h2>
                        <a class="u-button" href="<?php echo get_field('request_a_quote_button_link_1', $homepage_id); ?>">
                            <?php echo get_field('request_a_quote_button_label_1', $homepage_id); ?>
                        </a>
                    </div>
                </div><!--/ Text Col -->
            </div>
        </div>
    </div>
</div><!-- End Why IMG Panel -->

<?php include(TEMPLATEPATH.'/inc/testimonials.php'); ?>

<div id="cta" class="o-panel o-panel--cta">
    <div class="c-cta2">
        <div class="grid-container c-cta2__container">
            <div class="c-cta2__header wow wow-visible">
                <h2 class="c-cta2__title c-cta2__title--home"><?php echo get_field('cta_2_text', $homepage_id); ?></h2>
            </div><!--/ CTA Header -->

            <div class="c-cta2__arrows wow wow-visible">
                <a class="u-button" href="<?php echo get_field('yellow_button_link', $homepage_id); ?>"><?php echo get_field('yellow_button_label', $homepage_id); ?></a>
                <a class="u-button" href="<?php echo get_field('pink_button_link', $homepage_id); ?>"><?php echo get_field('pink_button_label', $homepage_id); ?></a>
            </div>
        </div>
    </div>
</div><!-- End CTA 2 Panel -->

<?php //include(TEMPLATEPATH.'/inc/featured-posts.php'); ?>

<div class="c-featured-posts-cta" style="padding-bottom: 55px;">
    <div class="grid-container c-featured-posts-cta__container wow wow-visible">
        <h2><?php echo get_field('fp_cta_heading', $homepage_id); ?></h2>
        <p><?php echo get_field('fp_cta_text', $homepage_id); ?></p>

        <a class="u-button" href="<?php echo get_field('fp_button_link', $homepage_id); ?>"><?php echo get_field('fp_button_label', $homepage_id); ?></a>
    </div>
</div><!--/ End Featured Posts Section -->

<div id="newsletter" class="o-panel o-panel--newsletter">
    <div class="grid-container c-newsletter">
        <div class="grid-x grid-padding-x align-middle align-center">
            <div class="cell small-24 medium-24 large-8 c-newsletter__col wow wow-visible">
                <h2 class="c-newsletter__title">Insurance tips<br/> & news delivered<br/> to your inbox.</h2>
            </div><!--/ Address Info -->

            <div class="cell small-24 medium-24 large-16 c-newsletter__col wow wow-visible">
                <?php echo do_shortcode( '[gravityform id=1 title=false description=false ajax=true tabindex=49]' ); ?>
            </div>
        </div>
    </div>
</div><!-- End Contact Panel -->
    
<?php get_footer(); ?>