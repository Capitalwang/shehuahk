<?php
/**
 * @name Goto_diploma
 * 例子	{Goto_diploma diploma='' weight='' NO='' show=''}
 */
function smarty_function_Goto_diploma($params)
{
	switch ($params['diploma'])
	{
		case 'GIA':
			return '<a href="http://www2.gia.edu/reportcheck/index.cfm?fuseaction=home.showReportVerification&reportno='.$params['NO'].'&weight='.$params['weight'].'"  target="diploma'.$params['NO'].'">'.$params['show'].'</a>';
		break;
		case 'IGI':
			return '<a href="http://www.igiworldwide.com/igi_online/client/Default.aspx?txtPrintNo='.$params['NO'].'&txtWeight='.$params['weight'].'&__VIEWSTATE=dDwtMjgyNDUxMjQ2O3Q8O2w8aTwyPjs%2BO2w8dDw7bDxpPDE%2BO2k8MTc%2BO2k8MTk%2BO2k8MjU%2BOz47bDx0PHA8bDxpbm5lcmh0bWw7PjtsPCZuYnNwXDsmbmJzcFw7UGxlYXNlIG5vdGUgdGhhdCBvdXIgb25saW5lIGRhdGEgcmV0cmlldmFsIHNlcnZpY2Ugc2hvd3Mgb25seSByZXN1bHRzIGZvciBkaWFtb25kIHJlcG9ydHMgaXNzdWVkIGFmdGVyIEp1bmUgJm5ic3BcOyZuYnNwXDsyMDA0LiBPdXIgcmVwb3J0IGRhdGFiYXNlIGlzIHVwZGF0ZWQgZGFpbHkgdG8gZW5zdXJlIGl0cyBhY2N1cmFjeS5cPGJyL1w%2BXDxzdHJvbmcgXD4mbmJzcFw7Jm5ic3BcO0hvd2V2ZXIsIG9jY2FzaW9uYWwgZGlzY3JlcGFuY2llcyBjYW4gb2NjdXIuIEluIHRoYXQgY2FzZSBwbGVhc2UgY29udGFjdFw8YSBocmVmID0gImh0dHA6Ly93d3cuaWdpd29ybGR3aWRlLmNvbS9lbi9jb3JfY29udGEuaHRtIlw%2BIGFueSBJR0kgbGFiIFw8L2FcPiBcPHN0cm9uZ1w%2Bb3IgJm5ic3BcOyZuYnNwXDtlbWFpbFw8L3N0cm9uZ1w%2BJm5ic3BcOyZuYnNwXDtcPGEgaHJlZj0ibWFpbHRvOmluZm9AaWdpd29ybGR3aWRlLmNvbSIgc3R5bGU9ImZvbnQtd2VpZ2h0OmJvbGRcOyJcPmluZm9AaWdpd29ybGR3aWRlLmNvbVw8L2FcPlw8L3N0cm9uZ1w%2BOz4%2BOzs%2BO3Q8cDxsPFZpc2libGU7PjtsPG88Zj47Pj47Oz47dDxAMDxwPHA8bDxWaXNpYmxlOz47bDxvPGY%2BOz4%2BOz47Ozs7Ozs7Ozs7Pjs7Pjt0PHA8bDxWaXNpYmxlOz47bDxvPGY%2BOz4%2BOzs%2BOz4%2BOz4%2BOz4%3D"  target="diploma'.$params['NO'].'">'.$params['show'].'</a>';
		break;
		default: return $params['show'];
	}
}
?>