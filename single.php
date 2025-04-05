<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

global $post;

$default_avatar = get_stylesheet_directory_uri() . '/assets/img/about-img1.png';
$term_list = get_the_term_list( $post->ID, 'blog-category', '', ', ', '' );
?>

<div id="blog" class="o-panel o-panel--blog u-margin-top-230">
	<div class="c-single-blog">
		<div class="grid-container">
			<?php if(have_posts()): ?>
				<a class="c-single-blog__back" href="<?php bloginfo('url'); ?>/blog"><i class="fa fa-chevron-left"></i> Back</a>

				<h2 class="c-blog__title--single wow wow-visible">
					<?php the_title(); ?>
				</h2>

				<div class="c-blog__info wow wow-visible">
					<div class="c-blog__date"><?php echo get_the_date('M d, Y'); ?></div>
					<div class="c-blog__time">
						<?php echo reading_time(); ?>
					</div>
				</div>

				<div class="c-blog__image--single wow wow-visible">
					<?php if(has_post_thumbnail( $post->ID )) { ?>
						<?php the_post_thumbnail( 'full' ); ?>
					<?php } else { ?>
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/dummy-image.jpg" alt="" />
					<?php } ?>
				</div>
				
				<div class="wow wow-visible">
					<?php the_content(); ?>
				</div>
				
				<div class="c-inner-blog__social-wrap wow wow-visible">
					<?php
						global $post;
						$share_url = get_the_permalink();
						$share_title = $post->post_title;
						$share_description = $post->post_excerpt;
					?>

					<span>Share</span> 
					<div class="u-social u-social--single">
						<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $share_url; ?>" target="_blank">
							<i class="fab fa-facebook-f"></i>
						</a>
						<a href="https://twitter.com/intent/tweet?text=<?php echo $share_title; ?>&url=<?php echo $share_url; ?>" target="_blank">
							<i class="fab fa-twitter"></i>
						</a>
						<a href="https://www.linkedin.com/sharing/share-offsite?url=<?php echo $share_url; ?>&title=<?php echo $share_title; ?>" target="_blank">
							<i class="fab fa-linkedin-in"></i>
						</a>
						<a href="mailto:?&subject=<?php echo $share_title; ?>&body=<?php echo $share_url; ?>" target="_blank">
							<i class="fas fa-envelope"></i>
						</a>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div><!-- End Single Blog -->

<?php if( get_field('related_posts', $post->ID) ) { ?>
	<div id="related-posts" class="o-panel o-panel--related-posts">
		<div class="c-related-posts">
			<div class="grid-container">
				<div class="grid-x grid-padding-x">
					<?php $delay = 0.4; if( have_rows('related_posts', $post->ID) ) : ?>
						<?php while( have_rows('related_posts', $post->ID) ) : the_row(); 
							
							$related_posts = get_sub_field('select_related_post', $post->ID);
						?>
							 
							<div class="cell medium-12 wow wow-visible" data-delay="<?php echo $delay; ?>">
							<?php $delay = $delay + 0.2; ?>
								<div class="c-blog__post-item">
									<div class="c-blog__image-wrap">
										<div class="c-blog__post-terms">
											<?php $term_list = get_the_terms( $related_posts->ID, 'blog-category'); if($term_list){ ?>
												 <span>
													 <?php echo $term_list[0]->name; ?>
												 </span>
											 <?php } ?>
										</div>
										<?php if (has_post_thumbnail( $related_posts->ID ) ): ?>
											<a class="c-blog__image c-blog__image--single-small" href="<?php echo get_the_permalink($related_posts->ID); ?>" style="background-image: url(<?php echo get_the_post_thumbnail_url($related_posts->ID); ?>)">
												<?php echo get_the_post_thumbnail( $related_posts->ID ); ?>
											</a>
										<?php else : ?>
											<a class="c-blog__image c-blog__image--single-small" href="<?php echo get_the_permalink($related_posts->ID); ?>" style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/img/dummy-image.jpg)">
												<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/dummy-image.jpg" alt="" />
											</a>
										<?php endif; ?>
									</div>

									<h3 class="c-blog__title">
										<a href="<?php echo get_the_permalink($related_posts->ID); ?>"><?php echo get_the_title($related_posts->ID); ?></a>
									</h3><!-- Title -->

									<div class="c-blog__info">
										<div class="c-blog__date"><?php echo get_the_date('M d, Y', $related_posts->ID); ?></div>
										<div class="c-blog__time"><?php echo reading_time($related_posts->ID); ?></div>
									</div><!-- Blog Info -->

									<div class="c-blog__details">
										<p><?php echo get_the_excerpt($related_posts->ID); ?></p>

										<a class="c-blog__more" href="<?php echo get_the_permalink($related_posts->ID); ?>"><span>Read More</span></a>
									</div><!-- Short Des: -->
								</div>
							</div><!--/ Post Item -->
						<?php endwhile; ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div><!-- End Related Posts Panel -->
<?php } ?>

<div id="newsletter" class="o-panel o-panel--newsletter">
    <div class="grid-container c-newsletter">
        <div class="grid-x grid-padding-x align-middle align-center">
            <div class="cell small-24 medium-24 large-8 c-newsletter__col wow wow-visible">
                <h2 class="c-newsletter__title">Insurance tips<br/> & news delivered<br/> to your inbox.</h2>
            </div><!--/ Address Info -->

            <div class="cell small-24 medium-24 large-16 c-newsletter__col wow wow-visible">
               <?php echo do_shortcode( '[gravityform id=1 title=false description=false ajax=true tabindex=49]' ); ?>
            </div>
        </div>
    </div>
</div><!-- End Contact Panel -->

<?php get_footer();