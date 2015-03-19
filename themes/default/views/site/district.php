<?php
$this->pageTitle = District::getDistrict($_GET['id']) . ' - ' . Yii::app()->name;
$this->breadcrumbs = array(
    District::getDistrict($_GET['id']),
);
?>
<div class="row-fluid">
    <div class="span6">
        <?php $this->get_advertisement_326(14); ?>
    </div>
    <div class="span6">
        <?php $this->get_advertisement_326(15); ?>
    </div>
</div>
<div class="row-fluid">
    <div class="span12">
        <fieldset>
            <legend>District History/Heritage</legend>
            <?php echo TbHtml::well($this->get_district_home($_GET['id']), array('size' => TbHtml::WELL_SIZE_SMALL)); ?>
        </fieldset>
    </div>
</div>
<div class="row-fluid">
    <div class="span12">
        <?php $this->getEminentPeople(); ?>
    </div>
</div>
<div class="row-fluid">
    <div class="span12">
        <?php $this->getPicture(5); ?>
    </div>
</div>
<div class="row-fluid">
    <div class="span6">
        <?php $this->get_porjoton(10); ?>
    </div>
    <div class="span6">
        <?php $this->get_problem_categories(3); ?>
    </div>
</div>
<div class="row-fluid">
    <div class="span4">
        <?php $this->get_advertisement_215(2); ?>
    </div>
    <div class="span4">
        <?php $this->get_advertisement_215(12); ?>
    </div>
    <div class="span4">
        <?php $this->get_advertisement_215(13); ?>
    </div>
</div>
<div class="row-fluid">
    <div class="span6">
        <?php $this->get_porjoton(11); ?>
    </div>
    <div class="span6">
        <?php $this->get_porjoton(12); ?>
    </div>
</div>
<div class="row-fluid">
    <div class="span12">
        <?php $this->get_district(); ?>        
    </div>
</div>