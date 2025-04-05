<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

global $post;

?>
<?php if(get_field('hero_sub_title')): ?>
	<div id="homeowners-intro" class="o-panel o-panel--homeowners-intro u-margin-top-195">
	    <div class="c-homeowners-intro">
	        <div class="grid-container">
	            <div class="grid-x grid-padding-x align-middle">
	                <div class="cell medium-10">
	                    <div class="c-homeowners-intro__headings">
	                        <h4 class="u-sub-title u-sub-title--red text-left wow wow-visible" data-delay="0.9">
	                            <a href="<?php echo get_field('hero_back_link'); ?>"><i class="fas fa-chevron-left"></i> BENEFITS INSURANCE</a>
	                        </h4>
	                        <h1 class="c-homeowners-intro__title u-ls-2 wow wow-visible" data-delay="0.9"><?php echo get_field('hero_title'); ?></h1>

							<div class="wow wow-visible" data-delay="0.9">
	                        <p><?php echo get_field('hero_sub_title'); ?></p>
	                        <a class="u-button js-down-btn" href="<?php echo get_field('hero_button_link'); ?>">Learn More </a>
							</div>
	                    </div>
	                </div><!--/ Intro Headings --> 

	                <div class="cell medium-14 c-homeowners-intro__image-col">
	                    <div class="c-homeowners-intro__image u-eadge-top-left u-plain-relative">
	                        <img class="u-plain-absolute u-tweenmax-image-hero u-flexible-image-height" src="<?php echo get_field('hero_photo'); ?>" alt="">
							<img class="u-plain-placeholder" src="<?php echo get_field('hero_photo'); ?>" alt="">
	                    </div>
	                </div><!--/ Homeowners Intro Text -->
	            </div>
	        </div>
	    </div>
	</div><!-- End Intro Panel -->

	<div class="u-gt-red-bar">
	    <?php include(TEMPLATEPATH.'/inc/get-in-touch.php'); ?>
	</div>

	<div id="benefits-coverage-opt" class="o-panel o-panel--benefits-coverage-opt">
	    <div class="c-benefits-coverage-opt">
	        <div class="grid-container">
	            <div class="c-benefits-coverage-opt__header text-center">
	                <h1 class="c-benefits-coverage-opt__title u-ls-2 wow wow-visible"><?php echo get_field('cvrg_heading'); ?></h1>
	                <p class="wow wow-visible"><?php echo get_field('cvrg_sub_heading'); ?></p>
	            </div><!--/ Header -->

	            <div class="c-benefits-coverage-opt__options">
	                <div class="c-benefits-coverage-opt__text">
	                    <h1 class="c-benefits-coverage-opt__title u-ls-2  wow wow-visible"><?php echo get_field('left_col_title'); ?></h1>
	                </div><!--/ Text -->

	                <div class="c-benefits-coverage-opt__items">
	                    <div class="grid-x c-benefits-coverage-opt__grid-x">
	                        <?php $delay = 0.2; if( have_rows('coverage_items') ): 
	                            while( have_rows('coverage_items') ) : the_row(); ?>
	                                <div class="cell small-12 medium-6 c-benefits-coverage-opt__col  wow wow-visible" data-delay="<?php echo $delay; ?>">
	                                	<?php $delay = $delay + 0.1; ?>
	                                    <!-- <a class="c-benefits-coverage-opt__icon" href="<?php echo get_sub_field('ci_link'); ?>"> -->
										<div class="c-benefits-coverage-opt__icon">
	                                        <img src="<?php echo get_sub_field('ci_icon'); ?>" alt="">
	                                        <h4 class="c-benefits-coverage-opt__name"><?php echo get_sub_field('ci_title'); ?></h4>
	                                        <p><?php echo get_sub_field('ci_text'); ?></p>
										</div>
	                                    <!-- </a> -->
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
	    <div class="c-cta-regular c-cta-regular--benefits text-center">
	        <div class="grid-container">
	            <h3 class="c-cta-regular__title u-ls-1-5  wow wow-visible"><?php echo get_field('cta_title'); ?></h3>
	            <div class="wow wow-visible">
	            	<?php echo get_field('cta_text'); ?>
	            </div>

	            <div class="c-cta-regular__buttons wow wow-visible">
	                <a class="u-button" href="<?php echo get_field('cta_orange_button_link'); ?>"><?php echo get_field('cta_orange_button_label'); ?></a>
	                <a class="u-button u-button--blue" href="<?php echo get_field('cta_blue_button_link'); ?>"><?php echo get_field('cta_blue_button_label'); ?></a>
	            </div>
	        </div>
	    </div>
	</div><!-- End Cta Regular Panel -->

	<div id="industries" class="o-panel o-panel--industries">
	    <div class="c-industries c-industries--benefits text-center">
	        <div class="grid-container">
	            <div class="c-industries__text">
	                <h1 class="c-industries__title u-ls-2 wow wow-visible"><?php echo get_field('ju_title'); ?></h1>
	                
	                <div class="wow wow-visible">
		                <?php echo get_field('ju_text'); ?>
		            </div>
	            </div>
	        </div>
	    </div>
	</div><!-- End Industries Panel -->

	<div id="other-products" class="o-panel o-panel--other-products o-panel--other-products--au">
	    <div class="c-other-product c-other-product--homeowners text-center">
	        <div class="grid-container">
	            <h3 class="c-other-product__title u-ls-2  wow wow-visible"><?php echo get_field('op_title'); ?></h3>

	            <div class="grid-x grid-padding-x align-center">
	                <?php $delay = 0.2; if( have_rows('other_products') ): 
	                    while( have_rows('other_products') ) : the_row(); ?>
	                        <div class="cell medium-12 large-6 c-other-product__col wow wow-visible" data-delay="<?php echo $delay; ?>">
	                        	<?php $delay = $delay + 0.1; ?>
	                            <div class="c-other-product__box c-other-product__box--empl">
									<a class="" href="<?php echo get_the_permalink(get_sub_field('op_link')); ?>">
		                                <div class="c-other-product__icon-box">
		                                    <div class="c-other-product__icon">
		                                        <img class="c-other-product__img" src="<?php echo get_sub_field('op_normal_icon'); ?>" alt="">
		                                        <img class="c-other-product__img-hover" src="<?php echo get_sub_field('op_hover_icon'); ?>" alt="">
		                                    </div>
		                                    <h4 class="c-other-product__name text-left"><?php echo get_sub_field('op_name'); ?></h4>
		                                </div>
									</a>
	                            </div>
	                        </div><!--/ Other Product Item -->
	                    <?php endwhile;
	                endif; ?>
	            </div>

	            <div class="c-other-product__more c-other-product__more--empl wow wow-visible">
	                <a href="<?php echo get_field('op_more_link'); ?>"><?php echo get_field('op_more_label'); ?></a>
	            </div>
	        </div>
	    </div>
	</div><!-- End Other Products Panel -->

	<?php include(TEMPLATEPATH.'/inc/faq.php'); ?>

	<div id="cta-basic" class="o-panel o-panel--cta-basic">
		<div class="c-cta-basic" style="padding-bottom: 0;">

		</div>
	</div><!-- End CTA Basic Panel -->

	<?php include(TEMPLATEPATH.'/inc/dark-blue-cta.php'); ?>
<?php else : ?>
	<div id="page" class="o-panel o-panel--page u-margin-top-230">
		<div class="c-page">
			<div class="grid-container">
				<div class="c-page__content text-center wow wow-visible">
					<h2 class="text-center u-ls-2">No content has been added yet</h2>
					<p class="u-sub-title"><br/><a href="<?php bloginfo('url'); ?>/wp-admin/edit.php?post_type=benefits-products"><i class="fas fa-chevron-left"></i> Add Some Content</a></p>
				</div>
			</div>
		</div>
	</div><!-- End Page Panel -->
<?php endif; ?>

<?php get_footer();