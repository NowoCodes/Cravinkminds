
$(document).ready(function(){
(function(){window.$clamp=function(c,d){function s(a,b){n.getComputedStyle||(n.getComputedStyle=function(a,b){this.el=a;this.getPropertyValue=function(b){var c=/(\-([a-z]){1})/g;"float"==b&&(b="styleFloat");c.test(b)&&(b=b.replace(c,function(a,b,c){return c.toUpperCase()}));return a.currentStyle&&a.currentStyle[b]?a.currentStyle[b]:null};return this});return n.getComputedStyle(a,null).getPropertyValue(b)}function t(a){a=a||c.clientHeight;var b=u(c);return Math.max(Math.floor(a/b),0)}function x(a){return u(c)*
a}function u(a){var b=s(a,"line-height");"normal"==b&&(b=1.2*parseInt(s(a,"font-size")));return parseInt(b)}function l(a){if(a.lastChild.children&&0<a.lastChild.children.length)return l(Array.prototype.slice.call(a.children).pop());if(a.lastChild&&a.lastChild.nodeValue&&""!=a.lastChild.nodeValue&&a.lastChild.nodeValue!=b.truncationChar)return a.lastChild;a.lastChild.parentNode.removeChild(a.lastChild);return l(c)}function p(a,d){if(d){var e=a.nodeValue.replace(b.truncationChar,"");f||(h=0<k.length?
k.shift():"",f=e.split(h));1<f.length?(q=f.pop(),r(a,f.join(h))):f=null;m&&(a.nodeValue=a.nodeValue.replace(b.truncationChar,""),c.innerHTML=a.nodeValue+" "+m.innerHTML+b.truncationChar);if(f){if(c.clientHeight<=d)if(0<=k.length&&""!=h)r(a,f.join(h)+h+q),f=null;else return c.innerHTML}else""==h&&(r(a,""),a=l(c),k=b.splitOnChars.slice(0),h=k[0],q=f=null);if(b.animate)setTimeout(function(){p(a,d)},!0===b.animate?10:b.animate);else return p(a,d)}}function r(a,c){a.nodeValue=c+b.truncationChar}d=d||{};
var n=window,b={clamp:d.clamp||2,useNativeClamp:"undefined"!=typeof d.useNativeClamp?d.useNativeClamp:!0,splitOnChars:d.splitOnChars||[".","-","\u2013","\u2014"," "],animate:d.animate||!1,truncationChar:d.truncationChar||"\u2026",truncationHTML:d.truncationHTML},e=c.style,y=c.innerHTML,z="undefined"!=typeof c.style.webkitLineClamp,g=b.clamp,v=g.indexOf&&(-1<g.indexOf("px")||-1<g.indexOf("em")),m;b.truncationHTML&&(m=document.createElement("span"),m.innerHTML=b.truncationHTML);var k=b.splitOnChars.slice(0),
h=k[0],f,q;"auto"==g?g=t():v&&(g=t(parseInt(g)));var w;z&&b.useNativeClamp?(e.overflow="hidden",e.textOverflow="ellipsis",e.webkitBoxOrient="vertical",e.display="-webkit-box",e.webkitLineClamp=g,v&&(e.height=b.clamp+"px")):(e=x(g),e<=c.clientHeight&&(w=p(l(c),e)));return{original:y,clamped:w}}})();
	
	$('#actual-btn').change(function(){
		var nnnn=$(this).prop('files')[0].name;
		$('#file-chosen').text('Uploading...');
		var nni=$(this).prop('files')[0];
		var uname = $(this).parents('.profile').attr('username');
		var former=$('.itt').attr('src');
		var fd= new FormData();
		fd.append('file',nni);
		fd.append('uname',uname);
		fd.append('former',former);

		if (nni) {
			$.ajax({
              url: 'chprofimg.php',
              type: 'post',
              data: fd,
              contentType: false,
              processData: false,
              success: function(response){
              	if (response=='SUCCESS') {
              		window.open(window.location.href,'_self');
              	}console.log(response);
              }
		}) 
		}
	})
	$('.drop').click(function(){
		$('.men').toggle();
	})

	var w = $(window).width();
	var h = $(window).height();

	var ww = $('.container').width();


	var mw= (w-ww)/2;

	$('.container').css('marginLeft',mw+'px').css('display','inline-flex');
	


	$('.details').click(function(){
		$('.editdetails').fadeIn(300);
	})

	$('.cancel').click(function(){
		$('.editdetails').fadeOut(300);
	})


	const lent= $('.ps').length;
	for (i=0;i<lent;i++){
		var conth= $('.ps').eq(i).height()
		var consh=$('.pst').eq(i).html().replace(/<p/gi,'<span');
		var consh=consh.replace(/<\/p/gi,'</span');
		$('.ps').eq(i).find('.pst').html(consh);
			//.replace(/\W*\s(\S)*$/, '...'));

		var p3 = $('.pst').eq(i).get(0);
		$clamp(p3, {clamp: '100px'});
		
	}

	$('.ge').click(function(){
		$(this).parent().find('.full').fadeIn(100);
	})
	$('.delb').click(function(){
		$('.full').fadeOut(100);
	})

	$('.delpos').click(function(){
	var id = $(this).attr('id');
	var uname = $(this).attr('uname');
	if (confirm('Are you sure you want to delete this post')){
		$.post('deletepost.php',{id:id,uname:uname},function(data, status){
			if (data=='SUCCESS') {
				var where = window.location.href;

				window.open(where,'_self');
			}
		})
	};
	})


	$('.delns').click(function(){
	var id = $(this).attr('id');
	var uname = $(this).attr('uname');
	if (confirm('Are you sure you want to delete this post')){
		$.post('deletenews.php',{id:id,uname:uname},function(data, status){
			if (data=='SUCCESS') {
				var where = window.location.href;

				window.open(where,'_self');
			}
		})
	};
	})


	$('.edpost').click(function(){
		var href = $(this).attr('href');
		window.open(href,'_self');
	})

	CKEDITOR.replace( 'editor' );

	$('.edsub').click(function(){
  		var rrr = CKEDITOR.instances['editor'].getData();
		var tit= $('.hd').val();
		var uname= $(this).parent().attr('uname');
		var id= $(this).parent().attr('id');

		$.post('savepost.php',{id:id,uname:uname,rrr:rrr,tit:tit},function(data, status){
			if (data=='SUCCESS') {
				var where = window.open('index.php','_self');
                alert('Post edit successfully');
				window.open('index.php','_self');
			}
			console.log(data);
		})
	})

	$('.ednsub').click(function(){
  		var rrr = CKEDITOR.instances['editor'].getData();
		var tit= $('.hd').val();
		var uname= $(this).parent().attr('uname');
		var id= $(this).parent().attr('id');

		$.post('savenews.php',{id:id,uname:uname,rrr:rrr,tit:tit},function(data, status){
			if (data=='SUCCESS') {
				var where = window.open('index.php','_self');
                alert('News edit successfully');
				window.open('index.php','_self');
			}
			console.log(data);
		})
	})

	$('.rmpic').click(function(){
		var id = $(this).parents('.rpost').attr('id');
		var uname = $(this).parents('.rpost').attr('uname');
		if (confirm('This cannot be undone')) {
			$.post('deletepicture.php',{id:id,uname:uname},function (data,status){
				if (data=='SUCCESS') {
				var where = window.location.href;

				$('.imgu').load(window.location.href + " .imgu");
			}
			})
			
		}
	})

	$('.imup').click(function(){
		var imgdata=$('.adpic').prop('files')[0];
		var id = $(this).parents('.rpost').attr('id');
		var uname = $(this).parents('.rpost').attr('uname');
		var fd= new FormData();
		fd.append('file',imgdata);
		fd.append('id',id);
		fd.append('uname',uname);

		if (imgdata) {
			$.ajax({
              url: 'uploadimage.php',
              type: 'post',
              data: fd,
              contentType: false,
              processData: false,
              success: function(response){
              	if (response[0]=='S') {
              		var l = response.length
              		var ina=response.slice(1);
              		$('.imgu').load(window.location.href + " .imgu");

              		//$('.imgu').html('<button style="margin-bottom: 10px;" class="chpic">Change Picture </button> <button class="rmpic"> Remove Picture </button> <br> <img src="../img/posts/'+ina+'"> <br>');
              	}
              }
		}) 
		}
		

	})
	$('.back').click(function(){
		window.open('index.php','_self');
	})

})


