<?php
namespace Elementor;

class DXIELI_Widget extends Widget_Base{

    public function get_name(){
        return 'icon-item';
    }

    public function get_title(){
        return 'Icon Item';
    }

    public function get_icon(){
        return 'eicon-code';
    }

    public function get_categories(){
        return ['basic'];
    }

	protected function register_controls() {
		$this->start_controls_section(
			'section_icon',
			[
				'label' => esc_html__( 'Icon', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'icon',
			[
				'label' => esc_html__( 'Icon', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-circle',
					'library' => 'fa-solid',
				],
				'recommended' => [
					'fa-solid' => [
						'circle',
						'dot-circle',
						'square-full',
					],
					'fa-regular' => [
						'circle',
						'dot-circle',
						'square-full',
					],
				],
			]
		);

        $this->add_control(
            'title',
            [
                'label' => __('Title', 'elementor'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'placeholder' => __('Enter your title', 'elementor'),
            ]
        );

        $this->add_control(
			'item_value',
			[
				'label' => esc_html__( 'Value', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => esc_html__( 'Default value', 'plugin-name' ),
				'placeholder' => esc_html__( 'Type your value here', 'plugin-name' ),
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
        <div class="container">
            <div class="my-icon-wrapper">
                <div class="item-icon">
                    <?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?>
                </div>
                <?php echo "<div><p class='title'>$settings[title]</p></div>" ?>
            </div>
            <?php echo "<div class='value'>$settings[item_value]</div>" ?>
        </div>
        <?php  
	}

	protected function content_template() {

	}
}