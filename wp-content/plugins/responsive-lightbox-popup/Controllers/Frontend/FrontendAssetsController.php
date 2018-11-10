<?php

namespace GDLightbox\Controllers\Frontend;


use GDLightbox\Helpers\ViewLoader;

class FrontendAssetsController
{

    public function __construct()
    {
        add_action('wp_enqueue_scripts',array($this,'styles'));
        add_action('wp_enqueue_scripts',array($this,'scripts'));
        add_action('wp_head',array($this,'printStyles'));
    }

    public function styles()
    {
        wp_enqueue_style('gd_lightbox_styles', \GDLightbox()->pluginUrl().'/resources/assets/css/frontend/lightgallery.css');
        wp_enqueue_style('gd_lightbox_transitions', \GDLightbox()->pluginUrl().'/resources/assets/css/frontend/lg-transitions.css');
    }

    public function scripts()
    {
        wp_enqueue_script('gd_lightbox_gallery', \GDLightbox()->pluginUrl().'/resources/assets/js/frontend/lightgallery.js');
        wp_enqueue_script('gd_lightbox_fullscreen', \GDLightbox()->pluginUrl().'/resources/assets/js/frontend/lg-fullscreen.js');
        wp_enqueue_script('gd_lightbox_thumbnail', \GDLightbox()->pluginUrl().'/resources/assets/js/frontend/lg-thumbnail.js');
        wp_enqueue_script('gd_lightbox_video', \GDLightbox()->pluginUrl().'/resources/assets/js/frontend/lg-video.js');
        wp_enqueue_script('gd_lightbox_autoplay', \GDLightbox()->pluginUrl().'/resources/assets/js/frontend/lg-autoplay.js');
        wp_enqueue_script('gd_lightbox_zoom', \GDLightbox()->pluginUrl().'/resources/assets/js/frontend/lg-zoom.js');
        wp_enqueue_script('gd_lightbox_hash', \GDLightbox()->pluginUrl().'/resources/assets/js/frontend/lg-hash.js');
        wp_enqueue_script('gd_lightbox_pager', \GDLightbox()->pluginUrl().'/resources/assets/js/frontend/lg-pager.js');
        wp_enqueue_script('gd_lightbox_share', \GDLightbox()->pluginUrl().'/resources/assets/js/frontend/lg-share.js');
        wp_enqueue_script('gd_lightbox_mousewheel', \GDLightbox()->pluginUrl().'/resources/assets/js/frontend/jquery.mousewheel.min.js');
        wp_enqueue_script('gd_lightbox_grandwplight', \GDLightbox()->pluginUrl().'/resources/assets/js/frontend/grandwplight.js');
        wp_enqueue_script('gd_lightbox_vimeo_froogaloop', 'https://f.vimeocdn.com/js/froogaloop2.min.js');
        wp_localize_script('gd_lightbox_gallery','gdLightboxL10n',array(
            'mode' => \GDLightbox()->settings->getOption('type_of_transition'),
            'speed' => \GDLightbox()->settings->getOption('speed_transition'),
            'height' => \GDLightbox()->settings->getOption('lightbox_height'),
            'width' => \GDLightbox()->settings->getOption('lightbox_width'),
            'closable' => \GDLightbox()->settings->getOption('closable'),
            'loop' => \GDLightbox()->settings->getOption('loop'),
            'escKey' => \GDLightbox()->settings->getOption('escKey'),
            'keypress' => \GDLightbox()->settings->getOption('keypress'),
            'controls' => \GDLightbox()->settings->getOption('controls'),
            'slideEndAnimatoin' => \GDLightbox()->settings->getOption('slideEndAnimatoin'),
            'mousewheel' => \GDLightbox()->settings->getOption('mousewheel'),
            'getCaptionFromTitleOrAlt' => \GDLightbox()->settings->getOption('getCaptionFromTitleOrAlt'),
            'nextHtml' => \GDLightbox()->settings->getOption('nextHtml'),
            'prevHtml' => \GDLightbox()->settings->getOption('prevHtml'),
            'download' => \GDLightbox()->settings->getOption('download'),
            'counter' => \GDLightbox()->settings->getOption('counter'),
            'enableDrag' => \GDLightbox()->settings->getOption('enableDrag'),
        ));
        wp_localize_script('gd_lightbox_thumbnail','gdLightboxthumb',array(
            'thumbnail' => \GDLightbox()->settings->getOption('thumbnail'),
            'thumbWidth' => \GDLightbox()->settings->getOption('thumbWidth'),
            'thumbContHeight' => \GDLightbox()->settings->getOption('thumbContHeight'),
            'thumbMargin' => \GDLightbox()->settings->getOption('thumbMargin'),
            'enableThumbDrag' => \GDLightbox()->settings->getOption('enableThumbDrag'),
            'enableThumbSwipe' => \GDLightbox()->settings->getOption('enableThumbSwipe'),
        ));
        wp_localize_script('gd_lightbox_thumbnail','gdLightboxautop',array(
            'autoplay' => \GDLightbox()->settings->getOption('autoplay'),
            'pause' => \GDLightbox()->settings->getOption('pause'),
            'progressBar' => \GDLightbox()->settings->getOption('progressBar'),
            'autoplayControls' => \GDLightbox()->settings->getOption('autoplayControls'),
        ));
        wp_localize_script('gd_lightbox_fullscreen','gdLightboxfullscr',array(
            'fullScreen' => \GDLightbox()->settings->getOption('fullScreen'),
        ));
        wp_localize_script('gd_lightbox_zoom','gdLightboxzoom',array(
            'zoom' => \GDLightbox()->settings->getOption('zoom'),
            'scale' => \GDLightbox()->settings->getOption('scale'),
            'actualSize' => \GDLightbox()->settings->getOption('actualSize'),
        ));
        wp_localize_script('gd_lightbox_share','gdLightboxshare',array(
            'share' => \GDLightbox()->settings->getOption('share'),
            'facebook' => \GDLightbox()->settings->getOption('facebook'),
            'twitter' => \GDLightbox()->settings->getOption('twitter'),
            'googlePlus' => \GDLightbox()->settings->getOption('googlePlus'),
            'pinterest' => \GDLightbox()->settings->getOption('pinterest'),
        ));
        wp_localize_script('gd_lightbox_video','gdLightboxvideo',array(
            'videoMaxWidth' => \GDLightbox()->settings->getOption('videoMaxWidth'),
            'yt_autoplay' => \GDLightbox()->settings->getOption('yt_autoplay'),
            'yt_controls' => \GDLightbox()->settings->getOption('yt_controls'),
            'yt_loop' => \GDLightbox()->settings->getOption('yt_loop'),
            'yt_rel' => \GDLightbox()->settings->getOption('yt_rel'),
            'vm_autoplay' => \GDLightbox()->settings->getOption('vm_autoplay'),
            'vm_loop' => \GDLightbox()->settings->getOption('vm_loop'),
        ));
    }

    public function printStyles()
    {
        ViewLoader::render('frontend/styles.css.php');
    }

}