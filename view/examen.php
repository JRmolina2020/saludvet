<?php
require 'header.php';
$idcliente=$_GET["client"];
$idmascota2=$_GET["mascot"];

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
             <a class="btn btn-primary" data-toggle="modal" href='#modalexamen'>Agregar</a>
              <a class="btn btn-primary" onclick="history.back()"><span class="fa fa-paw" aria-hidden="true"></span></a>
            <div class="box-tools pull-right">
            </div>
          </div>
  
          <!-- /.box-header -->
          <!-- centro -->
          <div class="panel-body table-responsive" id="divlistadoexamen">
            <div class="alert alert-default">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <strong>Title!</strong> Alert body ...
            </div>
            <table id="listadoexamen" class="table table-striped table-bordered table-condensed table-hover">
              <thead>
                <th>Opciones</th>
                 <th>Fecha</th>
                <th>F.respiratoria</th>
                <th>F.cardiaca</th>
                <th>Peso</th>
                 <th>Pulso</th>
                  <th>Temperatura</th>
                  <th>Hidratacion</th>
                <th>Actitud</th>
                <th>C.Corporal</th>
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

        <!-- formularioexamenS -->
<!-- REGISTRO DE MASCOTA -->
  <div class="modal fade" id="modalexamen" data-backdrop="static" data-keyboard="false" data-keyboard=”false” tabindex=”-1″  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" role=”dialog”>
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <!-- INICIO DE FORMULARIO -->
       <form name="formularioexamen" id="formularioexamen" method="POST">
             <input type="hidden" id="idexamen" name="idexamen">
              <input type="hidden" value="<?php echo $idmascota2;?>" id="idmascota" name="idmascota">
             <div class="row">
               <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <div class="form-group">
                  <label>F.respiratoria:</label>
                 <div class="input-group">
                <input type="text" class="form-control" name="frespiratoria" id="frespiratoria" placeholder="Frecuencia/Minuto">
                <span class="input-group-btn">
                  <button class="btn btn-secondary" type="button">*Min!</button>
                </span>
              </div>
                </div>
               </div>
               <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <div class="form-group">
                  <label>F.cardiaca:</label>
                 <div class="input-group">
                <input type="text" class="form-control" name="fcardiaca" id="fcardiaca" placeholder="Frecuencia/Minuto">
                <span class="input-group-btn">
                  <button class="btn btn-secondary" type="button">*Min!</button>
                </span>
              </div>
                </div>
               </div>
               </div>
               <div class="row">
               <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                 <div class="form-group">
                  <label>F.cardiaca:</label>
                <div class="input-group">
                <input type="text" class="form-control" name="peso" id="peso" placeholder="Peso  En KG">
                <span class="input-group-btn">
                  <button class="btn btn-secondary" type="button">KG</button>
                </span>
              </div>
            </div>
               </div>
               <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <div class="form-group">
                  <label>Puslo:</label>
                <div class="input-group">
                <input type="text" class="form-control" name="pulso" id="pulso" placeholder="/Minuto">
                <span class="input-group-btn">
                  <button class="btn btn-secondary" type="button">*Min!</button>
                </span>
              </div>
            </div>
               </div>
               </div>
               <div class="row">
               <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <div class="form-group">
                  <label>Temperatura:</label>
                <div class="input-group">
                <input type="text" class="form-control" name="temperatura" id="temperatura" placeholder="Temperatura">
                <span class="input-group-btn">
                  <button class="btn btn-secondary" type="button">Grados!</button>
                </span>
              </div>
            </div>
               </div>
               <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                  <div class="form-group">
                  <label>Hidratacion:</label>
                 <select name="hidratacion" id="hidratacion" class="form-control" required="required">
                   <option value="Normal">Normal</option>
                   <option value="D-0-5%">Deshidratación 0-5%</option>
                   <option value="D-6-7%">Deshidratación 6-7%</option>
                   <option value="D-8-9%">Deshidratación 8-9%</option>
                   <option value="D-10%">Deshidratación 10%</option>
                 </select>
                </div>
               </div>
               </div>
                <div class="row">
               <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                  <div class="form-group">
                  <label>Actitud:</label>
                 <select name="actitud" id="actitud" class="form-control" required="required">
                   <option value="Astenico">Asténico</option>
                    <option value="Apopletico">Apoplético</option>
                     <option value="Linfatico">Linfático</option>
                   </select>
                </div>
               </div>
               <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                  <div class="form-group">
                  <label>C.corporal:</label>
                 <select name="ccorporal" id="ccorporal" class="form-control" required="required">
                   <option value="Caquetico">Caquetico</option>
                   <option value="Delgado">Delgado</option>
                   <option value="Normal">Normal</option>
                   <option value="Obeso">Obeso</option>
                   <option value="Sobrepeso">Sobrepeso</option>
                   </select>
                </div>
               </div>
             </div> 
          <!-- END DE FORMULARIO -->
      </div>
      <div class="modal-footer">
        <button type="button" onclick="cerrarformularioexamen()" class="btn btn-danger" data-dismiss="modal">Salir</button>
        <button type="submit" id="btnGuardarexamen" name="btnGuardarexamen" class="btn btn-primary">Guardar</button>
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
    <script type="text/javascript" src="scripts/examen.js"></script>
         


