
<?php
/*
* Template Name: Our Approach Page Template 
*/

get_header();

?>

<div id="homeowners-intro" class="o-panel o-panel--homeowners-intro u-margin-top-195">
    <div class="c-homeowners-intro c-homeowners-intro--approach">
        <div class="grid-container">
            <div class="grid-x grid-padding-x align-middle">
                <div class="cell medium-10">
                    <div class="c-homeowners-intro__headings">
                        <?php if( get_field('hero_show_back_link') == 'Yes' ) { ?>
                            <h4 class="u-sub-title u-sub-title--orange text-left wow wow-visible" data-delay="0.9">
                                <a href="<?php echo get_field('hero_back_link'); ?>"><i class="fas fa-chevron-left"></i> COMMERCIAL INSURANCE</a>
                            </h4>
                        <?php }else { ?>
                            <h4 class="u-sub-title u-sub-title--orange text-left wow wow-visible" data-delay="0.9">COMMERCIAL INSURANCE</h4>
                        <?php } ?>

                        <h1 class="c-homeowners-intro__title u-ls-2 wow wow-visible" data-delay="0.9"><?php echo get_field('hero_title'); ?></h1>

                        <p class="wow wow-visible" data-delay="0.9"><?php echo get_field('hero_sub_title'); ?></p>

                        <div class="c-homeowners-intro__buttons c-homeowners-intro__buttons--approach wow wow-visible" data-delay="0.9">
                            <a class="u-button u-button--blue" href="<?php echo get_field('hero_blue_button_link'); ?>"><?php echo get_field('hero_blue_button_label'); ?></a>
                            <a class="u-button u-button--red js-down-btn" href="<?php echo get_field('hero_red_button_link'); ?>"><?php echo get_field('hero_red_button_label'); ?></a>
                        </div>
                    </div>
                </div><!--/ Intro Headings --> 

                <div class="cell medium-14 c-homeowners-intro__image-col c-homeowners-intro__image-col--empl">
                    <div class="c-homeowners-intro__image u-eadge-top-left u-plain-relative">
                        <img class="u-plain-absolute u-tweenmax-image-hero" src="<?php echo get_field('hero_photo'); ?>" alt="">
						<img class="u-plain-placeholder" src="<?php echo get_field('hero_photo'); ?>" alt="">
                    </div>
                </div><!--/ Homeowners Intro Text -->
            </div>
        </div>
    </div>
</div><!-- End Hero Panel -->

<div id="approach-intro" class="o-panel o-panel--approach-intro">
    <div class="c-approach-intro">
        <div class="grid-container">
            <div class="c-approach-intro__text">
                <h1 class="c-approach-intro__title u-ls-2 wow wow-visible"><?php echo get_field('intro_title'); ?></h1>
                <div class="wow wow-visible">
                    <?php echo get_field('intro_text'); ?>
                </div>
            </div>
        </div>
    </div>
    <span class="u-eadge--btm"></span>
</div><!-- End Intro Panel -->

<div id="help-clients" class="o-panel o-panel--help-clients">
    <div class="c-help-clients">
        <div class="grid-container">
            <div class="c-help-clients-header">
                <h1 class="c-help-clients-header__title u-ls-2 wow wow-visible"><?php echo get_field('ch_title'); ?></h1>

                <div class="c-help-clients-header__text">
                    <h3 class="wow wow-visible"><?php echo get_field('ch_sub_title'); ?></h3>
                    <p class="wow wow-visible"><?php echo get_field('ch_text'); ?></p>
                </div>
            </div><!--/ Text -->

            <div class="grid-x grid-padding-x c-help-clients__grids">
                <?php $delay = 0.2; if( have_rows('ch_steps') ): 
                    while( have_rows('ch_steps') ) : the_row(); ?>
                        <div class="cell medium-12 wow wow-visible" data-delay="<?php echo $delay; ?>">
                            <?php $delay = $delay + 0.1; ?>
                            <div class="c-help-clients__icon">
                                <div class="c-help-clients__img">
                                    <img src="<?php echo get_sub_field('chs_icon'); ?>" alt="">
                                </div>
                                
                                <div class="c-help-clients__text">
                                    <h4 class="c-help-clients__name"><?php echo get_sub_field('chs_title'); ?></h4>
                                    <?php echo get_sub_field('chs_text'); ?>
                                </div>
                            </div>
                        </div><!--/ Steps Item -->
                    <?php endwhile;
                endif; ?>
            </div>
        </div><!--/ Coverage Options -->

        <div class="c-help-clients-cta">
            <h3 class="c-help-clients-cta__title wow wow-visible"><?php echo get_field('ch_cta_title'); ?></h3>
            <p class="wow wow-visible"><?php echo get_field('ch_cta_sub_title'); ?></p>

            <div class="c-help-clients-cta__buttons wow wow-visible">
                <a class="u-button u-button--red" href="<?php echo get_field('ch_red_button_link'); ?>"><?php echo get_field('ch_red_button_label'); ?></a>
                <a class="u-button u-button--blue js-down-btn" href="<?php echo get_field('ch_blue_button_link'); ?>"><?php echo get_field('ch_blue_button_label'); ?></a>
            </div>
        </div>
    </div>
</div><!--/ Steps Panel -->

<div id="value-adds" class="o-panel o-panel--value-adds">
    <div class="c-value-adds">
        <div class="grid-container">
            <?php if( have_rows('value_adds_items') ): 
                while( have_rows('value_adds_items') ) : the_row(); ?>
                    <div class="grid-x grid-padding-x align-middle c-value-adds__item">
                        <div class="cell medium-12 c-value-adds__image-col">
                            <div class="c-value-adds__img u-plain-relative">
                                <img class="u-plain-absolute u-tweenmax-image" src="<?php echo get_sub_field('va_photo'); ?>">
								<img class="u-plain-placeholder" src="<?php echo get_sub_field('va_photo'); ?>">
                            </div>
                        </div><!--/ Image -->

                        <div class="cell medium-12 wow wow-visible">
                            <div class="c-value-adds__text">
                                <h1 class="c-value-adds__title"><?php echo get_sub_field('va_title'); ?></h1>
                                <p><?php echo get_sub_field('va_text'); ?></p>
                            </div>
                        </div>
                    </div><!--/ Value Adds Item -->
                <?php endwhile;
            endif; ?>
        </div>
    </div>
</div><!--/ Value Adds Panel -->

<div id="cta-regular" class="o-panel o-panel--cta-regular">
    <div class="c-cta-regular c-cta-regular--approach text-center">
        <div class="grid-container">
            <h3 class="c-cta-regular__title u-ls-1-5 wow wow-visible"><?php echo get_field('cs_cta_title'); ?></h3>

            <p class="wow wow-visible"><?php echo get_field('cs_cta_text'); ?>

            <div class="c-cta-regular__buttons c-cta-regular__buttons--approach wow wow-visible">
                <a class="u-button" href="<?php echo get_field('cs_orange_button_link'); ?>"><?php echo get_field('cs_orange_button_label'); ?></a>
                <a class="u-button u-button--red" href="<?php echo get_field('cs_red_button_link'); ?>"><?php echo get_field('cs_red_button_label'); ?></a>
            </div>
        </div>
    </div>
</div><!-- End Cta Regular Panel -->

<?php include(TEMPLATEPATH.'/inc/dark-blue-cta.php'); ?>

<?php get_footer(); ?>