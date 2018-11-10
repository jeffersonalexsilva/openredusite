<?php
/**
*
 */
 echo '<style>';
 
\GDLightbox()->settings->getOption('myoptions');
?>
.lg-sub-html {
    background-color: rgba(0, 0, 0, 0.45);
    bottom: <?php echo GDLightbox()->settings->getOption('gd_lightbox_bottom_top_px_bottoms'); ?>px;
    color: #<?php echo GDLightbox()->settings->getOption('gd_lightbox_color'); ?>;
    font-size: <?php echo GDLightbox()->settings->getOption('gd_lightbox_size_px'); ?>px;
    left: 0;
    padding: <?php echo GDLightbox()->settings->getOption('gd_lightbox_padding_top_and_bottom_px'); ?>px 40px;
    position: fixed;
    right: 0;
    opacity: <?php echo GDLightbox()->settings->getOption('gd_lightbox_title_opacity')/100; ?>;
    text-align: <?php echo GDLightbox()->settings->getOption('gd_lightbox_text_align'); ?>;
    z-index: 1080;
}

.lg-img-wrap .lg-image {
    border: <?php echo GDLightbox()->settings->getOption('gd_lightbox_image_border_px'); ?>px solid #<?php echo GDLightbox()->settings->getOption('gd_lightbox_image_border_color'); ?>;
    border-radius: <?php echo GDLightbox()->settings->getOption('gd_lightbox_image_border_radius_px'); ?>px;
    opacity: <?php echo 1/GDLightbox()->settings->getOption('gd_lightbox_image_opacity'); ?> !important;
    filter: blur(<?php echo GDLightbox()->settings->getOption('gd_lightbox_image_blur_count'); ?>px) brightness(<?php echo GDLightbox()->settings->getOption('gd_lightbox_image_brightness_percent'); ?>%) contrast(<?php echo GDLightbox()->settings->getOption('gd_lightbox_image_contrast_percent'); ?>%) grayscale(<?php echo GDLightbox()->settings->getOption('gd_lightbox_image_grayscale_percent'); ?>%) invert(<?php echo GDLightbox()->settings->getOption('gd_lightbox_image_invert'); ?>%) saturate(<?php echo GDLightbox()->settings->getOption('gd_lightbox_image_saturate'); ?>) sepia(<?php echo GDLightbox()->settings->getOption('gd_lightbox_image_sepia'); ?>%);
    -webkit-filter: blur(<?php echo GDLightbox()->settings->getOption('gd_lightbox_image_blur_count'); ?>px) brightness(<?php echo GDLightbox()->settings->getOption('gd_lightbox_image_brightness_percent'); ?>%)  contrast(<?php echo GDLightbox()->settings->getOption('gd_lightbox_image_contrast_percent'); ?>%) grayscale(<?php echo GDLightbox()->settings->getOption('gd_lightbox_image_grayscale_percent'); ?>%) invert(<?php echo GDLightbox()->settings->getOption('gd_lightbox_image_invert'); ?>%) saturate(<?php echo GDLightbox()->settings->getOption('gd_lightbox_image_saturate'); ?>) sepia(<?php echo GDLightbox()->settings->getOption('gd_lightbox_image_sepia'); ?>%);

}

.lg-actions .lg-next, .lg-actions .lg-prev {
    font-size: <?php echo GDLightbox()->settings->getOption('gd_lightbox_arrows_size_px'); ?>px !important;
    padding: 8px <?php echo GDLightbox()->settings->getOption('gd_lightbox_arrows_padding_left_right'); ?>px 9px !important;
}

.lg-outer .lg-thumb-item {
    border-radius: <?php echo GDLightbox()->settings->getOption('gd_lightbox_thumbnail_border_radius_px'); ?>px;
    border: <?php echo GDLightbox()->settings->getOption('gd_lightbox_thumbnail_border_px'); ?>px solid #<?php echo GDLightbox()->settings->getOption('gd_lightbox_thumbnail_border_color'); ?>;
}
.lg-outer .lg-thumb-item.active, .lg-outer .lg-thumb-item:hover {
    border-color: #<?php echo GDLightbox()->settings->getOption('gd_lightbox_thumbnail_border_color_active'); ?>;
}
<?php
echo '</style>';