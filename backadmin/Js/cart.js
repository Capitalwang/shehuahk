function get_proxy(self , input)
{
	if (self.defaultValue == self.value) self.value = '';
	
	self.style.color = '#F00';
	self.style.fontWeight = '900';
	var B = self.parentNode.getElementsByTagName('b').item(0);
	
	self.onchange = function()
	{
		if (self.value != '' && self.value != self.defaultValue)
		{
			var POP = new AJAXRequest;
			POP.method = 'get';
			//if (navigator.userAgent.indexOf("MSIE")) POP.New = true;
			POP.url = './?open=cart&action=get_proxy&string=' + encodeURI(self.value);
			POP.callback = function(POPdata)
			{
				if (POPdata.responseText == '0')
				{
					self.value = '';
					self.style.color = '#999';
					self.style.fontWeight = '300';
					_change(null , false);
				}else{
					var json = eval('(' + POPdata.responseText + ')');
					_change(json , true);
				}
			};
			POP.send();
		}else{
			_change(null , false);
			
			B.className = '';
			self.style.color = '#999';
			self.style.fontWeight = '300';
			self.value = self.defaultValue;
		}
	}
	
	function _change(json , change)
	{
		if (change)
		{
			B.className = 'act_1_6';
			$('proxy_id').value = json.id;
			
			$('salesman_id').value = json.salesman_id;
			$('salesman_write').value = json.salesman_write;
			$('salesman_write').style.color = '#F00';
			$('salesman_write').style.fontWeight = '900';
			$('salesman_write').parentNode.getElementsByTagName('b').item(0).className = 'act_1_6';
			
			$('service_id').value = json.service_id;
			$('service_write').value = json.service_write;
			$('service_write').style.color = '#F00';
			$('service_write').style.fontWeight = '900';
			$('service_write').parentNode.getElementsByTagName('b').item(0).className = 'act_1_6';
			
			$('rebate_value').innerHTML = json.rebate + ' %';
			$('rebate').value = json.rebate;
			
			$('group_info').innerHTML = json.group;
			$('group').value = json.group;
			
			$('is_offer_info').innerHTML = (json.is_offer == 'Y') ? '支持' : '不支持';
			$('is_offer').value = json.is_offer;
			
			$('subMIT').style.display = '';
		}else{
			B.className = 'act_1_5';
			$('proxy_id').value = '';
			
			$('salesman_id').value = '';
			$('salesman_write').value = $('salesman_write').defaultValue;
			$('salesman_write').style.color = '#999';
			$('salesman_write').style.fontWeight = '300';
			$('salesman_write').parentNode.getElementsByTagName('b').item(0).className = '';
			
			$('service_id').value = '';
			$('service_write').value = $('salesman_write').defaultValue;
			$('service_write').style.color = '#999';
			$('service_write').style.fontWeight = '300';
			$('service_write').parentNode.getElementsByTagName('b').item(0).className = '';
			
			$('rebate_value').innerHTML = '';
			$('rebate').value = '';
			
			$('group_info').innerHTML = '';
			$('group').value = '';
			
			$('is_offer_info').innerHTML = '';
			$('is_offer').value = '';
			
			$('subMIT').style.display = 'none';
		}
	}
	
}

function $(id)
{
	return document.getElementById(id);
}

//改变tr本身的值
function C_price(self , MIN , MAX)
{
	var Start = parseInt(self.value , 10);
	
	self.onchange = function()
	{
		var value = STRING.sprintf('%d' , self.value);
		value = (value != 'NaN') ? value : 1;
		value = (parseInt(value , 10) <= MIN) ? MIN : value;
		value = (parseInt(value , 10) >= MAX) ? MAX : value;
		self.value = value;
		
		price_change(self.parentNode.parentNode , parseInt(value - Start , 10));
	}
}

function price_change(self , amount)
{
	var input = self.getElementsByTagName('input');
	$('Z_price').innerHTML = STRING.sprintf('%.2f' , parseFloat($('Z_price').innerHTML) + amount * parseFloat(input[2].value));
	$('S_price').innerHTML = STRING.sprintf('%.2f' , parseFloat($('S_price').innerHTML) + amount * parseFloat(input[1].value));
}

//改变tr本身的值
function set_price(self)
{
	var Start = parseFloat(self.value);
	self.onchange = function()
	{
		var value = STRING.sprintf('%.2f' , self.value);
		self.value = value;
		
		var input = self.parentNode.parentNode.getElementsByTagName('input');
		$('S_price').innerHTML = STRING.sprintf('%.2f' , parseFloat($('S_price').innerHTML) + (value - Start) * parseFloat(input[0].value));
	}
}


function change_id(self , tab)
{
	if (self.defaultValue == self.value) self.value = '';
	
	self.style.color = '#F00';
	self.style.fontWeight = '900';
	var B = self.parentNode.getElementsByTagName('b').item(0);
	var hidden = self.parentNode.getElementsByTagName('input').item(0);
	
	self.onchange = function()
	{
		if (self.value != '' && self.value != self.defaultValue)
		{
			var POP = new AJAXRequest;
			POP.method = 'get';
			//if (navigator.userAgent.indexOf("MSIE")) POP.New = true;
			POP.url = './?open=cart&action=change&tab=' + tab + '&string=' + encodeURI(self.value);
			POP.callback = function(POPdata)
			{
				if (POPdata.responseText == '0')
				{
					hidden.value = '';
					self.value = '';
					B.className = 'act_1_5';
				}else{
					var json = eval('(' + POPdata.responseText + ')');
					hidden.value = json.id;
					B.className = 'act_1_6';
				}
			};
			POP.send();
		}else{
			hidden.value = '';
			B.className = '';
			
			self.style.color = '#999';
			self.style.fontWeight = '300';
			self.value = self.defaultValue;
		}
	}
}