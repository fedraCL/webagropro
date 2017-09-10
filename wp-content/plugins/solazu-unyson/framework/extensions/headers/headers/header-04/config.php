<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Forbidden' );
}

$cfg = array();

$headers_extension = slz_ext( 'headers' )->get_header('header_04');

$cfg['general'] = array(
	'name' 			 => esc_html__( 'Header 04', 'slz' ),
	'description'    => esc_html__( 'Header 04', 'slz' ),
	'small_img'  	 => array(
        'height' => 70,
        'src'    => $headers_extension->locate_URI('/static/img/thumbnail.png')
    ),
    'large_img'  	 => array(
        'height' => 214,
        'src'    => $headers_extension->locate_URI('/static/img/thumbnail.png')
    )
);
