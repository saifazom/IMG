
<?php
/*
* Template Name: Manufacturing Page Template 
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
                            <h4 class="u-sub-title u-sub-title--orange text-left">
                                <a href="<?php echo get_field('hero_back_link'); ?>"><i class="fas fa-chevron-left"></i> COMMERCIAL INSURANCE</a>
                            </h4>
                        <?php }else { ?> 
                            <h4 class="u-sub-title u-sub-title--orange text-left">COMMERCIAL INSURANCE</h4>
                        <?php } ?>

                        <h1 class="c-homeowners-intro__title u-ls-2"><?php echo get_field('hero_title'); ?></h1>

                        <p><?php echo get_field('hero_sub_title'); ?></p>

                        <a class="u-button u-button--blue js-down-btn" href="<?php echo get_field('hero_button_link'); ?>">Learn More </a>
                    </div>
                </div><!--/ Intro Headings --> 

                <div class="cell medium-14 c-homeowners-intro__image-col">
                    <div class="c-homeowners-intro__image u-eadge-top-left">
                        <img src="<?php echo get_field('hero_photo'); ?>" alt="">
                    </div>
                </div><!--/ Homeowners Intro Text -->
            </div>
            <div class="c-homeowners-intro__btm-text c-homeowners-intro__btm-text--services">
                <?php echo get_field('intro_text'); ?>
            </div>
        </div>
    </div>
</div><!-- End Intro Panel -->

<div id="au-coverage-opt" class="o-panel o-panel--au-coverage-opt">
    <div class="c-au-coverage-opt c-au-coverage-opt--manufacturing">
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
                                    <a class="c-au-coverage-opt__icon" href="<?php echo get_sub_field('cs_link'); ?>">
                                        <img src="<?php echo get_sub_field('cs_icon'); ?>" alt="">
                                        <h4 class="c-au-coverage-opt__name"><?php echo get_sub_field('cs_title'); ?></h4>
                                    </a>
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

            <div class="c-cta-regular__buttons">
                <a class="u-button u-button--red" href="<?php echo get_field('cs_red_button_link'); ?>">Request a Quote</a>
            </div>
        </div>
    </div>
</div><!-- End Cta Regular Panel -->

<div id="testimonials" class="o-panel o-panel--testimonials">
    <span class="u-eadge--top u-eadge--gray"></span>

    <div class="c-testimonials">
        <?php include(TEMPLATEPATH.'/inc/testimonials.php'); ?>
    </div>
</div><!-- End Testimonials Panel -->

<?php get_footer(); ?>