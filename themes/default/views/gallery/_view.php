<div class="view" style="float: left; margin-right: 8px;">
    <ul class="thumbnails">
        <li class="span12">
            <a href="<?php echo Yii::app()->baseUrl; ?>/uploads/gallery/<?php echo CHtml::encode($data->picture); ?>" title="<?php echo CHtml::encode($data->caption); ?>" id="newstore"  class="fancybox thumbnail" rel="gallery">
                <img src="<?php echo Yii::app()->baseUrl . '/uploads/gallery/' . CHtml::encode($data->picture); ?>" title="<?php echo CHtml::encode($data->caption); ?>" style="width: 122px; height: 90px;">
            </a>
        </li>
    </ul>
</div>