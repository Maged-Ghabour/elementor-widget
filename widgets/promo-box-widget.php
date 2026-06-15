<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Valleys_Promo_Box_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'valleys_promo_box';
	}

	public function get_title() {
		return esc_html__( 'Valleys Promo Box', 'valleys-banner' );
	}

	public function get_icon() {
		return 'eicon-image-box';
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
			'bg_image',
			[
				'label' => esc_html__( 'Background Image', 'valleys-banner' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'title',
			[
				'label' => esc_html__( 'Title', 'valleys-banner' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'برج شوكولاتة يلفت الأنظار', 'valleys-banner' ),
			]
		);

		$this->add_control(
			'description',
			[
				'label' => esc_html__( 'Description', 'valleys-banner' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'تنسيق فاخر من أجود أنواع الشوكولاتة، مصمم ليمنح مناسباتك لمسة أنيقة ويجعل هديتك أكثر تميزاً', 'valleys-banner' ),
			]
		);

		$this->add_control(
			'button_text',
			[
				'label' => esc_html__( 'Button Text', 'valleys-banner' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'تسوق الآن', 'valleys-banner' ),
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
		// Style Tab - Container
		// -------------------------------------------------------------
		$this->start_controls_section(
			'style_container',
			[
				'label' => esc_html__( 'Box Container', 'valleys-banner' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'box_min_height',
			[
				'label' => esc_html__( 'Min Height', 'valleys-banner' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'vh', '%' ],
				'range' => [
					'px' => [ 'min' => 200, 'max' => 1000 ],
				],
				'default' => [ 'unit' => 'px', 'size' => 450 ],
				'selectors' => [
					'{{WRAPPER}} .valleys-promo-box' => 'min-height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'box_padding',
			[
				'label' => esc_html__( 'Padding', 'valleys-banner' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'default' => [
					'top' => 50,
					'right' => 50,
					'bottom' => 50,
					'left' => 50,
					'unit' => 'px',
					'isLinked' => true,
				],
				'selectors' => [
					'{{WRAPPER}} .valleys-promo-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'box_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'valleys-banner' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'default' => [
					'top' => 20,
					'right' => 20,
					'bottom' => 20,
					'left' => 20,
					'unit' => 'px',
					'isLinked' => true,
				],
				'selectors' => [
					'{{WRAPPER}} .valleys-promo-box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'bg_overlay_color',
			[
				'label' => esc_html__( 'Background Overlay', 'valleys-banner' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .valleys-promo-box::before' => 'background-color: {{VALUE}};',
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
					'initial'       => esc_html__( 'Custom', 'valleys-banner' ),
				],
				'selectors' => [
					'{{WRAPPER}} .valleys-promo-box' => 'background-position: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'bg_size',
			[
				'label' => esc_html__( 'Background Size', 'valleys-banner' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'cover',
				'options' => [
					'cover'   => esc_html__( 'Cover', 'valleys-banner' ),
					'contain' => esc_html__( 'Contain', 'valleys-banner' ),
					'auto'    => esc_html__( 'Auto', 'valleys-banner' ),
				],
				'selectors' => [
					'{{WRAPPER}} .valleys-promo-box' => 'background-size: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();

		// -------------------------------------------------------------
		// Style Tab - Content Layout
		// -------------------------------------------------------------
		$this->start_controls_section(
			'style_content_layout',
			[
				'label' => esc_html__( 'Content Layout', 'valleys-banner' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'content_max_width',
			[
				'label' => esc_html__( 'Content Max Width', 'valleys-banner' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ '%', 'px' ],
				'range' => [ '%' => [ 'min' => 10, 'max' => 100 ], 'px' => [ 'min' => 200, 'max' => 800 ] ],
				'default' => [ 'unit' => '%', 'size' => 50 ],
				'tablet_default' => [ 'unit' => '%', 'size' => 80 ],
				'mobile_default' => [ 'unit' => '%', 'size' => 100 ],
				'selectors' => [
					'{{WRAPPER}} .valleys-promo-content' => 'max-width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'horizontal_alignment',
			[
				'label' => esc_html__( 'Horizontal Alignment', 'valleys-banner' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'flex-start' => [
						'title' => esc_html__( 'Start', 'valleys-banner' ),
						'icon' => 'eicon-h-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'valleys-banner' ),
						'icon' => 'eicon-h-align-center',
					],
					'flex-end' => [
						'title' => esc_html__( 'End', 'valleys-banner' ),
						'icon' => 'eicon-h-align-right',
					],
				],
				'default' => 'flex-end', /* For RTL right side */
				'selectors' => [
					'{{WRAPPER}} .valleys-promo-box' => 'justify-content: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'vertical_alignment',
			[
				'label' => esc_html__( 'Vertical Alignment', 'valleys-banner' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'flex-start' => [
						'title' => esc_html__( 'Top', 'valleys-banner' ),
						'icon' => 'eicon-v-align-top',
					],
					'center' => [
						'title' => esc_html__( 'Middle', 'valleys-banner' ),
						'icon' => 'eicon-v-align-middle',
					],
					'flex-end' => [
						'title' => esc_html__( 'Bottom', 'valleys-banner' ),
						'icon' => 'eicon-v-align-bottom',
					],
				],
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}} .valleys-promo-box' => 'align-items: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'text_alignment',
			[
				'label' => esc_html__( 'Text Alignment', 'valleys-banner' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'valleys-banner' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'valleys-banner' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'valleys-banner' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'right',
				'selectors' => [
					'{{WRAPPER}} .valleys-promo-content' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();

		// -------------------------------------------------------------
		// Style Tab - Typography
		// -------------------------------------------------------------
		$this->start_controls_section(
			'style_typography',
			[
				'label' => esc_html__( 'Text Styling', 'valleys-banner' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_heading',
			[
				'label' => esc_html__( 'Title', 'valleys-banner' ),
				'type' => \Elementor\Controls_Manager::HEADING,
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Title Color', 'valleys-banner' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .valleys-promo-title' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .valleys-promo-title',
			]
		);

		$this->add_responsive_control(
			'title_spacing',
			[
				'label' => esc_html__( 'Title Spacing', 'valleys-banner' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'selectors' => [
					'{{WRAPPER}} .valleys-promo-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'desc_heading',
			[
				'label' => esc_html__( 'Description', 'valleys-banner' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'desc_color',
			[
				'label' => esc_html__( 'Description Color', 'valleys-banner' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .valleys-promo-desc' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'desc_typography',
				'selector' => '{{WRAPPER}} .valleys-promo-desc',
			]
		);

		$this->add_responsive_control(
			'desc_spacing',
			[
				'label' => esc_html__( 'Description Spacing', 'valleys-banner' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'selectors' => [
					'{{WRAPPER}} .valleys-promo-desc' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		// -------------------------------------------------------------
		// Style Tab - Button
		// -------------------------------------------------------------
		$this->start_controls_section(
			'style_button',
			[
				'label' => esc_html__( 'Button', 'valleys-banner' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'btn_color',
			[
				'label' => esc_html__( 'Text Color', 'valleys-banner' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#5e4d41',
				'selectors' => [
					'{{WRAPPER}} .valleys-promo-btn' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'btn_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'valleys-banner' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .valleys-promo-btn' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'btn_typography',
				'selector' => '{{WRAPPER}} .valleys-promo-btn',
			]
		);

		$this->add_responsive_control(
			'btn_padding',
			[
				'label' => esc_html__( 'Padding', 'valleys-banner' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .valleys-promo-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'btn_radius',
			[
				'label' => esc_html__( 'Border Radius', 'valleys-banner' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .valleys-promo-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$image_url = $settings['bg_image']['url'];
		
		$this->add_render_attribute( 'wrapper', 'class', 'valleys-promo-box' );
		
		if ( ! empty( $image_url ) ) {
			$this->add_render_attribute( 'wrapper', 'style', 'background-image: url(' . esc_url( $image_url ) . ');' );
		}

		if ( ! empty( $settings['button_link']['url'] ) ) {
			$this->add_link_attributes( 'button', $settings['button_link'] );
		}
		$this->add_render_attribute( 'button', 'class', 'valleys-promo-btn' );
		?>

		<div <?php $this->print_render_attribute_string( 'wrapper' ); ?>>
			<div class="valleys-promo-content">
				<?php if ( ! empty( $settings['title'] ) ) : ?>
					<h2 class="valleys-promo-title">
						<?php echo nl2br( wp_kses_post( $settings['title'] ) ); ?>
					</h2>
				<?php endif; ?>

				<?php if ( ! empty( $settings['description'] ) ) : ?>
					<p class="valleys-promo-desc">
						<?php echo nl2br( wp_kses_post( $settings['description'] ) ); ?>
					</p>
				<?php endif; ?>

				<?php if ( ! empty( $settings['button_text'] ) ) : ?>
					<div class="valleys-promo-btn-wrapper">
						<a <?php $this->print_render_attribute_string( 'button' ); ?>>
							<?php echo esc_html( $settings['button_text'] ); ?>
						</a>
					</div>
				<?php endif; ?>
			</div>
		</div>

		<?php
	}
}
