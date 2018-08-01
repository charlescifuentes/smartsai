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
                  <td><?php echo $result['nombres'] ?></td>
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