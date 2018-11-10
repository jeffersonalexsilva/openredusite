<?php

namespace GDLightbox\Controllers\Admin;
use GDLightbox\Helpers\ViewLoader;

/**
 * Class AdminController
 * @package GDLightbox\Controllers\Admin
 */
class AdminController
{
    /**
     * @var string[]
     */
    public $pages = array();

    public function __construct()
    {
        new AdminAssetsController();
        add_action('admin_menu', array($this,'adminMenu'));
        $this->actionHandling();
    }

    public function adminMenu()
    {
        $this->pages['settings'] = add_menu_page(
            __('Grand Lightbox', 'gd_lightbox'),
            __('Grand Lightbox', 'gd_lightbox'),
            'manage_options',
            'gd_lightbox',
            array('GDLightbox\Controllers\Admin\SettingsController','index'),
            \GDLightbox()->pluginUrl().'/resources/assets/images/logo/logo1.png'
        );
        $this->pages['design_settings'] = add_submenu_page(
            'gd_lightbox',
            __('Design customization', 'gd_lightbox'),
            __('Design customization', 'gd_lightbox'),
            'manage_options',
            'gd_lightbox_design',
            array('GDLightbox\Controllers\Admin\DesignSettingsController','index')
        );
        $this->pages['featured_plugins'] = add_submenu_page(
            'gd_lightbox',
            __('Featured plugins', 'gd_lightbox'),
            __('Featured plugins', 'gd_lightbox'),
            'manage_options',
            'gd_lightbox_featured',
            array($this,'featuredPluginsPage')
        );
    }

    public function actionHandling()
    {
        add_action('wp_ajax_save_gd_lightbox_settings', array('GDLightbox\Controllers\Admin\SettingsController','save'));
    }

    public function featuredPluginsPage()
    {
        ViewLoader::render('admin/header-banner.php');
        ViewLoader::render('admin/featured-plugins.php');
        wp_enqueue_style('gd_lightbox_settings', \GDLightbox()->pluginUrl().'/resources/assets/css/admin/settings.css');
        wp_enqueue_style('gd_lightbox_admin_styles', \GDLightbox()->pluginUrl().'/resources/assets/css/admin/styles.css');
    }

}