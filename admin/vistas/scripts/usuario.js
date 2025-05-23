var tabla;

//funcion que se ejecuta al inicio
function init(){
	mostrarform(false);
	mostrarform_clave(false);
	listar();

	$("#formularioc").on("submit",function(c){
		editar_clave(c);
	})
	
	$("#formulario").on("submit",function(e){
		guardaryeditar(e);
	})

	$("#imagenmuestra").hide();
	//mostramos los permisos
	$.post("../ajax/usuario.php?op=permisos&id=", function(r){
		$("#permisos").html(r);
	});

	//mirar la imagen
	document.getElementById('imagen').addEventListener('change', function(event) {
		const file = event.target.files[0];
		if (file) {
		  const reader = new FileReader();
		  reader.onload = function(e) {
			const img = document.getElementById('imagenmuestra');
			img.src = e.target.result;
			img.style.display = 'block';
		  }
		  reader.readAsDataURL(file);
		}
	  });	  

   //cargamos los items al select departamento
	$.post("../ajax/departamento.php?op=selectDepartamento", function(r){
		$("#iddepartamento").html(r);
		$('#iddepartamento').selectpicker('refresh'); 
	});

	//cargamos los items al select tipousuario
	$.post("../ajax/tipousuario.php?op=selectTipousuario", function(r){
		$("#idtipousuario").html(r);
		$('#idtipousuario').selectpicker('refresh'); 
	});

}

//funcion limpiar
function limpiar(){
	$("#accion").val("");
	$("#nombre").val("");
    $("#apellidos").val("");
	$("#funda_bolsa").val("");
	$("#login").val("");
	$("#hibridos").val("");
	$("#iddepartamento").selectpicker('refresh');
	$("#idtipousuario").selectpicker('refresh');
	$("#email").val("");
	$("#funda_maderas").val("");
	$("#clave").val("");
	$("#funda_hibridos").val("");
	$("#fierros").val("");
	$("#fundas_fierros").val("");
	$("#put").val("");
	$("#fundas_put").val("");
	$("#tfundas").val("");
	$("#sombrilla").val("");
	$("#toalla").val("");
	$("#sbolas").val("");
	$("#laser").val("");
	$("#notas").val("");
	$("#codigo_persona").val("");
	$("#imagen").val("");
	$("#imagenmuestra").attr("src","");
	$("#imagenactual").val("");
	$("#idusuario").val("");
}

//funcion mostrar formulario
function mostrarform(flag){
	limpiar();
	if(flag){
		$("#listadoregistros").hide();
		$("#formularioregistros").show();
		$("#btnGuardar").prop("disabled",false);
		$("#btnagregar").hide();
	}else{
		$("#listadoregistros").show();
		$("#formularioregistros").hide();
		$("#btnagregar").show();
	}
}
function mostrarform_clave(flag){
	limpiar();
	if(flag){
		$("#listadoregistros").hide();
		$("#formulario_clave").show();
		$("#btnGuardar_clave").prop("disabled",false);
		$("#btnagregar").hide();
	}else{
		$("#listadoregistros").show();
		$("#formulario_clave").hide();
		$("#btnagregar").show();
	}
}
//cancelar form
function cancelarform(){
	$("#claves").show();
	limpiar();
	mostrarform(false);
}
function cancelarform_clave(){
	limpiar();
	mostrarform_clave(false);

}
//funcion listar
function listar(){
	tabla=$('#tbllistado').dataTable({
		"aProcessing": true,//activamos el procedimiento del datatable
		"aServerSide": true,//paginacion y filrado realizados por el server
		dom: 'Bfrtip',//definimos los elementos del control de la tabla
		buttons: [
                  'copyHtml5',
                  'excelHtml5',
                  'csvHtml5',
                  'pdf'
		],
		"ajax":
		{
			url:'../ajax/usuario.php?op=listar',
			type: "get",
			dataType : "json",
			error:function(e){
				console.log(e.responseText);
			}
		},
		"bDestroy":true,
		"iDisplayLength":30,//paginacion
		"order":[[0,"desc"]]//ordenar (columna, orden)
	}).DataTable();
}
//funcion para guardaryeditar
function guardaryeditar(e){
     e.preventDefault();//no se activara la accion predeterminada 
     $("#btnGuardar").prop("disabled",true);
     var formData=new FormData($("#formulario")[0]);

     $.ajax({
     	url: "../ajax/usuario.php?op=guardaryeditar",
     	type: "POST",
     	data: formData,
     	contentType: false,
     	processData: false,

     	success: function(datos){
     		bootbox.alert(datos);
     		mostrarform(false);
     		tabla.ajax.reload();
     	}
     });
$("#claves").show();
     limpiar();
}

