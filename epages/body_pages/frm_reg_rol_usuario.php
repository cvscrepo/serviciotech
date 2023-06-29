<div class="content-wrapper">
   <section class="content-header">
      <h1>
         Rol Usuario
         <small>Tipo de Rol Usuario</small>
      </h1>
      <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-pie-chart"></i> Rol Usuarios</a></li>
         <li class="active">R. Tipo Rol Usuario</li>
      </ol>
   </section>
   <!-- Main content -->
   <section class="content">
      <input type="hidden" id="form_view" name="form_view" value="2">
      <!-- Small boxes (Stat box) -->
      <div class="col-lg-12 col-xs-12">
         <div id="gridtable" name="gridtable" class="col-md-8 col-xs-6">
            <!-- Main content -->
            <section class="content">
               <input type="button" id="pru" class='btn bg-blue'  name="pru" value="Ocultar Tabla" onclick="javascript:responsive1()"> <br><br>
               <div id="table_container" name="table_container">
               </div>
            </section>
         </div>
         <div id="gform" name='gform' class="col-md-4 col-xs-6">
            <div class="panel-group">
               <div class="panel panel-primary">
                  <div class="panel-heading" align="center"><b>Registro Tipo Rol Usuario</b></div>
                  <div class="form-box" >
                     <form id="camar" name="camar"  enctype="multipart/form-data" method="post">
                      <!--<input type="button" id="pru" class='btn btn-success'  name="pru" value="Ocultar Formulario" onclick="javascript:responsive2()"> -->
                        <div class="body bg-gray">
                           Nombre Rol Usuario:
                           <input type="text" id="rolu" name="rolu" class="form-control" placeholder="(Tipo Rol Usuario)" required autofocus required>
                           Descripcion:
                           <textarea class="form-control" rows="3" id="desc" name="desc"></textarea>
                           <br>
                           <div id="gbut" align="center">
                              <input type="button" onclick="javascript:ingresar_datos_rol_usuario()" class="btn bg-blue " value="Registrar">
                              <input type="button" class="btn bg-blue " value="Limpiar">
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>