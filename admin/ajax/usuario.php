<?php 
session_start();
require_once "../modelos/Usuario.php";
//
$usuario=new Usuario();

$idusuarioc=isset($_POST["idusuarioc"])? limpiarCadena($_POST["idusuarioc"]):"";
$clavec=isset($_POST["clavec"])? limpiarCadena($_POST["clavec"]):"";
$idusuario=isset($_POST["idusuario"])? limpiarCadena($_POST["idusuario"]):"";
$accion=isset($_POST["accion"])? limpiarCadena($_POST["accion"]):"";
$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
$apellidos=isset($_POST["apellidos"])? limpiarCadena($_POST["apellidos"]):"";
$funda_bolsa=isset($_POST["funda_bolsa"])? limpiarCadena($_POST["funda_bolsa"]):"";
$login=isset($_POST["codigo_persona"])? limpiarCadena($_POST["codigo_persona"]):"";/*isset($_POST["login"])? limpiarCadena($_POST["login"]):"";*/
$hibridos=isset($_POST["hibridos"])? limpiarCadena($_POST["hibridos"]):"";
$iddepartamento=isset($_POST["iddepartamento"])? limpiarCadena($_POST["iddepartamento"]):"";
$idtipousuario=isset($_POST["idtipousuario"])? limpiarCadena($_POST["idtipousuario"]):"";
$email=isset($_POST["email"])? limpiarCadena($_POST["email"]):"";
$funda_maderas=isset($_POST["funda_maderas"])? limpiarCadena($_POST["funda_maderas"]):"";
$password=isset($_POST["clave"])? limpiarCadena($_POST["clave"]):"";
$funda_hibridos=isset($_POST["funda_hibridos"])? limpiarCadena($_POST["funda_hibridos"]):"";
$fierros=isset($_POST["fierros"])? limpiarCadena($_POST["fierros"]):"";
$fundas_fierros=isset($_POST["fundas_fierros"])? limpiarCadena($_POST["fundas_fierros"]):"";
$put=isset($_POST["put"])? limpiarCadena($_POST["put"]):"";
$fundas_put=isset($_POST["fundas_put"])? limpiarCadena($_POST["fundas_put"]):"";
$tfundas=isset($_POST["tfundas"])? limpiarCadena($_POST["tfundas"]):"";
$sombrilla=isset($_POST["sombrilla"])? limpiarCadena($_POST["sombrilla"]):"";
$toalla=isset($_POST["toalla"])? limpiarCadena($_POST["toalla"]):"";
$sbolas=isset($_POST["sbolas"])? limpiarCadena($_POST["sbolas"]):"";
$laser=isset($_POST["laser"])? limpiarCadena($_POST["laser"]):"";
$notas=isset($_POST["notas"])? limpiarCadena($_POST["notas"]):"";
$codigo_persona=isset($_POST["codigo_persona"])? limpiarCadena($_POST["codigo_persona"]):"";
$imagen=isset($_POST["imagen"])? limpiarCadena($_POST["imagen"]):"";
$usuariocreado=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
$idmensaje=isset($_POST["idmensaje"])? limpiarCadena($_POST["idmensaje"]):"";
/*
function limpiarCadena($cadena){
	return htmlspecialchars(trim($cadena), ENT_QUOTES, 'UTF-8');
}*/

