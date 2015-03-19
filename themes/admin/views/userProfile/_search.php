<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldControlGroup($model,'id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldControlGroup($model,'user_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldControlGroup($model,'profile_picture',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldControlGroup($model,'country_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldControlGroup($model,'state_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldControlGroup($model,'city_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldControlGroup($model,'address',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldControlGroup($model,'mobile',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldControlGroup($model,'phone',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldControlGroup($model,'fax',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldControlGroup($model,'website',array('class'=>'span5','maxlength'=>150)); ?>

	<?php echo $form->textFieldControlGroup($model,'expiry',array('class'=>'span5')); ?>

	<?php echo $form->textFieldControlGroup($model,'birth_date',array('class'=>'span5')); ?>

	<div class="form-actions">
    <?php echo TbHtml::submitButton('Search', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)); ?>
    <?php echo TbHtml::resetButton('Reset', array('color' => TbHtml::BUTTON_COLOR_INFO)); ?>
	</div>

<?php $this->endWidget(); ?>
