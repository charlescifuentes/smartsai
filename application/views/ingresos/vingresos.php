<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
  <?php echo $title ?>
  <small>Ingresos</small>
</h1>
<ol class="breadcrumb">
  <li><a href="<?php echo base_url('chome');?>"><i class="fa fa-dashboard"></i> Inicio</a></li>
  <li class="active">Ingresos</li>
</ol>
</section>

<!-- Main content -->
<section class="content">
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Ingresos Recientes</h3>
        <?php echo anchor('cingresos/create', 'Agregar Ingreso', 'class="btn btn-primary btn-lg pull-right"') ?>
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
            <th>Tercero</th>
            <th>Valor</th>
            <th>Observación</th>
            <th></th>
            <th></th>
          </tr>
          </thead>
          <tbody>
          <?php foreach($ingresos as $ingreso): ?>
          <tr>
            <td><?php echo $ingreso['id'] ?></td>
            <td><?php echo date("d-m-Y", strtotime($ingreso['fecha'])); ?></td>
            <td><?php echo $ingreso['nombre'] ?></td>
            <td><?php echo $ingreso['nombres'] ?></td>
            <td><?php echo "$ ".number_format($ingreso['valor'],0,',','.'); ?></td>
            <td><?php echo $ingreso['observacion'] ?></td>
            <td><?php echo anchor('cingresos/view/'.$ingreso['id'].'', 'Ver', 'title="Ver Ingreso"'); ?></td>
            <td><button type="button" class="btn btn-danger btn-xs" onclick='borrar_ingreso("<?php echo $ingreso['id'] ?>");' id="btn_delete" title="Borrar este item">Borrar</button></td>
          </tr>
          <?php endforeach; ?>
          </tbody>
          <tfoot>
          <tr>
          <th>ID</th>
          <th>Fecha</th>
          <th>Tipo</th>
          <th>Tercero</th>
          <th>Valor</th>
          <th>Observación</th>
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
function borrar_ingreso(str) {
  $.post("<?php echo base_url();?>cingresos/delete",
      {
          ingreso: str
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