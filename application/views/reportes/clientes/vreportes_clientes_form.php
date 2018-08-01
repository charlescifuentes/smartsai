<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $title ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('chome');?>"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Reporte Clientes</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-4 col-md-offset-4">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Seleccione opciones</h3>
            </div>
            <?php echo validation_errors(); ?>
            <?php echo form_open('creportes/report_clientes_result'); ?>
            <div class="box-body">
              <div class="form-group">
               <label>Tipo de Cliente</label>
               <div class="input-group">
                <span class="input-group-addon">
                 <i class="fa fa-list"></i>
                </span>
                <select class="form-control select2" name="tipo_cliente">
                <option selected="selected" value="null"></option>
                 <?php foreach($tclientes as $tcliente): ?>
                    <option value=<?php echo $tcliente['id_tipo_cliente'] ?>><?php echo $tcliente['tipo_cliente_nombre'] ?></option>
                 <?php endforeach; ?>
                </select>
               </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
              <div class="form-group">
               <label>Interes</label>
               <div class="input-group">
                <span class="input-group-addon">
                 <i class="fa fa-home"></i>
                </span>
                <select class="form-control select2" name="interes">
                <option selected="selected" value="null"></option>
                 <?php foreach($tpropiedades as $tpropiedad): ?>
                 <option value=<?php echo $tpropiedad['id_tipo'] ?>><?php echo $tpropiedad['tipo_nombre'] ?></option>
                 <?php endforeach; ?>
                </select>
               </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
              <div class="form-group">
               <label>Presupuesto desde</label>
               <div class="input-group">
                <span class="input-group-addon">
                 <i class="fa fa-dollar"></i>
                </span>
                <input type="text" class="form-control" name="presupuesto_desde" value="0">
               </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
              <div class="form-group">
               <label>Presupuesto hasta</label>
               <div class="input-group">
                <span class="input-group-addon">
                 <i class="fa fa-dollar"></i>
                </span>
                <input type="text" class="form-control" name="presupuesto_hasta" value="999999999">
               </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
              <div class="form-group">
               <label>Nombres</label>
               <div class="input-group">
                <span class="input-group-addon">
                 <i class="fa fa-user"></i>
                </span>
                <select class="form-control select2" name="cliente_nombre">
                <option selected="selected" value="null"></option>
                 <?php foreach($nom_clientes as $nom_cliente): ?>
                 <option value=<?php echo $nom_cliente['id_cliente'] ?>><?php echo $nom_cliente['nombres'] ?></option>
                 <?php endforeach; ?>
                </select>
               </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
              <div class="form-group">
               <label>Activo</label>
               <div class="input-group">
                <span class="input-group-addon">
                 <i class="fa fa-check-square-o"></i>
                </span>
                <select class="form-control select2" name="cli_activo">
                 <option value="si">Si</option>
                 <option value="no">No</option>
                </select>
               </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
              <button type="submit" class="btn btn-primary btn-lg pull-right">Generar Reporte</button>
            </div>
            <?php echo form_close(); ?>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->