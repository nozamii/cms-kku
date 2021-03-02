<?php
function joomlaposition_10() {
    $document = JFactory::getDocument();
    $view = $document->view;
    $isPreview  = $GLOBALS['theme_settings']['is_preview'];
    if (isset($GLOBALS['isModuleContentExists']) && false == $GLOBALS['isModuleContentExists'])
        $GLOBALS['isModuleContentExists'] = $view->containsModules('position-10') ? true : false;
?>
    <?php if ($isPreview || $view->containsModules('position-10')) : ?>

    <?php if ($isPreview && !$view->containsModules('position-10')) : ?>
    <!-- empty::begin -->
    <?php endif; ?>
    <div class=" bd-joomlaposition-10 clearfix" <?php echo buildDataPositionAttr('position-10'); ?>>
        <?php echo $view->position('position-10', 'block%joomlaposition_block_10', '10'); ?>
    </div>
    <?php if ($isPreview && !$view->containsModules('position-10')) : ?>
    <!-- empty::end -->
    <?php endif; ?>
    <?php endif; ?>
<?php
}