
<script type="text/javascript">
    $(function(){
        var id=$('#user').val();
        if(id>0)
        {        
        $.ajax({
	            type: "POST",
	            data: { user : id },
	            url: "/ajax/pendientes",
	            dataType: "json",
	            success: function(data)
	            {                           
                        if(data)
                         {
                          $.each(data,function(i,item){
                               $('ul#pendientes').append('<li><a class="pendiente" href="/bandeja/pendientes/?id='+item.id+'" >'+item.nombre+'<br/><b>'+item.cargo+'</b><br/> Pendientes : <b>'+item.pendientes +'</b></a></li>');
//                               alert(item.nombre);                                                              
                          });    
                              
                         }
                         else
                         {
                            
                         }
	           },
                   error:function(){ }
          });
        }
//grafico
var Chart;		
				var options={
					chart: {
						renderTo: 'container',
						defaultSeriesType: 'column'
					},
					title: {
						text: 'Pendientes y archivados por Oficina'
					},
					subtitle: {
						text: ''
					},
					xAxis: {
                                            categories: [					
						],
                                                labels: {
                                            rotation: -45,
                                            align: 'right',
                                            style: {
                                                    font: 'normal 10px Verdana'
                                                    }
                                                }						
					},
					yAxis: {
						min: 0,
						title: {
							text: 'Unidades'
						}
					},
                                        credits:{
                                            enabled:false
                                        },
					tooltip: {
						formatter: function() {
							return ''+
								this.series.name +': '+ this.y;
						}
					},
					plotOptions: {
						column: {
							pointPadding: 0.2,
							borderWidth: 0
						}
					},
   // Respecto a la gráfica anterior la única diferencia es que ponemos mas valores por categoría.
				        series: []
				}                                 

                jQuery.getJSON('/ajax/pOficina', null, function(data) {
                //alert(data.copias);
                           // $.each(data, function(i,item){
                            options.series.push( {
                            name: 'Pendientes oficiales',
                            data: data.oficiales
                                });
                            options.series.push( {
                            name: 'Copias Pendientes',
                            data: data.copias
                                });
                            options.series.push( {
                            name: 'Archivados',
                            data: data.archivados
                                });
                            
                            options.xAxis.categories=data.names;
                            //	options.subtitle.text=item.title;
                            chart = new Highcharts.Chart(options);
                            });	      	      
        
        
    });
</script>




<div class="user">
    <h2 class="subtitulo">    
    <?php echo $user->nombre;?>
    <br/><span><?php echo $user->cargo;?> </span></h2>
    <br/>
</div>
<div style="float: left; width: 23%; padding: 10px; line-height: 20px;  border-right: 1px solid #ccc;  display: block;  ">
    <h1 style="font-size:24px; color:#78CA00; border-bottom: 3px solid #78CA00; ">Bandeja</h1>
<ul class="items">
    <?php foreach($estados as $k=>$v): ?>
    <li >
        <a href="/bandeja/<?php echo $v['accion'];?>" class="item<?php echo $k;?>"><?php echo $v['titulo'];?>
        <br/><span> Usted tiene <b> <?php echo $v['cantidad'] ?></b>
         <?php
        if($v['cantidad']>1)
        {
            echo $v['plural'];
        }
        else
        {
            echo $v['singular'];
        }
        ?> 
        </span>
        </a>                      
    </li>
<?php endforeach;?>
    <li >
        <a href="/media/images/manual.pdf" class="item12" target="_blank">Manual del Usuario
        <br/><span>Correspondencia Digital Centralizada<b> CODICE </b></span>
        </a>                      
    </li>
<ul>
</div>   
<div style="padding: 10px; width: 22%; float: left; line-height: 20px;  border-right: 1px solid #ccc; display: block;    ">
<h1 style="font-size:24px; color:#126B91; border-bottom: 3px solid #126B91; ">Documentos</h1>
<ul class="item_docs">
<?php foreach($tipos as $k=>$v):?>
    <li >
     <a href="/documento/tipo/<?php echo $v['id_tipo'];?>" >
     <?php echo $v['plural']; ?>
     <br/><span>
     <b><?php echo $v['cantidad']; ?></b> Documentos
     </span>
     </a>
    </li>
  <?php endforeach;?>
    <ul>
</div>

<div style="padding: 10px; width: 30%; float: left; line-height: 20px; display: block;  border-right: 1px solid #ccc;   ">
<h1 style="font-size:24px; color:#503374; border-bottom: 3px solid #503374; ">Estadisticas</h1>
    <div id="container" style="width:100%; height: 350px; margin: 0 auto;"></div>    
