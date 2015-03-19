<?php
$this->pageTitle = 'Set user access - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Set user access',
);

$this->menu = array(
    array('label' => 'User Groups', 'url' => array('userGroup/admin'), 'active' => true, 'icon' => 'icon-home'),
);

function getGroupName($id) {
    $returnValue = Yii::app()->db->createCommand()
            ->select('title')
            ->from('{{user_group}}')
            ->where('id=:id', array(':id' => $id))
            ->queryScalar();

    return $returnValue;
}

$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'acl-forms',
    'enableAjaxValidation' => false,
        ));
$getGroup = $_GET['id'];
?>
<script type="text/javascript" charset="utf-8">
    $(function() {
        $('.checkall_1').on('click', function() {
            $(this).closest('fieldset').find(':checkbox').prop('checked', this.checked);
        });
    });
</script>   
<div class="form-actions">
    <?php echo TbHtml::submitButton('Update Access', array('color' => TbHtml::BUTTON_COLOR_PRIMARY, 'name' => 'updateaccess')); ?>
</div>
<div class="alert alert-success">
    <h4><?php echo 'Group: ' . getGroupName($_GET['id']); ?></h4>
</div>
<?php
$acl_controller = Yii::app()->db->createCommand()
        ->select('*')
        ->from('{{acl_controller}}')
        ->order('controller ASC')
        ->queryAll();
echo '<div class="well">';
echo'<fieldset>';
echo'<div class="alert alert-error"><input type="checkbox" class="checkall_1"> Check All / None</div>';
foreach ($acl_controller as $key => $values) {
    print '<div style="font-size:18px;">' . $values["controller"] . '</div>';
    print '<div style="padding-bottom:20px;">';
    $acl = Yii::app()->db->createCommand()
            ->select('*')
            ->from('{{acl}}')
            ->where('group_id=' . $getGroup . ' AND controller="' . $values["controller"] . '"')
            ->order('controller, actions ASC')
            ->queryAll();
    foreach ($acl as $keys => $valuess) {
        if ($valuess["access"] == 1) {
            print '<span style="padding:0px 10px 0px 10px;"><input type="checkbox" checked="checked" name="' . $valuess["controller"] . '||' . $valuess["actions"] . '" value="1">&nbsp;' . $valuess["actions"] . '</span>';
        } else {
            print '<span style="padding:0px 10px 0px 10px;"><input type="checkbox" name="' . $valuess["controller"] . '||' . $valuess["actions"] . '" value="1">&nbsp;' . $valuess["actions"] . '</span>';
        }
    }
    print '</div>';
}
echo'</fieldset>';
echo '</div>';
print '<input type="hidden" name="usergroup" value="' . $getGroup . '">';
?>

<div class="form-actions">
    <?php echo TbHtml::submitButton('Update Access', array('color' => TbHtml::BUTTON_COLOR_PRIMARY, 'name' => 'updateaccess')); ?>
</div>
<?php $this->endWidget(); ?>