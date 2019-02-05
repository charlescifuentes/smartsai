<!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <?php echo $title ?>
                <small>Clientes</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url('chome');?>"><i class="fa fa-dashboard"></i> Inicio</a></li>
                <li><a href="<?php echo base_url('cclientes');?>"><i class="fa fa-dashboard"></i> Clientes</a></li>
                <li class="active">Cliente</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">DETALLE CLIENTE</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <?php echo validation_errors(); ?>
                        <?php echo form_open('cclientes/update', 'class="form-horizontal"'); ?>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="id_cliente" class="col-sm-2 control-label">ID</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="id_cliente" value="<?php echo $cliente['id_cliente'] ?>" readonly>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="identificacion" class="col-sm-2 control-label">Identificación</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="identificacion" value="<?php echo $cliente['identificacion'] ?>">
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="fecha_creacion" class="col-sm-2 control-label">Fecha Creación:</label>
                                <div class="col-sm-10">
                                    <?php date_default_timezone_set('America/Bogota'); ?>
                                    <input type="date" class="form-control" name="fecha_creacion" value="<?php echo date("Y-m-d", strtotime($cliente['fecha_creacion'])); ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nombres" class="col-sm-2 control-label">Nombres</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nombres" value="<?php echo $cliente['nombres'] ?>" required>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="telefono" class="col-sm-2 control-label">Teléfono</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="telefono" value="<?php echo $cliente['telefono'] ?>">
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="id_tipo" class="col-sm-2 control-label">Propiedad Interes</label>
                                <div class="col-sm-10">
                                    <select class="form-control select2" name="id_tipo" style="width: 100%;">
                                        <option value="<?php echo $cliente['id_tipo'] ?>" selected="selected"><?php echo $cliente['tipo_nombre'] ?></option>
                                        <?php foreach($tpropiedades as $tpropiedad): ?>
                                        <option value=<?php echo $tpropiedad['id_tipo'] ?>><?php echo $tpropiedad['tipo_nombre'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="presupuesto" class="col-sm-2 control-label">Presupuesto</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="presupuesto" value="<?php echo $cliente['presupuesto'] ?>">
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="barrios_interes" class="col-sm-2 control-label">Barrio Interes</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="barrios_interes" value="<?php echo $cliente['barrios_interes'] ?>">
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="caracteristicas_interes" class="col-sm-2 control-label">Características Interés</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="caracteristicas_interes" value="<?php echo $cliente['caracteristicas_interes'] ?>">
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="anotaciones" class="col-sm-2 control-label">Anotaciones</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" rows="3" name="anotaciones" placeholder="Ingrese anotaciones del Cliente"><?php echo $cliente['anotaciones'] ?></textarea>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="id_tipo_cliente" class="col-sm-2 control-label">Tipo Cliente</label>
                                <div class="col-sm-10">
                                    <select class="form-control select2" name="id_tipo_cliente" style="width: 100%;">
                                        <option value="<?php echo $cliente['id_tipo_cliente'] ?>" selected="selected"><?php echo $cliente['tipo_cliente_nombre'] ?></option>
                                        <?php foreach($tclientes as $tcliente): ?>
                                        <option value=<?php echo $tcliente['id_tipo_cliente'] ?>><?php echo $tcliente['tipo_cliente_nombre'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="fecha_contactar" class="col-sm-2 control-label">Fecha a Contáctar:</label>
                                <div class="col-sm-10">
                                    <?php date_default_timezone_set('America/Bogota'); ?>
                                    <input type="date" class="form-control" name="fecha_contactar" value="<?php echo date("Y-m-d", strtotime($cliente['fecha_contactar'])); ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="cli_activo" class="col-sm-2 control-label">Estado de Negociación</label>
                                <div class="col-sm-10">
                                    <select class="form-control select2" name="id_estado_cliente" style="width: 100%;">
                                        <option value="<?php echo $cliente['id_estado_cliente'] ?>" selected="selected"><?php echo $cliente['estado_cliente_nombre'] ?></option>
                                        <?php foreach($testados as $testado): ?>
                                        <option value=<?php echo $testado['id_estado_cliente'] ?>><?php echo $testado['estado_cliente_nombre'] ?></option>
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