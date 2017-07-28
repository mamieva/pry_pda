jQuery(document).ready(function() {


	$("#entrada").click(function(event) {
		/* Act on the event */
		event.preventDefault();
		$.ajax({
			url: 'class/entrada_ajax.php',
			type: 'GET',
			dataType: 'html',			
			cache: false,
			success: function(data,status){

				if(status = 'OK'){

					$("#contenedor-interno").html(data);
				}


			}
		})
		//$("#menu-toogle").click();
		
	});


	$("#salida").click(function(event) {
		/* Act on the event */
		event.preventDefault();

		$.ajax({
			url: 'class/salida_ajax.php',
			type: 'POST',
			dataType: 'html',
			cache: false,
			success: function(data,status){

				if(status = 'OK'){


					$("#contenedor-interno").html("");

					$("#contenedor-interno").html(data);
				}
			}
		})
		
	});


	$("#usuarios").click(function(event) {
		/* Act on the event */
		event.preventDefault();

		$.ajax({
			url: 'class/usuarios_ajax.php',
			type: 'POST',
			dataType: 'html',
			cache: false,
			success: function(data,status){

				if(status = 'OK'){


					$("#contenedor-interno").html("");

					$("#contenedor-interno").html(data);
				}
			}
		});

		$.ajax({
			url: 'class/obtener_usuarios_tipos_ajax.php',
			type: 'POST',
			dataType: 'html',
			cache: false,
			success: function(data,status){

				if(status = 'OK'){


					$("#usuarios_tipos_id").html("");

					$("#usuarios_tipos_id").html(data);
				}
			}
		})


		
	});



	
	
});



/*$("#proveedor_id").change(function(event) {
								
		event.preventDefault();

		$.ajax({
			url: 'class/obtener_marca_ajax.php',
			type: 'POST',
			dataType: 'html',
			data: {proveedores_id: $("#proveedor_id").val()},

			success: function(data,status){
				if (status = "OK"){
				$("#marca_id").html("");
				$("#marca_id").html(data);
				}
			}
		})
		
	});*/