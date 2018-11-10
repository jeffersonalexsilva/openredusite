<?php

namespace GDLightbox\Helpers;

class ViewLoader
{

    /**
     * @param $view
     * @param string $view_path
     * @param string $default_path
     *
     * @return mixed
     */
    public static function locate($view, $view_path = '', $default_path = '' ) {
        if ( ! $view_path ) {
            $view_path = \GDLightbox()->viewPath();
        }
        if ( ! $default_path ) {
            $default_path = \GDLightbox()->pluginPath() . '/resources/views/';
        }
        /**
         * Look within passed path within the theme - this is priority.
         */
        $template = locate_template(
            array(
                trailingslashit( $view_path ) . $view,
                $view
            )
        );
        /**
         * Get default template
         */
        if ( ! $template ) {
            $template = $default_path . $view;
        }

        /**
         * Return what we found.
         */
        return apply_filters( 'gd_lightbox_locate_view', $template, $view, $view_path );
    }

    /**
     * @param $path
     * @param array $args
     * @param string $view_path
     * @param string $default_path
     */
    public static function render($path, $args = array(), $view_path = '', $default_path = '' ) {
        if ( $args && is_array( $args ) ) {

            extract( $args );

        }

        $located = self::locate( $path, $view_path, $default_path );

        if ( ! file_exists( $located ) ) {

            _doing_it_wrong( __FUNCTION__, sprintf( '<code>%s</code> does not exist.', $located ), '1.0' );

            return;

        }

        $located = apply_filters( 'gd_lightbox_get_view', $located, $path, $args, $view_path, $default_path );

        do_action( 'gd_lightbox_before_view', $path, $view_path, $located, $args );

        include( $located );

        do_action( 'gd_lightbox_after_view', $path, $view_path, $located, $args );
    }

    /**
     * @param $view
     * @param array $args
     * @param string $view_path
     * @param string $default_path
     * @return string
     */
    public static function get_rendered($view, $args = array(), $view_path = '', $default_path = ''){
        ob_start();
        self::render($view, $args, $view_path, $default_path);
        return ob_get_clean();
    }

}