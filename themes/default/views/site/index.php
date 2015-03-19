<div class="row-fluid">
    <div class="span12">
        <?php echo TbHtml::well($this->get_static_content(3), array('size' => TbHtml::WELL_SIZE_SMALL)); ?>
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
    <div class="span12">
        <div class="inner_title">Newspaper</div>
        <?php echo $this->get_static_content(8); ?>
    </div>
</div>
<div class="row-fluid">
    <div class="span6">
        <?php $this->get_porjoton(10); ?>
        <div class="row-fluid">
            <div class="span10"></div>
            <div class="span2">
                <?php echo TbHtml::linkButton('More..', array('url' => array('/content/index', 'id' => 10), 'color' => TbHtml::BUTTON_COLOR_INFO, 'size' => TbHtml::BUTTON_SIZE_MINI,)); ?>
            </div>
        </div>        
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