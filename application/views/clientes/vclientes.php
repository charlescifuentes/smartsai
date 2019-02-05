<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $title ?>
        <small>Listado de Clientes</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('chome');?>"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Clientes</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Listado de Clientes</h3>
              <?php echo anchor('cclientes/create', 'Agregar Cliente', 'class="btn btn-primary btn-lg pull-right"') ?>
            </div>
            <!-- /.box-header -->
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
                  <th></th>
                  <th></th>
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
                  <td><?php echo anchor('cclientes/view/'.$cliente['id_cliente'].'', 'Ver', 'title="Ver Cliente"'); ?></td>
                  <td><button type="button" class="btn btn-danger btn-xs" onclick='borrar_cliente("<?php echo $cliente['id_cliente'] ?>");' id="btn_delete" title="Borrar este item">Borrar</button></td>
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
                  <th></th>
                  <th></th>
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

<script>
    function borrar_cliente(str) {
        $.post("<?php echo base_url();?>cclientes/delete",
            {
                cliente: str
            },
            function (data){
                if (data == 1) {
                    location.reload();
                }
                else{
                var vr = JSON.parse(data);
                    alert("No se puede eliminar este registro porque ya tiene movimientos en Propiedades - Código de error: " + vr.code);
                }
            });
    }
</script>