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

<?php 

// echo CHtml::form('','post',array('enctype'=>'multipart/form-data'));

// echo CHtml::activeFileField($model, 'image'); 

// echo "<br/>";

// echo CHtml::activeTextArea($model, 'description'); 

// echo CHtml::activeHiddenField($model, 'user_id', array('value'=>Yii::app()->user->id)); 

// echo CHtml::submitButton('upload'); 

// echo CHtml::endForm(); 

?>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'upload-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>


	<div class="row">
		<?php echo $form->labelEx($formModel,'image'); ?>
		<?php echo $form->fileField($formModel,'image'); ?>
		<?php echo $form->error($formModel,'image'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($formModel,'description'); ?>
		<?php echo $form->textArea($formModel,'description'); ?>
		<?php echo $form->error($formModel,'description'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->hiddenField($formModel,'user_id', array('value'=>Yii::app()->user->id)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Upload'); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->

	<script>
	$(function() {
		var availableTags = [
			"ActionScript",
			"AppleScript",
			"Asp",
			"BASIC",
			"C",
			"C++",
			"Clojure",
			"COBOL",
			"ColdFusion",
			"Erlang",
			"Fortran",
			"Groovy",
			"Haskell",
			"Java",
			"JavaScript",
			"Lisp",
			"Perl",
			"PHP",
			"Python",
			"Ruby",
			"Scala",
			"Scheme"
		];
		
		function split( val ) {
			return val.split( /,\s*/ );
		}
		
		function extractLast( term ) {
			return split( term ).pop();
		}

		$( "#ShotUploadForm_description" )
			// don't navigate away from the field on tab when selecting an item
			.bind( "keydown", function( event ) {
				if ( event.keyCode === $.ui.keyCode.TAB && $( this ).data( "autocomplete" ).menu.active ) {
					event.preventDefault();
				}
			})
			.autocomplete({
				minLength: 0,
				source: function( request, response ) {
					// delegate back to autocomplete, but extract the last term
					response($.ui.autocomplete.filter(availableTags, extractLast( request.term )));
				},
				focus: function() {
					// prevent value inserted on focus
					return false;
				},
				select: function( event, ui ) {
					var terms = split( this.value );
					// remove the current input
					terms.pop();
					// add the selected item
					terms.push( ui.item.value );
					// add placeholder to get the comma-and-space at the end
					terms.push( "" );
					this.value = terms.join( ", " );
					return false;
				}
			});
	});
	</script>
