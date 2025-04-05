
<?php
/*
* Template Name: AutoInsurance Page Template 
*/

get_header();

?>

<div id="homeowners-intro" class="o-panel o-panel--homeowners-intro u-margin-top-195">
    <div class="c-homeowners-intro">
        <div class="grid-container">
            <div class="grid-x grid-padding-x align-middle">
                <div class="cell medium-10">
                    <div class="c-homeowners-intro__headings">
                        <?php if( get_field('hero_show_back_link') == 'Yes' ) { ?>
                            <h4 class="u-sub-title u-sub-title--orange text-left">
                                <a href="<?php echo get_field('hero_back_link'); ?>"><i class="fas fa-chevron-left"></i> COMMERCIAL INSURANCE</a>
                            </h4>
                        <?php }else {?> 
                            <h4 class="u-sub-title u-sub-title--orange text-left">COMMERCIAL INSURANCE</h4>
                        <?php } ?>

                        <h1 class="c-homeowners-intro__title u-ls-2"><?php echo get_field('hero_title'); ?></h1>

                        <p><?php echo get_field('hero_sub_title'); ?></p>

                        <a class="u-button u-button--blue js-down-btn" href="<?php echo get_field('hero_button_link'); ?>">Learn More </a>
                    </div>
                </div><!--/ Intro Headings --> 

                <div class="cell medium-14 c-homeowners-intro__image-col c-homeowners-intro__image-col--empl">
                    <div class="c-homeowners-intro__image u-eadge-top-left">
                        <img src="<?php echo get_field('hero_photo'); ?>" alt="">
                    </div>
                </div><!--/ Homeowners Intro Text -->
            </div>
        </div>
    </div>
</div><!-- End Intro Panel -->

<div class="u-gt-orange-bar">
    <?php include(TEMPLATEPATH.'/inc/get-in-touch.php'); ?>
</div>

<div id="au-coverage-opt" class="o-panel o-panel--au-coverage-opt">
    <div class="c-au-coverage-opt">
        <div class="grid-container">
            <div class="c-au-coverage-opt__options">
                <div class="c-au-coverage-opt__text">
                    <h1 class="c-au-coverage-opt__title u-ls-2"><?php echo get_field('cs_left_col_title'); ?></h1>
                    <p><?php echo get_field('cs_left_col_sub_title'); ?></p>
                </div><!--/ Text -->

                <div class="c-au-coverage-opt__items">
                    <div class="grid-x c-au-coverage-opt__grid-x">
                        <?php if( have_rows('cs_coverage_options') ): 
                            while( have_rows('cs_coverage_options') ) : the_row(); ?>
                                <div class="cell small-12 medium-8 c-au-coverage-opt__col">
                                    <div class="c-au-coverage-opt__icon">
                                        <img src="<?php echo get_sub_field('cs_icon'); ?>" alt="">
                                        <h4 class="c-au-coverage-opt__name"><?php echo get_sub_field('cs_title'); ?></h4>
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

<div id="cta-regular" class="o-panel o-panel--cta-regular">
    <div class="c-cta-regular c-cta-regular--au text-center">
        <div class="grid-container">
            <h3 class="c-cta-regular__title u-ls-1-5"><?php echo get_field('cs_cta_title'); ?></h3>
            <?php echo get_field('cs_cta_text'); ?>

            <div class="c-cta-regular__buttons">
                <a class="u-button u-button--red" href="<?php echo get_field('cs_red_button_link'); ?>"><?php echo get_field('cs_red_button_label'); ?></a>
                <a class="u-button u-button--blue" href="<?php echo get_field('cs_blue_button_link'); ?>"><?php echo get_field('cs_blue_button_label'); ?></a>
            </div>
        </div>
    </div>
</div><!-- End Cta Regular Panel -->

<div id="industries" class="o-panel o-panel--industries">
    <div class="c-industries text-center">
        <div class="grid-container">
            <div class="c-industries__text">
                <h1 class="c-industries__title u-ls-2"><?php echo get_field('industries_title'); ?></h1>

                <?php echo get_field('industries_text'); ?>

                <a class="u-button c-industries__button" href="<?php echo get_field('ii_button_link'); ?>">Learn about Industries and Coverages</a>
            </div>
        </div>
    </div>
</div><!-- End Industries Panel -->

<div id="other-products" class="o-panel o-panel--other-products o-panel--other-products--au">
    <div class="c-other-product c-other-product--homeowners text-center">
        <div class="grid-container">
            <h3 class="c-other-product__title u-ls-2"><?php echo get_field('op_title'); ?></h3>

            <div class="grid-x grid-padding-x align-center">
                <?php if( have_rows('other_products') ): 
                    while( have_rows('other_products') ) : the_row(); ?>
                        <div class="cell medium-12 large-6 c-other-product__col">
                            <a class="c-other-product__box c-other-product__box--bu" href="<?php echo get_sub_field('opi_link'); ?>">
                                <div class="c-other-product__icon-box">
                                    <div class="c-other-product__icon">
                                        <img class="c-other-product__img" src="<?php echo get_sub_field('op_normal_icon'); ?>" alt="">
                                        <img class="c-other-product__img-hover" src="<?php echo get_sub_field('op_hover_icon'); ?>" alt="">
                                    </div>
                                    
                                    <h4 class="c-other-product__name text-left"><?php echo get_sub_field('opi_title'); ?></h4>
                                </div>
                            </a>
                        </div><!--/ Other Product Item -->
                    <?php endwhile;
                endif; ?>
            </div>

            <div class="c-other-product__more c-other-product__more--bu">
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
                <a class="u-button u-button--red" href="<?php echo get_field('faq_cta_button_link'); ?>">See all FAQs</a>
            </div>
        </div>
    </div>
</div><!-- End CTA Basic Panel -->

<?php include(TEMPLATEPATH.'/inc/dark-blue-cta.php'); ?>

<?php get_footer(); ?>