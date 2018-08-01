<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $title ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('chome');?>"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Reporte Propiedades</li>
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
            <?php echo form_open('creportes/report_propiedades_result'); ?>
            <div class="box-body">
              <div class="form-group">
               <label>Tipo de Propiedad</label>
               <div class="input-group">
                <span class="input-group-addon">
                 <i class="fa fa-home"></i>
                </span>
                <select class="form-control select2" name="tipo_propiedad">
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
               <label>Ciudad</label>
               <div class="input-group">
                <span class="input-group-addon">
                 <i class="fa fa-map-o"></i>
                </span>
                <select class="form-control select2" name="ciudad">
                <option selected="selected" value="null"></option>
                 <?php foreach($ciudades as $ciudad): ?>
                 <option value=<?php echo $ciudad['id_ciudad'] ?>><?php echo $ciudad['ciudad_nombre'] ?></option>
                 <?php endforeach; ?>
                </select>
               </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
              <div class="form-group">
               <label>Barrio</label>
               <div class="input-group">
                <span class="input-group-addon">
                 <i class="fa fa-map-signs"></i>
                </span>
                <select class="form-control select2" name="barrio">
                <option selected="selected" value="null"></option>
                 <?php foreach($barrios as $barrio): ?>
                 <option value=<?php echo $barrio['id_barrio'] ?>><?php echo $barrio['barrio_nombre'] ?></option>
                 <?php endforeach; ?>
                </select>
               </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
              <div class="form-group">
               <label>Precio desde</label>
               <div class="input-group">
                <span class="input-group-addon">
                 <i class="fa fa-dollar"></i>
                </span>
                <input type="text" class="form-control" name="precio_desde" value="0">
               </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
              <div class="form-group">
               <label>Precio hasta</label>
               <div class="input-group">
                <span class="input-group-addon">
                 <i class="fa fa-dollar"></i>
                </span>
                <input type="text" class="form-control" name="precio_hasta" value="999999999">
               </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
              <div class="form-group">
               <label>Objetivo</label>
               <div class="input-group">
                <span class="input-group-addon">
                 <i class="fa fa-tasks"></i>
                </span>
                <select class="form-control select2" name="objetivo">
                <option selected="selected" value="null"></option>
                 <?php foreach($objetivos as $objetivo): ?>
                 <option value=<?php echo $objetivo['id_objetivo'] ?>><?php echo $objetivo['objetivo_nombre'] ?></option>
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
                <select class="form-control select2" name="prop_activo">
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