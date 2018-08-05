<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $title ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('chome');?>"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="<?php echo base_url('creportes/report_egresosf_detalle');?>"><i class="fa fa-dashboard"></i> Reporte Egresos</a></li>
        <li class="active">Reporte de Egresos</li>
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
              <h3 class="box-title">Reporte de Egresos</h3>
              <?php echo anchor('creportes/impr_rep_egresosf_detalle/'.$fecha_desde.'/'.$fecha_hasta.'/'.$tipo_egreso.'/', 'Imprimir', array('class' => 'btn btn-primary btn-xm pull-right','title'=>'Imprimir Reporte')); ?>
            </div>
            <div class="box-body">
              <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped table-hover">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Fecha</th>
                  <th>Tipo</th>
                  <th>Tercero</th>
                  <th>Valor</th>
                  <th>Observación</th>
                </tr>
               </thead>
               <tbody id="myTable">
                <?php foreach($results as $result): ?>
                <tr>
                  <td><?php echo $result['id_egreso'] ?></td>
                  <td><?php echo date("d-m-Y", strtotime($result['fecha'])); ?></td>
                  <td><?php echo $result['nombre'] ?></td>
                  <td><?php echo $result['nombres'] ?></td>
                  <td><?php echo "$ ".number_format($result['valor'],0,',','.'); ?></td>
                  <td><?php echo $result['observacion'] ?></td>
                  <?php $total_valor_egresos += $result['valor'] ?>
                </tr>
                <?php endforeach; ?>
               </tbody>
               <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Fecha</th>
                  <th>Tipo</th>
                  <th>Tercero</th>
                  <th>Valor</th>
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
      
      <!-- CUADRO DE TOTALES -->

      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-4 col-sm-6 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo "$ ".number_format($total_valor_egresos,0,',','.'); ?></h3>

              <p>TOTAL EGRESOS</p>
            </div>
            <div class="icon">
              <i class="fa  fa-dollar (alias)"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-md-8 col-sm-6 col-xs-12">
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
    </section>
    <!-- /.content -->