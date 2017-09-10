<?php if ( ! defined( 'SLZ' ) ) die( 'Forbidden' ); ?>
<?php
/**
 * The template for displaying the service archive content
 *
 */

get_header();
$slz_container_css = slz_extra_get_container_class();

$atts = array(
			'layout'      => 'layout-2',
			'style'       => 'style-1',
			'show_icon'   => 'feature-image',
			'column'      => '3',
			'pagination'  => 'yes',
			'limit_post'  => get_option('posts_per_page'),
			'description' => 'archive',
			'btn_more'    => 'yes',
			'btn_content' => esc_html__('Read More', 'transera')
		);
if( is_tax( 'slz-service-cat' ) ){
	$queried_object = get_queried_object();
	$atts['category_slug'] = $queried_object->slug;
}
if ( ! $slz_container_css['show_sidebar'] ){
	$atts['column'] = '4';
}
$model = new SLZ_Service();
$model->init( $atts );

$html_format = '
    <div class="item">
        <div class="slz-icon-box-2 theme-'. esc_attr( $model->attributes['style'] ) .'">
            <div class="icon-cell">
                %1$s
            </div>
            <div class="content-cell">
                <div class="wrapper-info">
                    %2$s
                    %3$s
                    %4$s
                </div>
            </div>
        </div>
    </div>
';
$html_render =  array( 'html_format' => $html_format );
?>
<div class="slz-main-content padding-top-100 padding-bottom-100">
	<div class="container">
		<div class="slz-services-archive <?php echo esc_attr( $slz_container_css['sidebar_layout_class'] ); ?>">
			<div class="row">
				<div id="page-content" class="slz-content-column <?php echo esc_attr( $slz_container_css['content_class'] ); ?>">
					<div class="service-archive-wrapper">
						<div class="sc-service-list slz-list-block <?php echo esc_attr($model->attributes['responsive-class']); ?>">
							<?php $model->render_list( $html_render ); ?>
						</div>
					</div>

				</div>
				<?php if ( $slz_container_css['show_sidebar'] ) :?>
					<div id='page-sidebar' class="slz-sidebar-column slz-widgets <?php echo esc_attr( $slz_container_css['sidebar_class'] ); ?>">
						<?php dynamic_sidebar( $slz_container_css['sidebar'] ); ?>
					</div>
				<?php endif; ?>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>