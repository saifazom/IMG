<?php 
global $post;
$delay = 0.4; 
$term_list = get_the_term_list( $post->ID, 'blog-category', '', ', ', '' ); 

?>
 <div class="cell medium-12">
	<div class="c-blog__post-item wow wow-visible" data-delay="<?php echo $delay; ?>">
	   <div class="c-blog__image-wrap">
		  <div class="c-blog__post-terms">
			 <?php $term_list = get_the_terms( $post->ID, 'blog-category'); if($term_list){ ?>
				 <span>
					 <?php echo $term_list[0]->name; ?>
				 </span>
			 <?php } ?>
		  </div>
		  <?php if (has_post_thumbnail( $post->ID ) ): ?>
			 <a class="c-blog__image" href="<?php the_permalink(); ?>" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>)">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/blog-image-placeholder-medium.jpg" alt="" />
			 </a>
		  <?php else : ?>
			 <a class="c-blog__image" href="<?php the_permalink(); ?>" style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/img/dummy-image.jpg)">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/blog-image-placeholder-medium.jpg" alt="" />
			 </a>
		  <?php endif; ?>
	   </div>

	   <h3 class="c-blog__title">
		  <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
	   </h3><!-- Title -->

	   <div class="c-blog__info">
		  <div class="c-blog__date"><?php echo get_the_date('M d, Y'); ?></div>
		  <div class="c-blog__time"><?php echo reading_time(); ?></div>
	   </div><!-- Blog Info -->

	   <div class="c-blog__details">
		  <?php the_excerpt(); ?>

		  <a class="c-blog__more" href="<?php the_permalink(); ?>"><span>Read More</span></a>
	   </div><!-- Short Des: -->
	</div>
 </div><!--/ Post Item -->