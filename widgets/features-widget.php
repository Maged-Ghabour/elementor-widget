<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Valleys_Features_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'valleys_features';
	}

	public function get_title() {
		return esc_html__( 'Valleys Features', 'valleys-banner' );
	}

	public function get_icon() {
		return 'eicon-info-box';
	}

	public function get_categories() {
		return [ 'general' ];
	}

	public function get_style_depends() {
		return [ 'valleys-banner-style' ];
	}

	protected function register_controls() {

		// -------------------------------------------------------------
		// Content Tab - Main
		// -------------------------------------------------------------
		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Section Title', 'valleys-banner' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'section_title',
			[
				'label' => esc_html__( 'Title', 'valleys-banner' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'لماذا فاليز؟', 'valleys-banner' ),
			]
		);

		$this->end_controls_section();

		// -------------------------------------------------------------
		// Content Tab - Features (Repeater)
		// -------------------------------------------------------------
		$this->start_controls_section(
			'features_section',
			[
				'label' => esc_html__( 'Features', 'valleys-banner' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'feature_image',
			[
				'label' => esc_html__( 'Icon / Image', 'valleys-banner' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$repeater->add_control(
			'feature_title',
			[
				'label' => esc_html__( 'Title', 'valleys-banner' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'ميزة جديدة', 'valleys-banner' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'feature_desc',
			[
				'label' => esc_html__( 'Description', 'valleys-banner' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'وصف الميزة يكتب هنا ليوضح تفاصيل أكثر للعميل.', 'valleys-banner' ),
			]
		);

		$this->add_control(
			'features_list',
			[
				'label' => esc_html__( 'Features List', 'valleys-banner' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'feature_title' => esc_html__( 'تغليف فاخر وجاهز للإهداء', 'valleys-banner' ),
						'feature_desc'  => esc_html__( 'نهتم بأدق تفاصيل التغليف لتصل هديتك بصورة أنيقة تعكس قيمة المناسبة', 'valleys-banner' ),
					],
					[
						'feature_title' => esc_html__( 'توصيل سريع وموثوق', 'valleys-banner' ),
						'feature_desc'  => esc_html__( 'نحرص على توصيل الطلبات بعناية وفي الوقت المحدد لتصل هديتك بأفضل صورة', 'valleys-banner' ),
					],
					[
						'feature_title' => esc_html__( 'شوكولاتة مختارة بعناية', 'valleys-banner' ),
						'feature_desc'  => esc_html__( 'نقدم تشكيلة من الشوكولاتة الفاخرة بجودة عالية ومذاق مميز يرضي مختلف الأذواق', 'valleys-banner' ),
					],
					[
						'feature_title' => esc_html__( 'تنسيقات أنيقة لكل مناسبة', 'valleys-banner' ),
						'feature_desc'  => esc_html__( 'نصمم الهدايا وتنسيقات الشوكولاتة والورود بعناية لتناسب مختلف المناسبات والأذواق', 'valleys-banner' ),
					],
				],
				'title_field' => '{{{ feature_title }}}',
			]
		);

		$this->end_controls_section();


		// -------------------------------------------------------------
		// Style Tab - Section Title
		// -------------------------------------------------------------
		$this->start_controls_section(
			'style_section_title',
			[
				'label' => esc_html__( 'Section Title Style', 'valleys-banner' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Title Color', 'valleys-banner' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .valleys-features-title' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .valleys-features-title',
			]
		);

		$this->add_responsive_control(
			'title_margin',
			[
				'label' => esc_html__( 'Margin', 'valleys-banner' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .valleys-features-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'title_alignment',
			[
				'label' => esc_html__( 'Alignment', 'valleys-banner' ),
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
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}} .valleys-features-title' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();

		// -------------------------------------------------------------
		// Style Tab - Cards Container (Grid)
		// -------------------------------------------------------------
		$this->start_controls_section(
			'style_cards_container',
			[
				'label' => esc_html__( 'Cards Grid', 'valleys-banner' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'grid_columns',
			[
				'label' => esc_html__( 'Columns', 'valleys-banner' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 6,
				'default' => 4,
				'tablet_default' => 2,
				'mobile_default' => 1,
				'selectors' => [
					'{{WRAPPER}} .valleys-features-grid' => 'grid-template-columns: repeat({{VALUE}}, 1fr);',
				],
			]
		);

		$this->add_responsive_control(
			'grid_gap',
			[
				'label' => esc_html__( 'Gap', 'valleys-banner' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [ 'px' => [ 'min' => 0, 'max' => 100 ] ],
				'default' => [ 'size' => 20 ],
				'selectors' => [
					'{{WRAPPER}} .valleys-features-grid' => 'gap: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		// -------------------------------------------------------------
		// Style Tab - Individual Card
		// -------------------------------------------------------------
		$this->start_controls_section(
			'style_card',
			[
				'label' => esc_html__( 'Card Style', 'valleys-banner' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'card_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'valleys-banner' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .valleys-feature-card' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'card_padding',
			[
				'label' => esc_html__( 'Padding', 'valleys-banner' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'default' => [
					'top' => 30,
					'right' => 20,
					'bottom' => 30,
					'left' => 20,
					'unit' => 'px',
					'isLinked' => false,
				],
				'selectors' => [
					'{{WRAPPER}} .valleys-feature-card' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'card_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'valleys-banner' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'default' => [
					'top' => 15,
					'right' => 15,
					'bottom' => 15,
					'left' => 15,
					'unit' => 'px',
					'isLinked' => true,
				],
				'selectors' => [
					'{{WRAPPER}} .valleys-feature-card' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'card_box_shadow',
				'label' => esc_html__( 'Box Shadow', 'valleys-banner' ),
				'selector' => '{{WRAPPER}} .valleys-feature-card',
			]
		);

		$this->add_responsive_control(
			'card_alignment',
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
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}} .valleys-feature-card' => 'text-align: {{VALUE}};',
					'{{WRAPPER}} .valleys-feature-card .valleys-feature-icon-wrapper' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();

		// -------------------------------------------------------------
		// Style Tab - Card Icon
		// -------------------------------------------------------------
		$this->start_controls_section(
			'style_card_icon',
			[
				'label' => esc_html__( 'Card Icon', 'valleys-banner' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'icon_size',
			[
				'label' => esc_html__( 'Icon Height', 'valleys-banner' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [ 'px' => [ 'min' => 10, 'max' => 200 ] ],
				'default' => [ 'size' => 60 ],
				'selectors' => [
					'{{WRAPPER}} .valleys-feature-icon-wrapper img' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'icon_spacing',
			[
				'label' => esc_html__( 'Spacing', 'valleys-banner' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [ 'px' => [ 'min' => 0, 'max' => 100 ] ],
				'default' => [ 'size' => 15 ],
				'selectors' => [
					'{{WRAPPER}} .valleys-feature-icon-wrapper' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		// -------------------------------------------------------------
		// Style Tab - Card Title & Desc
		// -------------------------------------------------------------
		$this->start_controls_section(
			'style_card_text',
			[
				'label' => esc_html__( 'Card Text', 'valleys-banner' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'card_title_heading',
			[
				'label' => esc_html__( 'Card Title', 'valleys-banner' ),
				'type' => \Elementor\Controls_Manager::HEADING,
			]
		);

		$this->add_control(
			'card_title_color',
			[
				'label' => esc_html__( 'Title Color', 'valleys-banner' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#5e4d41',
				'selectors' => [
					'{{WRAPPER}} .valleys-feature-title' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'card_title_typography',
				'selector' => '{{WRAPPER}} .valleys-feature-title',
			]
		);

		$this->add_responsive_control(
			'card_title_spacing',
			[
				'label' => esc_html__( 'Title Spacing', 'valleys-banner' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [ 'px' => [ 'min' => 0, 'max' => 100 ] ],
				'default' => [ 'size' => 10 ],
				'selectors' => [
					'{{WRAPPER}} .valleys-feature-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'card_desc_heading',
			[
				'label' => esc_html__( 'Card Description', 'valleys-banner' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'card_desc_color',
			[
				'label' => esc_html__( 'Description Color', 'valleys-banner' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#9e968f',
				'selectors' => [
					'{{WRAPPER}} .valleys-feature-desc' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'card_desc_typography',
				'selector' => '{{WRAPPER}} .valleys-feature-desc',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<div class="valleys-features-wrapper">
			
			<?php if ( ! empty( $settings['section_title'] ) ) : ?>
				<h2 class="valleys-features-title">
					<?php echo esc_html( $settings['section_title'] ); ?>
				</h2>
			<?php endif; ?>

			<?php if ( ! empty( $settings['features_list'] ) ) : ?>
				<div class="valleys-features-grid">
					<?php foreach ( $settings['features_list'] as $item ) : ?>
						<div class="valleys-feature-card elementor-repeater-item-<?php echo esc_attr( $item['_id'] ); ?>">
							
							<?php if ( ! empty( $item['feature_image']['url'] ) ) : ?>
								<div class="valleys-feature-icon-wrapper">
									<img src="<?php echo esc_url( $item['feature_image']['url'] ); ?>" alt="<?php echo esc_attr( $item['feature_title'] ); ?>">
								</div>
							<?php endif; ?>

							<?php if ( ! empty( $item['feature_title'] ) ) : ?>
								<h3 class="valleys-feature-title">
									<?php echo esc_html( $item['feature_title'] ); ?>
								</h3>
							<?php endif; ?>

							<?php if ( ! empty( $item['feature_desc'] ) ) : ?>
								<p class="valleys-feature-desc">
									<?php echo nl2br( wp_kses_post( $item['feature_desc'] ) ); ?>
								</p>
							<?php endif; ?>

						</div>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>

		</div>
		<?php
	}
}
