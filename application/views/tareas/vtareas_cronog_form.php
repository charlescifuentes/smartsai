<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $title ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('chome');?>"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Cronograma de Tareas</li>
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
            <?php echo form_open('ctareas/cronograma_tareas_result'); ?>
            <div class="box-body">
              
              <!-- Fecha Desde -->
              <div class="form-group">
                <label>Desde:</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <?php date_default_timezone_set('America/Bogota'); ?>
                  <input type="date" class="form-control" name="fecha_desde" value="<?php echo date("Y-m-d");?>">
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->

              <!-- Fecha Hasta -->
              <div class="form-group">
                <label>Hasta:</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" class="form-control" name="fecha_hasta" value="<?php echo date("Y-m-d");?>">
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->

              <!-- Tipo de Ingreso -->
              <div class="form-group">
               <label>Encargado</label>
               <div class="input-group">
                <span class="input-group-addon">
                 <i class="fa fa-list"></i>
                </span>
                <select class="form-control select2" name="user_name">
                <option selected="selected" value="null"></option>
                 <?php foreach($tusers as $tuser): ?>
                    <option value=<?php echo $tuser['user_name'] ?>><?php echo $tuser['user_data'] ?></option>
                 <?php endforeach; ?>
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