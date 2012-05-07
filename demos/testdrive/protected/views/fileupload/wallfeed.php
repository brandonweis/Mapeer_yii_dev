<div id="masonry_container" style="background-color:#F5FFEA; padding:5px">

<?

foreach($model as $index => $row){
	if($index % 2){
		$box_class = "shot";
		$image_class = "image1x1";
		$image_container = "image_container1x1";
	}
	else{
		$box_class = "shot2x2";
		$image_class = "image2x2";
		$image_container = "image_container2x2";
	}
	
	
?>

	<div class="boxx <?=$box_class?>" onmousedown="return true">
		<a class="pageslide" target="_blank" href="/mapeer_dev/demos/testdrive/index.php?r=fileupload/viewshot&id=<?=$row->id?>">
			<div class="image_container <?=$image_container?>">
				<img class="image <?//=$image_class?>" src="<?=$row->image?>"/>
			</div>
		</a>
		<div>
			<?=$row->description?>
		</div>
	</div>
<?
}
?>

</div>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/jsplugin/pageslide/lib/jquery-1.7.1.min.js" /></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/jsplugin/pageslide/jquery.pageslide.js" /></script>

<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/jsplugin/masonry/jquery.masonry.min.js" /></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/jsplugin/jquery.lazyload.js" /></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/jsplugin/nailthumb/jquery.nailthumb.1.0.js" /></script>
<style>
	.shot{
		width: 220px;
		height: 220px;
		margin: 5px;
		padding: 5px;
		float: left;
		background-color:#ffffff;
	}
	
	.shot2x2{
		width: 460px;
		height: 460px;
		margin: 5px;
		padding: 5px;
		float: left;
		background-color:#ffffff;
	}
	
	.shot2x4{
		width: 460px;
		height: 460px;
		margin: 5px;
		padding: 5px;
		float: left;
		background-color:#6CC28B;
	}
	
	.image1x1{
		/* width:200px;
		height:200px; */
	}
	
	.image2x2{
		/* width:440px;
		height:440px; */
	}
	
	.image_container1x1{
		width:200px;
		height:200px; 
	}
	
	.image_container2x2{
		width:440px;
		height:440px; 
	}
	
	.boxx{
		-webkit-box-shadow: 0 3px 6px rgba(0,0,0,.5);
		-moz-box-shadow: 0 3px 6px rgba(0,0,0,.5);
	}
	
	.boxx:hover {
		-webkit-transform: scale(1.25);
		-moz-transform: scale(1.25);
		position: relative;
		z-index: 5;
		
		//smooth transforming
		-webkit-transition: all 0.2s ease-in;
		-moz-transition: all 0.2s ease-in;
		-ms-transition: all 0.2s ease-in;
	}

</style>



<script type="text/javascript">


	$(function(){
		// $('.boxx').removeAttr('disabled');
		
		//resize image undistorted
		$('.image_container').nailthumb();
		
		//lazyload of image of shot
		$(".image").lazyload({ 
			effect : "fadeIn"
		});
		
		//each shot is able to invoke pageslide
		$(".pageslide").pageslide({ direction: 'left'});
	  $('#masonry_container').masonry({
		// options
		itemSelector : '.boxx',
		// columnWidth : function( containerWidth ) {
						// return containerWidth;
					  // },
		columnWidth : 20,
		isFitWidthBooleanfalse : false
	  });
	  
	  $('this').click(function(evt){
		
		$(this).zoomTo({
			targetsize: 0.8, 
			duration: 400, 
			// debug: true, 
			animationedcallback: function(e){
				alert(e);
			}, 
			// easing: "ease", 
		});
		evt.stopPropagation();
		
	  });	  
	});
	
</script>

