function set_PROVINCE_CITY(PROVINCE_CITY , province , city , province_value , city_value)
{
	var PROVINCE_CITY_name = PROVINCE_CITY;
	PROVINCE_CITY = document.getElementById(PROVINCE_CITY);
	if (!PROVINCE_CITY) return;
	
	PROVINCE_CITY.innerHTML = '<select name="'+ province +'" onchange="_set_PROVINCE_function(\''+ PROVINCE_CITY_name +'\' , \''+ city +'\' , this)"><option value="0">\u8bf7\u9009\u62e9</option></select>';
	var SELECT = PROVINCE_CITY.getElementsByTagName('select');
	
	var POP = new AJAXRequest;
	POP.method = 'get';
	//if (navigator.userAgent.indexOf("MSIE")) POP.New = true;
	POP.url = '../json/city.txt';
	POP.callback = function(POPdata)
	{
		var json = eval('(' + POPdata.responseText + ')');
		for (key in json)
		{
			if (!json[key].UPname)
			{
				var option = document.createElement("option");
				SELECT.item(0).appendChild(option);
				option.value = json[key].name;
				option.innerHTML = json[key].name;
				
				if (province_value == json[key].name)
				{
					option.selected = true;
					_set_PROVINCE_function(PROVINCE_CITY_name , city , SELECT.item(0) , city_value);
				}
			}
		}
	};
	POP.send();
}

function _set_PROVINCE_function(PROVINCE_CITY , city , ProvincE , city_value)
{
	PROVINCE_CITY = document.getElementById(PROVINCE_CITY);
	if (!PROVINCE_CITY) return;
	
	var SELECT = PROVINCE_CITY.getElementsByTagName('select');
	if (SELECT.length > 1)
	{
		PROVINCE_CITY.removeChild(SELECT.item(1));
		var B = PROVINCE_CITY.getElementsByTagName('b');
		PROVINCE_CITY.removeChild(B.item(0));
	}
	
	var BTge = document.createElement("b");
	PROVINCE_CITY.appendChild(BTge);
	BTge.innerHTML = '&nbsp;-&nbsp;';
	
	var selectTge = document.createElement("select");
	PROVINCE_CITY.appendChild(selectTge);
	selectTge.name = city;
	var option = document.createElement("option");
	selectTge.appendChild(option);
	option.value = '0';
	option.innerHTML = '\u8bf7\u9009\u62e9';
	
	var POP = new AJAXRequest;
	POP.method = 'get';
	//if (navigator.userAgent.indexOf("MSIE")) POP.New = true;
	POP.url = '../json/city.txt';
	POP.callback = function(POPdata)
	{
		var json = eval('(' + POPdata.responseText + ')');
		i = 0;
		for (key in json)
		{
			if (json[key].UPname == ProvincE.options[ProvincE.selectedIndex].value)
			{
				i++;
				var option = document.createElement("option");
				selectTge.appendChild(option);
				option.value = json[key].name;
				option.innerHTML = json[key].name;
				if (city_value == json[key].name) option.selected = true;
			}
		}
		
		if (!i)
		{
			PROVINCE_CITY.removeChild(selectTge);
			var B = PROVINCE_CITY.getElementsByTagName('b');
			PROVINCE_CITY.removeChild(B.item(0));
		}
	};
	POP.send();			
}