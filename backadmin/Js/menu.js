//Ajax Class
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

//全部选择
function select_all(name)
{
	var N = document.getElementsByName(name);
	for (i=0;i<N.length;i++)
	{
		N[i].checked = true;
	}
}

//全部取消
function select_out(name)
{
	var N = document.getElementsByName(name);
	for (i=0;i<N.length;i++)
	{
		N[i].checked = false;
	}
}

//选择权限
function select_zfs(self)
{
	var N = self.parentNode.getElementsByTagName('input');
	var ced = N[1].checked;
	for (i=1 ; i < N.length ; i++)
	{
		if (ced)
			N[i].checked = false;
		else
			N[i].checked = true;
	}
}

//选择权限
function select_ck(self)
{
	if (self.checked)
	{
		var N = self.parentNode.parentNode.getElementsByTagName('input');
		
		if (self.title == 'show') return;
		
		for (i=1 ; i < N.length ; i++)
		{
			if (N[i].title == 'show')
			{
				N[i].checked = true;
				break;
			}
		}
	}
}

//反向选择
function select_agt(name)
{
	var N = document.getElementsByName(name);
	for (i=0;i<N.length;i++)
	{
		if (N[i].checked)
			N[i].checked = false;
		else
			N[i].checked = true;
	}
}

//删除选择
function select_del(name , self ,Alert)
{
	if (Alert == null) Alert = '请选择要删除的列';
	
	var N = document.getElementsByName(name);
	var j = 0;
	for (i=0 ; i < N.length ; i++)
	{
		if (N[i].checked) j++;
	}
	
	if (j == 0)
	{
		alert(Alert);
		return false;
	}else{
		self.form.submit();
	}
}

//页面跳转
function page_Local(selObj,restore , url)
{
	if (url) url = url + '&';
	eval("window.location='"+ url + selObj.options[selObj.selectedIndex].value+"'");
	if (restore) selObj.selectedIndex=0;
}

function showDoan(id)
{
	id = document.getElementById(id);
	if (id.style.display == 'none')
		id.style.display = '';
	else
		id.style.display = 'none';
}

function passView(T)
{
	if (getOs() != 'IE')
	{
		T.type = 'text';
		
		T.onblur = function()
		{
			T.type = 'password';
		};
	}
}


function DelNoS(rd,value,gz,NowColor,DefColor)
{
	if (NowColor == null)
	NowColor = '#000';
	
	if (DefColor == null)
	DefColor = '#999';
	
	if (rd.value == value)
	{
		rd.type = 'text';
		rd.value = '';
		rd.style.color = NowColor;
	}
	
	if (gz != null)
	{
		rd.onkeyup = function()
		{
			rd.value=rd.value.replace(gz,'');
		};
	}else{
		rd.value = '';
	}
	
	rd.onblur = function()
	{
		if (rd.value == "")
		{
			rd.value = value;
			rd.style.color = DefColor;
		}
	};
}

function Digital(me , isNumeric)
{
    if (!isNumeric)
	{
		me.value=me.value.replace(/[^0-9\.]/i,'');
	}else{
		me.value=me.value.replace(/[^0-9]/i,'');
	}
}


//高亮显示
function Highlight(self , type)
{
	if (type)
	{
		self.style.backgroundColor = '#FFFFCC';
		self.onmouseout = function()
		{
			self.style.backgroundColor = '';
		};
		
	}else{
		var td = self.getElementsByTagName('td');
		for (i = 0 ; i < td.length ; i++) td.item(i).style.backgroundColor = '#FFFFCC';
		
		self.onmouseout = function()
		{
			for (i = 0 ; i < td.length ; i++) td.item(i).style.backgroundColor = '';
		};
	}
}

function go_page(e , self , url)
{
	var charCode;
	if(window.event)
	{
		charCode = e.keyCode;
	}else if(e.which){
		charCode = e.which;
	}

	//var charCode = (navigator.userAgent.indexOf("Firefox")) ? event.which : event.keyCode;
	//alert(charCode);
	if (charCode == 13)
	{
		var ve = parseInt(self.value , 10);
		ve = (ve > 0) ? ve : 1;
		
		if (url.indexOf('?') > -1)
		{
			if (url.indexOf('page=') > -1)
			{
				url = url.split(/&/g);
				for (k in url)
				{
					if (url[k].indexOf('page=') > -1) url[k] = 'page=' + ve;
				}
				url = url.toString().replace(/,/g , '&');
			}else{
				url += '&' + 'page=' + ve;
			}
			
		}else{
			url += '?' + 'page=' + ve;
		}
		//alert(url.toString());
		location.replace(url.toString());
		return;
	}
}


function DELDAY(id)
{
	id = document.getElementById(id) || document.getElementsByName(id).item(0);
	id.value = '';
}

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

//普通查询
function Pro_query(self , value)
{
	if (self.value == value) self.value = '';
	self.style.color = '#000';
	
	self.onblur = function()
	{
		if (self.value == '')
		{
			self.value = value;
			self.style.color = '#999';
		}
	};
}

function Calculation(self , show)
{
	String.prototype.Blength = function()
	{
		var arr = this.match(/[^\x00-\xff]/ig);
		return arr == null ? parseInt(this.length , 10) : parseInt(this.length + arr.length , 10);
	}
	//self.readOnly = ((120 - self.value.Blength()) < 1) ? true : false;
	if ((120 - self.value.Blength()) < 1)
		document.getElementById(show).innerHTML = "目前可用字符 <span style='color:red'>" + (120 - self.value.Blength()) + '</span>';
	else
		document.getElementById(show).innerHTML = "目前可用字符 " + (120 - self.value.Blength());
}

function sto_NO(self)
{
	var input = self.parentNode.parentNode.getElementsByTagName('input');
	if (self.checked)
	{
		input[0].disabled = true;
		input[2].style.display = 'none';
	}else{
		input[0].disabled = false;
		input[2].style.display = '';
	}
}

function check_NO(self)
{
	var ProID = self.parentNode.getElementsByTagName('input')[0];
	if (!ProID.value)
	{
		alert('请先输入产品编号');
		return;
	}
	
	var POP = new AJAXRequest;
	POP.method = 'get';
	//if (navigator.userAgent.indexOf("MSIE")) POP.New = true;
	POP.url = './?open=product&action=check_NO&NO=' + ProID.value;
	POP.callback = function(POPdata)
	{
		var str = POPdata.responseText;
		if (str == '-1')
		{
			alert('此编号未被使用,可以录入');
		}else{
			ProID.value = '';
			alert(str);
		}
	};
	POP.send();
}