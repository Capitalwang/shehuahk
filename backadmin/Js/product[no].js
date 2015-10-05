//show product details
var PRODUCT_DETAIL_Array = Array();

var PRODUCT_td_Array = Array();

//方法一
//var PRODUCT_td_Array_temp_string = 'ProID.编号,previousNO.原编号,status.状态,amount.数量,shape.形状,weight.重量,color.颜色,clarity.净度,cut.切工,buffing.抛光,symmetry.对称,Fent_Isity.荧光强度,Fent_color.荧光颜色,scalar_value.测量值,body_ratio.全身比,table_width.台宽比,diploma.证书类型,diplomaNO.证书编号,diplomaPhoto.证书图像,proSource.产品来源,sellerID.商家ID,stockAddress.库存地点,is_promotion.是否促销,promotion_start.促销开始日期,promotion_stop.促销结束日期,promotion_dot.促销点 ¥,country.国家,infml.进货价 ¥,INTbid.国际报价 ¥,agio.退点 %,baseAgio.基准退点 %,userRemark.外部备注,backRemark.内部备注,time.产品添加日期,edit_time.最后修改日期';
//PRODUCT_td_Array_temp_string = PRODUCT_td_Array_temp_string.split(',');
//for (key in PRODUCT_td_Array_temp_string)
//{
//	PRODUCT_td_Array_temp_string[key] = PRODUCT_td_Array_temp_string[key].split('.');
//	PRODUCT_td_Array[PRODUCT_td_Array_temp_string[key][0]] = PRODUCT_td_Array_temp_string[key][1];
//}

//方法二
PRODUCT_td_Array['ProID'] = '编号';
PRODUCT_td_Array['previousNO'] = '原编号';
PRODUCT_td_Array['status'] = '状态';
PRODUCT_td_Array['amount'] = '数量';
PRODUCT_td_Array['shape'] = '形状';
PRODUCT_td_Array['weight'] = '重量';
PRODUCT_td_Array['color'] = '颜色';
PRODUCT_td_Array['clarity'] = '净度';
PRODUCT_td_Array['cut'] = '切工';
PRODUCT_td_Array['buffing'] = '抛光';
PRODUCT_td_Array['symmetry'] = '对称';
PRODUCT_td_Array['Fent_Isity'] = '荧光强度';
PRODUCT_td_Array['Fent_color'] = '荧光颜色';
PRODUCT_td_Array['scalar_value'] = '测量值';
PRODUCT_td_Array['body_ratio'] = '全身比 %';
PRODUCT_td_Array['table_width'] = '台宽比 %';
PRODUCT_td_Array['diploma'] = '证书类型';
PRODUCT_td_Array['diplomaNO'] = '证书编号';
PRODUCT_td_Array['diplomaPhoto'] = '证书图像';
PRODUCT_td_Array['proSource'] = '产品来源';
PRODUCT_td_Array['sellerID'] = '商家ID';
PRODUCT_td_Array['stockAddress'] = '库存地点';
PRODUCT_td_Array['is_promotion'] = '是否促销';
PRODUCT_td_Array['promotion_start'] = '促销开始日期';
PRODUCT_td_Array['promotion_stop'] = '促销结束日期';
PRODUCT_td_Array['promotion_dot'] = '促销点 ¥';
PRODUCT_td_Array['country'] = '国家';
PRODUCT_td_Array['infml'] = '进货价 ¥';
PRODUCT_td_Array['INTbid'] = '国际报价 ¥';
PRODUCT_td_Array['agio'] = '退点 %';
PRODUCT_td_Array['baseAgio'] = '基准退点 %';
PRODUCT_td_Array['userRemark'] = '外部备注';
PRODUCT_td_Array['backRemark'] = '内部备注';
PRODUCT_td_Array['time'] = '产品添加日期';
PRODUCT_td_Array['edit_time'] = '最后修改日期';

function show_pro_detail(self , id , colspan)
{
	var thisTR = self.parentNode.parentNode;
	var tab = thisTR.parentNode;
	self.show = (self.show == true) ? false : true;
	
	if (!self.show)
	{
		tab.removeChild(thisTR.nextSibling);
	}else{
		var tr = document.createElement('tr');
		tab.insertBefore(tr , thisTR.nextSibling);
		
		var td = document.createElement('td');
		tr.appendChild(td);
		td.colSpan = colspan;
		td.style.padding = '0.5em';
		td.innerHTML = '<div style="text-align:center;padding:2em 0">产品详细信息正在加载中...</div>';
		
		//缓存到页面数组中
		if (PRODUCT_DETAIL_Array.toString().indexOf(id) == -1)
		{
			var POP = new AJAXRequest;
			POP.method = 'get';
			POP.url = './?open=product&action=detail&id=' + id;
			POP.callback = function(info)
			{
				var json = info.responseText;
				if (json)
				{
					json = eval('(' + json + ')');
					PRODUCT_DETAIL_Array.push(Array(id , json));
					makeTab(td , json);
				}
				
			};
			POP.send();
		}else{
			for (i = 0 ; i < PRODUCT_DETAIL_Array.length ; i++)
			{
				if (PRODUCT_DETAIL_Array[i][0] == id)
				{
					json = PRODUCT_DETAIL_Array[i][1];
					break;
				}
			}
			
			makeTab(td , json);
		}
	}
}

function makeTab(TD , json)
{
	TD.innerHTML = '';
	var table = document.createElement('table');
	TD.appendChild(table);
	table.width = '100%';
	table.border = 0;
	table.cellPadding = 0;
	table.cellSpacing = '1';
	
	var tbody = document.createElement('tbody');
	table.appendChild(tbody);
	
	i = 0;
	for (key in json)
	{
		if (i % 2 == 0)
		{
			var tr = document.createElement('tr');
			tbody.appendChild(tr);
		}
		
		var td = document.createElement('td');
		tr.appendChild(td);
		td.align = 'right';
		td.width = '10%';
		td.innerHTML = PRODUCT_td_Array[key];
		
		var td = document.createElement('td');
		tr.appendChild(td);
		td.innerHTML = json[key];
		
		i++;
	}
	
	if (i %2 == 1)
	{
		var td = document.createElement('td');
		tr.appendChild(td);
		var td = document.createElement('td');
		tr.appendChild(td);
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
				document.getElementById(INTbid).innerHTML = '人民币 ' + info[0] + ' &nbsp; 美元 ' + info[1];
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
		//TODO 此处公式 我怀疑是  (进货价 / (国际报价 * 汇率)) * 100
		document.getElementById(id).innerHTML = STRING.sprintf('%.2f' , infml / weight / INTbid);
	}
}