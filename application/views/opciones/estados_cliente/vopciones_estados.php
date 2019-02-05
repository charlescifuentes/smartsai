<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $title ?>
        <small>Clientes</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('chome');?>"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Estados de Clientes</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Estados de Clientes</h3>
              <?php echo anchor('copciones/create_estado_cliente', 'Agregar Estado de Cliente', 'class="btn btn-primary btn-lg pull-right"') ?>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Nombre</th>
                  <th></th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($estados as $estado): ?>
                <tr>
                  <td><?php echo $estado['id_estado_cliente'] ?></td>
                  <td><?php echo $estado['estado_cliente_nombre'] ?></td>
                  <td><?php echo anchor('copciones/view_estado_cliente/'.$estado['id_estado_cliente'].'', 'Ver', 'title="Ver Estado"'); ?></td>
                  <td><button type="button" class="btn btn-danger btn-xs" onclick='borrar_estado("<?php echo $estado['id_estado_cliente'] ?>");' id="btn_delete" title="Borrar este item">Borrar</button></td>
                </tr>
                <?php endforeach; ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Nombre</th>
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
    function borrar_estado(str) {
      if (confirm("Deseas borrar este item!")) {
        $.post("<?php echo base_url();?>copciones/delete_estado_cliente",
        {
          estado: str
        },
        function (data){
          if (data == 1) {
            alert("El item se ha borrado!");
            location.reload();
          }
          else{
            alert("no se puede borrar");
            var vr = JSON.parse(data);
            alert("No se puede eliminar este registro porque ya tiene movimientos en Clientes - Código de error: " + vr.code);
          }
        });
      } else {
        alert("No se borrará nada!");
      }
    }
</script>