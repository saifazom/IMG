        <div id="footer" class="o-panel o-panel--footer">
            <div class="c-footer">
                <div class="grid-container">
					<div class="c-footer__big-i-banner c-big-i-banner">
						<div class="c-big-i-banner__logo">
							<img src="<?php echo get_field('big_i_banner_logo', 'options'); ?>" alt="Big | Logo">
						</div>
						<h3 class="c-big-i-banner__title">
							<?php echo get_field('big_i_banner_text', 'options'); ?>
						</h3>
					</div><!--/ Big I Banner -->
					
                    <div class="grid-x grid-padding-x c-footer__grid-x">
                        <div class="cell small-12 medium-6 large-4">
                            <h4 class="c-footer__title">About IMG</h4>
                            
                            <div class="c-footer__menu">
                                <?php
                                    $defaults = array(
                                        'theme_location'  => 'about-img-footer-menu',
                                        'menu'            => '',
                                        'container'       => '',
                                        'container_class' => '',
                                        'container_id'    => '',
                                        'menu_class'      => '',
                                        'menu_id'         => '',
                                        'echo'            => true,
                                        'fallback_cb'     => 'wp_page_menu',
                                        'before'          => '',
                                        'after'           => '',
                                        'link_before'     => '',
                                        'link_after'      => '',
                                        'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                        'depth'           => 0,
                                        'walker'          => ''
                                    );

                                    wp_nav_menu( $defaults );
                                ?>
                            </div>
                        </div><!--/ Menu -->

                        <div class="cell small-12 medium-6 large-4">
                            <h4 class="c-footer__title">Resources</h4>
                            
                            <div class="c-footer__menu">
                                <?php
                                    $defaults = array(
                                        'theme_location'  => 'resources-footer-menu',
                                        'menu'            => '',
                                        'container'       => '',
                                        'container_class' => '',
                                        'container_id'    => '',
                                        'menu_class'      => '',
                                        'menu_id'         => '',
                                        'echo'            => true,
                                        'fallback_cb'     => 'wp_page_menu',
                                        'before'          => '',
                                        'after'           => '',
                                        'link_before'     => '',
                                        'link_after'      => '',
                                        'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                        'depth'           => 0,
                                        'walker'          => ''
                                    );

                                    wp_nav_menu( $defaults );
                                ?>
                            </div>
                        </div><!--/ Menu -->

                        <div class="cell small-12 medium-7 large-4">
                            <h4 class="c-footer__title">Client Logins</h4>
                            
                            <div class="c-footer__menu">
                                <?php
                                    $defaults = array(
                                        'theme_location'  => 'client-logins-footer-menu',
                                        'menu'            => '',
                                        'container'       => '',
                                        'container_class' => '',
                                        'container_id'    => '',
                                        'menu_class'      => '',
                                        'menu_id'         => '',
                                        'echo'            => true,
                                        'fallback_cb'     => 'wp_page_menu',
                                        'before'          => '',
                                        'after'           => '',
                                        'link_before'     => '',
                                        'link_after'      => '',
                                        'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                        'depth'           => 0,
                                        'walker'          => ''
                                    );

                                    wp_nav_menu( $defaults );
                                ?>
                            </div>
                        </div><!--/ Menu -->

                        <div class="cell small-12 medium-5 large-3">
                            <h4 class="c-footer__title">Support</h4>
                            
                            <div class="c-footer__menu">
                                <?php
                                    $defaults = array(
                                        'theme_location'  => 'support-footer-menu',
                                        'menu'            => '',
                                        'container'       => '',
                                        'container_class' => '',
                                        'container_id'    => '',
                                        'menu_class'      => '',
                                        'menu_id'         => '',
                                        'echo'            => true,
                                        'fallback_cb'     => 'wp_page_menu',
                                        'before'          => '',
                                        'after'           => '',
                                        'link_before'     => '',
                                        'link_after'      => '',
                                        'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                        'depth'           => 0,
                                        'walker'          => ''
                                    );

                                    wp_nav_menu( $defaults );
                                ?>
                            </div>
                        </div><!--/ Menu -->

                        <div class="cell small-24 medium-24 large-9">
                            <div class="c-footer__text">
                                <p><?php echo get_field('footer_logo_text', 'options'); ?></p>

                                <?php if( have_rows('footer_logos', 'options') ): ?>
                                    <div class="c-footer__logos">
                                        <?php $count = 1; while( have_rows('footer_logos', 'options') ) : the_row(); ?>
                                            <div class="c-footer__logo c-footer__logo--<?php echo $count; ?>">
                                                <img src="<?php echo get_sub_field('footer_logo', 'options'); ?>" alt="">
                                            </div>
                                        <?php $count++; endwhile; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        </div><!--/ Copyright -->

                        <div class="cell text-center">
                            <div class="c-footer__disclaimer">
                                <?php echo get_field('footer_disclaimer_text', 'options'); ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="c-footer__bottom">
                    <div class="grid-container">
                        <div class="grid-x grid-paddig-x">
                            <div class="cell small-24 medium-14">
                                <p class="c-footer__copyright-text">© <?php echo date('Y'); ?> Insurance Management Group. <span> Design by <a href="http://r1creative.net" target="_blank">R. One Creative</a></span></p>
                            </div>

                            <div class="cell small-24 medium-10 c-footer__social-col">
                                <?php if( have_rows('social_links', 'options') ): ?>
                                    <div class="u-social text-right">
                                        <?php while( have_rows('social_links', 'options') ) : the_row(); ?>
                                            <a href="<?php echo get_sub_field('social_link', 'options'); ?>" target="_blank"><i class="<?php echo get_sub_field('class_name', 'options'); ?>"></i></a>
                                        <?php endwhile; ?>
                                        
                                        <?php if (get_field('phone_number', 'options')) { ?>
                                            <a href="tel:<?php echo get_field('phone_number', 'options'); ?>"><i class="fas fa-phone-alt"></i></a>
                                        <?php } ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div><!--/ Footer Copyright Area -->
            </div>
        </div><!-- End Footer Panel -->

        <?php wp_footer(); ?>

        </div>
    </body>
</html>