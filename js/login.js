
	$(document).ready(function() {

    $('#submit').click(function(){

        var dataString = $('#form').serialize();

        //alert('Datos serializados: '+dataString);

        $.ajax({
            
            url: "class/login_ajax.php",
            type: "POST",
            data: dataString,
            success: function(data) {
        		
        		if (data == "SI"){

        			//alert('Datos serializados: '+dataString);


        			window.location = "inicio.php";
        		}
        		if (data == "NO"){

        			$("#label").html("<div class='alert alert-danger' style='text-align: center'><a class='close' data-dismiss='alert'>&times;</a><strong>Se han ingresado datos incorrectos!</strong><br>por favor intente nuevamente</strong></div>");
        		}

            },

            error : function(error){


                alert(error);
            }
        });
    });
});







	