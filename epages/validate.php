<?php
session_start();
$vced=$_SESSION['documento'];
$vced= str_replace(".", "", $vced); 
$vced= str_replace("€", "", $vced);
$vced= str_replace(" ", "", $vced);
$vced= str_replace(",00", "", $vced);
error_reporting(0);
if ($_SESSION['documento']==null || $_SESSION['documento']=='') {
  ?>
 <script type="text/javascript">
           alert('Por favor inicie sesión para continuar.');
           </script>
<?php
header("location:../index.php");
die();
}
?>