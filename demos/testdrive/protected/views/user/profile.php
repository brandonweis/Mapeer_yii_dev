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
	 
		echo CHtml::ajaxSubmitButton('Follow', CHtml::normalizeUrl(array('user/follow')), 
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


<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username'); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
		<p class="hint">
			Hint: You may login with <tt>demo/demo</tt> or <tt>admin/admin</tt>.
		</p>
	</div>

	<div class="row rememberMe">
		<?php echo $form->checkBox($model,'rememberMe'); ?>
		<?php echo $form->label($model,'rememberMe'); ?>
		<?php echo $form->error($model,'rememberMe'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Login'); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
