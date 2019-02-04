<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $title ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('chome');?>"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="<?php echo base_url('creportes/report_propiedades');?>"><i class="fa fa-dashboard"></i> Reporte Propiedades</a></li>
        <li class="active">Reporte de Propiedades</li>
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
              <h3 class="box-title">Reporte de Propiedades</h3>
              <?php echo anchor('creportes/impr_rep_propiedades/'.$id_tipo_propiedad.'/'.$id_ciudad.'/'.$id_barrio.'/'.$precio_desde.'/'.$precio_hasta.'/'.$id_objetivo.'/'.$prop_activo.'/', 'Imprimir', array('class' => 'btn btn-primary btn-xm pull-right','title'=>'Imprimir Reporte')); ?>
            </div>
            <div class="box-body">
             <div class="table-responsive">
             <table id="example1" class="table table-bordered table-striped table-hover">
               <thead>
                <tr>
                  <th>ID</th>
                  <th>Fecha</th>
                  <th>Tipo</th>
                  <th>Ciudad</th>
                  <th>Barrio</th>
                  <th>Precio</th>
                  <th>Objetivo</th>
                  <th>Propietario</th>
                  <th>Caracteristicas</th>
                </tr>
               </thead>
               <tbody id="myTable">
                <?php foreach($results as $result): ?>
                <tr>
                  <td><?php echo $result['id_propiedad'] ?></td>
                  <td><?php echo date("d-m-Y", strtotime($result['fecha_creacion'])); ?></td>
                  <td><?php echo $result['tipo_nombre'] ?></td>
                  <td><?php echo $result['ciudad_nombre'] ?></td>
                  <td><?php echo $result['barrio_nombre'] ?></td>
                  <td><?php echo "$ ".number_format($result['precio'],0,',','.'); ?></td>
                  <td><?php echo $result['objetivo_nombre'] ?></td>
                  <td><a href="#" onclick="mostrar_cliente('<?php echo $result['id_cliente'] ?>')"><?php echo $result['nombres'] ?></a></td>
                  <td><?php echo $result['caracteristicas'] ?></td>
                </tr>
                <?php endforeach; ?>
               </tbody>
               <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Fecha</th>
                  <th>Tipo</th>
                  <th>Ciudad</th>
                  <th>Barrio</th>
                  <th>Precio</th>
                  <th>Objetivo</th>
                  <th>Propietario</th>
                  <th>Caracteristicas</th>
                </tr>
               </tfoot>
             </table>
             </div>
              <!-- Modal -->
              <div class="modal modal-info fade" id="myModal" role="dialog">
                <div class="modal-dialog">
                
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Datos del Cliente</h4>
                    </div>
                    <div class="modal-body">
                      <ul class="list-group" style="color: black;">
                        <li class="list-group-item" id="id_cliente"></li>
                        <li class="list-group-item" id="identificacion"></li>
                        <li class="list-group-item" id="fecha_creacion"></li>
                        <li class="list-group-item" id="nombres"></li>
                        <li class="list-group-item" id="telefono"></li>
                        <li class="list-group-item" id="tipo_nombre"></li>
                        <li class="list-group-item" id="presupuesto"></li>
                        <li class="list-group-item" id="barrios_interes"></li>
                        <li class="list-group-item" id="caracteristicas_interes"></li>
                        <li class="list-group-item" id="anotaciones"></li>
                        <li class="list-group-item" id="tipo_cliente_nombre"></li>
                        <li class="list-group-item" id="fecha_contactar"></li>
                        <li class="list-group-item" id="cli_activo"></li>
                      </ul>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                  
                </div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

    <script>
    function mostrar_cliente(str) {
      $.post("<?php echo base_url();?>creportes/modal_cliente",
      {
        id_cliente: str
      },
      function(data){
        var cv = JSON.parse(data);
        $('#id_cliente').text("ID Cliente: "+cv.id_cliente);
        $('#identificacion').text("Identificación: "+cv.identificacion);
        $('#fecha_creacion').text("Fecha Creación: "+cv.fecha_creacion);
        $('#nombres').text("Nombres: "+cv.nombres);
        $('#telefono').text("Teléfono: "+cv.telefono);
        $('#tipo_nombre').text("Propiedad Interés: "+cv.tipo_nombre);
        $('#presupuesto').text("Presupuesto: "+cv.presupuesto);
        $('#barrios_interes').text("Barrio Interés: "+ cv.barrios_interes);
        $('#caracteristicas_interes').text("Características Interés: "+cv.caracteristicas_interes);
        $('#anotaciones').text("Anotaciones: "+cv.anotaciones);
        $('#tipo_cliente_nombre').text("Tipo de Cliente: "+cv.tipo_cliente_nombre);
        $('#fecha_contactar').text("Fecha a contactar: "+cv.fecha_contactar);
        $('#cli_activo').text("Activo: "+cv.cli_activo);
      });
          $('#myModal').modal('show');
    }
    </script>