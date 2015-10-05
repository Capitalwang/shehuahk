function BtHide(id){var Div = document.getElementById(id);if(Div){Div.style.display="none"}}
function BtShow(id){var Div = document.getElementById(id);if(Div){Div.style.display="block"}}

function BtTabRemove(index,head,divs) {
	var tab_heads = document.getElementById(head);
	if (tab_heads) {
	var lis = tab_heads.getElementsByTagName("li"); var as = tab_heads.getElementsByTagName("a");
	for(var i=0;i<as.length;i++){lis[i].className = "";BtHide(divs+"_"+i);if (i==index) {lis[i].className = "current";}}
	BtShow(divs+"_"+index)}
}

function BtTabOn(head,divs){
	var tab_heads=document.getElementById(head);
	if (tab_heads) {
	BtTabRemove(0,head,divs);
	var alis=tab_heads.getElementsByTagName("a");
	for(var i=0;i<alis.length;i++) {
	alis[i].num=i;
	alis[i].onclick = function(){BtTabRemove(this.num,head,divs);this.blur();return false;}
	alis[i].onfocus = function(){BtTabRemove(this.num,head,divs)}}}
}

function BtZebraStrips(id,tag) {
	var ListId = document.getElementById(id);
	if(ListId){
	var tags  = ListId.getElementsByTagName(tag);
	for(var i=0;i<tags.length;i++) {
	tags[i].className   += " barry"+i%2;
	tags[i].onmouseover = function(){this.className += " hover"}
	tags[i].onmouseout  = function(){this.className = this.className.replace(" hover","")}}}
}

function BtPopload(showId){//蒙版生成div+iframe
	var h = Math.max(document.documentElement.scrollHeight,document.documentElement.clientHeight) + 'px';
	var w = document.documentElement.scrollWidth + 'px';
	var popCss = "background:#000;opacity:0.2;filter:alpha(opacity=20);position:absolute;left:0;top:0;overflow:hidden;"
	var exsit = document.getElementById("popBox");
	if (!exsit) {
		pop_Box = document.createElement("div");pop_Box.id = "popBox";
		document.getElementsByTagName("body")[0].appendChild(pop_Box);
		pop_Box.style.cssText = popCss;pop_Box.style.zIndex = "8000";
		pop_Box.style.height = h;pop_Box.style.width = w;
		
		pop_Iframe = document.createElement("iframe");pop_Iframe.id = "popIframe";
		document.getElementsByTagName("body")[0].appendChild(pop_Iframe);	
		pop_Iframe.style.cssText = popCss;pop_Iframe.style.zIndex = "7999";
		pop_Iframe.style.height = h;pop_Iframe.style.width = (parseInt(w)-5)+"px";
	}
	BtShow("popIframe");BtShow("popBox");BtShow(showId);
	pop_Win = document.getElementById(showId);
	pop_Win.style.position = "absolute";
	pop_Win.style.zIndex = "8001";
	pop_Win.style.top = document.documentElement.scrollTop+document.documentElement.clientHeight/2-pop_Win.offsetHeight/2+ 'px';
	pop_Win.style.left = (document.documentElement.clientWidth/2-pop_Win.offsetWidth/2) + 'px';
}
function BtPopShow(Bid,Did) { 
	var UploadBtn = document.getElementById(Bid);
	if (UploadBtn){UploadBtn.onclick = function() {BtPopload(Did);return false;}}	
}
function BtPopHide(Bid,Did) { 
	var UploadBtn = document.getElementById(Bid);
	if (UploadBtn){UploadBtn.onclick = function() {BtHide(Did);BtHide("popBox");BtHide("popIframe");return false;}}	
}