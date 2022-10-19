<?php
get_header();

// sidebar
$sidenav = get_field('linkGroup');

/* Start the Loop */
while(have_posts()) :
	the_post();

	?>

    <div class="grid-container">
		<?php get_template_part('resources/templates/parts/parts', 'sidebar', ['sidebar_data' => $sidenav]); ?>

        <div class="main-content<?= (isset($sidenav) && $sidenav) ? '' : ' full-width' ?>">
            <h1><?= the_title() ?></h1>
			<?= the_content() ?>
        </div>

    </div>
<?php
endwhile; // End of the loop.

get_footer();
