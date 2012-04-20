<div id="masonry_container" style="background-color:#FFF200; padding:5px">

<?
foreach($model as $index => $row){
?>

	<div class="box <?=($index % 2) ? "shot" : "shot2x2"?> zoomTarget">
		<?=$row->description?>
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
</style>

<script type="text/javascript">
	$(function(){
		$('.box').removeAttr('disabled');
		
	  $('#masonry_container').masonry({
		// options
		itemSelector : '.box',
		// columnWidth : function( containerWidth ) {
						// return containerWidth;
					  // },
		columnWidth : 20,
		isFitWidthBooleanfalse : false
	  });
	  
	  $('.box').click(function(evt){
		
		$(this).zoomTo({
			targetsize: 0.8, 
			duration: 600, 
			animationedcallback: function(){
				alert("zoomIn!");
			}, 
			// easing: "ease", 
		});
		evt.stopPropagation();
		
	  });
	  
	});
	
</script>

