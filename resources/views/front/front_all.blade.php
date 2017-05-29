@extends('layouts.app')
@section('content')
<script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.5/jquery-ui.min.js'></script>
<script type="text/javascript" src="{{url('public/js/sly.min.js')}}"></script>
<script>
jQuery(function($) {
  'use strict';

  // -------------------------------------------------------------
  //   Basic Navigation
  // -------------------------------------------------------------
  (function() {
    var $frame = $('#frame');
    var $slidee = $frame.children('ul').eq(0);
    var $wrap = $frame.parent();

    // Call Sly on frame
    $frame.sly({
      horizontal: 1,
      itemNav: 'basic',
      smart: 1,
      activateOn: 'click',
      mouseDragging: 1,
      touchDragging: 1,
      releaseSwing: 1,
      startAt: 3,
      scrollBar: $wrap.find('.scrollbar'),
      scrollBy: 1,
      pagesBar: $wrap.find('.pages'),
      activatePageOn: 'click',
      speed: 300,
      elasticBounds: 1,
      easing: 'easeOutExpo',
      dragHandle: 1,
      dynamicHandle: 1,
      clickBar: 1,

      // Buttons
      forward: $wrap.find('.forward'),
      backward: $wrap.find('.backward'),
      prev: $wrap.find('.prev'),
      next: $wrap.find('.next'),
      prevPage: $wrap.find('.prevPage'),
      nextPage: $wrap.find('.nextPage')
    });

    // To Start button
    $wrap.find('.toStart').on('click', function() {
      var item = $(this).data('item');
      // Animate a particular item to the start of the frame.
      // If no item is provided, the whole content will be animated.
      $frame.sly('toStart', item);
    });

    // To Center button
    $wrap.find('.toCenter').on('click', function() {
      var item = $(this).data('item');
      // Animate a particular item to the center of the frame.
      // If no item is provided, the whole content will be animated.
      $frame.sly('toCenter', item);
    });

    // To End button
    $wrap.find('.toEnd').on('click', function() {
      var item = $(this).data('item');
      // Animate a particular item to the end of the frame.
      // If no item is provided, the whole content will be animated.
      $frame.sly('toEnd', item);
    });

    // Add item
    $wrap.find('.add').on('click', function() {
      $frame.sly('add', '<li>' + $slidee.children().length + '</li>');
    });

    // Remove item
    $wrap.find('.remove').on('click', function() {
      $frame.sly('remove', -1);
    });
  }());

  // -------------------------------------------------------------
  //   Centered Navigation
  // -------------------------------------------------------------
  (function() {
    var $frame = $('#centered');
    var $wrap = $frame.parent();

    // Call Sly on frame
    $frame.sly({
      horizontal: 1,
      itemNav: 'centered',
      smart: 1,
      activateOn: 'click',
      mouseDragging: 1,
      touchDragging: 1,
      releaseSwing: 1,
      startAt: 4,
      scrollBar: $wrap.find('.scrollbar'),
      scrollBy: 1,
      speed: 300,
      elasticBounds: 1,
      easing: 'easeOutExpo',
      dragHandle: 1,
      dynamicHandle: 1,
      clickBar: 1,

      // Buttons
      prev: $wrap.find('.prev'),
      next: $wrap.find('.next')
    });
  }());

  // -------------------------------------------------------------
  //   Force Centered Navigation
  // -------------------------------------------------------------
  (function() {
    var $frame = $('#forcecentered');
    var $wrap = $frame.parent();

    // Call Sly on frame
    $frame.sly({
      horizontal: 1,
      itemNav: 'forceCentered',
      smart: 1,
      activateMiddle: 1,
      activateOn: 'click',
      mouseDragging: 1,
      touchDragging: 1,
      releaseSwing: 1,
      startAt: 0,
      scrollBar: $wrap.find('.scrollbar'),
      scrollBy: 1,
      speed: 300,
      elasticBounds: 1,
      easing: 'easeOutExpo',
      dragHandle: 1,
      dynamicHandle: 1,
      clickBar: 1,

      // Buttons
      prev: $wrap.find('.prev'),
      next: $wrap.find('.next')
    });
  }());

  // -------------------------------------------------------------
  //   Cycle By Items
  // -------------------------------------------------------------
  (function() {
    var $frame = $('#cycleitems');
    var $wrap = $frame.parent();

    // Call Sly on frame
    $frame.sly({
      horizontal: 1,
      itemNav: 'basic',
      smart: 1,
      activateOn: 'click',
      mouseDragging: 1,
      touchDragging: 1,
      releaseSwing: 1,
      startAt: 0,
      scrollBar: $wrap.find('.scrollbar'),
      scrollBy: 1,
      speed: 300,
      elasticBounds: 1,
      easing: 'easeOutExpo',
      dragHandle: 1,
      dynamicHandle: 1,
      clickBar: 1,

      // Cycling
      cycleBy: 'items',
      cycleInterval: 1000,
      pauseOnHover: 1,

      // Buttons
      prev: $wrap.find('.prev'),
      next: $wrap.find('.next')
    });

    // Pause button
    $wrap.find('.pause').on('click', function() {
      $frame.sly('pause');
    });

    // Resume button
    $wrap.find('.resume').on('click', function() {
      $frame.sly('resume');
    });

    // Toggle button
    $wrap.find('.toggle').on('click', function() {
      $frame.sly('toggle');
    });
  }());

  // -------------------------------------------------------------
  //   Cycle By Pages
  // -------------------------------------------------------------
  (function() {
    var $frame = $('#cyclepages');
    var $wrap = $frame.parent();

    // Call Sly on frame
    $frame.sly({
      horizontal: 1,
      itemNav: 'basic',
      smart: 1,
      activateOn: 'click',
      mouseDragging: 1,
      touchDragging: 1,
      releaseSwing: 1,
      startAt: 0,
      scrollBar: $wrap.find('.scrollbar'),
      scrollBy: 1,
      pagesBar: $wrap.find('.pages'),
      activatePageOn: 'click',
      speed: 300,
      elasticBounds: 1,
      easing: 'easeOutExpo',
      dragHandle: 1,
      dynamicHandle: 1,
      clickBar: 1,

      // Cycling
      cycleBy: 'pages',
      cycleInterval: 1000,
      pauseOnHover: 1,
      startPaused: 1,

      // Buttons
      prevPage: $wrap.find('.prevPage'),
      nextPage: $wrap.find('.nextPage')
    });

    // Pause button
    $wrap.find('.pause').on('click', function() {
      $frame.sly('pause');
    });

    // Resume button
    $wrap.find('.resume').on('click', function() {
      $frame.sly('resume');
    });

    // Toggle button
    $wrap.find('.toggle').on('click', function() {
      $frame.sly('toggle');
    });
  }());

  // -------------------------------------------------------------
  //   One Item Per Frame
  // -------------------------------------------------------------
  (function() {
    var $frame = $('#oneperframe');
    var $wrap = $frame.parent();

    // Call Sly on frame
    $frame.sly({
      horizontal: 1,
      itemNav: 'forceCentered',
      smart: 1,
      activateMiddle: 1,
      mouseDragging: 1,
      touchDragging: 1,
      releaseSwing: 1,
      startAt: 0,
      scrollBar: $wrap.find('.scrollbar'),
      scrollBy: 1,
      speed: 300,
      elasticBounds: 1,
      easing: 'easeOutExpo',
      dragHandle: 1,
      dynamicHandle: 1,
      clickBar: 1,

      // Buttons
      prev: $wrap.find('.prev'),
      next: $wrap.find('.next')
    });
  }());

  // -------------------------------------------------------------
  //   Crazy
  // -------------------------------------------------------------
  (function() {
    var $frame = $('#crazy');
    var $slidee = $frame.children('ul').eq(0);
    var $wrap = $frame.parent();

    // Call Sly on frame
    $frame.sly({
      horizontal: 1,
      itemNav: 'basic',
      smart: 1,
      activateOn: 'click',
      mouseDragging: 1,
      touchDragging: 1,
      releaseSwing: 1,
      startAt: 3,
      scrollBar: $wrap.find('.scrollbar'),
      scrollBy: 1,
      pagesBar: $wrap.find('.pages'),
      activatePageOn: 'click',
      speed: 300,
      elasticBounds: 1,
      easing: 'easeOutExpo',
      dragHandle: 1,
      dynamicHandle: 1,
      clickBar: 1,

      // Buttons
      forward: $wrap.find('.forward'),
      backward: $wrap.find('.backward'),
      prev: $wrap.find('.prev'),
      next: $wrap.find('.next'),
      prevPage: $wrap.find('.prevPage'),
      nextPage: $wrap.find('.nextPage')
    });

    // To Start button
    $wrap.find('.toStart').on('click', function() {
      var item = $(this).data('item');
      // Animate a particular item to the start of the frame.
      // If no item is provided, the whole content will be animated.
      $frame.sly('toStart', item);
    });

    // To Center button
    $wrap.find('.toCenter').on('click', function() {
      var item = $(this).data('item');
      // Animate a particular item to the center of the frame.
      // If no item is provided, the whole content will be animated.
      $frame.sly('toCenter', item);
    });

    // To End button
    $wrap.find('.toEnd').on('click', function() {
      var item = $(this).data('item');
      // Animate a particular item to the end of the frame.
      // If no item is provided, the whole content will be animated.
      $frame.sly('toEnd', item);
    });

    // Add item
    $wrap.find('.add').on('click', function() {
      $frame.sly('add', '<li>' + $slidee.children().length + '</li>');
    });

    // Remove item
    $wrap.find('.remove').on('click', function() {
      $frame.sly('remove', -1);
    });
  }());
});