</div>
<div style="padding: 10px; width: 17%; float: left; line-height: 20px; display: block;   ">
<h1 style="font-size:24px; color:#AD521C; border-bottom: 3px solid #AD521C; ">Usuario</h1>
<ul class="items_data">
    <li >
        <a class="itemc" href="/user/changePass">Cambiar Contrase&ntilde;a<br/><span>Cambia su contrase&ntilde;a.</span></a>
    </li>
    <li >
     <a class="itemd" href="/user/changeData">Cambiar datos<br/>
     <span>
         Cambie su nombre, cargo o email.
     </span>
     </a>
    </li>
    <li>
    <script language="JAVASCRIPT" type="text/javascript">
//<![CDATA[
TE1="* Nuevo";
TE2="";
M=TE1;
cnt=0;
function SH(){
document.Switch.A.value=M;
cnt++;
if(cnt==1 && M==TE1){M=TE2;}
if(cnt==2 && M==TE2){cnt=0;M=TE1;}
setTimeout("SH()",500);
}
// -->
//]]>
</script>
<form name="Switch" id="Switch">
    <div>

            <p>
              <font color="#FF0000" face="Verdana" ><input name="A" size="8" style=
                "color: #ff1401; font-weight: bold; font-size:20px; font-family: Verdana, Arial; background-color: rgb(255,255,255); border: 0px outset rgb(0,128,0); margin-top: auto; padding-left: 5px" /></font>
              <script language="JAVASCRIPT" type="text/javascript">
//<![CDATA[
                <!--
                SH();
                // -->
                //]]>
                </script>
            </p>
    </div>
</form>
    </li>
    <li>
     <div style="background:#a2bce1">
      <a class="itemd" href="/asistencia/index.php?user=<?php echo $user->id;?>" onclick="window.open(this.href, this.target, 'width=930,height=730,left=450,top=75,scrollbars=1'); return false;">
      <strong>Soporte Técnico</strong><br/>
     <span>
         Codice, impresoras, computadoras, red, otros.
     </span>
     </a>
     </div>
    </li>
</ul>    
</div>


<div style="display: block; width: 100%; clear: both; "></div>
<?php if($user->dependencia==0):?>    
<input type="hidden" value="<?php echo $user->id;?>" id="user" />
<h1 style="font-size:24px; color:#272E41; padding-bottom: 5px;  border-bottom: 3px solid #272E41; ">Usuarios Dependientes</h1>

<div >
    <ul id="pendientes">
        
    </ul>
</div>
<?php else:?>
<input type="hidden" value="0" id="user" />
<?php endif;?>

<!--------------- Ventana de Aviso    -->
<!--
<div id="postit"> 
<div align="right"><a href="javascript:closeit()" title="Cerrar"><font color="white"><b><img src="../../../asistencia/images/cerrar.png" width="44" height="44" /></b></font></a></div> 
<center>
<a href="/asistencia/index.php?user=<?php echo $user->id;?>" onclick="window.open(this.href, this.target, 'width=930,height=730,left=450,top=75,scrollbars=1'); javascript:closeit(); return false;">
<img src="../../../asistencia/images/Aviso_sistemas_01.png" width="529" height="446" />
</a>
</center>
De acuerdo a la CIRCULAR: MDPyEP/2015-03902 
<br /><font size="2">Mayor información telefonos internos: (316 - 317 - 318 - 319)</font>
<br /><br />
</div> 
<p>
  <style>
#postit{display:scroll;position:fixed;bottom:10px;left:5px;visibility:hidden; 
background:#333;color:#ccc;border:4px solid #95b1cf; 
z-index:100;font:20px verdana;width:950px;padding:3px;height:600px;} 
#postit a{color:#ff9900;text-decoration:none;}
</style> 
  <!-- desde aqui no modificar nada --> 
  <script> 
var once_per_browser=0 
var ns4=document.layers 
var ie4=document.all 
var ns6=document.getElementById&&!document.all 
if (ns4) 
crossobj=document.layers.postit 
else if (ie4||ns6) 
crossobj=ns6? document.getElementById("postit") : document.all.postit 
function closeit(){ 
if (ie4||ns6) 
crossobj.style.visibility="hidden" 
else if (ns4) 
crossobj.visibility="hide"} 
function get_cookie(Name) { 
var search = Name + "=" 
var returnvalue = ""; 
if (document.cookie.length > 0) { 
offset = document.cookie.indexOf(search) 
if (offset != -1) { // if cookie exists 
offset += search.length 
end = document.cookie.indexOf(";", offset); 
if (end == -1) 
end = document.cookie.length; 
returnvalue=unescape(document.cookie.substring(offset, end))}} 
return returnvalue;} 
function showornot(){ 
if (get_cookie('postdisplay')==''){ 
showit() 
document.cookie="postdisplay=yes"}} 
function showit(){ 
if (ie4||ns6) 
crossobj.style.visibility="visible" 
else if (ns4) 
crossobj.visibility="show"} 
if (once_per_browser) 
showornot() 
else 
showit() 
</script>
</p>-->
<!---------------  FIn de la ventana de aviso       ------------>