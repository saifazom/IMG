<?php

/**
* Template Name: Search Page Template
*/

get_header();

$search_query = get_search_query();  
$resource_page_id = 14;
$has_resource_content = false;
$resource_page_found = false;

$client_center_page_id = 16;
$client_center_page_found = false;
$has_client_center_content = false;

if( have_rows('video_slider', $resource_page_id) ): 
	while( have_rows('video_slider', $resource_page_id) ) : the_row();
		$contents = get_sub_field('video_title');
		$contents .= get_sub_field('viideo_description');
		$pos = strpos($contents, $search_query);
		
		if($pos !== false) { 
			$has_resource_content = true;
		} 
	endwhile; 
endif; 

if( have_rows('tiles_items', $client_center_page_id) ): 
	while( have_rows('tiles_items', $client_center_page_id) ) : the_row();
		$contents = get_sub_field('tiles_item_title');
		$contents .= get_sub_field('tiles_text');
		$pos = strpos($contents, $search_query);
		
		if($pos !== false) { 
			$has_client_center_content = true;
		} 
	endwhile; 
endif; 

?>

<div id="search" class="o-panel o-panel--search u-margin-top-230">
	<div class="c-search-page">
		<div class="grid-container">
			<div class="c-search-page__search-box text-center">
				<h2 class="c-search-page__heading">How can we help you?</h2>

	            <form method="get" action="<?php bloginfo('url'); ?>">
	                <input type="search" name="s" placeholder="Search" value="<?php echo $search_query; ?>">
	                <button type="submit"><i class="fas fa-search"></i></button>
	            </form>

	            <p class="c-search-page__showing-results">Showing search results for: “<span><?php echo $search_query; ?></span>”</p>
			</div><!--/ Search Box -->
		<?php
			if(have_posts() || $has_resource_content || $has_client_center_content): ?>
					<div class="c-search-page__search-results">
						<div class="c-search-page__filter">
							<ul class="c-search-page__categories">
								<li class="search-item-all active" data-target-type="all"><a href="#">All</a></li>
								<li class="search-item-products" data-target-type="products"><a href="#">Products</a></li>
								<li class="search-item-resources" data-target-type="resources"><a href="#">Resources</a></li>
							</ul>
						</div><!-- Search Filter -->
	
						<div class="c-search-page__result-items-wrap">
							<?php while(have_posts()): the_post(); ?>
								<?php 
									global $post;	
									
									if($post->ID == $resource_page_id){
										$resource_page_found = true;	
										continue;
									}
									
									// Exclude the homepage
									if($post->ID == 8){
										continue;
									}
									
									if($post->ID == $client_center_page_id){
										$client_center_page_found = true;	
										continue;
									}
									
									$post_type = get_post_type($post->ID);
									$search_post_type = 'all';
									
									if($post_type == 'benefits-products' || $post_type == 'business-products' || $post_type == 'personal-products' || $post_type == 'industry'){
										$search_post_type = 'products';
									}
								?>
								<div class="c-search-page__result-item" data-item-type="<?php echo $search_post_type; ?>">
									<h4><a href="<?php the_permalink(); ?>"><?php echo get_the_title($post->ID); ?></a></h4>
		
									<?php if(has_excerpt($post->ID)){ ?>
										<?php the_excerpt(); ?>
									<?php }elseif(get_field('hero_sub_title', $post->ID)) { ?>
										<p><?php echo get_field('hero_sub_title', $post->ID); ?></p>
									<?php } ?>
								</div><!--/ Result Item -->
							<?php endwhile; ?>
							
							<?php if($resource_page_found) { ?>
								<div class="c-search-page__result-item" data-item-type="resources">
									<h4><a href="<?php echo get_the_permalink($resource_page_id); ?>"><?php echo get_the_title($resource_page_id); ?></a></h4>
		
									<?php if(has_excerpt($resource_page_id)){ ?>
										<?php echo get_the_excerpt($resource_page_id); ?>
									<?php }elseif(get_field('hero_sub_title', $resource_page_id)) { ?>
										<p><?php echo get_field('hero_sub_title', $resource_page_id); ?></p>
									<?php } ?>
								</div><!--/ Result Item -->
							<?php } ?>
							
							<?php if($client_center_page_found) { ?>
								<div class="c-search-page__result-item" data-item-type="resources">
									<h4><a href="<?php echo get_the_permalink($client_center_page_id); ?>"><?php echo get_the_title($client_center_page_id); ?></a></h4>
		
									<?php if(has_excerpt($client_center_page_id)){ ?>
										<?php echo get_the_excerpt($client_center_page_id); ?>
									<?php }elseif(get_field('hero_sub_title', $client_center_page_id)) { ?>
										<p><?php echo get_field('hero_sub_title', $client_center_page_id); ?></p>
									<?php } ?>
								</div><!--/ Result Item -->
							<?php } ?>
							
							<?php if( have_rows('video_slider', $resource_page_id) ): while( have_rows('video_slider', $resource_page_id) ) : the_row(); 
							 
								$contents = get_sub_field('video_title');
								$contents .= get_sub_field('viideo_description');
								
								$pos = strpos($contents, $search_query);
								if($pos !== false) { ?>
									<div class="c-search-page__result-item" data-item-type="resources">
										<h4><a href="<?php echo get_the_permalink($resource_page_id); ?>"><?php echo get_sub_field('video_title'); ?></a></h4>
										<p><?php echo get_sub_field('viideo_description'); ?></p>
									</div><!--/ Result Item -->
								<?php } ?>
							<?php endwhile; endif; ?>
							
							<?php if( have_rows('tiles_items', $client_center_page_id) ): while( have_rows('tiles_items', $client_center_page_id) ) : the_row(); 
						 
								$contents = get_sub_field('tiles_item_title');
								$contents .= get_sub_field('tiles_text');
								
								if(!get_sub_field('tiles_item_title')) {
									$item_title = 'Client Center';
								}else{
									$item_title = get_sub_field('tiles_item_title');
								}
								
								$pos = strpos($contents, $search_query);
								if($pos !== false) { ?>
									<div class="c-search-page__result-item" data-item-type="resources">
										<h4><a href="<?php echo get_the_permalink($client_center_page_id); ?>"><?php echo $item_title; ?></a></h4>
										<p><?php echo get_sub_field('tiles_text'); ?></p>
									</div><!--/ Result Item -->
								<?php } ?>
							<?php endwhile; endif; ?>
							
							<div class="c-search-page__no-result-wrap">There are no results for your search term.</div>
						</div>
					</div>
			<?php else: ?>
				<div class="c-search-page__empty-content-wrap">There are no results for your search term.</div>
			<?php endif; ?>
		</div>
	</div>
</div>

<?php get_footer();