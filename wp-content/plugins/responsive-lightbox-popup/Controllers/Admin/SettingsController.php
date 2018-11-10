<?php

namespace GDLightbox\Controllers\Admin;

use GDLightbox\Helpers\ViewLoader;
use GDLightbox\Helpers\SettingsPageBuilder;

/**
 * Class SettingsController
 * @package GDLightbox\Controllers\Admin
 */
class SettingsController
{


    /**
     * Index page
     */
    public static function index()
    {
        $builder = new SettingsPageBuilder();

        $builder->setPageTitle(__('Lightbox Settings', 'gd_lightbox'));

        $builder->addSections(array(
            'general' => array(
                'title' => __('Main Options','gd_lightbox'),
                'description' => __('With the help of this section adjust the main settings of the Responsive Lightbox Popup.', 'gd_lightbox'),
                'features' => array(
                    'isPro' => true,
                ),
            ),
            'thumbnail' => array(
                'title' => __('Thumbnail Options','gd_lightbox'),
                'description' => __('Choose how the thumbnails are displayed in the Lightbox project.', 'gd_lightbox'),
                'features' => array(
                    'isPro' => true,
                ),
            ),
            'autoplay' => array(
                'title' => __('Autoplay Options','gd_lightbox'),
                'description' => __('In this section you can adjust Responsive Lightbox Popup project Autoplay Options.', 'gd_lightbox'),
                'features' => array(
                    'isPro' => true,
                ),
            ),
            'zoom' => array(
                'title' => __('Zoom Options','gd_lightbox'),
                'description' => __('Adjust zooming parameters from this action.', 'gd_lightbox'),
                'features' => array(
                    'isPro' => true,
                ),
            ),
            'share' => array(
                'title' => __('Social Sharing Options','gd_lightbox'),
                'description' => __('From this section, you can turn on/off the main options related to Lightbox Social Sharing.', 'gd_lightbox'),
                'features' => array(
                    'isPro' => true,
                ),
            ),
            'yt_video' => array(
                'title' => __('YouTube Video Options','gd_lightbox'),
                'description' => __('From this section, you can turn on/off the main options related to Lightbox YouTube Video.', 'gd_lightbox'),
                'features' => array(
                    'isPro' => true,
                ),
            ),
            'vm_video' => array(
                'title' => __('Vimeo Video Options','gd_lightbox'),
                'description' => __('From this section, you can turn on/off the main options related to Lightbox Vimeo Video.', 'gd_lightbox'),
                'features' => array(
                    'isPro' => true,
                ),
            )

        ));

        $builder->addFields(array(
            'type_of_transition' => array(
                'type' => 'select',
                'label' => __('Transition mode', 'gd_lightbox'),
                'options' => array(
                    'lg-slide'=>__('Slide','gd_lightbox'),
                    'lg-fade'=>__('Fade','gd_lightbox'),
                    'lg-zoom-in'=>__('Zoom in','gd_lightbox'),
                    'lg-zoom-in-big'=>__('Zoom in big','gd_lightbox'),
                    'lg-zoom-out'=>__('Zoom out','gd_lightbox'),
                    'lg-zoom-out-big'=>__('Zoom out big','gd_lightbox'),
                    'lg-zoom-out-in'=>__('Zoom out in','gd_lightbox'),
                    'lg-zoom-in-out'=>__('Zoom in out','gd_lightbox'),
                ),
                'section' => 'general',
                'help' => __('Type of transition between images.')
            ),
            'speed_transition' => array(
                'type' => 'number',
                'label' => __('Speed Transition', 'gd_lightbox'),
                'placeholder'=>__('Type here','gd_lightbox'),
                'section' => 'general',
                'help' => __('Transition duration (in ms).')
            ),
            'lightbox_height' => array(
                'type' => 'text',
                'label' => __('Height in % or px', 'gd_lightbox'),
                'placeholder'=>__('Type here','gd_lightbox'),
                'section' => 'general',
                'help' => __('Height of the gallery.')
            ),
            'lightbox_width' => array(
                'type' => 'text',
                'label' => __('Width in % or px', 'gd_lightbox'),
                'placeholder'=>__('Type here','gd_lightbox'),
                'section' => 'general',
                'help' => __('Width of the gallery.')
            ),
            'closable' => array(
                'type' => 'checkbox',
                'label' => __('Allows clicks on dimmer', 'gd_lightbox'),
                'placeholder'=>__('Type here','gd_lightbox'),
                'section' => 'general',
                'help' => __('allows clicks on dimmer to close gallery.')
            ),
            'loop' => array(
                'type' => 'checkbox',
                'label' => __('Loop', 'gd_lightbox'),
                'placeholder'=>__('Type here','gd_lightbox'),
                'section' => 'general',
                'help' => __('Will disable the ability to loop back to the beginning of the gallery when on the last element.')
            ),
            'escKey' => array(
                'type' => 'checkbox',
                'label' => __('Escape close Grand Lightbox', 'gd_lightbox'),
                'placeholder'=>__('Type here','gd_lightbox'),
                'section' => 'general',
                'help' => __('Whether the LightGallery could be closed by pressing the "Esc" key.')
            ),
            'keypress' => array(
                'type' => 'checkbox',
                'label' => __('Keyboard navigation', 'gd_lightbox'),
                'placeholder'=>__('Type here','gd_lightbox'),
                'section' => 'general',
                'help' => __('Enable keyboard navigation')
            ),
            'controls' => array(
                'type' => 'checkbox',
                'label' => __('Prev/next buttons', 'gd_lightbox'),
                'placeholder'=>__('Type here','gd_lightbox'),
                'section' => 'general',
                'help' => __('prev/next buttons will not be displayed.')
            ),
            'slideEndAnimatoin' => array(
                'type' => 'checkbox',
                'label' => __('Slide end animation', 'gd_lightbox'),
                'placeholder'=>__('Type here','gd_lightbox'),
                'section' => 'general',
                'help' => __('Enable slide End animation')
            ),
            'mousewheel' => array(
                'type' => 'checkbox',
                'label' => __('Slide on mousewheel', 'gd_lightbox'),
                'placeholder'=>__('Type here','gd_lightbox'),
                'section' => 'general',
                'help' => __('Change slide on mousewheel')
            ),
            'getCaptionFromTitleOrAlt' => array(
                'type' => 'checkbox',
                'label' => __('Show title ALT tag', 'gd_lightbox'),
                'placeholder'=>__('Type here','gd_lightbox'),
                'section' => 'general',
                'help' => __('Option to get captions from ALT or title tags.')
            ),
            'nextHtml' => array(
                'type' => 'textarea',
                'label' => __('Custom HTML for next control', 'gd_lightbox'),
                'placeholder'=>__('Type here','gd_lightbox'),
                'section' => 'general',
                'help' => __('Custom HTML for next control')
            ),
            'prevHtml' => array(
                'type' => 'textarea',
                'label' => __('Custom HTML for prev control', 'gd_lightbox'),
                'placeholder'=>__('Type here','gd_lightbox'),
                'section' => 'general',
                'help' => __('Custom HTML for prev control')
            ),
            'download' => array(
                'type' => 'checkbox',
                'label' => __('Download button.', 'gd_lightbox'),
                'placeholder'=>__('Type here','gd_lightbox'),
                'section' => 'general',
                'help' => __('Enable download button.')
            ),
            'counter' => array(
                'type' => 'checkbox',
                'label' => __('Counter images', 'gd_lightbox'),
                'placeholder'=>__('Type here','gd_lightbox'),
                'section' => 'general',
                'help' => __('Whether to show total number of images and index number of currently displayed image.')
            ),
            'enableDrag' => array(
                'type' => 'checkbox',
                'label' => __('Enable Dragging Option', 'gd_lightbox'),
                'placeholder'=>__('Type here','gd_lightbox'),
                'section' => 'general',
                'help' => __('Enables desktop mouse drag support')
            ),
            'videoMaxWidth' => array(
                'type' => 'number',
                'label' => __('Video Maximum width', 'gd_lightbox'),
                'placeholder'=>__('Type here','gd_lightbox'),
                'section' => 'general',
                'help' => __('Video maximum width (in px).')
            ),
            'thumbnail' => array(
                'type' => 'checkbox',
                'label' => __('Enable thumbnail', 'gd_lightbox'),
                'placeholder'=>__('Type here','gd_lightbox'),
                'section' => 'thumbnail',
                'help' => __('Enable thumbnails for the lightbox')
            ),
            'thumbWidth' => array(
                'type' => 'number',
                'label' => __('Thumbnail width in px', 'gd_lightbox'),
                'placeholder'=>__('Type here','gd_lightbox'),
                'section' => 'thumbnail',
                'help' => __('Width of each thumbnails.')
            ),
            'thumbContHeight' => array(
                'type' => 'number',
                'label' => __('Thumbnail height in px', 'gd_lightbox'),
                'placeholder'=>__('Type here','gd_lightbox'),
                'section' => 'thumbnail',
                'help' => __('Height of the thumbnail container including padding and border.')
            ),
            'thumbMargin' => array(
                'type' => 'number',
                'label' => __('Spacing between thumbnails in px', 'gd_lightbox'),
                'placeholder'=>__('Type here','gd_lightbox'),
                'section' => 'thumbnail',
                'help' => __('Spacing between each thumbnails.')
            ),
            'enableThumbDrag' => array(
                'type' => 'checkbox',
                'label' => __('Thumbnails drag', 'gd_lightbox'),
                'placeholder'=>__('Type here','gd_lightbox'),
                'section' => 'thumbnail',
                'help' => __('Enables desktop mouse drag support for thumbnails.')
            ),
            'enableThumbSwipe' => array(
                'type' => 'checkbox',
                'label' => __('Thumbnails swipe', 'gd_lightbox'),
                'placeholder'=>__('Type here','gd_lightbox'),
                'section' => 'thumbnail',
                'help' => __('Enables thumbnail touch/swipe support for touch devices.')
            ),
            'autoplay' => array(
                'type' => 'checkbox',
                'label' => __('Lightbox Autoplay', 'gd_lightbox'),
                'placeholder'=>__('Type here','gd_lightbox'),
                'section' => 'autoplay',
                'help' => __('Enable Lightbox autoplay.')
            ),
            'pause' => array(
                'type' => 'number',
                'label' => __('Pause time', 'gd_lightbox'),
                'placeholder'=>__('Type here','gd_lightbox'),
                'section' => 'autoplay',
                'help' => __('The time (in ms) between each auto transition.')
            ),
            'progressBar' => array(
                'type' => 'checkbox',
                'label' => __('Progress Bar', 'gd_lightbox'),
                'placeholder'=>__('Type here','gd_lightbox'),
                'section' => 'autoplay',
                'help' => __('Enable autoplay progress bar.')
            ),
            'autoplayControls' => array(
                'type' => 'checkbox',
                'label' => __('Autoplay controls', 'gd_lightbox'),
                'placeholder'=>__('Type here','gd_lightbox'),
                'section' => 'autoplay',
                'help' => __('Show/hide autoplay controls.')
            ),
            'fullScreen' => array(
                'type' => 'checkbox',
                'label' => __('Fullscreen mode', 'gd_lightbox'),
                'placeholder'=>__('Type here','gd_lightbox'),
                'section' => 'zoom',
                'help' => __('Enable/Disable fullscreen mode.')
            ),
            'zoom' => array(
                'type' => 'checkbox',
                'label' => __('Zoom', 'gd_lightbox'),
                'placeholder'=>__('Type here','gd_lightbox'),
                'section' => 'zoom',
                'help' => __('Enable/Disable zoom option.')
            ),
            'scale' => array(
                'type' => 'number',
                'label' => __('Value of zoom', 'gd_lightbox'),
                'placeholder'=>__('Type here','gd_lightbox'),
                'section' => 'zoom',
                'help' => __('Value of zoom should be incremented/decremented.')
            ),
            'actualSize' => array(
                'type' => 'checkbox',
                'label' => __('Scale zoom', 'gd_lightbox'),
                'placeholder'=>__('Type here','gd_lightbox'),
                'section' => 'zoom',
                'help' => __('Enable actual pixel icon.')
            ),
            'share' => array(
                'type' => 'checkbox',
                'label' => __('Share buttons', 'gd_lightbox'),
                'placeholder'=>__('Type here','gd_lightbox'),
                'section' => 'share',
                'help' => __('Enable/Disable share plugin.')
            ),
            'facebook' => array(
                'type' => 'checkbox',
                'label' => __('Facebook', 'gd_lightbox'),
                'placeholder'=>__('Type here','gd_lightbox'),
                'section' => 'share',
            ),
            'twitter' => array(
                'type' => 'checkbox',
                'label' => __('Twitter', 'gd_lightbox'),
                'placeholder'=>__('Type here','gd_lightbox'),
                'section' => 'share',
            ),
            'googlePlus' => array(
                'type' => 'checkbox',
                'label' => __('Google Plus', 'gd_lightbox'),
                'placeholder'=>__('Type here','gd_lightbox'),
                'section' => 'share',
            ),
            'pinterest' => array(
                'type' => 'checkbox',
                'label' => __('Pinterest', 'gd_lightbox'),
                'placeholder'=>__('Type here','gd_lightbox'),
                'section' => 'share',
            ),
            'yt_autoplay' => array(
                'type' => 'checkbox',
                'label' => __('Autoplay', 'gd_lightbox'),
                'placeholder'=>__('Type here','gd_lightbox'),
                'section' => 'yt_video',
                'help' => __('YouTube Video autoplay.')
            ),
            'yt_loop' => array(
                'type' => 'checkbox',
                'label' => __('Loop', 'gd_lightbox'),
                'placeholder'=>__('Type here','gd_lightbox'),
                'section' => 'yt_video',
                'help' => __('YouTube Video loop.')
            ),
            'yt_controls' => array(
                'type' => 'checkbox',
                'label' => __('Controls', 'gd_lightbox'),
                'placeholder'=>__('Type here','gd_lightbox'),
                'section' => 'yt_video',
                'help' => __('Switch YouTube Video controls.')
            ),
            'yt_rel' => array(
                'type' => 'checkbox',
                'label' => __('Related Videos', 'gd_lightbox'),
                'placeholder'=>__('Type here','gd_lightbox'),
                'section' => 'yt_video',
                'help' => __('YouTube Video related videos.')
            ),
            'vm_autoplay' => array(
                'type' => 'checkbox',
                'label' => __('Autoplay', 'gd_lightbox'),
                'placeholder'=>__('Type here','gd_lightbox'),
                'section' => 'vm_video',
                'help' => __('Vimeo Video autoplay.')
            ),
            'vm_loop' => array(
                'type' => 'checkbox',
                'label' => __('Loop', 'gd_lightbox'),
                'placeholder'=>__('Type here','gd_lightbox'),
                'section' => 'vm_video',
                'help' => __('Vimeo Video loop.')
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