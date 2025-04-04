<?php 
	//incluir la conexion de base de datos
	require "../config/Conexion.php";
	class Usuario{


		//implementamos nuestro constructor
	public function __construct(){

	}

	//metodo insertar registro
	public function insertar($accion,$nombre,$apellidos,$funda_bolsa,$login,$hibridos,$iddepartamento,$idtipousuario,$email,$funda_maderas,$funda_hibridos,$fierros,$fundas_fierros,$put,$fundas_put,$tfundas,$sombrilla,$toalla,$sbolas,$laser,$notas,$clavehash,$imagen,$usuariocreado,$codigo_persona){
		date_default_timezone_set('America/Mexico_City');
		$fechacreado=date('Y-m-d H:i:s');
		$sql="INSERT INTO usuarios (accion,nombre,apellidos,funda_bolsa,login,hibridos,iddepartamento,idtipousuario,email,funda_maderas,password,funda_hibridos,fierros,fundas_fierros,put,fundas_put,tfundas,sombrilla,toalla,sbolas,laser,notas,imagen,estado,fechacreado,usuariocreado,codigo_persona) 
						VALUES ('$accion','$nombre','$apellidos','$funda_bolsa','$codigo_persona','$hibridos','$iddepartamento','$idtipousuario','$email','$funda_maderas','$clavehash','$funda_hibridos','$fierros','$fundas_fierros','$put','$fundas_put','$tfundas','$sombrilla','$toalla','$sbolas','$laser','$notas','$imagen','1','$fechacreado','$usuariocreado','$codigo_persona')";
		return ejecutarConsulta($sql);

	}

	public function editar($idusuario,$accion,$nombre,$apellidos,$funda_bolsa,$login,$hibridos,$iddepartamento,$idtipousuario,$email,$funda_maderas,$funda_hibridos,$fierros,$fundas_fierros,$put,$fundas_put,$tfundas,$sombrilla,$toalla,$sbolas,$laser,$notas,$imagen,$usuariocreado,$codigo_persona){
		$sql="UPDATE usuarios SET accion='$accion',nombre='$nombre',apellidos='$apellidos',funda_bolsa='$funda_bolsa',login='$codigo_persona',hibridos='$hibridos',iddepartamento='$iddepartamento',idtipousuario='$idtipousuario',email='$email',funda_maderas='$funda_maderas',funda_hibridos='$funda_hibridos',fierros='$fierros',fundas_fierros='$fundas_fierros',put='$put',fundas_put='$fundas_put',tfundas='$tfundas',sombrilla='$sombrilla',toalla='$toalla',sbolas='$sbolas',laser='$laser',notas='$notas',imagen='$imagen',usuariocreado='$usuariocreado',codigo_persona='$codigo_persona'    
		WHERE idusuario='$idusuario'";
		return ejecutarConsulta($sql);

	}

	public function editar_clave($idusuario,$clavehash){
		$sql="UPDATE usuarios SET password='$clavehash' WHERE idusuario='$idusuario'";
		return ejecutarConsulta($sql);
	}

	public function mostrar_clave($idusuario){
		$sql="SELECT idusuario, password FROM usuarios WHERE idusuario='$idusuario'";
		return ejecutarConsultaSimpleFila($sql);
	}

	public function desactivar($idusuario){
		$sql="UPDATE usuarios SET estado='0' WHERE idusuario='$idusuario'";
		return ejecutarConsulta($sql);
	}

	public function activar($idusuario){
		$sql="UPDATE usuarios SET estado='1' WHERE idusuario='$idusuario'";
		return ejecutarConsulta($sql);
	}

	//metodo para mostrar registros
	public function mostrar($idusuario){
		$sql="SELECT * FROM usuarios WHERE idusuario='$idusuario'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//listar registros
	public function listar(){
		//$sql="SELECT * FROM usuarios ORDER BY CAST(login AS UNSIGNED) ASC";
		$sql="SELECT u.*, d.nombre AS nombre_departamento FROM usuarios u JOIN departamento d ON u.iddepartamento = d.iddepartamento ORDER BY CAST(login AS UNSIGNED) ASC";//traemos el campo Departamento
		return ejecutarConsulta($sql);
	}

	public function cantidad_usuario(){
		$sql="SELECT count(*) nombre FROM usuarios";
		return ejecutarConsulta($sql);
	}

	//Función para verificar el acceso al sistema
		public function verificar($login,$clave)
		{
			$sql="SELECT u.codigo_persona,u.idusuario,u.nombre,u.apellidos,u.funda_bolsa,u.login,u.hibridos,u.idtipousuario,u.iddepartamento,u.email,u.funda_maderas,u.funda_hibridos,u.fierros,u.fundas_fierros,u.imagen,u.login, tu.nombre as tipousuario 
			FROM usuarios u INNER JOIN tipousuario tu ON u.idtipousuario=tu.idtipousuario WHERE login='$login' AND password='$clave' AND estado='1'"; 
			return ejecutarConsulta($sql);  
		}
	}
 ?>
