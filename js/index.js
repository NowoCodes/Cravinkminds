$(document).ready(function(){
	$('.subsubmit').click(function(e){
		event.preventDefault();
		var mail=$('.submail').val();

		$.post('engine/subscribe.php',{mail:mail},function(data, status) {
			if (data='SUCCESS') {
				alert('Thanks for subscribing!');
				mail=$('.submail').val('');
			}
		})
	})
})