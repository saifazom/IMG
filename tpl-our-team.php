<?php
/*
 * Template Name: Our Team Page Template
 */

get_header();

//$url = bloginfo('url') . 'page/2/';

if (is_tax('our-team-category')) {
  $current_term = get_term_by(
    'slug',
    get_query_var('term'),
    get_query_var('taxonomy')
  );
  $current_term_id = $current_term->term_id;
  $pagination = get_next_posts_page_link();
} else {
  $current_term_id = '';
  //$pagination = $url;
  $pagination = 'http://r1creativedev.net/project887/about-us/our-team/page/2/';
}

    global $wp_query;
    $default_posts_per_page = get_option('posts_per_page');
    $post_count = $wp_query->post_count;
?>
<div id="intro" class="o-panel o-panel--intro u-margin-top-230">
	<div class="c-intro">
        <div class="grid-container">
            <div class="grid-x grid-padding-x">
                <div class="cell medium-9">
                    <div class="c-intro__headings">
                        <h4 class="u-sub-title u-sub-title--orange text-left wow wow-visible" data-delay="0.4"><span>Get to know IMG</span></h4>
            			<h1 class="c-intro__title u-ls-2 wow wow-visible" data-delay="0.4"><?php echo get_field( 'intro_title' ); ?></h1>
                    </div>
                </div><!--/ Intro Headings --> 

                <div class="cell medium-15">
                    <div class="c-intro__text wow wow-visible" data-delay="0.6">
                        <?php echo get_field('intro_text'); ?>
                    </div>
                </div><!--/ Intro Text -->
            </div>
        </div>
	</div>
</div><!-- End Intro Panel -->

<div id="our-team" class="o-panel o-panel--our-team">
    <div class="c-our-team">
        <?php
            $taxonomy = 'our-team-category';
            $terms = get_terms($taxonomy);

            foreach ($terms as $term) {
              $args = [
                'post_type' => 'our-team',
                'posts_per_page' => -1,
                // 'tax_query' => [
                //   [
                //     'taxonomy' => 'our-team-category',
                //     'field' => 'slug',
                //     'terms' => $term->slug,
                //   ],
                // ],
              ];

            $loop = new WP_Query($args);
			
			$team_member_count = 1;
        ?>

        <?php $delay = 0.4; if ($loop->have_posts()): ?>
            <div id="<?php echo $term->slug; ?>" class="grid-container c-our-team__section">
                <h2 class="c-our-team__heading wow wow-visible" data-delay="<?php echo $delay; ?>"><?php echo $term->name; ?></h2>

                <div class="grid-x grid-padding-x align-center">
                    <?php while ($loop->have_posts()):
                        $loop->the_post(); 
						
						$animation_class = 'wow wow-visible';
						
						if(my_wp_is_tablet()){
							$per_page = 3;
						}else{
							$per_page = 4;
						}
						
						$per_page = 4;
						
						if($team_member_count > $per_page){
							$animation_class = 'wow-load-on-more';	
						}else{
							$delay = $delay + 0.1;
						}
						
						if($team_member_count == 4){
							$animation_class .= ' team-fourth-item';
						}
					?>
                        <div class="cell small-12 medium-8 large-6 c-our-team__col <?php echo $animation_class; ?>" data-delay="<?php echo $delay; ?>">
                            <div class="c-our-team__item">
                                <div class="c-our-team__img">
                                    <a href="javascript:void(0)<?php //the_permalink(); ?>">
                                        <?php if ( get_field('ot_photo') ) { ?>
                                            <img src="<?php echo get_field( 'ot_photo' ); ?>" alt="">
                                        <?php } else { ?>
                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/placeholder-image.png" alt="">
                                        <?php } ?>
                                    </a>
                                </div><!--/ Image -->

                                <div class="c-our-team__info">
                                    <div class="c-our-team__name">
                                        <a href="javascript:void(0)"><?php the_title(); ?></a>
                                    </div>
                                    <div class="u-social u-social--team">
                                        <?php if ( have_rows('social_links') ):
                                          $count = 1; while (have_rows('social_links')): the_row(); ?>
                                                <?php if ($count == 3) { ?>
                                                    <a href="<?php echo get_sub_field(
                                                      'ot_link'
                                                    ); ?>" target="_blank"><i class="<?php echo get_sub_field('ot_class_name'); ?>"></i></a>
                                                <?php } else { ?>
                                                    <a href="<?php echo get_sub_field(
                                                      'ot_link'
                                                    ); ?>"><i class="<?php echo get_sub_field('ot_class_name'); ?>"></i></a>
                                                <?php } ?>
                                            <?php $count++; endwhile;
                                        endif; ?>
                                    </div>
                                </div>
								<div class="c-our-team__designation">
									<?php echo get_field( 'ot_designation' ); ?>
									<span><?php echo get_field( 'ot_phone_number' ); ?></span>
								</div>
                            </div>
                        </div><!--/ Team Member -->
                    <?php $team_member_count++; endwhile; ?>
                </div>

				<?php if($loop->found_posts > 4): ?>
	                <div class="c-our-team__more text-center wow wow-visible" data-delay="<?php echo $delay; ?>">
	                    <a class="c-our-team__more-link" href="#">See More</a>
	                </div>
				<?php endif; ?>
            </div><!--Team Section -->
        <?php endif; wp_reset_query(); ?>
    <?php } ?>
    </div>
</div><!-- End Our Team Panel -->

<div id="our-culture" class="o-panel o-panel--our-culture u-eadge-top-right">
    <div class="c-our-culture">
        <div class="grid-container">
            <div class="c-our-culture__text">
                <h1 class="c-our-culture__title u-ls-2 wow wow-visible"><?php echo get_field( 'oc_title' ); ?></h1>

                <div class="wow wow-visible">
                    <?php echo get_field('oc_text'); ?>
                </div>

                <div class="c-our-culture__buttons wow wow-visible">
                    <a class="u-button u-button--red" href="<?php echo get_field( 'oc_red_button_link' ); ?>"><?php echo get_field('oc_red_button_label'); ?></a>
                    <a class="u-button" href="<?php echo get_field( 'oc_orange_button_link' ); ?>"><?php echo get_field('oc_orange_button_label'); ?></a>
                </div>
            </div>
        </div>
    </div>
</div><!-- End Our Team Panel -->

<?php get_footer(); ?>
