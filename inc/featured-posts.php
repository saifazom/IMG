<?php if ( is_home() ) { ?>
    <div id="featured-posts" class="o-panel o-panel--featured-posts">
        <div class="c-featured-posts">
            <div class="grid-container">
                <div class="c-featured-posts__header">
                    <h3 class="u-sub-title u-sub-title--featured"><?php echo get_field('fp_small_heading', $homepage_id); ?></h3>
                    <h2 class="c-featured-posts__heading"><?php echo get_field('fp_heading', $homepage_id); ?></h2>
                </div><!--/ Featured Posts Header -->

                <div class="grid-x grid-padding-x">
                    <div class="cell small-24 medium-12">
                        <div class="c-featured-posts__img">
                            <a class="c-featured-posts__category" href="#">IMG Webcast</a>

                            <a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/featured-img1.jpg" alt=""></a>
                        </div>

                        <h4 class="c-featured-posts__title"><a href="#">Cyber Liability Exposure & Coverage</a></h4>
                        <p>We are embracing the use of cyberspace in every aspect of our lives – but are we adequately prepared to deal with the increasing risk of cyber-attacks? Join us for this engaging webinar, where we take an in-depth look at cyber risk, how its evolving, and the current and future state of cyber liability.</p>
                    </div><!--/ Posts Item -->

                    <div class="cell small-24 medium-12">
                        <div class="c-featured-posts__img">
                            <a class="c-featured-posts__category" href="#">IMG Spotlight</a>

                            <a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/featured-img2.jpg" alt=""></a>
                        </div>

                        <h4 class="c-featured-posts__title"><a href="#">How to file an insurance claim for your home</a></h4>
                        <p>Learn about home insurance policies, when to make a home or condominium insurance claim, and how a claims management process works.</p>
                    </div><!--/ Posts Item -->
                </div>
            </div>

            <div class="c-featured-posts-cta">
                <div class="grid-container c-featured-posts-cta__container">
                    <h2><?php echo get_field('fp_cta_heading', $homepage_id); ?></h2>
                    <p><?php echo get_field('fp_cta_text', $homepage_id); ?></p>

                    <a class="u-button" href="<?php echo get_field('fp_button_link', $homepage_id); ?>"><?php echo get_field('fp_button_label', $homepage_id); ?></a>
                </div>
            </div>
        </div>
    </div><!-- End Featured Posts Panel -->
<?php }else{ ?>
    <div class="grid-container">
        <div class="c-featured-posts__header">
            <h3 class="u-sub-title u-sub-title--featured"><?php echo get_field('fp_sub_title'); ?></h3>
            <h2 class="c-featured-posts__heading"><?php echo get_field('fp_title'); ?></h2>
        </div><!--/ Featured Posts Header -->

        <div class="grid-x grid-padding-x">
            <div class="cell small-24 medium-12">
                <div class="c-featured-posts__img">
                    <a class="c-featured-posts__category" href="#">IMG Webcast</a>

                    <a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/featured-img1.jpg" alt=""></a>
                </div>

                <h4 class="c-featured-posts__title"><a href="#">Cyber Liability Exposure & Coverage</a></h4>
                <p>We are embracing the use of cyberspace in every aspect of our lives – but are we adequately prepared to deal with the increasing risk of cyber-attacks? Join us for this engaging webinar, where we take an in-depth look at cyber risk, how its evolving, and the current and future state of cyber liability.</p>
            </div><!--/ Posts Item -->

            <div class="cell small-24 medium-12">
                <div class="c-featured-posts__img">
                    <a class="c-featured-posts__category" href="#">IMG Spotlight</a>

                    <a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/featured-img2.jpg" alt=""></a>
                </div>

                <h4 class="c-featured-posts__title"><a href="#">How to file an insurance claim for your home</a></h4>
                <p>Learn about home insurance policies, when to make a home or condominium insurance claim, and how a claims management process works.</p>
            </div><!--/ Posts Item -->
        </div>
    </div>
<?php } ?> 