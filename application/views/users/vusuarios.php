<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $title ?>
        <small>Lista de Usuarios</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('chome');?>"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Usuarios</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Lista de Usuarios</h3>
              <?php echo anchor('cusers/create', 'Agregar Usuario', 'class="btn btn-primary btn-lg pull-right"') ?>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Usuario</th> 
                  <th>Email</th>
                  <th>Nombres</th>
                  <th>Teléfono</th>
                  <th>Rol</th>
                  <th></th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($usuarios as $usuario): ?>
                <tr>
                  <td><?php echo $usuario['user_id'] ?></td>
                  <td><?php echo $usuario['user_name'] ?></td>
                  <td><?php echo $usuario['user_email'] ?></td>
                  <td><?php echo $usuario['user_data'] ?></td>
                  <td><?php echo $usuario['user_mobile'] ?></td>
                  <td><?php echo $usuario['user_rol'] ?></td>
                  <td><?php echo anchor('cusers/user_view/'.$usuario['user_id'].'', 'Ver', 'title="Ver Usuario"'); ?></td>
                  <td><button type="button" class="btn btn-danger btn-xs" onclick='borrar_usuario("<?php echo $usuario['user_id'] ?>");' id="btn_delete" title="Borrar este item">Borrar</button></td>
                </tr>
                <?php endforeach; ?>
                </tbody>
                <tfoot>
                <tr>
                <th>ID</th>
                  <th>Usuario</th> 
                  <th>Email</th>
                  <th>Nombres</th>
                  <th>Teléfono</th>
                  <th>Rol</th>
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
    function borrar_usuario(str) {
        $.post("<?php echo base_url();?>cusuarios/delete",
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