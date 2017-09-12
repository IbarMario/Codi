<?php
/********************************************************
 * modificado por wilfredo mendoza
 * MDPYEC-VPIMGE -----  MARZO 2015
 ********************************************************/
include_once("../connection/database/connection.php");
include_once("../connection/core/operator.php");
//require_once('../jasgvhsbhsdflsbushdfuishadfuashdf.php');
//require_once('../kasgvhsbhsdflsbushdfuishadfuashdf.php');
//definición de variables
$link='';
$razonsocial='';
$nombreasociacion='';
$nroformulario=0;
$typeencuesta=0;
$encontrado=0;
//recepción de datos de entrada incluyendo la matrícula de comercio

$nombres = strtoupper(OPERATOR::toSql(safeHTML(OPERATOR::getParam("nombres")),'Text'));
$paterno = strtoupper(OPERATOR::toSql(safeHTML(OPERATOR::getParam("paterno")),'Text'));
$materno = strtoupper(OPERATOR::toSql(safeHTML(OPERATOR::getParam("materno")),'Text'));
$ciuser = OPERATOR::toSql(safeHTML(OPERATOR::getParam("ciusr")),'Text');
$expciusr = strtoupper(OPERATOR::toSql(safeHTML(OPERATOR::getParam("expciusr")),'Text'));
$matricula = OPERATOR::toSql(safeHTML(OPERATOR::getParam("matricula")),'Text');
$cadenauno=$matricula;
$sEmail = OPERATOR::toSql(safeHTML(OPERATOR::getParam("email")),'Text');
$passwd = OPERATOR::toSql(safeHTML(OPERATOR::getParam("passwd")),'Text');
//echo "Matricula->".$matricula."<br>";
//echo "cadenauno->".$cadenauno."<br>";
//$resultado = hdjdujerhrjhgnvbdybyrg($cadenauno,'http://200.105.134.19:10080/wsInfoBoletas/servdata.asmx?WSDL');
//conectar a la base de datos empresarial activa
//$link = mysqli_connect("localhost", "root", "vpimge2015", "bea");
//$link = mysqli_connect("192.168.20.38", "user_encuesta", "pass_encuesta", "bea");
/*if ($link) {
$stat=0;
}*/
//echo $stat;
//echo ("<br>");
//if ($stat === 0) {
//echo 'Conexión establecida';
$query = "SELECT * FROM padron_empresarial WHERE matricula = '".$cadenauno."' LIMIT 0,1 ";
//echo $query;
$db3->query( $query );
//echo $db3->numrows();
if( $db3->numrows() > 0 ) {
    $row = $db3->next_record();
    //echo "Existe en la Base de datos Empresarial Activa...";
    $razonsocial = $row['razon_social'];
    $actividad = $row['actividad'];        
    $nroformulario = $row['nro_formulario'];
    $encontrado = 1;    
    $typeencuesta=$nroformulario;
    $sql = "SELECT * FROM sys_users WHERE usr_login = '".$cadenauno."' AND usr_delete = 0 ";
    //echo $sql;
    $db->query( $sql );
    if( $db->numrows() > 0 ) {
            $msg = 3;	//user exist tregistrado en sys_users
    } else {
            if(  !empty($matricula) && !empty($sEmail)  && !empty($passwd) && !empty($nombres) && !empty($paterno) && !empty($materno) && !empty($ciuser) && !empty($expciusr) ) {
            $sql = " INSERT INTO sys_users ( usr_login, usr_pass, usr_email, usr_nombres, usr_paterno, usr_materno, usr_ci, usr_ci_exp, usr_status, usr_delete, usr_sw_ref, usr_datecreate, usr_dateupdate ) "
            ." VALUES ( '".$matricula."', md5('".$passwd."'), '".$sEmail."', '".$nombres."', '".$paterno."', '".$materno."', '".$ciuser."', '".$expciusr."', 'INACTIVE', '0', '1', NOW(), NOW() )";
            $db->query($sql);
            //echo ($sql);            
            $db->query( "SELECT LAST_INSERT_ID() as id" );
            $aUser = $db->next_record();

            $new_usruid =$aUser["id"];		
            $sToken = md5($new_usruid."-".$matricula."-".$sEmail."-tok");

            $sValUrl = $domain."/register.php?act=".$sToken;
            // die($sValUrl);
            $msg = 1;
        } else {
          $msg = 2;
      }
    }

    if(  !empty($matricula) && !empty($sEmail)  && !empty($passwd) && !empty($nombres)  && !empty($ciuser) &&  ( $msg == 1 ) ) {
        $body  = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Validaci&oacute;n de cuenta</title>
        </head>
        <body>
        <table width="100%" border="0" cellpadding="0" cellspacing="0" style="background-color: #f7f7f7; padding: 40px 0;">
        <tr>
        <td align="center" valign="middle">
        <table width="700" border="0" cellpadding="0" cellspacing="0" style="background-color: #ffffff; border-bottom: 2px solid #d6d5d4;">
        <tr>
        <td align="left" valign="middle" style="padding: 20px 25px;">&nbsp;</td>
        </tr>
        <tr>
        <td style="color: #26221c; font-family: Arial, Helvetica, sans-serif; font-size:14px; line-height: 20px; text-align:justify; padding: 22px 20px;">
        <span style="color: #a00014; font-size: 20px;">Validaci&oacute;n de cuenta de usuario</span>
        <br />
        <p>Por favor, ingrese a su cuenta a trav�s del siguiente enlace:</p>
        <p><span style="font-weight: 700;"><a href="'.$sValUrl.'" target="_blank">'.$sValUrl.'</a></span></p>
        <p>Si no puede hacer clic, copie el enlace en la barra de direcci�n de su navegador.</p>
        <p>Una vez que haya realizado el paso anterior, su cuenta estar� habilitada y podr� acceder a la encuesta electr�nica a trav�s del mismo enlace.
        </p>
        <br />
        <br />
        <br />
        <br />
        <br />
        </td>
        </tr>  
        </table>
        </td>
        </tr>
        </table>
        </body>
        </html>';

        //echo $body;
        // Plain text body (for mail clients that cannot read HTML)
        $text_body = "Por favor valida tu cuenta haciendo clic en el siguiente enlace: "
        ."Si no puedes hacer clic, copia  el enlace en la barra de direcci�n de tu navegador. ".$sValUrl." "
        ."Una vez realizado el paso anterior, tu cuenta ya estar� habilitada. ";

        //SMTP needs accurate times, and the PHP time zone MUST be set
        //This should be done in your php.ini, but this is how to do it if you don't have access to that
        date_default_timezone_set('Etc/UTC');

        require '../phpmailer/class.phpmailer.php';

        //Create a new PHPMailer instance
        $mail = new PHPMailer();
        //Tell PHPMailer to use SMTP
        $mail->IsSMTP();
        //Enable SMTP debugging
        // 0 = off (for production use)
        // 1 = client messages
        // 2 = client and server messages
        $mail->SMTPDebug  = 0;
        //Ask for HTML-friendly debug output
        $mail->Debugoutput = 'html';
        //Set the hostname of the mail server
        //$mail->Host  = 'correo.produccion.gob.bo';
        $mail->Host  = 'smtp.gmail.com';
        //$mail->Port       = 465;
        $mail->Port  = 587;
        $mail->SMTPSecure = 'tls';        
        //Whether to use SMTP authentication
        $mail->SMTPAuth   = true;
        //Username to use for SMTP authentication - use full email address for gmail
        //$mail->Username   = "encuesta.mdpyep@gmail.com";
        $mail->Username   = "encuesta.mdpyep@gmail.com";
        //Password to use for SMTP authentication
        $mail->Password   = "3ncu3st4123";
        //Set who the message is to be sent from
        $mail->SetFrom('encuesta.mdpyep@gmail.com', 'Encuesta');
            //Set an alternative reply-to address
            //$mail->AddReplyTo('replyto@example.com','First Last');
        //Set who the message is to be sent to
        $mail->AddAddress( $sEmail , 'Usuario');
        //Set the subject line
        $mail->Subject = 'Validacion de cuenta';
        //Read an HTML message body from an external file, convert referenced images to embedded, convert HTML into a basic plain-text alternative body
        //$mail->MsgHTML(file_get_contents('contents.html'), dirname(__FILE__));
        $mail->MsgHTML($body);
        //Replace the plain text body with one created manually
        //$mail->AltBody = 'This is a plain-text message body'; $text_body
        $mail->AltBody = $text_body;
        //Attach an image file
        //$mail->AddAttachment('images/phpmailer_mini.gif');
        //Send the message, check for errors
        if (!$mail->Send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
            $msg = "Error sending the message.";
            $msg = 5;
        } else {
            //echo "Message sent!";
            $msg = "Mensaje enviado correctamente.";
            $msg = 4;
        }
        /*--------------------------------------------------------------------------------------------------*/

    } else {
        $msg = "Todos los datos son requeridos.";
        $msg = 2;
    }
} else{
    $msg = "La matrícula de comercio no existe an la Base de datos Empresarial Activa. Favor de pasar por la oficinas de Registro de Comercio a la brevedad posible.";
    $msg = 7;
}
unset($_POST);
header("Location: registerNew.php?msg=".$msg);
?>