<?php


function customContent() {
  echo '<div><p>Custom Lorem Ipsum Content</p></div>';
}

/* add widget */
function add_customDashboardWidget() {
  wp_add_dashboard_widget('wp_dashboard_widget', 'Custom Content', 'customContent');
}

/* add action */
//add_action('wp_dashboard_setup', 'add_customDashboardWidget' );


function remove_dashboard_widgets() {
	global $wp_meta_boxes;

	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_drafts']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);

}

add_action('wp_dashboard_setup', 'remove_dashboard_widgets' );


// disable default dashboard widgets
function disable_default_dashboard_widgets() {
	remove_meta_box('dashboard_right_now', 'dashboard', 'core');
	remove_meta_box('dashboard_recent_comments', 'dashboard', 'core');
	remove_meta_box('dashboard_incoming_links', 'dashboard', 'core');
	remove_meta_box('dashboard_plugins', 'dashboard', 'core');

	remove_meta_box('dashboard_quick_press', 'dashboard', 'core');
	remove_meta_box('dashboard_recent_drafts', 'dashboard', 'core');
	remove_meta_box('dashboard_primary', 'dashboard', 'core');
	remove_meta_box('dashboard_secondary', 'dashboard', 'core');
}
//add_action('admin_menu', 'disable_default_dashboard_widgets');


//add_action('admin_head-index.php', 'show_r1_custom_dashboard_contents');

function show_r1_custom_dashboard_contents()
{
    // Check if Welcome Panel is being displayed
    //$option = get_user_meta( get_current_user_id(), 'show_welcome_panel', true );
    //if( !$option )
    //    return;

	$externalHtml = 'this is default staff';
    $externalHtml = file_get_contents(TEMPLATEPATH."/dashboard-welcome-contents/welcome-html.php", true);

    $htmlOutput = str_replace(array("\r\n", "\r"), "\n", $externalHtml);
	$htmlLines = explode("\n", $htmlOutput);
	$htmlNewLines = array();

	foreach ($htmlLines as $i => $htmlLine) {
	    if(!empty($htmlLine))
	        $htmlNewLines[] = trim($htmlLine);
	}

	$externalHtml = implode($htmlNewLines);
	$externalHtml = str_replace('@@theme_directory@@', get_stylesheet_directory_uri().'/modules', $externalHtml);

    $externalScripts = file_get_contents(TEMPLATEPATH."/modules/dashboard-welcome-contents/script.js", true);
    $externalScripts = str_replace('@@htmlplaceholder@@', $externalHtml, $externalScripts);
    //echo '<script type="text/javascript">'.$externalScripts.'</script>';
}

//add_action ('admin_head', 'add_css_to_dashboard');
add_action( 'admin_print_styles-index.php', 'r1_custom_welcome_screen_styles' );

function r1_custom_welcome_screen_styles(){
	$externalStyles = '<link rel="stylesheet" href="'.get_stylesheet_directory_uri().'/modules/dashboard-welcome-contents/style.css">';
	echo $externalStyles;
}

add_action( 'admin_enqueue_scripts', 'r1_custom_welcome_screen_scripts' );
function r1_custom_welcome_screen_scripts($hook) {
    if( 'index.php' != $hook )
        return;

    $externalHtml = 'this is default staff';
    $externalHtml = <<<EOT
    <div id="custom-welcome-screen">
    	<div class="custom-welcome-header">
            <h3>Welcome to your dashboard!</h3>
    		<img src="@@theme_directory@@/dashboard-welcome-contents/images/site-logo-white.png" />
    	</div>
    	<hr />
    	<div class="custom-welcome-body">
    		<div class="task-button-panel admin">
    		    <p class="task-label">Admin & Main Pages</p>
    			<ul class="task-buttons">
    				<li class="task-button">
                        <a href="admin.php?page=gf_edit_forms">View Forms </a>
                    </li>
                    <li class="task-button">
                        <a href="users.php">Update Users</a>
                    </li>
                    <li class="task-button">
                        <a href="edit.php?post_type=our-team">Update Team</a>
                    </li>
                    <li class="task-button">
                        <a href="edit.php?post_type=testimonial">Add testimonials</a>
                    </li>
    			</ul>
                <ul class="task-buttons" style="margin-left: 195px;">
    				<li class="task-button">
                        <a href="post-new.php?post_type=blog">Add Blog</a>
                    </li>
                    <li class="task-button">
                        <a href="post-new.php?post_type=faq">Add FAQ</a>
                    </li>
                    <li class="task-button">
                        <a href="post.php?post=14&action=edit">Add Resources Video</a>
                    </li>
                    <li class="task-button">
                        <a href="post-new.php?post_type=page">New Landing Page</a>
                    </li>
    			</ul>
    		</div>

            <div class="task-button-panel personal">
                <p class="task-label">Personal</p>
                <ul class="task-buttons">
                    <li class="task-button">
                        <a href="post.php?post=22&action=edit">Edit Main Page</a>
                    </li>
                    <li class="task-button">
                        <a href="edit.php?post_type=personal-products">Edit Products</a>
                    </li>
                    <li class="task-button">
                        <a href="post-new.php?post_type=personal-products">Add Product</a>
                    </li>
                    <li class="task-button">
                        <a href="post.php?post=254&action=edit">Edit Services</a>
                    </li>
                </ul>
            </div>

            <div class="task-button-panel commercial">
                <p class="task-label">Commercial</p>
                <ul class="task-buttons">
                    <li class="task-button">
                        <a href="post.php?post=24&action=edit">Edit Main Page</a>
                    </li>
                    <li class="task-button">
                        <a href="edit.php?post_type=business-products">Edit Products</a>
                    </li>
                    <li class="task-button">
                        <a href="post-new.php?post_type=business-products">Add Product</a>
                    </li>
                    <li class="task-button">
                        <a href="post.php?post=246&action=edit">Edit Services</a>
                    </li>
                    <li class="task-button">
                        <a href="edit.php?post_type=industry">Update Industry</a>
                    </li>
                </ul>
            </div>

            <div class="task-button-panel benefits">
                <p class="task-label">Benefits</p>
                <ul class="task-buttons">
                    <li class="task-button">
                        <a href="post.php?post=26&action=edit">Edit Main Page</a>
                    </li>
                    <li class="task-button">
                        <a href="edit.php?post_type=benefits-products">Edit Products</a>
                    </li>
                    <li class="task-button">
                        <a href="post-new.php?post_type=benefits-products">Add Products</a>
                    </li>
                    <li class="task-button">
                        <a href="post.php?post=248&action=edit">Edit Services</a>
                    </li>
                </ul>
            </div>
    	</div>
    	<div class="custom-welcome-footer">
    		<a href="http://r1creative.net" target="_blank">BUILT BY R. ONE CREATIVE</a>
    	</div>
    </div>
EOT;

    $htmlOutput = str_replace(array("\r\n", "\r"), "\n", $externalHtml);
	$htmlLines = explode("\n", $htmlOutput);
	$htmlNewLines = array();

	foreach ($htmlLines as $i => $htmlLine) {
	    if(!empty($htmlLine))
	        $htmlNewLines[] = trim($htmlLine);
	}

	$externalHtml = implode($htmlNewLines);
	$externalHtml = str_replace('@@theme_directory@@', get_stylesheet_directory_uri().'/modules', $externalHtml);

    wp_enqueue_script( 'welcome_screen_script', get_stylesheet_directory_uri().'/modules/dashboard-welcome-contents/script.js');
    wp_localize_script( 'welcome_screen_script', 'wp_cs_vars',
		array(
			'html_content' => $externalHtml
		)
	);
}
