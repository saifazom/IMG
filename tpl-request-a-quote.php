
<?php
/*
* Template Name: Request a Quote Page Template 
*/

get_header();

?>

<div id="rq-intro" class="o-panel o-panel--rq-intro u-margin-top-230">
	<div class="c-rq-intro">
        <div class="grid-container">
            <div class="c-rq-intro__header">
    			<h1 class="c-rq-intro__heading u-ls-2 wow wow-visible" data-delay="0.2"><?php echo get_field('rq_title'); ?></h1>
                <p class="wow wow-visible" data-delay="0.4"><?php echo get_field('rq_sub_title'); ?></p>
            </div><!--/ Intro Text -->

            <div class="c-rq-options">
                <div class="grid-x grid-padding-x align-center text-center">
                    <?php $delay = 0.6; if( have_rows('rq_options') ): $count = 1;
                        while( have_rows('rq_options') ) : the_row(); ?>
                            <div class="cell medium-12 large-6 c-rq-options__item wow wow-visible" data-delay="<?php echo $delay; ?>">
                                <?php $delay = $delay + 0.1; ?>
                                <a class="c-rq-options__box" href="<?php echo get_sub_field('rq_link'); ?>">
                                    <div class="c-rq-options__icon">
                                        <?php if (get_sub_field('rq_normal_icon')) { ?>
                                            <img class="c-rq-options__normal-icon" src="<?php echo get_sub_field('rq_normal_icon'); ?>" alt="">
                                            <img class="c-rq-options__hover-icon" src="<?php echo get_sub_field('rq_hover_icon'); ?>" alt="">
                                        <?php }else { ?>
                                            <div class="c-contact-cta__icon">
                                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/placeholder-image.png" alt="">
                                            </div>
                                        <?php } ?>
                                        <h3 class="c-rq-options__title"><?php echo get_sub_field('rq_title'); ?></h3>
                                        <p><?php echo get_sub_field('rq_sub_title'); ?></p>
                                    </div>
                                </a>
                            </div><!--/ Option Item -->
                        <?php $count++; endwhile; 
                    endif; ?>
                </div>
            </div>
        </div>
    </div>
</div><!-- End About Us Panel -->

<?php get_footer(); ?>