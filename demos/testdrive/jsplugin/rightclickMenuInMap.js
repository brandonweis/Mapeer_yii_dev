/**************************************************
 *                      Menu
 **************************************************/
 
function Menu($div){
  var that = this, 
      ts = null;
  
  this.$div = $div;
  this.items = [];
  
  // create an item using a new closure 
  this.create = function(item){
    var $item = $('<div class="item '+item.cl+'">'+item.label+'</div>');
    $item
      // bind click on item
      .click(function(){
        if (typeof(item.fnc) === 'function'){
          item.fnc.apply($(this), []);
        }
      })
      // manage mouse over coloration
      .hover(
        function(){$(this).addClass('hover');},
        function(){$(this).removeClass('hover');}
      );
    return $item;
  };
  this.clearTs = function(){
    if (ts){
      clearTimeout(ts);
      ts = null;
    }
  };
  this.initTs = function(t){
    ts = setTimeout(function(){that.close()}, t);
  };
}

// add item
Menu.prototype.add = function(label, cl, fnc){
  this.items.push({
    label:label,
    fnc:fnc,
    cl:cl
  });
}

// close previous and open a new menu 
Menu.prototype.open = function(event){
  this.close();
  var k,
      that = this,
      offset = {
        x:0, 
        y:0
      },
      $menu = $('<div id="menu"></div>');
      
  // add items in menu
  for(k in this.items){
    $menu.append(this.create(this.items[k]));
  }
  
  // manage auto-close menu on mouse hover / out
  $menu.hover(
    function(){that.clearTs();},
    function(){that.initTs(3000);}
  );
  
  // change the offset to get the menu visible (#menu width & height must be defined in CSS to use this simple code)
  if ( event.pixel.y + $menu.height() > this.$div.height()){
    offset.y = -$menu.height();
  }
  if ( event.pixel.x + $menu.width() > this.$div.width()){
    offset.x = -$menu.width();
  }
  
  // use menu as overlay
  this.$div.gmap3({
    action:'addOverlay',
    latLng: event.latLng,
    content: $menu,
    offset: offset
  });
  
  // start auto-close
  this.initTs(5000);
}

// close the menu
Menu.prototype.close = function(){
  this.clearTs();
  this.$div.gmap3({action:'clear', name:'overlay'})
}


/**************************************************
 *                      Main
 **************************************************/

$(function(){

  var $map = $('#googleMap'), 
      menu = new Menu($map),
      
      current,  // current click event (used to save as start / end position)
      m1,       // marker "from"
      m2,       // marker "to"
      center = [48.85861640881589, 2.3459243774414062];
        
  // update marker
  function updateMarker(marker, isM1){
    if (isM1){
      m1 = marker;
    } else {
      m2 = marker;
    }
    updateDirections();
  }
        
  // add marker and manage which one it is (A, B)
  function addMarker(isM1){
    // clear previous marker if set
    var clear = {action:'clear', name:'marker', tag:''};
    if (isM1 && m1) {
      clear.tag = 'from';
      $map.gmap3(clear);
    } else if (!isM1 && m2){
      clear.tag = 'to';
      $map.gmap3(clear);
    }
    // add marker and store it
    $map.gmap3({
      action:'addMarker',
      latLng:current.latLng,
      options:{
        draggable:true,
        icon:new google.maps.MarkerImage('http://maps.gstatic.com/mapfiles/icon_green' + (isM1 ? 'A' : 'B') + '.png')
      }, 
      tag: (isM1 ? 'from' : 'to'),
      events: {
        dragend: function(marker){
          updateMarker(marker, isM1);
        }
      },
      callback: function(marker){
        updateMarker(marker, isM1);
      }
    });
  }
  
  // function called to update direction is m1 and m2 are set
  function updateDirections(){
    if (!(m1 && m2)){
      return;
    }
    $map.gmap3({
      action:'getRoute',
      options:{
        origin:m1.getPosition(),
        destination:m2.getPosition(),
        travelMode: google.maps.DirectionsTravelMode.DRIVING
      },
      callback: function(results){
        if (!results) return;
        $map.gmap3({ action: 'setDirections', directions:results});
      }
    });
  }
  
  // MENU : ITEM 1
  menu.add('Direction to here', 'itemB', 
    function(){
      menu.close();
      addMarker(false);
    });
  
  // MENU : ITEM 2
  menu.add('Direction from here', 'itemA separator', 
    function(){
      menu.close();
      addMarker(true);
    })
  
  // MENU : ITEM 3
  menu.add('Zoom in', 'zoomIn', 
    function(){
      var map = $map.gmap3('get');
      map.setZoom(map.getZoom() + 1);
      menu.close();
    });
  
  // MENU : ITEM 4
  menu.add('Zoom out', 'zoomOut',
    function(){
      var map = $map.gmap3('get');
      map.setZoom(map.getZoom() - 1);
      menu.close();
    });
  
  // MENU : ITEM 5
  menu.add('Center here', 'centerHere', 
    function(){
        $map.gmap3('get').setCenter(current.latLng);
        menu.close();
    });
  
  // INITIALIZE GOOGLE MAP
  $map.gmap3(
    { action: 'init',
      options:{
        center:center,
        zoom: 5
      },
      events:{
        rightclick:function(map, event){
          current = event;
          menu.open(current);
        },
        click: function(){
          menu.close();
        },
        dragstart: function(){
          menu.close();
        },
        zoom_changed: function(){
          menu.close();
        }
      }
    },
    // add direction renderer to configure options (else, automatically created with default options)
    { action:'addDirectionsRenderer',
      preserveViewport: true,
      markerOptions:{
        visible: false
      }
    },
    // add a direction panel
    { action:'setDirectionsPanel',
      id : 'directions'
    }
  );
});