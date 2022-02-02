$('#form1').submit(function(e){
	e.preventDefault();

	var u_texto = $('#texto').val();
	var u_textoum = $('#texto1').val();

	// console.log(u_texto);
	$.ajax({
		url: 'inserir.php',
		method: 'POST',
		data: {texto: u_texto, texto1: u_textoum},
		dataType: 'json'
	}).done(function(result){
		$('#texto').val('');
		$('#texto1').val('');
		console.log(result);
		getComments();
	});
});

function getComments(){
	$.ajax({
		url: 'selecionar.php',
		method: 'GET',
		dataType: 'json'
	}).done(function(result){
		console.log(result);

		for (var i = 0; i < result.length; i++) {
			$('.box_comment').prepend("<div class='caixa_comentario'><h4>" + result[i].comentarista + "</h4><p>" + result[i].comentario + "</p></div>");
			continue;
		}
	});
}

getComments();