switch ($_GET["op"]) {
	
/*
	case 'guardaryeditar':

		if (!file_exists($_FILES['imagen']['tmp_name'])|| !is_uploaded_file($_FILES['imagen']['tmp_name'])) {
			$imagen=$_POST["imagenactual"];
		} else {

			$ext=explode(".", $_FILES["imagen"]["name"]);
			if ($_FILES['imagen']['type'] == "image/jpg" || $_FILES['imagen']['type'] == "image/jpeg" || $_FILES['imagen']['type'] == "image/png"){
				$imagen = round(microtime(true)).'.'. end($ext);
				move_uploaded_file($_FILES["imagen"]["tmp_name"], "../files/usuarios/" . $imagen);
		 	}
		}

		//Hash SHA256 para la contraseña
		$clavehash=hash("SHA256", $password);

		if (empty($idusuario)) {
			$idusuario=$_SESSION["idusuario"];
			$rspta=$usuario->insertar($accion,$nombre,$apellidos,$funda_bolsa,$login,$hibridos,$iddepartamento,$idtipousuario,$email,$funda_maderas,$funda_hibridos,$fierros,$fundas_fierros,$put,$fundas_put,$tfundas,$sombrilla,$toalla,$sbolas,$laser,$notas,$clavehash,$imagen,$usuariocreado,$codigo_persona);
			echo $rspta ? "Datos registrados correctamente" : "No se pudo registrar todos los datos del usuario";
		}
		else {
			$rspta=$usuario->editar($idusuario,$accion,$nombre,$apellidos,$funda_bolsa,$login,$hibridos,$iddepartamento,$idtipousuario,$email,$funda_maderas,$funda_hibridos,$fierros,$fundas_fierros,$put,$fundas_put,$fundas_put,$tfundas,$sombrilla,$toalla,$sbolas,$laser,$notas,$imagen,$usuariocreado,$codigo_persona);
			echo $rspta ? "Datos actualizados correctamente" : "No se pudo actualizar los datos";
		}
	break;*/

	case 'guardaryeditar':

		try {
			// Validación de imagen
			if (!file_exists($_FILES['imagen']['tmp_name']) || !is_uploaded_file($_FILES['imagen']['tmp_name'])) {
				$imagen = $_POST["imagenactual"];
			} else {
				$ext = explode(".", $_FILES["imagen"]["name"]);
				if ($_FILES['imagen']['type'] == "image/jpg" || $_FILES['imagen']['type'] == "image/jpeg" || $_FILES['imagen']['type'] == "image/png") {
					$imagen = round(microtime(true)) . '.' . end($ext);
					if (!move_uploaded_file($_FILES["imagen"]["tmp_name"], "../files/usuarios/" . $imagen)) {
						throw new Exception("Error al mover la imagen al directorio de destino.");
					}
				} else {
					throw new Exception("Formato de imagen no válido. Solo se permiten JPG, JPEG y PNG.");
				}
			}
	
			// Validación de datos críticos
			if (empty($login)) {
				throw new Exception("El valor de login es: nada");
			}
	
			// Hash para la contraseña
			$clavehash = hash("SHA256", $password);
	
			// Insertar o editar datos
			if (empty($idusuario)) {
				$idusuario = $_SESSION["idusuario"];
				$rspta = $usuario->insertar($accion, $nombre, $apellidos, $funda_bolsa, $login, $hibridos, $iddepartamento, $idtipousuario, $email, $funda_maderas, $funda_hibridos, $fierros, $fundas_fierros, $put, $fundas_put, $tfundas, $sombrilla, $toalla, $sbolas, $laser, $notas, $clavehash, $imagen, $usuariocreado, $codigo_persona);
				
				if ($rspta) {
					echo "Datos registrados correctamente";
				} else {
					throw new Exception("Error en la consulta de inserción. Verifica la estructura de la tabla y los datos enviados.");
				}
			} else {
				$rspta = $usuario->editar($idusuario, $accion, $nombre, $apellidos, $funda_bolsa, $login, $hibridos, $iddepartamento, $idtipousuario, $email, $funda_maderas, $funda_hibridos, $fierros, $fundas_fierros, $put, $fundas_put, $tfundas, $sombrilla, $toalla, $sbolas, $laser, $notas, $imagen, $usuariocreado, $codigo_persona);
				
				if ($rspta) {
					echo "Datos actualizados correctamente hola mundo";
				} else {
					throw new Exception("Error en la consulta de actualización. Verifica la estructura de la tabla y los datos enviados.");
				}
			}
	
		} catch (Exception $e) {
			echo "Ocurrió un error: " . $e->getMessage();
		}
	
	break;
	
	

	case 'desactivar':
		$rspta=$usuario->desactivar($idusuario);
		echo $rspta ? "Datos desactivados correctamente" : "No se pudo desactivar los datos";
	break;

	case 'activar':
		$rspta=$usuario->activar($idusuario);
		echo $rspta ? "Datos activados correctamente" : "No se pudo activar los datos";
	break;
	
	case 'mostrar':
		$rspta=$usuario->mostrar($idusuario);
		echo json_encode($rspta);
	break;

	case 'editar_clave':
		$clavehash=hash("SHA256", $clavec);

		$rspta=$usuario->editar_clave($idusuarioc,$clavehash);
		echo $rspta ? "Password actualizado correctamente" : "No se pudo actualizar el password";
	break;

	case 'mostrar_clave':
		$rspta=$usuario->mostrar_clave($idusuario);
		echo json_encode($rspta);
	break;
	
	case 'listar':
		$rspta=$usuario->listar();
		//declaramos un array
		$data=Array();


		while ($reg=$rspta->fetch_object()) {
			$data[]=array(
				"0"=>($reg->estado)?'<button class="btn btn-warning btn-xs" onclick="mostrar('.$reg->idusuario.')"><i class="fa fa-pencil"></i></button>'.' '.'<button class="btn btn-info btn-xs" onclick="mostrar_clave('.$reg->idusuario.')"><i class="fa fa-key"></i></button>'.' '.'<button class="btn btn-danger btn-xs" onclick="desactivar('.$reg->idusuario.')"><i class="fa fa-close"></i></button>':'<button class="btn btn-warning btn-xs" onclick="mostrar('.$reg->idusuario.')"><i class="fa fa-pencil"></i></button>'.' '.'<button class="btn btn-info btn-xs" onclick="mostrar_clave('.$reg->idusuario.')"><i class="fa fa-key"></i></button>'.' '.'<button class="btn btn-primary btn-xs" onclick="activar('.$reg->idusuario.')"><i class="fa fa-check"></i></button>',
				"1"=>$reg->codigo_persona,
				"2"=>$reg->accion,
				"3"=>$reg->nombre,
				"4"=>$reg->apellidos,
				"5"=>$reg->funda_bolsa,
				"6"=>$reg->email,
				"7"=>$reg->funda_maderas,
				"8"=>$reg->hibridos,
				"9"=>$reg->funda_hibridos,
				"10"=>$reg->fierros,
				"11"=>$reg->fundas_fierros,
				"12"=>$reg->put,
				"13"=>$reg->fundas_put,//*************modificacion */
				"14"=>$reg->tfundas,
				"15"=>$reg->sombrilla,
				"16"=>$reg->toalla,
				"17"=>$reg->sbolas,
				"18"=>$reg->laser,
				"19"=>$reg->notas,
				"20"=>"<img src='../files/usuarios/".$reg->imagen."' height='80px' width='80px'>",
				"21"=>$reg->fecha_update,
				"22"=>($reg->estado)?'<span class="label bg-green">Activado</span>':'<span class="label bg-red">Desactivado</span>'
				);
		}

		$results=array(
             "sEcho"=>1,//info para datatables
             "iTotalRecords"=>count($data),//enviamos el total de registros al datatable
             "iTotalDisplayRecords"=>count($data),//enviamos el total de registros a visualizar
             "aaData"=>$data); 
		echo json_encode($results);

	break;


	case 'verificar':
		//validar si el usuario tiene acceso al sistema
		$logina=$_POST['logina'];
		$clavea=$_POST['clavea'];

		//Hash SHA256 en la contraseña
		$clavehash=($clavea);
	
		$rspta=$usuario->verificar($logina, $clavehash);

		$fetch=$rspta->fetch_object();

		if (isset($fetch)) 
		{
			# Declaramos la variables de sesion
			$_SESSION['idusuario']=$fetch->idusuario;
			$id=$fetch->idusuario;
			$_SESSION['nombre']=$fetch->nombre;
			$_SESSION['codigo_persona']=$fetch->codigo_persona;
			$_SESSION['imagen']=$fetch->imagen;
			$_SESSION['login']=$fetch->login;
			$_SESSION['tipousuario']=$fetch->tipousuario;
			$_SESSION['departamento']=$fetch->iddepartamento;

			require "../config/Conexion.php";

			$sql="UPDATE usuarios SET iteracion='1' WHERE idusuario='$id'";
			echo $sql; 
	 		ejecutarConsulta($sql);	 		

		}

		echo json_encode($fetch);

	break;

	case 'salir':
			
			$id=$_SESSION['idusuario'];
			$sql="UPDATE usuarios SET idusuario='0' WHERE idusuario='$id'";
			echo $sql; 
	 		ejecutarConsulta($sql);	 		


		//Limpiamos las variables de sesión   
        session_unset();
        //Destruìmos la sesión
        session_destroy();
        //Redireccionamos al login
        header("Location: ../index.php");

	break;

}
?>
