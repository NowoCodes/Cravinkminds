$(document).ready(function(){



(function(){window.$clamp=function(c,d){function s(a,b){n.getComputedStyle||(n.getComputedStyle=function(a,b){this.el=a;this.getPropertyValue=function(b){var c=/(\-([a-z]){1})/g;"float"==b&&(b="styleFloat");c.test(b)&&(b=b.replace(c,function(a,b,c){return c.toUpperCase()}));return a.currentStyle&&a.currentStyle[b]?a.currentStyle[b]:null};return this});return n.getComputedStyle(a,null).getPropertyValue(b)}function t(a){a=a||c.clientHeight;var b=u(c);return Math.max(Math.floor(a/b),0)}function x(a){return u(c)*
a}function u(a){var b=s(a,"line-height");"normal"==b&&(b=1.2*parseInt(s(a,"font-size")));return parseInt(b)}function l(a){if(a.lastChild.children&&0<a.lastChild.children.length)return l(Array.prototype.slice.call(a.children).pop());if(a.lastChild&&a.lastChild.nodeValue&&""!=a.lastChild.nodeValue&&a.lastChild.nodeValue!=b.truncationChar)return a.lastChild;a.lastChild.parentNode.removeChild(a.lastChild);return l(c)}function p(a,d){if(d){var e=a.nodeValue.replace(b.truncationChar,"");f||(h=0<k.length?
k.shift():"",f=e.split(h));1<f.length?(q=f.pop(),r(a,f.join(h))):f=null;m&&(a.nodeValue=a.nodeValue.replace(b.truncationChar,""),c.innerHTML=a.nodeValue+" "+m.innerHTML+b.truncationChar);if(f){if(c.clientHeight<=d)if(0<=k.length&&""!=h)r(a,f.join(h)+h+q),f=null;else return c.innerHTML}else""==h&&(r(a,""),a=l(c),k=b.splitOnChars.slice(0),h=k[0],q=f=null);if(b.animate)setTimeout(function(){p(a,d)},!0===b.animate?10:b.animate);else return p(a,d)}}function r(a,c){a.nodeValue=c+b.truncationChar}d=d||{};
var n=window,b={clamp:d.clamp||2,useNativeClamp:"undefined"!=typeof d.useNativeClamp?d.useNativeClamp:!0,splitOnChars:d.splitOnChars||[".","-","\u2013","\u2014"," "],animate:d.animate||!1,truncationChar:d.truncationChar||"\u2026",truncationHTML:d.truncationHTML},e=c.style,y=c.innerHTML,z="undefined"!=typeof c.style.webkitLineClamp,g=b.clamp,v=g.indexOf&&(-1<g.indexOf("px")||-1<g.indexOf("em")),m;b.truncationHTML&&(m=document.createElement("span"),m.innerHTML=b.truncationHTML);var k=b.splitOnChars.slice(0),
h=k[0],f,q;"auto"==g?g=t():v&&(g=t(parseInt(g)));var w;z&&b.useNativeClamp?(e.overflow="hidden",e.textOverflow="ellipsis",e.webkitBoxOrient="vertical",e.display="-webkit-box",e.webkitLineClamp=g,v&&(e.height=b.clamp+"px")):(e=x(g),e<=c.clientHeight&&(w=p(l(c),e)));return{original:y,clamped:w}}})();

	for (var i = 0; i<$('.text-muted').length; i++) {
		//$('.text-muted').eq(i).children().eq(1).addClass('elipss');
		//$('.text-muted').eq(i).children().not('.elipss').css('display','none');
		var p3 = $('.text-muted').eq(i).get(0);
		$clamp(p3, {clamp: '50px'});
	}

	for (var i = 0; i<$('.text-mutedd').length; i++) {
		//$('.text-muted').eq(i).children().eq(1).addClass('elipss');
		//$('.text-muted').eq(i).children().not('.elipss').css('display','none');
		var p3 = $('.text-mutedd').eq(i).get(0);
		//$clamp(p3, {clamp: '100px'});
		$clamp(p3, {clamp: '200px'});
	}






$('.for').click(function(e){
	event.preventDefault();
	var query=$('.spost').val();
	$('.ux').load('spost.php',{query:query});	
})
$('.spost').keyup(function(e){
	event.preventDefault();

	var query=$(this).val();
	/*$.post('spost.php',{query:query}, function(data,status) {
		$('.ux').html(data);
	});*/
	$('.ux').load('spost.php',{query:query});	
})


$('.left').click(function(e){
	event.preventDefault();
	var url=window.location.href;
	var pos=url.lastIndexOf('=')+1;
	var pos1=url.lastIndexOf('=');
	var n= url.slice(pos);
	if (pos==0){
		window.open(url,'_self');	
	}
	else{
	if (n==1){
		window.open('post.php?pg=1','_self');
	}
	else{
		nn=parseInt(n)-1;
		window.open('post.php?pg='+nn,'_self');
	};

	}

})

$('.right').click(function(e){
	event.preventDefault();
	var url=window.location.href;
	var pos=url.lastIndexOf('=')+1;
	var pos1=url.lastIndexOf('=');
	var n= url.slice(pos);
	var no=$(this).attr('lim');
	if (pos==0){

			if (no==1) {
				window.open(url,'_self');
				}
				else{
					window.open('post.php?pg=2','_self');
				}	
		}
	else{
		if (n==no){
		window.open('post.php?pg='+no,'_self');
	}
		
				
		else{
			nn=parseInt(n)+1;
			window.open('post.php?pg='+nn,'_self');
		}
	}
	
	
})

$('.leftsearch').click(function(e){
	event.preventDefault();
	var url=window.location.href;
	var pos=url.lastIndexOf('=')+1;
	var pos2=url.lastIndexOf('=')-1;
	var pos1=url.slice(pos2,pos2+1);
	var url1=url.lastIndexOf('=');
	var n= url.slice(pos);
	if (pos==0){
		window.open(url,'_self');	
	}else{
	if (pos1=='g'){
		if (n==1||n==''){
			window.open(url,'_self');
		}
		else{
			nn=n-1;

			nurl=url.slice(0,url1);
			window.open(nurl+'='+nn,'_self');
		}}
	
	else{
		window.open(url,'_self');

	}

	}

})

$('.rightsearch').click(function(e){
	event.preventDefault();
	var url=window.location.href;
	var pos=url.lastIndexOf('=')+1;
	var pos2=url.lastIndexOf('=')-1;
	var pos1=url.slice(pos2,pos2+1);
	var url1=url.lastIndexOf('=');
	var n= url.slice(pos);
	var no=$(this).attr('lim');
	if (pos==0){
		window.open(url,'_self');
	}
	else{
		if (pos1=='g'){
			if (n==no){
				window.open(url,'_self');
			}
			else{
				nn=parseInt(n)+1;
				nurl=url.slice(0,url1);
				window.open(nurl+'='+nn,'_self');
			}
		}
		else{
			window.open(url,'_self');
		}
	}
		
})








})


$(document).ready(function(){
	$('.commbut').click(function(e){
		event.preventDefault();
		var comment=$('.ment').val();
		var id = $('.ment').attr('iq');
		var uname = $('.ment').attr('uname');
		if(comment!=''){
			$.post('comment.php',{id:id,cravinkuname:uname,comment:comment},function(data,status){
			if (data=='Success'){
				$('.ment').val(' ');
				//$('.ment').load(window.location.href + " .ment");
				$('.post-comments').load(window.location.href + " .post-comments");
			}
				
			});
		}
	})
	
})


		
