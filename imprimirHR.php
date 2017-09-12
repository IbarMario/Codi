<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Ing. Efrain Espinoza C. - 2015" />
<title>MDPyEP - Imprimir HR</title>
<style>
.button{
    background:#e5e5e5;
    display:inline-block;
    margin:0 6px;
    padding:7px 20px 7px;
    color:#333;
    text-decoration:none;
    text-shadow: 0 1px 1px #FFF;
    border:1px solid #ccc;
 
    /* Bordes redondenados - Border Radius */
    -webkit-border-radius:4px;
    -moz-border-radius:4px;
    border-radius:4px;
 
    /* Fondo Degradado - Background Gradient */
    background:-webkit-linear-gradient(top, #fefefe, #e5e5e5); /* Chrome 10+ */
    background:   -moz-linear-gradient(top, #fefefe, #e5e5e5); /* Firefox 3.6+ */
    background:    -ms-linear-gradient(top, #fefefe, #e5e5e5); /* IE10 */
    background:        linear-gradient(top, #fefefe, #e5e5e5);
 
    /* Aplcamos sombras al boton - Box Shadow */
    -webkit-box-shadow:inset 0 1px 0 rgba(255,255,255, .3), inset 0 0 0 1px rgba(255,255,255, .6), 0 1px 2px rgba(0, 0, 0, .1);
    -moz-box-shadow:inset 0 1px 0 rgba(255,255,255, .3), inset 0 0 0 1px rgba(255,255,255, .6), 0 1px 2px rgba(0, 0, 0, .1);
    box-shadow:inset 0 1px 0 rgba(255,255,255, .3), inset 0 0 0 1px rgba(255,255,255, .6), 0 1px 2px rgba(0, 0, 0, .1);
 
    /* Animacion - Transition */
    -webkit-transition: all ease-in-out .3s;
    -moz-transition: all ease-in-out .3s;
    transition: all ease-in-out .3s;
}
</style>
</head>
<?php
$nur=$_GET['nur'];
//echo $nur;
?>
<body bgcolor="#f2f7fc">
<p>
<div align="center"><font face="Tahoma, Geneva, sans-serif">IMPRIMIR HOJA DE RUTA</font></div></p>
<div align="center">
<p>
 <a href="/print_hr.php?nur=<?php echo $nur;?>&copia=0" target="_blank" class="button" onclick="window.close()"><img src="/media/images/printer.png" alt="Imprimir Original" align="absmiddle"/> &nbsp; Original</a></p>
<p>   
  <a href="/print_hr.php?nur=<?php echo $nur;?>&copia=1" target="_blank" class="button" onclick="window.close()"><img src="/media/images/printer.png" alt="Imprimir Copia" align="absmiddle"/> &nbsp; Copia</a> 
  
</p>
<p>
  <input type="button" value="Cancelar" onclick="window.close()" class="button"/>
</p>
</div>
</body>
</html>