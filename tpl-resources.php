
<?php
/*
* Template Name: Resources Page Template 
*/

get_header();

    if(is_tax('our-team-category')){
        $current_term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
        $current_term_id = $current_term->term_id;
    }else{
        $current_term_id = '';
    }
?>

<div id="resources-hero" class="o-panel o-panel--resources-hero u-margin-top-230">
    <div class="c-resources-hero">
        <div class="grid-container">
            <div class="grid-x grid-padding-x">
                <div class="cell medium-8">
                    <div class="c-resources-hero__text">
                        <h2 class="c-resources-hero__heading wow wow-visible" data-delay="0.9"><?php echo get_field('rh_title'); ?></h2>
                        <p class="wow wow-visible" data-delay="0.9"><?php echo get_field('rh_text'); ?></p>
                    </div>
                </div>
                <div class="cell medium-16">
                    <div class="c-resources-hero__columns wow wow-visible" data-delay="0.9">
                        <?php if(have_rows('resources_big_buttons')) : 
                            while(have_rows('resources_big_buttons')) : the_row(); ?>
                                <a class="c-resources-hero__box" href="<?php echo get_sub_field('big_b_link'); ?>">
                                    <div class="c-resources-hero__box-inner">
                                        <div>
                                            <img src="<?php echo get_sub_field('big_b_icon'); ?>" alt="" />
                                            <h3 class="c-resources-hero__title"><?php echo get_sub_field('big_b_title'); ?></h3>
                                        </div>
                                    </div>
                                </a>
                            <?php endwhile; 
                        endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- Resources Hero -->

<div id="resources-video" class="o-panel o-panel--resources-video">
    <span class="u-eadge--top-left"></span>
	<div class="c-resources-video">
        <div class="grid-container">
            <div class="c-resources-video__header text-center">
    			<h2 class="c-resources-video__heading u-ls-2 wow wow-visible"><?php echo get_field('res_title'); ?></h2>
                <?php if(get_field('res_sub_title')){ ?>
                    <p class="hide-for-small-only wow wow-visible"><?php echo get_field('res_sub_title'); ?></p>
                <?php } ?>
            </div><!--/ Header Text -->

            <div id="resource-categories" class="c-blog__categories c-blog__categories--video wow wow-visible">
                <?php if(have_rows('category_listing')) : ?>
                    <ul>
                        <li class="active"><a href="#" data-target="all">All</a></li>
                        <?php while(have_rows('category_listing')) : the_row(); ?>
							<?php 
								$resource_category = get_sub_field('cl_category_name');
								$resource_category = title_to_slug($resource_category);
							?>
                            <li><a href="#" data-target="<?php echo $resource_category; ?>"><?php echo get_sub_field('cl_category_name'); ?></a></li>
                        <?php endwhile; ?>
                    </ul>
                <?php endif; ?>
            </div><!--/ Blog Categories Link -->

            <div class="c-resources-video__slider-wrap">
				<?php //$total_videos = count(get_field('video_slider')); ?>
                <div class="grid-x c-resources-video__grid-x" id="resources-contents">
                    <?php $delay = 0.2; if( have_rows('video_slider') ): $count = 1;
                        while( have_rows('video_slider') ) : the_row(); ?>
							<?php 
								$resource_category = get_sub_field('category_name');
								$resource_category = title_to_slug($resource_category);
							?>
                            <div class="cell medium-8 c-resources-video__item wow wow-visible <?php echo $resource_category; ?>" data-delay="<?php echo $delay; ?>">
                                <?php $delay = $delay + 0.1; ?>
                                <div class="c-resources-video__content">
                                    <a class="c-resources-video__thumb" href="<?php echo get_sub_field('video_embed_code'); ?>" data-lity>
                                        <img src="<?php echo get_sub_field('video_thumbnail'); ?>" alt="">
                                        
                                        <span class="c-resources-video__play-btn">
                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/play-btn.png" alt="">
                                        </span><!--/ Play Button -->
                                    </a>
                                    <div class="reveal" id="video-<?php echo $count; ?>" data-reveal data-close-on-click="true" data-animation-in="fade-in" data-animation-out="fade-out">
                                        <div class="c-resources-video__video">
                                            <?php echo get_sub_field('video_embed_code'); ?>
                                        </div>
                                    </div>
                                    <div class="c-resources-video__text">
                                        <h4 class="c-resources-video__title"><?php echo get_sub_field('video_title'); ?></h4>
                                        <p><?php echo get_sub_field('viideo_description'); ?></p>
                                    </div>
                                </div>
                            </div><!--/ Video -->
                        <?php $count++; endwhile; 
                    endif; ?>
                </div><!--/ Video Slider -->
            </div><!--/ Slider Wrap -->
        </div>
    </div>

    <div class="c-resources-cta">
        <div class="grid-container">
            <div class="c-resources-cta__text text-center wow wow-visible">
                <h3 class="c-resources-cta__title u-ls-1"><?php echo get_field('cta_title'); ?></h3>
                <a class="u-button c-resources-cta__button" href="<?php echo get_field('cta_button_link'); ?>">Check out our Client Center</a>
            </div>
        </div>
	</div>
</div><!-- End About Us Panel -->

<?php get_footer(); ?>