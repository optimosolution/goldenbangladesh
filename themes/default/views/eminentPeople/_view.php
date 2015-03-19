<?php
/* @var $this EminentPeopleController */
/* @var $data EminentPeople */
?>

<div class="view">

    	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('address')); ?>:</b>
	<?php echo CHtml::encode($data->address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('phone')); ?>:</b>
	<?php echo CHtml::encode($data->phone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mobile')); ?>:</b>
	<?php echo CHtml::encode($data->mobile); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('website')); ?>:</b>
	<?php echo CHtml::encode($data->website); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('eminent_type')); ?>:</b>
	<?php echo CHtml::encode($data->eminent_type); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('life_style')); ?>:</b>
	<?php echo CHtml::encode($data->life_style); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rationale')); ?>:</b>
	<?php echo CHtml::encode($data->rationale); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('uploader_id')); ?>:</b>
	<?php echo CHtml::encode($data->uploader_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('uploader_address')); ?>:</b>
	<?php echo CHtml::encode($data->uploader_address); ?>
	<br />

	*/ ?>

</div>