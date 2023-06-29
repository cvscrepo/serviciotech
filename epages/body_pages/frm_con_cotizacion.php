 
  <div class="content-wrapper">
       <section class="content-header">
      <h1>
        Cotización Electronica.
        <small>Consultar Cotización</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-calculator"></i> Cotizaciones</a></li>
        <li class="active">C. Cotización</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div id="cas1" name="cas1" >
  <div class = "row">
    <div class="col-md-11"  style="margin-left: 15px;
    margin-top: 15px;">
    <form id="buscar" name="buscar">
    <div class = "row">
       <div class="col-lg-2 col-xs-6">
        <label> Cliente: </label>
    <input type="text" class="form-control" id="cue" name="cue" style="background:#FFFFFF;">
    </div>
       <div class="col-lg-2 col-xs-6">
        <label> Filtrar Desde:</label>
    <input type="text" class="form-control" id="fds" name="fds" style="background:#FFFFFF;" readonly>
 
    </div>

     <div class="col-lg-2 col-xs-6">
    <label> Hasta:</label>
    <input type="text" class="form-control" id="fhs" name="fhs" style="background:#FFFFFF;" required readonly>
    
  </div>
       <div class="col-lg-2 col-xs-6">
          </br>
          <input type="button" class="btn btn-primary btn-bg" value="Ir" onclick="javascript:buscar_cue_por_fecha()" >
       </div>
  </div>
  </form>
</div>
    <div class="col-md-11"  style="margin-left: 15px;
    margin-top: 15px;">
    <div class="panel panel-primary">
      <div class="panel-heading">Información General</div>
      <div class="panel-body">
       <input type ="submit" onclick="location='../epages/reg_cotizacion.php'" class="btn bg-blue btn-sm" style="margin-top:8px"  Value="Crear Cotizacion" name="crea_comp" id="crea_comp">
      <div id="tabla_reporte">


       <?php 
       //include ("../views/tablac.php"); 
       ?>
       </div>
     </div>
   </div>
   <input type="button" class="btn bg-blue btn-sm" value="Filtrar por Tercero" onclick="javascript:buscar_por_tercero()">
 </div> 
</div>
</div>

 <div id="cas2" name="cas2" style="display:none" >
  <div class = "row">
    <div class="col-md-11"  style="margin-left: 15px;
    margin-top: 15px;">
    <form id="buscar" name="buscar">
    <div class = "row">
       <div class="col-lg-2 col-xs-6">
        <label> Tercero </label>
    <input type="text" class="form-control" id="ter" name="ter" onclick="javascript:ver_terceros()" style="background:#FFFFFF;">
    </div>
       <div class="col-lg-2 col-xs-6">
        <label> Filtrar Desde:</label>
    <input type="text" class="form-control" id="fdst" name="fdst" style="background:#FFFFFF;" readonly>
    
    </div>

     <div class="col-lg-2 col-xs-6">
    <label> Hasta:</label>
    <input type="text" class="form-control" id="fhst" name="fhst" style="background:#FFFFFF;" required readonly>
    
  </div>
       <div class="col-lg-2 col-xs-6">
          </br>
          <input type="button" class="btn btn-primary btn-bg" value="Ir" onclick="javascript:buscar_ter_por_fecha()" >
       </div>
  </div>
  </form>
</div>
    <div class="col-md-11"  style="margin-left: 15px;
    margin-top: 15px;">
    <div class="panel panel-primary">
      <div class="panel-heading">Informacion General</div>
      <div class="panel-body">
       <input type ="submit" onclick="location='../reg_cotizacion.php'" class="btn bg-blue btn-sm" style="margin-top:8px"  Value="Crear Cotizacion" name="crea_comp" id="crea_comp">
      <div id="prueba_reporte_ter">


       <?php 
       //include ("../views/tablac.php"); 
       ?>
       </div>
     </div>
   </div>
      <input type="button" class="btn bg-blue btn-sm" onclick="javascript:buscar_por_cuenta()" value="Filtrar por Nª de Cuenta">
 </div>
</div>
</div>
<div id="cas3" style="display:none">
    <!-- Main content -->
    <section class="content">
      <input type="hidden" id="form_view" name="form_view" value="2">
      <!-- Small boxes (Stat box) -->
<form id="coti" name="coti"  enctype="multipart/form-data" method="post">
<div class="form-box" id="cas11" name="cas11" style="width:1315px;overflow:auto;margin:39px auto" >
        <form id="form1" name="form1" enctype="multipart/form-data" method="post" >
            <div class="form-group">
  
