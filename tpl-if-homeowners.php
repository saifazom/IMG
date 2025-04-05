
<?php
/*
* Template Name: Homeowners Page Template 
*/

get_header();

?>

<div id="homeowners-intro" class="o-panel o-panel--homeowners-intro u-margin-top-190">
	<div class="c-homeowners-intro">
        <div class="grid-container">
            <div class="grid-x grid-padding-x align-middle">
                <div class="cell medium-9">
                    <div class="c-homeowners-intro__headings">
                        <?php if( get_field('hero_show_back_link') == 'Yes' ) { ?>
                            <h4 class="u-sub-title text-left">
                                <a href="<?php echo get_field('hero_back_link'); ?>"><i class="fas fa-chevron-left"></i> PERSONAL INSURANCE</a>
                            </h4>
                        <?php } ?>
            			<h1 class="c-homeowners-intro__title u-ls-2"><?php echo get_field('hero_title'); ?></h1>

                        <p><?php echo get_field('hero_sub_title'); ?></p>

                        <a class="u-button js-down-btn" href="<?php echo get_field('hero_button_link'); ?>">Learn More </a>
                    </div>
                </div><!--/ Intro Headings --> 

                <div class="cell medium-15 c-homeowners-intro__image-col">
                    <div class="c-homeowners-intro__image u-eadge-top-left">
                        <img src="<?php echo get_field('hero_photo'); ?>" alt="">
                    </div>
                </div><!--/ Homeowners Intro Text -->
            </div>
        </div>
	</div>
</div><!-- End Intro Panel -->

<div class="u-gt-blue-bar">
    <?php include(TEMPLATEPATH.'/inc/get-in-touch.php'); ?>
</div>

<div id="coverage-opt" class="o-panel o-panel--coverage-opt">
    <div class="c-coverage-opt">
        <div class="grid-container">
            <?php if( have_rows('cs_coverage_items') ): 
                while( have_rows('cs_coverage_items') ) : the_row(); ?>
                    <div class="c-coverage-opt__options">
                        <div class="c-coverage-opt__text">
                            <?php if( get_sub_field('show_small_title') == 'Yes' ) { ?>
                                <h4 class="u-sub-title text-left"><?php echo get_sub_field('small_title'); ?></h4>
                            <?php } ?>
                            <h1 class="c-coverage-opt__title u-ls-2"><?php echo get_sub_field('cs_left_col_title'); ?></h1>
                            <p><?php echo get_sub_field('cs_left_col_sub_title'); ?></p>
                        </div><!--/ Text -->

                        <div class="c-coverage-opt__items">
                            <div class="grid-x c-coverage-opt__grid-x">
                                <?php if( have_rows('cs_coverage_options') ): 
                                    while( have_rows('cs_coverage_options') ) : the_row(); ?>
                                        <div class="cell small-12 medium-6 c-coverage-opt__col">
                                            <a class="c-coverage-opt__icon" href="<?php echo get_sub_field('cs_link'); ?>">
                                                <img src="<?php echo get_sub_field('cs_icon'); ?>" alt="">
                                                <h4 class="c-coverage-opt__name"><?php echo get_sub_field('cs_title'); ?></h4>
                                            </a>
                                        </div><!--/ Option Item -->
                                    <?php endwhile;
                                endif; ?>
                            </div>
                        </div>
                    </div><!--/ Coverage Options -->
                <?php endwhile;
            endif; ?>
        </div>
    </div>
</div><!-- End Coverage Panel -->

<div id="cta-regular" class="o-panel o-panel--cta-regular">
    <div class="c-cta-regular text-center">
        <div class="grid-container">
            <h3 class="c-cta-regular__title u-ls-1-5"><?php echo get_field('cs_cta_title'); ?></h3>

            <?php echo get_field('cs_cta_text'); ?>

            <div class="c-cta-regular__buttons">
                <a class="u-button u-button--red" href="<?php echo get_field('cs_red_button_link'); ?>"><?php echo get_field('cs_red_button_label'); ?></a>
                <a class="u-button" href="<?php echo get_field('cs_orange_button_link'); ?>"><?php echo get_field('cs_orange_button_label'); ?></a>
            </div>
        </div>
    </div>
</div><!-- End Cta Regular Panel -->

<div id="other-products" class="o-panel o-panel--other-products">
    <div class="c-other-product c-other-product--homeowners text-center">
        <div class="grid-container">
            <h3 class="c-other-product__title u-ls-2"><?php echo get_field('op_title'); ?></h3>

            <div class="grid-x grid-padding-x align-center">
                <?php if( have_rows('other_products') ): 
                    while( have_rows('other_products') ) : the_row(); ?>
                        <div class="cell medium-12 large-6 c-other-product__col">
                            <a class="c-other-product__box" href="<?php echo get_sub_field('opi_link'); ?>">
                                <div class="c-other-product__icon-box">
                                    <div class="c-other-product__icon">
                                        <img class="c-other-product__img" src="<?php echo get_sub_field('op_normal_icon'); ?>" alt="">
                                        <img class="c-other-product__img-hover" src="<?php echo get_sub_field('op_hover_icon'); ?>" alt="">
                                    </div>
                                    <h4 class="c-other-product__name"><?php echo get_sub_field('opi_title'); ?></h4>
                                </div>
                            </div>
                        </a><!--/ Other Product Item -->
                    <?php endwhile;
                endif; ?>
            </div>

            <div class="c-other-product__more">
                <a href="<?php echo get_field('op_button_link'); ?>"><?php echo get_field('op_button_text'); ?></a>
            </div>
        </div>
    </div>
</div><!-- End Other Products Panel -->

<?php include(TEMPLATEPATH.'/inc/faq.php'); ?>

<div id="cta-basic" class="o-panel o-panel--cta-basic">
    <div class="c-cta-basic" style="padding-bottom: 0;">
        <div class="grid-container" style="display: none;">
            <div class="c-cta-basic__text">
                <h4 class="c-cta-basic__title"><?php echo get_field('faq_cta_title'); ?></h4>
                <a class="u-button" href="<?php echo get_field('faq_cta_button_link'); ?>">See all FAQs</a>
            </div>
        </div>
    </div>
</div><!-- End CTA Basic Panel -->

<?php include(TEMPLATEPATH.'/inc/dark-blue-cta.php'); ?>

<?php get_footer(); ?>