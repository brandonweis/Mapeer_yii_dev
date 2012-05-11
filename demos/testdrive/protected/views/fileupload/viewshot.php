<?php
$this->pageTitle=Yii::app()->name . ' - ViewShot';
$this->breadcrumbs=array(
	'viewshot',
);
?>


<div class="form">
<h1>Shot</h1>



<h1>View Shot #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'image',
		'description_with_link',
		'user_id',
		'lat',
		'lng',
		'location',
	),
)); ?>
</div><!-- form -->


<img src="<?=$model->image?>"/>