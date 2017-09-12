<?php
include_once("db.php"); 
//$user=$_GET['user'];

if (isset($_POST['subir'])) {
		 $inst = $_POST['institucion'];
		 $gestion = $_POST['gestion'];
		 $nur = $_POST['nur'];
		 $cite = $_POST['cite'];
		 $ref = $_POST['referencia'];
		 $remite = $_POST['remitente'];
		 $cremite = $_POST['cargo_remitente'];
		 $instremite = $_POST['inst_remitente'];
		 $dest = $_POST['destinatario'];
		 $cdest = $_POST['cargo_destinatario'];	
		 
		 $cb_nur = $_POST['cb_nur'];
		 $cb_cite = $_POST['cb_cite'];
		 $cb_ref = $_POST['cb_ref'];
 		 $cb_remite = $_POST['cb_remite'];
		 $cb_cremite = $_POST['cb_cremite'];
		 $cb_inst = $_POST['cb_inst'];
		 $cb_desti = $_POST['cb_desti'];
		 $cb_cdesti = $_POST['cb_cdesti'];
		 



   	echo "<script> var inst = '$inst'; var gestion = '$gestion'; var nur = '$nur'; var cite = '$cite'; var ref = '$ref'; var remite = '$remite'; var cremite = '$cremite'; var instremite = '$instremite'; var dest = '$dest'; var cdest = '$cdest'; var cb_nur = '$cb_nur'; var cb_cite = '$cb_cite'; var cb_ref = '$cb_ref'; var cb_remite = '$cb_remite'; var cb_cremite = '$cb_cremite'; var cb_inst = '$cb_inst'; var cb_desti = '$cb_desti'; var cb_cdesti = '$cb_cdesti'; </script>";
	echo '<script type="text/javascript">window.location.href="busqueda_res.php?nur="+nur + "&inst="+inst + "&gestion="+gestion + "&cite="+cite + "&ref="+ref + "&remite="+remite + "&cremite="+cremite + "&instremite="+instremite + "&dest="+dest + "&cdest="+cdest + "&cb_nur="+cb_nur + "&cb_cite="+cb_cite + "&cb_ref="+cb_ref + "&cb_remite="+cb_remite + "&cb_cremite="+cb_cremite+ "&cb_inst="+cb_inst + "&cb_desti="+cb_desti + "&cb_cdesti="+cb_cdesti </script>';

}
?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="Ing. Efrain Espinoza Callisaya - 2016">
    <title>MDPyEP</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.minn.css">
    <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css">
    <link rel="icon" href="favicon.ico">
    <script type="text/javascript" language="javascript" src="js/jquery-1.12.0.min.js"></script>
    <script type="text/javascript" language="javascript" src="js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript">
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>
<style type="text/css">    
 input[type=checkbox] {
    border: 30px;
}
</style>
</head>

<body>
<div class="page-header">
		<h4 class="text-center"><img src="images/logo_mdp.png" width="372" height="85"></h4>
<div class="panel panel-primary">
        <div class="panel-heading">

              <h4 class="text-center">SEGUIMIENTO A HOJAS DE RUTA</h4>
        </div>
<div class="container" align="center">
<div class="">
<form action="" method="post" enctype="multipart/form-data">
<br><br>
<table id="example" class="display" cellspacing="0">
    <tr>
      <td align="right"><label>INSTITUCIÓN</label></td>
      <td><select name="institucion" style="width: 150px">
        <!--<option value="0">Seleccione entidad</option>-->
        <option value="1" <?php if($_POST['entidad']==1) echo 'selected="selected" ';?>>MDPyEP</option>
        <option value="2" <?php if($_POST['entidad']==2) echo 'selected="selected" ';?>>SENAPI</option>
        <option value="4" <?php if($_POST['entidad']==4) echo 'selected="selected" ';?>>SENAVEX</option>
        <option value="3" <?php if($_POST['entidad']==3) echo 'selected="selected" ';?>>IBMETRO</option>
        <option value="6" <?php if($_POST['entidad']==6) echo 'selected="selected" ';?>>PROMUEVE</option>
        <option value="5" <?php if($_POST['entidad']==5) echo 'selected="selected" ';?>>PROBOLIVIA</option>
      </select></td>
    </tr>
    <tr>
      <td align="right"><label>GESTIÓN</label></td>
      <td><select name="gestion" style="width: 80px">
        <!--<option value="0">Gestion</option>-->
        <option value="2017" <?php if($_POST['gestion']==2017) echo 'selected="selected" ';?>>2017</option>
        <option value="2016" <?php if($_POST['gestion']==2016) echo 'selected="selected" ';?>>2016</option>
        <option value="2015" <?php if($_POST['gestion']==2015) echo 'selected="selected" ';?>>2015</option>
        <option value="2014" <?php if($_POST['gestion']==2014) echo 'selected="selected" ';?>>2014</option>
        <option value="2013" <?php if($_POST['gestion']==2013) echo 'selected="selected" ';?>>2013</option>
      </select></td>
    </tr>
    <tr>
      <td align="right"><label>HOJA DE RUTA (NUR) &nbsp;&nbsp;
      <input name="cb_nur" type="checkbox" id="cb_nur" value="1" checked></label></td>
      <td><input name="nur" type="text" id="nur" /></td>
    </tr>

    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>    
  </table>
  <br>
  <div class="container" align="center">
          	<!--  <a href="" class="btn btn-warning">ATRAS</a> &nbsp;&nbsp;&nbsp;-->
            <input type="submit" value="BUSCAR" name="subir" class="btn btn-primary">
        </div>
</form>
</div>
<p align="right">&nbsp;</p>
</div>
</div>
</div>
</body>
<script type="text/javascript" src="js/bootstrap.min.js" ></script>
<!--<script type="text/javascript" src="js/bootstrap-datepicker.js"></script>-->
<script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>
<script type="text/javascript" language="javascript" class="init">
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>
<script type="text/javascript" charset="utf-8">
		function reEnviaFormularioCero(){
		//document.f1.sw1.value="";
		document.f1.submit();
		}
	</script>
</html>