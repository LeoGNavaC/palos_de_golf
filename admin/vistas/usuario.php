<?php 
  //activamos almacenamiento en el buffer
  ob_start();
  session_start();
  if (!isset($_SESSION['nombre'])) {
    header("Location: login.html");
  }else{

  require 'header.php';
?>

<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="row">
        <div class="col-md-12">
      <div class="box">
<div class="box-header with-border">
  <h1 class="box-title">Equipos<button class="btn btn-success" onclick="mostrarform(true)" id="btnagregar"><i class="fa fa-plus-circle"></i>Agregar</button></h1>
  <div class="box-tools pull-right">
  </div>
</div>

<!--box-header-->
<!--centro-->
<div class="panel-body table-responsive" id="listadoregistros" style="width: 1660px; height: 770px; overflow: scroll; border: 1px solid #ccc; padding: 10px; position: fixed;">
  
  <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
    <thead>
      <th>Opciones</th>
      <th>ID</th>
      <th>Accion</th>
      <th>Nombre</th>
      <th>Bolsa</th>
      <th>Funda Bolsa</th>
      <th>Maderas</th>
      <th>Fundas Maderas</th>
      <th>Hibridos</th>
      <th>Fundas Hibridos</th>
      <th>Fierros</th>
      <th>Fundas Fierros</th>
      <th>Put</th>
      <th>Fundas Put</th>
      <th>tfundas</th>
      <th>Sombrilla</th>
      <th>Toalla</th>
      <th>Saca Bolas</th>
      <th>Laser</th>
      <th>notas</th>
      <th>Foto</th>
      <th>Ult. Actualización</th>
      <th>Estado</th>

    </thead>

    <tbody>
    </tbody>

    <tfoot>
      <th>Opciones</th>
      <th>ID</th>
      <th>Accion</th>
      <th>Nombre</th>
      <th>Bolsa</th>
      <th>Funda Bolsa</th>
      <th>Maderas</th>
      <th>Fundas Maderas</th>
      <th>Hibridos</th>
      <th>Fundas Hibridos</th>
      <th>Fierros</th>
      <th>Fundas Fierros</th>
      <th>Put</th>
      <th>Fundas Put</th>
      <th>tfundas</th>
      <th>Sombrilla</th>
      <th>Toalla</th>
      <th>Saca Bolas</th>
      <th>Laser</th>
      <th>notas</th>
      <th>Foto</th>
      <th>Ult. Actualización</th>
      <th>Estado</th>

    </tfoot>   
  </table>
</div>

<div class="panel-body" id="formularioregistros">
  <form action="" name="formulario" id="formulario" method="POST" enctype="multipart/form-data">

    <!--*********************************************************************************************Input tipo usuario*************************************************************************-->
    <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="">Tipo usuario(*):</label>
     <select name="idtipousuario" id="idtipousuario" class="form-control select-picker" >
     </select>
    </div>

    <!--*********************************************************************************************Input depto oerteneciente******************************************************************-->
    <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="">Depto perteneciente(*):</label>
     <select name="iddepartamento" id="iddepartamento" class="form-control select-picker" >
     </select>
    </div>

    <!--*********************************************************************************************Input accion*******************************************************************************-->
    <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="">Acción</label>
      <input class="form-control" type="text" name="accion" id="accion"  placeholder="accion">
    </div>

    <!--*********************************************************************************************Input nombre*******************************************************************************-->
    <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="">Nombre(*):</label>
      <input class="form-control" type="hidden" name="idusuario" id="idusuario">
      <input class="form-control" type="text" name="nombre" id="nombre" placeholder="Nombre" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()">
    </div>

    <!--*********************************************************************************************Input bolsa********************************************************************************-->
    <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="">Bolsa(*):</label>
      <input class="form-control" type="text" name="apellidos" id="apellidos" placeholder="Bolsa" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()">
    </div>

    <!--*********************************************************************************************Input funda bolsa**************************************************************************-->
    <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="">Funda bolsa:</label>
      <select name="funda_bolsa" id="funda_bolsa" class="form-control select-picker" value="si">
        <option value="si">Si</option>
        <option value="no">No</option>
      </select>
    </div>
    
    <!--*********************************************************************************************Input maderas******************************************************************************-->
    <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="">Maderas </label>
      <input class="form-control" type="text" name="email" id="email" placeholder="Maderas">
    </div>

    <!--*********************************************************************************************Input fundas maderas***********************************************************************-->
    <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="">Funda maderas </label>
      <input class="form-control" type="text" name="funda_maderas" id="funda_maderas" placeholder="funda_maderas">
    </div>

    <!--*********************************************************************************************Input hibridos*****************************************************************************-->
    <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="">Hibridos</label>
      <input class="form-control" type="text" name="hibridos" id="hibridos"  placeholder="Hibridos">
    </div>

    <!--*********************************************************************************************Input fundas hibridos**********************************************************************-->
    <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="">Funda hibridos </label>
      <input class="form-control" type="text" name="funda_hibridos" id="funda_hibridos" placeholder="funda_hibridos">
    </div>

    <!--*********************************************************************************************Input fierros******************************************************************************-->
    <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="">Fierros </label>
      <input class="form-control" type="text" name="fierros" id="fierros" placeholder="fierros">
   </div>

   <!--*********************************************************************************************Input fundas fierros************************************************************************-->
   <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="">Fundas de Fierros </label>
      <input class="form-control" type="text" name="fundas_fierros" id="fundas_fierros" placeholder="fierros">
   </div>

   <!--*********************************************************************************************Input put***********************************************************************************-->
   <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="">Put </label>
      <input class="form-control" type="text" name="put" id="put" placeholder="Put">
   </div>

   <!--*********************************************************************************************Input fundas put****************************************************************************-->
   <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="">Fundas Put </label>
      <input class="form-control" type="text" name="fundas_put" id="fundas_put" placeholder="Put">
   </div>

   <!--*********************************************************************************************Input total fundas**************************************************************************-->
   <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="">Total fundas </label>
      <input class="form-control" type="text" name="tfundas" id="tfundas" placeholder="Total fundas">
   </div>

   <!--*********************************************************************************************Input sombrilla*****************************************************************************-->
   <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="">Sombrilla</label>
      <input class="form-control" type="text" name="sombrilla" id="sombrilla" placeholder="Sombrilla">
   </div>

   <!--*********************************************************************************************input de Toalla*****************************************************************************-->
   <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="">Toalla</label>
      <input class="form-control" type="text" name="toalla" id="toalla" placeholder="Toalla">
   </div>

   <!--*********************************************************************************************Input de saca Bolas*************************************************************************-->
   <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="">Saca Bolas</label>
      <input class="form-control" type="text" name="sbolas" id="sbolas" placeholder="Saca Bolas">
   </div>

   <!--*********************************************************************************************Input de laser*****************************************************************************-->
   <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="">Laser</label>
      <input class="form-control" type="text" name="laser" id="laser" placeholder="Laser">
   </div>

   <!--*********************************************************************************************Boton de notas******************************************************************************-->

   <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="">Notas</label>
      <input class="form-control" type="text" name="notas" id="notas" placeholder="Notas">
   </div>

   <!--********************************************************************************************Boton de ID**********************************************************************************-->
    <div class="form-group col-lg-6 col-md-6 col-xs-12" id="claves" required>
      <label for="">ID</label>
      <input class="form-control" type="text" name="codigo_persona" id="codigo_persona" maxlength="64" placeholder="ID">
    </div>

    <!--********************************************************************************************Boton de imagen********************************************************************************-->
    <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="">Deseas modificar la imagen:</label>
      <select id="opcionIm" onchange="mostrarIm()">
        <option value="No">No</option>
        <option value="Si">Si</option>
      </select>
    </div>

    <!-- Div para sí -->
    <div id="divImSi" class="form-group col-lg-6 col-md-6 col-xs-12" style="display:none">
      <input class="form-control filestyle" data-buttonText="Seleccionar foto" type="file" name="" id="imagenSi">
      <input type="hidden" name="imagenactual" id="imagenactual">
      <img src="" alt="" width="150px" height="120" id="imagenmuestra">
    </div>

    <!-- Div para no -->
    <div id="divImNo" class="form-group col-lg-6 col-md-6 col-xs-12" style="display:none">
      <input class="form-control filestyle" data-buttonText="Seleccionar foto" type="file" name="" id="imagenNo">
      <input type="hidden" name="imagenactual" id="imagenactual">
      <img src="" alt="" width="150px" height="120" id="imagenmuestra">
    </div>

    <script>
      function mostrarIm() {
        var opcionS = document.getElementById("opcionIm").value;

        var divImSi = document.getElementById("divImSi");
        var divImNo = document.getElementById("divImNo");

        var inputImS = document.getElementById("imagenSi");
        var inputImN = document.getElementById("imagenNo");

        if (opcionS === "Si") {
          inputImS.name = "imagen";
          inputImN.name = "";

          divImSi.style.display = "block";
          divImNo.style.display = "none";

          divImSi.disabled = false;
          divImNo.disabled = true;

          console.log("Holaaa estamos en si");

        } else if (opcionS === "No") {
          inputImS.name = "";
          inputImN.name = "imagen";

          divImSi.style.display = "none";
          divImNo.style.display = "no";

          divImSi.disabled = true;
          divImNo.disabled = false;

          console.log("Holaaaaa estamos en no imagen");

        } else {
          inputImS.name = "";
          inputImN.name = "imagen";

          divImSi.style.display = "none";
          divImNo.style.display = "no";

          divImSi.disabled = true;
          divImNo.disabled = false;

          console.log("Holaaaaa estamos en no imagen");
        }
      }
    </script>

    <!--***************************************************************************************Boton de aceptar o cancelar**********************************************************************-->
    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <button class="btn btn-primary" type="submit" id="btnGuardar" onclick="resetSelect()"><i class="fa fa-save"></i>  Guardar</button>
      <button class="btn btn-danger" onclick="cancelarform();" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</buttotton>

      <script>
        function resetSelect() {
          var opcionSe1 = document.getElementById("opcionIm").value; //optenemos Si y No
          var opcionSe2 = document.getElementById("opcionIm"); // Le asignamos un index
          var divImS = document.getElementById("divImSi");
          var divImN = document.getElementById("divImNo");
          if (opcionSe1 === "Si") {
            divImS.style.display = "none";
            divImN.style.display = "none";
            opcionSe2.selectedIndex = 0;
          } else if (opcionSe1 === "No"){
            divImS.style.display = "none";
            divImN.style.display = "none";
            opcionSe2.selectedIndex = 0;
          }
        }
      </script>
    </div>
  </form>
</div>

<!--******************************************************************************************modal para cambio de password*********************************************************************-->
 <div class="modal fade" id="getCodeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="width: 20% !important;">
     <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Cambio de contraseña</h4>
        </div>
        <div class="modal-body">
  <form action="" name="formularioc" id="formularioc" method="POST">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Password:</label>
            <input class="form-control" type="hidden" name="idusuarioc" id="idusuarioc">
            <input class="form-control" type="password" name="clavec" id="clavec" maxlength="64" placeholder="Clave" required>
          </div>
          <button class="btn btn-primary" type="submit" id="btnGuardar_clave"><i class="fa fa-save"></i>  Guardar</button>
      <button class="btn btn-danger"  type="button"  data-dismiss="modal" ><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
        </form>

        <div class="modal-footer">
          <button class="btn btn-default" type="button" data-dismiss="modal">Cerrar</button>
        </div>
</div>
</div>
</div>
<!--inicio de modal editar contraseña--->
<!--fin de modal editar contraseña--->
<!--fin centro-->
      </div>

      </div>
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
<?php 

require 'footer.php';
 ?>
 <script src="scripts/usuario.js"></script>
 <?php 
}

ob_end_flush();
  ?>
