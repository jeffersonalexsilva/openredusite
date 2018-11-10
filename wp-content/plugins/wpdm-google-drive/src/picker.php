<?php
if(!defined('ABSPATH')) die();
if($wpdm_google_drive['api_key'] == '' || $wpdm_google_drive['client_id'] == ''){
    ?>
    <div class="w3eden">

        <a target="_blank" href="<? echo admin_url('edit.php?post_type=wpdmpro&page=settings&tab=cloud-storage'); ?>" style="margin-top: 10px" title="Google Drive"  class="btn btn-danger btn-block"><span class="left-icon"><i class="fa fa-google"></i></span> Configure</a>

    </div>
    <?php
} else {
?>
<script type="text/javascript">

    // The Browser API key obtained from the Google Developers Console.
    var developerKey = '<?php echo $wpdm_google_drive['api_key'];?>';

    // The Client ID obtained from the Google Developers Console. Replace with your own Client ID.
    var clientId = "<?php echo $wpdm_google_drive['client_id'];?>";

    // Scope to use to access user's photos.
    var scope = ['https://www.googleapis.com/auth/drive'];

    var pickerApiLoaded = false;
    var oauthToken;

    // Use the API Loader script to load google.picker and gapi.auth.
    function onApiLoad() {
        //gapi.load('auth', {'callback': onAuthApiLoad});
        //gapi.load('picker', {'callback': onPickerApiLoad});
    }

    function onAuthApiLoad() {
        window.gapi.auth.authorize(
            {
                'client_id': clientId,
                'scope': scope,
                'immediate': false
            },
            handleAuthResult);
    }

    function onPickerApiLoad() {
        pickerApiLoaded = true;
        createPicker();
    }

    function handleAuthResult(authResult) {
        if (authResult && !authResult.error) {
            oauthToken = authResult.access_token;

            gapi.load('picker', {'callback': onPickerApiLoad});

        }
    }

    // Create and render a Picker object for picking user Photos.
    function createPicker() {
        if (pickerApiLoaded && oauthToken) {

            //var docsView = new google.picker.DocsView(google.picker.ViewId.DOCS);
            //docsView.setParent('ROOT');
            //docsView.setSelectFolderEnabled(true);
            //docsView.setIncludeFolders(true);

            var picker = new google.picker.PickerBuilder().
            enableFeature(google.picker.Feature.MULTISELECT_ENABLED).
            addView(google.picker.ViewId.DOCS).
            addView(google.picker.ViewId.FOLDERS).
            addView(new google.picker.DocsUploadView()).
            setOAuthToken(oauthToken).
            setDeveloperKey(developerKey).
            setCallback(pickerCallback).
            build();
            picker.setVisible(true);
        }
    }

    // A simple callback implementation.
    function pickerCallback(data) {

        if (data[google.picker.Response.ACTION] == google.picker.Action.PICKED) {
            var doc = data[google.picker.Response.DOCUMENTS][0];
            console.log(data);

            var no_of_files = data.docs.length;

            data.docs.forEach(function (file) {

                var id = file.id;
                var downloadurl = 'https://docs.google.com/uc?authuser=0&id='+id+'&export=download';
                var name = file.name;
                var size = (file.sizeBytes/1024/1024).toFixed(2)+' MB';

                var ext = 'png';
                var ext = name.substr(name.lastIndexOf('.') + 1);

                var file = downloadurl;
                var icon = "<?php echo WPDM_BASE_URL; ?>assets/file-type-icons/" + ext + ".png";
                <?php if(version_compare(WPDM_Version, '4.0.0', '>')){  ?>

                var html = jQuery('#wpdm-file-entry').html();
                html = html.replace(/##filepath##/g, file);
                html = html.replace(/##fileindex##/g, id);
                html = html.replace(/##preview##/g, icon);
                html = html.replace(/##filetitle##/g, name);
                jQuery('#currentfiles').prepend(html);

                <?php } else { ?>

                jQuery('#wpdmfile').val(file+"#"+name);
                jQuery('#cfl').html('<div><strong>'+name+'</strong>').slideDown();

                <?php } ?>

            });

        }

    }

    jQuery(function () {
        jQuery('#btn-google-drive').click(function () {
            gapi.load('auth', {'callback': onAuthApiLoad});
            return false;
        });
    });
</script>

<div class="w3eden">

<div id="result"></div>
<!-- The Google API Loader script. -->
    <a href="#" id="btn-google-drive" style="margin-top: 10px" title="Google Drive" onclick="return false;" class="btn btn-danger btn-block"><span class="left-icon"><i class="fa fa-google"></i></span> Google Drive</a>
</div>

<script type="text/javascript" src="https://apis.google.com/js/api.js?onload=onApiLoad"></script>
<style>.picker.picker-dialog{ overflow: hidden !important; }</style>
<?php }