//添加到购物车
function add_from(name , self , action)
{
	var N = document.getElementsByName(name);
	var j = 0;
	for (i=0 ; i < N.length ; i++)
	{
		if (N[i].checked) j++;
	}
	
	if (j == 0)
	{
		alert('请选择要导入的用户');
		return false;
	}else{
		if (action) self.form.action = action;
		self.form.submit();
	}
}

function $(id)
{
	return document.getElementById(id);
}

function read_exec(e , action , All)
{
	var catalog = $('catalog');
	var start = parseFloat($('start').value);
	var stops = parseFloat($('stops').value);
	var msg = document.getElementById('msg');
	
	if (start && stops)
	{
		e.disabled = true;
		msg.style.display = '';
		msg.getElementsByTagName('td').item(0).innerHTML = '<p>正在准备 , 请等待 ... </p>';
		
		msg.getElementsByTagName('td').item(0).innerHTML += '正在执行<br />';
		var exec = new AJAXRequest;
		exec.method = 'GET';
		exec.url = './?open=import&action=' + action + '&start=' + start + '&stop=' + stops + '&all=' + All;
		exec.callback = function(dbs)
		{
			msg.getElementsByTagName('td').item(0).innerHTML += dbs.responseText + '<br />';
		};
		exec.send();
	}else{
		alert('请填写正确的钻石重量');
	}
}