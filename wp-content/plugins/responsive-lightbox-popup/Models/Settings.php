<?php

namespace GDLightbox\Models;


class Settings
{

    private $tableName;

    /**
     * @var []
     */
    private $options = array(
        'type_of_transition' => 'lg-slide',
        'speed_transition' => '600',
        'lightbox_height' => '100%',
        'lightbox_width' => '100%',
        'closable' => true,
        'loop' => true,
        'escapekey' => true,
        'keypress' => true,
        'controls' => true,
        'slideEndAnimatoin' => true,
        'mousewheel' => true,
        'getCaptionFromTitleOrAlt' => true,
        'nextHtml' => '',
        'prevHtml' => '',
        'download' => true,
        'counter' => true,
        'enableDrag' => true,
        'thumbnail' => true,
        'thumbWidth' => '100',
        'thumbContHeight' => '100',
        'thumbMargin' => '5',
        'enableThumbDrag' => true,
        'autoplay' => false,
        'pause' => '8',
        'progressBar' => true,
        'autoplayControls' => true,
        'fullScreen' => true,
        'zoom' => true,
        'scale' => '1',
        'actualSize' => true,
        'share' => false,
        'facebook' => true,
        'twitter' => true,
        'googlePlus' => true,
        'pinterest' => true,
        'gd_lightbox_size_px' => '16',
        'gd_lightbox_color' => 'EEEEEE',
        'gd_lightbox_text_align' => 'center',
        'gd_lightbox_padding_top_and_bottom_px' => '10',
        'gd_lightbox_bottom_top_px_bottoms' => '0',
        'gd_lightbox_title_opacity' => '100',
        'gd_lightbox_image_border_px' => '0',
        'gd_lightbox_image_border_color' => 'fff',
        'gd_lightbox_image_border_radius_px' => '0',
        'gd_lightbox_image_opacity' => '1',
        'gd_lightbox_image_blur_count' => '0',
        'gd_lightbox_image_brightness_percent' => '100',
        'gd_lightbox_image_contrast_percent' => '100',
        'gd_lightbox_image_grayscale_percent' => '0',
        'gd_lightbox_image_invert' => '0',
        'gd_lightbox_image_saturate' => '1',
        'gd_lightbox_image_sepia' => '0',
        'gd_lightbox_arrows_size_px' => '22',
        'gd_lightbox_arrows_padding_left_right' => '10',
        'gd_lightbox_thumbnail_border_px' => '2',
        'gd_lightbox_thumbnail_border_color' => 'fff',
        'gd_lightbox_thumbnail_border_radius_px' => '4',
        'gd_lightbox_thumbnail_opacity' => '1',
        'gd_lightbox_thumbnail_border_color_active' => 'a90707',
        'videoMaxWidth' => '855px',
        'yt_autoplay' => '0',
        'yt_controls' => '0',
        'yt_loop' => '0',
        'yt_rel' => '0',
        'vm_autoplay' => '0',
        'vm_loop' => '0',
    );

    private $proOptions = array(
        'type_of_transition',
        'speed_transition',
        'lightbox_height',
        'lightbox_width',
        'closable',
        'loop',
        'escapekey',
        'keypress',
        'controls',
        'slideEndAnimatoin',
        'mousewheel',
        'getCaptionFromTitleOrAlt',
        'nextHtml',
        'prevHtml',
        'download',
        'counter',
        'enableDrag',
        'thumbnail',
        'thumbWidth',
        'thumbContHeight',
        'thumbMargin',
        'enableThumbDrag',
        'autoplay',
        'pause',
        'progressBar',
        'autoplayControls',
        'fullScreen',
        'zoom',
        'scale',
        'actualSize',
        'share',
        'facebook',
        'twitter',
        'googlePlus',
        'pinterest',
        'videoMaxWidth',
        'yt_autoplay',
        'yt_controls',
        'yt_loop' ,
        'yt_rel' ,
        'vm_autoplay',
        'vm_loop' ,

    );

    public function __construct()
    {
        global $wpdb;
        $this->tableName = $wpdb->prefix . 'gd_lightbox_settings';

        $dbResults = $wpdb->get_results("SELECT * FROM `" . $this->tableName . "`", ARRAY_A);

        if (!empty($dbResults)) {
            foreach ($dbResults as $r) {

                $unserialized_value = @unserialize($r['option_value']);

                if (false !== $unserialized_value || 'b:0;' === $r['option_value']) {
                    $r['option_value'] = $unserialized_value;
                }

                $this->options[$r['option_key']] = $r['option_value'];
            }
        }
    }

    /**
     * @return array
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @param string $key
     * @return mixed
     */
    public function getOption($key)
    {
        if (!isset($this->options[$key])) {
            return null;
        }
        return $this->options[$key];
    }

    /**
     * @param $key
     * @param $value
     * @return bool
     */
    public function setOption($key, $value)
    {
        if(in_array($key,$this->proOptions)){
            return false;
        }


        global $wpdb;

        $key = sanitize_text_field($key);

        if (is_array($value) || is_object($value) || is_bool($value)) {
            $value = serialize($value);
        }

        if ($value === 'true') {
            $value = 'b:1;';
        } elseif ($value === 'false') {
            $value = 'b:0;';
        }

        $saved = $wpdb->query($wpdb->prepare('INSERT INTO ' . $this->tableName . ' (option_key,option_value) VALUES(%s,%s) ON DUPLICATE KEY UPDATE option_value=%s', $key, $value, $value));


        if (false !== $saved) {
            $this->options[$key] = $value;
        }

        return true;
    }

}