<div class="col-xs-12 .col-md-12 "style="margin: -1px auto">
                     <div class="row">
                       <div class="col-xs-8 .col-md-4">
                            <!-- small box -->
                            <div class="medium-box">
                            </div>
                        </div>
                       <div class="col-xs-2 .col-md-4">
                            <!-- small box -->
                            <div class="medium-box">
                                <div class="inner">
                                <!--    -->
                                 <input type="text" id="comproba" name="comproba" class="form-control"  style="width:319px;overflow:auto;border: #367fa9 1px solid;background:#367fa9; color:white" value="COTIZACIÓN ELECTRONICA" disabled> 
                                </div>
                            </div>
                        </div> 
                      </div>
                      </div>
      <div class="col-xs-12 .col-md-12 "style="margin: -1px auto">
                     <div class="row">
                       <div class="col-xs-8 .col-md-4">
                            <!-- small box -->
                            <div class="medium-box">
                             
                            </div>
                        </div>
                       <div class="col-xs-2 .col-md-4">
                            <!-- small box -->
                            <div class="medium-box">
                                <div class="inner">
                                <!--   $ Por el valor de: -->
                                 <input type="text" id="nocom" class="form-control" name="nocom" style="width:319px;overflow:auto;border: #367fa9 1px solid" value="BQ-COT" readonly> 
                                </div>
                            </div>
                        </div> 
                      </div>
                      </div>
  <div class="row" style="margin:15px auto">
      <div class="col-xs-1 .col-md-4"> 
                          <div class="medium-box">
                               <div class="inner">
                                <input type="text" id="ater" name="ater"  class="form-control" style="width:329px;overflow:auto;border: #367fa9 1px solid;background: #FFFFFF; color:black " onclick="javascript:ver_tabla2()" placeholder="Tercero">
                                </div>
                                </div> 
                                </div>
                            <div class="col-xs-2 .col-md-4">
                        </div>
              <div class="row" style="margin:-10px auto">
                        <div class="col-xs-2 .col-md-3">
                            <!-- small box -->
                            <div class="medium-box">
                                <div class="inner">
                               <!--   <font color"blue">Fecha</font> -->
                                  <input type:"text" id="nit" name="nit" class="form-control" placeholder="NIT/CC"  readonly="true"style="width:221px;background:#FFFFFF; color:black ;overflow:auto;border: #367fa9 1px solid">
                                </div>
                            </div>
                        </div>
                       <div class="col-xs-2 .col-md-3">
                            <!-- small box -->
                            <div class="medium-box">
                                <div class="inner">
                               <!--   <font color"blue">Fecha</font> -->
                                  <input type:"text" id="ciu" name="ciu" class="form-control" placeholder="Ciudad"  readonly="true" style="width:221px;background:#FFFFFF; color:black ;overflow:auto;border: #367fa9 1px solid">
                                </div>
                            </div>
                        </div>
                       <div class="col-xs-2 .col-md-3">
                            <!-- small box -->
                            <div class="medium-box">
                                <div class="inner">
                               <!--   <font color"blue">Fecha</font> -->
                                  <input type:"text" id="dir" name="dir" class="form-control" placeholder="Direccion"  readonly="true" style="width:221px;background:#FFFFFF; color:black ;overflow:auto;border: #367fa9 1px solid">
                                </div>
                            </div>
                        </div>
                          <div class="col-xs-1 .col-md-3">
                            <!-- small box -->
                            <div class="medium-box">
                                <div class="inner">
                                <!--   $ Por el valor de: -->
                                 <input input id="con" name="con" class="form-control" type="text" class="form-control"   style="width:210px;overflow:auto;background:#FFFFFF; color:black ;border: #367fa9 1px solid" placeholder="Contacto" readonly ><br>
                                </div>
                            </div>
                        </div> 
                      </div>
                    </div>
                     <div class="col-xs-12 .col-md-12 "style="margin: -37px auto">
                     <div class="row">
                          <div class="col-xs-3 .col-md-4">
                            <!-- small box -->
                            <div class="medium-box">
                              <?php 
                               $vced=$_SESSION['documento'];
                               $vced= str_replace(".", "", $vced); 
                               $vced= str_replace("€", "", $vced);
                               $vced= str_replace(" ", "", $vced);
                               $vced= str_replace(",00", "", $vced);
                              ?>
                         <input type="text" id="nven" name="nven" class="form-control" style="width:329px;border: #367fa9 1px solid;background: #FFFFFF; color:black " placeholder="Documento Vendedor" value="" Readonly>

                             </div>
                      </div>
                      <div class="col-xs-4 .col-md-4">
                            <!-- small box -->
                            <div class="medium-box">
                                <div class="inner">
                                  <!-- Pagado A: -->
                                  <input id="ven" class="form-control" type="text" class="form-control" style="width:867px;border: #367fa9 1px solid;background: #FFFFFF; color:black " name="ven" placeholder="Vendedor" value=""required autofocus readonly>
                                </div>
                            </div>
                        </div>
                      </div>
                      </div>
                   <div class="col-xs-12 .col-md-12 "style="margin: -4px auto">
                     <div class="row">
                      <div class="col-xs-11 .col-md-4">
                            <!-- small box -->
                            <div class="medium-box">
                                <div class="inner">
                               <!--    Por Concepto de: -->
                                  <input id="pcd" name="pcd" class="form-control" type="text" class="form-control"  style="width:1196px;border: #367fa9 1px solid"  placeholder="Por Concepto de: " required autofocus required>
                                </div>
                            </div>
                        </div>
                      </div>
                      </div>
              <div class="col-xs-12 .col-md-12 "style="margin: -3px auto">
                     <div class="row">
                      <div class="col-xs-11 .col-md-4">
                            <!-- small box -->
                            <div class="medium-box">
                                <div class="inner">
                                  <div class="form-control" style="width:1196px;border: #367fa9 1px solid">
                                   <label>Escoja Tipo de Cotizacion:</label>
                                   <input type="checkbox" style="margin-left:20px"><label style="margin:3px">CCTV</label> 
                                   <input type="checkbox" style="margin-left:40px"><label style="margin:3px">Control de Acceso  </label> 
                                   <input type="checkbox" style="margin-left:40px"><label style="margin:3px">Alarma de Intrusión</label> 
                                   <input type="checkbox" style="margin-left:40px"><label style="margin:3px">Alarma de Incendio</label> 
                                   <input type="checkbox" style="margin-left:40px"><label style="margin:3px">Evacuación</label></div>
                                  <!-- <input id="pcd2" name="pcd2" class="form-control" type="text" class="form-control"  style="width:1196px;border: #367fa9 1px solid"   required autofocus required> -->
                                </div>
                            </div>
                        </div>
                      </div>
                      </div>
                     <div class="col-xs-12 .col-md-12 "style="margin: -1px auto">
                     <div class="row">
                      </div>
                      </div>
                      <div class="col-xs-12 .col-md-12 "style="margin: -1px auto">
                     <div class="row">
                      </div>
                      </div>
              <div class="col-xs-12 .col-md-12 "style="margin: -1 px auto">
                     <div class="row">
                      </div>
                      </div>
                    <div class="col-xs-12 .col-md-12 "style="margin: -1 px auto">
                    <div class="row" style="margin:0px auto">
                      <div class="col-xs-12 .col-md-12 "style="width:1213px;height:200px;overflow:auto;overflow: scroll;margin: -1 px auto;">
                       <div class="row"  >
                         <div id="prueba_comprobante_editar"  style="width:1196px;">
                       </div>
                      </div>
                    </div>
                      </div>

                <div class="col-xs-12 .col-md-12 "style="margin: -1 px auto">
                <div class="row" style="margin:5px auto">
                    <div class="col-xs-6 .col-md-4">
                            <!-- small box -->
                            <div class="medium-box">
                            </div>
                        </div>
                        <div class="col-xs-1 .col-md-4">
                            <!-- small box -->
                            <div class="medium-box">
                                <div class="inner">
                               <!--   <font color"blue">Fecha</font> -->
                                  <input type="text" id="tiva" name="tiva" readonly="true" class="form-control" value="IVA 19%" style="width:219px;background:#367fa9; color:white;overflow:auto;border: #ecf0f5 1px solid;margin-left: 51px">
                                  </input>
                                </div>
                            </div>
                        </div>
                          <div class="col-xs-1 .col-md-4">
                            <!-- small box -->
                            <div class="medium-box">
                                <div class="inner">
                                <!--   $ Por el valor de: -->
                                 <input input id="ttiva" class="form-control" type="text" class="form-control"  value='0' style="width:270px;overflow:auto;margin-left: 164px;border: #367fa9 1px solid;" name="ttiva" placeholder="Diferencia" Readonly >
                                </div>
                            </div>
                        </div> 
                   <div class="col-xs-6 .col-md-4">
                            <!-- small box -->
                            <div class="medium-box">
                            </div>
                        </div>
                        <div class="col-xs-1 .col-md-4">
                            <!-- small box -->
                            <div class="medium-box">
                                <div class="inner">
                               <!--   <font color"blue">Fecha</font> -->
                                  <input type="text" id="tota" name="tota" readonly="true" class="form-control" value="TOTAL" style="width:219px;background:#367fa9; color:white;overflow:auto;border: #ecf0f5 1px solid;margin-left: 51px">
                                  </input>
                                </div>
                            </div>
                        </div>
                          <div class="col-xs-1 .col-md-4">
                            <!-- small box -->
                            <div class="medium-box">
                                <div class="inner">
                                <!--   $ Por el valor de: -->
                                 <input input id="tdif" class="form-control" type="text" class="form-control"  value='0' style="width:270px;overflow:auto;margin-left: 164px;border: #367fa9 1px solid;" name="tdif" placeholder="Diferencia" Readonly ><br>
                                </div>
                            </div>
                        </div> 
                      </div>
                    </div>
                 <div class="col-xs-12 .col-md-12 "style="margin: -1 px auto">
                     <div class="row" style="margin-left:-16px">
                        <div class="col-xs-1 .col-md-2 "style="margin: 0 px auto">
                      <input type="button" class="btn bg-blue btn-sm" id="btna" name="btna" value="Agregar Fila" onclick="javascript:add_td()" >
                   </div>    
                      <div class="col-xs-8 .col-md-8 "style="margin: 0 px auto">
                     
                      <input type="button" class="btn bg-blue btn-sm" id="btng"  onclick="javascript:ingresar_cotizacion()" name="btng" value="Guardar Comprobante">

                     </div>
                     <div class="col-xs-2 .col-md-2 "style="margin: 0 px auto">
                     
                      <input type="button" class="btn bg-blue btn-sm" id="btng"  onclick="javascript:ver_concot()" name="btng" value="Volver sin guardar">

                     </div>
                <!--      <div class="col-xs-1 .col-md-2 "style="margin: 0 px auto">
                     <input type="button" class ="btn bg-blue btn-sm" id="exp" name="exp" onclick="" value="Exportar PDF">
                     <a href="../pruebapdf2.php">Prueba Exportar</a>
                    </div> -->
                     <br>
                    <input type= "hidden" id="contr" name="contr" value="1"> 
                    <input type= "hidden" id="cauxi"name="cauxi" value="0">
                    <input type= "hidden" id="nedit"name="nedit" value="0">
                    <input type= "hidden" id="sel" name="sel" value=""> 
                    <input type= "hidden" id="tipcuenta" name="tipcuenta" value=""> 
                    <input type= "hidden" id="idacd" name="idacd" value=""> 
                     </div>
                   </div>
                   
                  </div>  
                     </div>
                     </div>
                    </form>

  </section>

   <!-- 
           <div class="col-md-6">
              <label>Asistencia</label>
              <input type="text" class="form-control" name="asis"  required>
              
            </div>
            <div class="col-md-6">
         
              <label>Archivo(PDF/WORD)</label>
              <input type="file" class="form-control" name="arch" required=""><br>
              
              
            </div>-->
          </div>
         <!-- <div class="row">
            <div class="col-md-6">
              <label>Foto 1:</label>
              <input type="file" class="form-control" name="foto1" required=""><br>
              
            </div>
             <div class="col-md-6">
              <label>Foto 2:</label>
              <input type="file" class="form-control" name="foto2" required=""><br>
              
            </div>
            </div>
            <div class="row">
            <div class="col-md-6">
              <label>Foto 3:</label>
              <input type="file" class="form-control" name="foto3" required=""><br>
              
             </div>
             <div class="col-md-6">
              <label>Foto 4:</label>
              <input type="file" class="form-control" name="foto4" required=""><br>
              <input type="hidden" name="use" value="<?php echo $username ?>">
            </div>
            </div>-->
  <div id="cas4" name="cas4" style="display:none">
                    
                    </div>
                    <div id="cas5" name="cas5" style="display:none">
                    
                    </div>

  </div>
                  

</div>

<input type="hidden" id="cons" name="cons" value="0"> 
  </section>
  </div>