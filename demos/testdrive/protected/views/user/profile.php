<?php
$this->pageTitle=Yii::app()->name . ' - Profile';
$this->breadcrumbs=array(
	'Profile',
);
?>

<h1>Profile</h1>

<div class="form">
	<?php 
	// Sorry for bad shifting, it's not my fault ...
	 
		echo CHtml::ajaxSubmitButton('Follow', ''/* CHtml::normalizeUrl(array('user/follow')) */, 
		 array(
		   'data'=>'js:jQuery(this).parents("form").serialize()+"&isAjaxRequest=1"',               
		   'success'=>
					  'function(data){
							$("#searchResult").html(data);
							$("#searchResult").show();
							return false;
					   }'    
	 
		 ), 
		 array(
			'id'=>'ajaxSubmit', 
			'name'=>'ajaxSubmit'
		 )); 
	?>


<h1>View User #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'username',
		'password',
		'email',
	),
)); ?>
</div><!-- form -->
