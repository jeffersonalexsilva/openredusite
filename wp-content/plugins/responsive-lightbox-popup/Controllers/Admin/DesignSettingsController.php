<?php

namespace GDLightbox\Controllers\Admin;

use GDLightbox\Helpers\ViewLoader;
use GDLightbox\Helpers\SettingsPageBuilder;

/**
 * Class DesignSettingsController
 * @package GDLightbox\Controllers\Admin
 */
class DesignSettingsController
{


    /**
     * Index page
     */
    public static function index()
    {
        $builder = new SettingsPageBuilder();

        $builder->setPageTitle(__('Design Customization', 'gd_lightbox'));

        $builder->addSections(array(
            'title_options' => array(
                'title' => __('Title Options','gd_lightbox'),
                'description' => __('Choose how the lightbox title is displayed from this section.', 'gd_lightbox'),
            ),
            'image_options' => array(
                'title' => __('Image Options','gd_lightbox'),
                'description' => __('Choose how the lightbox images should be displayed.', 'gd_lightbox'),
            ),
            'arrows_options' => array(
                'title' => __('Arrows Options','gd_lightbox'),
                'description' => __('From this section easily control Lightbox project arrows.', 'gd_lightbox'),
            ),
            'thumbnail_options' => array(
                'title' => __('Thumbnail Options','gd_lightbox'),
                'description' => __('Choose whether to show thumbnails, set thumbnail size and their positioning from this section.', 'gd_lightbox'),
            ),
        ));

        $builder->addFields(array(
            'gd_lightbox_size_px' => array(
                'type' => 'number',
                'label' => __('Title size in px', 'gd_lightbox'),
                'placeholder'=>__('Type here','gd_lightbox'),
                'section' => 'title_options',
                'help' => __('Set the Lightbox title size in px.')
            ),
            'gd_lightbox_color' => array(
                'type' => 'color',
                'label' => __('Title color #', 'gd_lightbox'),
                'placeholder'=>__('Type here','gd_lightbox'),
                'section' => 'title_options',
                'help' => __('Set the Lightbox title color in Hexadecimal color system.')
            ),
            'gd_lightbox_text_align' => array(
                'type' => 'select',
                'label' => __('Text align', 'gd_lightbox'),
                'options' => array(
                    'center'=>__('Center','gd_lightbox'),
                    'left'=>__('Left','gd_lightbox'),
                    'right'=>__('Right','gd_lightbox'),
                ),
                'section' => 'title_options',
                'help' => __('Set Lightbox text alignment among the offered: Center, Left, Right.')
            ),
            'gd_lightbox_padding_top_and_bottom_px' => array(
                'type' => 'number',
                'label' => __('Padding in px', 'gd_lightbox'),
                'placeholder'=>__('Type here','gd_lightbox'),
                'section' => 'title_options',
                'help' => __('Set top and bottom padding in px.')
            ),
            'gd_lightbox_bottom_top_px_bottoms' => array(
                'type' => 'number',
                'label' => __('Title top in px', 'gd_lightbox'),
                'placeholder'=>__('Type here','gd_lightbox'),
                'section' => 'title_options',
                'help' => __('Set top title in px.')
            ),
            'gd_lightbox_title_opacity' => array(
                'type' => 'number',
                'label' => __('Title Opacity in %', 'gd_lightbox'),
                'placeholder'=>__('Type here','gd_lightbox'),
                'section' => 'title_options',
                'help' => __('Set Title Opacity in %.')
            ),
            'gd_lightbox_image_border_px' => array(
                'type' => 'number',
                'label' => __('Image border size in px', 'gd_lightbox'),
                'placeholder'=>__('Type here','gd_lightbox'),
                'section' => 'image_options',
                'help' => __('Set Lightbox Image border size in px')
            ),
            'gd_lightbox_image_border_color' => array(
                'type' => 'color',
                'label' => __('Image border color', 'gd_lightbox'),
                'placeholder'=>__('Type here','gd_lightbox'),
                'section' => 'image_options',
                'help' => __('Set Lightbox Image border color')
            ),
            'gd_lightbox_image_border_radius_px' => array(
                'type' => 'number',
                'label' => __('Image border radius in px', 'gd_lightbox'),
                'placeholder'=>__('Type here','gd_lightbox'),
                'section' => 'image_options',
                'help' => __('Set Lightbox Image border radius in px')
            ),
            'gd_lightbox_image_opacity' => array(
                'type' => 'number',
                'label' => __('Image opacity in %', 'gd_lightbox'),
                'placeholder'=>__('Type here','gd_lightbox'),
                'section' => 'image_options',
                'help' => __('Set Lightbox Image opacity in %')
            ),
            'gd_lightbox_image_blur_count' => array(
                'type' => 'number',
                'label' => __('Image Blur', 'gd_lightbox'),
                'placeholder'=>__('Type here','gd_lightbox'),
                'section' => 'image_options',
                'help' => __('Set Lightbox Image blur')
            ),
            'gd_lightbox_image_brightness_percent' => array(
                'type' => 'number',
                'label' => __('Image Brightness', 'gd_lightbox'),
                'placeholder'=>__('Type here','gd_lightbox'),
                'section' => 'image_options',
                'help' => __('Set Lightbox Image brightness in %')
            ),
            'gd_lightbox_image_contrast_percent' => array(
                'type' => 'number',
                'label' => __('Image contrast', 'gd_lightbox'),
                'placeholder'=>__('Type here','gd_lightbox'),
                'section' => 'image_options',
                'help' => __('Set Lightbox Image contrast in %')
            ),
            'gd_lightbox_image_grayscale_percent' => array(
                'type' => 'number',
                'label' => __('Image Grayscale', 'gd_lightbox'),
                'placeholder'=>__('Type here','gd_lightbox'),
                'section' => 'image_options',
                'help' => __('Set Lightbox Image Grayscale in %')
            ),
            'gd_lightbox_image_invert' => array(
                'type' => 'number',
                'label' => __('Image Invert', 'gd_lightbox'),
                'placeholder'=>__('Type here','gd_lightbox'),
                'section' => 'image_options',
                'help' => __('Set Lightbox Image Invert in %')
            ),
            'gd_lightbox_image_saturate' => array(
                'type' => 'number',
                'label' => __('Image Saturate', 'gd_lightbox'),
                'placeholder'=>__('Type here','gd_lightbox'),
                'section' => 'image_options',
                'help' => __('Set Lightbox Image Saturate')
            ),
            'gd_lightbox_image_sepia' => array(
                'type' => 'number',
                'label' => __('Image Sepia', 'gd_lightbox'),
                'placeholder'=>__('Type here','gd_lightbox'),
                'section' => 'image_options',
                'help' => __('Set Lightbox Image Sepia in %')
            ),
            'gd_lightbox_arrows_size_px' => array(
                'type' => 'number',
                'label' => __('Arrows size in px', 'gd_lightbox'),
                'placeholder'=>__('Type here','gd_lightbox'),
                'section' => 'arrows_options',
                'help' => __('Lightbox arrows size in px')
            ),
            'gd_lightbox_arrows_padding_left_right' => array(
                'type' => 'number',
                'label' => __('Arrows padding', 'gd_lightbox'),
                'placeholder'=>__('Type here','gd_lightbox'),
                'section' => 'arrows_options',
                'help' => __('Lightbox arrows padding left and right')
            ),
            'gd_lightbox_thumbnail_border_px' => array(
                'type' => 'number',
                'label' => __('Border size in px', 'gd_lightbox'),
                'placeholder'=>__('Type here','gd_lightbox'),
                'section' => 'thumbnail_options',
                'help' => __('Easily adjust Lightbox thumbnail border size')
            ),
            'gd_lightbox_thumbnail_border_color' => array(
                'type' => 'color',
                'label' => __('Border color', 'gd_lightbox'),
                'placeholder'=>__('Type here','gd_lightbox'),
                'section' => 'thumbnail_options',
                'help' => __('Set thumbnail border color')
            ),
            'gd_lightbox_thumbnail_border_radius_px' => array(
                'type' => 'number',
                'label' => __('Border radius in px', 'gd_lightbox'),
                'placeholder'=>__('Type here','gd_lightbox'),
                'section' => 'thumbnail_options',
                'help' => __('Adjust Lightbox thumbnail border radius')
            ),
            'gd_lightbox_thumbnail_opacity' => array(
                'type' => 'number',
                'label' => __('Opacity in %', 'gd_lightbox'),
                'placeholder'=>__('Type here','gd_lightbox'),
                'section' => 'thumbnail_options',
                'help' => __('Set Lightbox thumbnail opacity value in %')
            ),
            'gd_lightbox_thumbnail_border_color_active' => array(
                'type' => 'color',
                'label' => __('Border color in hover and active', 'gd_lightbox'),
                'placeholder'=>__('Type here','gd_lightbox'),
                'section' => 'thumbnail_options',
                'help' => __('Set Lightbox thumbnail border color in hover and active')
            ),
        ));

        $builder->render();

    }

    /**
     * Save settings
     */
    public static function save()
    {
        if( !isset($_POST['_wpnonce']) || !wp_verify_nonce($_POST['_wpnonce'], 'gd_lightbox_settings') ){
            die(0);
        }

        if(!isset($_POST['settings']) || empty($_POST['settings']) || !is_array($_POST['settings'])){
            die(0);
        }

        foreach($_POST['settings'] as $key=>$value){
            \GDLightbox()->settings->setOption($key,$value);
        }

        echo 'ok';
        die;
    }

}