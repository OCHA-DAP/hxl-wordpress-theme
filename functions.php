<?php

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
		['src="/', 'href="/'],
		['src="'.get_stylesheet_directory_uri().'/assets/', 'href="'.get_stylesheet_directory_uri().'/assets/'],
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
