<?php

if (! defined ( 'SLZ' )) {
	die ( 'Forbidden' );
}

$cfg = array ();

$cfg ['page_builder'] = array (
		'title' => esc_html__( 'SLZ Accordion', 'transera' ),
		'description' => esc_html__( 'Accordion of info list', 'transera' ),
		'tab' => slz()->theme->manifest->get('name'),
		'icon' => 'icon-slzcore-accordion slz-vc-slzcore',
		'tag' => 'slz_accordion' 
);

$cfg ['layouts'] = array (
		'plus'  => esc_html__ ( 'Layout 1', 'transera' ),
		'arrow' => esc_html__ ( 'Layout 2', 'transera' )
);

$cfg ['default_value'] = array (
		'layout' 					=> 'accordion',
		'style' 					=> 'style-1',
		'icon'                      => 'plus',
		'icon_position'             => 'right',
		'accordion_list' 			=> '',
		'block_title_color'			=> '',
		'panel_background_color'    => '',
		'panel_active_background_color'  => '',
		'icon_color_active'         => '',
		'icon_bg_color_active'      => '',
		'icon_color'                => '',
		'icon_bg_color'             => '',
		'title_color' 				=> '',
		'content_color' 			=> '',
		'extra_class' 				=> '',
);