<?php
$this->pageTitle=Yii::app()->name . ' - ViewShot';
$this->breadcrumbs=array(
	'viewshot',
);
?>

<h1>wall feed</h1>

<div class="form">


<?
// d($model);

foreach($model as $row){
	echo $row->description . "<br/>";
}

?>
</div><!-- form -->
