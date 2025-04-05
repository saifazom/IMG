<?php
/**********************************************************************
* R.One Creative Wordpress Theme
*
* File name:
*      custom_functions.php
* Brief:
*      Wordpress custom functions
* Author:
*      R.One Creative
* Author URI:
*      http://r1creative.net
* Contact:
*      info@r1creative.net

***********************************************************************/

/*=====================================================================
  Additional Functions
=====================================================================*/
function wpse196289_default_page_template() {
  global $post;
  if ( 'page' == $post->post_type 
      && 0 != count( get_page_templates( $post ) ) 
      && get_option( 'page_for_posts' ) != $post->ID // Not the page for listing posts
      && '' == $post->page_template // Only when page_template is not set
  ) {
      $post->page_template = "tpl-landing-page.php";
  }
}
add_action('add_meta_boxes', 'wpse196289_default_page_template', 1);


function img_blog_filter( $query ) {
	$posts_to_exclude = [];
	$page_ID = 3203;
	
	if ( is_post_type_archive('blog') && !is_admin() ){
		$query->set( 'post__not_in', $posts_to_exclude );	
	}
	
	return $query;
}
// add_filter( 'pre_get_posts', 'img_blog_filter' );

function get_blog_page_id(){
	return 3203;
}

function get_excluded_posts(){
	$page_ID = get_blog_page_id();
	$posts_to_exclude = [];
	
	if( have_rows('fetured_posts', $page_ID) ) :
		while(have_rows('fetured_posts', $page_ID)): the_row('fetured_posts', $page_ID);
			$posts_to_exclude[] = get_sub_field('select_post', $page_ID)->ID;
		endwhile;
	endif;
	
	return $posts_to_exclude;
}

function img_get_blog_posts(){
	
	$blog_posts_html = '';
	$offset = 0;
	$posts_to_exclude = get_excluded_posts();
	
	$show_explore_button = true;
	$posts_per_page = get_option( 'posts_per_page' );
	$current_index = isset($_GET['current_index']) ? $_GET['current_index'] : 1;
	$category = isset($_GET['category']) ? $_GET['category'] : 'all';
	
	$blog_args = [
		'post_type' => 'blog',
		'post__not_in' => $posts_to_exclude
	];
	
	if($category && $category != 'all'){
		$blog_args['tax_query'][] = array(
			'taxonomy' => 'blog-category',
			'field'    => 'slug',
			'terms'    => array($category)
		);
	}
	
	if($current_index > 1){
		$offset = ($current_index - 1) * $posts_per_page;
		$blog_args['offset'] = $offset;
	}
	
	$blog_query = new WP_Query($blog_args);
	
	$count = 0;
	ob_start();
	while($blog_query->have_posts()): $blog_query->the_post();
		get_template_part('inc/loop', 'blog');
	$count++; endwhile; 
	wp_reset_postdata();
	
	if($count < $posts_per_page){
		$show_explore_button = false;
	}
	
	$blog_posts_html = ob_get_clean();
	
	$returned_data = [];
	$returned_data['html'] = $blog_posts_html;
	$returned_data['show_button'] = $show_explore_button;
	$returned_data['blog_args'] = $blog_args;
	$returned_data['properties'] = 'one';
	$returned_data['query'] = 'two';

	echo json_encode($returned_data);

	die();
}

function img_blog_posts_actions(){
	add_action('wp_ajax_nopriv_load-posts-by-category', 'img_get_blog_posts');
	add_action('wp_ajax_load-posts-by-category', 'img_get_blog_posts');
}

add_action('init', 'img_blog_posts_actions');

/* check if user using smaller mobile device */
function my_wp_is_mobile() {
	include_once( get_template_directory() . '/Mobile_Detect.php');
	
	$detect = new Mobile_Detect;
	
	if( $detect->isMobile() && !$detect->isTablet() ) {
		return true;
	} else {
		return false;
	}
}
 
/* check if user using tablet device */
function my_wp_is_tablet() {
	include_once( get_template_directory() . '/Mobile_Detect.php');
	
	$detect = new Mobile_Detect;
	
	if( $detect->isTablet() ) {
		return true;
	} else {
		return false;
	}
}

