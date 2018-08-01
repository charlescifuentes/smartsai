<!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <?php echo $title ?>
                <small>Cliente</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url('chome');?>"><i class="fa fa-dashboard"></i> Inicio</a></li>
                <li><a href="<?php echo base_url('copciones/tipos_cliente');?>"><i class="fa fa-dashboard"></i> Tipos de Clientes</a></li>
                <li class="active">Tipo de Cliente</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">TIPO DETALLE</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <?php echo validation_errors(); ?>
                        <?php echo form_open('copciones/update_tipo_cliente', 'class="form-horizontal"'); ?>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="id_tipo_cliente" class="col-sm-2 control-label">ID</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="id_tipo_cliente" value="<?php echo $tipo['id_tipo_cliente'] ?>" readonly>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="tipo_cliente_nombre" class="col-sm-2 control-label">Nombre</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" name="tipo_cliente_nombre" value="<?php echo $tipo['tipo_cliente_nombre'] ?>">
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