<?php if(isset($args['sidebar_data']) && $args['sidebar_data']) : ?>
    <nav class="sidebar tertiary-nav" aria-labelledby="tertiary-navigation">
		<?php foreach($args['sidebar_data'] as $sidebar) : ?>
            <ul>
				<?php foreach($sidebar['links'] as $itemID => $item) : ?>
					<?php if($item['link'] && $item['link']['title']) : ?>
						<?php if($itemID === 0) : ?>
							<?php if($item['link']['url'] === '#') : ?>
                                <h4><?= $item['link']['title'] ?></h4>
							<?php else : ?>
                                <h4><a href="<?= $item['link']['url'] ?>"><?= $item['link']['title'] ?></a>
                                </h4>
							<?php endif; ?>
						<?php else : ?>
                            <li><a href="<?= $item['link']['url'] ?>"><?= $item['link']['title'] ?></a></li>
						<?php endif; ?>
					<?php endif; ?>
				<?php endforeach; ?>
            </ul>
		<?php endforeach; ?>
    </nav>
<?php endif; ?>
