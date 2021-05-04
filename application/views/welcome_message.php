<!DOCTYPE html>
<head>
  <title>Pusher Test</title>

  <form id="form" action="<?= base_url('index.php/welcome/process') ?>" mothod="post">
	<input type="text" name="pesan" >
	<button type="submit" name="submit">submit</button>
  </form>

  <div id="pesan">
  
  </div>
  
  <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script type="text/javascript">
	$('#form').submit(function(e){
		e.preventDefault();

		$.ajax({
			url : $(this).attr('action'),
			type: 'post',
			data: new FormData($(this)[0]),
			contentType:false,
			processData:false,
			success: function(data){}
		})
	})

    Pusher.logToConsole = true;

    var pusher = new Pusher('857ce610eb0b8d14bdf5', {
      cluster: 'ap1'
    });

    var channel = pusher.subscribe('notifikasi');
    channel.bind('my-event', function(data) {
		$('#pesan').append('<strong>'+data.pesan+'</strong></br>');
    });
  </script>
</head>
