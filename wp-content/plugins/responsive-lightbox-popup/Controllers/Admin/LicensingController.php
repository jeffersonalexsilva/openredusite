<?php

namespace GDLightbox\Controllers\Admin;

use GDLightbox\Helpers\ViewLoader;

/**
 * Class LicensingController
 * @package GDLightbox\Controllers\Admin
 */
class LicensingController
{

    /**
     * Index page
     */
    public static function index()
    {
        ViewLoader::render('admin/licensing.php');
    }

}