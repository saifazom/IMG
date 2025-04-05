
<?php
/*
* Template Name: Employers: Services Page Template 
*/

get_header();

?>

<div id="homeowners-intro" class="o-panel o-panel--homeowners-intro u-margin-top-195">
	<div class="c-homeowners-intro c-homeowners-intro--service">
        <div class="grid-container">
            <div class="grid-x grid-padding-x align-middle">
                <div class="cell medium-11">
                    <div class="c-homeowners-intro__headings">
                        <?php if( get_field('hero_show_back_link') == 'Yes' ) { ?>
                            <h4 class="u-sub-title u-sub-title--red text-left wow wow-visible" data-delay="0.9">
                                <a href="<?php echo get_field('hero_back_link'); ?>"><i class="fas fa-chevron-left"></i> Benefits Insurance</a>
                            </h4>
                        <?php }else { ?> 
                            <h4 class="u-sub-title u-sub-title--red text-left wow wow-visible" data-delay="0.9">Benefits Insurance</h4>
                        <?php } ?>

            			<h1 class="c-homeowners-intro__title u-ls-2 wow wow-visible" data-delay="0.9"><?php echo get_field('hero_title'); ?></h1>

                        <p class=" wow wow-visible" data-delay="0.9"><?php echo get_field('hero_sub_title'); ?></p>

                        <div class="c-homeowners-intro__buttons wow wow-visible" data-delay="0.9">
                            <a class="u-button js-down-btn" href="<?php echo get_field('hero_orange_button_link'); ?>"><?php echo get_field('hero_orange_button_label'); ?></a>
                            <a class="u-button u-button--blue" href="<?php echo get_field('hero_blue_button_link'); ?>"><?php echo get_field('hero_blue_button_label'); ?></a>
                        </div>
                    </div>
                </div><!--/ Intro Headings --> 

                <div class="cell medium-13 c-homeowners-intro__image-col c-homeowners-intro__image-col--empl">
                    <div class="c-homeowners-intro__image u-eadge-top-left u-plain-relative">
                        <img class="u-plain-absolute u-tweenmax-image-hero" src="<?php echo get_field('hero_photo'); ?>" alt="">
						<img class="u-plain-placeholder" src="<?php echo get_field('hero_photo'); ?>" alt=""> 
                    </div>
                </div><!--/ Homeowners Intro Text -->
            </div>
        </div>
	</div>
</div><!-- End Intro Panel -->

<div id="if-services" class="o-panel o-panel--if-service">
    <div class="c-if-service c-if-service--empl">
        <div class="grid-container">
            <div class="c-if-service__top-text c-if-service__top-text--empl text-center">
                <h1 class="c-if-service__title u-ls-2 wow wow-visible"><?php echo get_field('services_title'); ?></h1>
                <div class="wow wow-visible">
                    <?php echo get_field('services_text'); ?>
                </div>
            </div>
            <div class="grid-x c-if-service__grid-x">
                <?php $delay = 0.2; if( have_rows('service_items') ): 
                    while( have_rows('service_items') ) : the_row(); ?>
                        <div class="cell medium-12 large-8 wow wow-visible" data-delay="<?php echo $delay; ?>">
                            <?php $delay = $delay + 0.1; ?>
                            <div class="c-if-service__icon">
                                <div class="c-if-service__img">
                                    <img src="<?php echo get_sub_field('service_i_icon'); ?>" alt="">
                                </div>

                                <div class="c-if-service__text">
                                    <h4 class="c-if-service__name"><?php echo get_sub_field('service_i_title'); ?></h4>
                                    <p><?php echo get_sub_field('service_i_text'); ?></p>
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
                <div class="cell medium-24 large-10">
                    <div class="c-team-section__images c-team-section__images--empl">
                        <div class="c-team-section__img c-team-section__img--empl u-plain-relative">
                            <img class="u-plain-absolute u-tweenmax-image" src="<?php echo get_field('cta_photo'); ?>" alt="">
							<img class="u-plain-placeholder" src="<?php echo get_field('cta_photo'); ?>" alt="">
                        </div>
                    </div>
                </div>

                <div class="cell medium-24 large-14 c-team-section__text-col c-team-section__text-col--empl">
                    <div class="c-team-section__text c-team-section__text--empl">
                        <img class="c-team-section__dots c-team-section__dots--empl wow wow-visible" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/img-dots.png" alt="">

                        <h1 class="c-team-section__title u-ls-2 wow wow-visible"><?php echo get_field('cta_title'); ?></h1>
                        <div class="wow wow-visible">
							<div><?php echo get_field('cta_text'); ?></div>
							<a class="u-button u-button--red c-team-section__button" href="<?php echo get_field('cta_button_link'); ?>">Request a Quote</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- End Team Section Panel -->

<div id="tools-section" class="o-panel o-panel--tools-section">
    <div class="c-tools-section">
        <div class="grid-container">
            <div class="c-tools-section__header">
                <h1 class="c-tools-section__heading u-ls-2 wow wow-visible"><?php echo get_field('tools_title'); ?></h1>
                <p class="wow wow-visible"><?php echo get_field('tools_text'); ?></p>
            </div>

            <div class="grid-x grid-padding-x align-center">
                <?php $delay = 0.2; if( have_rows('tools_items') ): 
                    while( have_rows('tools_items') ) : the_row(); ?>
                        <div class="cell medium-12 large-10 c-tools-section__col wow wow-visible" data-delay="<?php echo $delay; ?>">
                            <?php $delay = $delay + 0.1; ?>
                            <div class="c-tools-section__icon">
                                <img src="<?php echo get_sub_field('tools_icon'); ?>" alt="">
                            </div>

                            <div class="c-tools-section__text">
                                <h4 class="c-tools-section__title u-ls-1"><?php echo get_sub_field('tools_title'); ?></h4>
                                <p><?php echo get_sub_field('tools_text'); ?></p>
                            </div>
                        </div>
                    <?php endwhile;
                endif; ?>
            </div>
        </div>
    </div>
</div><!-- End Tools Section -->

<div id="empl-meet-the-team" class="o-panel o-panel--empl-meet-the-team">
    <div class="c-empl-meet-the-team">
        <div class="grid-container">
            <div class="grid-x grid-padding-x align-middle">
                <div class="cell medium-12">
                    <div class="c-empl-meet-the-team__text">
                        <h1 class="c-empl-meet-the-team__title u-ls-2 wow wow-visible"><?php echo get_field('mt_title'); ?></h1>
						<div class="wow wow-visible">
	                        <p><?php echo get_field('mt_text'); ?></p>
	                        <a class="u-button c-empl-meet-the-team__button" href="<?php echo get_field('mt_button_link'); ?>">Meet the Team</a>
						</div>
                    </div>
                </div>

                <div class="cell medium-12">
                    <div class="c-empl-meet-the-team__img u-plain-relative">
                        <img class="u-plain-absolute u-tweenmax-image" src="<?php echo get_field('mt_photo'); ?>" alt="">
						<img class="u-plain-placeholder" src="<?php echo get_field('mt_photo'); ?>" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- End Meet The Team Panel -->

<?php get_footer(); ?>