<?php
session_start();
error_reporting(0);
if ($_SESSION['documento']==null || $_SESSION['documento']=='') {
  ?>
 <script type="text/javascript">
 		if (confirm("Su sesión a caducado, por favor ingrese nuevamente.")){
 			<?php
 			die();
			header("location:../index.php"); 			
 			?>
 			}
 			else
 			{
 			<?php
 			die();
			header("location:../index.php"); 			
 			?>
 			}
           </script>
<?php
}
?>