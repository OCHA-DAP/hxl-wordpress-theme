<div id="faq">
    <h2>FAQ</h2>
	<?php
	if(isset($args['faq_data']) && $args['faq_data']) :
		$i = 0;
		foreach($args['faq_data'] as $faq_group_name => $faq_group_entries) : ?>
            <h3><?= $faq_group_name ?></h3>
            <div role="tablist" class="accordion-component">
				<?php foreach($faq_group_entries as $faq_group_entry) : ?>
                    <div class="accordion__item">
                        <div id="accordion__title-<?= $i ?>" aria-selected="false"
                             aria-controls="accordion__body-<?= $i ?>" class="accordion__title"
                             role="tab" tabindex="<?= $i ?>">
                            <h3><?= $faq_group_entry['title'] ?></h3>
                        </div>
                        <div id="accordion__body-<?= $i ?>"
                             class="accordion__body accordion__body--hidden" aria-hidden="true"
                             aria-labelledby="accordion__title-<?= $i ?>"
                             role="tabpanel"><?= $faq_group_entry['answer'] ?></div>
                    </div>
				<?php endforeach; ?>
            </div>
			<?php
			$i++;
		endforeach;
	endif;
	?>
</div>