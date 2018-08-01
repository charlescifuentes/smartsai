<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $title ?>
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('chome');?>"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="<?php echo base_url('creportes/report_clientes');?>"><i class="fa fa-dashboard"></i> Reportes Clientes</a></li>
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
              <h3 class="box-title">Reporte de Clientes</h3>
            </div>
            <div class="box-body">
             <table class="table table-bordered">
              <thead>
               <tr>
                <th>ID</th>
                <th>Fecha</th>
                <th>Nombres</th>
                <th>Teléfono</th>
                <th>Interés</th>
                <th>Presupuesto</th>
                <th>Tipo</th>
                <th>Observación</th>
               </tr>
              </thead>
              <tbody>
               <?php foreach($results as $result): ?>
                <tr>
                  <td><p style="font-size:12px;"><?php echo $result['id_cliente'] ?></p></td>
                  <td><p style="font-size:12px;"><?php echo date("d-m-Y", strtotime($result['fecha_creacion'])); ?></p></td>
                  <td><p style="font-size:12px;"><?php echo $result['nombres'] ?></p></td>
                  <td><p style="font-size:12px;"><?php echo $result['telefono'] ?></p></td>
                  <td><p style="font-size:12px;"><?php echo $result['tipo_nombre'] ?></p></td>
                  <td><p style="font-size:12px;"><?php echo "$ ".number_format($result['presupuesto'],0,',','.'); ?></p></td>
                  <td><p style="font-size:12px;"><?php echo $result['tipo_cliente_nombre'] ?></p></td>
                  <td><p style="font-size:12px;"><?php echo $result['anotaciones'] ?></p></td>
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