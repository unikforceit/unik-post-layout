<?php

namespace Elementor;

    if (!defined('ABSPATH')) {
        exit; // Exit if accessed directly
    }

class unikpostlayout_2 extends Widget_Base {

    public function get_name() {
        return 'unikpostlayout-2';
    }

    public function get_title() {
        return esc_html__('Post Layout 2', 'unikpostlayout');
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
        $this->add_control(
            'layout',
            [
                'label' => esc_html__('Select Layout', 'unikpostlayout'),
                'type' => Controls_Manager::SELECT,
                'default' => 'layout1',
                'options' => [
                    'layout1' => esc_html__('Layout 1', 'unikpostlayout'),
                    'layout2' => esc_html__('Layout 2', 'unikpostlayout'),
                    'layout3' => esc_html__('Layout 3', 'unikpostlayout'),
                ],
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
                    '{{WRAPPER}} .post2-content-wrapper .post2-category' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'cat_h_color',
            [
                'label' => esc_html__( 'Hover Color', 'unikpostlayout' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .post2-category a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'p_c_t',
                'label' => esc_html__( 'Typography', 'unikpostlayout' ),
                'selector' => '{{WRAPPER}} .post2-content-wrapper .post2-category',
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
                    '{{WRAPPER}} .post2-content-wrapper .post2-title h3' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'post_title_h_color',
            [
                'label' => esc_html__( 'Hover Color', 'unikpostlayout' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .post2-content-wrapper .post2-title h3:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'ttih',
                'label' => esc_html__( 'Typography', 'unikpostlayout' ),
                'selector' => '{{WRAPPER}} .post2-content-wrapper .post2-title h3',
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
                    '{{WRAPPER}} .post2-content-wrapper .post2-author-info a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'post_auth_Typo',
                'label' => esc_html__( 'Name Typography', 'unikpostlayout' ),
                'selector' => '{{WRAPPER}} .post2-content-wrapper .post2-author-info a',
            ]
        );
        $this->add_control(
            'aut_h_color',
            [
                'label' => esc_html__( 'Name Hover Color', 'unikpostlayout' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .post2-content-wrapper .post2-author-info a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'aut_date',
            [
                'label' => esc_html__( 'Date', 'unikpostlayout' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'post_dat_color',
            [
                'label' => esc_html__( 'Color', 'unikpostlayout' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .post2_post_date' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'post_dat_Typo',
                'label' => esc_html__( 'Typography', 'unikpostlayout' ),
                'selector' => '{{WRAPPER}} .post2_post_date',
            ]
        );
        $this->add_control(
            'dat_h_color',
            [
                'label' => esc_html__( 'Date Hover Color', 'unikpostlayout' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .post2_post_date:hover' => 'color: {{VALUE}}',
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
                    '{{WRAPPER}} .post2-content-wrapper .post2-excerpt p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'post_dsc_Typo',
                'label' => esc_html__( 'Typography', 'unikpostlayout' ),
                'selector' => '{{WRAPPER}} .post2-content-wrapper .post2-excerpt p',
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
                    '{{WRAPPER}} .post-style-2 .post-img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
            'bts',
            [
                'label' => esc_html__( 'Button', 'unikpostlayout' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $normal_selector = '{{WRAPPER}} .post-style-2 .post2-read-more';
        $hover_selector = '{{WRAPPER}} .post-style-2 .post2-read-more:hover';
        $this->start_controls_tabs('content_normal');
        $this->start_controls_tab(
            'normal',
            [
                'label' => esc_html__( 'Normal', 'unikpostlayout' ),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'btt',
                'label' =>   esc_html__( 'Typography', 'unikpostlayout' ),
                'selector' => $normal_selector,
            ]
        );
        $this->add_control(
            'btc',
            [
                'label' =>   esc_html__( 'Color', 'unikpostlayout' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    $normal_selector => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'box_shadow',
                'label' => esc_html__( 'Shadow', 'unikpostlayout' ),
                'selector' => $normal_selector,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'ab_background',
                'label' => esc_html__( 'Background', 'unikpostlayout' ),
                'types' => [ 'classic', 'gradient', 'video' ],
                'selector' => $normal_selector,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'ab_border',
                'label' => esc_html__( 'Border', 'unikpostlayout' ),
                'selector' => $normal_selector,
            ]
        );
        $this->add_responsive_control(
            'border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'unikpostlayout' ),
                'type' =>  \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    $normal_selector => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'padding',
            [
                'label' => esc_html__( 'Padding', 'unikpostlayout' ),
                'type' =>  \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    $normal_selector => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab(
            'hover',
            [
                'label' => esc_html__( 'Hover', 'unikpostlayout' ),
            ]
        );
        $this->add_control(
            'bthc',
            [
                'label' =>   esc_html__( 'Color', 'unikpostlayout' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    $hover_selector => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'boxh_shadow',
                'label' => esc_html__( 'Box Shadow', 'unikpostlayout' ),
                'selector' => $hover_selector,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'abh_background',
                'label' => esc_html__( 'Background', 'unikpostlayout' ),
                'types' => [ 'classic', 'gradient', 'video' ],
                'selector' => '{{WRAPPER}} .post-style-2 .post2-read-more a:before',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'abh_border',
                'label' => esc_html__( 'Border', 'unikpostlayout' ),
                'selector' => $hover_selector,
            ]
        );
        $this->add_responsive_control(
            'borderh_radius',
            [
                'label' => esc_html__( 'Border Radius', 'unikpostlayout' ),
                'type' =>  \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    $hover_selector => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();



        $this->start_controls_section(
            'post_sty',
            [
                'label' => __( 'Post Layout', 'unikpostlayout' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'content_margin',
            [
                'label' => __( 'Row Gap', 'unikpostlayout' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .post-style-2 .post-layout' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'content_pad',
            [
                'label' => __( 'Content Padding', 'unikpostlayout' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .post-style-2 .post2-content-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
    }

    protected function render() {
        require dirname(__FILE__) .'/view.php';
    }

}

Plugin::instance()->widgets_manager->register_widget_type( new unikpostlayout_2() );