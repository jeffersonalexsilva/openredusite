<?php
/**
 * @var $fieldId string
 * @var $field array
 * @var $section
 */
$type = isset($field['type']) ? $field['type'] : 'text';
$value = isset($field['value']) ? $field['value'] : GDLightbox()->settings->getOption($fieldId);

?>
<div class="settings-field" id="<?php echo $fieldId ?>">
    <?php
        \GDLightbox\Helpers\ViewLoader::render('admin/settings/field-'.$type.'.view.php', compact('fieldId', 'field', 'value', 'section'));
    ?>
</div>

