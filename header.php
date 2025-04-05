<?php
/**********************************************************************
* R.One Creative Wordpress Theme
*
* File name:
*      index.php
* Brief:
*      Default file for all pages if appropriate template doesn't found.
* Author:
*      R.One Creative
* Author URI:
*      http://r1creative.net
* Contact:
*      info@r1creative.net
***********************************************************************/
?>

<!DOCTYPE html>

<html <?php language_attributes(); ?>>

    <?php
        # Enable the code below if you want to output conditional
        # class for IE 6 - IE 8
        # echo r1()->printHtmlIeConditionals(); data-scrollbar
    ?>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <title><?php wp_title('|', true, 'right'); ?></title>

    <link rel="apple-touch-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/IMG_AppleShare.jpg"  />
    <link rel="shortcut icon" type="image/png" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/favicon.ico"/>

    <?php 
        $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'facebook_share_large'); 
        if(is_singular('blog') && $featured_img_url): 
    ?>
        <meta property="og:image" content="<?php echo $featured_img_url; ?>" />
    <?php else: ?>
        <meta property="og:image" content="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/IMG_ShareImage.jpg" />
    <?php endif; ?>

    <?php r1()->mobileMeta(); ?>
    
    <link rel="stylesheet" href="https://use.typekit.net/mfm0qcf.css">
    <!--[if lt IE 9]>
        <script src="assets/js/html5shiv.js" type="text/javascript"></script>
    <![endif]-->

    <script type='text/javascript' src='<?php echo get_stylesheet_directory_uri(); ?>/assets/js/modernizr.js'></script>
	<script type="text/javascript" src="https://secure.data-ingenuity.com/js/266240.js"></script>
    <?php wp_head(); ?>  
</head>

