<div id="faqs" class="o-panel o-panel--faqs">
    <div class="c-faqs">
        <div class="grid-container">
            <div class="c-faqs__header js-accordion__header">
                <h4 class="u-sub-title u-sub-title--white wow wow-visible"><?php echo get_field('faq_sub_title'); ?></h4>
                <h2 class="c-faqs__title wow wow-visible"><?php echo get_field('faq_title'); ?></h2>

                <?php if( get_field('faq_show_text') == 'Yes' ) { ?>
					<div class="wow wow-visible"><?php echo get_field('faq_text'); ?></div>
				<?php } ?> 
            </div>

            <div class="c-faqs-accordion js-accordion wow wow-visible">
            	<?php if( have_rows('faqs') ): 
                    $count = 1; while( have_rows('faqs') ) : the_row(); ?>
		                <div class="c-faqs-accordion__section js-accordion__section <?php if($count == 1){ echo('active'); } ?>">
		                    <div class="c-faqs-accordion__header js-accordion__header"><?php echo get_sub_field('question'); ?> <i class="icon"></i></div>

		                    <div class="c-faqs-accordion__content js-accordion__content">
		                        <?php echo get_sub_field('answer'); ?>
		                    </div>
		                </div><!-- End FAQ Item -->
		            <?php $count++; endwhile; 
		        endif; ?>
            </div><!-- End Module Accordion -->
        </div>
    </div>
</div><!-- End FAQs Panel -->

