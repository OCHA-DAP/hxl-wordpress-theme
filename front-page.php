<?php
get_header();

/* Start the Loop */
while(have_posts()):
	the_post();
	?>

    <section class="hero">
        <div class="grid-container">
            <div class="hero__inner">
                <h1 class="special">The Humanitarian Exchange Language</h1>
                <h3><?= get_bloginfo('description') ?></h3>
            </div>
        </div>
    </section>

    <section class="tutorial background-gray">
        <h2 class="center">The 30-second HXL Tutorial</h2>
        <div class="grid-container">
            <div class="col-4 tutorial__step">
                <img src="<?= get_stylesheet_directory_uri() ?>/assets/images/tutorial-1.png" alt="">
                <h3 class="type__color-coral">
                    <div class="bullet--number"><span>1</span></div>
                    Grab a spreadsheet of humanitarian data
                </h3>
            </div>
            <div class="col-4 tutorial__step">
                <img src="<?= get_stylesheet_directory_uri() ?>/assets/images/tutorial-2.png" alt="">
                <h3 class="type__color-coral">
                    <div class="bullet--number"><span>2</span></div>
                    Insert a new row between the headers and the data
                </h3>
            </div>
            <div class="col-4 tutorial__step">
                <img src="<?= get_stylesheet_directory_uri() ?>/assets/images/tutorial-3.png" alt="">
                <h3 class="type__color-coral">
                    <div class="bullet--number"><span>3</span></div>
                    Add some HXL hashtags
                </h3>
            </div>
        </div>
        <div class="center">
            <p class="small">Not sure which HXL hashtag to use? See <a
                        href="<?= home_url() ?>/standard/1-1final/dictionary/" aria-label="HXL Dictionary">HXL hashtags
                    in action classifying datasets</a>.<br/>Then, HXLate your own spreadsheets.</p>
            <a href="<?= home_url() ?>/how-it-works/" class="btn btn--primary" aria-label="How it works">See how it
                works</a>
        </div>
    </section>

    <section class="background-gray padding-bottom">
        <h2 class="center">Organisations that use HXL</h2>
        <div class="grid-container">
			<?php foreach(get_organizations() as $organization) : ?>
                <div class="col-3 blurb">
                    <div class="logo">
                        <img src="<?= get_the_post_thumbnail_url($organization->ID) ?>" alt="logo">
                    </div>
                    <div class="org">
                        <h4><?= $organization->post_title ?></h4>
                        <h5><a href="<?= get_field('hdxurl', $organization->ID) ?>" class="external" target="_blank"
                               rel="noopener noreferrer">See HXLated dataset on HDX</a></h5>
                    </div>
                </div>
			<?php endforeach; ?>
        </div>
    </section>

<?php
endwhile; // End of the loop.

get_footer();
