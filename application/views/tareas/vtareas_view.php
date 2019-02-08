<!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <?php echo $title ?>
                <small>Clientes</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url('chome');?>"><i class="fa fa-dashboard"></i> Inicio</a></li>
                <li><a href="<?php echo base_url('ctareas');?>"><i class="fa fa-dashboard"></i> Tareas</a></li>
                <li class="active">Tarea</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">DETALLE TAREA</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <?php echo validation_errors(); ?>
                        <?php echo form_open('ctareas/update_tarea', 'class="form-horizontal"'); ?>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="id_tarea" class="col-sm-2 control-label">ID</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="id_tarea" value="<?php echo $tarea['id_tarea'] ?>" readonly>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="tarea_fecha_inicio" class="col-sm-2 control-label">Fecha Creación:</label>
                                <div class="col-sm-10">
                                    <?php date_default_timezone_set('America/Bogota'); ?>
                                    <input type="date" class="form-control" name="tarea_fecha_inicio" value="<?php echo date("Y-m-d", strtotime($tarea['tarea_fecha_inicio'])); ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tarea_descripcion" class="col-sm-2 control-label">Descripción</label>
                                <div class="col-sm-10">
                                    <?php date_default_timezone_set('America/Bogota'); ?>
                                    <input type="text" class="form-control" name="tarea_descripcion" value="<?php echo $tarea['tarea_descripcion'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tarea_fecha_fin" class="col-sm-2 control-label">Fecha a Realizar:</label>
                                <div class="col-sm-10">
                                    <?php date_default_timezone_set('America/Bogota'); ?>
                                    <input type="date" class="form-control" name="tarea_fecha_fin" value="<?php echo date("Y-m-d", strtotime($tarea['tarea_fecha_fin'])); ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="user_name" class="col-sm-2 control-label">Asesor</label>
                                <div class="col-sm-10">
                                    <select class="form-control select2" name="user_name" style="width: 100%;">
                                        <option value="<?php echo $tarea['user_name'] ?>" selected="selected"><?php echo $tarea['user_data'] ?></option>
                                        <?php foreach($usuarios as $usuario): ?>
                                        <option value=<?php echo $usuario['user_name'] ?>><?php echo $usuario['user_data'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                                <button type="submit" class="btn btn-primary pull-right">Guardar</button>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                    <!-- /.box -->
                </div>
                <!--/.col -->
            </div>
        </section>
        <!-- /.content -->