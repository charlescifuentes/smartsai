<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $title ?>
        <small>Tipo de Propiedades</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('chome');?>"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Tipo de Propiedades</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tipo de Propiedades</h3>
              <?php echo anchor('copciones/create_tipo_propiedad', 'Agregar Tipo de Propiedad', 'class="btn btn-primary btn-lg pull-right"') ?>
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
                <?php foreach($tipos as $tipo): ?>
                <tr>
                  <td><?php echo $tipo['id_tipo'] ?></td>
                  <td><?php echo $tipo['tipo_nombre'] ?></td>
                  <td><?php echo anchor('copciones/view_tipo_propiedad/'.$tipo['id_tipo'].'', 'Ver', 'title="Ver Tipo"'); ?></td>
                  <td><button type="button" class="btn btn-danger btn-xs" onclick='borrar_tipo("<?php echo $tipo['id_tipo'] ?>");' id="btn_delete" title="Borrar este item">Borrar</button></td>
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
    function borrar_tipo(str) {
        $.post("<?php echo base_url();?>copciones/delete_tipo_propiedad",
            {
                tipo: str
            },
            function (data){
                if (data == 1) {
                    location.reload();
                }
                else{
                    alert("no se puede borrar");
                var vr = JSON.parse(data);
                    alert("No se puede eliminar este registro porque ya tiene movimientos en Propiedades - Código de error: " + vr.code);
                }
            });
    }
</script>