
<?php
/*
* Template Name: Thank You Page Template
*/

 	get_header(); 
?>
	<div id="thank-page" class="o-panel o-panel--thank-page u-margin-top-230">
		<div class="c-thank-page">
			<div class="grid-container">
				<img class="c-thank-page__check" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/check.png" alt="">
				<h1 class="c-thank-page__title u-ls-2"><?php echo get_field('ty_title'); ?></h1>

				<div class="c-thank-page__text">
					<?php echo get_field('ty_text'); ?>
				</div>
			</div>
		</div>
	</div><!-- End Page Panel -->

<?php get_footer(); ?>
