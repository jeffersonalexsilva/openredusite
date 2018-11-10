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

$multiple = isset($field['multiple'])
    ? 'multiple=multiple'
    : '';
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
    <select name="settings[<?php echo $fieldId ?>]" <?php echo $multiple.($isPro ? ' disabled="disabled" readonly="readonly"' : '') ?>>
        <?php foreach ($field['options'] as $optionKey=>$optionName): ?>
            <option value="<?php echo $optionKey ?>" <?php selected($value,$optionKey); ?>><?php echo $optionName; ?></option>
        <?php endforeach; ?>
    </select>
</label>