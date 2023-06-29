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
  <?php include ("body_pages/frm_reg_articulo.php"); ?>
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

<script type="text/javascript" src="../f_javascript/jarticulo.js"></script>
<?php include ("../includes/jquery.html"); ?>


</body>
</html>
