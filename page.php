<?php get_header(); ?>

<div id="page" class="o-panel o-panel--page u-margin-top-230">
	<div class="c-page">
		<div class="grid-container">
			<div class="c-page__content">
				<h1 class="text-center u-ls-2"><?php the_title(); ?></h1>

				<?php the_content(); ?>
			</div>
		</div>
	</div>
</div><!-- End Page Panel -->

<?php get_footer(); ?>