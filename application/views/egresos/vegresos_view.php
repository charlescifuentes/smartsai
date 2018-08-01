<!-- Content Header (Page header) -->
<section class="content-header">
            <h1>
                <?php echo $title ?>
                <small>Egresos</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url('chome');?>"><i class="fa fa-dashboard"></i> Inicio</a></li>
                <li><a href="<?php echo base_url('cegresos');?>"><i class="fa fa-dashboard"></i> Egresos</a></li>
                <li class="active">Egreso</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">DETALLE EGRESO</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <?php echo validation_errors(); ?>
                        <?php echo form_open('cegresos/update', 'class="form-horizontal"'); ?>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="id_egreso" class="col-sm-2 control-label">ID</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="id_egreso" value="<?php echo $egreso['id_egreso'] ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="fecha" class="col-sm-2 control-label">Fecha Creación:</label>
                                <div class="col-sm-10">
                                    <?php date_default_timezone_set('America/Bogota'); ?>
                                    <input type="date" class="form-control" name="fecha" value="<?php echo date("Y-m-d", strtotime($egreso['fecha'])); ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="id_tipo" class="col-sm-2 control-label">Tipo Egreso</label>
                                <div class="col-sm-10">
                                    <select class="form-control select2" name="id_tipo" style="width: 100%;" required>
                                        <option value="<?php echo $egreso['id_tipo_egreso'] ?>" selected="selected"><?php echo $egreso['nombre'] ?></option>
                                        <?php foreach($tegresos as $tegreso): ?>
                                        <option value=<?php echo $tegreso['id'] ?>><?php echo $tegreso['nombre'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="id_tercero" class="col-sm-2 control-label">Tercero</label>
                                <div class="col-sm-10">
                                    <select class="form-control select2" name="id_tercero" style="width: 100%;" required>
                                    <option value="<?php echo $egreso['id_cliente'] ?>" selected="selected"><?php echo $egreso['nombres'] ?></option>
                                        <?php foreach($clientes as $cliente): ?>
                                        <option value=<?php echo $cliente['id_cliente'] ?>><?php echo $cliente['nombres'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="valor" class="col-sm-2 control-label">Valor</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="valor" value="<?php echo $egreso['valor'] ?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="observacion" class="col-sm-2 control-label">Observación</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="observacion" value="<?php echo $egreso['observacion'] ?>">
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