<!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <?php echo $title ?>
                <small>Clientes</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url('chome');?>"><i class="fa fa-dashboard"></i> Inicio</a></li>
                <li><a href="<?php echo base_url('cusers');?>"><i class="fa fa-dashboard"></i> Usuarios</a></li>
                <li class="active">Crear Usuario</li>
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
                            <?php
                                $error_msg=$this->session->flashdata('error_msg');
                                if($error_msg){
                                    echo $error_msg;
                                }
                            ?>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <?php echo validation_errors(); ?>
                        <?php echo form_open('cusers/user_insert', 'class="form-horizontal"'); ?>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="user_id" class="col-sm-2 control-label">ID</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="user_id" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="user_name" class="col-sm-2 control-label">Usuario</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="user_name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="user_email" class="col-sm-2 control-label">Email:</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" name="user_email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="user_password" class="col-sm-2 control-label">Contraseña:</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" name="user_password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="user_data" class="col-sm-2 control-label">Nombres:</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" name="user_data">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="user_mobile" class="col-sm-2 control-label">Teléfono:</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" name="user_mobile">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="user_rol" class="col-sm-2 control-label">Rol</label>
                                <div class="col-sm-10">
                                    <select class="form-control select2" name="user_rol" style="width: 100%;">
                                        <option value="Administrador">Administrador</option>
                                        <option value="Comercial">Comercial</option>
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