<?php

defined('SYSPATH') or die('Acceso denegado');

class Controller_documento extends Controller_DefaultTemplate {

    protected $user;
    protected $menus;

    public function before() {
        $auth = Auth::instance();
        //si el usuario esta logeado entocnes mostramos el menu
        if ($auth->logged_in()) {
            //menu top de acuerdo al nivel
            $session = Session::instance();
            $this->user = $session->get('auth_user');
            $oNivel = New Model_niveles();
            $this->menus = $oNivel->menus($this->user->nivel);
            parent::before();
            $this->template->title = 'Documentos';
        } else 
{            $url = substr($_SERVER['REQUEST_URI'], 1);
            $this->request->redirect('/login?url=' . $url);
        }
    }

    public function after() {
        $this->template->menutop = View::factory('templates/menutop')->bind('menus', $this->menus)->set('controller', 'documento');
        $oSM = New Model_menus();
        $submenus = $oSM->submenus('documento');
        $docs = FALSE;
        if ($this->user->nivel == 4) {
            $docs = TRUE;
        }
        $this->template->submenu = View::factory('templates/submenu')->bind('smenus', $submenus)->bind('doc', $docs)->set('titulo', 'DOCUMENTOS');
        parent::after();
    }

    public function action_index($id = '') {
        //$url = Cookie::set('url',Request::detect_uri());
        $oTipo = New Model_Tipos();
        $mistipos = $oTipo->misTipos($this->user->id);
        $oDoc = New Model_documentos();
        $documentos = $oDoc->agrupados($this->user->id);
        if (sizeof($documentos) > 0) {
            $recientes = $oDoc->recientes($this->user->id);
            $tipos = array();
            $arrTipos = ORM::factory('tipos')->where('doc', '=', '0')->find_all();
            foreach ($arrTipos as $t) {
                $tipos[$t->id] = $t->plural;
            }
            $this->template->styles = array('media/css/tablas.css' => 'all');
            $this->template->scripts = array('media/js/jquery.tablesorter.min.js');
            $this->template->title .= ' | Documentos Generados';
            $this->template->content = View::factory('documentos/index')
                    ->bind('documentos', $documentos)
                    ->bind('tipos', $tipos)
                    ->bind('mistipos', $mistipos)
                    ->bind('recientes', $recientes);
        } else {
            $this->request->redirect('/documento/nuevo');
        }
    }

