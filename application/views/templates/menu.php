!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url();?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
            <p><?php echo $this->session->userdata['user_data']; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i>En linea</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MENU PRINCIPAL</li>
        <li><a href="<?php echo base_url('chome');?>"><i class="fa fa-dashboard"></i> <span>Panel de Control</span></a></li>
        <li><a href="<?php echo base_url('cpropiedades');?>"><i class="fa fa-ticket"></i> <span>Propiedades</span></a></li>
        <li><a href="<?php echo base_url('cclientes');?>"><i class="fa fa-archive"></i> <span>Clientes</span></a></li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Opciones</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('copciones/tipos_propiedad');?>"><i class="fa fa-circle-o"></i> Tipos de Propiedades</a></li>
            <li><a href="<?php echo base_url('copciones/ciudades');?>"><i class="fa fa-circle-o"></i> Ciudades</a></li>
            <li><a href="<?php echo base_url('copciones/barrios');?>"><i class="fa fa-circle-o"></i> Barrios</a></li>
            <li><a href="<?php echo base_url('copciones/objetivos');?>"><i class="fa fa-circle-o"></i> Objetivos</a></li>
            <li><a href="<?php echo base_url('copciones/tipos_cliente');?>"><i class="fa fa-circle-o"></i> Tipos de Clientes</a></li>
            <li><a href="<?php echo base_url('copciones/tipos_ingreso');?>"><i class="fa fa-circle-o"></i> Tipos de Ingresos</a></li>
            <li><a href="<?php echo base_url('copciones/tipos_egreso');?>"><i class="fa fa-circle-o"></i> Tipos de Egresos</a></li>
          </ul>
        </li>
        <li><a href="<?php echo base_url('ctareas');?>"><i class="fa fa-line-chart"></i> <span>Tareas</span></a></li>
        <li><a href="<?php echo base_url('ctareas');?>"><i class="fa fa-users"></i> <span>Cronograma</span></a></li>
        <li><a href="<?php echo base_url('cingresos');?>"><i class="fa fa-automobile"></i> <span>Ingresos</span></a></li>
        <li><a href="<?php echo base_url('cegresos');?>"><i class="fa fa-map"></i> <span>Egresos</span></a></li>
        <li><a href="<?php echo base_url('ctareas');?>"><i class="fa fa-dashboard"></i> <span>Cuadre de Caja</span></a></li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Reportes</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('creportes/report_clientes');?>"><i class="fa fa-circle-o"></i> Clientes</a></li>
            <li><a href="<?php echo base_url('creportes/report_propiedades');?>"><i class="fa fa-circle-o"></i> Propiedades</a></li>
            <li>
              <a href="#"><i class="fa fa-circle-o"></i> Ingresos Fijos
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url('creportes/report_ingresosf_detalle');?>"><i class="fa fa-circle-o"></i> Reporte Detallado</a></li>
                <li><a href="<?php echo base_url('creportes/report_ingresosf_resumen');?>"><i class="fa fa-circle-o"></i> Reporte Resumido</a></li>
              </ul>
            </li>
            <li>
              <a href="#"><i class="fa fa-circle-o"></i> Ingresos Variables
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url('creportes/report_ingresosv_detalle');?>"><i class="fa fa-circle-o"></i> Reporte Detallado</a></li>
                <li><a href="<?php echo base_url('creportes/report_ingresosv_resumen');?>"><i class="fa fa-circle-o"></i> Reporte Resumido</a></li>
              </ul>
            </li>
            <li>
              <a href="#"><i class="fa fa-circle-o"></i> Egresos
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url('creportes/report_egresos_detalle');?>"><i class="fa fa-circle-o"></i> Reporte Detallado</a></li>
                <li><a href="<?php echo base_url('creportes/report_egresos_resumen');?>"><i class="fa fa-circle-o"></i> Reporte Resumido</a></li>
              </ul>
            </li>
          </ul>
        </li>
        <li><a href="<?php echo base_url('cusers/user_logout');?>"><i class="fa fa-power-off"></i> <span>Salir</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">