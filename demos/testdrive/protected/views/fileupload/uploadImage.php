<?php
// $this->breadcrumbs=array(
	// 'Users'=>array('index'),
	// $model->id,
// );

// $this->menu=array(
	// array('label'=>'List User', 'url'=>array('index')),
	// array('label'=>'Create User', 'url'=>array('create')),
	// array('label'=>'Update User', 'url'=>array('update', 'id'=>$model->id)),
	// array('label'=>'Delete User', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	// array('label'=>'Manage User', 'url'=>array('admin')),
// );
?>

<h1>Upload Shot</h1>

<?php echo CHtml::form('','post',array('enctype'=>'multipart/form-data')); ?>

<?php echo CHtml::activeFileField($model, 'image'); ?>
<br/>
<?php echo CHtml::activeTextArea($model, 'description'); ?>

<?php echo CHtml::activeHiddenField($model, 'user_id', array('value'=>Yii::app()->user->id)); ?>

<?php echo CHtml::submitButton('upload'); ?>

<?php echo CHtml::endForm(); ?>
