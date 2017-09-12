<script type="text/javascript">   

    $(function(){
        $('#frmEditar').validate();       
        
        var tabContainers=$('div.tabs > div');
        tabContainers.hide().filter(':first').show();
        $('div.tabs ul.tabNavigation a').click(function(){
            tabContainers.hide();
            tabContainers.filter(this.hash).show();
            $('div.tabs ul.tabNavigation a').removeClass('selected');
            $(this).addClass('selected');
            return false;
        }).filter(':first').click();

        //incluir destinatario
        $('a.destino').click(function(){
            var nombre=$(this).attr('nombre');   
            var cargo=$(this).attr('cargo');   
            var via=$(this).attr('via');   
            var cargo_via=$(this).attr('cargo_via');   
            $('#destinatario').val(nombre);
            $('#cargo_des').val(cargo);

            if(via==undefined)
                $('#via').val("");
            else $('#via').val(via);
            if(cargo_via==undefined)
                $('#cargovia').val("");
            else $('#cargovia').val(cargo_via);

            $('#referencia').focus();
            return false;
        });

///Fin Presupuesto    
        $('#btnword').click(function(){
            $('#word').val(1);
            return true
        });
        $('#save').click(function(){
            $('#frmEditar').submit();        
        });
        $('#subir').click(function(){
            var id=$(this).attr('rel');
            var left=screen.availWidth;
            var top=screen.availHeight;
            left=(left-700)/2;
            top=(top-500)/2;
            var r=window.showModalDialog("/archivo/add/"+id,"","center:0;dialogWidth:600px;dialogHeight:450px;scroll=yes;resizable=yes;status=yes;"+"dialogLeft:"+left+"px;dialogTop:"+top+"px");
            alert(r);
            return false;
        });        
//        $("input.file").si();

    });
</script>
<style type="text/css">
    form#frmCreate{ padding: 0 5px; margin: 0;}
    .cke_contents{height: 500px;}
    cke_skin_kama{border: none;}
    div.si label.cabinet {
        width: 156px;
        height: 34px;
        display: block;
        overflow: hidden;
        position: relative;
        z-index: 3;
        float: left;
        cursor: pointer; 
    }
    div.si label.cabinet input {
        position: relative;
        left: -140px;
        top: 0;
        height: 100%;
        width: auto !important;
        z-index: 2;
        opacity: 0;
        -moz-opacity: 0;
        filter:progid:DXImageTransform.Microsoft.Alpha(opacity=0);
    }
    div.si div.uploadButton {
        position: relative;
        float: left;
    }
    div.si div.uploadButton div {
        width: 156px;
        height: 34px;
        background: url(/media/images/examinar.png) 0 0 no-repeat;
        left: -156px;
        position: absolute;
        z-index: 1;

    }
    div.si label.selectedFile {
        margin-left: 5px;
        line-height: 34px;
    }

</style>

