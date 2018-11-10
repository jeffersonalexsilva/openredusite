<?php

namespace GDLightbox\Controllers\Frontend;

/**
 * Class FrontendController
 * @package GDLightbox\Controllers\Frontend
 */
class FrontendController
{

    /**
     * FrontendController constructor.
     */
    public function __construct()
    {
        new FrontendAssetsController();
    }

}