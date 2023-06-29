<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../dist/img/default.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p> <?php echo  $_SESSION['nombre_completo'];
		$rolu=$_SESSION['rol_num']; 
          ?></p>
          <a href="../epages/perfil_usuario.php"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search..." disabled>
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat" disabled><i class="fa fa-search"></i></button>
              </span>
        </div>
      </form>
      <ul class="sidebar-menu">
        <li class="header">MENÚ DE NAVEGACIÓN</li>
        <li >
          <a href="../epages/main.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <?php

        if($rolu==1){

        ?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Usuarios</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
             <!-- <span class="label label-primary pull-right">4</span> -->
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../epages/reg_users.php"><i class="fa fa-circle-o"></i> Crear</a></li>
            <li><a href="../epages/con_users.php"><i class="fa fa-circle-o"></i> Listar</a></li>
            <li><a href="../epages/reg_rol_usuario.php"><i class="fa fa-circle-o"></i> Roles</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-video-camera" ></i>
            <span>Articulos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../epages/reg_articulo.php"><i class="fa fa-circle-o"></i> Crear Articulo</a></li>
            <li><a href="../epages/con_articulos.php"><i class="fa fa-circle-o"></i> Listar Articulos</a></li>
            <li><a href="../epages/reg_umed.php"><i class="fa fa-circle-o"></i> Unidades de Medidas</a></li>
            <li><a href="../epages/reg_marca.php"><i class="fa fa-circle-o"></i>Marcas</a></li>
            <li><a href="../epages/reg_categoria.php"><i class="fa fa-circle-o"></i> Categorias</a></li>
            <li><a href="../epages/reg_tipo.php"><i class="fa fa-circle-o"></i> Tipos</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i>
            <span>Clientes</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../epages/reg_clientes.php"><i class="fa fa-circle-o"></i> Crear</a></li>
            <li><a href="../epages/con_clientes.php"><i class="fa fa-circle-o"></i> Listar</a></li>
            <li><a href="../epages/datatable.php"><i class="fa fa-circle-o"></i> Datatable</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-calculator"></i> <span>Cotizaciones</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../epages/reg_cotizacion.php"><i class="fa fa-circle-o"></i>Crear Cotizacion</a></li>
            <li><a href="../epages/con_cotizacion.php"><i class="fa fa-circle-o"></i>Consultar Cotizaciones</a></li>
            <li><a href="../epages/apr_cotizacion.php"><i class="fa fa-circle-o"></i>Cotizaciones Ap/Re</a></li>
          </ul>
        </li>
        <?php
         }
        ?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-motorcycle"></i> <span>Servicios</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li class="treeview">
          <a href="#">
            <i class="fa fa-newspaper-o"></i> <span>Formularios</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <?php
            if ($rolu==1 or $rolu==4 or $rolu==5 or $rolu==6 or $rolu==7){
            ?>  
            <li><a href="../epages/reg_solicitud.php"><i class="fa fa-circle-o"></i>Solicitud de Servicios</a></li>
            <?php
            }
            if ($rolu==1 or $rolu==4){
            ?>  
            <li><a href="../epages/con_solicitud.php"><i class="fa fa-circle-o"></i>Programar Servicios</a></li>
            <?php
            }
             if ($rolu==1 or $rolu==3){
            ?>
            <li><a href="../epages/con_servicio.php"><i class="fa fa-circle-o"></i>Atención de Servicios</a></li>
            <?php
            }
            ?>
          </ul>
        </li>
          <li class="treeview">
          <a href="#">
            <i class="fa fa-bar-chart"></i> <span>Reportes</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../epages/con_soporte.php"><i class="fa fa-circle-o"></i>Reporte de Solicitudes</a></li>
            <?php
            if ($rolu==1 or $rolu==3){
            ?>
            <li><a href="../epages/con_atendidos.php"><i class="fa fa-circle-o"></i>Servicios Atendidos</a></li>
            <?php
            }
            if ($rolu==1 or $rolu==7 or $rolu==6 or $rolu==4){
            ?>  
            <li><a href="../epages/con_programados.php"><i class="fa fa-circle-o"></i>Reporte Programados</a></li>
            <?php
            }
            if ($rolu==1 or $rolu==4){
            ?> 
            <li><a href="../epages/con_reporte.php"><i class="fa fa-circle-o"></i>Reporte Técnico</a></li>
            <?php
             }
            ?>
          </ul>
          </li>
          <?php
          if ($rolu==1){
          ?>
          <li class="treeview">
          <a href="#">
            <i class="fa fa-cogs"></i> <span>Parametros</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <?php
            ?>
            <li><a href="../epages/reg_tipo_servicio.php"><i class="fa fa-circle-o"></i>Tipo de Servicio</a></li>
            <li><a href="../epages/reg_unidad_negocio.php"><i class="fa fa-circle-o"></i>Unidad de Negocio</a></li>
            <li><a href="../epages/reg_falla.php"><i class="fa fa-circle-o"></i>Falla</a></li>
            <?php
             }
            ?>
          </ul>
        </li>
          }
        </ul>
      </li>
      </ul>
    </section>
  </aside>