$(window).resize(function(){
	var w = $(window).width();
	var h = $(window).height();

	var ww = $('.container').width();

	var mw= (w-ww)/2;

	$('.container').css('marginLeft',mw+'px');
})

$(document).on("click",'.rmpic', function(){
		var id = $(this).parents('.rpost').attr('id');
		var uname = $(this).parents('.rpost').attr('uname');
		if (confirm('This cannot be undone')) {
			$.post('deletepicture.php',{id:id,uname:uname},function (data,status){
				if (data=='SUCCESS') {
				var where = window.location.href;

				$('.imgu').load(window.location.href + " .imgu");
			}
			})
			
		}


})


$(document).on("click",'.imup', function(){
		var imgdata=$('.adpic').prop('files')[0];
		var id = $(this).parents('.rpost').attr('id');
		var uname = $(this).parents('.rpost').attr('uname');
		var fd= new FormData();
		fd.append('file',imgdata);
		fd.append('id',id);
		fd.append('uname',uname);

		if (imgdata) {
			$.ajax({
              url: 'uploadimage.php',
              type: 'post',
              data: fd,
              contentType: false,
              processData: false,
              success: function(response){
              	if (response[0]=='S') {
              		var l = response.length
              		var ina=response.slice(1);
              		$('.imgu').load(window.location.href + " .imgu");
              	}
              }
		}) 
		}
	


})

