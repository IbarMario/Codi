<!--<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Ing. Efrain Espinoza Callisaya - 2015">
<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="css/demo.css">
<link href="css/style.css" rel="stylesheet" type="text/css"/>
<style type="text/css" class="init">

	div.dataTables_length {
	padding-left: 2em;
	}
	div.dataTables_length,
	div.dataTables_filter {
		padding-top: 0.55em;
	}
</style>

<!--<link href='http://fonts.googleapis.com/css?family=Black+Ops+One' rel='stylesheet' type='text/css'>-->
<!--<style type="text/css">
div {
  border-top-width: 10px;
  border-right-width: 1em;
  border-bottom-width: thick;
  border-left-width: thin;
}
</style>-->
<script type="text/javascript" language="javascript" src="js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>
<script type="text/javascript" language="javascript" class="init123456">
$(document).ready(function() {
	$('#example').dataTable( {
		"dom": '<"top"iflp<"clear">>rt<"bottom"iflp<"clear">>'
	} );
} );

</script>
<!--  EFRAIN ESPINOZA -->
<script language=”JavaScript”>
function Abrir_ventana (pagina) {
var opciones="toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=640, height=480, top=100, left=100";

window.open(pagina,"",opciones);
}

function reEnviaFormularioCero(){
document.f1.submit();
}
</script>
<!--
<title>IntraNet - MDPyEP - Comunicados</title>
</head>
<body>
<br />
	<div class="container">
    <div class="grid simple ">
	<div class="grid-body ">
    
  <div align="center">
    <H1><strong><font color="#003399">AVISO</font></strong></H1>
  </div>
<table class="table table-striped" id="example1111">
  <thead>
      <tr>
      	<th>
   -->     
<?php
//NOS CONECAMOS A LA BASE DE DATOS
//REMPLAZEN SUS VALOS POR LOS MIOS
//mysql_connect("localhost","root","") or die("No se pudo conectar a la base de datos");
mysql_connect("192.168.20.38","correspondencia","c0rr3sp0nd3nc14") or die("No se pudo conectar a la base de datos");

//SELECCIONAMOS LA BASE DE DATOS CON LA CUAL VAMOS A TRABAJAR CAMBIEN EL VALOR POR LA SUYA
//mysql_select_db("correspondencia_v3");
mysql_select_db("correspondencia");

//CONSTRUIMOS EL QUERY PARA OBTENER LOS ARCHIVOS
$qry="select 
		docs.*,
		CASE docs.tipo 
			WHEN 'image/png' then 
				'image'
			WHEN 'image/jpg' then 
				'image'
			WHEN 'image/gif' then 
				'image'
			WHEN 'image/jpeg' then 
			'image'
			ELSE 
				'file' 
		END as display
	from tbl_avisos AS docs order by id_documento DESC LIMIT 1";

//EJECUTAMOS LA CONSULTA
$res=mysql_query($qry) or die("Query: $qry ".mysql_error());

//RECORREMOS LA CONSULTA
while ($obj=mysql_fetch_object($res)) {
	//SI EL TIPO DE DOCUMENTO ES UMAGEN LA MOSTRAMOS SI NO SOLO HACEMOS EL LINK
	switch ($obj->display){
		case "image":
			echo "<div>				
				  <a href='listAvi.php' target='_blank'> <center> <img width='350' height='480' scrolling='no' src='getfileAvi.php?id_documento={$obj->id_documento}' alt='$obj->titulo' /> </center></a>
				</div><hr />";
			break;
/*		case "file":
			echo "<div>
					$obj->titulo | $obj->nombre_archivo <a href='getfileAvi.php?id_documento={$obj->id_documento}'> Descargar </a>
				</div><hr />";
			break;			*/
	}
	
}
//CERRAMOS LA CONEXION
mysql_close();
?>                     
<!--        </th>
        </tr>
      </thead>
</table>
</div></div></div>
   <br>
</body>
-->