<!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <?php echo $title ?>
                <small>Registrar una nueva propiedad</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url('chome');?>"><i class="fa fa-dashboard"></i> Inicio</a></li>
                <li><a href="<?php echo base_url('cpropiedades');?>"><i class="fa fa-dashboard"></i> Propiedades</a></li>
                <li class="active">Propiedad</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- left column -->
                    <div class="col-md-12">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">INGRESAR DATOS</h3>
                            </div>
                            <!-- /.box-header -->
                            <!-- form start -->
                            <?php echo validation_errors(); ?>
                            <?php echo form_open('cpropiedades/insert', 'class="form-horizontal"'); ?>
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="id_propiedad" class="col-sm-2 control-label">ID</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="id_propiedad" readonly>
                                        </div>
                                </div>
                                <div class="form-group">
                                    <label for="fecha_creacion" class="col-sm-2 control-label">Fecha Creación:</label>
                                    <div class="col-sm-10">
                                        <?php date_default_timezone_set('America/Bogota'); ?>
                                        <input type="date" class="form-control" name="fecha_creacion" value="<?php echo date("Y-m-d");?>">                  </div>
                                </div>
                                <div class="form-group">
                                    <label for="id_tipo" class="col-sm-2 control-label">Tipo</label>
                                        <div class="col-sm-10">
                                            <select class="form-control select2" name="id_tipo" style="width: 100%;" required>
                                            <?php foreach($tipos as $tipo): ?>
                                            <option value=<?php echo $tipo['id_tipo'] ?>><?php echo $tipo['tipo_nombre'] ?></option>
                                            <?php endforeach; ?>
                                            </select>
                                        </div>
                                </div>
                                <div class="form-group">
                                    <label for="id_ciudad" class="col-sm-2 control-label">Ciudad</label>
                                        <div class="col-sm-10">
                                            <select class="form-control select2" name="id_ciudad" style="width: 100%;" required>
                                            <?php foreach($ciudades as $ciudad): ?>
                                            <option value=<?php echo $ciudad['id_ciudad'] ?>><?php echo $ciudad['ciudad_nombre'] ?></option>
                                            <?php endforeach; ?>
                                            </select>
                                        </div>
                                </div>
                                <div class="form-group">
                                    <label for="id_barrio" class="col-sm-2 control-label">Barrio</label>
                                        <div class="col-sm-10">
                                            <select class="form-control select2" name="id_barrio" style="width: 100%;" required>
                                            <?php foreach($barrios as $barrio): ?>
                                            <option value=<?php echo $barrio['id_barrio'] ?>><?php echo $barrio['barrio_nombre'] ?></option>
                                            <?php endforeach; ?>
                                            </select>
                                        </div>
                                </div>
                                <div class="form-group">
                                    <label for="direccion" class="col-sm-2 control-label">Dirección</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="direccion">
                                        </div>
                                </div>
                                <div class="form-group">
                                    <label for="precio" class="col-sm-2 control-label">Precio</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" name="precio">
                                        </div>
                                </div>
                                <div class="form-group">
                                    <label for="caracteristicas" class="col-sm-2 control-label">Caracteristicas</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" rows="3" name="caracteristicas" placeholder="Ingrese las caracteristicas de la propiedad..."></textarea>
                                        </div>
                                </div>
                                <div class="form-group">
                                    <label for="observaciones" class="col-sm-2 control-label">Observaciones</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" rows="2" name="observaciones" placeholder="Ingrese observaciones sobre la propiedad..."></textarea>
                                        </div>
                                </div>
                                <div class="form-group">
                                    <label for="id_objetivo" class="col-sm-2 control-label">Objetivo</label>
                                        <div class="col-sm-10">
                                            <select class="form-control select2" name="id_objetivo" style="width: 100%;" required>
                                            <?php foreach($objetivos as $objetivo): ?>
                                            <option value=<?php echo $objetivo['id_objetivo'] ?>><?php echo $objetivo['objetivo_nombre'] ?></option>
                                            <?php endforeach; ?>
                                            </select>
                                        </div>
                                </div>
                                <div class="form-group">
                                    <label for="id_propietario" class="col-sm-2 control-label">Propietario</label>
                                        <div class="col-sm-10">
                                            <select class="form-control select2" name="id_propietario" style="width: 100%;" required>
                                            <?php foreach($clientes as $cliente): ?>
                                            <option value=<?php echo $cliente['id_cliente'] ?>><?php echo $cliente['nombres'] ?></option>
                                            <?php endforeach; ?>
                                            </select>
                                        </div>
                                </div>
                                <div class="form-group">
                                    <label for="id_arrendatario" class="col-sm-2 control-label">Arrendatario</label>
                                        <div class="col-sm-10">
                                            <select class="form-control select2" name="id_arrendatario" style="width: 100%;" required>
                                            <?php foreach($clientes as $cliente): ?>
                                            <option value=<?php echo $cliente['id_cliente'] ?>><?php echo $cliente['nombres'] ?></option>
                                            <?php endforeach; ?>
                                            </select>
                                        </div>
                                </div>
                                <div class="form-group">
                                    <label for="documento" class="col-sm-2 control-label">Documento</label>
                                        <div class="col-sm-10">
                                            <input type="file" id="documento">
                                        </div>
                                </div>
                                <div class="form-group">
                                    <label for="activo" class="col-sm-2 control-label">Activo</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="activo" style="width: 100%;" required>
                                                <option value="si">Si</option>
                                                <option value="no">No</option>
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