<div class="view" style="margin-bottom: 20px; clear: both;">
    <?php echo '<p>' . CHtml::link(CHtml::encode($data->title), array('/content/view', 'id' => $data->id), array('style' => 'font-size:20px;font-weight:normal;')) . '</p>'; ?>    
    <p><?php //echo '<p>' . $this->text_cut(htmlspecialchars_decode(CHtml::encode($data->introtext)), 1500) . '...</p>'; ?></p>
</div>