    public function action_crear($t = '') {
        $tipo = ORM::factory('tipos', array('action' => $t));
        if ($tipo->loaded()) {
            if (isset($_POST['submit'])) {
                
               $contenido = $_POST['descripcion'];

				//// EFRAIN ESPINOZA
				if (isset($_POST['adm'])) {					
									
					$contenido ='<body marginheight="0" marginwidth="0" topmargin="0">
									<p align="justify">
<B>VISTOS:</B> </p>
									<p align="justify">Que el Decreto Supremo No 29894 de fecha 7 de febrero de 2009, en el tercer parágrafo de su artículo 137 establece la extinción de la Superintendencia de Empresas. Sus competencias serán asumidas por el Ministerio de Desarrollo Productivo y Economía Plural. 
</p>
									<p align="justify">Que en mérito al Decreto Supremo No 0071, promulgado en fecha 09 de abril del 2009, es atribución de la Ministra de Desarrollo Productivo y Economía Plural, administrar el Registro de Comercio, según lo establecido por el Artículo 43, inciso i) de la mencionada norma.
								    </p>
									<p align="justify">Que mediante Resolución Ministerial MDPyEP Despacho No 117/2012, de 17 de julio de 2012, se autoriza la transferencia de la Unidad del Registro de Comercio dependiente de la Dirección General de Servicios y Control Industrial, dependiente del Viceministerio de Producción Industrial a Mediana y Gran Escala del Ministerio de Desarrollo Productivo y Economía Plural, con el objetivo de conocer y resolver los trámites del Registro de Comercio remitidos por el Concesionario (FUNDEMPRESA). 
								    </p>
									<p align="justify">Que la Resolución Ministerial MDPyEP/DESPACHO No 059/2010 de fecha 1 de abril de 2010, aprueba el Procedimiento de Resolución de Trámites para el Registro de Comercio.
								    </p>
									<p align="justify"><strong>CONSIDERANDO:</strong></p>
									<p align="justify"> Que mediante solicitud de fecha '.$_POST['fecha'].',  presentado '.$_POST['senor'].' '.$_POST['representante'].',  Representante Legal de la '.$_POST['tipo'].' '.$_POST['empresa'].' con Matrícula de Comercio No. '.$_POST['matricula'].'  solicita al Ministerio de Desarrollo Productivo y Economía Plural, la autorización del uso de hojas removibles o tarjetas mediante medios mecánicos o electrónicos en '.$_POST['medios'].'.</p>
									<p align="justify"> Que mediante Informe Técnico Jurídico '.$_POST['informe'].' de fecha '.$_POST['fecha2'].' emitido por '.$_POST['tipo2'].' '.$_POST['emitido'].' '.$_POST['cargo'].' de FUNDEMPRESA, se realiza una interpretación de las disposiciones legales aplicables, manifestando que la '.$_POST['tipo'].' &nbsp; '.$_POST['empresa'].', cumple con lo previsto en el Artículo 40 del Código de Comercio y con los requisitos y formalidades correspondientes establecidas para el trámite de referencia, y el Ministerio de Desarrollo Productivo y Economía Plural debe emitir un pronunciamiento, a través de una Resolución Administrativa, conforme a procedimiento.
								    </p>
<p align="justify"><strong>CONSIDERANDO:</strong></p>
									<p align="justify"> Que el avance de la tecnología en materia informática ha cambiado las técnicas de elaboración y registro de documentos mercantiles sujetos a registro, utilizando programas computarizados diseñados especialmente para el efecto, logrando simplificar dichos instrumentos jurídicos, además de darle mayor seguridad jurídica, desde el punto de vista de la materialización, a los documentos mercantiles.
								    </p>
									<p align="justify">Que el Código de Comercio prevé la utilización de estos avances tecnológicos a través del uso de conceptos indeterminados como son “cualquier medio mecánico o electrónico”, que habilita a la autoridad administrativa a realizar una interpretación favorable de este caso.
</p>
<p align="justify">Que ante la evidencia de la utilidad práctica de los medios informáticos que han revolucionado la forma de relacionamiento entre la Administración Pública y los Administrados, existen precedentes administrativos que determinan favorablemente que la Unidad del Registro de Comercio de curso a la mencionada solicitud. </p>
									<p align="justify"><strong>POR TANTO:</strong>
</p>
									<p align="justify">El Jefe de la Unidad de Registro de Comercio, dependiente del Viceministerio de Producción Industrial a Mediana y Gran Escala del Ministerio de Desarrollo Productivo y Economía Plural, de conformidad a lo establecido en el Artículo 43 del Decreto Supremo Nº 071, de 9 de abril del 2009, concordante con las Resoluciones Ministeriales MDPyEP/DESPACHO Nº 117/2012 y MDPyEP/DESPACHO/059/2010, en ejercicio de las atribuciones y facultades mencionadas. </p>
									<p align="justify"><strong>RESUELVE:</strong>
</p>
									<p align="justify"><strong>AUTORIZAR a FUNDEMPRESA</strong>, Concesionaria del Registro de Comercio, proceda a dar curso a la solicitud efectuada por la '.$_POST['tipo'].' &nbsp; '.$_POST['empresa'].', con Matricula de Comercio No. '.$_POST['matricula'].', del uso de hojas removibles o tarjetas mediante medios mecánicos o electrónicos en '.$_POST['medios'].'
								    </p>
									<p align="justify">La presente Resolución Administrativa deberá ser incorporada a la Carpeta Comercial perteneciente a la empresa, que forma parte del archivo físico del Concesionario del Registro de Comercio (FUNDEMPRESA).</p>
									<p align="justify">Regístrese, comuníquese, cúmplase y archívese. </p>
</body>';								
				}
				////
				
                if (isset($_POST['fucov'])) {
                    $contenido = '<p style="text-align: justify;"><p>De mi consideración:</p> 
                                <p style="text-align: justify;">A través del presente memorándum, se autoriza a su persona realizar el viaje a la ciudad de ' . $_POST['destino'] . ' desde el ' . $_POST['fecha_inicio'] . ' hasta el ' . $_POST['fecha_fin'] . ' con el objetivo de ' . $_POST['detalle_comision'] . '.</p>';
                               
                    $pvpasaje = ORM::factory('pvpasajes');
                    $contenido .= $pvpasaje->contedido_focov($_POST['observacion']);    
                }

                if (isset($_POST['viaje_semana'])) {
                    $contenido = $_POST['descripcion3'];
                }
                
                $proceso = $_POST['proceso'];
                $destinatario = $_POST['destinatario'];
                $cargo_des = $_POST['cargo_des'];
                $institucion_des = $_POST['institucion_des'];
                $remitente = $_POST['remitente'];
                $cargo_rem = $_POST['cargo_rem'];
                $mosca = $_POST['mosca'];
				
				$referencia = strtoupper($_POST['referencia']);
				
                $adjuntos = $_POST['adjuntos'];
                $copias = $_POST['copias'];
                $via = $_POST['via'];
                $cargovia = $_POST['cargovia'];
                $titulo = $_POST['titulo'];
                if (isset($_POST['nota']))
                    $nota = 1;
                else
                    $nota = 0;
                if($tipo->id =='4' && $nota == 1){
                        $tipo_doc = array('4','14','15');/// Nota, POA y PRE
                }else{
                        $tipo_doc = array($tipo->id);
                }
                $oOficina = New Model_Oficinas();
                foreach ($tipo_doc as $value) {
                    $id_tipo = $value;
                    $correlativo = $oOficina->correlativo($this->user->id_oficina, $id_tipo);
                    $abre = $oOficina->tipo($id_tipo);
                    $sigla = $oOficina->sigla($this->user->id_oficina);
                    if ($abre != '')
                        $abre = $abre . '/';
                    $codigo = $abre . $sigla . ' Nº ' . $correlativo . '/' . date('Y');
                //ahora creamos el documento
                $documento = ORM::factory('documentos'); //instanciamos el modelo documentos
                $documento->id_user = $this->user->id;
                $documento->id_tipo = $id_tipo;
                $documento->id_proceso = $proceso;
                $documento->id_oficina = $this->user->id_oficina;
                $documento->codigo = $codigo;
                $documento->cite_original = $codigo;
                $documento->nombre_destinatario = $destinatario; //
                $documento->cargo_destinatario = $cargo_des;
                $documento->institucion_destinatario = $institucion_des;
                $documento->nombre_remitente = $remitente;
                $documento->cargo_remitente = $cargo_rem;
                $documento->mosca_remitente = $mosca;
                $documento->referencia = $referencia;
                if ($id_tipo == '14') {
                    $documento->referencia = 'CERT. POA ';
                }
                if ( $nota == 1 && $id_tipo=='15' && isset($nur)) {
                    $documento->referencia = 'CERT. PRESUPUESTARIA '.$nur;
                }
				
                $documento->contenido = $contenido;
                $documento->fecha_creacion = date('Y-m-d H:i:s');
                $documento->adjuntos = $adjuntos;
                $documento->copias = $copias;
                $documento->nombre_via = $via;
                $documento->cargo_via = $cargovia;
                $documento->titulo = $titulo;
                $documento->id_entidad = $this->user->id_entidad;
                //modificado por rodrigo
                if (!isset($id_memo) && !isset($_POST['asignar_nur'])) {///si es la primera vez p
                        $documento->estado = 0;
                        $documento->original = 1;
                }else{
                    $documento->estado = 1;
                    $documento->original = 0;
                }

                if (isset($_POST['fucov'])){
                    $documento->fucov = 1;
                }elseif ($nota == 1 && !isset($nur)){
                    $documento->fucov = 2;
                }else{
                    $documento->fucov = 0;
                }
                $documento->save();
                if(!isset($id_memo))
                    $id_memo = $documento->id;
                //si se creo el documento entonces
                if ($documento->id) {
                    //Modificado por Freddy Velasco
                    if (isset($_POST['fucov'])) {
                        $fi = date('Y-m-d', strtotime(substr($_POST['fecha_inicio'], -10))) . ' ' . date('H:i:s', strtotime($_POST['hora_inicio']));
                        $ff = date('Y-m-d', strtotime(substr($_POST['fecha_fin'], -10))) . ' ' . date('H:i:s', strtotime($_POST['hora_fin']));
                        $pvcomision = ORM::factory('pvcomisiones');
                        $pvcomision->id_documento = $documento->id;
                        //$pvcomision->detalle_comision = strtolower($_POST['detalle_comision']);
                        $pvcomision->detalle_comision = $_POST['detalle_comision'];
                        $pvcomision->origen = $_POST['origen'];
                        $pvcomision->destino = $_POST['destino'];
                        $pvcomision->fecha_inicio = $fi;
                        $pvcomision->fecha_fin = $ff;
                        $pvcomision->observacion = $_POST['observacion'];
                        $pvcomision->estado = 1;  
                        $pvcomision->save();
                    }

                    if($id_tipo==14) {
                        //Modificado por freddy
                                $poa = ORM::factory('poas');
                                $poa->id_documento = $documento->id;
                                $poa->fecha_creacion = date('Y-m-d H:i:s');
                                $poa->fecha_modificacion = date('Y-m-d H:i:s');
                        $poa->id_memo = 0;
                        $poa->id_obj_est = $_POST['obj_est'];
                        $poa->id_obj_gestion = $_POST['obj_gestion'];
                        $poa->id_obj_esp = $_POST['obj_esp'];
                        $poa->id_actividad = $_POST['actividad'];
                        
                        //$poa->obj_est = $_POST['det_obj_est'];
                        $poa->obj_est = $_POST['det_obj_est'];
                        $poa->obj_gestion = $_POST['det_obj_gestion'];
                        $poa->obj_esp = $_POST['det_obj_esp'];
                        $poa->actividad = $_POST['det_act'];
                        
                        $poa->fecha_modificacion = date('Y-m-d H:i:s');
                        $poa->tipo_actividad = $_POST['tipo_actividad'];
                        $poa->id_tipocontratacion = $_POST['id_tipocontratacion'];
                        $poa->partida = $_POST['partida'];
                        $poa->otro_tipocontratacion = $_POST['otro_tipocontratacion'];
                        $poa->partida2 = $_POST['partida2'];
                        $poa->otro_tipocontratacion2 = $_POST['otro_tipocontratacion2'];
                        $poa->ri_financiador = $_POST['ri_financiador'];
                        $poa->ri_porcentaje = $_POST['ri_porcentaje'];
                        $poa->re_financiador = $_POST['re_financiador'];
                        $poa->re_porcentaje = $_POST['re_porcentaje'];
                        $poa->proceso_con = $_POST['referencia'];
                        $poa->cantidad = $_POST['cantidad'];
                        $poa->monto_total = $_POST['monto_total'];
                        $poa->plazo_ejecucion = $_POST['plazo_ejecucion'];
                        //$poa->cod_pol_sec = $_POST['cod_pol_sec'];
                        //$poa->cod_est_sec = $_POST['cod_est_sec'];
                        //$poa->cod_prog_sec = $_POST['cod_prog_sec'];
                        //$poa->des_pol_sec = $_POST['des_pol_sec'];
                        //$poa->des_est_sec = $_POST['des_est_sec'];
                        //$poa->des_prog_sec = $_POST['des_prog_sec'];
                                $poa->save();

                        }
                        if($nota == 1 && $id_tipo==15){///modificado por Rodrigo
                            $pre = ORM::factory('presupuestos');
                            $pre->id_documento = $documento->id;
                            $pre->fecha_creacion = date('Y-m-d H:i:s');
                            $pre->fecha_modificacion = date('Y-m-d H:i:s');
                            if($this->user->genero == 'hombre')
                                $title = "del Sr. ".$this->user->nombre.", ".$this->user->cargo;
                            else
                                $title = "de la Sra. ".$this->user->nombre.", ".$this->user->cargo;
                            $pre->antecedente = "Mediante Hoja de Seguimiento $nur, se remite la $documento->referencia $title, solicitando...";
                            $pre->id_memo = $id_memo;
                            $pre->save();
                        }

                    ///////////end//////////////////
                    if(!isset($nur)){///primera vez 
                        if (isset($_POST['asignar_nur']) && $nota == 0 && !isset($_POST['fucov'])){///add HR existente si no es NI o MEMO de viaje 
                            $nur = $_POST['asignar_nur'];   
                            $nur_asignado = $_POST['asignar_nur'];   
                        }else{
                        //generamos la hoja de ruta a partir de la entidad
                        $entidad = ORM::factory('entidades', $this->user->id_entidad);
                        $oNur = New Model_nurs();
                        $nur=$oNur->correlativo(-2, $entidad->sigla.'/',$this->user->id_entidad);   

                        $nur_asignado = $oNur->asignarNur($nur, $this->user->id, $this->user->nombre);    
                        }
                    }
                    $documento->nur = $nur;
                    $documento->save();
                    //cazamos al documento con el nur asignado
                    $rs = $documento->has('nurs', $nur_asignado);
                    $documento->add('nurs', $nur_asignado);
                    $_POST = array();
                }
            }
            //$this->request->redirect('documento/editar/' . $documento->id);
            $this->request->redirect('documento/editar/' . $id_memo);
            }
        }
        $oVias = new Model_data();
        $destinatarios = $oVias->vias($this->user->id);
        //$destinatarios=$oVias->destinatarios($this->user->id);
        $superior = $oVias->superior($this->user->id);
        $dependientes = $oVias->dependientes($this->user->id);
        $procesos = ORM::factory('procesos')->find_all();
        $options = array();
        foreach ($procesos as $p) {
            $options[$p->id] = $p->proceso;
        }
        //$this->template->scripts = array('ckeditor/adapters/jquery.js', 'ckeditor/ckeditor.js');
        //$this->template->scripts = array('tinymce/tinymce.min.js');
        $this->template->styles = array('media/css/jquery-ui-1.8.16.custom.css' => 'screen','media/css/tablas.css' => 'screen', 'media/css/fcbk.css' => 'screen', 'media/css/modal.css' => 'screen');
        $this->template->scripts = array('tinymce/tinymce.min.js', 'media/js/jquery-ui-1.8.16.custom.min.js', 'media/js/jquery.timeentry.js','media/js/jquery.fcbkcomplete.min.js'); ///
        $this->template->title .= ' | Crear ' . $tipo->tipo;
        if ($t == 'circular') {
            $oficina = ORM::factory('oficinas')->where('id', '=', $this->user->id_oficina)->find();
            $entidad = ORM::factory('entidades')->where('id', '=', $oficina->id_entidad)->find();
            $oficinas = ORM::factory('oficinas')->where('id_entidad', '=', $entidad->id)->find_all();
            $this->template->content = View::factory('documentos/crear_circular')
                    ->bind('options', $options)
                    ->bind('user', $this->user)
                    ->bind('documento', $tipo)
                    ->bind('superior', $superior)
                    ->bind('dependientes', $dependientes)
                    ->bind('oficinas', $oficinas)
                    ->bind('tipo', $tipo)
                    ->bind('destinatarios', $destinatarios);
        } elseif ($t == 'poa') {
                // Modificado Freddy
                $tipoc = ORM::factory('poatipocontrataciones')->where('estado','=','1')->find_all();
                $tipocontratacion[''] = '(Seleccionar)';
                foreach ($tipoc as $tc){$tipocontratacion[$tc->id] = $tc->nombre;}
                /////////////////////


                    $this->template->content = View::factory('documentos/crear_poa')
                    ->bind('options', $options)
                    ->bind('user', $this->user)
                    ->bind('documento', $tipo)
                    ->bind('superior', $superior)
                    ->bind('dependientes', $dependientes)
                    ->bind('tipo', $tipo)
                    ->bind('destinatarios', $destinatarios)
                    ->bind('obj_gestion', $objgestion)//ista de objetivos de gestion para la oficina
                    ->bind('obj_esp', $objespecifico)
                    ->bind('actividad', $actividad)
                    ->bind('tipocontratacion', $tipocontratacion);
        } elseif ($t == 'pre'){
            
            $uEjeppt = New Model_oficinas();
            $uejecutorapre = $uEjeppt->uejecutorappt($this->user->id_oficina);
            $oFuente = New Model_Pvprogramaticas(); ///fuentes de financiamiento
            $fte = $oFuente->listafuentesuser($uejecutorapre->id);
            $fuente[''] = 'Seleccione Una Fuente de Financiamiento';
            foreach ($fte as $f){$fuente[$f->id] = $f->actividad;}
            
            $this->template->content = View::factory('documentos/crear_pre')
                    ->bind('options', $options)
                    ->bind('user', $this->user)
                    ->bind('documento', $tipo)
                    ->bind('superior', $superior)
                    ->bind('dependientes', $dependientes)
                    ->bind('tipo', $tipo)
                    ->bind('destinatarios', $destinatarios)
                    ->bind('uejecutorapre', $uejecutorapre)
                    ->bind('fuente', $fuente)
                    ;
        }
        else {

            $this->template->content = View::factory('documentos/create')
                    ->bind('options', $options)
                    ->bind('user', $this->user)
                    ->bind('documento', $tipo)
                    ->bind('superior', $superior)
                    ->bind('dependientes', $dependientes)
                    ->bind('tipo', $tipo)
                    ->bind('destinatarios', $destinatarios);
        }
    }

    public function action_vista() {
        $codigo = $_GET['doc'];
        $mensajes = array();
        $errors = array();
        $documento = ORM::factory('documentos')
                ->where('codigo', '=', $codigo)
                //->and_where('id_user','=',$this->user->id)
                ->find();
        if ($documento->loaded()) {
            $tipo = $documento->tipos->action;
            //archivo
            // $archivo=ORM::factory('archivos')
            //         ->where('id_documento','=',$id)
            //        ->find();
            //tipo
            //$tipo=  ORM::factory('tipos',$documento->id_tipo);                    
            $this->template->title .= ' | ' . $documento->codigo;
            $this->template->content = View::factory('documentos/vista_2')
                    ->bind('d', $documento)
                    ->bind('tipo', $tipo)
                    //->bind('archivo', $archivo)
                    ->bind('errors', $errors)
                    ->bind('mensajes', $mensajes);
        } else {
            $this->template->content = 'El documento no existe';
        }
    }

    public function action_detalle($id = 0) {
        $mensajes = array();
        $errors = array();
        //Subir documento para adjuntar
        if ($_POST) {
            $id_documento = Arr::get($_POST, 'id_doc', '');
            $post = Validation::factory($_FILES)
                    ->rule('archivo', 'Upload::not_empty')
                    ->rule('archivo', 'Upload::type', array(':value', array('docx', 'doc', 'pdf')))
                    ->rule('archivo', 'Upload::size', array(':value', '5M'));
            //si pasa la validacion guardamamos 
            if ($post->check()) {
                $filename = upload::save($_FILES ['archivo']);
                $archivo = ORM::factory('archivos')->where('id_documento', '=', $id_documento)->find(); //intanciamos el modelo proveedor                           
                $archivo->nombre_archivo = basename($filename);
                $archivo->extension = $_FILES ['archivo'] ['type'];
                $archivo->tamanio = $_FILES ['archivo'] ['size'];
                $archivo->id_user = $this->user->id;
                $archivo->id_documento = $id_documento;
                $archivo->fecha = time();
                $archivo->save();
                $mensajes['Archivo'] = 'Su archivo de  guardado satisfactoriamente';
            } else {
                $errors['Subir Archivo'] = 'El archivo debe de ser en formato word y de tamaño menor a 5M';
            }
        }
        $documento = ORM::factory('documentos')->where('id', '=', $id)->find();
        
        $documento_aux = ORM::factory('documentos')->where('nur','=',$documento->nur)->and_where('fucov','=','1')->find();
            if($documento_aux->loaded()){
                $documento = $documento_aux;
            }
        
        if ($documento->loaded()) {
            $ok = true;
            $estado = 0;
            if ($documento->estado == 1) { //si esta derivado entonces el documento solo pueden ver aquellos quienes intevienen en el seguimiento
                $ok = false;
                $seguimiento = ORM::factory('seguimiento')
                        ->where('nur', '=', $documento->nur)
                        ->find_all();
                foreach ($seguimiento as $s) {
                    //if (($s->derivado_a == $this->user->id) || ($s->derivado_por == $this->user->id) || $this->user->prioridad == 1)
                    if (($s->derivado_a == $this->user->id) || ($s->derivado_por == $this->user->id) )    
                        $ok = true;
                    ///rodrigo, estado=recibido => mostrar el detallepv 210813
                    if ($s->derivado_a == $this->user->id)
                        $estado = $s->estado;
                    ///210813
                }
            }
            if ($ok) {
                $tipo = $documento->tipos->action;
                //archivo
                $archivo = ORM::factory('archivos')->where('id_documento', '=', $id)->find_all();
                // Modificado por freddy
                $pvcomision = array();
                if ($documento->fucov == 1) {
                    $pvcomision = ORM::factory('pvcomisiones')->where('id_documento','=',$id)->find();
                }
                /////////////////

                // Modifica Freddy Velasco
                $contenido_doc = $this->contenido_documento($documento->id,$documento->id_tipo,$documento->id_oficina,$estado,$this->user->nivel);
                ////////end//////////////


                ///rodrigo detallepasajes, 210813
                //$detallepv = $this->pvmodificar($id, $estado);
                $this->template->scripts = array('tinymce/tinymce.min.js', 'media/js/jquery-ui-1.8.16.custom.min.js', 'media/js/jquery.timeentry.js');
                $this->template->styles = array('media/css/jquery-ui-1.8.16.custom.css' => 'screen', 'media/css/tablas.css' => 'screen');
                ///210813
                $this->template->title .= ' | ' . $documento->codigo;
                $this->template->content = View::factory('documentos/detalle')
                        ->bind('d', $documento)
                        ->bind('tipo', $tipo)
                        ->bind('archivo', $archivo)
                        ->bind('errors', $errors)
                        ->bind('mensajes', $mensajes)
                        ->bind('pvcomision', $pvcomision)
                        ->bind('detallepv', $contenido_doc)
                        ->bind('poa', $poa);
            } else {
                $this->template->content = View::factory('no_access');
            }
        } else {
            $this->template->content = 'El documento no existe';
        }
    }

    public function generar_codigo($tip, $abre, $id) {
        //obtenemos la sigla de la oficina
        $oficina = ORM::factory('oficinas', $id);
        if ($oficina) {
            $correlativo = ORM::factory('correlativo')->where('id_oficina', '=', $id)
                    ->and_where('id_tipo', '=', $tip)
                    ->find();
            if ($correlativo->loaded()) {
                $correlativo->correlativo = $correlativo->correlativo + 1; //incrementamos en 1 el correlativo
                $correlativo->save();
                $corr = substr('000' . $correlativo->correlativo, -4);
                if ($abre != '')
                    $abre.='/';
                return $abre . $oficina->sigla . '/' . date('Y') . '-' . $corr;
                //return $codigo;
            }
        }
    }

