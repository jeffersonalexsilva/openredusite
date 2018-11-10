<?php
/**
 * @var $sections array()
 * @var $fields array()
 * @var $title string
 */
?>
<div class="gd_lightbox_header">
    <div class="meta-block">
        <i class="gdlbicon gdlbicon-logo"></i>
        <span class="gd-title"><?php _e('Grand Lightbox','gd_lightbox');?></span>
    </div>
    <ul>
        <li>
            <a href="https://demo.grandwp.com/wordpress-responsive-lightbox-demo/"><?php _e('Demo','gd_lightbox');?></a>
        </li>
        <li>
            <a href="https://wordpress.org/support/plugin/responsive-lightbox-popup"><?php _e('Support Forum','gd_lightbox');?></a>
        </li>
        <li>
            <a href="https://grandwp.com/wordpress-responsive-lightbox"><?php _e('Go Pro','gd_lightbox');?></a>
        </li>
        <li>
            <a href="https://grandwp.com/wordpress-responsive-lightbox-user-manual"><?php _e('Help','gd_lightbox');?></a>
        </li>
    </ul>
</div>
<div class="settings-wrap">
    <div class="settings-sections-wrap">
        <form id="settings_form" action="admin.php?page=gd_lightbox&action=save_settings" method="post">
            <?php if(!empty($title)): ?>
                <div class="settings-head">
                    <h1><?php echo $title; ?></h1>
                    <div class="settings-save-head">
                        <input type="submit" class="settings-save" value="<?php _e('Save Settings','gd_lightbox'); ?>" />
                        <span class="spinner"></span>
                    </div>
                </div>

            <?php endif; ?>
            <input type="hidden" name="action" value="save_gd_lightbox_settings" />
            <?php wp_nonce_field('gd_lightbox_settings'); ?>
            <?php foreach($sections as $id=>$section):
                \GDLightbox\Helpers\ViewLoader::render('admin/settings/section.view.php', compact('section', 'id','fields'));
            endforeach; ?>
            <div class="settings-save-wrap">
                <input type="submit" class="settings-save" value="<?php _e('Save Settings','gd_lightbox'); ?>" />
                <span class="spinner"></span>
            </div>
        </form>

    </div>
</div>


