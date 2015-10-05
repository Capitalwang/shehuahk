function setMyFocus(ID,t){//主函数...
function getId(id) {return document.getElementById(id);}
function getTag(tag,obj){return (typeof obj=='object'?obj:getId(obj)).getElementsByTagName(tag);}
function opa(n){//图片淡入淡出函数
	var np_pictures = getTag('img',np_pic);
	var setfade=function(obj,o){
		if (document.all) obj.style.filter = "alpha(opacity=" + o + ")";
		else obj.style.opacity = (o / 100);
	};
	var getfade=function(obj){
		return (document.all)?((obj.filters.alpha)?obj.filters.alpha.opacity:false):((obj.style.opacity)?obj.style.opacity*100:false);
	}
	var show=function(){
		if(np_pictures[n].move) clearTimeout(np_pictures[n].move);
		if (o1 >= 100) return true;
		o1+=10;
		setfade(np_pictures[n],o1);
		np_pictures[n].move=setTimeout(show,5);
	};
	var hide=function(){
		if(np_pictures[N].move) clearTimeout(np_pictures[N].move);
		if (o2 <= 0) {np_pictures[N].style.display='none';return true;}
		o2-=10;
		setfade(np_pictures[N],o2);
		np_pictures[N].move=setTimeout(hide,5);
	};
	for(var i=0;i<np_pictures.length;i++){
		if(!getfade(np_pictures[i])) {setfade(np_pictures[i],0);np_pictures[i].style.display='none';}
		if(np_pictures[i].name=='out') var N=i;
	}
	if(!N&&n==0) {//开始载入...
		np_pictures[n].name='out';
		np_pictures[n].style.display='';
		var o1=getfade(np_pictures[n]);
		show();
		return true;
	}
	if(N==n) return true;
	np_pictures[N].name=''
	np_pictures[n].name='out';
	np_pictures[n].style.display='';
	var o1=getfade(np_pictures[n]);
	var o2=getfade(np_pictures[N]);
	hide();
	show();
}
function classNormal() {//数字标签样式清除
    var a = getTag('a',tit);
    for (var i = 0; i < a.length; i++) {
        a[i].className = '';
    }
}
function autoFocusChange() {//自动运行
    if (atuokey) return;
    var a = getTag('a',tit);
    for (var i = 0; i < a.length; i++) {
        if (a[i].className == 'current') {
            var currentNum = i;
        }
    }
	if(currentNum<a.length-1){
		opa(currentNum+1);
       	classNormal();
       	a[currentNum+1].className = 'current';
	}else if(currentNum==a.length-1){
		opa(0);
       	classNormal();
       	a[0].className = 'current';
	}
}
function focusChange() {//交互切换
    var a = getTag('a',tit);
    for (var i = 0; i < a.length; i++) {
		a[i].I=i;
		a[i].onmouseover = function(){
			opa(this.I);
        	classNormal();
        	a[this.I].className = 'current';
		}
	}
}
function init(){//初始化
	getId(ID).removeChild(getTag('div',ID)[0]);
	opa(0);
    getTag('a',tit)[0].className = 'current';
	getId(ID).onmouseover = function() {
        atuokey = true;
		clearInterval(auto);
    }
    getId(ID).onmouseout = function() {
        atuokey = false;
		auto=setInterval(autoFocusChange, T);
    }
}
var np_pic=getTag('div',ID)[1];
var tit=getTag('div',ID)[2];
var atuokey = '';
var auto='';
var T=t*1000;//每帧图片停留的时间，1000=1秒
init();
focusChange();
auto=setInterval(autoFocusChange, T);
}
function setAd(){
	setMyFocus('myFocus',3)
}
if(document.all) {
	window.attachEvent("onload", setAd);
} else {
	window.addEventListener("load", setAd, false);
}
var childCreate=false;

function Offset(e)
//取标签的绝对位置
{
	var t = e.offsetTop;
	var l = e.offsetLeft;
	var w = e.offsetWidth;
	var h = e.offsetHeight-2;

	while(e=e.offsetParent)
	{
		t+=e.offsetTop;
		l+=e.offsetLeft;
	}
	return {
		top : t,
		left : l,
		width : w,
		height : h
	}
}

function setTab(m,n){
 var tli=document.getElementById("menu"+m).getElementsByTagName("li");
 var mli=document.getElementById("main"+m).getElementsByTagName("ul");
 for(i=0;i<tli.length;i++){	  
  tli[i].className=i==n?"hover":"";
  mli[i].style.display=i==n?"block":"none";
 }
}