// lista de documentos segun el tipo    
    public function action_tipo($t = '') {
        $tipo = ORM::factory('tipos', array('id' => $t));
        $count = $tipo->documentos->where('id_user', '=', $this->user->id)->and_where('id_tipo', '=', $tipo->id)->count_all();
        // Creamos una instancia de paginacion + configuracion
        $pagination = Pagination::factory(array(
                    'total_items' => $count,
                    'current_page' => array('source' => 'query_string', 'key' => 'page'),
                    'items_per_page' => 15,
                    'view' => 'pagination/floating',
                ));
        $results = $tipo->documentos
                ->where('id_user', '=', $this->user->id)
                ->and_where('id_tipo', '=', $tipo->id)
                ->order_by('fecha_creacion', 'DESC')
                ->limit($pagination->items_per_page)
                ->offset($pagination->offset)
                ->find_all();
        // Render the pagination links
        $page_links = $pagination->render();
        //tipos para los tabs       
        $this->template->title .= ' | ' . $tipo->plural;
        $this->template->styles = array('media/css/tablas.css' => 'screen');
        $this->template->scripts = array('media/js/jquery.tablesorter.min.js');
        $this->template->content = View::factory('documentos/listar')
                ->bind('results', $results)
                ->bind('page_links', $page_links)
                ->bind('tipo', $tipo);
    }

    /*
     * function para editar un documento
     * 
     */

    public function action_editar($id = '') {
        $mensajes = array();
        $documento = ORM::factory('documentos')->where('id', '=', $id)->and_where('id_user', '=', $this->user->id)->find();
        $id_doc = $documento->id;
        $entidad = ORM::factory('entidades')->where('id','=',$this->user->id_entidad)->find();
        if ($documento->loaded()) {
            //si se envia los datos modificados entonces guardamamos
            if (isset($_POST['referencia'])) {
              //  $sw = 1;
             //   while( $sw == 1 && $id != 0){
              //      $sw = 0;
                    $documento = ORM::factory('documentos')->where('id', '=', $id)->and_where('id_user', '=', $this->user->id)->find();
                    if ($_POST['sw_contenido']==1) {
                        $contenido = $_POST['descripcion3'];
                    }else{
                        $contenido = $_POST['descripcion'];    
                    }
                    
///////////// EFRA - ADM
				if (isset($_POST['adm'])) {					
									
					$contenido ='<body marginheight="0" marginwidth="0" topmargin="0">
									<p align="justify">
<B>VISTOS:</B> </p>
									<p align="justify">Que el Decreto Supremo No 29894 de fecha 7 de febrero de 2009, en el tercer parágrafo de su artículo 137 establece la extinción de la Superintendencia de Empresas. Sus competencias serán asumidas por el Ministerio de Desarrollo Productivo y Economía Plural. 
</p>
									<p align="justify">Que en mérito al Decreto Supremo No 0071, promulgado en fecha 09 de abril del 2009, es atribución de la Ministra de Desarrollo Productivo y Economía Plural, administrar el Registro de Comercio, según lo establecido por el Artículo 43, inciso i) de la mencionada norma.
								    </p>
									<p align="justify">Que mediante Resolución Ministerial MDPyEP Despacho No. 117/2012, de 17 de julio de 2012, se autoriza la transferencia de la Unidad del Registro de Comercio dependiente de la Dirección General de Servicios y Control Industrial, dependiente del Viceministerio de Producción Industrial a Mediana y Gran Escala del Ministerio de Desarrollo Productivo y Economía Plural, con el objetivo de conocer y resolver los trámites del Registro de Comercio remitidos por el Concesionario (FUNDEMPRESA). 
								    </p>
									<p align="justify">Que la Resolución Ministerial MDPyEP/DESPACHO No 059/2010 de fecha 1 de abril de 2010, aprueba el Procedimiento de Resolución de Trámites para el Registro de Comercio.
								    </p>
									<p align="justify"><strong>CONSIDERANDO:</strong></p>
									<p align="justify"> Que mediante solicitud de fecha '.$_POST['fecha'].',  presentado por '.$_POST['senor'].' '.$_POST['representante'].',  Representante Legal de la '.$_POST['tipo'].' '.$_POST['empresa'].' con Matrícula de Comercio No. '.$_POST['matricula'].'  solicita al Ministerio de Desarrollo Productivo y Economía Plural, la autorización del uso de hojas removibles o tarjetas mediante medios mecánicos o electrónicos en '.$_POST['medios'].'.</p>
									<p align="justify"> Que mediante Informe Técnico Jurídico '.$_POST['informe'].' de fecha '.$_POST['fecha2'].' emitido por '.$_POST['tipo2'].' '.$_POST['emitido'].' '.$_POST['cargo'].' de FUNDEMPRESA, se realiza una interpretación de las disposiciones legales aplicables, manifestando que la '.$_POST['tipo'].' &nbsp; '.$_POST['empresa'].', cumple con lo previsto en el Artículo 40 del Código de Comercio y con los requisitos y formalidades correspondientes establecidas para el trámite de referencia, y el Ministerio de Desarrollo Productivo y Economía Plural debe emitir un pronunciamiento, a través de una Resolución Administrativa, conforme a procedimiento.
								    </p>
<p align="justify"><strong>CONSIDERANDO:</strong></p>
									<p align="justify"> Que el avance de la tecnología en materia informática ha cambiado las técnicas de elaboración y registro de documentos mercantiles sujetos a registro, utilizando programas computarizados diseñados especialmente para el efecto, logrando simplificar dichos instrumentos jurídicos, además de darle mayor seguridad jurídica, desde el punto de vista de la materialización, a los documentos mercantiles.
								    </p>
									<p align="justify">Que el Código de Comercio prevé la utilización de estos avances tecnológicos a través del uso de conceptos indeterminados como son “cualquier medio mecánico o electrónico”, que habilita a la autoridad administrativa a realizar una interpretación favorable de este caso.
</p>
<p align="justify">Que ante la evidencia de la utilidad práctica de los medios informáticos que han revolucionado la forma de relacionamiento entre la Administración Pública y los Administrados, existen precedentes administrativos que determinan favorablemente que la Unidad del Registro de Comercio de curso a la mencionada solicitud. </p>
									<p align="justify"><strong>POR TANTO:</strong>
</p>
									<p align="justify">El Jefe de la Unidad de Registro de Comercio, dependiente del Viceministerio de Producción Industrial a Mediana y Gran Escala del Ministerio de Desarrollo Productivo y Economía Plural, de conformidad a lo establecido en el Artículo 43 del Decreto Supremo Nº 071, de 9 de abril del 2009, concordante con las Resoluciones Ministeriales MDPyEP/DESPACHO Nº 117/2012 y MDPyEP/DESPACHO/059/2010, en ejercicio de las atribuciones y facultades mencionadas. </p>
									<p align="justify"><strong>RESUELVE:</strong>
</p>
									<p align="justify"><strong>AUTORIZAR a FUNDEMPRESA</strong>, Concesionaria del Registro de Comercio, proceda a dar curso a la solicitud efectuada por la '.$_POST['tipo'].' &nbsp; '.$_POST['empresa'].', con Matricula de Comercio No. '.$_POST['matricula'].', del uso de hojas removibles o tarjetas mediante medios mecánicos o electrónicos en '.$_POST['medios'].'
								    </p>
									<p align="justify">La presente Resolución Administrativa deberá ser incorporada a la Carpeta Comercial perteneciente a la empresa, que forma parte del archivo físico del Concesionario del Registro de Comercio (FUNDEMPRESA).</p>
									<p align="justify">Regístrese, comuníquese, cúmplase y archívese. </p>
</body>';								
				}


////// FIN - EFRA - ADM
					
					
                    if ($documento->fucov == 1 || isset($_POST['fucov']) ) {
                        $contenido = '<p style="text-align: left;"><p>De mi consideración:</p> 
                                <p style="text-align:justify">A través del presente memorándum, se autoriza a su persona realizar el viaje a la ciudad de ' . $_POST['destino'] . ' desde el ' . $_POST['fecha_inicio'] . ' hasta el ' . $_POST['fecha_fin'] . ' con el objetivo de ' . $_POST['detalle_comision'] . '.</p>';
                        $pvpasaje = ORM::factory('pvpasajes');
                        $contenido .= $pvpasaje->contedido_focov($_POST['observacion']);    
                    }
                    $documento->nombre_destinatario = $_POST['destinatario'];
                    $documento->cargo_destinatario = $_POST['cargo_des'];
                    $documento->institucion_destinatario = $_POST['institucion_des'];
                    $documento->nombre_remitente = $_POST['remitente'];
                    $documento->cargo_remitente = $_POST['cargo_rem'];
                    $documento->mosca_remitente = $_POST['mosca'];
                    $documento->referencia = strtoupper($_POST['referencia']);
                    $documento->contenido = $contenido;
                    $documento->adjuntos = $_POST['adjuntos'];
                    $documento->copias = $_POST['copias'];
                    $documento->nombre_via = $_POST['via'];
                    $documento->cargo_via = $_POST['cargovia'];
                    $documento->titulo = $_POST['titulo'];
                    $documento->id_proceso = $_POST['proceso'];

                    if (isset($_POST['fucov'])){
                    $documento->fucov = 1;
                    }else{
                    $documento->fucov = 0;
                    }
                    $documento->save();

                    //Modificado por Freddy Velasco
                    //if (isset($_POST['fucov'])) {// cuando se crea un memoramdum de viaje
                    if ($documento->id_tipo == 2 && $documento->fucov == 1) {///Memo de viaje
                        $fi = date('Y-m-d', strtotime(substr($_POST['fecha_inicio'],-10))) . ' ' . date('H:i:s', strtotime($_POST['hora_inicio']));
                        $ff = date('Y-m-d', strtotime(substr($_POST['fecha_fin'],-10))) . ' ' . date('H:i:s', strtotime($_POST['hora_fin']));
                        $pvcomision = ORM::factory('pvcomisiones')->where('id_documento', '=', $id)->find();
                        $pvcomision->id_documento = $documento->id;
                        $pvcomision->detalle_comision = $_POST['detalle_comision'];
                        $pvcomision->origen = $_POST['origen'];
                        $pvcomision->destino = $_POST['destino'];
                        $pvcomision->fecha_inicio = $fi;
                        $pvcomision->fecha_fin = $ff;
                        $pvcomision->observacion = $_POST['observacion'];
                        $pvcomision->estado = 1;
                        $pvcomision->save();
                    }elseif ($documento->id_tipo == 13) {///FOCOV
                        

                        $fi = date('Y-m-d', strtotime(substr($_POST['fecha_salida'], 4, 10))) . ' ' . date('H:i:s', strtotime($_POST['hora_salida']));
                        $ff = date('Y-m-d', strtotime(substr($_POST['fecha_arribo'], 4, 10))) . ' ' . date('H:i:s', strtotime($_POST['hora_arribo']));
                        $pvfucovgeneral = ORM::factory('pvfucovgenerales')->where('id_documento', '=', $id)->find();
                        if (!$pvfucovgeneral->loaded()) {
                            $pvfucovgeneral = ORM::factory('pvfucovgenerales');
                        }
                        $pvfucovgeneral->id_documento = $id;
                        $pvfucovgeneral->origen = $_POST['origen'];
                        $pvfucovgeneral->destino = $_POST['destino'];
                        $pvfucovgeneral->fecha_salida = $fi;
                        $pvfucovgeneral->fecha_arribo = $ff;
                        $pvfucovgeneral->impuesto = $_POST['impuesto'];
                        $pvfucovgeneral->representacion = $_POST['representacion'];
                        $pvfucovgeneral->dua = 0;
                        $pvfucovgeneral->nro_dia = $_POST['nro_dia'];
                        $pvfucovgeneral->id_categoria = $_POST['id_categoria'];
                        $pvfucovgeneral->justificacion_finsem = $_POST['justificacion_finsem'];
                        $pvfucovgeneral->id_oficina = $_POST['id_unidad'];
                        $pvfucovgeneral->save();
                        
                        $pvfucov = ORM::factory('pvfucovs')->where('id_documento','=',$id)->find_all();
                        foreach($pvfucov as $l){
                        $l->delete();
                        }
                            
                        if(isset($_POST['id_tipoviaje1']))
                        $n = count($_POST['id_tipoviaje1']);
                        else $n=0;
                        
                        for ($i=0; $i < $n; $i++) {
                        
                        if($entidad->sigla==$_POST['cancelar1'][$i]){
                            $porcentaje = 100;
                        } elseif ($_POST['cancelar1'][$i]=='Hospedaje o alimentacion') {
                            $porcentaje = 70;
                        } elseif ($_POST['cancelar1'][$i]=='Hospedaje y alimentacion') {
                            $porcentaje = 25;
                        } else {
                            $porcentaje = 0;
                        }
//                        $pvcategoriatipo = ORM::factory('pvcategoriatipos')->where('id_categoria','=',$_POST['id_categoria'])->and_where('id_tipoviaje','=',$_POST['id_tipoviaje1'][$i])->find();
                        $pvcategoriatipo = new Model_Pvcategoriatipos();
                        $sql='SELECT monto,moneda FROM pvcategoriatipos WHERE id_categoria='.$_POST['id_categoria'].' AND id_tipoviaje='.$_POST['id_tipoviaje1'][$i].' AND estado=1';
                        $resp = $pvcategoriatipo->getmonto($sql);
                        foreach ($resp as $v) {
                            $monto=$v['monto'];
                            $moneda = $v['moneda'];
                        }

                        $cambio = ORM::factory('pvtipocambios')->find_all();
                        foreach($cambio as $c)
                        $tipo_cambio = $c->cambio_venta;

                        $monto_parcial = (($porcentaje * $monto)/100)*$_POST['nro_dia1'][$i];

                        $gasto_rep = 0;
                        if($_POST['representacion']=='Si'){
                            $gasto_rep = (25*$monto_parcial)/100;
                        }
                        $desc_iva_mp=0;
                        $desc_iva_gr=0;
                        if($_POST['impuesto']=='Si'){
                            $desc_iva_mp = (13*$monto_parcial)/100;
                            $desc_iva_gr = (13*$gasto_rep)/100;
                        }
                        $desc_iva = $desc_iva_mp+$desc_iva_gr;
                        $total_via = $monto_parcial-$desc_iva_mp;
                        
                        $gasto_rep = $gasto_rep-$desc_iva_gr;

                        $fi = date('Y-m-d', strtotime(substr($_POST['fecha_salida1'][$i], 4, 10))) . ' ' . date('H:i:s', strtotime($_POST['hora_salida1'][$i]));
                        $ff = date('Y-m-d', strtotime(substr($_POST['fecha_arribo1'][$i], 4, 10))) . ' ' . date('H:i:s', strtotime($_POST['hora_arribo1'][$i]));
                        /*Calculo de viaticos*/
                        
                        $pvfucov = ORM::factory('pvfucovs');
                        $pvfucov->id_documento = $id;
                        $pvfucov->origen = $_POST['origen1'][$i];
                        $pvfucov->destino = $_POST['destino1'][$i];
                        $pvfucov->fecha_salida = $fi;
                        $pvfucov->fecha_arribo = $ff;
                        $pvfucov->cancelar = $_POST['cancelar1'][$i];
                        $pvfucov->porcentaje_viatico = $porcentaje;
                        $pvfucov->financiador = $_POST['financiador1'][$i];
                        $pvfucov->transporte = $_POST['transporte1'][$i];
                        $pvfucov->representacion = $_POST['representacion'];
                        $pvfucov->gasto_representacion = $gasto_rep;
                        $pvfucov->impuesto = $_POST['impuesto'];
                        $pvfucov->gasto_imp = $desc_iva;
                        $pvfucov->justificacion_finsem = $_POST['justificacion_finsem'];
                        $pvfucov->total_viatico = $total_via;
                        $pvfucov->total_pasaje = $_POST['total_pasaje1'][$i];
                        $pvfucov->id_categoria = $_POST['id_categoria'];
                        $pvfucov->id_tipoviaje = $_POST['id_tipoviaje1'][$i];
                        $pvfucov->etapa_proceso = 1;
                        $pvfucov->tipo_cambio = $tipo_cambio;
                        $pvfucov->tipo_moneda = $moneda;
                        $pvfucov->viatico_dia = $monto;
                        $pvfucov->nro_dia = $_POST['nro_dia1'][$i];
                        $pvfucov->empresa = $_POST['empresa1'][$i];
                        $pvfucov->nro_boleto = $_POST['nro_boleto1'][$i];
                        $pvfucov->fecha_creacion = date("Y-m-d H:i:s");
                        $pvfucov->fecha_modificacion = date("Y-m-d H:i:s");
                        if(isset($_POST['ida_vuelta1'][$i]))
                            $iv=1;
                        else
                            $iv=0;
                        $pvfucov->ida_vuelta = $iv;
                        $pvfucov->save();
    
                        }
                        

                        
                        /*Ingreso de viaticos por tramos */
                        //$pvfucov=ORM::factory('pvfucovs',array('id_documento'=>$documento->id));
                        //$pvfucov->delete();

                        /*Fin tramos*/

                     //   $sw = 1;
                        // $poa = ORM::factory('poas')->where('id_memo','=',$pvfucov->id_memo)->find();///cambiar a documento POA
                        // if($poa->loaded()){
                        //     $id = $poa->id_documento;
                        // }
                        // else{
                        //     $id = 0;
                        //     $mensajes['Modificado!'] = 'No se encontro el POA.';
                        // }
                    }elseif ($documento->id_tipo == 14) {//MOdificado Freddy Velasco - Editar POA
                        $poa = ORM::factory('poas')->where('id_documento','=',$id)->find();
                        $poa->id_obj_est = $_POST['obj_est'];
                        $poa->id_obj_gestion = $_POST['obj_gestion'];
                        $poa->id_obj_esp = $_POST['obj_esp'];
                        $poa->id_actividad = $_POST['actividad'];
                        
                        $poa->obj_est = $_POST['det_obj_est'];
                        $poa->obj_gestion = $_POST['det_obj_gestion'];
                        $poa->obj_esp = $_POST['det_obj_esp'];
                        $poa->actividad = $_POST['det_act'];
                        
                        $poa->fecha_modificacion = date('Y-m-d H:i:s');
                        $poa->tipo_actividad = $_POST['tipo_actividad'];
                        $poa->id_tipocontratacion = $_POST['id_tipocontratacion'];
                        $poa->partida = $_POST['partida'];
                        $poa->otro_tipocontratacion = $_POST['otro_tipocontratacion'];
                        $poa->partida2 = $_POST['partida2'];
                        $poa->otro_tipocontratacion2 = $_POST['otro_tipocontratacion2'];
                        $poa->partida3 = $_POST['partida3'];
                        $poa->otro_tipocontratacion3 = $_POST['otro_tipocontratacion3'];
                        $poa->ri_financiador = $_POST['ri_financiador'];
                        $poa->ri_porcentaje = $_POST['ri_porcentaje'];
                        $poa->re_financiador = $_POST['re_financiador'];
                        $poa->re_porcentaje = $_POST['re_porcentaje'];
                        $poa->proceso_con = $_POST['referencia'];
                        $poa->cantidad = $_POST['cantidad'];
                        $poa->monto_total = $_POST['monto_total'];
                        $poa->plazo_ejecucion = $_POST['plazo_ejecucion'];
                        //$poa->cod_pol_sec = $_POST['cod_pol_sec'];
                        //$poa->cod_est_sec = $_POST['cod_est_sec'];
                        //$poa->cod_prog_sec = $_POST['cod_prog_sec'];
                        //$poa->des_pol_sec = $_POST['des_pol_sec'];
                        //$poa->des_est_sec = $_POST['des_est_sec'];
                        //$poa->des_prog_sec = $_POST['des_prog_sec'];
                        $poa->save();
                        $sw=1; ///cambiar a documento PRE
                        // $pre = ORM::factory('presupuestos')->where('id_memo','=',$poa->id_memo)->find();
                        // if( $pre->loaded()){
                        //     $id = $pre->id_documento;
                        // }
                        // else{
                        //     $id = 0;
                        //     $mensajes['Modificado!'] = 'No se encontro el Presupuesto.';
                        // }
                    }elseif($documento->id_tipo == 15){///PRE
                        $pre=ORM::factory('presupuestos')->where('id_documento','=',$id)->find();
                        if ($_POST['antecedente']) {
                        $pre->antecedente = $_POST['antecedente'];
                        $pre->fecha_modificacion = date('Y-m-d H:i:s');
                        $pre->save();

                        }

                        
                    }elseif($documento->id_tipo == 4 && $documento->fucov == 2){///NI
                        $sw = 1;
                        $poa = ORM::factory('poas')->where('id_memo','=',$documento->id)->find();///cambiar a documento POA
                        if($poa->loaded()){
                            $id = $poa->id_documento;
                        }
                        else{
                            $id = 0;
                            $mensajes['Modificado!'] = 'No se encontro el POA.';
                        }
                    }
               // }///END WHILE
                if( $id != 0)
                    $mensajes['Modificado!'] = 'El documento se modifico correctamente.';
                $documento = ORM::factory('documentos')->where('id', '=', $id_doc)->and_where('id_user', '=', $this->user->id)->find();///cargar el documento original 
            }
            if (isset($_POST['adjuntar'])) {

                $path = 'archivos/' . date('Y_m');
                if (!is_dir($path)) {
                    // Creates the directory 
                    if (!mkdir($path, 0777, TRUE)) {
                        // On failure, throws an error 
                        throw new Exception("No se puedo crear el directorio!");
                        exit;
                    }
                }
                $filename = upload::save($_FILES ['archivo'], NULL, $path);
                if ($_FILES ['archivo']['name'] != '') {
                    $archivo = ORM::factory('archivos'); //intanciamos el modelo proveedor                                          
                    $archivo->nombre_archivo = basename($filename);
                    $archivo->extension = $_FILES ['archivo'] ['type'];
                    $archivo->tamanio = $_FILES ['archivo'] ['size'];
                    $archivo->id_user = $this->user->id;
                    $archivo->id_documento = $_POST['id_doc'];
                    $archivo->sub_directorio = date('Y_m');
                    $archivo->fecha = date('Y-m-d H:i:s');
                    $archivo->save();
                    if ($archivo->id > 0)
                        $_POST = array();
                }
            }
            //$oficina = ORM::factory('oficinas', $this->user->id_oficina);

            $oVias = new Model_data();
            $vias = $oVias->vias($this->user->id);
            $superior = $oVias->superior($this->user->id);
            //$destinatarios=$oVias->destinatarios($this->user->id);
            $tipo = ORM::factory('tipos', $documento->id_tipo);
            $archivos = ORM::factory('archivos')->where('id_documento', '=', $id)->and_where('estado', '=', 1)->find_all();
            $procesos = ORM::factory('procesos')->find_all();
            $options = array();
            foreach ($procesos as $p) {
                $options[$p->id] = $p->proceso;
            }

            $this->template->title .= ' | ' . $documento->codigo;
            $this->template->scripts = array('tinymce/tinymce.min.js');
            $this->template->styles = array('media/css/jquery-ui-1.8.16.custom.css' => 'screen', 'media/css/tablas.css' => 'screen');
            $this->template->scripts = array('tinymce/tinymce.min.js', 'media/js/jquery-ui-1.8.16.custom.min.js', 'media/js/jquery.timeentry.js'); ///

            if ($tipo->tipo == 'Circular') {
                $oficina = ORM::factory('oficinas')->where('id', '=', $this->user->id_oficina)->find();
                $entidad = ORM::factory('entidades')->where('id', '=', $oficina->id_entidad)->find();
                $oficinas = ORM::factory('oficinas')->where('id_entidad', '=', $entidad->id)->find_all();
                
                //$oficinas_ext = $oVias->oficinas_ext($this->user->id,$this->user->id_entidad);
                
                $this->template->content = View::factory('documentos/edit_circular')
                        ->bind('documento', $documento)
                        ->bind('options', $options)
                        ->bind('mensajes', $mensajes)
                        ->bind('user', $this->user)
                        //->bind('documento', $tipo)
                        ->bind('superior', $superior)
                        ->bind('dependientes', $dependientes)
                        ->bind('oficinas', $oficinas)
                        ->bind('tipo', $tipo)
                        ->bind('archivos', $archivos)
                        // ->bind('oficina_ext', $oficinas_ext)
                        ->bind('destinatarios', $destinatarios);
                
            } else if ($tipo->tipo == 'FOCOV') {
                $pvfucov = ORM::factory('pvfucovs')->where('id_documento', '=', $documento->id)->find_all();
                $oficinas_row = ORM::factory('oficinas')->where('id_entidad','=',$this->user->id_entidad)->find_all();
                //$oficinas=ORM::factory('oficinas')->find_all();
                $ofi = array();
                $ofi[''] = "(Seleccionar)";
                foreach ($oficinas_row as $p) {
                    $ofi[$p->id] = $p->oficina;
                }

                
                $pvfucovgeneral = ORM::factory('pvfucovgenerales')->where('id_documento', '=', $documento->id)->find();
                $sw=0;
                if($pvfucovgeneral->loaded()){
                    $sw=1;
                }
                $pvtipoviaje = ORM::factory('pvtipoviajes')->where('estado', '=', '1')->find_all();
                $pvcategoria = ORM::factory('pvcategorias')->where('estado', '=', '1')->find_all();
                $opt_tv = array();
                $opt_tvhtml = '';

                $opt_tv[''] = "(Sel..)";
                $opt_tvhtml .= '<option value="">(Sel..)</option>';
                foreach ($pvtipoviaje as $tv) {
                    $opt_tvhtml .= '<option value="'.$tv->id.'">'.$tv->detalle.'</option>';
                    $opt_tv[$tv->id] = $tv->detalle;
                }

                $opt_cat = array();
                //$opt_cat[''] = "(Seleccionar)";
                foreach ($pvcategoria as $cat) {
                    $opt_cat[$cat->id] = $cat->categoria;
                }

                ///Modificado Freddy Velasco POA
                $cambio = ORM::factory('pvtipocambios')->find_all();
                foreach($cambio as $c)
                    $tipo_cambio = $c->cambio_venta;

                $pf = new Model_Pvfucovs();
                $sql="SELECT SUM(gasto_representacion) as gasto_representacion,SUM(gasto_imp) as gasto_imp,SUM(total_viatico) as total_viatico,SUM(total_pasaje ) as total_pasaje  FROM pvfucovs WHERE id_documento = ".$documento->id;
                $suma_fucov = $pf->sqlconsulta($sql);


                                
                $this->template->content = View::factory('documentos/edit_fucov')
                        ->bind('documento', $documento)
                        ->bind('archivos', $archivos)
                        ->bind('tipo', $tipo)
                        ->bind('superior', $superior)
                        ->bind('vias', $vias)
                        ->bind('user', $this->user)
                        ->bind('mensajes', $mensajes)
                        ->bind('archivos', $archivos)
                        ->bind('destinatarios', $destinatarios)
                        ->bind('opt_tv', $opt_tv)
                        ->bind('opt_tvhtml', $opt_tvhtml)
                        ->bind('opt_cat', $opt_cat)
                        ->bind('pvfucov', $pvfucov)
                        ->bind('pvfucovgeneral', $pvfucovgeneral)
                        ->bind('sw', $sw)
                        ->bind('tipo_cambio', $tipo_cambio)
                        ->bind('suma_fucov', $suma_fucov)
                        ->bind('oficinas', $ofi)
                        //->bind('entidad', $entidad)
                        // POA
                        // ->bind('uejecutorapoa', $uejecutorapoa)
                        // ->bind('poa', $poa)
                        // ->bind('obj_est', $objest)
                        // ->bind('obj_gestion', $objgestion)
                        // ->bind('obj_esp', $objespecifico)
                        // ->bind('actividad', $actividad)
                        // ->bind('det_obj_est', $detalleestrategico)
                        // ->bind('det_obj_gestion', $detallegestion)//detalle del objetivo de gestion
                        // ->bind('det_obj_esp', $detalleespecifico)
                        // ->bind('det_act', $detalleactividad)
                        // PRE
                        // ->bind('pre', $pre)
                        // ->bind('uejecutorapre',$uejecutorapre)
                        // ->bind('fuente', $fuente)///lista de fuentes de financiamiento
                        // ->bind('x_id_partida', $x_id_partida)
                        // ->bind('x_partida', $x_partida)
                        // ->bind('x_codigo', $x_codigo)
                        // ->bind('x_disponible', $x_disponible)
                        // ->bind('x_solicitado', $x_solicitado)
                        ;
            } // Modificado por Freddy Velasco POA
            else if ($tipo->action == 'poa') {
                
                $poa = ORM::factory('poas')->where('id_documento', '=', $documento->id)->find();
               
                $tipoc = ORM::factory('poatipocontrataciones')->where('estado','=','1')->find_all();
                $tipocontratacion[''] = '(Seleccionar)';
                foreach ($tipoc as $tc){$tipocontratacion[$tc->id] = $tc->nombre;}
                
                $this->template->content = View::factory('documentos/edit_poa')
                        ->bind('documento', $documento)
                        ->Bind('archivos', $archivos)
                        ->bind('tipo', $tipo)
                        ->bind('superior', $superior)
                        ->bind('vias', $vias)
                        ->bind('user', $this->user)
                        ->bind('options', $options)
                        ->bind('mensajes', $mensajes)
                        ->bind('archivos', $archivos)
                        ->bind('destinatarios', $destinatarios)
                        ->bind('poa', $poa)
                        ->bind('tipocontratacion', $tipocontratacion);  /// en poa//
            }else if ($tipo->action == 'pre') {
                $pre = ORM::factory('presupuestos')->where('id_documento','=',$documento->id)->find();
                $uEjeppt = New Model_oficinas();
                $uejecutorapre = $uEjeppt->uejecutorappt($this->user->id_oficina);
                $oFuente = New Model_Pvprogramaticas(); ///fuentes de financiamiento
                $fte = $oFuente->listafuentesuser($uejecutorapre->id);
                $fuente[''] = 'Seleccione Una Fuente de Financiamiento';
                foreach ($fte as $f){$fuente[$f->id] = $f->actividad;}
                $liq = ORM::factory('pvliquidaciones')->where('id_presupuesto','=',$pre->id)->and_where('estado','=',1)->find_all();
                foreach($liq as $l){
                    $x_id_partida[] = $l->id_partida;
                    $x_partida[] = $l->partida;
                    $x_codigo[] = $l->cod_partida;
                    $disp = ORM::factory('pvejecuciones')->where('id_programatica','=',$pre->id_programatica)->and_where('id_partida','=',$l->id_partida)->find();
                    $x_disponible[] = $disp->saldo_devengado;///saldo actual disponible
                    $x_solicitado[] = $l->importe_certificado;
                }
                $oPart = new Model_Pvprogramaticas();
                $part = $oPart->partidas($pre->id_programatica);
                $partidas['']='Seleccione una Partida';
                foreach($part as $p){
                    $partidas[$p->id] = $p->codigo.' - '.$p->partida;
                }
                 $this->template->content = View::factory('documentos/edit_pre')
                        ->bind('documento', $documento)
                        ->bind('archivos', $archivos)
                        ->bind('tipo', $tipo)
                        ->bind('superior', $superior)
                        ->bind('vias', $vias)
                        ->bind('user', $this->user)
                        ->bind('options', $options)
                        ->bind('mensajes', $mensajes)
                        ->bind('archivos', $archivos)
                        ->bind('destinatarios', $destinatarios)
                        //->bind('liq',$liq)
                         ->bind('pre', $pre)         ///presupuesto
                         ->bind('uejecutorapre',$uejecutorapre)
                         ->bind('fuente', $fuente)
                         ->bind('partidas',$partidas)
                         ->bind('x_id_partida', $x_id_partida)
                         ->bind('x_partida', $x_partida)
                         ->bind('x_codigo', $x_codigo)
                         ->bind('x_disponible', $x_disponible)
                         ->bind('x_solicitado', $x_solicitado)
                        ;
            }else if($tipo->action == 'nota' && $documento->fucov == '2'){///Nota con certificacion POA y PRE
                
                ///Modificado Freddy Velasco POA
                $cambio = ORM::factory('pvtipocambios')->find_all();
                foreach($cambio as $c)
                    $tipo_cambio = $c->cambio_venta;
                ///
                $poa = ORM::factory('poas')->where('id_memo', '=', $documento->id)->find();

                $uEjepoa = New Model_oficinas();
                $uejecutorapoa = $uEjepoa->uejecutorapoa($this->user->id_oficina);
                $oestrategico = ORM::factory('pvoestrategicos')->where('estado','=',1)->find_all();
                $objest[''] = '(Seleccione)';
                foreach ($oestrategico as $oes){$objest[$oes->id] = $oes->codigo;}

                                
                $objgestion[''] = '(Seleccione)';
                $objespecifico[''] = '(Seleccione)';
                $actividad[''] = '(Seleccione)';
                if($poa->id_obj_est){
                    $det = ORM::factory('pvoestrategicos')->where('id', '=', $poa->id_obj_est)->find(); ///Detalle Objetivo Estrategico
                    $detalleestrategico = $det->objetivo;

                    $oges = ORM::factory('pvogestiones')->where('id_obj_est', '=', $poa->id_obj_est)->and_where('estado','=',1)->and_where('id_oficina','=',$uejecutorapoa->id)->find_all(); ///objetivo especifico
                    foreach ($oges as $oe) {
                        $objgestion[$oe->id] = $oe->codigo;
                        if ($oe->id == $poa->id_obj_gestion)
                            $detallegestion = $oe->objetivo;
                    }
                    
                    $oesp = ORM::factory('pvoespecificos')->where('id_obj_gestion', '=', $poa->id_obj_gestion)->find_all(); ///objetivo especifico
                    foreach ($oesp as $oe) {
                        $objespecifico[$oe->id] = $oe->codigo;
                        if ($oe->id == $poa->id_obj_esp)
                            $detalleespecifico = $oe->objetivo;
                    }
                    $act = ORM::factory('pvactividades')->where('id_objespecifico', '=', $poa->id_obj_esp)->find_all(); ///actividades del POA
                    foreach ($act as $a) {
                        $actividad[$a->id] = $a->codigo;
                        if ($a->id == $poa->id_actividad)
                            $detalleactividad = $a->actividad;
                    }    
                }
               
                $tipoc = ORM::factory('poatipocontrataciones')->where('estado','=','1')->find_all();
                $tipocontratacion[''] = '(Seleccionar)';
                foreach ($tipoc as $tc){$tipocontratacion[$tc->id] = $tc->codigo.' - '.$tc->nombre;}
                
                //PRE - Modificado por Rodrigo Aguilar
                $pre = ORM::factory('presupuestos')->where('id_memo', '=', $documento->id)->find();
                $uEjeppt = New Model_oficinas();
                $uejecutorapre = $uEjeppt->uejecutorappt($this->user->id_oficina);
                $oFuente = New Model_Pvprogramaticas(); ///fuentes de financiamiento
                $fte = $oFuente->listafuentesuser($uejecutorapre->id);
                $fuente[''] = 'Seleccione Una Fuente de Financiamiento';
                foreach ($fte as $f){$fuente[$f->id] = $f->actividad;}
                $liq = ORM::factory('pvliquidaciones')->where('id_presupuesto','=',$pre->id)->and_where('estado','=',1)->find_all();
                foreach($liq as $l){
                    $x_id_partida[] = $l->id_partida;
                    $x_partida[] = $l->partida;
                    $x_codigo[] = $l->cod_partida;
                    $disp = ORM::factory('pvejecuciones')->where('id_programatica','=',$pre->id_programatica)->and_where('id_partida','=',$l->id_partida)->find();
                    $x_disponible[] = $disp->saldo_devengado;///saldo actual disponible
                    $x_solicitado[] = $l->importe_certificado;
                }
                $oPart = new Model_Pvprogramaticas();
                $part = $oPart->partidas($pre->id_programatica);
                $partidas['']='Seleccione una Partida';
                foreach($part as $p){
                    $partidas[$p->id] = $p->codigo.' - '.$p->partida;
                }
                ///////end - PRE/////////////

                $this->template->content = View::factory('documentos/edit')
                        ->bind('documento', $documento)///NI
                        ->bind('archivos', $archivos)
                        ->bind('tipo', $tipo)
                        ->bind('superior', $superior)
                        ->bind('vias', $vias)
                        ->bind('user', $this->user)
                        ->bind('mensajes', $mensajes)
                        ->bind('archivos', $archivos)
                        ->bind('destinatarios', $destinatarios)
                        ->bind('opt_tv', $opt_tv)
                        ->bind('pvfucov', $pvfucov)
                        ->bind('tipo_cambio', $tipo_cambio)
                        ->bind('options', $options)
                        // POA
                        ->bind('uejecutorapoa', $uejecutorapoa)
                        ->bind('poa', $poa)
                        ->bind('obj_est', $objest)
                        ->bind('obj_gestion', $objgestion)
                        ->bind('obj_esp', $objespecifico)
                        ->bind('actividad', $actividad)
                        ->bind('det_obj_est', $detalleestrategico)//detalle del objetivo de estrategico
                        ->bind('det_obj_gestion', $detallegestion)//detalle del objetivo de gestion
                        ->bind('det_obj_esp', $detalleespecifico)
                        ->bind('det_act', $detalleactividad)
                        ->bind('tipocontratacion', $tipocontratacion)  /// en poa//
                        // PRE
                         ->bind('pre', $pre)         ///presupuesto
                         ->bind('uejecutorapre',$uejecutorapre)
                         ->bind('fuente', $fuente)
                         ->bind('partidas',$partidas)
                         ->bind('x_id_partida', $x_id_partida)
                         ->bind('x_partida', $x_partida)
                         ->bind('x_codigo', $x_codigo)
                         ->bind('x_disponible', $x_disponible)
                         ->bind('x_solicitado', $x_solicitado)
                        ;
            }else {
                $pvcomision = ORM::factory('pvcomisiones')->where('id_documento', '=', $documento->id)->find();
                $doc_memo = ORM::factory('documentos')->where('nur','=',$documento->nur)->and_where('fucov','=',1)->find();
                $pvcomision_memo = ORM::factory('pvcomisiones')->where('id_documento', '=', $doc_memo->id)->find();

                $this->template->content = View::factory('documentos/edit')
                        ->bind('documento', $documento)
                        ->Bind('archivos', $archivos)
                        ->bind('tipo', $tipo)
                        ->bind('superior', $superior)
                        ->bind('vias', $vias)
                        ->bind('user', $this->user)
                        ->bind('options', $options)
                        ->bind('mensajes', $mensajes)
                        ->bind('archivos', $archivos)
                        ->bind('destinatarios', $destinatarios)
                        ->bind('pvcomision', $pvcomision)
                        ->bind('doc_memo', $doc_memo)
                        ->bind('pvcomision_memo', $pvcomision_memo);
            }
        } else {
            $this->template->content = 'Solo puede editar documentos creados por su usuario ';
        }
    }

    public function action_nuevo() {
        $oDoc = New Model_Tipos();
        $documentos = $oDoc->misTipos($this->user->id);
        $this->template->title.= ' | Crear documento';
        $this->template->content = View::factory('documentos/nuevo')
                ->bind('documentos', $documentos);
    }

    public function action_add_file() {
        if ($_POST) {
            for ($i = 0; $i < count($_FILES ['archivo']) - 1; $i++) {
                echo $_FILES ['archivo']['name'][$i];
            }
            var_dump($_FILES);
            /* $filename = upload::save ( $_FILES ['archivo'],NULL,'archivo/'.date('Y_m') );                                                
              $archivo = ORM::factory ( 'archivos' ); //intanciamos el modelo proveedor
              $archivo->nombre_archivo = basename($filename);
              $archivo->extension = $_FILES ['archivo'] ['type'];
              $archivo->tamanio = $_FILES ['archivo'] ['size'];
              $archivo->id_user = $this->user->id;
              $archivo->id_documento = $documento->id;
              $archivo->sub_directorio = date('Y').'/';
              $archivo->fecha = date('Y-m-d H:i:s');
              $archivo->save ();
             * 
             */
        }
        $this->template->content = View::factory('documentos/add_file');
    }

    public function action_archivos() {
        $oArchivo = New Model_archivos();
        $archivo = $oArchivo->listar($this->user->id);
        $this->template->styles = array('media/css/tablas.css' => 'all');
        $this->template->scripts = array('media/js/jquery.tablesorter.min.js');
        $this->template->title .= ' | Archivos Digitales';
        $this->template->content = View::factory('documentos/archivos')
                ->bind('results', $archivo);
    }

    // modificado Freddy Velasco 
    public function contenido_documento($id,$id_tipo,$id_oficina,$estado,$nivel){
        $contenido = '';
        $cambio = ORM::factory('pvtipocambios')->find_all();
            foreach($cambio as $c)
                 $tipo_cambio = $c;
        if ($nivel == 6) {
            $memo = ORM::factory('documentos')->where('id','=',$id)->find();
            
//            $memo_aux = ORM::factory('documentos')->where('nur','=',$memo->nur)->and_where('fucov','=','1')->find();
//            if($memo_aux->loaded()){
//                $memo = $memo_aux;
//            }
                        
            if($estado =='2' && $memo->fucov == '1' && $memo->loaded()){
                $pvfucov = ORM::factory('pvfucovs')->where('id_memo','=',$memo->id)->find();
                $pasajes = ORM::factory('pvpasajes')->where('id_fucov', '=', $pvfucov->id)->order_by('id', 'asc')->find_all();
                $contenido = View::factory('pvpasajes/detalle')
                                ->bind('pvfucov', $pvfucov)
                                ->bind('estado', $estado)
                                ->bind('pasajes', $pasajes)
                                ->bind('tipo_cambio', $tipo_cambio);
            }    
            
        } 
        if ($nivel == 8) {
            $memo = ORM::factory('documentos')->where('id','=',$id)->find();
//            if($memo->fucov > '0'){
                $poa = ORM::factory('poas')->where('id_memo','=',$id)->find();
//            }else{
//                $poa = ORM::factory('poas')->where('id_documento','=',$id)->find();
//            }
            
            if($memo->fucov > '0' && $estado =='2' && $poa->loaded()){
                $uEjepoa = New Model_oficinas();
                $uejecutorapoa = $uEjepoa->uejecutorapoa($id_oficina);
                
                $oestrategico = ORM::factory('pvoestrategicos')->where('estado','=',1)->find_all();
                $objest[''] = '(Seleccione)';
                foreach ($oestrategico as $oes){$objest[$oes->id] = $oes->codigo;}

                                
                $objgestion[''] = '(Seleccione)';
                $objespecifico[''] = '(Seleccione)';
                $actividad[''] = '(Seleccione)';
                if($poa->id_obj_est){
                    $det = ORM::factory('pvoestrategicos')->where('id', '=', $poa->id_obj_est)->find(); ///Detalle Objetivo Estrategico
                    $detalleestrategico = $det->objetivo;

                    $oges = ORM::factory('pvogestiones')->where('id_obj_est', '=', $poa->id_obj_est)->and_where('estado','=',1)->and_where('id_oficina','=',$uejecutorapoa->id)->find_all(); ///objetivo especifico
                    foreach ($oges as $oe) {
                        $objgestion[$oe->id] = $oe->codigo;
                        if ($oe->id == $poa->id_obj_gestion)
                            $detallegestion = $oe->objetivo;
                    }
                    
                    $oesp = ORM::factory('pvoespecificos')->where('id_obj_gestion', '=', $poa->id_obj_gestion)->find_all(); ///objetivo especifico
                    foreach ($oesp as $oe) {
                        $objespecifico[$oe->id] = $oe->codigo;
                        if ($oe->id == $poa->id_obj_esp)
                            $detalleespecifico = $oe->objetivo;
                    }
                    $act = ORM::factory('pvactividades')->where('id_objespecifico', '=', $poa->id_obj_esp)->find_all(); ///actividades del POA
                    foreach ($act as $a) {
                        $actividad[$a->id] = $a->codigo;
                        if ($a->id == $poa->id_actividad)
                            $detalleactividad = $a->actividad;
                    }    
                }

                $tipoc = ORM::factory('poatipocontrataciones')->where('estado','=','1')->find_all();
                $tipocontratacion[''] = '(Seleccionar)';
                foreach ($tipoc as $tc){$tipocontratacion[$tc->id] = $tc->codigo.' - '.$tc->nombre;}
                $mensajes = '';
                $contenido = View::factory('pvplanificacion/contenidopoa')
                        ->bind('mensajes', $mensajes)
                        ->bind('poa', $poa)
                        ->bind('obj_est', $objest)
                        ->bind('obj_gestion', $objgestion)
                        ->bind('obj_esp', $objespecifico)
                        ->bind('actividad', $actividad)
                        ->bind('det_obj_est', $detalleestrategico)//detalle del objetivo de estrategico
                        ->bind('det_obj_gestion', $detallegestion)//detalle del objetivo de gestion
                        ->bind('det_obj_esp', $detalleespecifico)
                        ->bind('det_act', $detalleactividad)
                        ->bind('tipocontratacion', $tipocontratacion)
                        ->bind('ue_poa', $uejecutorapoa)
                        ->bind('id_oficina', $id_oficina)
                        ->bind('documento', $memo)
                        ;
        }
        }
        if ($nivel == 7) {
            $memo = ORM::factory('documentos')->where('id','=',$id)->find();
            $pvfucov = ORM::factory('pvfucovs')->where('id_memo','=',$id)->find();
//            if($memo->fucov > '0'){
                $pre = ORM::factory('presupuestos')->where('id_memo','=',$id)->find();
//            }else{
//                $poa = ORM::factory('poas')->where('id_documento','=',$id)->find();
//                if($poa->loaded())
//                    $pre = ORM::factory('presupuestos')->where('id_memo','=',$id)->find();
//                else
//                    $pre = ORM::factory('presupuestos')->where('id_documento','=',$id)->find();
//            }
            if( $memo->fucov > '0' && $estado == '2' && $pre->loaded() ){
                $uEjeppt = New Model_oficinas();
                $uejecutorapre = $uEjeppt->uejecutorappt($this->user->id_oficina);
                $oFuente = New Model_Pvprogramaticas(); ///fuentes de financiamiento
                $fte = $oFuente->listafuentesuser($uejecutorapre->id);
                $fuente[''] = 'Seleccione Una Fuente de Financiamiento';
                foreach ($fte as $f){$fuente[$f->id] = $f->actividad;}
                $liq = ORM::factory('pvliquidaciones')->where('id_presupuesto','=',$pre->id)->and_where('estado','=',1)->find_all();
                foreach($liq as $l){
                    $x_id_partida[] = $l->id_partida;
                    $x_partida[] = $l->partida;
                    $disp = ORM::factory('pvejecuciones')->where('id_programatica','=',$pre->id_programatica)->and_where('id_partida','=',$l->id_partida)->find();
                    $x_disponible[] = $disp->saldo_devengado;///saldo actual disponible
                    $x_solicitado[] = $l->importe_certificado;
                }
                $oPart = new Model_Pvprogramaticas();
                $part = $oPart->partidas($pre->id_programatica);
                $partidas['']='Seleccione una Partida';
                foreach($part as $p){
                    $partidas[$p->id] = $p->codigo.' - '.$p->partida;
                }
                ///detalle de la fuente presupuestaria
                $det = $oFuente->detallesaldopresupuesto($pre->id_programatica);
                foreach ($det as $d)
                    $detallefuente = $d;
                $cambio = ORM::factory('pvtipocambios')->find_all();
                foreach($cambio as $c)
                $tipo_cambio = $c;
                ///documento para presupuesto
                $documento = ORM::factory('documentos',$pvfucov->id_documento);
                $user = ORM::factory('users',$documento->id_user);

                $archivo=ORM::factory('archivos')->where('id_documento','=',$pre->id_documento)->find();

                $contenido = View::factory('pvpresupuesto/contenidoppt')
                         ->bind('pre', $pre)
                         ->bind('uejecutorapre',$uejecutorapre)
                         ->bind('fuente', $fuente)
                         ->bind('partidas',$partidas)
                         ->bind('x_id_partida', $x_id_partida)
                         ->bind('x_partida', $x_partida)
                         ->bind('x_disponible', $x_disponible)
                         ->bind('x_solicitado', $x_solicitado)
                         ->bind('detallefuente', $detallefuente)
                         ->bind('pvfucov', $pvfucov)
                         ->bind('tipo_cambio', $tipo_cambio)
                        ->bind('documento', $documento)
                        ->bind('archivo', $archivo)
                        ->bind('user',$user);
            }
        }
        ///aprobar informe de viaje
        $memo = ORM::factory('documentos')->where('id','=',$id)->and_where('fucov','=',1)->find();
        if($this->user->id == $memo->id_user){///preguntar si este usuario creó el memorandum
            $oDesc = new Model_Pvpasajes();
            $desc = $oDesc->descargo($id, $this->user->id_entidad);
            $descargo = array();
            foreach ($desc as $d)
                $descargo = $d;
            if($descargo){
                $informe = ORM::factory('documentos')
                        ->where('id_entidad','=',$this->user->id_entidad)
                        ->and_where('id_proceso','=',18)
                        ->and_where('id_tipo','=',3)
                        ->and_where('nur','=',$descargo->nur)
                        ->find_all();
                foreach ($informe as $i)
                        $documento = $i;
                $tipo = ORM::factory('tipos',$documento->id_tipo);
                $contenido = View::factory('pvpasajes/detalleinforme')
                        ->bind('d', $documento)
                        ->bind('tipo', $tipo)
                        ->bind('memo', $memo)
                        ->bind('descargo', $descargo)
                            ;
            }
        }
        
        return $contenido;

    }
    //////////end/////////////


    ///rodrigo(opciones por usuario) 210813
    public function pvmodificar($id, $estado) {
        $detallepv = '';
        $memo = ORM::factory('documentos')->where('id', '=', $id)->and_where('fucov','=',1)->find();
        if ($estado == 2 && $memo->loaded()) {
            $pvfucov = ORM::factory('pvfucovs')->where('id_memo', '=', $id)->find();
            $documento = ORM::factory('documentos')->where('id','=',$pvfucov->id_documento)->and_where('id_tipo','=',13)->find();
            //$oficina = ORM::factory('oficinas')->where('id', '=', $memo->id_oficina)->find();///oficina del usuario solicintante
            $cambio = ORM::factory('pvtipocambios')->find_all();
            foreach($cambio as $c)
                 $tipo_cambio = $c;
            if ($pvfucov->loaded()) {
                $nivel = $this->user->nivel;
                switch ($nivel) {
                    case 6://pasajes y viaticos
                        $pasajes = ORM::factory('pvpasajes')->where('id_fucov', '=', $pvfucov->id)->order_by('id', 'asc')->find_all();
                        $detallepv = View::factory('pvpasajes/detalle')
                                ->bind('pvfucov', $pvfucov)
                                ->bind('estado', $estado)
                                ->bind('pasajes', $pasajes)
                                ->bind('tipo_cambio', $tipo_cambio)
                        ;
                        break;
                    case 7:///presupuesto
                        $uEjepoa = New Model_oficinas();                
                        $uejecutorappt = $uEjepoa->uejecutorappt($this->user->id_oficina);///buscar unidad ejecutora del PPT
                        $oFuente = New Model_Pvprogramaticas();
                        $fte = $oFuente->listafuentesppt($uejecutorappt->id, $this->user->id_entidad); ///fuente por oficina + dgga en caso del MDP
                        $fuente = array();
                        $fuente[''] = 'Seleccione Una Fuente de Financiamiento';
                        foreach ($fte as $f)
                            $fuente[$f->id] = $f->actividad;
                        $oPart = New Model_Pvprogramaticas();
                        $pvliquidacion = ORM::factory('pvliquidaciones')->where('id_fucov','=',$pvfucov->id)->find();
                        if($pvliquidacion->loaded()){
                            $oPart = New Model_Pvprogramaticas();
                            $pvliquidacion = $oPart->pptliquidado($pvfucov->id,$pvfucov->total_pasaje,$pvfucov->total_viatico,$pvfucov->id_tipoviaje,$pvfucov->gasto_representacion,$tipo_cambio->cambio_venta);
                        }
                        else{
                            $oPart = New Model_Pvprogramaticas();
                            $pvliquidacion = $oPart->pptdisponibleuser($pvfucov->id_programatica,$pvfucov->total_pasaje,$pvfucov->total_viatico,$pvfucov->id_tipoviaje,$pvfucov->gasto_representacion,$tipo_cambio->cambio_venta);
                        }
                        ///detalle de la fuente presupuestaria
                        $det = $oFuente->detallesaldopresupuesto($pvfucov->id_programatica);
                        foreach ($det as $d)
                            $detallefuente = $d;
                        $detallepv = View::factory('pvpresupuesto/detalle')
                                ->bind('pvfucov', $pvfucov)
                                ->bind('estado', $estado)
                                ->bind('fuente', $fuente)
                                ->bind('partidasgasto', $pvliquidacion)
                                ->bind('detallefuente', $detallefuente)
                                ->bind('tipo_cambio', $tipo_cambio)
                        ;
                        break;
                    case 8:///Planificacion
                        $pvpoas = ORM::factory('pvpoas')->where('id_fucov', '=', $pvfucov->id)->find();
                        $uEjepoa = New Model_oficinas();
                        $uejecutorapoa = $uEjepoa->uejecutorapoa($documento->id_oficina);
                        $obj_gest = ORM::factory('pvogestiones')->where('id_oficina', '=', $uejecutorapoa->id)->and_where('estado', '=', 1)->find_all();
                        foreach ($obj_gest as $g) {
                            $ogestion[$g->id] = $g->codigo;
                            if ($g->id == $pvpoas->id_obj_gestion) {
                                $det_obj_gestion = $g->objetivo;
                            }
                        }
                        $oesp = ORM::factory('pvoespecificos')->where('id_obj_gestion', '=', $pvpoas->id_obj_gestion)->and_where('estado', '=', 1)->find_all();
                        $det_obj_esp = '';
                        foreach ($oesp as $e) {
                            $oespecifico[$e->id] = $e->codigo;
                            if ($e->id == $pvpoas->id_obj_esp) {
                                $det_obj_esp = $e->objetivo;
                            }
                        }
                        $act = ORM::factory('pvactividades')->where('id_objespecifico', '=', $pvpoas->id_obj_esp)->and_where('estado', '=', 1)->find_all();
                        $det_actividad = '';
                        foreach ($act as $a) {
                            $actividad[$a->id] = $a->codigo;
                            if ($a->id == $pvpoas->id_actividad) {
                                $det_actividad = $a->actividad;
                            }
                        }
                        $detallepv = View::factory('pvplanificacion/detalle')
                                ->bind('pvfucov', $pvfucov)
                                ->bind('estado', $estado)
                                ->bind('pvpoas', $pvpoas)
                                ->bind('obj_gestion', $ogestion)
                                ->bind('det_obj_gestion', $det_obj_gestion)
                                ->bind('obj_esp', $oespecifico)
                                ->bind('det_obj_esp', $det_obj_esp)
                                ->bind('actividad', $actividad)
                                ->bind('det_act', $det_actividad)
                                ->bind('ue_poa', $uejecutorapoa)
                        ;
                        break;
                    default:///verificar si presento informe de descargo
                        if($this->user->id == $memo->id_user){///preguntar si este usuario creó el memorandum
                            $oDesc = new Model_Pvpasajes();
                            $desc = $oDesc->descargo($id, $this->user->id_entidad);
                            $descargo = array();
                            foreach ($desc as $d)
                                $descargo = $d;///mostrar detalle del ultimo informe de descargo generado
                            if($descargo){
                                $doc = ORM::factory('documentos')
                                        ->where('id_entidad','=',$this->user->id_entidad)
                                        ->and_where('id_proceso','=',18)
                                        ->and_where('id_tipo','=',3)
                                        ->and_where('nur','=',$descargo->nur)
                                        ->find_all();
                                foreach ($doc as $d)
                                    $documento = $d;
                                $tipo = ORM::factory('tipos',$documento->id_tipo);
                                $detallepv = View::factory('pvpasajes/detalleinforme')
                                    ->bind('d', $documento)
                                    ->bind('tipo', $tipo)
                                    ->bind('memo', $memo)
                                    ->bind('descargo', $descargo)
                                        ;
                            }
                        }
                }
            }
        }
        return $detallepv;
    }

    ///210813

    public function action_habilitar (){
        $id = Arr::get($_GET, 'id_doc', 0);
        $documento = ORM::factory('documentos')->where('id','=',$id)->find();
        $documento->anulado = 0;
        $documento->save();
        $this->request->redirect('documento/editar/'.$id);
    }

    public function action_anular (){
        $id = Arr::get($_GET, 'id_doc', 0);
        $documento = ORM::factory('documentos')->where('id','=',$id)->find();
        $documento->anulado = 1;
        $documento->save();
        $this->request->redirect('documento/editar/'.$id);
    }
}

?>
