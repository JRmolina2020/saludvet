<?php
require 'header.php';
$idcliente=$_GET["client"];
?>
<!--Contenido-->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">        
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box">
           <div class="box-header with-border">
             <a class="btn btn-primary" data-toggle="modal" href='#modalmascota'>Agregar</a>
              <a class="btn btn-primary"  href='cliente.php'><span class="fa fa-user" aria-hidden="true"></span></a>
            <div class="box-tools pull-right">
            </div>
          </div>
  
          <!-- /.box-header -->
          <!-- centro -->
          <div class="panel-body table-responsive" id="divlistadomascota">
            <p>
            <a href="mond"><p name="clientemuestra"></p></a>
          </p>
            <table id="listadomascota" class="table table-striped table-bordered table-condensed table-hover">
              <thead>
                <th>Opciones</th>
                <th>Mascota</th>
                <th>Sexo</th>
                <th>Raza</th>
                 <th>Procedencia</th>
                  <th>Edad</th>
                  <th>Categoria</th>
                <th>Descripcion</th>
                <th>Perfil</th>
              </thead>
              <tbody>                            
              </tbody>
            </table>
          </div>
      <!--Fin centro -->
             </div><!-- /.panel FIN
                -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </section><!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <!--Fin-Contenido-->
<!-- MODAL FORMULARIO MASCOTA --> 

        <!-- FORMULARIOMASCOTAS -->
<!-- REGISTRO DE MASCOTA -->
  <div class="modal fade" id="modalmascota" data-backdrop="static" data-keyboard="false" data-keyboard=”false” tabindex=”-1″  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" role=”dialog”>
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <!-- INICIO DE FORMULARIO -->
       <form name="formulariomascota" id="formulariomascota" method="POST">
             <input type="hidden" id="idmascota" name="idmascota">
             <div class="row">
               <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <div class="form-group">
                  <label>Nombre:</label>
                  <input type="text" class="form-control" name="nombre" id="nombre"  placeholder="Nombre de la mascota" >
                </div>
               </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                  <div class="form-group">
                  <label>Sexo:</label>
                 <select name="sexo" id="sexo" class="form-control" required="required">
                   <option value="MACHO">Macho</option>
                   <option value="HEMBRA">Hembra</option>
                 </select>
                </div>
               </div>
             </div>
              <div class="row">
                 <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                  <div class="form-group">
                  <label>Categoria:</label>
                 <select name="categoria" id="categoria" onchange="selectvalidar()" class="form-control" required="required">
                   <option value="PAJARO">Pajaro</option>
                   <option value="PERRO">Perro</option>
                     <option value="GATO">Gato</option>
                 </select>
                </div>
               </div>
               <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <div class="form-group">
                  <label>Raza:</label>
                  <select name="raza" id="raza" class="form-control" >   
                  </select>
                </div>
               </div>
             </div>
             <div class="row">
                 <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                  <div class="form-group">
                  <label>Procedencia:</label>
                 <select name="procedencia" id="procedencia" class="form-control" required="required">
                   <option value="URBANA">Urbana</option>
                   <option value="RURAL">Rural</option>
                    
                 </select>
                </div>
               </div>
               <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <div class="form-group">
                  <label>Edad:</label>
                 <input type="number" name="edad" id="edad" class="form-control"  required="required">
                  </select>
                </div>
               </div>
             </div>
              <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                     <label>Descripcion:</label>
                  <textarea name="descripcion" id="descripcion" class="form-control" rows="3"></textarea>
               </div>
               <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <label>Imagen:</label>
                     <input type="file" class="form-control" name="imagen" id="imagen">
                    <input type="hidden" name="imagenactualmascota" id="imagenactualmascota">
                    <div name id="cuadritoimagenmascota"> 
                       <img src="" width="150px" height="120px" id="imagenmuestramascota">
                    </div>
               </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                   <input type="hidden" value="<?php echo $idcliente?>" name="cliente_idcliente" id="cliente_idcliente">
               </div>

             </div>
          <!-- END DE FORMULARIO -->
      </div>
      <div class="modal-footer">
        <button type="button" onclick="cerrarformulariomascota()" class="btn btn-danger" data-dismiss="modal">Salir</button>
        <button type="submit" id="btnGuardarmascota" name="btnGuardarmascota" class="btn btn-primary">Guardar</button>
      </div>
      </form>
    </div>
  </div>
   </div>
<!-- REGISTRO DE MASCOTA -->
<!-- ENDMODAL FORM -->
        <?php
        require 'footer.php';
        ?>
   <script type="text/javascript" src="scripts/mascota.js"></script>
         


