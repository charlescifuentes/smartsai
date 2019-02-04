<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $title ?>
        <small>Listado de propiedades</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('chome');?>"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Propiedades</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Listado de Propiedades</h3>
              <?php echo anchor('cpropiedades/create', 'Agregar Propiedad', 'class="btn btn-primary btn-lg pull-right"') ?>
            </div>
            <!-- /.box-header -->
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
                  <th>Activo</th>
                  <th></th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($propiedades as $propiedad): ?>
                <tr>
                  <td><?php echo $propiedad['id_propiedad'] ?></td>
                  <td><?php echo date("d-m-Y", strtotime($propiedad['fecha_creacion'])); ?></td>
                  <td><?php echo $propiedad['tipo_nombre'] ?></td>
                  <td><?php echo $propiedad['ciudad_nombre'] ?></td>
                  <td><?php echo $propiedad['barrio_nombre'] ?></td>
                  <td><?php echo "$ ".number_format($propiedad['precio'],0,',','.'); ?></td>
                  <td><?php echo $propiedad['objetivo_nombre'] ?></td>
                  <td><a href="<?php echo base_url('cclientes/view/'.$propiedad['id_cliente']);?>"><?php echo $propiedad['nombres'] ?></a></td>
                  <td><?php echo $propiedad['prop_activo'] ?></td>
                  <td><?php echo anchor('cpropiedades/view/'.$propiedad['id_propiedad'].'', 'Ver', 'title="Ver Propiedad"'); ?></td>
                  <td><button type="button" class="btn btn-danger btn-xs" onclick='borrar_propiedad("<?php echo $propiedad['id_propiedad'] ?>");' id="btn_delete" title="Borrar este item">Borrar</button></td>
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
                  <th>Activo</th>
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
    function borrar_propiedad(str) {
        $.post("<?php echo base_url();?>cpropiedades/delete",
            {
                propiedad: str
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