<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Valleys_Banner_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'valleys_banner';
	}

	public function get_title() {
		return esc_html__( 'Valleys Banner', 'valleys-banner' );
	}

	public function get_icon() {
		return 'eicon-image-rollover';
	}

	public function get_categories() {
		return [ 'general' ];
	}

	public function get_style_depends() {
		return [ 'valleys-banner-style' ];
	}

	protected function register_controls() {

		// -------------------------------------------------------------
		// Content Tab
		// -------------------------------------------------------------
		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'valleys-banner' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'banner_image',
			[
				'label' => esc_html__( 'Banner Image', 'valleys-banner' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'right_text',
			[
				'label' => esc_html__( 'Right Text', 'valleys-banner' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'تنسيق يلفت الأنظار', 'valleys-banner' ),
			]
		);

		$this->add_control(
			'left_text',
			[
				'label' => esc_html__( 'Left Text', 'valleys-banner' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'ومذاق يليق بالمناسبات الراقية', 'valleys-banner' ),
			]
		);

		$this->add_control(
			'button_text',
			[
				'label' => esc_html__( 'Button Text', 'valleys-banner' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'استكشف تشكيلتنا', 'valleys-banner' ),
			]
		);

		$this->add_control(
			'button_link',
			[
				'label' => esc_html__( 'Button Link', 'valleys-banner' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'valleys-banner' ),
				'default' => [
					'url' => '#',
				],
			]
		);

		$this->end_controls_section();

		// -------------------------------------------------------------
		// Style Tab - Banner Settings
		// -------------------------------------------------------------
		$this->start_controls_section(
			'style_image_section',
			[
				'label' => esc_html__( 'Banner Settings', 'valleys-banner' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'banner_height',
			[
				'label' => esc_html__( 'Banner Min Height', 'valleys-banner' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'vh' ],
				'range' => [
					'px' => [ 'min' => 200, 'max' => 1200 ],
					'vh' => [ 'min' => 10, 'max' => 100 ],
				],
				'default' => [ 'unit' => 'px', 'size' => 500 ],
				'selectors' => [
					'{{WRAPPER}} .valleys-banner-container' => 'min-height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'bg_position',
			[
				'label' => esc_html__( 'Background Position', 'valleys-banner' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'center center',
				'options' => [
					'center center' => esc_html__( 'Center Center', 'valleys-banner' ),
					'center top'    => esc_html__( 'Center Top', 'valleys-banner' ),
					'center bottom' => esc_html__( 'Center Bottom', 'valleys-banner' ),
					'left center'   => esc_html__( 'Left Center', 'valleys-banner' ),
					'right center'  => esc_html__( 'Right Center', 'valleys-banner' ),
				],
				'selectors' => [
					'{{WRAPPER}} .valleys-banner-container' => 'background-position: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'force_full_width',
			[
				'label' => esc_html__( 'Force Full Width', 'valleys-banner' ),
				'description' => esc_html__( 'Enable this to break out of the section container and stretch across the entire screen.', 'valleys-banner' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'valleys-banner' ),
				'label_off' => esc_html__( 'No', 'valleys-banner' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->end_controls_section();

		// -------------------------------------------------------------
		// Style Tab - Labels
		// -------------------------------------------------------------
		$this->start_controls_section(
			'style_labels_section',
			[
				'label' => esc_html__( 'Labels Style', 'valleys-banner' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'right_label_color',
			[
				'label' => esc_html__( 'Right Label Text Color', 'valleys-banner' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .valleys-label.right' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'right_label_background',
				'label' => esc_html__( 'Right Label Background', 'valleys-banner' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .valleys-label.right .valleys-label-bg',
			]
		);

		$this->add_control(
			'left_label_color',
			[
				'label' => esc_html__( 'Left Label Text Color', 'valleys-banner' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .valleys-label.left' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'left_label_background',
				'label' => esc_html__( 'Left Label Background', 'valleys-banner' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .valleys-label.left .valleys-label-bg',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'label_typography',
				'selector' => '{{WRAPPER}} .valleys-label',
			]
		);

		$this->add_responsive_control(
			'right_label_padding',
			[
				'label' => esc_html__( 'Right Label Padding', 'valleys-banner' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .valleys-label.right .valleys-label-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'left_label_padding',
			[
				'label' => esc_html__( 'Left Label Padding', 'valleys-banner' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .valleys-label.left .valleys-label-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'right_label_radius',
			[
				'label' => esc_html__( 'Right Label Border Radius', 'valleys-banner' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .valleys-label.right .valleys-label-bg' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				],
			]
		);

		$this->add_responsive_control(
			'right_label_bg_width',
			[
				'label' => esc_html__( 'Right Label Background Length', 'valleys-banner' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ '%', 'px', 'vw' ],
				'range' => [ '%' => [ 'min' => 0, 'max' => 200 ], 'px' => [ 'min' => 0, 'max' => 1000 ] ],
				'default' => [ 'unit' => '%', 'size' => 100 ],
				'selectors' => [
					'{{WRAPPER}} .valleys-label.right .valleys-label-bg' => 'width: {{SIZE}}{{UNIT}} !important;',
				],
			]
		);

		$this->add_responsive_control(
			'right_label_bg_height',
			[
				'label' => esc_html__( 'Right Label Background Height', 'valleys-banner' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ '%', 'px', 'vh' ],
				'range' => [ '%' => [ 'min' => 0, 'max' => 200 ], 'px' => [ 'min' => 0, 'max' => 500 ] ],
				'default' => [ 'unit' => '%', 'size' => 100 ],
				'selectors' => [
					'{{WRAPPER}} .valleys-label.right .valleys-label-bg' => 'height: {{SIZE}}{{UNIT}} !important;',
				],
			]
		);

		$this->add_responsive_control(
			'left_label_radius',
			[
				'label' => esc_html__( 'Left Label Border Radius', 'valleys-banner' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .valleys-label.left .valleys-label-bg' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				],
			]
		);

		$this->add_responsive_control(
			'left_label_bg_width',
			[
				'label' => esc_html__( 'Left Label Background Length', 'valleys-banner' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ '%', 'px', 'vw' ],
				'range' => [ '%' => [ 'min' => 0, 'max' => 200 ], 'px' => [ 'min' => 0, 'max' => 1000 ] ],
				'default' => [ 'unit' => '%', 'size' => 100 ],
				'selectors' => [
					'{{WRAPPER}} .valleys-label.left .valleys-label-bg' => 'width: {{SIZE}}{{UNIT}} !important;',
				],
			]
		);

		$this->add_responsive_control(
			'left_label_bg_height',
			[
				'label' => esc_html__( 'Left Label Background Height', 'valleys-banner' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ '%', 'px', 'vh' ],
				'range' => [ '%' => [ 'min' => 0, 'max' => 200 ], 'px' => [ 'min' => 0, 'max' => 500 ] ],
				'default' => [ 'unit' => '%', 'size' => 100 ],
				'selectors' => [
					'{{WRAPPER}} .valleys-label.left .valleys-label-bg' => 'height: {{SIZE}}{{UNIT}} !important;',
				],
			]
		);

		$this->add_control(
			'right_label_heading',
			[
				'label' => esc_html__( 'Right Label Positioning', 'valleys-banner' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'right_label_position_top',
			[
				'label' => esc_html__( 'Vertical Position (%)', 'valleys-banner' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ '%', 'px' ],
				'range' => [ '%' => [ 'min' => 0, 'max' => 100 ] ],
				'default' => [ 'unit' => '%', 'size' => 45 ],
				'selectors' => [
					'{{WRAPPER}} .valleys-label.right' => 'top: {{SIZE}}{{UNIT}}; transform: translateY(-50%);',
				],
			]
		);
		
		$this->add_responsive_control(
			'right_label_position_right',
			[
				'label' => esc_html__( 'Horizontal Position (px/%)', 'valleys-banner' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [ '%' => [ 'min' => -50, 'max' => 50 ], 'px' => [ 'min' => -200, 'max' => 200 ] ],
				'default' => [ 'unit' => 'px', 'size' => 0 ],
				'selectors' => [
					'{{WRAPPER}} .valleys-label.right' => 'right: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'left_label_heading',
			[
				'label' => esc_html__( 'Left Label Positioning', 'valleys-banner' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'left_label_position_top',
			[
				'label' => esc_html__( 'Vertical Position (%)', 'valleys-banner' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ '%', 'px' ],
				'range' => [ '%' => [ 'min' => 0, 'max' => 100 ] ],
				'default' => [ 'unit' => '%', 'size' => 65 ],
				'selectors' => [
					'{{WRAPPER}} .valleys-label.left' => 'top: {{SIZE}}{{UNIT}}; transform: translateY(-50%);',
				],
			]
		);

		$this->add_responsive_control(
			'left_label_position_left',
			[
				'label' => esc_html__( 'Horizontal Position (px/%)', 'valleys-banner' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [ '%' => [ 'min' => -50, 'max' => 50 ], 'px' => [ 'min' => -200, 'max' => 200 ] ],
				'default' => [ 'unit' => 'px', 'size' => 0 ],
				'selectors' => [
					'{{WRAPPER}} .valleys-label.left' => 'left: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		// -------------------------------------------------------------
		// Style Tab - Button
		// -------------------------------------------------------------
		$this->start_controls_section(
			'style_button_section',
			[
				'label' => esc_html__( 'Button Style', 'valleys-banner' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'button_color',
			[
				'label' => esc_html__( 'Text Color', 'valleys-banner' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .valleys-btn' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'button_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'valleys-banner' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .valleys-btn' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'button_typography',
				'selector' => '{{WRAPPER}} .valleys-btn',
			]
		);

		$this->add_responsive_control(
			'button_padding',
			[
				'label' => esc_html__( 'Button Padding', 'valleys-banner' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .valleys-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'button_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'valleys-banner' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .valleys-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'button_bottom_position',
			[
				'label' => esc_html__( 'Button Bottom Position', 'valleys-banner' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ '%', 'px' ],
				'range' => [ '%' => [ 'min' => 0, 'max' => 100 ], 'px' => [ 'min' => 0, 'max' => 500 ] ],
				'default' => [ 'unit' => '%', 'size' => 15 ],
				'selectors' => [
					'{{WRAPPER}} .valleys-btn-wrapper' => 'bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'button_left_position',
			[
				'label' => esc_html__( 'Button Horizontal Position (%)', 'valleys-banner' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ '%' ],
				'range' => [ '%' => [ 'min' => 0, 'max' => 100 ] ],
				'default' => [ 'unit' => '%', 'size' => 50 ],
				'selectors' => [
					'{{WRAPPER}} .valleys-btn-wrapper' => 'left: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$image_url = $settings['banner_image']['url'];
		
		$this->add_render_attribute( 'wrapper', 'class', 'valleys-banner-container' );
		
		if ( 'yes' === $settings['force_full_width'] ) {
			$this->add_render_attribute( 'wrapper', 'class', 'valleys-force-full-width' );
		}
		
		if ( ! empty( $image_url ) ) {
			$this->add_render_attribute( 'wrapper', 'style', 'background-image: url(' . esc_url( $image_url ) . ');' );
		}

		if ( ! empty( $settings['button_link']['url'] ) ) {
			$this->add_link_attributes( 'button', $settings['button_link'] );
		}
		$this->add_render_attribute( 'button', 'class', 'valleys-btn' );

		?>
		<div <?php $this->print_render_attribute_string( 'wrapper' ); ?>>
			
			<?php if ( ! empty( $settings['right_text'] ) ) : ?>
				<div class="valleys-label right">
					<div class="valleys-label-bg"></div>
					<div class="valleys-label-text">
						<?php echo nl2br( wp_kses_post( $settings['right_text'] ) ); ?>
					</div>
				</div>
			<?php endif; ?>

			<?php if ( ! empty( $settings['left_text'] ) ) : ?>
				<div class="valleys-label left">
					<div class="valleys-label-bg"></div>
					<div class="valleys-label-text">
						<?php echo nl2br( wp_kses_post( $settings['left_text'] ) ); ?>
					</div>
				</div>
			<?php endif; ?>

			<?php if ( ! empty( $settings['button_text'] ) ) : ?>
				<div class="valleys-btn-wrapper">
					<a <?php $this->print_render_attribute_string( 'button' ); ?>>
						<?php echo esc_html( $settings['button_text'] ); ?>
					</a>
				</div>
			<?php endif; ?>
			
		</div>
		<?php
	}
}
