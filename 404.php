<?php
/**********************************************************************
* R.One Creative Wordpress Theme   
* 
* File name:   
*      404.php
* Brief:       
*      404 Page
* Author:      
*      R.One Creative
* Author URI:
*      http://r1creative.net
* Contact:
*      info@r1creative.net
***********************************************************************/  
?>

<?php get_header('inner'); ?>

<div id="404" class="o-panel o-panel--404 u-margin-top-230">
    <div class="c-404">
        <div class="grid-container">
            <div class="c-404__text">
                <h1 class="c-404__title"><strong>Oops!</strong> Something went wrong.</h1>

                <p>Sorry, we can’t find the page you’re looking for. </p>

                <a class="u-button" href="<?php bloginfo('url'); ?>">Back Home</a>
            </div>
        </div>
    </div>
</div><!-- End 404 Panel -->

<?php get_footer(); ?>
