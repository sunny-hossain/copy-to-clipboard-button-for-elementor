<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

class Elementor_Clipboard_Button_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'ctce_clipboard_button';
    }

    public function get_title() {
        return __( 'Clipboard Button', 'copy-to-clipboard-button-for-elementor' );
    }

    public function get_icon() {
        return 'eicon-button';
    }

    public function get_categories() {
        return [ 'basic' ];
    }

    public function get_keywords(): array {
		return [ 'button', 'copy', 'clipboard', 'copy link', 'link copy', 'Clipboard Button'];
	}

    public function get_custom_help_url(): string {
		return 'https://sunnyhossain.com/contact-us/';
	}
	
    protected function register_controls(): void {
        
        /**
          * Start Widget Content Section
          * ===============================================
        */
        
        $this->start_controls_section(
            'ctce_clipboard_content_section',
            [
                'label' => __( 'Content', 'copy-to-clipboard-button-for-elementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'ctce_clipboard_btn_text',
            [
                'label' => __( 'Text', 'copy-to-clipboard-button-for-elementor' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Click here', 'copy-to-clipboard-button-for-elementor' ),
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        $this->add_control(
            'ctce_clipboard_show_text',
            [
                'label' => __( 'Show clipboard text', 'copy-to-clipboard-button-for-elementor' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Show', 'copy-to-clipboard-button-for-elementor' ),
                'label_off' => __( 'Hide', 'copy-to-clipboard-button-for-elementor' ),
                'return_value' => 'yes',
                'default' => 'yes',
                'description' => esc_html__( 'Toggle to show or hide the clipboard text area.', 'copy-to-clipboard-button-for-elementor' ),
            ]
        );
      
        $this->add_control(
            'ctce_clipboard_text',
            [
                'label' => __( 'Clipboard Text', 'copy-to-clipboard-button-for-elementor' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Your text here', 'copy-to-clipboard-button-for-elementor' ),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ],
                'description' => esc_html__( 'Enter the text or content you want users to copy when they click the button.', 'copy-to-clipboard-button-for-elementor' ),
                
            ]
        );


        $this->end_controls_section(); // End Widget Content Section
        
        /**
          * Start Widget Additional Content Section
          * ===============================================
        */
        
        $this->start_controls_section(
            'ctce_clipboard_addi_content_section',
            [
                'label' => __( 'Additional Content', 'copy-to-clipboard-button-for-elementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'ctce_clipboard_btn_text_after', 
            [
                'label' => __( 'Text', 'copy-to-clipboard-button-for-elementor' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Copied!', 'copy-to-clipboard-button-for-elementor' ),
                'dynamic' => [
                    'active' => true,
                ],
                'description' => esc_html__( 'This text appears after successfully copying the link and temporarily changes the button text.', 'copy-to-clipboard-button-for-elementor' ),
            ]
        );
        
        $this->add_control(
            'ctce_clipboard_btn_bg_color_after',
            [
                'label' => __( 'Background color', 'copy-to-clipboard-button-for-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#008000',
                'description' => esc_html__( 'This color appears after successfully copying the link and temporarily changes the button background color. Default: #008000', 'copy-to-clipboard-button-for-elementor' ),
            ]
        );
      
        $this->add_control(
            'ctce_clipboard_btn_reset_time',
            [
                'label' => __( 'Time', 'copy-to-clipboard-button-for-elementor' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( '3000', 'copy-to-clipboard-button-for-elementor' ),
                'description' => esc_html__( 'After a specified time, the button resets to its default text and color. Default delay: 3 seconds (1 second = 1000 milliseconds).', 'copy-to-clipboard-button-for-elementor' ),
            ]
        );


        $this->end_controls_section(); // End Widget Additional Content Section
        
        
        /**
          * Start Widget Box Style Section
          * ===============================================
        */
        $this->start_controls_section(
            'ctce_clipboard_box_style_section',
            [
                'label' => __( 'Box', 'copy-to-clipboard-button-for-elementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'ctce_clipboard_box_padding',
            [
                'label' => __( 'Padding', 'copy-to-clipboard-button-for-elementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .ctce-clipboard-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'ctce_clipboard_box_background',
                'selector' => '{{WRAPPER}} .ctce-clipboard-content',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'ctce_clipboard_box_border',
                'selector' => '{{WRAPPER}} .ctce-clipboard-content',
            ]
        );

        $this->add_control(
            'ctce_clipboard_box_border_radius',
            [
                'label' => __( 'Border Radius', 'copy-to-clipboard-button-for-elementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .ctce-clipboard-content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'ctce_clipboard_box_box_shadow',
                'selector' => '{{WRAPPER}} .ctce-clipboard-content',
            ]
        );

        $this->end_controls_section(); // End Widget Box Style Section
        
       
       /**
          * Start Text Style Section
          * ===============================================
        */
        $this->start_controls_section(
            'ctce_clipboard_text_style_section',
            [
                'label' => __( 'Text', 'copy-to-clipboard-button-for-elementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'ctce_clipboard_text_color',
            [
                'label' => __( 'Text Color', 'copy-to-clipboard-button-for-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000000',
                'selectors' => [
                    '{{WRAPPER}} h4' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'ctce_clipboard_text_typography',
                'selector' => '{{WRAPPER}} h4',
            ]
        );

        $this->add_control(
            'ctce_clipboard_text_align',
            [
                'label' => __( 'Alignment', 'copy-to-clipboard-button-for-elementor' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'copy-to-clipboard-button-for-elementor' ),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'copy-to-clipboard-button-for-elementor' ),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'copy-to-clipboard-button-for-elementor' ),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'left', 
                'selectors' => [
                    '{{WRAPPER}} .ctce-clipboard-text-wrap' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section(); // End Text Style Section
        
        
        /**
          * Start Button Style Section
          * ===============================================
        */
        $this->start_controls_section(
            'ctce_clipboard_button_style_section',
            [
                'label' => __( 'Button', 'copy-to-clipboard-button-for-elementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'ctce_clipboard_button_position',
            [
                'label' => __( 'Position', 'copy-to-clipboard-button-for-elementor' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'copy-to-clipboard-button-for-elementor' ),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'copy-to-clipboard-button-for-elementor' ),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'copy-to-clipboard-button-for-elementor' ),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'left',
                'selectors' => [
                    '{{WRAPPER}} .ctce-clipboard-button-wrap' => 'text-align: {{VALUE}};',
                    '{{WRAPPER}} .ctce-clipboard-button-wrap button' => 'display: inline-block;',
                ],
            ]
        );
        
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'ctce_clipboard_button_typography',
                'selector' => '{{WRAPPER}} button',
            ]
        );
        
        $this->start_controls_tabs('ctce_clipboard_tabs_button_style');
        
        $this->start_controls_tab(
            'ctce_clipboard_button_normal_tab',
            [
                'label' => __( 'Normal', 'copy-to-clipboard-button-for-elementor' ),
            ]
        );
        
        $this->add_control(
            'ctce_clipboard_button_text_color',
            [
                'label' => __( 'Text Color', 'copy-to-clipboard-button-for-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} button' => 'color: {{VALUE}};',
                ],
            ]
        );
        
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'ctce_clipboard_button_background',
                'fields_options' => [
                    'background' => [
                        'default' => 'classic',
                    ],
                    'color' => [
                        'default' => '#ff0000',
                    ],
                ],
                'selector' => '{{WRAPPER}} button',
            ]
        );
        
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'ctce_clipboard_button_box_shadow',
                'selector' => '{{WRAPPER}} button',
            ]
        );
        
        
        $this->end_controls_tab();
        
        $this->start_controls_tab(
            'ctce_clipboard_button_hover_tab',
            [
                'label' => __( 'Hover', 'copy-to-clipboard-button-for-elementor' ),
            ]
        );
        
        $this->add_control(
            'ctce_clipboard_button_hover_text_color',
            [
                'label' => __( 'Text Color', 'copy-to-clipboard-button-for-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} button:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'ctce_clipboard_button_hover_background',
                'fields_options' => [
                    'background' => [
                        'default' => 'classic',
                    ],
                    'color' => [
                        'default' => '#bd0404',
                    ],
                ],
                'selector' => '{{WRAPPER}} button:hover',
            ]
        );
        
        $this->add_control(
            'ctce_clipboard_button_hover_border_color',
            [
                'label' => __( 'Border Color', 'copy-to-clipboard-button-for-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} button:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );
        
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'ctce_clipboard_button_hover_box_shadow',
                'selector' => '{{WRAPPER}} button:hover',
            ]
        );
        
        $this->end_controls_tab();

        $this->end_controls_tabs();


        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'ctce_clipboard_button_border',
                'selector' => '{{WRAPPER}} button',
            ]
        );

        $this->add_control(
            'ctce_clipboard_button_border_radius',
            [
                'label' => __( 'Border Radius', 'copy-to-clipboard-button-for-elementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'default' => [
                    'top' => '3',
                    'right' => '3',
                    'bottom' => '3',
                    'left' => '3',
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );


        $this->add_control(
            'ctce_clipboard_button_padding',
            [
                'label' => __( 'Padding', 'copy-to-clipboard-button-for-elementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'default' => [
                    'top' => '7',
                    'right' => '15',
                    'bottom' => '7',
                    'left' => '15',
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section(); // End Button Style Section

        
    }

    protected function render(): void {
        $settings = $this->get_settings_for_display();
        $widget_id = 'ctce-clipboard-widget-' . $this->get_id();
        
        // Default color
        $btn_text_color = '#ffffff';
        $btn_bg_color = '#ff0000';
        
        // If classic background is set, use its color
        if ( isset($settings['ctce_clipboard_button_background_background']) && $settings['ctce_clipboard_button_background_background'] === 'classic' ) {
            $btn_bg_color = !empty($settings['ctce_clipboard_button_background_color']) ? $settings['ctce_clipboard_button_background_color'] : $btn_bg_color;
        }
        
        $btn_text_color = !empty($settings['ctce_clipboard_button_text_color']) ? $settings['ctce_clipboard_button_text_color'] : $btn_text_color;

        
        ?>
        <div id="<?php echo esc_attr( $widget_id ); ?>" class="ctce-clipboard-content" 
            data-id = "<?php echo esc_attr( $this->get_id() ); ?>" 
            data-btn-text = "<?php echo esc_attr( $settings['ctce_clipboard_btn_text'] ); ?>"
            data-btn-text-color = "<?php echo esc_attr( $btn_text_color); ?>"
            data-btn-bg-color = "<?php echo esc_attr( $btn_bg_color); ?>"
            data-btn-text-after = "<?php echo esc_attr( $settings['ctce_clipboard_btn_text_after'] ); ?>"
            data-btn-bg-after = "<?php echo esc_attr( $settings['ctce_clipboard_btn_bg_color_after'] ); ?>"
            data-btn-reset-time = "<?php echo esc_attr( $settings['ctce_clipboard_btn_reset_time'] ); ?>"
            >
            
            <?php if ( ! empty( $settings['ctce_clipboard_show_text'] ) ) : ?>
            <div class="ctce-clipboard-text-wrap">
                <h4 id="ctce-clipboard-text-<?php echo esc_attr( $this->get_id() ); ?>"><?php echo esc_html( $settings['ctce_clipboard_text'] ); ?></h4>
            </div>
            <?php endif; ?>
            <div class="ctce-clipboard-button-wrap">
                <button type="button" class="ctce-clipboard-button" data-clipboard-target="#ctce-clipboard-text-<?php echo esc_attr( $this->get_id() ); ?>">
                    <?php echo esc_html( $settings['ctce_clipboard_btn_text'] ); ?>
                </button>
            </div>
            
        </div>
        <?php
    }
    
    protected function content_template(): void {
        ?>
        <#
            var widgetId = 'ctce-clipboard-widget-' + view.cid;
            var textId = 'ctce-clipboard-text-' + view.cid;
        
            // Default colors
            var btn_text_color = '#ffffff';
            var btn_bg_color = '#ff0000';
        
            // Classic background
            if ( settings.ctce_clipboard_button_background_background === 'classic' ) {
                btn_bg_color = settings.ctce_clipboard_button_background_color ? settings.ctce_clipboard_button_background_color : btn_bg_color;
            }
        
            // Text color
            if ( settings.ctce_clipboard_button_text_color ) {
                btn_text_color = settings.ctce_clipboard_button_text_color;
            }
        #>
        <div id="{{{ widgetId }}}" class="ctce-clipboard-content" 
            data-id="{{{ view.cid }}}"
            data-btn-text="{{{ settings.ctce_clipboard_btn_text }}}"
            data-btn-text-color="{{{ btn_text_color }}}"
            data-btn-bg-color="{{{ btn_bg_color }}}"
            data-btn-text-after = "{{{ settings.ctce_clipboard_btn_text_after }}}"
            data-btn-bg-after = "{{{ settings.ctce_clipboard_btn_bg_color_after }}}"
            data-btn-reset-time = "{{{ settings.ctce_clipboard_btn_reset_time }}}"
        >
            <# if ( settings.ctce_clipboard_show_text ) { #>
            <div class="ctce-clipboard-text-wrap">
                <h4 id="{{{ textId }}}">
                    {{{ settings.ctce_clipboard_text }}}
                </h4>
            </div>
            <# } #>
            <div class="ctce-clipboard-button-wrap">
                <button type="button" class="ctce-clipboard-button" data-clipboard-target="#{{{ textId }}}">
                    {{{ settings.ctce_clipboard_btn_text }}}
                </button>
            </div>
        </div>
        <?php
    }

    
}