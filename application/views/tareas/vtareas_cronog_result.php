<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
        <?php echo $title ?>
        <small>Lista de Tareas</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('chome');?>"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Tareas</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Lista de tareas</h3>
              <?php echo anchor('ctareas/create_tarea', 'Agregar Tarea', 'class="btn btn-primary btn-lg pull-right"') ?>
            </div>
            <!-- /.box-header -->
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
                  <th></th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($tareas as $tarea): ?>
                <tr>
                  <td><?php echo $tarea['id_tarea'] ?></td>
                  <td><?php echo date("d-m-Y", strtotime($tarea['tarea_fecha_inicio'])); ?></td>
                  <td><?php echo $tarea['tarea_descripcion'] ?></td>
                  <td><?php echo date("d-m-Y", strtotime($tarea['tarea_fecha_fin'])); ?></td>
                  <td><?php echo $tarea['user_data'] ?></td>
                  <td><?php echo anchor('ctareas/view_tarea/'.$tarea['id_tarea'].'', 'Ver', 'title="Ver Tarea"'); ?></td>
                  <td><button type="button" class="btn btn-danger btn-xs" onclick='borrar_tarea("<?php echo $tarea['id_tarea'] ?>");' id="btn_delete" title="Borrar este item">Borrar</button></td>
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
    function borrar_tarea(str) {
      if (confirm("Deseas borrar este item!")) {
        $.post("<?php echo base_url();?>ctareas/delete_tarea",
        {
          id_tarea: str
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