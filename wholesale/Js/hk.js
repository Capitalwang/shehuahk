// $(window).resize(function(){


// 	});

// $("#heid").click(function(){
// 		$(".head").slideToggle(500);

// 	});

	$(window).resize(function() {
		var width = $(this).width();
	 if(width>768)
		{
			$(".head").css("display","block");

			
			}
		else{
			$(".head").css("display","none");
			}
	if(width<=980){
		$(".me_let").css({width:'0'});
		}
	else{
		$(".me_let").css({width:'220'});
		}
	});
	$("#heid").click(function(){
 		 $(".head").slideToggle(500);
		 
	});
	
	$("#left_hied").click(function(){
		var x=$("#left_hied").css("left");
		if(x==="220px"){
			$("#left_hied").animate({left:'0px'});
			$(".me_let").animate({width:'0px'});
			$("#left_hied").css({'background-image':'url(./images/show.gif)'});
			
			}
		else{
			$("#left_hied").animate({left:'220px'});
			$(".me_let").animate({width:'220px'});
			$("#left_hied").css({'background-image':'url(./images/hied.gif)'});
			}
	}); 
	$("#ch").click(function(event){	
		var width = $(window).width();	
			if(width<500){
				
				alert("请在PC端查看！");
				event.preventDefault();
			}
	});	

