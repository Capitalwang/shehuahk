// JavaScript Document

function sprintf(vns , self , Da100 , MIN , MAX)
{
	self.style.imeMode = 'disabled';
	
	self.onkeyup = function()
	{
		self.value = self.value.replace(/[^0-9\.\-]/i,'');
	};
	
	self.onblur = function()
	{
		var value = self.value;
		value = STRING.sprintf(vns , value);
		value = (value == 'NaN') ? 0 : value;
		if (Da100) value = (value > 100) ? STRING.sprintf(vns , value % 100) : value;
		if (MIN||MIN==0) value = (value < MIN) ? MIN : value;
		if (MAX) value = (value > MAX) ? MAX : value;
		self.value = value;
	}
}

function AJAXRequest()
{
	var xmlObj = false;
	var CBfunc,ObjSelf;
	ObjSelf=this;
	try {
		xmlObj=new XMLHttpRequest;
	}catch(e){
		try{
			xmlObj=new ActiveXObject("MSXML2.XMLHTTP");
		}catch(e2){
			try{
				xmlObj=new ActiveXObject("Microsoft.XMLHTTP");
			}catch(e3){
				xmlObj=false;
			}
		}
	}
	
	if (!xmlObj) return false;
	
	this.method="POST";
	this.url;
	this.async=true;
	this.content="";
	this.callback=function(cbobj){return;}
	this.New = false;

	this.send = function()
	{
		//if(!this.method||!this.url||!this.async) return false;
		if(!this.method||!this.url) return false;

		xmlObj.open (this.method, this.url, this.async);
		
		if (this.New) xmlObj.setRequestHeader("If-Modified-Since", "Sat, 1 Jan 2000 00:00:00 GMT");
		
		if(this.method=="POST") xmlObj.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		
		xmlObj.onreadystatechange = function()
		{
			if(xmlObj.readyState==4) {if(xmlObj.status==200){ObjSelf.callback(xmlObj);}}
		}
		
		if(this.method=="POST")
			xmlObj.send(this.content);
		else
			xmlObj.send(null);
	}
}

function $(id)
{
	return document.getElementById(id);
}
function to_price()
{
	$('price').innerHTML = '正在计算中...';
	var weight = $('weight').value;
	if (!weight){alert('请填写重量');return;}
	
	var color = $('color');
	if (color.options[color.selectedIndex].value == '0'){alert('请选择颜色');return;}
	color = color.options[color.selectedIndex].value;
	
	var clarity = $('clarity');
	if (clarity.options[clarity.selectedIndex].value == '0'){alert('请选择净度');return;}
	clarity = clarity.options[clarity.selectedIndex].value;
	
	var aogo = $('aogo').value;
	if (!aogo){alert('请填写折扣');return;}
	
	var exchange = $('exchange').value;
	if (!exchange){alert('请填写汇率');return;}
	
	var POP = new AJAXRequest;
	POP.method = 'get';
	POP.url = './?open=INTbid&action=get_price&weight=' + weight + '&color=' + color + '&clarity=' + clarity;
	POP.callback = function(info)
	{
		if (info.responseText == '0')
		{
			$('price').innerHTML = '未知错误';
		}else{
			$('price').innerHTML = STRING.sprintf('%.2f' , info.responseText * weight * aogo / 100 * exchange) + ' 元';
		}
	};
	POP.send();
}