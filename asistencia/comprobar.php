<?php
session_start();
include('db.php');
$user=$_GET['user'];
//include('acceso_db.php');
    if(isset($_POST['acceder'])) { // comprobamos que se hayan enviado los datos del formulario
        // comprobamos que los campos usuarios_nombre y usuario_clave no estén vacíos
        if(empty($_POST['usuario_nombre']) || empty($_POST['usuario_clave'])) {
            echo "El usuario o la contraseña no han sido ingresados. <a href='javascript:history.back();'>Reintentar</a>";
        }else {
            // "limpiamos" los campos del formulario de posibles códigos maliciosos
            $usuario_nombre = mysql_real_escape_string($_POST['usuario_nombre']);

            $usuario_clave = mysql_real_escape_string($_POST['usuario_clave']);
           ///////////////////////////EFRA 
			$usuario_clave = md5($usuario_clave);
            $usuario_clave = $usuario_clave;

            // comprobamos que los datos ingresados en el formulario coincidan con los de la BD
            $sql = mysql_query("SELECT username, password FROM users WHERE username='".$usuario_nombre."' AND password='".$usuario_clave."' AND id_oficina='2' " );
            if($row = mysql_fetch_array($sql)) {
                ////$_SESSION['usuario_id'] = $row['usuario_id']; // creamos la sesion "usuario_id" y le asignamos como valor el campo usuario_id
                $_SESSION['usuario_nombre'] = $row["usuario_nombre"]; // creamos la sesion "usuario_nombre" y le asignamos como valor el campo usuario_nombre
                //header("Location: index.php");
				  //echo '<script type="text/javascript">window.location.href="frmReporte.php";</script>';
  				  echo '<script type="text/javascript">window.location.href="frmSeguimientoAdmin.php";</script>';
            }else {
?>				
               <script type="text/javascript">
				  alert("Usuario y contraseña incorrecto..!!! \n Vuelva a intentarlo");
			   </script>
               <!--<script type="text/javascript">window.location.href="index.php?user=<?php echo $user ?>";</script>-->
               <script type="text/javascript">window.close();</script>
               <!--Error, <a href="index.php">Reintentar</a>-->
<?php
           }
        }
    }else {
        //header("Location: index.php");
		echo '<script type="text/javascript">window.location.href="index.php?user=<?php echo $user ?>";</script>';
    }
?> 
<head>
    <title>MDPyEP</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
</head>