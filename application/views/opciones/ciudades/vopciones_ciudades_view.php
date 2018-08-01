﻿<!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <?php echo $title ?>
                <small>Ciudades</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url('chome');?>"><i class="fa fa-dashboard"></i> Inicio</a></li>
                <li><a href="<?php echo base_url('copciones/ciudades');?>"><i class="fa fa-dashboard"></i> Ciudad</a></li>
                <li class="active">Ver Ciudad</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">CIUDAD DETALLE</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <?php echo validation_errors(); ?>
                        <?php echo form_open('copciones/update_ciudad', 'class="form-horizontal"'); ?>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="id_ciudad" class="col-sm-2 control-label">ID</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="id_ciudad" value="<?php echo $ciudad['id_ciudad'] ?>" readonly>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="ciudad_nombre" class="col-sm-2 control-label">Nombre</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" name="ciudad_nombre" value="<?php echo $ciudad['ciudad_nombre'] ?>">
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