<h2 class="subtitulo">Editar <?php echo $documento->codigo; ?> - <b><?php echo $documento->nur; ?></b><br/><span> Editar documento <?php echo $documento->codigo; ?> </span></h2>
<div class="tabs">
    <ul class="tabNavigation">
        <li><a href="#editar">Edición</a></li>
        <li><a href="#adjuntos">Adjuntos</a></li>        
    </ul>
    <div id="editar"> 

        <div class="formulario"  >  
            <div style="border-bottom: 1px solid #ccc; background: #F2F7FC; display: block; padding: 10px 0;   width: 100%;  ">    
                <a href="#" class="link save" id="save" title="Guardar cambios hechos al documento" > Guardar</a>
                | <a href="/pdf/<?php echo $tipo->action ?>.php?id=<?php echo $documento->id; ?>" class="link pdf" target="_blank" title="Imprimir PDF" >PDF</a>
                |  
                <?php if ($documento->estado == 1): ?> 
                    <a href="/seguimiento/?nur=<?php echo $documento->nur; ?>" class="link derivar" title="Ver seguimiento" >Derivado</a>      
                <?php else: ?>
                    <a href="/hojaruta/derivar/?id_doc=<?php echo $documento->id; ?>" class="link derivar" title="Derivar a partir del documento, si ya esta derivado muestra el seguimiento" >Derivar</a>      
                <?php endif; ?>
                <?php
                $session = Session::instance();
                if ($session->get('super') == 1):
                    ?>
                |  <a href="/word/print.php?id=<?php echo $documento->id; ?>" class="link word" target="_blank" title="Editar este documento en word" >Editar en Word</a>       
            <?php endif; ?>
        </div>
        <form action="/documento/editar/<?php echo $documento->id; ?>" method="post" id="frmEditar" >  
            <?php if (sizeof($mensajes) > 0): ?>
                <div class="info">
                    <p><span style="float: left; margin-right: .3em;" class="ui-icon-info"></span>
                        <?php foreach ($mensajes as $k => $v): ?>
                            <strong><?= $k ?>: </strong> <?php echo $v; ?></p>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>        
                <br/>
                <?php
                if ($documento->id_tipo == 5):
                    echo Form::hidden('proceso', 1);
                else:
                    ?>        
                <fieldset> <legend>Proceso: <?php echo Form::select('proceso', $options, $documento->id_proceso); ?>
                </legend>
            <?php endif; ?>            
            <table width="100%">
                <tr>
                    <td style=" border-right:1px dashed #ccc; padding-left: 5px;">
                        <input type="hidden" name="titulo" />   
                        <p>
                            <?php
                            echo Form::hidden('id_doc', $documento->id);
                            echo Form::hidden('descripcion', '');
                            echo Form::label('destinatario', 'Autoriza el Viaje:', array('class' => 'form'));
                            echo Form::input('destinatario', $documento->nombre_destinatario, array('id' => 'destinatario', 'size' => 45, 'class' => 'required'));
                            ?>
                        </p>
                        <p>
                            <?php
                            echo Form::label('destinatario', 'Cargo:', array('class' => 'form'));
                            echo Form::input('cargo_des', $documento->cargo_destinatario, array('id' => 'cargo_des', 'size' => 45, 'class' => 'required'));
                            ?>
                        </p> 
                        <?php if ($tipo->via == 0): ?>
                            <p>
                                <label>Institución Destinatario</label>
                                <input type="text" size="40" value="<?php echo $documento->institucion_destinatario; ?>" name="institucion_des" />    
                            </p>
                            <input type="hidden" size="40" value="" name="via" />    
                            <input type="hidden" size="40" value="" name="cargovia" />    
                        <?php else: ?>
                            <input type="hidden" size="40" value="" name="institucion_des" />    

                            <p>
                                <?php
                                echo Form::label('via', 'Via:', array('class' => 'form'));
                                echo Form::input('via', $documento->nombre_via, array('id' => 'via', 'size' => 45/* ,'class'=>'required' */));
                                ?>
                                <?php
                                echo Form::label('cargovia', 'Cargo Via:', array('class' => 'form'));
                                echo Form::input('cargovia', $documento->cargo_via, array('id' => 'cargovia', 'size' => 45/* ,'class'=>'required' */));
                                ?>
                            <?php endif; ?>

                        </p>
                    </td>
                    <td style=" border-right:1px dashed #ccc; padding-left: 5px;">
                        <p>
                            <?php
                            echo Form::label('remitente', 'Funcionario Comisión: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mosca', array('class' => 'form'));
                            echo Form::input('remitente', $documento->nombre_remitente, array('id' => 'remitente', 'size' => 32, 'class' => 'required'));
                            ?>            
                            <?php
                                    //  echo Form::label('mosca','Mosca:');
                            echo Form::input('mosca', $documento->mosca_remitente, array('id' => 'mosca', 'size' => 4));
                            ?>
                            <?php
                            echo Form::label('cargo', 'Cargo Funcionario:', array('class' => 'form'));
                            echo Form::input('cargo_rem', $documento->cargo_remitente, array('id' => 'cargo_rem', 'size' => 45, 'class' => 'required'));
                            ?>
                            <?php
                            echo Form::label('adjuntos', 'Adjunto:', array('class' => 'form'));
                            echo Form::input('adjuntos', $documento->adjuntos, array('id' => 'adjuntos', 'size' => 45/* ,'class'=>'required','title'=>'Ejemplo: Lo citado' */));
                            ?>
                            <?php
                            echo Form::label('copias', 'Con copia a:', array('class' => 'form'));
                            echo Form::input('copias', $documento->copias, array('id' => 'adjuntos', 'size' => 45/* ,'class'=>'required' */));
                            ?>
                        </p>
                    </td>



                    <td rowspan="2" style="padding-left: 5px;">
                        <?php echo Form::label('dest', 'Mis destinatarios:'); ?>
                        <div id="vias">
                            <ul>
                                <!-- Destinatario -->    
                                <?php foreach ($vias as $v): ?>
                                    <li class="<?php echo $v['genero'] ?>"><?php echo HTML::anchor('#', $v['nombre'], array('class' => 'destino', 'nombre' => $v['nombre'], 'title' => $v['cargo'], 'cargo' => $v['cargo'], 'via' => $v['via'], 'cargo_via' => $v['cargo_via'])); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </td>


                </tr>
                <tr>
                    <td colspan="2">
                        <?php echo Form::label('referencia','Referencia')?>
                        <textarea name="referencia" id="referencia" style="width: 600px;" class="required" ><?php echo $documento->referencia?></textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="3"><hr /><br/></td>
                </tr>
                <tr>
                    <td colspan="3">
                        <table border="0">
                            <tr>
                                <td colspan="2">
                                    <?php echo Form::label('referencia','Antecedentes')?>
                                    <textarea name="antecedente" id="antecedente" style="width: 600px;" ><?php echo $pre->antecedente?></textarea>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>


            <div style="clear:both; display: block;"></div>
            <input type="hidden" id="con" value="<?php echo strlen($documento->contenido . $documento->referencia); ?> "/>
            <p>
                <hr/>
                <input type="submit" name="documento" value="Modificar documento" class="uibutton" />   
            </p>
        </fieldset>

    </form>
</div>
</div>
<div id="adjuntos">
    <div class="formulario">        
        <form method="post" enctype="multipart/form-data" action="" >
            <label>Selecione un archivo para subir...</label>
            <input type="file" class="file" name="archivo"/>                 
            <input type="hidden" name="id_doc" value="<?php echo $documento->id; ?>"/>
            <input type="submit" name="adjuntar" value="subir"/>
        </form>        
        <div style="clear: both;">

        </div>
        <h2 style="text-align:center;">Archivos Adjuntos </h2><hr/>
        <table id="theTable">
            <thead>
                <tr>
                    <th>NOMBRE ARCHIVO</th>
                    <th>TAMA&Ntilde;O</th>
                    <th>FECHA DE SUBIDA</th>
                    <th>ACCION</th>
                </tr>
            </thead>
            <tbody>                
                <?php foreach ($archivos as $a): ?>
                    <tr>
                        <td><a href="/descargar.php/?id=<?php echo $a->id; ?>"><?php echo substr($a->nombre_archivo, 13) ?></a></td>
                        <td align="center"><?php echo number_format(($a->tamanio / 1024) / 1024, 2) . ' MB'; ?></td>
                        <td align="center"><?php echo $a->fecha ?></td>
                        <td align="center"><a href="/archivo/eliminar/<?php echo $a->id; ?>" class="link delete">Eliminar</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>    
    </div>
</div>
</div>