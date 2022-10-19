<?php
/**
 * <header> content with top-nav content.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */
?>

<header class="cd-header">
    <div class="cd-global-header">
        <div class="cd-container cd-global-header__inner">
            <div class="region region-header-top cd-global-header__actions" id="cd-global-header__actions">
                <!-- language changer can go here -->
            </div>
			<?php get_template_part('resources/templates/parts/parts', 'ocha-services'); ?>
        </div>
    </div>
</header>
