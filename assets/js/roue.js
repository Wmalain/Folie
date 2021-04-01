// var leftgear = document.getElementById("leftgear");
    
// window.addEventListener("scroll", function() {
//     leftgear.style.transform = "rotate("+window.pageYOffset+"deg)";
    
// });

var rotate = 0;
$(window).bind('mousewheel', function(e){	
    rotate += e.originalEvent.wheelDelta > 0 ? 20 : -20;
  	$(".rouediv").stop().animate({rotate:rotate},{
    		step:function(now){
    				$(this).css({
        				'-webkit-transform':'rotate('+now+'deg)',            
        				'-moz-transform':'rotate('+now+'deg)',
        				'transform':'rotate('+now+'deg)'
      			}); 
    		}
    });
});