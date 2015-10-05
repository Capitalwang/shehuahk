function domReady(fn)
{
	if(navigator.userAgent.match(/MSIE/))
	{
		var timer = setInterval
		(
			function()
			{
				try{
					document.documentElement.doScroll('left');
					clearInterval(timer);
					timer = null;
					fn();
				}catch(e){
					
				}
			},
			500
		);
		return true;
	}else{
		document.addEventListener('DOMContentLoaded',fn,false);
		return true;
	}
}

function subMenu()
{
	var getElm = document.getElementById("items").getElementsByTagName("li");
	for (var k=0; k<getElm.length; k++)
	{
		getElm[k].onmouseover = function()
		{
			this.className+=" hover";
		};
		
		getElm[k].onmouseout = function()
		{
			this.className=this.className.replace(new RegExp(" hover\\b"), "");
		};
	}
}
domReady(subMenu);