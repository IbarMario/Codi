<?php
include_once("connection/database/connection.php");
include_once("connection/core/operator.php");
//echo "login bienvenida";
$matricula = OPERATOR::toSql( safeHTML(OPERATOR::getParam("matric")), "Number");
$email = OPERATOR::toSql( safeHTML(OPERATOR::getParam("email")), "Text" );
$passwd = OPERATOR::toSql( safeHTML(OPERATOR::getParam("passwd")), "Text" );

$path_parts = pathinfo($_SERVER['HTTP_REFERER']);
$referer = $path_parts['dirname'].'//'.$path_parts['basename'];

$dom1 = parse_url($referer) ;
$dom2 = parse_url($domain) ;

/*echo "$path_parts->".$path_parts."<br>";
echo "$referer->".$referer."<br>";
echo "$dom1->".$dom1."<br>";
echo "$dom2->".$dom2."<br>";*/

function checkEmpty($var) {
    //echo "$var->".$var."<br>";
    if (strlen($var) >= 1) {
        return false; 
    } else {
        return true;
    }
}

if ( isset($matricula) && isset($email) && isset($passwd)) {
    if ( $dom1["host"] == $dom2["host"] ) {
        //echo "segundo if";
        $validMatricula = array('options' => array('regexp' => "/^[0-9]{3,8}$/")); // matricula valida longitud entre 3 y 8 
        $validPass = array('options' => array('regexp' => "/^[a-zA-Z0-9+�����A�����������\\�����*.,;:)(�_@><#&��!=|?%$'\-\/\"]*$/")); // Pasword valido
        $matricula= filter_var($matricula, FILTER_VALIDATE_REGEXP, $validMatricula);
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $passwd = filter_var($passwd, FILTER_VALIDATE_REGEXP, $validPass);
        /*echo $matricula."<br>";
        echo $email."<br>";
        echo $passwd."<br>";*/
        if ( isset($matricula) && isset($email) && isset($passwd) ) {
            $sql2 = "SELECT * FROM sys_users WHERE usr_login LIKE '" . $matricula . "' AND  usr_pass = md5('" . $passwd . "') AND usr_email = '" . $email . "' AND usr_status = 'ACTIVE' AND usr_delete = 0 ";
            //echo $sql2."<br>";
            $db->query( $sql2 );
            $numfiles = $db->numrows();
            //echo $numfiles."<br>";
            if ($numfiles == 0) {
                header('Location: index_1.php?message=1');   //index.php inicia nuevamente 
            } else {
                $datos = $db->next_record();
              //  echo "Datos.usr_uid".$datos["usr_uid"];
                ///echo "tiene datos";
                session_set_cookie_params(100 * 100);
                @session_start();   //inicio de session para el usuario actual
                $_SESSION[SITE]["authenticated"] = true;
                $_SESSION[SITE]["usr_uid"] = $datos["usr_uid"];
                $_SESSION[SITE]["usr_login"] = $datos["usr_login"];
                $_SESSION[SITE]["usr_email"] = $datos["usr_email"];
                $_SESSION[SITE]["uidtipoformulario"] = $datos["usr_form_uid"];
                $_SESSION[SITE]["typeusrform"] = $datos["usr_sw_ref"];                
                $frmxgestion=OPERATOR::getDbValue("select gest_uid from adm_gestion where gest_sw_active='1'");
$sqle="select regi_uid, regi_swmodifica_uid from sys_registros where regi_user_uid='".$datos["usr_uid"]."' ORDER BY regi_uid DESC LIMIT 1 ";
//echo $sqle."<br>";
                       $db2->query($sqle);
                       $aReg = $db2->next_record();
                       $frmxregisuid = $aReg["regi_uid"];
                       $frmstate = $aReg["regi_swmodifica_uid"];
                       $_SESSION[SITE]["val_regi_swmodifica_uid"] = $frmstate;
                       $_SESSION[SITE]["registro_uid"]=$frmxregisuid;
                       $tokenFront = sha1(PREFIX . uniqid(rand(), TRUE));
                       $_SESSION[SITE]["TOKEN_FRONT"] = $tokenFront;
                       
               $sSQL = "update sys_users_verify set suv_status=1 where suv_cli_uid='" . $datos["usr_uid"] . "'";
               //actualiza el estatus sys_users_verify 
               //echo $sSQL."<br>";
               $db->query($sSQL); 

               $sSQL = "insert into sys_users_verify values (null," . $datos["usr_uid"] . ",'" . $tokenFront . "',now(),'" . $_SERVER['REMOTE_ADDR'] . "',0,'" . $_SERVER['HTTP_USER_AGENT'] . "')";
               //echo $sSQL."<br>";
               $db->query($sSQL);
      /*       echo "Salió de los SQL para entrar a distribuir a los formularios<br>";               
               echo "$frmstate->".$frmstate."<br>";               
               echo "$datos[usr_form_uid]->".$datos["usr_form_uid"]."<br>";
               echo "$_SESSION[SITE][uidtipoformulario]->".$_SESSION[SITE]["uidtipoformulario"]."<br>";*/
               //echo $frmstate."<br>"; 
               //echo $datos["usr_form_uid"];
               if( !checkEmpty($frmstate) && $frmstate == 0 && $datos["usr_form_uid"]!=1 ) {
                   //echo "errorlllll";
                    //echo "[uidtipoformulario] if->".$_SESSION[SITE]["uidtipoformulario"]."<br>";
                    switch( $_SESSION[SITE]["uidtipoformulario"] ) {                    
                    case 1: header('Location: modcose/bol.php'); break; //registro de comercio y servicios
                    case 2: header('Location: modenin/bol.php'); break;   //registro agroindustria
                    case 3: header('Location: modagin/bol.php'); break;    //registro de industrias manufactureras
                }                    
            } else {
                //echo "de login";
                //echo "deberia trasladarse a option, para distribuir";                         
                header('Location: option.php');         // salio de por aquí       
            }
        }
    } else {
        $message = OPERATOR::toSql(safeHTML(OPERATOR::getParam("message")), 'Number') + 1;
        header('Location: index.php?message=1');
    }
} else {
    $message = OPERATOR::toSql(safeHTML(OPERATOR::getParam("message")), 'Number') + 1;
    header('Location: index.php?message=1');
}
} else {
    $message = OPERATOR::toSql(safeHTML(OPERATOR::getParam("message")), 'Number') + 1;
    header('Location: index.php?message=1');
}

?>