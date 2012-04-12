<?php
$this->pageTitle=Yii::app()->name . ' - Profile';
$this->breadcrumbs=array(
	'Profile',
);
?>
<script type="text/javascript">
         jQuery(function($) {
        $(".row .column:odd").addClass("odd");
        $(".row .column:even").addClass("even");
      });
</script>
	
	
<div id="header2">
  <nav>
    <ul>
      <li> <a href=index.html>MAPEER</a> </li> 
      <li> <a href=shots.html>All Shots</a> </li> 
      <li> <a href=profile.html>profile</a> </li> 
      <li> <a href=network.html>network</a> </li> 
      <li> <a href=lists.html>Lists</a> </li> 
      <li class="navi-search"><form>Search <input type="text" name="search" value="search a keyword or a location"/></form></li>
    </ul>
  </nav>

  <div id="login">
    <div id="login-userpic"><img src=<?php echo Yii::app()->request->baseUrl; ?>/images/mapeer/0002b.jpg></div>
   <p>Welcome back <br><a href="">PineappleSpongeCakeDude</a></p>
  </div>
  


</div>
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



<h1>Profile : Everything you'd like to know about PineappleSpongeCakeDude</h1>

<div id="user_profile">

	  <div class="profile">
		<div class="pics"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/mapeer/1.jpg"></div>
	  </div>

	  <div class="profile">
		<div class="pics"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/mapeer/2.jpg"></div>
		</div>

	  <div class="profile">
		<div class="pics"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/mapeer/3.jpg"></div>
		</div>

	  <div class="profile">
		<div class="pics"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/mapeer/4.jpg"></div>
		</div>

	  <div class="profile-text">
		<p>
		  <div class="title">Similarities</div>
		  <div class="subject">Home Country : </div> Malaysia </br>
		  <div class="subject">Likes : </div> Music, backpacking, art, sight seeing, cultures, make up, street fashion </br>
		  <div class="subject">Countries visited : </div> Armenia, Brunei Darussalam, Laos, Malaysia, Singapore, Panama, Philippines,  </br>
		  <div class="subject">Planning to visit : </div> Myanmar, Thailand, Guangdong, Iceland, Quebec, Langkayan    </br></br>
		  <a href="">See more</a>
		</p>
	  </div>

	  <div class="profile-text">
		<p>
		  <div class="title">I am</div>
		  One heck of an oddball. </br></br>

		  I won't call myself a hardcore backpacker, I'm just a hippie wanna be that travels to places whenever AirAsia decides to give us some discounted air tickets. Haha! Nice to meet you! :)
		</p>
	  </div>

	  <div class="profile-text">
		<p>
		  <div class="title">Travel philosophy</div>
		  getting the most out of said travel. No penny pinching, it's the experience that counts. ;) </br></br>

		  Oh and bargain ethically. That 1 dollar might mean a discount for you, but it pays for a day's meal for someone else's family.
		</p>
	  </div>

	  <div class="profile">
		<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/mapeer/0007.jpg">
		</div>

	  <div class="profile">
		<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/mapeer/0021.jpg">
		</div>

	  <div class="profile-text">
		<p>
		  <div class="title">Footprints</div>
		  76 locations
		  <br><br><br>

		  <a href="">View full map</a>
		  
		</p>
	  </div>

	  <div class="profile-text">
		<p>
		  <div class="title">Upcoming travels</div>

		  <div class="subject">9 April 2013 </div> Maldives <br>
		  <div class="subject">10 May 2013 </div> Lang Tengah, Malaysia, <br>
		  <div class="subject">5 August 2013</div> Philedelpia, Montreal  <br>
		  <div class="subject">12 December 2013 </div> Luoyang, China <br><br>

		  <a href="">See more</a>
		  
		</p>
	  </div>

	  <div class="profile-text">
		<p>
		  <div class="title">Contacts</div>

		  <div class="subject">Facebook </div> facebook.com/spongebob <br>
		  <div class="subject">Twitter </div> @spongecakedude <br>
		  <div class="subject">Tumblr </div> tumblr.com/spongecakedude  <br>
		  <div class="subject">Email </div> spongecake@live.com <br><br>
		  <div class="subject"><a href="">Private message </a></div>

		  
		</p>
	  </div>

	  <div class="profile">
		<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/mapeer/0022.jpg">
		</div>
	  
	  <div class="profile-text">
		<p>
		  <div class="title-alllists">All lists</div>
		  <a href="">New Year's trip to NYC</a><br>
		  <a href="">Christmas in Krabit with friends</a><br>
		  <a href="">NORWAY!!</a><br>
		  <a href="">Harajuku + Tokyo snap shots</a><br>
		  <a href="">Eating all over Malaysia</a><br>
		  <br>

		  <a href="">See more</a>
		  
		</p>
	  </div>

	  <div class="profile">
		<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/mapeer/0023.jpg">
		</div>

	  <div class="profile-text">
		<p>
		  <div class="title-allshots">All shots</div>
		  So you wanna be nosy, click here to view all shots by PineappleSpongeCakeDude
		  <br><br>

		  <a href="#">View all 128950 shots</a>
		  
		</p>
	  </div>

	  <div class="profile">
		<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/mapeer/0024.jpg">
		</div>

	  <div class="profile">
		<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/mapeer/0025.jpg">
		</div>

	  <div class="profile-text">
		<p>
		  <div class="title">Following</div>
		  Following 52874 mapeers<br><br>
		  <a href=""><img class="profile-mapeers_upserpics" src="<?php echo Yii::app()->request->baseUrl; ?>/images/mapeer/0002b.jpg"></a>
		  <a href=""><img class="profile-mapeers_upserpics" src="<?php echo Yii::app()->request->baseUrl; ?>/images/mapeer/0003b.jpg"></a>
		  <a href=""><img class="profile-mapeers_upserpics" src="<?php echo Yii::app()->request->baseUrl; ?>/images/mapeer/0009b.jpg"></a>
		  <a href=""><img class="profile-mapeers_upserpics" src="<?php echo Yii::app()->request->baseUrl; ?>/images/mapeer/0010b.jpg"></a>
		  <a href=""><img class="profile-mapeers_upserpics" src="<?php echo Yii::app()->request->baseUrl; ?>/images/mapeer/0026b.jpg"></a>
		  <a href=""><img class="profile-mapeers_upserpics" src="<?php echo Yii::app()->request->baseUrl; ?>/images/mapeer/0001b.jpg"></a>
		  <a href=""><img class="profile-mapeers_upserpics" src="<?php echo Yii::app()->request->baseUrl; ?>/images/mapeer/0006b.jpg"></a>
		  <a href=""><img class="profile-mapeers_upserpics" src="<?php echo Yii::app()->request->baseUrl; ?>/images/mapeer/0007b.jpg"></a>
		  <a href=""><img class="profile-mapeers_upserpics" src="<?php echo Yii::app()->request->baseUrl; ?>/images/mapeer/0008b.jpg"></a>
		  <a href=""><img class="profile-mapeers_upserpics" src="<?php echo Yii::app()->request->baseUrl; ?>/images/mapeer/0012b.jpg"></a>
		  <a href=""><img class="profile-mapeers_upserpics" src="<?php echo Yii::app()->request->baseUrl; ?>/images/mapeer/0014b.jpg"></a>
		  <a href=""><img class="profile-mapeers_upserpics" src="<?php echo Yii::app()->request->baseUrl; ?>/images/mapeer/0002b.jpg"></a>
		  <a href=""><img class="profile-mapeers_upserpics" src="<?php echo Yii::app()->request->baseUrl; ?>/images/mapeer/0003b.jpg"></a>
		  <a href=""><img class="profile-mapeers_upserpics" src="<?php echo Yii::app()->request->baseUrl; ?>/images/mapeer/0009b.jpg"></a>
		  <a href=""><img class="profile-mapeers_upserpics" src="<?php echo Yii::app()->request->baseUrl; ?>/images/mapeer/0010b.jpg"></a>
		  <a href=""><img class="profile-mapeers_upserpics" src="<?php echo Yii::app()->request->baseUrl; ?>/images/mapeer/0026b.jpg"></a>
		  <a href=""><img class="profile-mapeers_upserpics" src="<?php echo Yii::app()->request->baseUrl; ?>/images/mapeer/0001b.jpg"></a>
		  <a href=""><img class="profile-mapeers_upserpics" src="<?php echo Yii::app()->request->baseUrl; ?>/images/mapeer/0006b.jpg"></a>
		  <a href=""><img class="profile-mapeers_upserpics" src="<?php echo Yii::app()->request->baseUrl; ?>/images/mapeer/0007b.jpg"></a>
		  <a href=""><img class="profile-mapeers_upserpics" src="<?php echo Yii::app()->request->baseUrl; ?>/images/mapeer/0008b.jpg"></a>
		  <a href=""><img class="profile-mapeers_upserpics" src="<?php echo Yii::app()->request->baseUrl; ?>/images/mapeer/0012b.jpg"></a>
		  
		  <br><a href="">View all</a>
		  
		</p>
	  </div>

	  <div class="profile-text">
		<p>
		  <div class="title">Followers</div>
		  34721 mapeers<br><br>

		  <a href=""><img class="profile-mapeers_upserpics" src="<?php echo Yii::app()->request->baseUrl; ?>/images/mapeer/0002b.jpg"></a>
		  <a href=""><img class="profile-mapeers_upserpics" src="<?php echo Yii::app()->request->baseUrl; ?>/images/mapeer/0003b.jpg"></a>
		  <a href=""><img class="profile-mapeers_upserpics" src="<?php echo Yii::app()->request->baseUrl; ?>/images/mapeer/0009b.jpg"></a>
		  <a href=""><img class="profile-mapeers_upserpics" src="<?php echo Yii::app()->request->baseUrl; ?>/images/mapeer/0010b.jpg"></a>
		  <a href=""><img class="profile-mapeers_upserpics" src="<?php echo Yii::app()->request->baseUrl; ?>/images/mapeer/0026b.jpg"></a>
		  <a href=""><img class="profile-mapeers_upserpics" src="<?php echo Yii::app()->request->baseUrl; ?>/images/mapeer/0001b.jpg"></a>
		  <a href=""><img class="profile-mapeers_upserpics" src="<?php echo Yii::app()->request->baseUrl; ?>/images/mapeer/0006b.jpg"></a>
		  <a href=""><img class="profile-mapeers_upserpics" src="<?php echo Yii::app()->request->baseUrl; ?>/images/mapeer/0007b.jpg"></a>
		  <a href=""><img class="profile-mapeers_upserpics" src="<?php echo Yii::app()->request->baseUrl; ?>/images/mapeer/0008b.jpg"></a>
		  <a href=""><img class="profile-mapeers_upserpics" src="<?php echo Yii::app()->request->baseUrl; ?>/images/mapeer/0012b.jpg"></a>
		  <a href=""><img class="profile-mapeers_upserpics" src="<?php echo Yii::app()->request->baseUrl; ?>/images/mapeer/0014b.jpg"></a>
		  <a href=""><img class="profile-mapeers_upserpics" src="<?php echo Yii::app()->request->baseUrl; ?>/images/mapeer/0002b.jpg"></a>
		  <a href=""><img class="profile-mapeers_upserpics" src="<?php echo Yii::app()->request->baseUrl; ?>/images/mapeer/0003b.jpg"></a>
		  <a href=""><img class="profile-mapeers_upserpics" src="<?php echo Yii::app()->request->baseUrl; ?>/images/mapeer/0009b.jpg"></a>
		  <a href=""><img class="profile-mapeers_upserpics" src="<?php echo Yii::app()->request->baseUrl; ?>/images/mapeer/0010b.jpg"></a>
		  <a href=""><img class="profile-mapeers_upserpics" src="<?php echo Yii::app()->request->baseUrl; ?>/images/mapeer/0026b.jpg"></a>
		  <a href=""><img class="profile-mapeers_upserpics" src="<?php echo Yii::app()->request->baseUrl; ?>/images/mapeer/0001b.jpg"></a>
		  <a href=""><img class="profile-mapeers_upserpics" src="<?php echo Yii::app()->request->baseUrl; ?>/images/mapeer/0006b.jpg"></a>
		  <a href=""><img class="profile-mapeers_upserpics" src="<?php echo Yii::app()->request->baseUrl; ?>/images/mapeer/0007b.jpg"></a>
		  <a href=""><img class="profile-mapeers_upserpics" src="<?php echo Yii::app()->request->baseUrl; ?>/images/mapeer/0008b.jpg"></a>
		  <a href=""><img class="profile-mapeers_upserpics" src="<?php echo Yii::app()->request->baseUrl; ?>/images/mapeer/0012b.jpg"></a>
		  
		  <br><a href="">View all</a>
		  
		</p>
	  </div>

	  <div class="profile">
		<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/mapeer/0017.jpg">
		</div>

	  <div class="profile">
		<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/mapeer/0018.jpg">
		</div>

	  <div class="profile">
		<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/mapeer/0019.jpg">
		</div>

	  <div class="profile">
    <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/mapeer/0016.jpg">
	</div>
</div>


	<script>
	$(function() {
		$( "#user_profile" ).sortable();
		$( "#user_profile" ).disableSelection();
	});
	</script>


	