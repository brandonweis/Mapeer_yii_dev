<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen_disabled.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main_disabled.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/mapeer/mapeer.css" />
	
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/jquery/themes/base/jquery.ui.all.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/jquery/demos/demos.css" />
	
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/jsplugin/autocomplete/jquery-autocomplete.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/jsplugin/pageslide/jquery.pageslide.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.5/jquery-ui.min.js"></script>
	
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/jsplugin/gmap3/gmap3.min.js" /></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/jsplugin/autocomplete/jquery-autocomplete.min.js" /></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/jsplugin/gmap3/demo/external/markerwithlabel.js" /></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/jsplugin/masonry/jquery.masonry.min.js" /></script>
	
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/jsplugin/nailthumb/jquery.nailthumb.1.0.js" /></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/jsplugin/pageslide/jquery.pageslide.min.js" /></script>
	<?
/* 	
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/jsplugin/zoomooz/jquery.zoomooz.min.js" /></script>
 */	?>

</head>

<body>

<div class="container" id="page" style="width:1240px">


	<div id="mainmenu" style="width:200px; float:left; position: fixed; background-color:#F5FFEA; padding:5px; margin-right:10px">

		<?if(!Yii::app()->user->isGuest){?>
		<span><? echo CHtml::link('Profile',array('user/profile', 'id'=>Yii::app()->user->id, array('class'=>'pageslide_left'))); ?></span>
		<hr/>
		<span><? echo CHtml::link('Lists',array('user/profile', 'id'=>Yii::app()->user->id, array('class'=>'pageslide_left'))); ?></span>
		<hr/>
		<span><? echo CHtml::link('Followers',array('user/profile', 'id'=>Yii::app()->user->id, array('class'=>'pageslide_left'))); ?></span>
		<hr/>
		<span><? echo CHtml::link('Following',array('user/profile', 'id'=>Yii::app()->user->id, array('class'=>'pageslide_left'))); ?></span>
		<hr/>
		<span><? echo CHtml::link('Make A Shot',array('fileupload/uploadimage'), array('class'=>'pageslide_left')); ?></span>
		<hr/>
		<span><? echo CHtml::link('Logout ('.Yii::app()->user->name.')',array('user/profile', 'id'=>Yii::app()->user->id), array('visible'=>!Yii::app()->user->isGuest)); ?></span>
		<hr/>
		<?}?>
		<span style="font-size:8px">
		Copyright &copy; <?php echo date('Y'); ?> by My Companyss.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
		</span>
		
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>



</div><!-- page -->

	<script type="text/javascript">
	$(function() {	
		$(".pageslide_left").pageslide({ direction: 'right'});
	});
	</script>
<style>
#mainmenu ul{
	list-style-type:none
}
</style>
</body>
</html>