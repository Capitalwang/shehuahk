var PRODUCT_DETAIL_Array = Array();
//显示产品详细信息
function show_pro_detail(self , id , colspan)
{
	ID = 'D_' + id;
	var thisTR = self.parentNode.parentNode;
	var tab = thisTR.parentNode;
	thisTR.detail = (thisTR.detail == true) ? false : true;
	
	if (!thisTR.detail)
	{
		tab.removeChild(thisTR.nextSibling);
	}else{
		if (thisTR.nextSibling && thisTR.nextSibling.className == 'view_TR')
		{
			thisTR.view = false;
			tab.removeChild(thisTR.nextSibling);
		}
		
		var tr = document.createElement('tr');
		tab.insertBefore(tr , thisTR.nextSibling);
		tr.className = 'detail_TR';
		
		var td = document.createElement('td');
		tr.appendChild(td);
		td.colSpan = colspan;
		td.style.padding = '0.5em';
		td.innerHTML = '<div style="text-align:center;padding:2em 0">产品详细信息正在加载中...</div>';
		
		//缓存到页面数组中
		if (PRODUCT_DETAIL_Array.toString().indexOf(ID) == -1)
		{
			var info = document.getElementsByName('info');
			if (info && info.length)
			{
				info = info.item(0).value;
				info = (info !='' && info != '产品编号/证书编号/原始编号') ? info : '';
			}
			
			var POP = new AJAXRequest;
			POP.method = 'get';
			POP.url = './?open=product&action=detail&id=' + id + '&info=' + info;
			POP.callback = function(info)
			{
				if (info.responseText)
				{
					PRODUCT_DETAIL_Array.push(Array(ID , info.responseText));
					td.innerHTML = info.responseText;
				}
				
			};
			POP.send();
		}else{
			var json = '';
			for (i = 0 ; i < PRODUCT_DETAIL_Array.length ; i++)
			{
				if (PRODUCT_DETAIL_Array[i][0] == ID)
				{
					json = PRODUCT_DETAIL_Array[i][1];
					break;
				}
			}
			td.innerHTML = json;
		}
	}
}

//添加到购物车
function add_cart(name , self , action)
{
	var N = document.getElementsByName(name);
	var j = 0;
	for (i=0 ; i < N.length ; i++)
	{
		if (N[i].checked) j++;
	}
	
	if (j == 0)
	{
		alert('请选择产品');
		return false;
	}else{
		self.form.action = action;
		self.form.submit();
	}
}

//显示各用户等级价格
function view_price(self , id , colspan)
{
	ID = 'P_' + id;
	var thisTR = self.parentNode.parentNode;
	var tab = thisTR.parentNode;
	thisTR.view = (thisTR.view == true) ? false : true;
	
	if (!thisTR.view)
	{
		tab.removeChild(thisTR.nextSibling);
	}else{
		if (thisTR.nextSibling && thisTR.nextSibling.className == 'detail_TR')
		{
			thisTR.detail = false;
			tab.removeChild(thisTR.nextSibling);
		}
		
		var tr = document.createElement('tr');
		tab.insertBefore(tr , thisTR.nextSibling);
		tr.className = 'view_TR';
		
		var td = document.createElement('td');
		tr.appendChild(td);
		td.colSpan = colspan;
		td.style.padding = '0.5em';
		td.innerHTML = '<div style="text-align:center;padding:2em 0">用户等级价格正在加载中...</div>';
		
		//缓存到页面数组中
		if (PRODUCT_DETAIL_Array.toString().indexOf(ID) == -1)
		{
			var POP = new AJAXRequest;
			POP.method = 'get';
			POP.url = './?open=product&action=view_price&id=' + id;
			POP.callback = function(info)
			{
				if (info.responseText)
				{
					PRODUCT_DETAIL_Array.push(Array(ID , info.responseText));
					td.innerHTML = info.responseText;
				}
				
			};
			POP.send();
		}else{
			var json = '';
			for (i = 0 ; i < PRODUCT_DETAIL_Array.length ; i++)
			{
				if (PRODUCT_DETAIL_Array[i][0] == ID)
				{
					json = PRODUCT_DETAIL_Array[i][1];
					break;
				}
			}
			td.innerHTML = json;
		}
	}
}

/*------------------------------------------- 添加 删除 --------------------------------------------------------*/

