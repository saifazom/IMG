<?php if ( is_home() ) { ?>
    <div id="cta" class="o-panel o-panel--cta">
        <div class="c-cta">
            <div class="grid-container">
                <div class="c-cta__header wow wow-visible">
                    <h2><?php echo get_field('cta_1_heading', $homepage_id); ?></h2>
                </div><!--/ CTA Header -->

                <?php if( have_rows('cta_1_items', $homepage_id) ): $count = 1; $delay = 0.5; ?>
                    <div class="grid-x grid-padding-x align-center c-cta__grid">
                        <?php while( have_rows('cta_1_items', $homepage_id) ) : the_row(); ?>
                            <div class="cell small-24 medium-8 large-8 wow wow-visible" data-delay="<?php echo $delay; ?>">
								<?php $delay = $delay + 0.3; ?>
                                <?php if ($count == 3) { ?>
                                    <a class="c-cta__box" href="<?php bloginfo('url'); ?>/request-a-quote">
                                        <div class="c-cta__icon">
                                            <img src="<?php echo get_sub_field('cta_1_icon', $homepage_id); ?>" alt="">
                                        </div>

                                        <h3 class="c-cta__title"><?php echo get_sub_field('cta_1_title', $homepage_id); ?></h3>
                                        <p><?php echo get_sub_field('cta_1_text', $homepage_id); ?></p>
                                    </a>
                                <?php }else { ?> 
                                    <div class="c-cta__box">
                                        <div class="c-cta__icon">
                                            <img src="<?php echo get_sub_field('cta_1_icon', $homepage_id); ?>" alt="">
                                        </div>

                                        <h3 class="c-cta__title"><?php echo get_sub_field('cta_1_title', $homepage_id); ?></h3>
                                        <p><?php echo get_sub_field('cta_1_text', $homepage_id); ?></p>
                                    </div>
                                <?php } ?>
                            </div><!--/ CTA Column -->
                        <?php $count++; endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div><!-- End CTA Panel -->
<?php }else{ ?>
    <div id="cta" class="o-panel o-panel--cta o-panel--cta-footer" style="margin-top: 25px;">
        <div class="c-cta" style="padding-bottom: 0;">
            <div class="grid-container">
                <div class="c-cta__header wow wow-visible">
                    <h2><?php echo get_field('cta_1_heading'); ?></h2>
                </div><!--/ CTA Header -->

                <?php $delay = 0.5; if( have_rows('cta_1_items') ): $count = 1; ?>
                    <div class="grid-x grid-padding-x align-center c-cta__grid">
                        <?php while( have_rows('cta_1_items') ) : the_row(); ?>
                            <div class="cell small-24 medium-8 large-8 wow wow-visible" data-delay="<?php echo $delay; ?>">
								<?php $delay = $delay + 0.2; ?>
                                <?php if ($count == 3) { ?>
                                    <a class="c-cta__box" href="<?php bloginfo('url'); ?>/request-a-quote">
                                        <div class="c-cta__icon">
                                            <img src="<?php echo get_sub_field('cta_1_icon'); ?>" alt="">
                                        </div>

                                        <h3 class="c-cta__title"><?php echo get_sub_field('cta_1_title'); ?></h3>
                                        <p><?php echo get_sub_field('cta_1_text'); ?></p>
                                    </a>
                                <?php }else { ?> 
                                    <div class="c-cta__box">
                                        <div class="c-cta__icon">
                                            <img src="<?php echo get_sub_field('cta_1_icon'); ?>" alt="">
                                        </div>

                                        <h3 class="c-cta__title"><?php echo get_sub_field('cta_1_title'); ?></h3>
                                        <p><?php echo get_sub_field('cta_1_text'); ?></p>
                                    </div>
                                <?php } ?>
                            </div><!--/ CTA Column -->
                        <?php $count++; endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div><!-- End CTA Panel -->
<?php } ?>