<?php
require 'header.php';
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
            <a class="btn btn-primary" data-toggle="modal" href='#modalcliente'>Agregar</a>
            <div class="box-tools pull-right">
            </div>
          </div>
          <!-- /.box-header -->
          <!-- centro -->
          <div class="panel-body table-responsive" id="divlistadocliente">
            <table id="listadocliente" class="table table-striped table-bordered table-condensed table-hover">
              <thead>
                <th>Opciones</th>
                <th>Cedula</th>
                <th>Nombre</th>
                <th>apellido</th>
                <th>telefono</th>
                <th>Ciudad</th>
                <th>Barrio</th>
                <th>Direccion</th>
              </thead>
              <tbody>                            
              </tbody>
            </table>
          </div>

          <!-- INICIO MODAL -->
         <div class="modal fade" id="modalcliente" data-backdrop="static" data-keyboard="false" data-keyboard=”false” tabindex=”-1″  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" role=”dialog”>
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" onclick="cerrarformulariocliente()" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title">Registro de clientes</h4>
                </div>
                <div class="modal-body">
                  <!-- INICIO FORMULARIO -->
                  <form name="formulariocliente" id="formulariocliente" method="POST">
                    <div class="row">
                     <div class="col-lg-6">
                       <div class="form-group">
                        <label>Cedula:</label>
                        <input type="hidden" name="idcliente" id="idcliente">
                        <input type="text" class="form-control" name="cedula" id="cedula" autofocus  placeholder="Cedula del cliente" >
                      </div>
                      <div class="progress" id="progressBar" style="margin: 5px 0 0 0; display: none;">
            <div class="progress-bar progress-bar-success progress-bar-striped active" style="width: 100%"></div>
        </div>
                    </div>  
                    <div class="col-lg-6">
                     <div class="form-group">
                      <label>Nombre:</label>
                      <input type="text" class="form-control" name="nombre" id="nombre"  placeholder="Nombre  del cliente" >
                    </div>
                  </div>
                </div>  

                <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                     <div class="form-group">
                  <label>Apellido:</label>
                  <input type="text" class="form-control" name="apellido" id="apellido"  placeholder="Apellido del cliente" >
                </div>
                    
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="form-group">
                  <label>Telefono:</label>
                  <input type="text" class="form-control" name="telefono" id="telefono"  placeholder=" Telefono del cliente" >
                </div>
                    
                  </div>
                </div>
                 <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                     <div class="form-group">
                  <label>Ciudad:</label>
                  <select name="ciudad" id="ciudad" class="form-control selectpicker "  data-live-search="true">
                    <option value="VALLEDUPAR">VALLEDUPAR</option>
                    <option value="MEDELLIN">MEDELLIN</option>
                    <option value="BOGOTA">BOGOTA</option>
                  </select>
                </div>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="form-group">
                  <label>Barrio:</label>
                  <input type="text" class="form-control" name="barrio" id="barrio"  placeholder="Barrio del cliente" >
                </div>
                    
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="form-group">
                  <label>Direccion:</label>
                  <input type="text" class="form-control" name="direccion" id="direccion"  placeholder="Direccion del cliente" >
                </div>
                  </div>
                </div>
                <!-- TERMINO FORMULARIO -->
              </div>
              <div class="modal-footer">
                <button type="button" onclick="cerrarformulariocliente()" class="btn btn-danger" data-dismiss="modal">Salir</button>
                <button type="submit" id="btnGuardar" class="btn btn-primary" >Guardar</button>
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
        <script type="text/javascript" src="scripts/cliente.js"></script>
      
        
         


