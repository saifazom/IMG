<div id="get-in-touch" class="o-panel o-panel--get-in-touch">
    <div class="c-get-in-touch">
        <div class="grid-container">
            <div class="c-get-in-touch__blue-bar c-gt-blue-bar wow wow-visible">
                <div class="grid-x grid-padding-x align-middle">
                    <div class="cell medium-24 large-8">
                        <h2 class="c-gt-blue-bar__title" data-delay="0.2"><?php echo get_field('gt_title'); ?></h2>
                    </div>

                    <?php $delay = 0.4; if( have_rows('gt_options') ): 
                       $count = 1; while( have_rows('gt_options') ) : the_row(); ?>
                        <a class="cell medium-12 large-<?php if($count == 1){ echo('9'); }else{ echo('7'); } ?> c-gt-blue-bar__text-col" data-delay="<?php echo $delay; ?>" href="<?php echo get_sub_field('gt_link'); ?>">
                            <?php $delay = $delay + 0.1; ?>
                            <div class="c-gt-blue-bar__icon">
                                <img src="<?php echo get_sub_field('gt_icon'); ?>" alt="">
                            </div>
                            
                            <div class="c-gt-blue-bar__text">
                                <strong><?php echo get_sub_field('gt_title'); ?></strong>

                                <?php if( get_sub_field('gt_show_text_box') == 'Yes' ) { ?>
                                    <?php echo get_sub_field('gt_text'); ?>
                                <?php } ?>
                            </div>
                        </a>
                        <?php $count++; endwhile; 
                    endif; ?>
                </div>
            </div>
        
            <div class="c-get-in-touch__intro c-gt-intro c-gt-intro--benefits">
                <h1 class="c-gt-intro__title u-ls-2 wow wow-visible"><?php echo get_field('intro_title'); ?></h1>

                <div class="wow wow-visible">
                    <?php echo get_field('intro_text'); ?>
                </div>
            </div>
        </div>
    </div>
    <span class="u-eadge--btm"></span>
</div><!-- End Get in Touch Panel -->