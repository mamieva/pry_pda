$("#proveedor_id").on("change", function(event) {

	event.preventDefault();
	/* Act on the event */

	$.ajax({
			url: "class/obtener_marca_ajax.php",
			type: "POST",
			dataType: "html",
			data: {proveedores_id: $("#proveedor_id").val()},

			success: function(data,status){
				if (status = "OK"){
				$("#marca_id").html("");
				$("#marca_id").html(data);
				}
			}
		})
	});
//------
$("#marca_id").on("change", function(event) {
	event.preventDefault();
	/* Act on the event */



	$.ajax({
			url: "class/obtener_productos_ajax.php",
			type: "POST",
			dataType: "html",
			data: {marca_id: $("#marca_id").val()},

			success: function(data,status){
				if (status = "OK"){
				$("#producto_id").html("");
				$("#producto_id").html(data);
				}
			}
		})
	});

$("input:radio[name=check]").change(function(event){
    event.preventDefault();
    $("#cajas").attr("readonly",false);
    $("#unidades").attr("readonly",false);                                        
    $("#peso").attr("readonly",false);

    if ($("input:radio[name=check]:checked").val() == "peso")
        {
            $("#cajas").attr("readonly","readonly");
            $("#unidades").attr("readonly","readonly");
        }
    if ($("input:radio[name=check]:checked").val() == "cajas")
        {
            $("#peso").attr("readonly","readonly");
            $("#unidades").attr("readonly","readonly");
        }
    if ($("input:radio[name=check]:checked").val() == "unidades")
        {
            $("#cajas").attr("readonly","readonly");
            $("#peso").attr("readonly","readonly");
        }

});

$("#peso").keyup(function(event){

    event.preventDefault();
    $("#peso").change();

    $.ajax({
            url: "class/obtener_cantidades_ajax.php",
            type: "POST",
            dataType: "json",
            data: {productos_id: $("#producto_id").val() },

            success: function(data,status){
                if (status = "OK"){
                
                    $.each(data, function (key, data) {

                        $("#unidades").val( $("#peso").val() / data.peso_unidad);

                        $("#unidades").change();

                        $("#cajas").val($("#unidades").val() /data.cantidad_unidades_caja);

                        $("#cajas").change();

                        $("#peso").val($("#unidades").val() * data.peso_unidad);

                        $("#peso").change();

                        $("#precio_unidad").val(data.precio_costo);

                        $("#precio_tipo").val(data.tipo_precio);
                        
                        //alert(data.nombre);
                        
                    });
                }
            }
        });

    
});

$("#cajas").keyup(function(event){

    event.preventDefault();
    $("#cajas").change();

    $.ajax({
            url: "class/obtener_cantidades_ajax.php",
            type: "POST",
            dataType: "json",
            data: {productos_id: $("#producto_id").val() },

            success: function(data,status){
                if (status = "OK"){
                
                    $.each(data, function (key, data) {

                        $("#unidades").val( $("#cajas").val() * data.cantidad_unidades_caja);

                        $("#unidades").change();

                        $("#cajas").val($("#unidades").val() /data.cantidad_unidades_caja);

                        $("#cajas").change();

                        $("#peso").val($("#unidades").val() * data.peso_unidad);

                        $("#peso").change();

                        $("#precio_unidad").val(data.precio_costo);

                        $("#precio_tipo").val(data.tipo_precio);
                        
                        //alert(data.nombre);
                        
                    });
                }
            }
        });

    
});
$("#unidades").keyup(function(event){

    event.preventDefault();
    $("#unidades").change();

    $.ajax({
            url: "class/obtener_cantidades_ajax.php",
            type: "POST",
            dataType: "json",
            data: {productos_id: $("#producto_id").val() },

            success: function(data,status){
                if (status = "OK"){
                
                    $.each(data, function (key, data) {

                        $("#cajas").val($("#unidades").val() /data.cantidad_unidades_caja);

                        $("#cajas").change();

                        $("#peso").val($("#unidades").val() * data.peso_unidad);

                        $("#peso").change();

                        $("#precio_unidad").val(data.precio_costo);

                        $("#precio_tipo").val(data.tipo_precio);
                        
                        //alert(data.nombre);
                        
                    });
                }
            }
        });

    
});


$("#submit_entrada").click(function(event) {
    event.preventDefault();

    var dataString = $('#form_entrada').serialize();

    $.ajax({
            url: "class/insertar_entrada_ajax.php",
            type: "POST",
            dataType: "html",
            data: dataString,

            success: function(data,status){
                if (status = "OK"){

                    alert("OK");
                    
                    $("#tabla").html(data);



                }
                else{  console.log(data+2);
}

                        
                    }
                });
            });

