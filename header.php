<?php
/**
 * This is the template that displays all of the <head> section and <header> section.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<?php wp_head(); ?>
    <script>document.documentElement.className = document.addEventListener ? 'js' : 'no-js';</script>
    <meta name="description"
          content="HXL is a different kind of data standard, designed to improve information sharing during a humanitarian crisis without adding extra reporting burdens.">
    <meta property="og:title" content="<?= wp_title('') ?>">
    <meta property="og:description"
          content="HXL is a different kind of data standard, designed to improve information sharing during a humanitarian crisis without adding extra reporting burdens.">
    <meta property="og:type" content="website">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:creator" content="@humdata">
    <meta name="twitter:title" content="<?= wp_title('') ?>">
    <meta name="twitter:description"
          content="HXL is a different kind of data standard, designed to improve information sharing during a humanitarian crisis without adding extra reporting burdens.">
    <meta name="og:image" content="<?= get_stylesheet_directory_uri() ?>/assets/images/og_hxl_solid.jpg">
    <meta name="og:width" content="1200">
    <meta name="og:height" content="630">
    <link rel="icon" href="<?= get_stylesheet_directory_uri() ?>/assets/images/favicon-32x32.png" type="image/png">
    <link rel="apple-touch-icon" sizes="48x48"
          href="<?= get_stylesheet_directory_uri() ?>/assets/images/icons/icon-48x48.png">
    <link rel="apple-touch-icon" sizes="72x72"
          href="<?= get_stylesheet_directory_uri() ?>/assets/images/icons/icon-72x72.png">
    <link rel="apple-touch-icon" sizes="96x96"
          href="<?= get_stylesheet_directory_uri() ?>/assets/images/icons/icon-96x96.png">
    <link rel="apple-touch-icon" sizes="144x144"
          href="<?= get_stylesheet_directory_uri() ?>/assets/images/icons/icon-144x144.png">
    <link rel="apple-touch-icon" sizes="192x192"
          href="<?= get_stylesheet_directory_uri() ?>/assets/images/icons/icon-192x192.png">
    <link rel="apple-touch-icon" sizes="256x256"
          href="<?= get_stylesheet_directory_uri() ?>/assets/images/icons/icon-256x256.png">
    <link rel="apple-touch-icon" sizes="384x384"
          href="<?= get_stylesheet_directory_uri() ?>/assets/images/icons/icon-384x384.png">
    <link rel="apple-touch-icon" sizes="512x512"
          href="<?= get_stylesheet_directory_uri() ?>/assets/images/icons/icon-512x512.png">
</head>
<body <?php body_class(); ?>>
<div class="wrapper">
	<?php get_template_part('resources/templates/parts/parts', 'header'); ?>
    <header>
        <div class="primary-nav">
            <div class="grid-container center--vertical">
                <a class="logo" href="<?= home_url() ?>">
                    <img src="<?= get_stylesheet_directory_uri() ?>/assets/images/logo-hxl.svg"
                         alt="<?= get_bloginfo('name') ?> Logo">
                </a>
                <nav aria-labelledby="primary-navigation" class="" id="primary-nav-menu">
					<?= get_menu_links() ?>
                </nav>
            </div>
            <button type="button" class="mobile-nav-toggle collapsed" aria-label="Mobile Nav Toggle">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="secondary-nav">
            <div class="grid-container center--vertical">
                <nav class="breadcrumbs" aria-labelledby="secondary-navigation">
					<?= get_breadcrumb() ?>
                </nav>
            </div>
        </div>
    </header>
