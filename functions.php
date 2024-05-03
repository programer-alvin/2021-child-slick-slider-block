<?php
/**
 * Entry File for the child theme.
 *
 *  @package N/A.
 */

add_action(
	'acf/include_fields',
	function() {
		if ( ! function_exists( 'acf_add_local_field_group' ) ) {
			return;
		}

		acf_add_local_field_group(
			array(
				'key'                   => 'group_6634934fb3e35',
				'title'                 => 'Slides',
				'fields'                => array(
					array(
						'key'               => 'field_66349352ef6b7',
						'label'             => 'slides',
						'name'              => 'slides',
						'aria-label'        => '',
						'type'              => 'repeater',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => array(
							'width' => '',
							'class' => '',
							'id'    => '',
						),
						'layout'            => 'table',
						'pagination'        => 0,
						'min'               => 0,
						'max'               => 0,
						'collapsed'         => '',
						'button_label'      => 'Add Row',
						'rows_per_page'     => 20,
						'sub_fields'        => array(
							array(
								'key'               => 'field_6634936bef6b8',
								'label'             => 'image',
								'name'              => 'image',
								'aria-label'        => '',
								'type'              => 'image',
								'instructions'      => '',
								'required'          => 0,
								'conditional_logic' => 0,
								'wrapper'           => array(
									'width' => '',
									'class' => '',
									'id'    => '',
								),
								'return_format'     => 'array',
								'library'           => 'all',
								'min_width'         => '',
								'min_height'        => '',
								'min_size'          => '',
								'max_width'         => '',
								'max_height'        => '',
								'max_size'          => '',
								'mime_types'        => '',
								'preview_size'      => 'medium',
								'parent_repeater'   => 'field_66349352ef6b7',
							),
						),
					),
				),
				'location'              => array(
					array(
						array(
							'param'    => 'block',
							'operator' => '==',
							'value'    => 'acf/slider',
						),
					),
				),
				'menu_order'            => 0,
				'position'              => 'normal',
				'style'                 => 'default',
				'label_placement'       => 'top',
				'instruction_placement' => 'label',
				'hide_on_screen'        => '',
				'active'                => true,
				'description'           => '',
				'show_in_rest'          => 0,
			)
		);
	}
);

// https://www.advancedcustomfields.com/blog/building-a-custom-slider-block-in-30-minutes-with-acf/
// Register a slider block.
add_action( 'acf/init', 'my_register_blocks' );
/**Function to register the block */
function my_register_blocks() {

	// check function exists.
	if ( function_exists( 'acf_register_block_type' ) ) {

		// register a testimonial block.
		acf_register_block_type(
			array(
				'name'            => 'slider',
				'title'           => __( 'Slider' ),
				'description'     => __( 'A custom slider block.' ),
				'render_template' => 'template-parts/blocks/slider/slider.php',
				'category'        => 'formatting',
				'icon'            => 'images-alt2',
				'align'           => 'full',
				'enqueue_assets'  => function() {
					wp_enqueue_style( 'slick', 'http://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', array(), '1.8.1' );
					wp_enqueue_style( 'slick-theme', 'http://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css', array(), '1.8.1' );
					wp_enqueue_script( 'slick', 'http://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array( 'jquery' ), '1.8.1', true );

					wp_enqueue_style( 'block-slider', get_stylesheet_directory_uri() . '/template-parts/blocks/slider/slider.min.css', array(), '1.0.0' );
					wp_enqueue_script( 'block-slider', get_stylesheet_directory_uri() . '/template-parts/blocks/slider/slider.min.js', array(), '1.0.0', true );
				},
			)
		);
	}
}