<body <?php body_class(); ?> id="my-scrollbar=">
	<noscript><img alt="" src="https://secure.data-ingenuity.com/266240.png"> style="display:none;" /></noscript>

    <div id="the-preloader" class="s-site-preloader">
        <div class="s-site-preloader__inner">
            <img class="s-site-preloader__image" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/IMG_Preloader.gif" alt="" />
        </div>
    </div>
    
    <div id="my-scrollbar" style="height: 100%;">
    <div class="c-hamburger__trgrs">
        <button class="js-search-trgr c-hamburger__search-btn"><i class="fas fa-search"></i></button>
        <button class="js-hamburger-trgr c-hamburger__button"><span></span></button>
    </div>

    <div id="s-search-modal" class="c-search">
        <div class="c-search__wrap">
            <?php $search_query = get_search_query(); ?>
            <form method="get" action="<?php bloginfo('url'); ?>">
                <input type="search" name="s" placeholder="Search" value="<?php echo $search_query; ?>">
                <button type="submit"><i class="fas fa-search"></i></button>
            </form>
        </div>
    </div><!--/ Search Modal --> 

    <div class="c-hamburger">
        <div class="c-header c-header-hamburger">
            <div class="grid-container">
                <div class="grid-x align-middle align-justify c-header__grid c-header-hamburger__grid">
                    <div class="cell shrink">
                        <a class="c-header__logo c-header-hamburger__logo" href="<?php bloginfo('url'); ?>">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/site-logo-white.png" alt="">
                        </a>
                    </div><!--/ Site Logo -->

                    <div class="cell shrink">
                        <a class="u-button c-header__button" href="<?php bloginfo('url'); ?>/request-a-quote/">Request a Quote</a>
                    </div>
                </div>
            </div>
        </div><!--/ Header -->

        <div class="grid-container c-hamburger__container">
            <?php
                $defaults = array(
                    'theme_location'  => 'hamburger-menu',
                    'menu'            => '',
                    'container'       => '',
                    'container_class' => '',
                    'container_id'    => '',
                    'menu_class'      => 's-hamburger-menu',
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

            <?php if( have_rows('social_links', 'options') ): ?>
                <div class="u-social u-social--hamburger">
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
    
    <div id="header" class="o-panel o-panel--header <?php if ( !is_home() || !is_front_page() ) { echo 'o-panel--header-inner'; } ?> o-panel--header-inner">
        <div class="c-tophat hide-for-small-only">
            <span class="c-tophat__bg"></span>
            
            <div class="grid-container">
                <div class="grid-x c-tophat__grid">
                    <?php
                        $defaults = array(
                            'theme_location'  => 'top-menu',
                            'menu'            => '',
                            'container'       => '',
                            'container_class' => '',
                            'container_id'    => '',
                            'menu_class'      => 's-tophat-menu hide-for-small-only',
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

                    <a class="c-tophat__phone-number" href="tel:<?php echo get_field('phone_number', 'options'); ?>"><i class="fas fa-phone-alt"></i> <span>Call</span> <?php echo get_field('phone_number', 'options'); ?></a>
                </div>
            </div>
        </div><!-- End Tophat -->

        <div class="c-header">
            <div class="grid-container">
                <div class="grid-x align-middle c-header__grid">
                    <div class="cell shrink">
                        <a class="c-header__logo" href="<?php bloginfo('url'); ?>">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/site-logo.png" alt="">
                        </a>
                    </div><!--/ Site Logo -->

                    <div class="cell auto c-header__menu-wrap align-middle hide-for-small-only">
                        <?php if(have_rows('menu_items', 'options')): ?>
                            <ul class="s-primary-menu">
                                <?php while(have_rows('menu_items', 'options')): the_row(); ?>
                                    <?php 
                                        global $wp;
                                        $current_page_link = home_url( $wp->request );
                                        $main_menu_item_label = get_sub_field('menu_item_label', 'options');
                                    ?>
                                    <?php if( get_sub_field('show_dropdown_menu', 'options') == 'Yes' ) { ?>
                                        <li class="menu-item-has-children <?php echo $current_page_link == get_sub_field('menu_item_link', 'options') ? 'current-menu-item' : ''; ?>"><a href="<?php echo get_the_permalink(get_sub_field('menu_item_link', 'options')->ID); ?>"><?php echo $main_menu_item_label; ?></a>
                                            <?php if(have_rows('dropdown_menu', 'options')): $count = 1; ?>
                                            <ul class="sub-menu">
                                                <?php while(have_rows('dropdown_menu', 'options')): the_row(); ?>
                                                    <?php if( $main_menu_item_label == 'Businesses' && $count == 4 ): ?>
                                                    <?php else: ?>
                                                        <div class='s-primary-menu__col col-<?php echo $count; ?>'>
                                                    <?php endif; ?>
                                                        <span><?php echo get_sub_field('menu_title', 'options'); ?></span>
                                                        <?php if(have_rows('dropdown_menu_items', 'options')): ?>
                                                            <?php while(have_rows('dropdown_menu_items', 'options')): the_row(); ?>
                                                                <li class="<?php echo $current_page_link == get_sub_field('menu_item_link', 'options') ? 'current-menu-item' : ''; ?>">  
                                                                    <a class="sub-menu-item-<?php echo title_to_slug(get_sub_field('dm_label', 'options')); ?>" href="<?php if( get_sub_field('scroll_to_section', 'options') == 'Yes' ) { ?><?php echo get_sub_field('section_id', 'options'); ?><?php }else { ?><?php echo get_the_permalink(get_sub_field('dm_link', 'options')->ID); ?><?php } ?>">
                                                                        <?php echo get_sub_field('dm_label', 'options'); ?>
                                                                    </a>
                                                                </li>
                                                            <?php endwhile; ?>
                                                        <?php endif; ?>
                                                    <?php if( $main_menu_item_label == 'Businesses' && $count == 3 ): ?>
                                                    <?php else: ?>
                                                        </div>
                                                    <?php endif; ?>
                                                <?php $count++; endwhile; ?>
                                            </ul>
                                        <?php endif; ?>
                                        <!--/ Section Loop -->
                                        </li>
                                    <?php }else { ?>
                                        <li class="<?php echo $current_page_link == get_sub_field('menu_item_link', 'options') ? 'current-menu-item' : ''; ?>"><a href="<?php echo get_the_permalink(get_sub_field('menu_item_link', 'options')->ID); ?>"><?php echo get_sub_field('menu_item_label', 'options'); ?></a></li>
                                    <?php } ?>
                                <?php endwhile; ?>
                            </ul>
                        <?php endif; ?>
                    </div><!--/ Menu -->

                    <div class="cell shrink">
                        <a class="u-button c-header__button" href="<?php bloginfo('url'); ?>/request-a-quote/">Request a Quote</a>
                    </div>
                </div>
            </div><!--/ Header -->
        </div>
    </div><!-- End Header Panel -->
