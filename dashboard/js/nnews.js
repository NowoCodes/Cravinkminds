$(document).on("click",'.ednnsub', function(){
		var imgdata=$('.adnpic').prop('files')[0];
		var uname = $(this).parents('.rpost').attr('uname');
		var fd= new FormData();
		var hd= $('.hd').val();
		var rrr = CKEDITOR.instances['editor'].getData();
		
		if(imgdata){
	    	fd.append('file',imgdata);	    
		}
		fd.append('uname',uname);
		fd.append('title',hd);
		fd.append('news',rrr);
		console.log(uname);
		
			$.ajax({
              url: 'newnews.php',
              type: 'POST',
              data: fd,
              contentType: false,
              processData: false,
              success: function(response){
              	if (response[0]=='S') {
              		var id=response.slice(1);
              		alert('News successfully published');
              		window.open('index.php','_self');
              	}
              	console.log(response);
              }
		}) 
	
})

/*

$(document).on("click",'.ednnsub', function(){
		var imgdata=$('.adnpic').prop('files')[0];
		var uname = $(this).parents('.rpost').attr('uname');
		var fd= new FormData();
		var hd= $('.hd').val();
		var rrr = CKEDITOR.instances['editor'].getData();

		fd.append('file',imgdata);
		fd.append('uname',uname);
		fd.append('title',hd);
		fd.append('news',rrr);

		if (imgdata) {
			$.ajax({
              url: 'newnews.php',
              type: 'POST',
              data: fd,
              contentType: false,
              processData: false,
              success: function(response){
              	if (response[0]=='S') {
              		var id=response.slice(1);
              		alert('News successfully published');
              		window.open('index.php','_self');
              	}
              	console.log(response);
              }
		}) 
		}
	
})
*/