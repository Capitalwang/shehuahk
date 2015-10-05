var oPRODUCT_DETAIL_Array = Array();
var customer_DETAIL_Array = Array();

//显示产品详细信息
function show_detail(self , id , colspan)
{
	ID = 'P_' + id;
	var thisTR = self.parentNode.parentNode;
	var tab = thisTR.parentNode;
	thisTR.detail = (thisTR.detail == true) ? false : true;
	
	if (!thisTR.detail)
	{
		tab.removeChild(thisTR.nextSibling);
	}else{
		var tr = document.createElement('tr');
		tab.insertBefore(tr , thisTR.nextSibling);
		tr.className = 'detail_TR';
		
		var td = document.createElement('td');
		tr.appendChild(td);
		td.colSpan = colspan;
		td.style.padding = '0.5em';
		td.innerHTML = '<div style="text-align:center;padding:2em 0">产品详细信息正在加载中...</div>';
		
		//缓存到页面数组中
		if (oPRODUCT_DETAIL_Array.toString().indexOf(ID) == -1)
		{
			var POP = new AJAXRequest;
			POP.method = 'get';
			POP.url = './?open=orders&action=product_detail&id=' + id;
			POP.callback = function(info)
			{
				if (info.responseText)
				{
					oPRODUCT_DETAIL_Array.push(Array(ID , info.responseText));
					td.innerHTML = info.responseText;
				}
				
			};
			POP.send();
		}else{
			var json = '';
			for (i = 0 ; i < oPRODUCT_DETAIL_Array.length ; i++)
			{
				if (oPRODUCT_DETAIL_Array[i][0] == ID)
				{
					json = oPRODUCT_DETAIL_Array[i][1];
					break;
				}
			}
			td.innerHTML = json;
		}
	}
}

//取消订单
function cancel(self , id , colspan , url)
{
	ID = 'cancel_' + id;
	var thisTR = self.parentNode.parentNode;
	var tab = thisTR.parentNode;
	thisTR.cancel = (thisTR.cancel == true) ? false : true;
	
	if (!thisTR.cancel)
	{
		tab.removeChild(thisTR.nextSibling);
	}else{
		if (thisTR.nextSibling && thisTR.nextSibling.className == 'sms_TR')
		{
			thisTR.sms = false;
			tab.removeChild(thisTR.nextSibling);
		}
		
		if (url)
		{
			var POP = new AJAXRequest;
			POP.method = 'get';
			
			POP.url = url;
			POP.callback = function(info){if (info.responseText) self.parentNode.innerHTML = info.responseText;};
			POP.send();
		}else{
			var tr = document.createElement('tr');
			tab.insertBefore(tr , thisTR.nextSibling);
			tr.className = 'cancel_TR';
			
			var td = document.createElement('td');
			tr.appendChild(td);
			td.colSpan = colspan;
			td.style.padding = '0.5em';
			td.innerHTML = '<div style="text-align:center;padding:2em 0">正在准备中...</div>';
			
			var POP = new AJAXRequest;
			POP.method = 'get';
			POP.url = './?open=orders&action=cancel&orders_id=' + id;
			POP.callback = function(info){if (info.responseText) td.innerHTML = info.responseText;};
			POP.send();
		}
	}
}

//取消订单
function sms(self , id , colspan , url , orders)
{
	var thisTR = self.parentNode.parentNode;
	var tab = thisTR.parentNode;
	thisTR.sms = (thisTR.sms == true) ? false : true;
	
	if (!thisTR.sms)
	{
		tab.removeChild(thisTR.nextSibling);
	}else{
		if (thisTR.nextSibling && thisTR.nextSibling.className == 'cancel_TR')
		{
			thisTR.cancel = false;
			tab.removeChild(thisTR.nextSibling);
		}
		
		if (url)
		{
			var POP = new AJAXRequest;
			POP.method = 'get';
			
			POP.url = url;
			POP.callback = function(info){if (info.responseText) self.parentNode.innerHTML = info.responseText;};
			POP.send();
		}else{
			var tr = document.createElement('tr');
			tab.insertBefore(tr , thisTR.nextSibling);
			tr.className = 'sms_TR';
			
			var td = document.createElement('td');
			tr.appendChild(td);
			td.colSpan = colspan;
			td.style.padding = '0.5em';
			td.innerHTML = '<div style="text-align:center;padding:2em 0">正在准备中...</div>';
			
			var POP = new AJAXRequest;
			POP.method = 'get';
			POP.url = './?open=orders&action=sms&proxy_id=' + id +'&orders=' + orders;
			POP.callback = function(info){if (info.responseText) td.innerHTML = info.responseText;};
			POP.send();
		}
	}
}

