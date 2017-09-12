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
	from tbl_documentos AS docs";

//EJECUTAMOS LA CONSULTA
$res=mysql_query($qry) or die("Query: $qry ".mysql_error());

//RECORREMOS LA CONSULTA
while ($obj=mysql_fetch_object($res)) {
	//SI EL TIPO DE DOCUMENTO ES UMAGEN LA MOSTRAMOS SI NO SOLO HACEMOS EL LINK
	switch ($obj->display){
		case "image":
			echo "<div>
					<a href='getfile.php?id_documento={$obj->id_documento}'>
						<img src='getfile.php?id_documento={$obj->id_documento}' alt='$obj->titulo' />
					</a>
				</div><hr />";
			break;
		case "file":
			echo "<div>
					$obj->titulo | $obj->nombre_archivo <a href='getfile.php?id_documento={$obj->id_documento}'> Descargar </a>
				</div><hr />";
			break;			
	}
	
}
//CERRAMOS LA CONEXION
mysql_close();
?>