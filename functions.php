<?php

function hxl_admin_init()
{
	add_settings_field('hxl-google-tag-manager-token', 'HXL Google Tag Manager Token', 'render_hxl_google_tag_manager_token', 'general');
	register_setting('general', 'hxl-google-tag-manager-token');
}

add_action('admin_init', 'hxl_admin_init');
function render_hxl_google_tag_manager_token()
{
	echo '<input name="hxl-google-tag-manager-token" id="hxl-google-tag-manager-token" type="text" value="'.get_option('hxl-google-tag-manager-token').'" class="code">';
	echo '<p class="description" id="hxl-google-tag-manager-token-description">This token should look like <code>GTM-ABCD123</code>. Leave empty to disable.</p>';
}

// load parent styles
add_action('wp_enqueue_scripts', function() {
	wp_enqueue_style('child-style', get_stylesheet_directory_uri().'/styles/index.css');
	wp_enqueue_style('child-custom-style', get_stylesheet_directory_uri().'/styles/custom.css');
}, 999);

// load child scripts
add_action('wp_enqueue_scripts', function() {
	wp_register_script('child-script', get_stylesheet_directory_uri().'/js/custom.js', [], null, true); // footer
	wp_enqueue_script('child-script');
}, 20, 1); // footer

/**
 * Fix old (existing) media files with broken links - relative paths for Gatsby
 */
add_filter('the_content', function($content) {
	$content = str_ireplace(
		['src="/'],
		['src="'.get_stylesheet_directory_uri().'/assets/'],
		$content
	);
	return $content;
});

/**
 * Generate breadcrumbs
 */
function get_breadcrumb()
{
	echo '<a href="'.home_url().'">HXL Home</a>';
	if(is_category() || is_single()) {
		get_the_category('&bull;');
		if(is_single()) {
			echo '<a class="active">'.get_the_title().'</a>';
		}
	} elseif(is_front_page()) {
		echo '';
	} elseif(is_page()) {
		echo '<a class="active">'.get_the_title().'</a>';
	} elseif(is_search()) {
		echo '<a class="active">'.get_the_search_query().'</a>';
	}
}

/**
 * Generate menu links
 */
function get_menu_links()
{
	foreach(wp_get_nav_menu_items('primary-navigation') as $menu_item) {
		echo '<a href="'.$menu_item->url.'">'.$menu_item->post_title.'</a>';
	}
}

/**
 * Get organizations
 */
function get_organizations()
{
	return get_posts([
		'post_type' => 'organization',
		'post_status' => 'publish',
		'numberposts' => -1
	]);
}

/**
 * Get FAQ data
 */
function get_faq_data()
{
	// faq data
	$faqs_posts_ids = get_posts([
		'post_type' => 'faq',
		'post_status' => 'publish',
		'fields' => 'ids',
		'numberposts' => -1
	]);

	// faq groups
	$faq_groups = [];
	foreach($faqs_posts_ids as $faq_post_ID) {
		// append group
		$group = get_field('faq_group', $faq_post_ID);
		if(!isset($faq_groups[$group])) $faq_groups[$group] = [];

		// append data
		$faq_groups[$group][] = [
			'title' => get_the_title($faq_post_ID),
			'answer' => get_field('answer', $faq_post_ID)
		];
	}

	// sort group namesc asc
	ksort($faq_groups);

	return $faq_groups;
}

/**
 * Fix title separator
 */
add_filter('document_title_separator', function() {
	return '|';
}, 10, 1);

/**
 * Fix homepage title for og & Twitter meta tags
 */
add_filter('wp_title', function($title) {
	if(empty($title) && (is_home() || is_front_page())) {
		return get_bloginfo('name');
	}
	return $title;
});

/**
 * Add Google Tag Manager code (if set) to the head
 **/
add_action('wp_head', 'add_gtag_head_code', 1);
function add_gtag_head_code()
{
	$gtag_token = get_option('hxl-google-tag-manager-token');
	if($gtag_token): ?>
        <!-- Google Tag Manager -->
        <script>(function (w, d, s, l, i) {
                w[l] = w[l] || [];
                w[l].push({
                    'gtm.start':
                        new Date().getTime(), event: 'gtm.js'
                });
                var f = d.getElementsByTagName(s)[0],
                    j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';
                j.async = true;
                j.src =
                    'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
                f.parentNode.insertBefore(j, f);
            })(window, document, 'script', 'dataLayer', '<?=$gtag_token?>');</script>
        <!-- End Google Tag Manager -->
	<?php endif;
}

/**
 * Add Google Tag Manager noscript code (if set) after opening body tag
 **/
add_action('wp_body_open', 'add_gtag_head_noscript_code');
function add_gtag_head_noscript_code()
{
	$gtag_token = get_option('hxl-google-tag-manager-token');
	if($gtag_token): ?>
        <!-- Google Tag Manager (noscript) -->
        <noscript>
            <iframe src="https://www.googletagmanager.com/ns.html?id=<?= $gtag_token ?>"
                    height="0" width="0" style="display:none;visibility:hidden"></iframe>
        </noscript>
        <!-- End Google Tag Manager (noscript) -->
	<?php endif;
}
