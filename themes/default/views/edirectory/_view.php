<div class="view">
    <div class="well">
        <div class="row-fluid">
            <div class="span12">
                <div class="ditectory_title"><?php echo CHtml::link(CHtml::encode($data->title), array('view', 'id' => $data->id)); ?></div>            
                <hr />
                <p><?php echo CHtml::encode($data->details); ?></p>
                <p><span class="label label-success">Address:</span> <?php echo CHtml::encode($data->address); ?></p>
                <p><span class="label label-success">Telephone:</span> <?php echo CHtml::encode($data->telephone); ?></p>
                <p><span class="label label-success">Fax:</span> <?php echo CHtml::encode($data->fax); ?></p>
                <p><span class="label label-success">Email:</span> <?php echo CHtml::encode($data->email); ?></p>
                <p><span class="label label-success">Website:</span> <?php echo CHtml::encode($data->website); ?></p>
            </div>
        </div>
    </div>   
</div>