//产品来源控制
function show_proSource(self , tab , className)
{
	var tr = document.getElementById(tab).getElementsByTagName('tr');
	var input = document.getElementById('Address').getElementsByTagName('input').item(0);
	var Select = document.getElementById('Address').getElementsByTagName('select').item(0);
	
	switch (self.options[self.selectedIndex].value)
	{
		case 'self':
			for (i = 0 ; i < tr.length ; i++){if (tr[i].className == className){tr[i].style.display = 'none';tr[i+1].style.display = 'table-row';break;}}
			input.style.display = 'none';
			Select.style.display = '';
		break;
		case '0':
			for (i = 0 ; i < tr.length ; i++) if (tr[i].className == className) tr[i].style.display = 'none';
			input.style.display = '';
			Select.style.display = 'none';
		break;
		default:
			for (i = 0 ; i < tr.length ; i++) if (tr[i].className == className) tr[i].style.display = 'table-row';
			input.style.display = '';
			Select.style.display = 'none';
	}
}

//促销显示控制
function click_promotion(self)
{
	var ul = self.parentNode.getElementsByTagName('ul').item(0);
	var input = ul.getElementsByTagName('input');
	
	if (self.checked == true && self.value == 'Y')
	{
		ul.style.display = 'block';
	}else{
		ul.style.display = 'none';
		for (i = 0 ; i < input.length ; i++) input[i].value = '';
	}
}

//获取国际报价
function get_bid(INTbid)
{
	var weight = document.getElementById('weight').value;
	
	var color = document.getElementById('color');
	color = color.options[color.selectedIndex].value;
	
	var clarity = document.getElementById('clarity');
	clarity = clarity.options[clarity.selectedIndex].value;
	
	if (weight && color && clarity && weight > 0 && color != '0' && clarity != '0')
	{
		var POP = new AJAXRequest;
		POP.method = 'get';
		POP.url = './?open=product&action=get_bid&weight=' + weight + '&color=' + color + '&clarity=' + clarity;
		POP.callback = function(info)
		{
			info = info.responseText;
			if (info)
			{
				info = info.split('|');
				document.getElementById(INTbid).innerHTML = '人民币 ' + info[0] + ' / ct &nbsp; 美元 ' + info[1] + ' / ct';
				document.getElementById('INTbid_value').value = info[0];
				get_agio('agio');
			}
		};
		POP.send();
	}
}

//计算退点
function get_agio(id)
{
	var infml = document.getElementById('infml').value;
	var weight = document.getElementById('weight').value;
	var INTbid = document.getElementById('INTbid_value').value;
	
	if (infml && weight && INTbid && infml > 0 && weight > 0 && INTbid > 0)
	{
		document.getElementById(id).innerHTML = STRING.sprintf('%.2f' , infml / weight / INTbid * 100 - 100);
	}
}

//取消
function cancel(self)
{
	var input = self.parentNode.getElementsByTagName('input');
	
	for(i = 0 ;i < input.length ; i++)
	{
		input[i].checked = false;
	}
}

function getName(name)
{
	if (document.getElementsByName(name).length > 1) return document.getElementsByName(name);
	return document.getElementsByName(name).item(0);
}

function to_check_Dip()
{
	var diploma = getName('diploma');
	diploma = diploma.options[diploma.selectedIndex].value;
	var diplomaNO = getName('diplomaNO').value;
	
	var autos = document.getElementById('autos');
	autos.style.display = (diploma == 'GIA' && diplomaNO) ? '' : 'none';
	var B = autos.parentNode.getElementsByTagName('b').item(0);
	B.innerHTML = '';
}

function auto_tab(self)
{
	var diplomaNO = getName('diplomaNO').value;
	var weight = getName('weight').value;
	if (!weight || weight == 0){alert('请填写重量');return;}
	
	var B = self.parentNode.getElementsByTagName('b').item(0);
	B.innerHTML = '正在查询中...';
	
	var POP = new AJAXRequest;
	POP.method = 'get';
	POP.url = './?open=product&action=get_GIA&weight=' + weight + '&NO=' + diplomaNO;
	POP.callback = function(info)
	{
		info = info.responseText;
		switch (info)
		{
			case '-1': B.innerHTML = '自动填表失败,请过会在试,或者手动填写'; break;
			case '-2': B.innerHTML = '你填写的重量和证书号错误';break;
			default:_cheg(info);B.innerHTML = '表单填写完成';
		}
	};
	POP.send();
	
	function _cheg(json)
	{
		json = eval('(' + json + ')');
		getName('color').value = json.color;
		getName('clarity').value = json.clarity;
		getName('cut').value = json.cut;
		getName('buffing').value = json.buffing;
		getName('symmetry').value = json.symmetry;
		getName('Fent_Isity').value = json.Fent_Isity;
		getName('Fent_color').value = json.Fent_color;
		getName('scalar_value').value = json.scalar_value;
		getName('body_ratio').value = json.body_ratio;
		getName('table_width').value = json.table_width;
		if (getName('userRemark').value && getName('userRemark').value != json.userRemark)
			getName('userRemark').value += '\n' + json.userRemark;
		else
			getName('userRemark').value = json.userRemark;
	}
}