function editar_clave(c){
     c.preventDefault();//no se activara la accion predeterminada 
     $("#btnGuardar_clave").prop("disabled",true);
     var formData=new FormData($("#formularioc")[0]);

     $.ajax({
     	url: "../ajax/usuario.php?op=editar_clave",
     	type: "POST",
     	data: formData,
     	contentType: false,
     	processData: false,

     	success: function(datos){
     		bootbox.alert(datos);
     		mostrarform_clave(false);
     		tabla.ajax.reload();
     	}
     });

     limpiar();
	 $("#getCodeModal").modal('hide');
}
function mostrar(idusuario){
	$.post("../ajax/usuario.php?op=mostrar",{idusuario : idusuario},
		function(data,status)
		{
			data=JSON.parse(data);
			mostrarform(true);
			if ($("#idusuario").val(data.idusuario).length==0) {
           	$("#claves").show();
           	
           }else{
			$("#claves").hide();
			}
			$("#accion").val(data.accion);
			$("#nombre").val(data.nombre);
			$("#apellidos").val(data.apellidos);
			$("#funda_bolsa").val(data.funda_bolsa);
			$("#hibridos").val(data.hibridos);
            $("#iddepartamento").val(data.iddepartamento);
            $("#iddepartamento").selectpicker('refresh');
            $("#idtipousuario").val(data.idtipousuario);
            $("#idtipousuario").selectpicker('refresh');
			$("#email").val(data.email);
			$("#funda_maderas").val(data.funda_maderas);
			$("#funda_hibridos").val(data.funda_hibridos);
			$("#fierros").val(data.fierros);
			$("#fundas_fierros").val(data.fundas_fierros);
			$("#put").val(data.put);
			$("#fundas_put").val(data.fundas_put);
			$("#tfundas").val(data.tfundas);
			$("#sombrilla").val(data.sombrilla);
			$("#toalla").val(data.toalla);
			$("#sbolas").val(data.sbolas);
			$("#laser").val(data.laser);
			$("#notas").val(data.notas);
            //$("#login").val(data.login);
            $("#codigo_persona").val(data.codigo_persona);
            $("#imagenmuestra").show();
            $("#imagenmuestra").attr("src","../files/usuarios/"+data.imagen);
            $("#imagenactual").val(data.imagen);
            $("#idusuario").val(data.idusuario);

 
		});
	$.post("../ajax/usuario.php?op=permisos&id="+idusuario, function(r){
	$("#permisos").html(r);
});
}

function mostrar_clave(idusuario){
	 $("#getCodeModal").modal('show');
	$.post("../ajax/usuario.php?op=mostrar_clave",{idusuario : idusuario},
		function(data,status)
		{
			data=JSON.parse(data);
            $("#idusuarioc").val(data.idusuario);
		});
}

//funcion para desactivar
function desactivar(idusuario){
	bootbox.confirm("¿Esta seguro de desactivar este dato?", function(result){
		if (result) {
			$.post("../ajax/usuario.php?op=desactivar", {idusuario : idusuario}, function(e){
				bootbox.alert(e);
				tabla.ajax.reload();
			});
		}
	})
}

function activar(idusuario){
	bootbox.confirm("¿Esta seguro de activar este dato?" , function(result){
		if (result) {
			$.post("../ajax/usuario.php?op=activar", {idusuario : idusuario}, function(e){
				bootbox.alert(e);
				tabla.ajax.reload();
			});
		}
	})
}

function generar(longitud)
{
  long=parseInt(longitud);
  var caracteres = "abcdefghijkmnpqrtuvwxyzABCDEFGHIJKLMNPQRTUVWXYZ2346789";
  var contraseña = "";
  for (i=0; i<long; i++) contraseña += caracteres.charAt(Math.floor(Math.random()*caracteres.length));
    $("#codigo_persona").val(contraseña);
}

init();