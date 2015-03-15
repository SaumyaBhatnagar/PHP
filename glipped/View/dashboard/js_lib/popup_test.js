function popup(urll,title)
{
	var left = 0;
  	var top = 0;
	
	left = (screen.width/2)-(500/2);
	top = (screen.height/2)-(500/2);
	window.open(urll,title,'scrollbars=yes,width=500,height=700,left='+left+',top='+top);
		
}


function OpenPopUp(popid)
{
	var left = 0;
  	var top = 0;
	left = (screen.width/2)-300;
	top = (screen.height/2)-(500/2);
	
	
	/*var windowWidth =0;
	var windowHeight = 0;
	var topH =0;
	var popupHeight = "";
	var popupWidth  = "";	
	_popId = popid;	
	var popidJquery = "#" + popid;	
	windowWidth = $(window).width();
	windowHeight = $(window).height();	
	popupHeight = $(popidJquery).outerHeight();
	popupWidth = $(popidJquery).outerWidth();
	
	topH = Math.max(0, (($(window).height() - popupHeight) / 2) + 
                                        $(window).scrollTop()) + "px";
	leftX = Math.max(0, (($(window).width() - popupWidth) / 2) + 
                              $(window).scrollLeft()) + "px"; */ 
		  
	$("#" + popid).css({
		"position": "absolute",		
		"z-index":"30",
		"top": top,
		"left":left
	});
	//only need force for IE6
	$('body').css("overflow","hidden");
	$("#backgroundPopup").css({
		"height": screen.height
	});
	$("#backgroundPopup").css({
				"opacity": "0.0"
			});
	$("#backgroundPopup").fadeIn("slow");
	$("#" +popid).fadeIn("slow");
	
}
function disablePopup(){
	$("#backgroundPopup").fadeOut("slow");
	$(".popupContact").fadeOut("slow");
	$('body').css("overflow","scroll");
}