$(document).on("click",'.imch', function(){
		var imgdata=$('.chpic').prop('files')[0];
		var id = $(this).parents('.rpost').attr('id');
		var uname = $(this).parents('.rpost').attr('uname');
		var fd= new FormData();
		var im= $('.im').attr('src');
		
		fd.append('file',imgdata);
		fd.append('id',id);
		fd.append('uname',uname);
		fd.append('former',im);

		if (imgdata) {
			$.ajax({
              url: 'changeimage.php',
              type: 'post',
              data: fd,
              contentType: false,
              processData: false,
              success: function(response){
              	if (response[0]=='S') {
              		var l = response.length
              		var ina=response.slice(1);
              		$('.imgu').load(window.location.href + " .imgu");
              	}
              }
		}) 
		}
	


})


$(document).on("click",'.rmnpic', function(){
		var id = $(this).parents('.rpost').attr('id');
		var uname = $(this).parents('.rpost').attr('uname');
		if (confirm('This cannot be undone')) {
			$.post('deletenpicture.php',{id:id,uname:uname},function (data,status){
				if (data=='SUCCESS') {
				var where = window.location.href;

				$('.imgu').load(window.location.href + " .imgu");
			}
			})
			
		}


})


$(document).on("click",'.imnup', function(){
		var imgdata=$('.adnpic').prop('files')[0];
		var id = $(this).parents('.rpost').attr('id');
		var uname = $(this).parents('.rpost').attr('uname');
		var fd= new FormData();
		fd.append('file',imgdata);
		fd.append('id',id);
		fd.append('uname',uname);

		if (imgdata) {
			$.ajax({
              url: 'uploadnimage.php',
              type: 'post',
              data: fd,
              contentType: false,
              processData: false,
              success: function(response){
              	if (response[0]=='S') {
              		var l = response.length
              		var ina=response.slice(1);
              		$('.imgu').load(window.location.href + " .imgu");
              	}
              }
		}) 
		}
	


})

$(document).on("click",'.imnch', function(){
		var imgdata=$('.chnpic').prop('files')[0];
		var id = $(this).parents('.rpost').attr('id');
		var uname = $(this).parents('.rpost').attr('uname');
		var fd= new FormData();
		var im= $('.nim').attr('src');
		
		fd.append('file',imgdata);
		fd.append('id',id);
		fd.append('uname',uname);
		fd.append('former',im);

		if (imgdata) {
			$.ajax({
              url: 'changenimage.php',
              type: 'post',
              data: fd,
              contentType: false,
              processData: false,
              success: function(response){
              	if (response=='SUCCESS') {
              		$('.imgu').load(window.location.href + " .imgu");
              	}
              	console.log(response);
              }
		}) 
		}
	


})


$(document).on("click",'.submit', function(){
		var fname = $('.fname').val();
		var uname = $('.uname').val();
		var email = $('.email').val();
		var address = $('.address').val();
		var phone = $('.phone').val();
		var country = $('.country').val();

		var fd= new FormData();
		fd.append('fname',fname);
		fd.append('uname',uname);
		fd.append('email',email);
		fd.append('address',address);
		fd.append('phone',phone);
		fd.append('country',country);
			
			$.ajax({
              url: 'editdetails.php',
              type: 'post',
              data: fd,
              contentType: false,
              processData: false,
              success: function(response){
              	if (response=='SUCCESS') {
    				window.open('../logout.php','_self');          		
                  	}
              	console.log(response);
              }
		}) 
		
	


})

