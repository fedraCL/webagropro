<?php
class SLZ_Widget_Material_Download extends WP_Widget {

    private $slz_widget;
    private $config;
    /**
     * @internal
     */
    function __construct() {
        $this->slz_widget = slz_ext('widgets')->get_widget( get_class ($this) );

        if(empty($this->slz_widget)) {
            trigger_error('Cannot load widget material download', E_USER_WARNING);
            return;
        }

        $this->config = $this->slz_widget->get_config('general');

        $widget_ops = array(
            'description' => (!empty( $this->config['description'] ) ? $this->config['description'] : ''),
            'classname'   => (!empty( $this->config['classname'] ) ? $this->config['classname'] : ''),
        );
        parent::__construct( $this->config['id'], $this->config['name'], $widget_ops );
    }
    /**
     * @param array $args
     * @param array $instance
     */
    function widget($args, $instance) {
        $unique_id = SLZ_Com::make_id();
        //get translated strings
        $title = slz_ext_widget_filters_block_title($args, $this, $instance['name']);

        $data = array(
            'before_widget' => $args['before_widget'],
            'after_widget'  => $args['after_widget'],
            'title'         => $title,
            'instance'      => $instance,
            'unique_id'		=> $unique_id
        );
        echo slz_render_view($this->slz_widget->locate_path( '/views/front.php' ), $data);
    }

    function update( $new_instance, $old_instance ) {
        //register strings for translation
        slz_ext_widget_wpml_register_string($this, $new_instance['name']);
        
        return $new_instance;
    }
    function form($instance) {

        $instance = wp_parse_args( (array) $instance, $this->slz_widget->get_config('default_value') );
        echo slz_render_view($this->slz_widget->locate_path( '/views/admin.php' ), array( 'instance' => $instance, 'object' => $this ) );
    }

}