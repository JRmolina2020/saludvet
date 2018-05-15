<?php
require 'header.php';
include'../controller/login/restriccion.php';
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
            <a class="btn btn-primary" data-toggle="modal" href='#modalusuario'>Agregar</a>
            <div class="box-tools pull-right">
            </div>
          </div>
          <!-- /.box-header -->
          <!-- centro -->
         <div class="panel-body table-responsive" id="divlistadousuario">
            <table id="listadousuario" class="table table-striped table-bordered table-condensed table-hover">
              <thead>
                <th>Opciones</th>
                <th>Correo</th>
                <th>Nombre</th>
                <th>Nivel</th>
                <th>Imagen</th>
                <th>Desactivar</th>
              </thead>
              <tbody>                            
              </tbody>
            </table>
          </div>
        
          <!-- INICIO MODAL -->
         <div class="modal fade" id="modalusuario" data-backdrop="static" data-keyboard="false" data-keyboard=”false” tabindex=”-1″  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" role=”dialog”>
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" onclick="cerrarformulariousuario()" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title">Registro de usuarios</h4>
                </div>
                <div class="modal-body">
                  <!-- INICIO FORMULARIO -->
                  <form name="formulariousuario" id="formulariousuario" method="POST">
                    <div class="row">
                     <div class="col-lg-12">
                       <div class="form-group">
                        <label>Correo</label>
                        <input type="hidden" name="idusuario" id="idusuario">
                        <input type="text" class="form-control" name="correo" id="correo" autofocus  placeholder="correo electronico" >
                      </div>
                    </div>
                    </div>  

                    <div class="row">
                    <div class="col-lg-6">
                     <div class="form-group">
                      <label>Password:</label>
                      <input type="password" class="form-control" name="password" id="password"  placeholder="password" >
                    </div>
                  </div>
                  <div class="col-lg-6">
                     <div class="form-group">
                      <label>Password confirm:</label>
                        <input type="password" class="form-control" value="" id="confirmPassword" name="confirmPassword"/>
                    </div>
                  </div>
                </div> 

                <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                     <div class="form-group">
                  <label>Nombre del usuario:</label>
                  <input type="text" class="form-control" name="nombre" id="nombre"  placeholder="nombre del usuario" >
                </div>
                    
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="form-group">
                  <label>nivel:</label>
                  <select name="nivel" id="nivel" class="form-control" required="required">
                    <option value="ADMIN">Administrador</option>
                    <option value="ASISTENTE">Asistente</option>
                  </select>
                </div>
                  </div>
                </div>
                 <div class="row">
                  
                  <div class="col-lg-6 col-md-3 col-sm-12 col-xs-12">
                  <label>Imagen:</label>
                     <input type="file" class="form-control" name="imagen" id="imagen">
                    <input type="hidden" name="imagenactual" id="imagenactual">
                    <div id="cuadritoimagen"> 
                       <img src="" width="150px" height="120px" id="imagenmuestra">
                    </div>
                   
                    
                  </div>
                </div>
                <!-- TERMINO FORMULARIO -->
              </div>
              <div class="modal-footer">
                <button type="button" onclick="cerrarformulariousuario()" class="btn btn-danger" data-dismiss="modal">Salir</button>
                <button type="submit" id="btnGuardarusuario" class="btn btn-success">Guardar</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- END MODAL -->
      <!--Fin centro -->
             </div><!-- /.panel FIN
                -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </section><!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <!--Fin-Contenido-->
        <?php
        require 'footer.php';
        ?>
        <script type="text/javascript" src="scripts/usuario.js"></script>
         


