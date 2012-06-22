<?php
$this->breadcrumbs=array(
	'Meeting Shots'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List MeetingShot', 'url'=>array('index')),
	array('label'=>'Manage MeetingShot', 'url'=>array('admin')),
);
?>

<h1>Create MeetingShot</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>