add_action('admin_head', 'hide_dashboard_menu_for_user');

function hide_dashboard_menu_for_user() {
	$current_user = wp_get_current_user();
	
	if($current_user->user_login == 'img'){
		echo '<style>
			#menu-posts,
			#menu-comments{
				display: none !important;	
			}
		</style>';	
	}
}

add_filter('pre_get_posts', function($query){
	if (!$query->is_admin && $query->is_search) {
		$query->set('post_type', array('page', 'benefits-products', 'business-products', 'personal-products', 'industry'));
		$query->set('posts_per_page', 40);
	}
	return $query;
});

function title_to_slug($text){
	// replace non letter or digits by -
	$text = preg_replace('~[^\pL\d]+~u', '-', $text);

	// transliterate
	$text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

	// remove unwanted characters
	$text = preg_replace('~[^-\w]+~', '', $text);

	// trim
	$text = trim($text, '-');

	// remove duplicate -
	$text = preg_replace('~-+~', '-', $text);

	// lowercase
	$text = strtolower($text);

	if (empty($text)) {
		return 'n-a';
	}

	return $text;
}

/**
 * Proper way to enqueue scripts and styles
 */

function cc_mime_types($mimes)
{
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

function _remove_script_version($src)
{
  $parts = explode('?', $src);
  return $parts[0];
}

function mastertheme_styles_scripts(){
	wp_enqueue_style('r1-app', get_template_directory_uri() . '/assets/css/app.css', [], time(), false );
	wp_enqueue_style( 'r1-lity-style', get_template_directory_uri() . '/assets/js/lity/lity.min.css', [], false, false );
	
	wp_enqueue_script('r1-slick', get_template_directory_uri() . '/assets/js/slick.min.js', ['jquery'], false, true );
	wp_enqueue_script( 'r1-wowslider', get_template_directory_uri() . '/assets/js/wowslider.js', ['jquery'], false, true);
	wp_enqueue_script( 'r1-lity-script', get_template_directory_uri() . '/assets/js/lity/lity.min.js', ['jquery'], false, true );
	wp_enqueue_script( 'r1-lity-youtube-script', get_template_directory_uri() . '/assets/js/lity/plugins/youtube/youtube.min.js', ['jquery'], false, true );
	wp_enqueue_script( 'r1-wowslider-script', get_template_directory_uri() . '/assets/js/wow-script.js', ['jquery'], false, true);
	wp_enqueue_script( 'r1-lightcase-script', get_template_directory_uri() . '/assets/js/lightcase.js', [], '', true );
	wp_enqueue_script( 'r1-infinite-scroll-script', get_template_directory_uri() . '/assets/js/infinite-scroll.min.js', ['jquery'], '', true );
	wp_enqueue_script( 'r1-gsap-script', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js', [], '', true);
	wp_enqueue_script('r1-ScrollMagic-script', 'https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/ScrollMagic.min.js', [], '', true );
	wp_enqueue_script('r1-scrollmagic-animation', 'https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/plugins/animation.gsap.min.js', [], '', true);
	wp_enqueue_script('r1-ScrollMagic-indicators', 'https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/plugins/debug.addIndicators.min.js', [], '', true );
	wp_enqueue_script('r1-smoothScrollbar', 'https://cdnjs.cloudflare.com/ajax/libs/smooth-scrollbar/8.5.2/smooth-scrollbar.js', [], '', true );
	// wp_enqueue_script('r1-masonry-pkgd', 'https://npmcdn.com/isotope-layout@3/dist/isotope.pkgd.js', [], '', true);
	wp_enqueue_script( 'r1-infinity-scroll', 'https://unpkg.com/infinite-scroll@4/dist/infinite-scroll.pkgd.min.js', [], '', true);
}

add_action('wp_enqueue_scripts', 'mastertheme_styles_scripts');

/**
 * Enable vCard Upload
 *
 */
function be_enable_vcard_upload($mime_types)
{
  $mime_types['vcf'] = 'text/x-vcard';
  return $mime_types;
}

add_filter('upload_mimes', 'be_enable_vcard_upload');

function my_acf_load_value($value, $post_id, $field)
{
  // run the_content filter on all textarea values
  $value = apply_filters('the_content', $value);
  $value = str_replace(
    "<!--more-->",
    '<span id="more-' . $post_id . '"></span>',
    $value
  );

  return $value;
}

add_filter('acf/load_value/type=wysiwyg', 'my_acf_load_value', 10, 3);

add_image_size('team_member_photo', 345, 292, 1);

function create_slug($string)
{
  $slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
  return $slug;
}

add_filter('gform_confirmation_anchor', '__return_false');

if (function_exists('acf_add_options_page')) {
  // add parent
  $parent = acf_add_options_page([
    'page_title' => 'Theme Settings',
    'menu_title' => 'Theme Settings',
    'redirect' => false,
  ]);
}

add_action('admin_head', 'mastertheme_custom_styles');

function mastertheme_custom_styles()
{
  echo '<link rel="stylesheet" href="' .
    get_stylesheet_directory_uri() .
    '/engine/asset/css/module_styles.css" type="text/css" media="all" />';
}

function pagination_bar($custom_query)
{
  $total_pages = $custom_query->max_num_pages;
  $big = 999999999; // need an unlikely integer

  if ($total_pages > 1) {
    $current_page = max(1, get_query_var('paged'));

    echo paginate_links([
      'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
      'format' => '?paged=%#%',
      'current' => $current_page,
      'total' => $total_pages,
    ]);
  }
}

/*=====================================================================
  End of Additional Functions
=====================================================================*/

add_action('after_setup_theme', 'r1mastertheme_setup');

if (!function_exists('r1mastertheme_setup')):
  function r1mastertheme_setup()
  {
    # Enable the theme for mobile view
    r1()->_isMobile = true;

    # Enable debugging...
    r1()->_enableDebug = false;

    # Enable modernizr
    r1()->enableModule('modernizr');

    # Register navigations for menu
    r1ts()->registerNavMenu([
      'top-menu' => 'Top Menu',
      'primary-menu' => 'Primary Menu',
      'hamburger-menu' => 'Hamburger Menu',
      'about-img-footer-menu' => 'Footer About IMG Menu',
      'resources-footer-menu' => 'Footer Resources Menu',
      'client-logins-footer-menu' => 'Footer Client Logins Menu',
      'support-footer-menu' => 'Footer Support Menu',
    ]);

    # Enable dashboard welcome contents
    r1()->enableModule('dashboard-welcome-contents');

    # Enable featured post for the theme
    r1ts()->enableFeaturedPost();

    add_theme_support('html5', ['gallery', 'caption']);
    add_theme_support('title-tag');

    # Fix some default security issue
    # r1ts()->do_security_checking();

    # Rander Assets
    # Usually when a module randered, it renders both style and script of that module.
    # So module name can be passed through the rander function and those module
    # will be consider for exclusion.

    r1()->randerCss();
    r1()->randerJs();
  }


function reading_time() {
   global $post;

   $content = get_post_field( 'post_content', $post->ID );
   $word_count = str_word_count( strip_tags( $content ) );
   $readingtime = ceil($word_count / 200);

   $timer = " minute read";
   $totalreadingtime = $readingtime . $timer;
   
   return $totalreadingtime;
}
  /*===============================
    Custom Post Type
=================================*/

  $labels = [
    'name' => 'Personal Insurance',
    'singular_name' => 'Personal Insurance',
    'add_new' => 'Add New Personal Insurance',
    'add_new_item' => 'Add New Personal Insurance',
    'edit_item' => 'Edit Personal Insurance',
    'new_item' => 'New Personal Insurance',
    'all_items' => 'All Personal Insurance',
    'view_item' => 'View Personal Insurance',
    'search_items' => 'Search Personal Insurance',
    'not_found' => 'No Personal Insurance found',
    'not_found_in_trash' => 'No Personal Insurance found in Trash',
    'parent_item_colon' => '',
    'menu_name' => "Personal Insurance&nbsp;&nbsp;",
  ];

  $args = [
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'query_var' => true,
    'rewrite' => ['slug' => 'personal-products'],
    'capability_type' => 'post',
    'has_archive' => true,
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => ['title', 'editor', 'excerpt'],
  ];
  r1ts()->registerPostType(__('personal-products', 'r1'), $labels, $args);

  $labels = [
    'name' => 'Business Insurance',
    'singular_name' => 'Business Insurance',
    'add_new' => 'Add New Business Insurance',
    'add_new_item' => 'Add New Business Insurance',
    'edit_item' => 'Edit Business Insurance',
    'new_item' => 'New Business Insurance',
    'all_items' => 'All Business Insurance',
    'view_item' => 'View Business Insurance',
    'search_items' => 'Search Business Insurance',
    'not_found' => 'No Business Insurance found',
    'not_found_in_trash' => 'No Business Insurance found in Trash',
    'parent_item_colon' => '',
    'menu_name' => 'Business Insurance',
  ];

  $args = [
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'query_var' => true,
    'rewrite' => ['slug' => 'business-products'],
    'capability_type' => 'post',
    'has_archive' => true,
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => ['title', 'editor', 'excerpt'],
  ];
  r1ts()->registerPostType(__('business-products', 'r1'), $labels, $args);

  $labels = [
    'name' => 'Benefits Insurance',
    'singular_name' => 'Benefits Insurance',
    'add_new' => 'Add New Benefits Insurance',
    'add_new_item' => 'Add New Benefits Insurance',
    'edit_item' => 'Edit Benefits Insurance',
    'new_item' => 'New Benefits Insurance',
    'all_items' => 'All Benefits Insurance',
    'view_item' => 'View Benefits Insurance',
    'search_items' => 'Search Benefits Insurance',
    'not_found' => 'No Benefits Insurance found',
    'not_found_in_trash' => 'No Benefits Insurance found in Trash',
    'parent_item_colon' => '',
    'menu_name' => 'Benefits Insurance&nbsp;&nbsp;',
  ];

  $args = [
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'query_var' => true,
    'rewrite' => ['slug' => 'benefits-products'],
    'capability_type' => 'post',
    'has_archive' => true,
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => ['title', 'editor', 'excerpt'],
  ];
  r1ts()->registerPostType(__('benefits-products', 'r1'), $labels, $args);

  $labels = [
    'name' => 'Industry',
    'singular_name' => 'Industry',
    'add_new' => 'Add New Industry',
    'add_new_item' => 'Add New Industry',
    'edit_item' => 'Edit Industry',
    'new_item' => 'New Industry',
    'all_items' => 'All Industry',
    'view_item' => 'View Industry',
    'search_items' => 'Search Industry',
    'not_found' => 'No Industry found',
    'not_found_in_trash' => 'No Industry found in Trash',
    'parent_item_colon' => '',
    'menu_name' => 'Industry',
  ];

  $args = [
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'query_var' => true,
    'rewrite' => ['slug' => 'industry'],
    'capability_type' => 'post',
    'has_archive' => true,
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => ['title', 'editor', 'excerpt'],
  ];
  r1ts()->registerPostType(__('industry', 'r1'), $labels, $args);

  // Register Post Type Testimonial
  $labels = [
    'name' => 'Testimonial',
    'singular_name' => 'Testimonial',
    'add_new' => 'Add New Testimonial',
    'add_new_item' => 'Add New Testimonial',
    'edit_item' => 'Edit Testimonial',
    'new_item' => 'New Testimonial',
    'all_items' => 'All Testimonials',
    'view_item' => 'View Testimonial',
    'search_items' => 'Search Testimonial',
    'not_found' => 'No Testimonial found',
    'not_found_in_trash' => 'No Testimonial found in Trash',
    'parent_item_colon' => '',
    'menu_name' => 'Testimonial',
  ];

  $args = [
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'query_var' => true,
    'rewrite' => ['slug' => 'testimonial'],
    'capability_type' => 'post',
    'has_archive' => true,
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => ['title', 'editor', 'excerpt'],
  ];
  r1ts()->registerPostType(__('testimonial', 'r1'), $labels, $args);

  // Register Post Type Testimonial
  $labels = [
    'name' => 'Our Team',
    'singular_name' => 'Our Team',
    'add_new' => 'Add New Team',
    'add_new_item' => 'Add New Team',
    'edit_item' => 'Edit Our Team',
    'new_item' => 'New Our Team',
    'all_items' => 'All Our Team',
    'view_item' => 'View Our Team',
    'search_items' => 'Search Our Team',
    'not_found' => 'No Our Team found',
    'not_found_in_trash' => 'No Team found in Trash',
    'parent_item_colon' => '',
    'menu_name' => 'Our Team',
  ];

  $args = [
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'query_var' => true,
    'rewrite' => ['slug' => 'our-team'],
    'capability_type' => 'post',
    'has_archive' => false,
    'hierarchical' => false,
    'menu_position' => null,
    'show_in_rest' => true,
    'supports' => ['title', 'excerpt'],
  ];
  r1ts()->registerPostType(__('our-team', 'r1'), $labels, $args);

  add_action('init', 'create_taxonomies');

  function create_taxonomies()
  {
    register_taxonomy('our-team-category', 'our-team', [
      'label' => __('Our Team Category'),
      'rewrite' => ['slug' => 'our-team-category'],
      'hierarchical' => true,
    ]);
  }

  $labels = [
    'name' => 'Blog',
    'singular_name' => 'Blog',
    'add_new' => 'Add New Blog',
    'add_new_item' => 'Add New Blog',
    'edit_item' => 'Edit Blog',
    'new_item' => 'New Blog',
    'all_items' => 'All Blog',
    'view_item' => 'View Blog',
    'search_items' => 'Search Blog',
    'not_found' => 'No Blog found',
    'not_found_in_trash' => 'No Blog found in Trash',
    'parent_item_colon' => '',
    'menu_name' => 'Blog',
  ];

  $args = [
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'query_var' => true,
    'rewrite' => ['slug' => 'blog'],
    'capability_type' => 'post',
    'has_archive' => true,
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => [
      'title',
      'editor',
      'excerpt',
      'thumbnail',
      'author',
      'comments',
    ],
  ];
  r1ts()->registerPostType(__('blog', 'r1'), $labels, $args);

  add_action( 'init', 'blog_taxonomies' );

  function blog_taxonomies() {
      register_taxonomy( 'blog-category', 'blog',
          array(
              'label' => __( 'Blog Category' ),
              'rewrite' => array( 'slug' => 'blog-category' ),
              'hierarchical' => true,
          )
      );
      // register_taxonomy( 'featured-posts', 'blog',
      //     array(
      //         'label' => __( 'Featured Posts' ),
      //         'rewrite' => array( 'slug' => 'featured-posts' ),
      //         'hierarchical' => true,
      //     )
      // );
  }

  // Register Post Type Testimonial
  $labels = [
    'name' => 'Faq',
    'singular_name' => 'Faq',
    'add_new' => 'Add New Faq',
    'add_new_item' => 'Add New Faq',
    'edit_item' => 'Edit Faq',
    'new_item' => 'New Faq',
    'all_items' => 'All Faq',
    'view_item' => 'View Faq',
    'search_items' => 'Search Faq',
    'not_found' => 'No Faq found',
    'not_found_in_trash' => 'No Faq found in Trash',
    'parent_item_colon' => '',
    'menu_name' => 'Faq',
  ];

  $args = [
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'query_var' => true,
    'rewrite' => ['slug' => 'faq'],
    'capability_type' => 'post',
    'has_archive' => false,
    'hierarchical' => false,
    'menu_position' => null,
    'show_in_rest' => true,
    'supports' => ['title', 'editor'],
  ];
  r1ts()->registerPostType(__('faq', 'r1'), $labels, $args);

  add_action('init', 'faq_taxonomies');

  function faq_taxonomies()
  {
    register_taxonomy('faq-category', 'faq', [
      'label' => __('Faq Category'),
      'rewrite' => ['slug' => 'faq-category'],
      'hierarchical' => true,
    ]);
  }
endif;
