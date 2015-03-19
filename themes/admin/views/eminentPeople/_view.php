<?php
/* @var $this EminentPeopleController */
/* @var $data EminentPeople */
?>

<div class="view">

    	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('full_name')); ?>:</b>
	<?php echo CHtml::encode($data->full_name); ?>
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

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('eminent_type')); ?>:</b>
	<?php echo CHtml::encode($data->eminent_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('life_style')); ?>:</b>
	<?php echo CHtml::encode($data->life_style); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rationale')); ?>:</b>
	<?php echo CHtml::encode($data->rationale); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('uploader_id')); ?>:</b>
	<?php echo CHtml::encode($data->uploader_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('profile_picture')); ?>:</b>
	<?php echo CHtml::encode($data->profile_picture); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('published')); ?>:</b>
	<?php echo CHtml::encode($data->published); ?>
	<br />

	*/ ?>

</div>