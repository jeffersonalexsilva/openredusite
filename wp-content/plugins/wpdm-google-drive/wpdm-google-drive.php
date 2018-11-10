<?php
/**
 * Plugin Name: WPDM - Google Drive
 * Description: Google Drive Storage Access for WPDM
 * Plugin URI: http://www.wpdownloadmanager.com/
 * Author: Shaon
 * Version: 1.3.1
 * Author URI: http://www.wpdownloadmanager.com/
 */

if (defined('WPDM_Version')) {

    if (!defined('WPDM_CLOUD_STORAGE'))
        define('WPDM_CLOUD_STORAGE', 1);



    class WPDMGoogleDrive
    {
        function __construct()
        {

            add_action("wpdm_cloud_storage_settings", array($this, "Settings"));
            add_action('wpdm_attach_file_metabox', array($this, 'BrowseButton'));

        }


        function Settings()
        {
            global $current_user;

            $wpdm_google_drive = maybe_unserialize(get_option('__wpdm_google_drive', array()));
            ?>
            <div class="panel panel-default">
                <div class="panel-heading"><b><?php _e('Google Drive API Credentials', 'wpdmpro'); ?></b></div>

                <table class="table">


                    <tr>
                        <td>API Key</td>
                        <td><input type="text" name="__wpdm_google_drive[api_key]" class="form-control"
                                   value="<?php echo isset($wpdm_google_drive['api_key']) ? $wpdm_google_drive['api_key'] : ''; ?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td>Client ID</td>
                        <td><input type="text" name="__wpdm_google_drive[client_id]" class="form-control"
                                   value="<?php echo isset($wpdm_google_drive['client_id']) ? $wpdm_google_drive['client_id'] : ''; ?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td>Client Secret</td>
                        <td><input type="text" name="__wpdm_google_drive[client_secret]" class="form-control"
                                   value="<?php echo isset($wpdm_google_drive['client_secret']) ? $wpdm_google_drive['client_secret'] : ''; ?>"/>
                        </td>
                    </tr>

                </table>
                <div class="panel-footer">
                    <b>Redirect URI:</b> &nbsp; <input onclick="this.select()" type="text" class="form-control" style="background: #fff;cursor: copy;display: inline;width: 400px" readonly="readonly" value="<?php echo admin_url('?page=wpdm-google-drive'); ?>" />
                </div>
            </div>


            </div>

        <?php
        }



        function BrowseButton()
        {

            $wpdm_google_drive = maybe_unserialize(get_option('__wpdm_google_drive', array()));
            include dirname(__FILE__).'/src/picker.php';

        }



    }

    new WPDMGoogleDrive();

}
 

