<?php

$this->pageTitle = 'Gallery categories - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Gallery categories',
);
?>
<?php

$array = Yii::app()->db->createCommand()
        ->select('id,title')
        ->from('{{gallery_category}}')
        ->where('published=1')
        ->order('title ASC')
        ->queryAll();
echo '<fieldset>';
echo '<legend>Gallery categories</legend>';
echo '<ul class="nav nav-list">';
foreach ($array as $key => $values) {
    echo '<li>' . CHtml::link('<i class="icon-folder-open"></i> ' . $values['title'], array('/gallery/index', 'id' => $values['id']), array('class' => '', 'target' => '_blank')) . '</li>';
}
echo '</ul>';
echo '</fieldset>';
?>