<?php if ( is_home() || is_front_page() ) { $homepage_id = 8; ?>
    <div id="testimonials" class="o-panel o-panel--testimonials">
        <div class="c-testimonials">
            <div class="grid-container">
                <div class="grid-x grid-padding-x align-middle c-testimonials__grid">
                    <div class="cell auto">
                        <div class="c-testimonials__title" style="visibility: hidden !important;">
                            <h2 class="wow wow-visible"><?php echo get_field('testimonial_heading', $homepage_id); ?></h2>
                        </div>
                    </div><!-- Title -->
                    <div class="cell shrink">
                        <div class="c-testimonials__arrows">
                            <div class="c-testimonials__arrows-wrap wow wow-visible">
                                <button id="testimonial-prev" class="c-testimonials__prev slick-arrow">
                                    <img class="c-testimonials__p-gray" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/arrow-gray-left.png" alt="">
                                    <img class="c-testimonials__p-blue" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/arrow-blue-left.png" alt="">
                                </button>
                                <button id="testimonial-next" class="c-testimonials__next slick-arrow">
                                    <img class="c-testimonials__n-gray" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/arrow-gray.png" alt="">
                                    <img class="c-testimonials__n-blue" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/arrow-blue.png" alt="">
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/ Title Area -->

            <div class="c-testimonials__slide-col">
                <div class="c-testimonials__slider">
					<div class="c-testimonials__title">
						<h2 class="wow wow-visible"><?php echo get_field('testimonial_heading', $homepage_id); ?></h2>
					</div>
                    <div class="js-testimonials-slider">
                        <?php if( have_rows('home_testimonials', $homepage_id) ): 
                            while( have_rows('home_testimonials', $homepage_id) ) : the_row(); 

                            $post_obj = get_sub_field('select_home_testimonial', $homepage_id);

                            //print_r($post_obj);
                            ?>
                                <div class="c-testimonials__item">
                                    <div class="c-testimonials__box">
                                        <div class="c-testimonials__stars">
                                            <?php if( get_field('show_stars', $post_obj->ID) == 'Yes' ) { ?>
                                                <?php
                                                    $stars = get_field('t_stars_count', $post_obj->ID);
                                                    if( $stars ): 
                                                ?>
                                                    <?php for( $i_star = 1; $i_star <= $stars; $i_star++ ): ?>
                                                        <a href="#"><i class="fas fa-star"></i></a>
                                                    <?php endfor; ?>
                                                <?php endif; ?>
                                            <?php } ?>
                                        </div>

                                        <p><?php echo get_field('testimonial_text', $post_obj->ID); ?></p>
                                        <div class="c-testimonials__client">
                                            <strong><?php echo get_the_title($post_obj->ID); ?></strong>
                                            <?php echo get_field('testimonial_designation', $post_obj->ID); ?>
                                        </div>
                                    </div>
                                </div><!--/ Testimonials Item -->
                            <?php endwhile; 
                        endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- End Testimonials Panel -->
<?php } else { ?>
    <div class="grid-container">
        <div class="grid-x grid-padding-x align-bottom c-testimonials__grid">
            <div class="cell auto">
                <div class="c-testimonials__title">
                    <h2 class="wow wow-visible"><?php echo get_field('testimonial_heading'); ?></h2>
                
                </div>
            </div><!--/ Title -->

            <div class="cell shrink">
                <div class="c-testimonials__arrows">
                    <div class="c-testimonials__arrows-wrap">
                        <button id="testimonial-prev" class="c-testimonials__prev slick-arrow">
                            <img class="c-testimonials__p-gray" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/arrow-gray-left.png" alt="">
                            <img class="c-testimonials__p-blue" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/arrow-blue-left.png" alt="">
                        </button>
                        <button id="testimonial-next" class="c-testimonials__next slick-arrow">
                            <img class="c-testimonials__n-gray" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/arrow-gray.png" alt="">
                            <img class="c-testimonials__n-blue" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/arrow-blue.png" alt="">
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/ Titl Area -->

    <div class="c-testimonials__slide-col">
        <div class="c-testimonials__slider">
            <div class="js-testimonials-slider wow wow-visible">
                <?php if( have_rows('testimonials_inner') ): 
                    while( have_rows('testimonials_inner') ) : the_row(); 

                    $post_obj = get_sub_field('select_inner_testimonial');

                    //print_r($post_obj);
                ?>
                    <?php if(get_sub_field('select_inner_testimonial')) { ?>
                        <div class="c-testimonials__item">
                            <div class="c-testimonials__stars">
                            <?php if( get_field('show_stars', $post_obj->ID) == 'Yes' ) { ?>
                                <?php
                                    $stars = get_field('t_stars_count', $post_obj->ID);
                                    if( $stars ): 
                                ?>
                                    <?php for( $i_star = 1; $i_star <= $stars; $i_star++ ): ?>
                                        <a href="#"><i class="fas fa-star"></i></a>
                                    <?php endfor; ?>
                                <?php endif; ?>
                            <?php } ?>
                            </div>

                            <p><?php echo get_field('testimonial_text', $post_obj->ID); ?></p>

                            <div class="c-testimonials__client">
                                <strong><?php echo get_the_title($post_obj->ID); ?></strong>
                                <?php echo get_field('testimonial_designation', $post_obj->ID); ?>
                            </div>
                        </div><!--/ Testimonials Item -->
                    <?php }else { ?> 
                        <p>No Testimonials is here</p>
                    <?php } ?>
                    <?php endwhile; 
                endif; ?>
            </div>
        </div>
    </div>
<?php } ?>