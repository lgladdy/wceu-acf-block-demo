<?php
$slides  = get_field( 'slides' );
$wrapper = $is_preview ? '' : get_block_wrapper_attributes();
?>
<div <?php echo $wrapper; ?>>
	<?php if ( empty( $slides ) ) { ?>
		<p class="acf-slider-admin-only">
			This ACF slider block contains no slides.
		</p>
	<?php } else { ?>
		<div class="slick-slider">
			<?php foreach ( $slides as $slide ) { ?>
			<div>
				<h3><?php echo esc_html( $slide['slide_title'] ); ?></h3>
				<img src="<?php echo esc_attr( $slide['slide_image'] ); ?>" />
			</div>
			<?php } ?>
		</div>
	<?php } ?>
</div>
