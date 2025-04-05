<?php
/*
* Template Name: Landing Page Template 
*/
?>

<!DOCTYPE html>
<html lang="en">
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
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/app.css">
    <!--[if lt IE 9]>
        <script src="assets/js/html5shiv.js" type="text/javascript"></script>
    <![endif]-->

    <script type='text/javascript' src='<?php echo get_stylesheet_directory_uri(); ?>/assets/js/modernizr.js'></script>
    <?php wp_head(); ?>  
</head>
<body <?php body_class(); ?>>
    <div class="c-landing-header wow wow-visible">
        <div class="grid-container u-landing-container">
            <a class="c-landing-header__logo" href="<?php bloginfo('url'); ?>">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/site-logo.png" alt="">
            </a>
        </div>
    </div><!-- End Landing Header -->
    
    <div id="landing-hero" class="o-panel o-panel--landing-hero">
        <div class="c-landing-hero">
            <div class="grid-container u-landing-container">
                <div class="grid-x grid-padding-x">
                    <div class="cell medium-12">
                        <div class="c-landing-hero__text">
                            <h2 class="c-landing-hero__title wow wow-visible"><?php echo get_field('landing_hero_title'); ?></h2>
                            <p class="wow wow-visible"><?php echo get_field('landing_hero_text'); ?></p>
							<div class="wow wow-visible">
                            	<a class="c-landing-hero__more js-scroll-btn2" href="<?php echo get_field('landing_hero_link'); ?>">Learn More</a>
							</div>
                        </div>
                    </div>
                    
                    <div class="cell medium-12">
                        <div class="c-landing-form">
                            <h3 class="c-landing-form__title wow wow-visible"><?php echo get_field('landing_form_text'); ?></h3>

                            <div class="c-landing-form__embed wow wow-visible">
                                <?php echo get_field('landing_hero_form_embed_code'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <span class="c-landing-form__bg"></span>
        </div>
    </div><!-- End Landing Hero -->
        
    <div id="body-content" class="o-panel o-panel--body-content">
        <div class="c-body-content">
            <div class="grid-container u-landing-container">
				<div class="wow wow-visible">
					<?php if(get_field('landing_body_content_image')) { ?>
						<span class="c-body-content__img-wrap">
							<img class="c-body-container__img size-medium wp-image-3304 alignleft" src="<?php echo get_field('landing_body_content_image'); ?>" alt="" width="685" height="485" />
						</span>
					<?php } ?>
					<div class="u-landing-container__right-contents">
						<?php echo get_field('landing_body_contents'); ?>
					</div>
				</div>
				<div class="wow wow-visible landing-bottom-contents">
					<?php echo get_field('landing_bottom_contents'); ?>
				</div>
            </div>
        </div>
    </div><!-- End Body Content -->

    <div id="landing-cta" class="o-panel o-panel--landing-cta">
        <div class="c-landing-cta">
            <div class="grid-container u-landing-container">
                <div class="c-landing-cta__text wow wow-visible">
                    <h3><?php echo get_field('landing_cta_text'); ?></h3>
                </div>
            </div>
        </div>
    </div><!-- End CTA Content -->

    <div id="landing-testimonial" class="o-panel o-panel--landing-testimonial">
        <div class="c-landing-testimonial">
            <div class="grid-container c-landing-testimonial__container">
                <div class="grid-x grid-padding-x">
                    <div class="cell medium-9 large-8">
                        <h2 class="c-landing-testimonial__title wow wow-visible">
                            <?php echo get_field('landing_testi_title'); ?>
                        
                            <span class="c-landing-testimonial__quote">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/quote.png" alt="">
                            </span>
                        </h2>
                    </div>
                    <div class="cell medium-15 large-16">
                        <div class="c-landing-testimonial__text">
                            <p class="wow wow-visible"><?php echo get_field('landing_testi_text'); ?></p>

                            <div class="c-landing-testimonial__client wow wow-visible">
                                <strong><?php echo get_field('landing_testi_name'); ?></strong>
                                <?php echo get_field('landing_testi_company'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- End Landing Testimonial -->

    <div id="landing-footer" class="o-panel o-panel--landing-footer">
        <div class="c-landing-footer">
            <div class="c-footer__bottom c-footer__bottom--landing">
                <div class="grid-container u-landing-container">
                    <div class="grid-x grid-paddig-x align-middle">
                        <div class="cell medium-24 large-auto">
                            <div class="c-landing-footer__col">
                                <p class="c-landing-footer__copyright-text">© 2021 Insurance Management Group. <a href="<?php bloginfo( 'url' ) ?>/privacy-policy/">Privacy Policy</a></p>

                                <div class="c-landing-footer__link"><a href="https://insurancemanagementgroup.com/">VISIT INSURANCEMANAGEMENTGROUP.COM</a></div>
                            </div>
                        </div>
                        
                        <div class="cell medium-24 large-shrink c-footer__social-col">
                            <?php if( have_rows('landing_social_links') ): ?>
                                <div class="u-social text-right">
                                    <?php while( have_rows('landing_social_links') ) : the_row(); ?>
                                        <a href="<?php echo get_sub_field('landing_social_link'); ?>" target="_blank"><i class="<?php echo get_sub_field('landing_social_class_name'); ?>"></i></a>
                                    <?php endwhile; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div><!--/ Footer Copyright Area -->
        </div>
    </div><!-- End Footer Panel -->

    <?php wp_footer(); ?>  
</body>
</html>
    
    