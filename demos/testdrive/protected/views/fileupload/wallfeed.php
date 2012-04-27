<div id="masonry_container" style="background-color:#FFF200; padding:5px">

<?
foreach($model as $index => $row){
	if($index % 2){
		$box_class = "shot";
		$image_class = "image1x1";
	}
	else{
		$box_class = "shot2x2";
		$image_class = "image2x2";
	}
	
?>

	<div class="boxx <?=$box_class?> zoomTarget" onmousedown="return true">
		<img class="<?=$image_class?>" src="<?=$row->image?>"/>
		<div>
			<?=$row->description?>
		</div>
	</div>
<?
}
?>

</div>

<style>
	.shot{
		width: 220px;
		height: 220px;
		margin: 5px;
		padding: 5px;
		float: left;
		background-color:#6CC28B;
	}
	
	.shot2x2{
		width: 460px;
		height: 460px;
		margin: 5px;
		padding: 5px;
		float: left;
		background-color:#6CC28B;
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
		width:200px;
		height:200px;
	}
	
	.image2x2{
		width:440px;
		height:440px;
	}
	
	.box{
		position: relative;
		cursor:pointer;
	}
	
</style>



<script type="text/javascript">
	$(function(){
		// $('.boxx').removeAttr('disabled');
		
	  $('#masonry_container').masonry({
		// options
		itemSelector : '.boxx',
		// columnWidth : function( containerWidth ) {
						// return containerWidth;
					  // },
		columnWidth : 20,
		isFitWidthBooleanfalse : false
	  });
	  
	  $('.boxx').click(function(evt){
		
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

