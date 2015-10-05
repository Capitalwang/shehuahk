//ajax class
function AJAXRequest(){var xmlObj=false;var CBfunc,ObjSelf;ObjSelf=this;try{xmlObj=new XMLHttpRequest}catch(e){try{xmlObj=new ActiveXObject("MSXML2.XMLHTTP")}catch(e2){try{xmlObj=new ActiveXObject("Microsoft.XMLHTTP")}catch(e3){xmlObj=false}}}if(!xmlObj)return false;this.method="POST";this.url;this.async=true;this.content="";this.callback=function(cbobj){return};this.New=false;this.send=function(){if(!this.method||!this.url)return false;xmlObj.open(this.method,this.url,this.async);if(this.New)xmlObj.setRequestHeader("If-Modified-Since","Sat, 1 Jan 2000 00:00:00 GMT");if(this.method=="POST")xmlObj.setRequestHeader("Content-Type","application/x-www-form-urlencoded");xmlObj.onreadystatechange=function(){if(xmlObj.readyState==4){if(xmlObj.status==200){ObjSelf.callback(xmlObj)}}};if(this.method=="POST")xmlObj.send(this.content);else xmlObj.send(null)}}
//event register
function addon(target,type,func){if(target.addEventListener)target.addEventListener(type,func,false);else if(target.attachEvent)target.attachEvent("on"+type,func);else target["on"+type]=func}
//得到元素
function Gid(id){return document.getElementById(id)}
//导航栏搜索
function nav_search(self)
{
	var input = self.parentNode.getElementsByTagName('input').item(0);
	if (input.value != input.defaultValue)
		window.location = './?O=search&v=' + input.value;
}

//图片显示
var looks = Gid('looks');
if (looks)
{
	//点击小图,用小图的地址替换大图的地址
	addon(window,'load',function(){var img=looks.getElementsByTagName('img');for(var j=1,lg=img.length;j<lg;j++)addon(img[j],'click',(function(self){return function(){img[0].src=self.src}})(img[j]))});
	
	//左右拉动
	//待续
}

//右栏的小提示
var pozsee = Gid('pozsee');
var Swindow = Gid('Swindow');
if (pozsee && Swindow)
{
	addon(
		window ,
		'load' ,
		function()
		{
			var dd = pozsee.getElementsByTagName('dd');
			
			for (var k = 0 , lg = dd.length ; k < lg ; k++)
			{
				var input = null;
				input = dd[k].getElementsByTagName('input').item(0);
				if (input && input.type == 'hidden' && !input.name)
					addon(dd[k] , 'mouseover' , (function (dar , me , ve){return function(){_pozsee_Swindow_ajax(dar , me , ve)}})(dd , k , input.value));
			}
		}
	);
	
	function _pozsee_Swindow_ajax(dar , me , ve)
	{
		for (var k = 0 , lg = dar.length ; k < lg ; k++) dar[k].className = '';
		dar[me].className = 'this';
		
		Swindow.innerHTML = ve;
		//ajax调用
		//待续
	}
}