<?php
$this->breadcrumbs=array(
	'Meeting Shots',
);

$this->menu=array(
	array('label'=>'Create MeetingShot', 'url'=>array('create')),
	array('label'=>'Manage MeetingShot', 'url'=>array('admin')),
);
?>

<h1>Meeting Shots</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
