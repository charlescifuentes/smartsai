<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $title ?>
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('chome');?>"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="<?php echo base_url('creportes/report_pyg_resumen');?>"><i class="fa fa-dashboard"></i> Estado de Resultados</a></li>
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
        <!-- INGRESOS FIJOS -->
        <div class="col-md-6 col-sm-6 col-xs-6">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">INGRESOS FIJOS</h3>
            </div>
            <div class="box-body">
             <table class="table table-bordered">
              <thead>
               <tr>
                <th>Tipo de Ingreso</th>
                <th>Total</th>
              </thead>
              <tbody>
                <?php foreach($ingresos as $ingreso): ?>
                <tr>
                  <td><p style="font-size:12px;"><?php echo $ingreso['nombre'] ?></p></td>
                  <td><p style="font-size:12px;"><?php echo "$ ".number_format($ingreso['total'],0,',','.'); ?></p></td>
                  <?php $total_valor_ingresos += $ingreso['total'] ?>
                </tr>
                <?php endforeach; ?>
              </tbody>
             </table>
              <!-- small box Total -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?php echo "$ ".number_format($total_valor_ingresos,0,',','.'); ?></h3>
                  <p>TOTAL INGRESOS</p>
                </div>
                <div class="icon">
                  <i class="fa  fa-dollar (alias)"></i>
                </div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <!-- EGRESOS FIJOS -->
        <div class="col-md-6 col-sm-6 col-xs-6">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">EGRESOS FIJOS</h3>
            </div>
            <div class="box-body">
             <table class="table table-bordered">
              <thead>
               <tr>
                <th>Tipo de Ingreso</th>
                <th>Total</th>
              </thead>
              <tbody>
                <?php foreach($egresos as $egreso): ?>
                <tr>
                  <td><p style="font-size:12px;"><?php echo $egreso['nombre'] ?></p></td>
                  <td><p style="font-size:12px;"><?php echo "$ ".number_format($egreso['total'],0,',','.'); ?></p></td>
                  <?php $total_valor_egresos += $egreso['total'] ?>
                </tr>
                <?php endforeach; ?>
              </tbody>
             </table>
              <!-- small box Total -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3><?php echo "$ ".number_format($total_valor_egresos,0,',','.'); ?></h3>
                  <p>TOTAL EGRESOS</p>
                </div>
                <div class="icon">
                  <i class="fa  fa-dollar (alias)"></i>
                </div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- CUADRO DE TOTALES -->

      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <?php $pog = $total_valor_ingresos - $total_valor_egresos ?>
              <h3><?php echo "$ ".number_format($pog,0,',','.'); ?></h3>
              <p>PERDIDAS O GANANCIAS</p>
            </div>
            <div class="icon">
              <i class="fa  fa-dollar (alias)"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-md-6 col-sm-6 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <?php foreach($prestamos as $prestamo): ?>
                <?php $total_valor_prestamos += $prestamo['total'] ?>
              <?php endforeach; ?>
              <h3><?php echo "$ ".number_format($total_valor_prestamos,0,',','.'); ?></h3>
              <p>PRESTAMOS A INMOBILIARIA</p>
            </div>
            <div class="icon">
              <i class="fa  fa-dollar (alias)"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><sup style="font-size: 20px">Del </sup><?php echo date("d-m-Y", strtotime($fecha_desde)); ?><sup style="font-size: 20px"> Al </sup><?php echo date("d-m-Y", strtotime($fecha_hasta)); ?></h3>
              <p>RANGO DE FECHAS</p>
            </div>
            <div class="icon">
              <i class="fa fa-stack-overflow"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
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