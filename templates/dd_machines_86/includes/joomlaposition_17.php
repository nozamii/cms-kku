<?php
function joomlaposition_17() {
    $document = JFactory::getDocument();
    $view = $document->view;
    $isPreview  = $GLOBALS['theme_settings']['is_preview'];
    if (isset($GLOBALS['isModuleContentExists']) && false == $GLOBALS['isModuleContentExists'])
        $GLOBALS['isModuleContentExists'] = $view->containsModules('slide') ? true : false;
?>
    <?php if ($isPreview || $view->containsModules('slide')) : ?>

    <?php if ($isPreview && !$view->containsModules('slide')) : ?>
    <!-- empty::begin -->
    <?php endif; ?>
    <div class=" bd-joomlaposition-17 clearfix" <?php echo buildDataPositionAttr('slide'); ?>>
        <?php echo $view->position('slide', 'block%joomlaposition_block_17', '17'); ?>
    </div>
    <?php if ($isPreview && !$view->containsModules('slide')) : ?>
    <!-- empty::end -->
    <?php endif; ?>
    <?php endif; ?>
<?php
}