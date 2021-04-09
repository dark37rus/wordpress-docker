<?php
	$section_field = get_field( 'section_advantages', 'options' );
	if ( $section_field ) :
		?>

		<section class="section section--primary">
			<div class="container">
				<h2 class="section__title title title--secondary"><?= $section_field['title']; ?></h2>

				<?php
					$advantages = $section_field['advantages'];
					if ( $advantages ) :
						?>
					<div class="advantages">
						<?php
							foreach ( $advantages as $advantage ) : the_row();
								?>
								<div class="advantage" data-aos="zoom-out-up">
									<div class="advantage__image">
										<img src="<?= $advantage['image']['url']; ?>" alt="<?= get_sub_field('text'); ?>">
									</div>

									<div class="advantage__text"><?= $advantage['text']; ?></div>
								</div>
							<?php
							endforeach;
						?>
					</div>
				<?php endif; ?>


			</div>
		</section>
	<?php
	endif;