//收到货物
function receiving(self , id , colspan)
{
	ID = 'Receiv_' + id;
	var thisTR = self.parentNode.parentNode;
	var tab = thisTR.parentNode;
	thisTR.detail = (thisTR.detail == true) ? false : true;
	
	if (!thisTR.detail)
	{
		tab.removeChild(thisTR.nextSibling);
	}else{
		var tr = document.createElement('tr');
		tab.insertBefore(tr , thisTR.nextSibling);
		tr.className = 'detail_TR';
		
		var td = document.createElement('td');
		tr.appendChild(td);
		td.colSpan = colspan;
		td.style.padding = '0.5em';
		td.innerHTML = '<div style="text-align:center;padding:2em 0">正在准备中...</div>';
		
		var POP = new AJAXRequest;
		POP.method = 'get';
		POP.url = './?open=orders&action=receiving&orders_id=' + id;
		POP.callback = function(info){
			if (info.responseText) td.innerHTML = info.responseText;
		};
		POP.send();
	}
}

//提交收到货物
function set_receiving(self , orders_id)
{
	var POP = new AJAXRequest;
	POP.method = 'get';
	
	POP.url = './?open=orders&action=receiving&go=append&orders_id=' + orders_id;
	POP.callback = function(info){if (info.responseText) self.parentNode.innerHTML = info.responseText;};
	POP.send();
}

//提交扣款
function cancel_koukuang(orders_id , tabID , check_ID)
{
	var POP = new AJAXRequest;
	POP.method = 'POST';
	
	POP.url = './?open=orders&action=cancel&go=validation&orders_id=' + orders_id;
	POP.content = 'money=' + document.getElementById(check_ID + orders_id).value;
	POP.callback = function(info){if (info.responseText) document.getElementById(tabID + orders_id).parentNode.innerHTML = info.responseText;};
	POP.send();
}

//打印
function Prints(id)
{
	ID = 'ps_' + id;
	
	//缓存到页面数组中
	if (customer_DETAIL_Array.toString().indexOf(ID) == -1)
	{
		var POP = new AJAXRequest;
		POP.method = 'get';
		POP.url = './?open=orders&action=prints&id=' + id;
		POP.callback = function(info)
		{
			var json = info.responseText;
			if (json != '0')
			{
				json = eval('(' + json + ')');
				customer_DETAIL_Array.push(Array(ID , json));
				print_json(json);
			}else{
				alert('你没有此权限');return;
			}
		};
		POP.send();
	}else{
		var json = '';
		for (i = 0 ; i < customer_DETAIL_Array.length ; i++)
		{
			if (customer_DETAIL_Array[i][0] == ID)
			{
				json = customer_DETAIL_Array[i][1];
				break;
			}
		}
		print_json(json);
	}
}

function print_json(json)
{
	var orders = document.getElementById('print').getElementsByTagName('table').item(1).getElementsByTagName('td');
	orders.item(1).innerHTML = json['company_name'];
	orders.item(3).innerHTML = json['proxy_name'];
	orders.item(5).innerHTML = json['time'];
	orders.item(7).innerHTML = json['orders_id'];
	orders.item(9).innerHTML = json['print_time'];
	
	var tbody = document.getElementById('print').getElementsByTagName('table').item(2).getElementsByTagName('tbody').item(0);
	var TR = tbody.getElementsByTagName('tr');
	for (i = TR.length ; i > 0; i--) tbody.removeChild(TR[i]);
	
	for (i = 0 ; i <json.pro.length ; i++)
	{
		var tr = document.createElement('tr');
		tr.action = 'center';
		tbody.appendChild(tr);
		
		for(key in json.pro[i])
		{
			var td = document.createElement('td');
			tr.appendChild(td);
			td.action = 'center';
			td.innerHTML = json.pro[i][key];
		}
	}
	window.print();
}

function Ernest(rate , price){document.getElementById('earnest').value = STRING.sprintf('%.2f' , price * rate)}

//发送短信
function sms_send(orders , proxy , tel)
{
	var POP = new AJAXRequest;
	POP.method = 'POST';
	
	POP.url = './?open=orders&action=sms&go=send';
	POP.content = 'proxy=' + proxy + '&tel=' + tel + '&message=' + document.getElementById('message_' + orders).value;
	POP.callback = function(info){if (info.responseText) document.getElementById('sms_' + orders).innerHTML = info.responseText;};
	POP.send();
}
