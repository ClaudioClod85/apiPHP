
//jQuery(document).ready(function() { });

function call(){
    dataToSend = '';

	console.log('START');

	$.ajax({

        url: 'http://localhost/apiPHP/main.php',
		contentType: 'application/json',
		cache: false,
		async: true,
		data: dataToSend,
		type: 'POST',
		success: function (data) {
			try {
                console.log(data);
                console.log('END-WS');
				console.log(data.status);

			} catch (ex) {  console.log('ERROR1'); }
		},
		error: function (data) {
			console.log(data);
			console.log('ERROR2');
			console.log(data.status);
		}
	})


}