</script>
<style>

.card1 {
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    transition: 0.3s;
    border-radius: 5px; /* 5px rounded corners */
}

/* Add rounded corners to the top left and the top right corner of the image */

.card1:hover {
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}


.card {
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    transition: 0.3s;
    border-radius: 5px; /* 5px rounded corners */
    text-align: left !important;
}

/* Add rounded corners to the top left and the top right corner of the image */
img {
    border-radius: 5px 5px 0 0;
}

.card:hover {
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}


.card {
  width: 250px; height: 420px;
  float:left;
  margin-right:20px;
  margin-top:0px;
  border: 1px solid #BBB;
  background: white;
}
.ribbon {
  position: absolute;
  left: -5px; top: -5px;
  z-index: 1;
  overflow: hidden;
  width: 75px; height: 75px;
  text-align: right;
}
.ribbon span {
  font-size: 10px;
  font-weight: bold;
  color: #FFF;
  text-transform: uppercase;
  text-align: center;
  line-height: 20px;
  transform: rotate(-45deg);
  -webkit-transform: rotate(-45deg);
  width: 100px;
  display: block;
  background: #79A70A;
  background: linear-gradient(#F70505 0%, #8F0808 100%);
  box-shadow: 0 3px 10px -5px rgba(0, 0, 0, 1);
  position: absolute;
  top: 19px; left: -21px;
}
.ribbon span::before {
  content: "";
  position: absolute; left: 0px; top: 100%;
  z-index: -1;
  border-left: 3px solid #8F0808;
  border-right: 3px solid transparent;
  border-bottom: 3px solid transparent;
  border-top: 3px solid #8F0808;
}
.ribbon span::after {
  content: "";
  position: absolute; right: 0px; top: 100%;
  z-index: -1;
  border-left: 3px solid transparent;
  border-right: 3px solid #8F0808;
  border-bottom: 3px solid transparent;
  border-top: 3px solid #8F0808;
}

.wrap {
  position: relative;
  margin: 3em 0;
}


/* Frame */

.frame {
  height: auto;
  line-height: auto;
  overflow: hidden;
}

.frame ul {
  list-style: none;
  margin: 0;
  padding: 0;
  height: 100%;
  font-size: 50px;
}

.frame ul li {
  float: left;
  width: 246px;
  height: 100%;
  margin-right:10px;
  padding: 0;
  background: #fff;
  color: #ddd;
  text-align: center;
  cursor: pointer;
}

.frame ul li.active {
  color: #fff;
  background: #a03232;
}


/* Scrollbar */

.scrollbar {
  margin: 0 0 1em 0;
  height: 2px;
  background: #ccc;
  line-height: 0;
}

.scrollbar .handle {
  width: 100px;
  height: 100%;
  background: #292a33;
  cursor: pointer;
}

.scrollbar .handle .mousearea {
  position: absolute;
  top: -9px;
  left: 0;
  width: 100%;
  height: 20px;
}


/* Pages */

.pages {
  list-style: none;
  margin: 20px 0;
  padding: 0;
  text-align: center;
}

.pages li {
  display: inline-block;
  width: 14px;
  height: 14px;
  margin: 0 4px;
  text-indent: -999px;
  border-radius: 10px;
  cursor: pointer;
  overflow: hidden;
  background: #fff;
  box-shadow: inset 0 0 0 1px rgba(0, 0, 0, .2);
}

.pages li:hover {
  background: #aaa;
}

.pages li.active {
  background: #666;
}


/* Controls */

.controls {
  margin: 25px 0;
  text-align: center;
}


/* One Item Per Frame example*/

.oneperframe {
  height: 300px;
  line-height: 300px;
}

.oneperframe ul li {
  width: 1140px;
}

.oneperframe ul li.active {
  background: #333;
}


/* Crazy example */

.crazy ul li:nth-child(2n) {
  width: 100px;
  margin: 0 4px 0 20px;
}

.crazy ul li:nth-child(3n) {
  width: 300px;
  margin: 0 10px 0 5px;
}

.crazy ul li:nth-child(4n) {
  width: 400px;
  margin: 0 30px 0 2px;
}




</style>

<input type="hidden" id="first" value="10" />
<input type="hidden" id="limit" value="10" >


<script>
    $(document).ready(function () {
       
              var html='';
              var url="{{url('display')}}/";
                var url2="{{url('getImg2')}}/";
        var lastid=0;
                    $.getJSON({
                        url: "{{url('loadDefault')}}", 

                        success: function (data) {


                         var results = data;
  $( 'ul.clearfix').empty( );

                       for(var i=0; i< data.length;i++) {
                                if(data[i].Document_Uploads==='NONE'){
                                   image ='http://assets.inhabitat.com/wp-content/blogs.dir/1/files/2013/07/english-oak-tree.jpg ';
                                   }else{
                                   image =url2+data[i].Document_Uploads;
                                   }
                                   
                                   
                                     if(data[i].user_type_id=='4'){
                                   verified ='<div class="ribbon"><span>VERIFIED</span></div>';
                                   }else{
                                   verified ='<div class="ribbo"><span></span></div>';
                                   }
                        //   var html = '<a target="_blank" href="'+url+data[i].id+'"><div class="card ">'+verified+'<div class="row col-md-3"><div class="card" style="width: 202px; height: 200px;"><img class="card-img-top" src="'+url2+image+'" alt="Image Here" ><div class="card-block"><p class="card-text" title="'+data[i].LR_No+data[i].Town+'">'+text_truncate(data[i].LR_No+data[i].Town,15,"...")+'</p></div></div></div></div></a>';
                          var html2='<li><div class="col-xs-3 scroll"><div class="card ">'+verified+'<div class="grow"><img  src="'+image+' " width="248" height="200px" /></div><div class="card-block"><h4 class="card-title"><u>'+data[i].LR_No+'</u></h4><h6 class="card-title">'+data[i].Size+'</h6><p class="card-text">'+data[i].Description+'</p><a href="'+url+data[i].id+'" class="btn btn-primary" style="position:absolute;bottom:0px; margin:10px; margin-left:50px; background:#449D44; "><i class="fa fa-eye"></i> View</a></div></div></div></li>';
 
      	

    $( 'ul.clearfix').append( html2 );
                       }
                     
                   
                            lastid +=8; 
                            $('#first').val(lastid);
                            $('#loader').hide();
                        },
                        error: function (data) {
                            flag = true;
                            $('#loader').hide();
                            no_data = false;
                            console.log('Something went wrong, Please contact admin');
                        }
                    });






       
        $('#loadMore').click(function () {
             lastid +=10;
             loadMore(lastid);
        });
        
        
        function loadMore(lastid){
        flag=true;
         no_data = true;
                if (flag && no_data) {
                    flag = false;
                    $('#loader').show();
                    $.ajax({
                        url: "{{url('getData')}}/"+$('#first').val(),
                        dataType: "json",
                        method: 'post',

                        success: function (data) {
                            console.log(data);
                            flag = true;
                            $('#loader').hide();

                            if (data.length > 0) {
                              

                                for(var i=0; i< data.length;i++) {
                                     if(data[i].Document_Uploads=='NONE'){
                                   image ='http://assets.inhabitat.com/wp-content/blogs.dir/1/files/2013/07/english-oak-tree.jpg ';
                                   }else{
                                   image =url2+data[i].Document_Uploads;
                                   }
                              
                                     if(data[i].user_type_id=='4'){
                                   verified ='<div class="ribbon"><span>VERIFIED</span></div>';
                                   }else{
                                   verified ='<div class="ribbo"><span></span></div>';
                                   }
                           //var html = '<a target="_blank" href="'+url+data[i].id+'"><div class="card ">'+verified+'<div class="row col-md-3"><div class="card" style="width: 202px; height: 200px;"><img class="card-img-top" src="'+url2+image+'" alt="Image Here" ><div class="card-block"><p class="card-text" title="'+data[i].LR_No+data[i].Town+'">'+text_truncate(data[i].LR_No+data[i].Town,15,"...")+'</p></div></div></div></div></a>';
                                   // $('#container-data').append(html);
                          var html2='<div class="col-xs-3"><div class="card ">'+verified+'<div class="grow"><img  src="'+image+' " width="248" height="200px" /></div><div class="card-block"><h4 class="card-title"><u>'+data[i].LR_No+'</u></h4><h6 class="card-title">'+data[i].Size+'</h6><p class="card-text">'+data[i].Description+'</p><a href="'+url+data[i].id+'" class="btn btn-primary" style="position:absolute;bottom:0px; margin:10px; margin-left:50px; background:#449D44; "><i class="fa fa-eye"></i> View</a></div></div></div>';
 
      	

$( html2).insertBefore( $( "div#loader" ) );

                                }
                                 
                                $('#first').val(lastid);
                                $('#loader').hide();

                            } else {
                               $('#loadMore').prop('text','No More Caveats To Load...')
                                no_data = false;
                            }
                        },
                        error: function (data) {
                            flag = true;
                            $('#loader').hide();
                            no_data = false;
                            console.log('Something went wrong, Please contact admin');
                        }
                    });
                }


        }
        
        
        
        
        
        text_truncate = function(str, length, ending) {
    if (length == null) {
      length = 100;
    }
    if (ending == null) {
      ending = '...';
    }
    if (str.length > length) {
      return str.substring(0, length - ending.length) + ending;
    } else {
      return str;
    }
  };
    });
</script>

<center><main class="ce--main" role="main">
        <p class="text-xs-center"><a class="btn btn-success btn-lg card1" href="{{url('/caveats/create')}}" role="button">Create &amp; Publish a Caveat&hellip;</a></p>
     
        <div class="container" id="container-data">
           <p><h1 class="card1">Published Caveats</h1></p>
        <br>
        <div id="loader"><img src="{{url('getImg')}}/ajax-loader.gif"></div>
   <button class="btn btn-lg btn-success card1" id="loadMore">Load More</button>
   
   
	</main>
  <div class="wrap">
			<h2>Centered <small>- activated or middle item is centered when possible</small></h2>

			<div class="scrollbar">
				<div class="handle">
					<div class="mousearea"></div>
				</div>
			</div>

			<div class="frame" id="centered">
				<ul class="clearfix">
					<li>0</li><li>1</li><li>2</li><li>3</li><li>4</li><li>5</li><li>6</li><li>7</li><li>8</li><li>9</li>
					<li>10</li><li>11</li><li>12</li><li>13</li><li>14</li><li>15</li><li>16</li><li>17</li><li>18</li>
					<li>19</li><li>20</li><li>21</li><li>22</li><li>23</li><li>24</li><li>25</li><li>26</li><li>27</li>
					<li>28</li><li>29</li>
				</ul>
			</div>

			<div class="controls center">
				<button class="btn prev"><i class="icon-chevron-left"></i> prev</button>
				<button class="btn next">next <i class="icon-chevron-right"></i></button>
			</div>
		</div>
  </center>

@endsection


