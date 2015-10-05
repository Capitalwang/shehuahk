//添加新的通讯
function Add_NAB(id)
{
	UL = document.getElementById(id);
	
	var li = document.createElement("li");
	UL.appendChild(li);
	li.innerHTML = NAB_ONE_LI_INNERHTML;
}

function Up_NAB(self)
{
	var input = self.parentNode.getElementsByTagName('input').item(0);
	input.value = self.options[self.selectedIndex].innerHTML;
}

function set_default(self)
{
	var span = self.parentNode.getElementsByTagName('span').item(0);
	if (self.options[self.selectedIndex].value == 'mobile')
		span.style.display = '';
	else
		span.style.display = 'none';
}

function set_mobile(self)
{
	var input = self.parentNode.getElementsByTagName('input').item(2);
	input.value = self.value;
}

function Del_NAB(id , self)
{
	UL = document.getElementById(id);
	UL.removeChild(self.parentNode);
}

function AjaxShow(self , defaultValue , opens , tab)
{
	if (defaultValue == self.value) self.value = '';
	var B = self.parentNode.getElementsByTagName('b').item(0);
	var input = self.parentNode.getElementsByTagName('input').item(1);
	
	self.style.color = '#F00';
	self.style.fontWeight = '900';
	
	self.onblur = function()
	{
		if (self.value != '' && self.value != defaultValue)
		{
			var POP = new AJAXRequest;
			POP.method = 'get';
			//if (navigator.userAgent.indexOf("MSIE")) POP.New = true;
			POP.url = './?open= '+ opens +' &action=ajax&tab='+ tab +'&string=' + encodeURI(self.value);
			POP.callback = function(POPdata)
			{
				var json = eval('(' + POPdata.responseText + ')');
				if (json['S'] == '1')
				{
					input.value = json['id'];
					//B.style.display = 'block';
					B.className = 'act_1_6';
				}else{
					input.value = '';
					//B.style.display = 'block';
					B.className = 'act_1_5';
				}
			};
			POP.send();
		}else{
			input.value = '';
			self.style.color = '#999';
			self.style.fontWeight = '300';
			self.value = defaultValue;
			
			B.className = '';
			//B.style.display = 'none';
		}
	};
	
//	self.onblur = function()
//	{
//		if (self.value == '' || self.value == defaultValue)
//		{
//			input.value = '';
//			self.style.color = '#999';
//			self.style.fontWeight = '300';
//			self.value = defaultValue;
//			
//			B.style.display = 'none';
//		}
//	};
}

function proxy_money(self)
{
	var value = self.value;
	value = STRING.sprintf('%.2f' , value);
	value = (value == 'NaN') ? 0.00 : value;
	self.value = value;
	
	var span = self.parentNode.getElementsByTagName('span');
	span.item(1).innerHTML =  STRING.sprintf('%.2f' , parseFloat(span.item(0).innerHTML) + parseFloat(value));
}