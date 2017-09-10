<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package WordPress
 * @subpackage Transera
 * @since 1.0
 */
?>

<?php 

if ( transera_check_extension('footers') ) {

	if ( is_page( ) ) {

		$transera_selected_footer = slz_get_db_post_option( get_the_ID(), 'page-footer-style' );

		if ( $transera_selected_footer == 'default' )
			unset ( $transera_selected_footer );

	}

	if ( empty ( $transera_selected_footer ) && slz_get_db_settings_option('slz-footer-style-group/slz-footer-style', false) ){

		$transera_selected_footer = slz_get_db_settings_option('slz-footer-style-group/slz-footer-style', '');

	}

	if ( !empty ( $transera_selected_footer ) ) {

		$transera_footer = slz_ext('footers')->get_footer( $transera_selected_footer );

		if ( !empty ( $transera_footer ) )
			$transera_footer->render();

	}

}
else
	get_template_part('default-templates/footer');

?>

	</div>
</div>
<?php

	if ( defined('SLZ') ) {

		if ( slz_get_db_settings_option('enable-scroll-to', '') == 'yes' ) {
			$transera_scroll_settings = slz_get_db_settings_option('scroll-to-top-styling', '');

			$transera_icon = '<i class="fa fa-angle-up"></i>';

			if ( !empty ( $transera_scroll_settings ) ) {

				if ( $transera_scroll_settings['icon-type']['icon-box-img'] == 'icon-class' && ! empty( $transera_scroll_settings['icon-type']['icon-class']['icon_class'] ) ) {

					$transera_icon = '<i class="' . esc_attr( $transera_scroll_settings['icon-type']['icon-class']['icon_class'] ) . '"></i>';

				} elseif ( $transera_scroll_settings['icon-type']['icon-box-img'] == 'upload-icon' && ! empty( $transera_scroll_settings['icon-type']['upload-icon']['upload-custom-img'] ) ) {

					$transera_icon = '<img src="' . esc_url ( $transera_scroll_settings['icon-type']['upload-icon']['upload-custom-img']['url'] ) . '"/>';
				}

			}

			echo '<div class="btn-wrapper back-to-top"><a href="#top" class="btn btn-transparent">' . wp_kses_post( $transera_icon ) . '</a></div>';
			
		}

	}
?>
<?php wp_footer(); ?>

</body>
</html>
