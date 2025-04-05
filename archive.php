<?php get_header(); ?>

<?php
   $page_ID = get_blog_page_id();
   $posts_per_page = get_option( 'posts_per_page' );
   $posts_to_exclude = [];

	if(is_tax('blog-category')){
      $current_term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
      $current_term_id = $current_term->term_id;
      $pagination = get_next_posts_page_link();
	}else{
      $current_term_id = '';
      $pagination = 'https://r1creativedev.net/project883/blog/page/2/';
   }

   global $wp_query;
   $default_posts_per_page = get_option( 'posts_per_page' );
   $post_count = $wp_query->post_count;
?>

<div id="blog" class="o-panel o-panel--blog u-margin-top-230">
	<div class="c-blog">
      <div class="grid-container">
         <h1 class="c-blog__heading wow wow-visible">Blog</h1>
         <div class="c-blog-featured-post grid-padding-x">
			<?php $count = 1; if( have_rows('fetured_posts', $page_ID) ) : $delay = 0.4; ?>
				<?php while(have_rows('fetured_posts', $page_ID)): the_row('fetured_posts', $page_ID); ?>
					<?php 
						$posts_to_exclude[] = get_sub_field('select_post', $page_ID)->ID;
						if($count == 1) { 
						$post_obj = get_sub_field('select_post', $page_ID);
						$post_id = $post_obj->ID;
						
						global $post; 
						$post = get_post( $post_id, OBJECT );
						
						setup_postdata($post);
					?>
						<div class="cell c-blog-featured-post__main-item wow wow-visible img-post-<?php echo $post_id; ?>" data-delay="<?php echo $delay; ?>">
							<?php $delay = $delay + 0.2; ?>   
							
							<div class="c-blog__image-wrap">
								<div class="c-blog__post-terms">
									<?php $term_list = get_the_terms( $post_id, 'blog-category'); if($term_list){ ?>
										<span>
											<?php echo $term_list[0]->name; ?>
										</span>
									<?php } ?>
								</div>
								
								<?php if (has_post_thumbnail( $post->ID ) ): ?>
									<a class="c-blog__image" href="<?php the_permalink(); ?>" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>)">
										<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/blog-image-large-placeholder.jpg" alt="" />
									</a>
								<?php else : ?>
									<a class="c-blog__image" href="<?php the_permalink(); ?>" style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/img/dummy-image.jpg)">
										<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/blog-image-large-placeholder.jpg" alt="" />
									</a>
								<?php endif; ?>
							</div>
			
							<h3 class="c-blog-featured-post__title">
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</h3><!-- Title -->
			
							<div class="c-blog-featured-post__info">
								<div class="c-blog-featured-post__date">
									<?php echo get_the_date('M d, Y'); ?>
								</div>
								<div class="c-blog-featured-post__time">
									<?php echo reading_time(); ?>
								</div>	
							</div>
			
							<div class="c-blog-featured-post__details">
								<?php the_excerpt(); ?>
								<a class="c-blog-featured-post__more" href="<?php the_permalink(); ?>">Read More</a>
							</div>
						</div><!-- Main Featured Post -->
                	<?php } ?>
				<?php $count++; wp_reset_postdata(); endwhile; ?>
			<?php endif; ?>
			
			<?php $count = 1; if( have_rows('fetured_posts', $page_ID) ) : $delay = 0.4; ?>
					<div class="cell c-small-featured-post">
                        <h3 class="c-blog-featured__small-title">FEATURED POSTS</h3>
						<?php 
							while(have_rows('fetured_posts', $page_ID)): the_row('fetured_posts', $page_ID);
								if($count > 1 && $count < 6) { 
									$post_obj = get_sub_field('select_post', $page_ID);
									$post_id = $post_obj->ID;
										
									global $post; 
									$post = get_post( $post_id, OBJECT );
										
									setup_postdata($post);
							?>
									<div class="c-small-featured-post__post-item img-post-<?php echo $post_id; ?>">
										<div class="c-small-featured-post__image-wrap">
											<?php if (has_post_thumbnail( $post->ID ) ): ?>
												<a class="c-small-featured-post__image" href="<?php the_permalink(); ?>" style="background-image: url(<?php echo get_the_post_thumbnail_url($post->ID, 'medium'); ?>);">
													<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/blog-image-placeholder-small.jpg" alt="" /	>
												</a><!-- Image -->
											<?php else: ?>
												<a class="c-small-featured-post__image" href="<?php the_permalink(); ?>" style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/img/blog-image-placeholder-small.jpg);">
													<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/blog-image-placeholder-small.jpg" alt="" /	>
												</a><!-- Image -->
											<?php endif; ?>
										</div>
								
										<div class="c-small-featured-post__text-box">
											<?php $term_list = get_the_terms( $post->ID, 'blog-category'); if($term_list){ ?>
											   <span class="c-small-featured-post__cat">
												   <?php echo $term_list[0]->name; ?>
												  </span>
											<?php } ?>
											<h5 class="c-small-featured-post__title">
												<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
											</h5>
											<div class="c-small-featured-post__date">
												<?php echo get_the_date('M d, Y'); ?>
											</div>
										</div>
									</div><!--/ Post Item -->
								<?php } ?>
						<?php $count++; wp_reset_postdata(); endwhile; ?>
					</div><!-- Small Posts -->
            <?php endif; ?>
         </div><!--/ Blog Featured Post -->

         <div id="blog-categories" class="c-blog__categories wow wow-visible">
            <?php
               $taxonomy = 'blog-category';
               $terms = get_terms($taxonomy);
            ?>
            <ul>
               <li class="<?php if(!is_tax('blog-category')) echo 'active'; ?>">
				   <a href="<?php bloginfo('url'); ?>/blog" data-blog-category="all">All</a>
			   </li>
               <?php foreach ( $terms as $term ) { ?>
                  <li class="<?php if($current_term_id == $term->term_id) echo 'active'; ?>">
                     <a href="<?php echo get_term_link($term->slug, $taxonomy); ?>" data-blog-category="<?php echo $term->slug; ?>"><?php echo $term->name; ?></a>
                  </li> 
               <?php } ?>
            </ul>
         </div><!--/ Blog Categories Link -->
			 
		<?php
			// print_r($posts_to_exclude);
			
			$blog_posts = new WP_Query([
				'post_type' => 'blog',
				'post__not_in' => $posts_to_exclude
			]);
		?>

         <?php if($blog_posts->have_posts()): ?>
            <div class="c-blog__posts">
				<div class="grid-x grid-padding-x" id="blog-posts-wrap">
					<?php 
						while($blog_posts->have_posts()): $blog_posts->the_post(); 
							get_template_part('inc/loop', 'blog');
						endwhile; 
					?>
				</div>
            </div>
         <?php endif; ?>	

		 <?php if($blog_posts->found_posts > $posts_per_page): ?>
	         <div class="c-blog__footer" id="blog-footer">
	            <div class="small-24 columns text-center">
					<a class="u-button c-blog__see-more js-load-more-blog" href="#">Keep Exploring</a>
	            </div>
	         </div>
		 <?php endif; ?>
		 <?php wp_reset_postdata(); ?>
      </div>
   </div>
</div><!-- End Blog Panel -->

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

<?php get_footer(); ?>