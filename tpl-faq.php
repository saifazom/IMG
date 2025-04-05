<?php
/*
* Template Name: Faq Page Template 
*/

get_header();
?>

<div id="faq-main" class="o-panel o-panel--faq-main u-margin-top-190">
   <div class="c-faq-main">
      <div class="grid-container">
         <div class="c-faq-main__header">
            <h1 class="c-faq-main__title wow wow-visible">Frequently Asked Questions</h1>
            <p class="wow wow-visible">We’ve got answers to all your burning questions.</p>
         </div><!-- Faq Header -->
         
         <div class="c-faq-main-accordion js-accordion c-faq-main-accordion--faq-page wow wow-visible">
            <?php
				$first_term_slug = '';
               $taxonomy = 'faq-category';
               $terms = get_terms($taxonomy);
            ?>   
            <div class="c-faq-main__category-wrap">
               <div class="c-faq-main__category">
                  <?php $count = 1; foreach ( $terms as $term ) { ?>
                     <div class="c-faq-main__category-item" data-cat="<?php echo $term->slug; ?>">
                        <div class="c-faq-main__cat-wrap">
                           <div class="c-faq-main__icon-wrap">
                              <img class="c-faq-main__icon <?php if($count == 1) echo 'active'; ?>" src="<?php echo get_field('faq_icon','faq-category_'. $term->term_id); ?>" alt="" />
                              <img class="c-faq-main__white-icon <?php if($count == 1) echo 'active'; ?>" src="<?php echo get_field('faq_white_icon','faq-category_'. $term->term_id); ?>" alt="" />
                           </div>
                           <span><?php echo $term->name; ?></span>
                        </div>
                     </div><!-- Category Item -->
                  <?php $count++; } ?>
               </div>
            </div><!-- Category Listing -->

            <?php
           // print_r($terms);

               $args = array(
                  'post_type' => 'faq',
                  'posts_per_page' => -1
              );

               $loop = new WP_Query($args);
			   ?>
            <?php $count = 1; if ($loop->have_posts()) : ?>
               <?php 
			   $found_active = false;
			   $showed_active = false;
			   
			   	while ($loop->have_posts()) : $loop->the_post(); 
				   	global $post;
			   		$term_list = wp_get_post_terms( $post->ID, 'faq-category', array( 'fields' => 'all' ) );
					if($term_list && !is_wp_error($term_list)){
						$term_name = $term_list[0]->slug;
					}else{
						$term_name = '';
					}
			   ?>
                  <div 
				  	class="c-faq-main-accordion__section js-accordion__section 
					  <?php if($count === 1){ echo('active'); } ?>" data-faq-target="<?php echo $term_name; ?>">
                     <div class="c-faq-main-accordion__header js-accordion__header">
                        <?php the_title(); ?> <i class="icon"></i>
                     </div>

                     <div class="c-faq-main-accordion__content js-accordion__content">
                        <?php the_content(); ?>
                     </div>
                  </div><!-- End FAQ Item -->
               <?php $count++; endwhile; ?>
            <?php endif; ?>
         </div><!-- End Module Accordion -->
      </div>
   </div>
</div><!-- End FAQs Panel -->

<?php get_footer(); ?>