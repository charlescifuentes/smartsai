<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $title ?>
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('chome');?>"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="<?php echo base_url('creportes/report_propiedades');?>"><i class="fa fa-dashboard"></i> Reportes Propiedades</a></li>
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
              <h3 class="box-title">Reporte de Propiedades</h3>
            </div>
            <div class="box-body">
             <table class="table table-bordered">
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
              <tbody>
               <?php foreach($results as $result): ?>
                <tr>
                  <td><p style="font-size:12px;"><?php echo $result['id_propiedad'] ?></p></td>
                  <td><p style="font-size:12px;"><?php echo date("d-m-Y", strtotime($result['fecha_creacion'])); ?></p></td>
                  <td><p style="font-size:12px;"><?php echo $result['tipo_nombre'] ?></p></td>
                  <td><p style="font-size:12px;"><?php echo $result['ciudad_nombre'] ?></p></td>
                  <td><p style="font-size:12px;"><?php echo $result['barrio_nombre'] ?></p></td>
                  <td><p style="font-size:12px;"><?php echo "$ ".number_format($result['precio'],0,',','.'); ?></p></td>
                  <td><p style="font-size:12px;"><?php echo $result['objetivo_nombre'] ?></p></td>
                  <td><p style="font-size:12px;"><?php echo $result['nombres'] ?></p></td>
                  <td><p style="font-size:12px;"><?php echo $result['caracteristicas'] ?></p></td>
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