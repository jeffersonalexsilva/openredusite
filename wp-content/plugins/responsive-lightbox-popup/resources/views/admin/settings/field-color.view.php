<?php
/**
 * @var $fieldId string
 * @var $value string
 * @var $field
 */

$isPro = false;
if(isset($section['features'])){
    if(isset($section['features']['isPro']) && true === $section['features']['isPro']){
        $isPro = true;
    }
}

?>

<label class="input-wrap">
    <span class="settings-label"><?php
        echo $field['label'];
        if(isset($field['help'])): ?>
            <span class="settings-field-help">
                <span class="settings-field-help-icon">?</span>
                <span class="settings-field-help-text-wrap">
                    <span class="settings-field-help-text"><?php echo $field['help']; ?></span>
                    <span class="settings-field-help-text-tooltip"></span>
                </span>
            </span>
        <?php endif;
        ?></span>
    <input type="text" class="jscolor" name="settings[<?php echo $fieldId; ?>]" value="<?php echo $value; ?>" <?php echo ($isPro ? 'disabled="disabled" readonly="readonly"' : ''); ?> />
</label>
