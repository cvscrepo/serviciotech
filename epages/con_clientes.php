<?php
include ("validate.php"); 
?>
<!DOCTYPE html>
<html>
<head>
  <?php include ("../includes/head.html"); ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<header class="main-header">
    <?php include ("../includes/header.html"); ?>
 </header>
  <!-- Left side column. contains the logo and sidebar -->
  <?php include ("../includes/menu_vertical.php"); ?>

  <!-- Content Wrapper. Contains page content - CUERPO DEL DOCUMENTO ACUTAL-->
  <div id="user_container" name="user_container">
  <?php include ("select_pages/tables/clie_table.php"); ?>
  
  </div>
  <!-- /.content-wrapper -->


 <?php include ("../includes/pie_pagina.php"); ?>
  <!-- Control Sidebar -->

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<script type="text/javascript" src="../jquery/jquery.js"></script>
<script type="text/javascript" src="../jquery/jquery.validate.js"></script>
<script type="text/javascript" src="../f_javascript/jclie.js"></script>
<?php include ("../includes/jquery.html"); ?>

<!-- <script type="text/javascript" src="../jquery/jquery.js"></script>-->


<link rel="stylesheet" type="text/css" href="../images/tablas/DataTables-1.10.6/media/css/jquery.dataTables.css">  
<!-- jQuery -->
 <!--<script type="text/javascript" charset="utf8" src="../images/tablas/DataTables-1.10.6/media/js/jquery.js"></script> -->
 <!-- DataTables -->
<script type="text/javascript" charset="utf8" src="../images/tablas/DataTables-1.10.6/media/js/jquery.dataTables.js"></script>


</body>
</html>
