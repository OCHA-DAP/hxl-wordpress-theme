<?php
get_header();

// sidebar
$sidenav = get_field('linkGroup');
// faq data
$faq_groups = get_faq_data();

/* Start the Loop */
while(have_posts()) :
	the_post();

	?>

    <div class="<?= (basename(get_permalink()) == 'hxlexample') ? 'viewport-container' : '' ?>">
        <div class="grid-container">
			<?php get_template_part('resources/templates/parts/parts', 'sidebar', ['sidebar_data' => $sidenav]); ?>

            <div class="main-content<?= (isset($sidenav) && $sidenav) ? '' : ' full-width' ?>">
                <h1><?= the_title() ?></h1>
				<?php the_content(); ?>
				<?php if(basename(get_permalink()) == 'how-it-works') : ?>
					<?php get_template_part('resources/templates/parts/parts', 'faq', ['faq_data' => $faq_groups]); ?>
				<?php endif; ?>
            </div>
        </div>
    </div>
<?php
endwhile; // End of the loop.

get_footer();
