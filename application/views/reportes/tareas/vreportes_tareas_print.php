﻿<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $title ?>
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('chome');?>"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="<?php echo base_url('creportes/report_report_tareas');?>"><i class="fa fa-dashboard"></i> Reporte Tareas</a></li>
        <li class="active"><?php echo $title ?></li>
      </ol>
    </section>

    <div class="pad margin no-print">
      <div class="callout callout-info" style="margin-bottom: 0!important;">
        <h4><i class="fa fa-info"></i> Nota:</h4>
        Este informe es para impresión
      </div>
    </div>

    <section class="content">
     <!-- /.row -->
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Reporte de Tareas</h3>
            </div>
            <div class="box-body">
             <table class="table table-bordered">
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
                  <td><p style="font-size:12px;"><?php echo $result['id_tarea'] ?></p></td>
                  <td><p style="font-size:12px;"><?php echo date("d-m-Y", strtotime($result['tarea_fecha_inicio'])); ?></p></td>
                  <td><p style="font-size:12px;"><?php echo $result['tarea_descripcion'] ?></p></td>
                  <td><p style="font-size:12px;"><?php echo date("d-m-Y", strtotime($result['tarea_fecha_fin'])); ?></p></td>
                  <td><p style="font-size:12px;"><?php echo $result['user_data'] ?></p></td>
                </tr>
                <?php endforeach; ?>
              </tbody>
             </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- CUADRO DE TOTALES -->

      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><sup style="font-size: 20px">Del </sup><?php echo date("d-m-Y", strtotime($fecha_desde)); ?><sup style="font-size: 20px"> Al </sup><?php echo date("d-m-Y", strtotime($fecha_hasta)); ?></h3>

              <p>RANGO</p>
            </div>
            <div class="icon">
              <i class="fa fa-stack-overflow"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <a href="" class="btn btn-primary pull-right" style="margin-right: 5px;" onclick="myFunction()">
            <i class="fa fa-print"></i>Imprimir
          </a>
        </div>
      </div>
    </section>
    <!-- /.content -->

    <script>
        function myFunction(){
            window.print();
        }
    </script>