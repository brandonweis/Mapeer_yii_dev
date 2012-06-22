<?php
$this->breadcrumbs=array(
	'Meeting Shots'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List MeetingShot', 'url'=>array('index')),
	array('label'=>'Create MeetingShot', 'url'=>array('create')),
	array('label'=>'View MeetingShot', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage MeetingShot', 'url'=>array('admin')),
);
?>

<h1>Update MeetingShot <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>