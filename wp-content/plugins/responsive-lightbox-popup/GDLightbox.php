<?php

namespace GDLightbox;

use GDLightbox\Models\Settings;
use GDLightbox\Controllers\Admin\AdminController;
use GDLightbox\Controllers\Frontend\FrontendController;


/**
 * Class GDLightbox
 * @package GDLightbox
 */
class GDLightbox
{

    /**
     * Current version of plugin
     * @var string
     */
    public $version = '1.0.9';

    /**
     * @var AdminController
     */
    public $admin;

    /**
     * @var Settings
     */
    public $settings;

    /**
     * Classnames of migration classes
     *
     * @var array
     */
    private $migrationClasses;

    /**
     * The single instance of the class.
     *
     * @var GDLightbox
     */
    protected static $_instance = null;

    /**
     * Main GDLightbox Instance.
     *
     * Ensures only one instance of GDLightbox is loaded or can be loaded.
     *
     * @static
     * @see GDLightbox()
     * @return GDLightbox - Main instance.
     */
    public static function instance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    private function __construct()
    {
        $this->migrationClasses = array(
            'GDLightbox\Database\Migrations\CreateSettingsTable',
        );

        add_action('init', array($this, 'init'), 0);

    }

    /**
     * Initialize the plugin
     */
    public function init()
    {

        $this->checkVersion();

        $this->settings = new Settings();

        if (is_admin()) {
            $this->admin = new AdminController();
        } else {
            new FrontendController();
        }


    }

    /**
     * Check version of database and run migrations if required
     */
    private function checkVersion()
    {
        if (get_option('gd_lightbox_version') !== $this->version) {
            $this->runMigrations();
            update_option('gd_lightbox_version', $this->version);
            do_action('gd_lightbox_updated');
        }
    }

    /**
     * Run migrations
     * @throws \Exception
     */
    private function runMigrations()
    {
        if (empty($this->migrationClasses)) {
            return;
        }

        foreach ($this->migrationClasses as $className) {
            if (method_exists($className, 'run')) {
                call_user_func(array($className, 'run'));
            } else {
                throw new \Exception('Specified migration class ' . $className . ' does not have "run" method');
            }
        }
    }


    /**
     * @return string
     */
    public function viewPath()
    {
        return apply_filters('gd_lightbox_path', 'gdLightbox/');
    }

    /**
     * @return string
     */
    public function pluginPath()
    {
        return plugin_dir_path(__FILE__);
    }

    /**
     * @return string
     */
    public function pluginUrl()
    {
        return plugins_url('', __FILE__);
    }
}