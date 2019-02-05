<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Panel de control
        <small>Version 1.0</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('chome');?>"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Panel de control</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-md-12">
          <!-- TABLE: ÚLTIMAS PROPIEDADES -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Nuevas Propiedades</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                    <tr>
                     <th>ID</th>
                     <th>Fecha</th>
                     <th>Tipo</th>
                     <th>Barrio</th>
                     <th>Precio</th>
                     <th>Objetivo</th>
                     <th>Propietario</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach($propiedades as $propiedad): ?>
                   <tr>
                    <td><?php echo $propiedad['id_propiedad'] ?></td>
                    <td><?php echo date("d-m-Y", strtotime($propiedad['fecha_creacion'])); ?></td>
                    <td><?php echo $propiedad['tipo_nombre'] ?></td>
                    <td><?php echo $propiedad['barrio_nombre'] ?></td>
                    <td><?php echo "$ ".number_format($propiedad['precio'],0,',','.'); ?></td>
                    <td><?php echo $propiedad['objetivo_nombre'] ?></td>
                    <td><?php echo $propiedad['nombres'] ?></td>
                   </tr>
                   <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <a href="<?php echo base_url('cpropiedades');?>" class="btn btn-sm btn-success btn-flat pull-left">Ver todas</a>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <!-- Info boxes -->
      <div class="row">
        <div class="col-md-12">
          <!-- TABLE: ÚLTIMOS CLIENTES -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Clientes Recientes</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
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
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach($clientes as $cliente): ?>
                    <tr>
                     <td><?php echo $cliente['id_cliente'] ?></td>
                     <td><?php echo date("d-m-Y", strtotime($cliente['fecha_creacion'])); ?></td>
                     <td><?php echo $cliente['nombres'] ?></td>
                     <td><?php echo $cliente['telefono'] ?></td>
                     <td><?php echo $cliente['tipo_nombre'] ?></td>
                     <td><?php echo "$ ".number_format($cliente['presupuesto'],0,',','.'); ?></td>
                     <td><?php echo $cliente['tipo_cliente_nombre'] ?></td>
                     <td><?php echo $cliente['estado_cliente_nombre'] ?></td>
                    </tr>
                <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <a href="<?php echo base_url('cclientes');?>" class="btn btn-sm btn-info btn-flat pull-left">Ver todos</a>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->