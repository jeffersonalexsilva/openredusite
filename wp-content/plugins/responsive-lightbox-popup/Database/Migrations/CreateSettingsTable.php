<?php

namespace GDLightbox\Database\Migrations;

/**
 * Class CreateSettingsTable
 * @package GDLightbox\Database\Migrations
 */
class CreateSettingsTable
{

    /**
     * Run the migration
     */
    public static function run()
    {
        global $wpdb;

        $wpdb->query("CREATE TABLE IF NOT EXISTS `" . $wpdb->prefix . "gd_lightbox_settings`(
            `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
            `option_key` VARCHAR(200) NOT NULL,
            `option_value` TEXT,
             PRIMARY KEY(`id`),
             UNIQUE KEY (`option_key`)
        )");
    }

}