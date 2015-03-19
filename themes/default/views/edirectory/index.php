<?php
$this->pageTitle = 'Directory categories- ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Directories',
);
?>
<div class="row-fluid">
    <div class="span12">
        <h3>Directory categories</h3>
    </div>
</div>
<div class="row-fluid">
    <div class="span10">
        <?php $this->getDirectoryCategory(); ?>
    </div>
    <div class="span2"></div>
</div>