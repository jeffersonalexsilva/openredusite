<?php

/**
 * Plugin Name: Responsive Lightbox
 * Plugin URI: https://grandwp.com
 * Description: GrandWP Responsive Lightbox Popup is the thing you will definitely need if you are looking for a flexible Lightbox.
 * Version:     1.0.9
 * Author:      GrandWP
 * Author URI:  https://grandwp.com
 * License: GNU/GPLv3 https://www.gnu.org/licenses/gpl-3.0.html
 * Domain Path: /languages
 * Text Domain: gd_lightbox
 */


if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

require 'config.php';

require 'GDLightbox.php';

/**
 * Main instance of GDLightbox.
 *
 * Returns the main instance of GDLightbox to prevent the need to use globals.
 *
 * @return \GDLightbox\GDLightbox
 */

function GDLightbox()
{
    return \GDLightbox\GDLightbox::instance();
}

$GLOBALS['GDLightbox'] = GDLightbox();