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
		fd.append('post',rrr);
		console.log(uname);
		
			$.ajax({
              url: 'newpost.php',
              type: 'POST',
              data: fd,
              contentType: false,
              processData: false,
              success: function(response){
              	if (response[0]=='S') {
              		var id=response.slice(1);
              		alert('Post successfully published');
              		window.open('index.php','_self');
              	}
              	console.log(response);
              }
		}) 
	
})
