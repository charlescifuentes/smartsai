<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $title ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('chome');?>"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="<?php echo base_url('creportes/report_clientes');?>"><i class="fa fa-dashboard"></i> Reporte Clientes</a></li>
        <li class="active">Reporte de Clientes</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     <!-- /.row -->
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title"></h3>
              <?php date_default_timezone_set('America/Bogota'); ?>
              <h3 class="box-title">Reporte de Clientes</h3>
              <?php echo anchor('creportes/impr_rep_clientes/'.$id_tipo_cliente.'/'.$id_interes.'/'.$presupuesto_desde.'/'.$presupuesto_hasta.'/'.$cliente_nombre.'/'.$id_estado_cliente.'/', 'Imprimir', array('class' => 'btn btn-primary btn-xm pull-right','title'=>'Imprimir Reporte')); ?>
            </div>
            <div class="box-body">
             <div class="table-responsive">
             <table id="example1" class="table table-bordered table-striped table-hover">
               <thead>
                <tr>
                  <th>ID</th>
                  <th>Fecha</th>
                  <th>Nombres</th>
                  <th>Teléfono</th>
                  <th>Interés</th>
                  <th>Presupuesto</th>
                  <th>Tipo</th>
                  <th>Estado</th>
                  <th>Observación</th>
                </tr>
               </thead>
               <tbody id="myTable">
                <?php foreach($results as $result): ?>
                <tr>
                  <td><?php echo $result['id_cliente'] ?></td>
                  <td><?php echo date("d-m-Y", strtotime($result['fecha_creacion'])); ?></td>
                  <td><?php echo $result['nombres'] ?></td>
                  <td><?php echo $result['telefono'] ?></td>
                  <td><?php echo $result['tipo_nombre'] ?></td>
                  <td><?php echo "$ ".number_format($result['presupuesto'],0,',','.'); ?></td>
                  <td><?php echo $result['tipo_cliente_nombre'] ?></td>
                  <td><?php echo $result['estado_cliente_nombre'] ?></td>
                    <?php $anotaciones = $result['anotaciones'] ?>
                    <?php $anotaciones = preg_replace("/[\r\n|\n|\r]+/", " ", $anotaciones); ?>
                  <td><?php echo '<button type="button" class="btn btn-info btn-sm" onclick="modal_anotacion(\''.$anotaciones.'\')">Mostrar</button>'?></td>
                </tr>
                <?php endforeach; ?>
               </tbody>
               <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Fecha</th>
                  <th>Nombres</th>
                  <th>Teléfono</th>
                  <th>Interés</th>
                  <th>Presupuesto</th>
                  <th>Tipo</th>
                  <th>Estado</th>
                  <th>Observación</th>
                </tr>
               </tfoot>
             </table>
             </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
        <!-- Modal -->
        <div class="modal modal-info fade" id="myModal" role="dialog">
          <div class="modal-dialog modal-sm">
          
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Anotaciones Cliente</h4>
              </div>
              <div class="modal-body">
                <p id="anotaciones"></p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline" data-dismiss="modal">Close</button>
              </div>
            </div>
            
          </div>
        </div>
    </section>
    <!-- /.content -->

    <script>
      function modal_anotacion($str) {
        $('#anotaciones').html($str);
        $('#myModal').modal('show');
      }
    </script>