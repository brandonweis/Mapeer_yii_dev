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

<div id="shot_form" class="form">
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
		<?php echo $form->labelEx($formModel,'location'); ?>
		<?php echo $form->textField($formModel,'location', array('id'=>'address')); ?>
		<?php echo $form->error($formModel,'location'); ?>
		
		<?php echo $form->hiddenField($formModel,'lat', array('id'=>'lat')); ?>
		<?php echo $form->hiddenField($formModel,'lng', array('id'=>'lng')); ?>
	</div>
	
	<div class="row">
		<?php echo $form->hiddenField($formModel,'user_id', array('value'=>Yii::app()->user->id)); ?>
	</div>
	
	<div class="row">
		<label for="ShotUploadForm_option">Question option 1 (Correct)</label>
		<textarea id="ShotUploadForm_option_1" name="ShotUploadForm[options][1]" autocomplete="off"></textarea>
		<input id="ShotUploadForm_option_1" type="hidden" name="ShotUploadForm[answer]" value="yes">
	</div>

	<a id='add_option' href='#' onclick='return false;'>add more option</a>
	
	<div id="submit_button" class="row buttons">
		<?php echo CHtml::submitButton('Upload'); ?>
	</div>
	
	
	
<?php $this->endWidget(); ?>
</div><!-- form -->

<div id="test" class="gmap3"></div>

<?
/* <div id="scroll" style="overflow-y:scroll; height:500px; width:500px">
	<div style="height:1000px"></div>
</div> */
?>
<style>
      .gmap3{
        margin: 20px auto;
        border: 1px dashed #C0C0C0;
        width: 500px;
        height: 250px;
      }
      .labels {
       color: red;
       background-color: white;
       font-family: "Lucida Grande", "Arial", sans-serif;
       font-size: 11px;
       font-weight: bold;
       text-align: center;
       width: 100px;     
       border: 2px solid black;
       white-space: nowrap;
     }
</style>

<script type="text/javascript">
var option_count = 2;

		
function addOption(){
	var body = "<div class='row'>"+
			"<label for='ShotUploadForm_option'>Question option "+option_count+"</label>"+
			"<textarea id='ShotUploadForm_option_"+option_count+"' name='ShotUploadForm[options]["+option_count+"]' autocomplete='off'></textarea>"+
			"<input id='ShotUploadForm_option_"+option_count+"' type='hidden' name='ShotUploadForm[answer]' value='yes'>"+
		"</div>";
			// alert('hello');
			
	// $('#add_option').remove();
	$("#upload-form").append(body);
	$('#upload-form').append($('#add_option'));
	$('#add_option').after($('#submit_button'));
	option_count++;
}

	$(function() {
		
		// $('#upload-form').append("<a id='add_option' href='#' onclick='return false;'>add more option</a>");
		
		$('#add_option').click(function(){
			addOption();
		});
		
		$('#scroll').scroll(function(){
			if ($('#scroll').scrollTop() == $('#scroll').height()){
			   // alert($('#scroll').scrollTop());
			   alert($('#scroll').height());
			}
		});

// other way to use setDefault
//$().gmap3('setDefault', {classes:{Marker:MarkerWithLabel }});

// $('#test1').gmap3(
	// { action:'setDefault', 
		// classes:{Marker:MarkerWithLabel}
	// },
	// { action: 'addMarker',
		// address: "Haltern am See, Weseler Str. 151",
		// marker:{
			// labelContent: "$425K",
			// labelAnchor: new google.maps.Point(52, -2),
			// labelClass: "labels",
			// labelStyle: {opacity: 0.75},
			// labelContent: "Here is a label !"
		// },
		// map:{
			// center: true,
			// zoom: 14,
			// mapTypeId: google.maps.MapTypeId.TERRAIN
		// }
	// }
// );

//store address
var content = "";

$('#test').gmap3(
	{
		action: 'init',
		events:{
			click: function(oveerlay, clicked_point){
				// alert('map clicked ' + clicked_point.latLng.lat() + ", " + clicked_point.latLng.lng());
				getAddress(this, clicked_point);
				// addMarker(this, clicked_point, address);
			},
		}
	}
);


function addMarker(map, location, address){
	
	map.gmap3({
		action: 'clear', 
		list: ['marker'], 
	});
	
	map.gmap3(
		{ 
			action: 'addMarker',
			latLng: location.latLng,
			map:{
				center: true,
				zoom: 5
			},
			marker:{
				options:{
					draggable: true
				}, 
				events:{
					dragend: function(marker){
						// $(this).gmap3({
							// action:'getAddress',
							// latLng:marker.getPosition(),
							// callback:function(results){
								// var map = $(this).gmap3('get'),
								  // infowindow = $(this).gmap3({action:'get', name:'infowindow'}),
								  // content = results && results[1] ? results && results[1].formatted_address : 'no address';
								// if (infowindow){
									// infowindow.open(map, marker);
									// infowindow.setContent(content);
								// }else{
									// $(this).gmap3({action:'addinfowindow', anchor:marker, options:{content: content}});
								// }
							// }
						// });
						
						getAddress(this, marker);
					}
				}
			},
			infowindow:{
				options:{
				content: address
				}
			}
		}
	);
}

function getAddress(map, location){
	map.gmap3({
		action:'getAddress',
		latLng:location.latLng,
		callback:function(results){

			content = results && results[1] ? results && results[1].formatted_address : 'no address';
			
			$('#address').val(content);
			
			
			// alert(location.latLng.lat());
			
			$("#lat").val(location.latLng.lat());
			$("#lng").val(location.latLng.lng());
			
			addMarker(this, location, content);
		}
	});
}
 
$('#address').autocomplete({
	source: function() {
		$("#test").gmap3({
			action:'getAddress',
			address: $(this).val(),
			callback:function(results){
				if (!results) return;
				$('#address').autocomplete(
					'display',
					results,
					false
				);
			}
		});
	},
	cb:{
	cast: function(item){
		// alert(item.formatted_address);
		return item.formatted_address;
	},
	select: function(item) {
			//getting lat annd lng separately
			// alert(item.geometry.location.lat()+ " "+item.geometry.location.lng());
			// alert();
			$("#test").gmap3(
				{action:'clear', name:'marker'},
				{action:'addMarker',
					latLng:item.geometry.location,
					map:{center:true}
				}
			);
			
			$("#lat").val(item.geometry.location.lat());
			$("#lng").val(item.geometry.location.lng());
		}
	}
});
	

	
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
	
<style type="text/css">
	.ui-menu .ui-menu-item {
		margin: 0;
		padding: 0;
		zoom: 1;
		float: left;
		clear: left;
		width: 100%;
	}
	.ui-menu .ui-menu-item a {
		text-decoration: none;
		display: block;
		padding: .2em .4em;
		line-height: 1.5;
		zoom: 1;
	}
</style>
