
<?php
/*
* Template Name: Client Center Page Template 
*/

get_header();

?>

<div id="tiles" class="o-panel o-panel--tiles u-margin-top-230">
	<div class="c-tiles">
        <div class="grid-container">
            <div class="c-tiles__header text-center">
    			<h1 class="c-tiles__heading u-ls-2 wow wow-visible" data-delay="0.9"><?php echo get_field('tiles_title'); ?></h1>
                <p class="c-tiles__sub-title wow wow-visible" data-delay="0.9"><?php echo get_field('tiles_sub_title'); ?></p>
            
                <h3 class="c-tiles__btm-title wow wow-visible" data-delay="0.9"><?php echo get_field('tiles_cta'); ?></h3>
            </div><!--/ About Text -->

            <?php $delay = 0.2; if( have_rows('tiles_items') ): $count = 1; ?>
                <?php while( have_rows('tiles_items') ) : the_row(); ?>
                    <?php if ($count == 1) { ?>
                        <div class="grid-x grid-padding-x c-tiles__grid-x">
                            <?php if( get_sub_field('title_show_photo') == 'Yes' ) { ?>
                                <div class="cell medium-24 large-12 c-tiles__image-box wow wow-visible" data-delay="0.9" style="background-image: url(<?php echo get_sub_field('title_photo'); ?>);">
                                    <div class="c-tiles__img">
                                        <img src="<?php echo get_sub_field('title_photo'); ?>" alt="">
                                    </div>
                                </div><!--/ Image -->

                                <div class="cell medium-24 large-12 c-tiles__text-box wow wow-visible" data-delay="0.9">
                                    <div class="c-tiles__text c-tiles__text--top">
                                        <h4 class="c-tiles__title">
                                            <?php if( get_sub_field('title_logo') == 'Title' ) { ?>
                                                <?php echo get_sub_field('tiles_item_title'); ?>
                                            <?php }else{ ?>
                                                <img src="<?php echo get_sub_field('tiles_logo'); ?>" alt="">
                                            <?php } ?>
                                        </h4>

                                        <div class="c-tiles__buttons">
                                            <a class="u-button u-button--blue" href="<?php echo get_sub_field('blue_button_link'); ?>" target="_blank">Log in</a>
                                            <a class="u-button" href="<?php echo get_sub_field('orange_button_link'); ?>">Request Access</a>
                                        </div>

                                        <p><?php echo get_sub_field('tiles_text'); ?></p>
                                    </div>
                                </div>
                            <?php }else{ ?>
                                <div class="cell medium-24 c-tiles__text-box wow wow-visible" data-delay="0.9">
                                    <div class="c-tiles__text c-tiles__text--top">
                                        <h4 class="c-tiles__title">
                                            <?php if( get_sub_field('title_logo') == 'Title' ) { ?>
                                                <?php echo get_sub_field('tiles_item_title'); ?>
                                            <?php }else{ ?>
                                                <img src="<?php echo get_sub_field('tiles_logo'); ?>" alt="">
                                            <?php } ?>
                                        </h4>

                                        <div class="c-tiles__buttons">
                                            <a class="u-button u-button--blue" href="<?php echo get_sub_field('blue_button_link'); ?>" target="_blank">Log in</a>
                                            <a class="u-button" href="<?php echo get_sub_field('orange_button_link'); ?>">Request Access</a>
                                        </div>

                                        <p><?php echo get_sub_field('tiles_text'); ?></p>
                                    </div>
                                </div>
                            <?php } ?>
                        </div><!--/ Starting Section -->
                        
                        <div class="grid-x grid-padding-x align-center">
                    <?php }else{ ?>
                            <div class="cell medium-12 large-8 c-tiles__col wow wow-visible" data-delay="<?php echo $delay; ?>">
                                <?php $delay = $delay + 0.1; ?>
                                <div class="c-tiles__text ">
                                    <h4 class="c-tiles__title">
                                        <?php if( get_sub_field('title_logo') == 'Title' ) { ?>
                                            <?php echo get_sub_field('tiles_item_title'); ?>
                                        <?php }else{ ?>
                                            <img src="<?php echo get_sub_field('tiles_logo'); ?>" alt="">
                                        <?php } ?>
                                    </h4>
                                    <div class="c-tiles__col-buttons">
                                        <a class="u-button u-button--blue" href="<?php echo get_sub_field('blue_button_link'); ?>" target="_blank">Log in</a>
                                        <!-- <a class="u-button" href="<?php echo get_sub_field('orange_button_link'); ?>">Request Access</a> -->
                                    </div>

                                    <p><?php echo get_sub_field('tiles_text'); ?></p>
                                </div>
                            </div><!--/ Client Center Col -->
                <?php } $count++; endwhile; ?>
                        </div><!--/ Tiles Columns -->
            <?php endif; ?>
        </div>
    </div>

    <div class="c-tiles-cta">
        <div class="grid-container">
            <div class="grid-x grid-padding-x align-center align-middle">
                <div class="cell small-24 medium-shrink">
                    <h1 class="c-tiles-cta__title wow wow-visible"><?php echo get_field('cs_cta_title'); ?></h1>
                </div>
                <div class="cell small-24 medium-auto c-tiles-cta__text wow wow-visible">
                    <p><?php echo get_field('cs_cta_text'); ?></p>
                </div>
                <div class="cell small-24 medium-shrink c-tiles-cta__button wow wow-visible">
                    <a class="u-button u-button--red" href="<?php echo get_field('cs_button_link'); ?>" target="_blank">Log in</a>
                </div>
            </div><!--/ CTA -->
        </div>
	</div>
</div><!-- End About Us Panel -->

<?php include(TEMPLATEPATH.'/inc/dark-blue-cta.php'); ?>

<?php get_footer(); ?>