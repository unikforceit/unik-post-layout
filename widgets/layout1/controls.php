<?php

namespace Elementor;

    if (!defined('ABSPATH')) {
        exit; // Exit if accessed directly
    }

class unikpostlayout_1 extends Widget_Base {

    public function get_name() {
        return 'unikpostlayout-1';
    }

    public function get_title() {
        return esc_html__('Post Layout 1', 'unikpostlayout');
    }

    public function get_icon() {
        return 'eicon-single-post';
    }

    public function get_categories() {
        return array('unikpostlayout');
    }

    protected function _register_controls() {


        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__( 'Post Layout 1', 'unikpostlayout' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'query_type',
            [
                'label' => esc_html__('Query type', 'unikpostlayout'),
                'type' => Controls_Manager::SELECT,
                'default' => 'category',
                'options' => [
                    'category' => esc_html__('Category', 'unikpostlayout'),
                    'individual' => esc_html__('Individual', 'unikpostlayout'),
                    'post_tag' => esc_html__('Post Tag', 'unikpostlayout'),
                ],
            ]
        );

        $this->add_control(
            'cat_query',
            [
                'label' => esc_html__('Category', 'unikpostlayout'),
                'type' => Controls_Manager::SELECT2,
                'options' => unikpostlayout_category_lists('category'),
                'multiple' => true,
                'label_block' => true,
                'condition' => [
                    'query_type' => 'category',
                ],
            ]
        );
        $this->add_control(
            'tag_query',
            [
                'label' => esc_html__('Tag', 'unikpostlayout'),
                'type' => Controls_Manager::SELECT2,
                'options' => unikpostlayout_category_lists('post_tag'),
                'multiple' => true,
                'label_block' => true,
                'condition' => [
                    'query_type' => 'post_tag',
                ],
            ]
        );

        $this->add_control(
            'id_query',
            [
                'label' => esc_html__('Posts', 'unikpostlayout'),
                'type' => Controls_Manager::SELECT2,
                'options' => unikpostlayout_post_lists('post'),
                'multiple' => true,
                'label_block' => true,
                'condition' => [
                    'query_type' => 'individual',
                ],
            ]
        );

        $this->add_control(
            'posts_per_page',
            [
                'label' => esc_html__('Posts Per Page', 'unikpostlayout'),
                'type' => Controls_Manager::NUMBER,
                'default' => 6,
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'cat_sty',
            [
                'label' => esc_html__( 'Category', 'unikpostlayout' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'cat_color',
            [
                'label' => esc_html__( 'Color', 'unikpostlayout' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .post1-content-wrapper .post1-category a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'cat_h_color',
            [
                'label' => esc_html__( 'Hover Color', 'unikpostlayout' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .post1-content-wrapper .post1-category a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'p_c_t',
                'label' => esc_html__( 'Typography', 'unikpostlayout' ),
                'selector' => '{{WRAPPER}} .post1-content-wrapper .post1-category a',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'cat_background',
                'label' => esc_html__( 'Background', 'unikpostlayout' ),
                'types' => [ 'classic', 'gradient',],
                'selector' => '{{WRAPPER}} .post1-content-wrapper .post1-category a',
            ]
        );
        $this->add_responsive_control(
            'cat_padding',
            [
                'label' => esc_html__( 'Content Padding', 'unikpostlayout' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .post1-content-wrapper .post1-category a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'cat_margin',
            [
                'label' => esc_html__( 'Margin', 'unikpostlayout' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .post1-content-wrapper .post1-category a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'tt_sty',
            [
                'label' => esc_html__( 'Title', 'unikpostlayout' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'title_color',
            [
                'label' => esc_html__( 'Color', 'unikpostlayout' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .post1-content-wrapper .post1-title h3 a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'post_title_h_color',
            [
                'label' => esc_html__( 'Hover Color', 'unikpostlayout' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .post1-content-wrapper .post1-title h3 a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'ttih',
                'label' => esc_html__( 'Typography', 'unikpostlayout' ),
                'selector' => '{{WRAPPER}} .post1-content-wrapper .post1-title h3 a',
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'aut_sty',
            [
                'label' => esc_html__( 'Author', 'unikpostlayout' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'post_auth_color',
            [
                'label' => esc_html__( 'Name Color', 'unikpostlayout' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .post1-content-wrapper .post1-author-info a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'post_auth_Typo',
                'label' => esc_html__( 'Name Typography', 'unikpostlayout' ),
                'selector' => '{{WRAPPER}} .post1-content-wrapper .post1-author-info a',
            ]
        );
        $this->add_control(
            'aut_h_color',
            [
                'label' => esc_html__( 'Name Hover Color', 'unikpostlayout' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .post1-content-wrapper .post1-author-info a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'meta_padding',
            [
                'label' => esc_html__( 'Content Padding', 'unikpostlayout' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .post1-content-wrapper .post1-author-info a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'auth_margin',
            [
                'label' => esc_html__( 'Margin', 'unikpostlayout' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .post1-content-wrapper .post1-author-info' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'meta_background',
                'label' => esc_html__( 'Background', 'unikpostlayout' ),
                'types' => [ 'classic', 'gradient',],
                'selector' => '{{WRAPPER}} .post1-content-wrapper .post1-author-info',
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'aut_date',
            [
                'label' => esc_html__( 'Meta', 'unikpostlayout' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'post_dat_color',
            [
                'label' => esc_html__( 'Color', 'unikpostlayout' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .post1-content-wrapper .post1-meta' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'post_dat_Typo',
                'label' => esc_html__( 'Typography', 'unikpostlayout' ),
                'selector' => '{{WRAPPER}} .post1-content-wrapper .post1-meta',
            ]
        );
        $this->add_control(
            'dat_h_color',
            [
                'label' => esc_html__( 'Hover Color', 'unikpostlayout' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .post1-content-wrapper .post1-meta:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'dsc_sty',
            [
                'label' => esc_html__( 'Description', 'unikpostlayout' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'trim',
            [
                'label' => esc_html__( 'Trim', 'unikpostlayout' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 200,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 25,
                ],
            ]
        );
        $this->add_control(
            'post_dsc_color',
            [
                'label' => esc_html__( 'Color', 'unikpostlayout' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .post1-content-wrapper .post1-excerpt p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'post_dsc_Typo',
                'label' => esc_html__( 'Typography', 'unikpostlayout' ),
                'selector' => '{{WRAPPER}} .post1-content-wrapper .post1-excerpt p',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'dsc_border',
                'label' => esc_html__( 'Border', 'unikpostlayout' ),
                'selector' => '{{WRAPPER}} .post1-content-wrapper .post1-excerpt',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'post_img_style',
            [
                'label' => esc_html__( 'Image', 'unikpostlayout' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'post_img_pad',
            [
                'label' => esc_html__( 'Image Padding', 'unikpostlayout' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .post-style-1 .post1-img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'post_img_bra',
            [
                'label' => esc_html__( 'Image Border Radius', 'unikpostlayout' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .post-style-1 .post1-img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'img_size',
            [
                'label' => esc_html__('Image size', 'unikpostlayout'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'label_block' => true,
                'options' =>  unikpostlayout_image_sizes(),
                'multiple' => false,
            ]
        );
        $this->add_control(
            'cs_img_size',
            [
                'label' => esc_html__( 'Custom Image Size', 'unikpostlayout' ),
                'type' => Controls_Manager::SLIDER,
                'condition' => [
                    'img_size' => 'custom',
                ],
                'range' => [
                    'px' => [
                        'min' => 50,
                        'max' => 1000,
                        'step' => 2,
                    ],
                ],
            ]
        );
        $this->end_controls_section();


        $this->start_controls_section(
            'post_sty',
            [
                'label' => esc_html__( 'Post Layout', 'unikpostlayout' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'content_margin',
            [
                'label' => esc_html__( 'Row Gap', 'unikpostlayout' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .post-style-1 .post-layout' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'content_shadow',
                'label' => esc_html__( 'Content Shadow', 'unikpostlayout' ),
                'selector' => '{{WRAPPER}} .post-style-1 .post1-content-wrapper',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'content_border',
                'label' => esc_html__( 'Content Border', 'unikpostlayout' ),
                'selector' => '{{WRAPPER}} .post-style-1 .post1-content-wrapper',
            ]
        );
        $this->add_responsive_control(
            'content_bra',
            [
                'label' => esc_html__( 'Content Border Radius', 'unikpostlayout' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .post-style-1 .post1-content-wrapper' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'content_pad',
            [
                'label' => esc_html__( 'Content Padding', 'unikpostlayout' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .post-style-1 .post1-content-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
    }

    protected function render() {
        require dirname(__FILE__) .'/view.php';
    }

}

Plugin::instance()->widgets_manager->register_widget_type( new unikpostlayout_1() );