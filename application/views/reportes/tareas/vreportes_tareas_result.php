<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $title ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('chome');?>"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="<?php echo base_url('creportes/report_tareas');?>"><i class="fa fa-dashboard"></i> Reporte Tareas</a></li>
        <li class="active">Reporte de Tareas</li>
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
              <h3 class="box-title">Reporte de Tareas</h3>
              <?php echo anchor('creportes/impr_rep_tareas/'.$fecha_desde.'/'.$fecha_hasta.'/'.$user_name.'/', 'Imprimir', array('class' => 'btn btn-primary btn-xm pull-right','title'=>'Imprimir Reporte')); ?>
            </div>
            <div class="box-body">
              <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Fecha Creación</th>
                  <th>Descripción</th>
                  <th>Fecha a Realizar</th>
                  <th>Encargado</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($results as $result): ?>
                <tr>
                  <td><?php echo $result['id_tarea'] ?></td>
                  <td><?php echo date("d-m-Y", strtotime($result['tarea_fecha_inicio'])); ?></td>
                  <td><?php echo $result['tarea_descripcion'] ?></td>
                  <td><?php echo date("d-m-Y", strtotime($result['tarea_fecha_fin'])); ?></td>
                  <td><?php echo $result['user_data'] ?></td>
                </tr>
                <?php endforeach; ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Fecha Creación</th>
                  <th>Descripción</th>
                  <th>Fecha a Realizar</th>
                  <th>Encargado</th>
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
    </section>
    <!-- /.content -->