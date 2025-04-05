<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

global $post;

?>

<?php if(have_posts()): ?>
    <?php //while(have_posts()): the_post(); ?>
    	<div id="our-team" class="o-panel o-panel--our-team  u-margin-top-230">
    		<div class="c-our-team-inner">
    			<div class="grid-container">
    				<div>
    					<?php echo get_field('bio'); ?>
    				</div>
    			</div>
    		</div>
    	</div>
    <?php //endwhile; wp_reset_query(); ?>
<?php endif; ?>

<?php get_footer();