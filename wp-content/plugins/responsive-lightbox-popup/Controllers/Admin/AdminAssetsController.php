<?php
/**
 * Created by PhpStorm.
 * User: Huge-IT
 * Date: 5/1/2017
 * Time: 4:41 PM
 */

namespace GDLightbox\Controllers\Admin;

/**
 * Class AdminAssetsController
 * @package GDLightbox\Controllers\Admin
 */
class AdminAssetsController
{

    /**
     * AdminAssetsController constructor.
     */
    public function __construct()
    {
        add_action('admin_enqueue_scripts',array($this,'scripts'));
    }

    /**
     * Attach scripts
     *
     * @param $hook
     */
    public function scripts($hook)
    {
        if( $hook === \GDLightbox()->admin->pages['settings'] || $hook === \GDLightbox()->admin->pages['design_settings'] ){
            wp_enqueue_script('toastrjs', \GDLightbox()->pluginUrl().'/vendor/toastrjs/toastr.min.js');
            wp_enqueue_script('jscolor', \GDLightbox()->pluginUrl().'/vendor/jscolor/jscolor.min.js');
            wp_enqueue_script('gd_lightbox_settings', \GDLightbox()->pluginUrl().'/resources/assets/js/admin/settings.js', array('jquery','toastrjs'));

            wp_enqueue_style('gd_lightbox_settings', \GDLightbox()->pluginUrl().'/resources/assets/css/admin/settings.css');
            wp_enqueue_style('gd_lightbox_admin_styles', \GDLightbox()->pluginUrl().'/resources/assets/css/admin/styles.css');
            wp_enqueue_style('toastrjs', \GDLightbox()->pluginUrl().'/vendor/toastrjs/toastr.min.css');
            wp_enqueue_style('gd_lightbox_fons', 'https://fonts.googleapis.com/css?family=Roboto:400,400i,500,700');
        }
    }
}