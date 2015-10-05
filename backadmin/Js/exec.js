//页面运行完成后执行的文件

	window.onload = function() {
		
		var tr = document.getElementById('tab_show');
		if (!tr) return;
		
		tr = tr.getElementsByTagName('tr');
		
		for (i = 0 ; i < tr.length ; i++)
		{
			//当tr的class为NO_TAB_SHOW时候,那么不做任何操作
			if (tr[i].className != 'NO_TAB_SHOW')
			{
				tr[i].onmouseover = tab_over(tr[i]);
				
				tr[i].onmouseout = tab_out(tr[i]);
			}
		}
		
	};
	
	function tab_over(tr)
	{
		return function()
		{
			var td = tr.getElementsByTagName('td');
			for (i = 0 ; i < td.length ; i++)
			{
				td.item(i).style.backgroundColor = '#FFC';
			}
		}
	}

	function tab_out(tr)
	{
		return function()
		{
			var td = tr.getElementsByTagName('td');
			for (i = 0 ; i < td.length ; i++)
			{
				td.item(i).style.backgroundColor = '';
			}
		}
	}
