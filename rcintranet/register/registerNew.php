<?php
include_once("../connection/database/connection.php");
include_once("../connection/core/operator.php");
include("header.php");
 $message = OPERATOR::toSql(safeHTML(OPERATOR::getParam("msg")), 'Number');
?>  
<!-- begin body -->
<script type="text/javascript" src="../js/jquery.atooltip.js"></script>
<script type="text/javascript">
$(function(){ 
    $('.normalTip').aToolTip();       
}); 
</script>
<div class="contH">    
    <div class="contC">        
        <h2>Registro de usuario</h2>
        <br>
        <?php 
        if ($message==1 || $message==6 || $message==4 || $message==7 ) {?>
           <form class="formL validable" action="registerAdd.php" method="GET" autocomplete="off" >
            <fieldset>
                <p>                    
            <?php switch ($message) {
                        case 1: echo "<span id=\"message\" class=\"txtC\">Sus datos fueron enviados de manera exitosa.<br/> Por favor, ingrese a su correo electrónico, y espere un correo de confirmación junto con un enlace para acceder a la encuesta.
                        <br/>Ingrese a la encuesta electrónica haciendo clic en dicho enlace.<br>
                        Si haciendo clic no puede acceder, copie el enlace en la barra de dirección de su navegador.<br>
                        </span>";
                        break;
                        case 2: echo "<span id=\"message\" class=\"txtR\">Surgi&oacute; un problema en su registro. Intente de nuevo.</span>";
                        break;
                        case 3: echo "<span id=\"message\" class=\"txtC\">Ya existe el registro de sus datos.</span>";
                        break;
                        case 4: echo "<span id=\"message\" class=\"txtC\">Sus datos fueron enviados de manera exitosa.<br/> Por favor, ingrese a su correo electrónico, y espere un correo de confirmación junto con un enlace para acceder a la encuesta.
                        <br/>Ingrese a la encuesta electrónica haciendo clic en dicho enlace.<br>
                        Si haciendo clic no puede acceder, copie el enlace en la barra de dirección de su navegador.<br>
                        </span>";
                        break;
                        case 5: echo "<span id=\"message\" class=\"txtR\">Ocurrio un problema al enviar respuesta a su correo electr&oacute;nico. Intente de nuevo.</span>";
                        break;
                        case 6: echo "<span id=\"message\" class=\"txtR\">Sólo se pueden registrar las empresas clasificadas en el rubro Comercio y Servicios.</span>";
                        break;
                        case 7: echo "<span id=\"message\" class=\"txtR\">La matrícula de comercio no existe an la Base de datos Empresarial Activa. Favor de pasar por la oficinas de Registro de Comercio a la brevedad posible.</span>";
                        break;
                    }?>
                </p>
                <p>
                </p>
            </fieldset> 
        </form>
        <?php
        }else{
        ?>
        <p>
            Ingrese los datos requeridos y haga clic en el botón ACEPTAR
        </p>
        <form class="formL validable" action="registerAdd.php" method="post" autocomplete="off" >
            <fieldset>                
                 <p>                
                    <label>Nombres:</label>
                    <input type="text" name="nombres" id="nombres" size="40" class="inpA required normalTip" title="Ingrese sus nombres." /> 
                    <span id="div_name" class="bxEr2" style="display: none;">campo requerido</span>
                    <span id="div_name_2" class="bxEr2" style="display: none;">Nombre invalido</span>
                </p>
                <p>
                    <label>Apellido Paterno:</label>
                    <input type="text" name="paterno" id="paterno" size="40" class="inpA required normalTip" title="Ingrese su apellido paterno." />
                    <span id="div_pater" class="bxEr2" style="display: none;">campo requerido</span>                    
                </p>
                <p>
                    <label>Apellido Materno:</label>
                    <input type="text" name="materno" id="materno" size="40" class="inpA required normalTip" title="Ingrese su apellido materno." />
                    <span id="div_mater" class="bxEr2" style="display: none;">campo requerido</span>                    
                </p>
                <p>
                    <label>C&eacute;dula de Identidad:</label>
                    <input type="text" name="ciusr" id="ciusr" size="40" class="inpA required normalTip" title="Ingrese su número de cédula de identidad." />
                    <span id="div_ci" class="bxEr2" style="display: none;">campo requerido</span>                    
                </p>
                <p>
                    <label>Expedido en:</label>
                    <input type="text" name="expciusr" id="expciusr" size="5" class="inpA required normalTip" title="Ingrese lugar donde obtuvo su cédula de identidad. (LP,OR,CH..)" />
                    <span id="div_exp" class="bxEr2" style="display: none;">campo requerido</span>                    
                </p>
                <p>                
                    <label>N&ordm; de matr&iacute;cula:</label>
                    <input type="text" name="matricula" id="matricula" size="40" class="inpA required normalTip" title="Ingrese el número de matrícula de comercio de su empresa.<br> En caso de duda, consulte a FUNDEMPRESA." /> 
                    <span id="div_matricula" class="bxEr2" style="display: none;">campo requerido</span>
                </p>
                <p>
                    <label>Correo electr&oacute;nico:</label>
                    <input type="text" name="email" id="email" size="40" class="inpA required email normalTip" title="Ingrese su correo electrónico personal, para que el sistema le remita un correo de validación de cuenta." />
                    <span id="div_email" class="bxEr2" style="display: none;">campo requerido</span>
                    <span id="div_email_2" class="bxEr2" style="display: none;">correo invalido</span>
                </p>
                <p>
                    <label>Contrase&ntilde;a:</label>
                    <input type="password" name="passwd" id="passwd" size="40" class="inpA required alphanum normalTip" title="Ingrese una contraseña exclusiva para acceder a la encuesta electrónica.<br> Esta contraseña es diferente a la contraseña que utiliza para acceder a su correo electrónico.<br>
                    Recuerde guardar esta contraseña para acceder a futuras actualizaciones." />
                    <span id="div_passwd" class="bxEr2" style="display: none;">campo requerido</span>
                </p>
                <p>                    
                    <?php                   
                    switch ($message) {
                        case 1: echo "<span id=\"message\" class=\"txtC\">Sus datos fueron enviados de manera exitosa.<br/> Por favor, ingrese a su correo electrónico, y espere un correo de confirmación junto con un enlace para acceder a la encuesta.
                        <br/>Ingrese a la encuesta electrónica haciendo clic en dicho enlace.<br>
                        Si haciendo clic no puede acceder, copie el enlace en la barra de dirección de su navegador.<br>
                        </span>";
                        break;
                        case 2: echo "<span id=\"message\" class=\"txtR\">Surgi&oacute; un problema en su registro. Intente de nuevo.</span>";
                        break;
                        case 3: echo "<span id=\"message\" class=\"txtC\">Ya existe el registro de sus datos.</span>";
                        break;
                        case 4: echo "<span id=\"message\" class=\"txtC\">Sus datos fueron enviados de manera exitosa.<br/> Por favor, ingrese a su correo electrónico, y espere un correo de confirmación junto con un enlace para acceder a la encuesta.
                        <br/>Ingrese a la encuesta electrónica haciendo clic en dicho enlace.<br>
                        Si haciendo clic no puede acceder, copie el enlace en la barra de dirección de su navegador.<br>
                        </span>";
                        break;
                        case 5: echo "<span id=\"message\" class=\"txtR\">Ocurrio un problema al enviar respuesta a su correo electr&oacute;nico. Intente de nuevo.</span>";
                        break;
                    }
                    ?>
                </p>
                <p>
                </p>
                <p>
                    <label>&nbsp;</label>
                    <input type="submit" value="Aceptar" id="sendData" class="button" >
                    <span class="txtIn">
                        o <a class="lnk3" href="../index.php">Volver a la p&aacute;gina de inicio</a>
                    </span>
                </p>
            </fieldset>
        </form>
        <?php } ?>
        <div class="clear"></div>
    </div>    
</div>
<!-- end body -->       
<?php include("footer.php") ?>