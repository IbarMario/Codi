var codropsEvents = {
	'11-21-2013' : '<a href="http://www.wincalendar.com/Great-American-Smokeout">Great American Smokeout</a>',
	'11-13-2013' : '<span>Ashura [An example of an complete date event (11-13-2013)]</span>',
	'11-11-2013' : '<a href="http://www.wincalendar.com/Remembrance-Day">Remembrance Day (Canada)</a>',
	'11-04-2013' : '<span>Islamic New Year</span>',
	'11-03-2013' : '<a href="http://www.wincalendar.com/Daylight-Saving-Time-Ends">Daylight Saving Time Ends</a>',
	'11-01-2013' : '<span>All Saints Day</span>',
	'12-25-YYYY' : '<span>Christmas Day [Date : 12-25-YYYY]</span>',
	'01-01-YYYY' : '<span>New Year\'s Eve (Event repeats every YEAR)</span>',
	'MM-02-2013' : '<span>Yeah, Monthly [MM-02-2013]</span>',
	'MM-07-YYYY' : '<span> Area de Sistemas </span>',
	'11-DD-2014' : {content : '<span>Ex: {\'11-DD-2014\' : {content : \'Something\', endDate : 20}}</span>', endDate : 20},
	'02-DD-2014' : {content : '<span>Ex: {\'02-DD-2014\' : {content : \'Something\', startDate : 10, endDate : 20}}</span>', startDate : 10, endDate : 20},
	'12-DD-YYYY' : '<span>[12-DD-YYYY] Whole month and Year</span>',
<!--'MM-08-YYYY' : '<span> <font color="#428bca"><b>PRESENTACI&Oacute;N</b><br><br>Sistema IntraNet 2.0 <br><br><br> &Aacute;rea de Sistemas <br> 2015</font></span>',-->
<!--'TODAY' : '<span>Today, [Date : \'TODAY\']</span>',-->
<!--'MM-11-YYYY' : '<span> <font color="#428bca"><b><br>Sistema IntraNet 2.0 </b><br><br><br> &Aacute;rea de Sistemas <br> 2015</font></span>',-->
<!--'MM-12-YYYY' : '<span> <font color="#428bca"><b><br>CIRCULAR <br> CIR/MDPyEP/DGA/RRHH N 0011/2015</b><br>MDPyEP/2015-04488<br><b><br>INCREMENTO SALARIAL RETROACTIVO, PRESENTACION DE FORMULARIO 110 RC-IVA</b><br><br> <br></font></span>',-->

<!-- CALENDARIO ACTUALIZAR -->
	'05-21-YYYY' : '<span> <font color="#428bca"><b><br>CIRCULAR <br> CIR/MDPyEP/DGA/RRHH N 0011/2015</b><br>MDPyEP/2015-04488<br><b><br>HOLA COMO ESTAS</b><br><br> <br></font></span>',
	'05-22-YYYY' : '<span> <font color="#428bca"><b><br> FELIZ CUMPLEA&Ntilde;OS <br> </b></font><font color="#428bca"><br> </font></p> <img src="fotos/saul.jpg" width="110" height="110"><br><br>SAUL AYALA</span>',
	'05-23-YYYY' : '<span> <font color="#428bca"><b><br> FELIZ CUMPLEA&Ntilde;OS <br> </b></font><font color="#428bca"><br> </font></p> <img src="fotos/jimena.jpg" width="100" height="100"><br><br>JIMENA TELLEZ</span>',
	'05-24-YYYY' : '<span> <font color="#428bca"><b><br> FELIZ CUMPLEA&Ntilde;OS <br> </b></font><font color="#428bca"><br> </font></p> <img src="fotos/buho.jpg" width="50" height="50"><br>MARIO FIDEL HILARI<br><img src="fotos/buho.jpg" width="50" height="50"><br>RICHARD CARBAJAL<br><img src="fotos/nelson.jpg" width="80" height="80"><br>NELSON LOPEZ</span>',
	'05-26-YYYY' : '<span> <font color="#428bca"><b><br> FELIZ CUMPLEA&Ntilde;OS <br> </b></font><font color="#428bca"><br> </font></p> <img src="fotos/carita.jpg" width="100" height="100"><br><br>NIKOL MARIANA SANTOS</span>',
	'05-27-YYYY' : '<span> <font color="#428bca"><b><br> FELIZ CUMPLEA&Ntilde;OS <br> </b></font><font color="#428bca"><br> </font></p> <img src="fotos/melany.jpg" width="110" height="110"><br><br>MELANY SHARON ITURRI</span>',
	'05-29-YYYY' : '<span> <font color="#428bca"><b><br> FELIZ CUMPLEA&Ntilde;OS <br> </b></font><font color="#428bca"><br> </font></p> <img src="fotos/maximo.jpg" width="100" height="100"><br>MAXIMO CHURA<br><img src="fotos/buho.jpg" width="100" height="100"><br>GUSTAVO GARCIA</span>',
	'05-26-YYYY' : '<span> <font color="#428bca"><b><br> FELIZ CUMPLEA&Ntilde;OS <br> </b></font><font color="#428bca"><br> </font></p> <img src="fotos/carita.jpg" width="100" height="100"><br><br>NIKOL MARIANA SANTOS</span>',
	'06-01-YYYY' : '<span> <font color="#428bca"><b><br> FELIZ CUMPLEA&Ntilde;OS <br> </b></font><font color="#428bca"><br> </font></p> <img src="fotos/valeria.jpg" width="100" height="100"><br><br>VALERIA MURIEL SALINAS</span>',
	'06-03-YYYY' : '<span> <font color="#428bca"><b><br> FELIZ CUMPLEA&Ntilde;OS <br> </b></font><font color="#428bca"><br> </font></p> <img src="fotos/victora.jpg" width="100" height="100"><br><br>VICTOR HUGO PERALTA<br><img src="fotos/liliana.jpg" width="100" height="100"><br><br>LILIANA CRISTINA PABON</span>',
	'06-04-YYYY' : '<span> <font color="#428bca"><b><br> FELIZ CUMPLEA&Ntilde;OS <br> </b></font><font color="#428bca"><br> </font></p> <img src="fotos/buho.jpg" width="100" height="100"><br>GARIN TINTAYA<br><img src="fotos/andres.jpg" width="100" height="100"><br>ANDRES QUINTANA</span>',
	'06-05-YYYY' : '<span> <font color="#428bca"><b><br> FELIZ CUMPLEA&Ntilde;OS <br> </b></font><font color="#428bca"><br> </font></p> <img src="fotos/buho.jpg" width="110" height="110"><br><br>CRHISTIAN DE JESUS HENRICH</span>',
	'06-08-YYYY' : '<span> <font color="#428bca"><b><br> FELIZ CUMPLEA&Ntilde;OS <br> </b></font><font color="#428bca"><br> </font></p> <img src="fotos/victorj.jpg" width="110" height="110"><br><br>VICTOR HUGO PERALES</span>',
	'06-09-YYYY' : '<span> <font color="#428bca"><b><br> FELIZ CUMPLEA&Ntilde;OS <br> </b></font><font color="#428bca"><br> </font></p> <img src="fotos/efran.jpg" width="110" height="110"><br><br>EFRAIN ESPINOZA</span>',
	'06-10-YYYY' : '<span> <font color="#428bca"><b><br> FELIZ CUMPLEA&Ntilde;OS <br> </b></font><font color="#428bca"><br> </font></p> <img src="fotos/buho.jpg" width="110" height="110"><br><br>RENE MAURICIO DAZA</span>',
	'06-12-YYYY' : '<span> <font color="#428bca"><b><br> FELIZ CUMPLEA&Ntilde;OS <br> </b></font><font color="#428bca"><br> </font></p> <img src="fotos/carita.jpg" width="110" height="110"><br><br>CLAUDIA SOTOMAYOR</span>',
	'06-13-YYYY' : '<span> <font color="#428bca"><b><br> FELIZ CUMPLEA&Ntilde;OS <br> </b></font><font color="#428bca"><br> </font></p> <img src="fotos/abigail.jpg" width="110" height="110"><br><br>ABIGAIL VERONICA ZEGARRA</span>',
	'06-18-YYYY' : '<span> <font color="#428bca"><b><br> FELIZ CUMPLEA&Ntilde;OS <br> </b></font><font color="#428bca"><br> </font></p> <img src="fotos/raquel.jpg" width="110" height="110"><br><br>RAQUEL PACHECO</span>',
	'06-19-YYYY' : '<span> <font color="#428bca"><b><br> FELIZ CUMPLEA&Ntilde;OS <br> </b></font><font color="#428bca"><br> </font></p> <img src="fotos/carita.jpg" width="110" height="110"><br><br>MARIA ELENA OROSCO</span>',
	'06-22-YYYY' : '<span> <font color="#428bca"><b><br> FELIZ CUMPLEA&Ntilde;OS <br> </b></font><font color="#428bca"><br> </font></p> <img src="fotos/carita.jpg" width="110" height="110"><br><br>NORA GEMIO</span>',
	'06-24-YYYY' : '<span> <font color="#428bca"><b><br> FELIZ CUMPLEA&Ntilde;OS <br> </b></font><font color="#428bca"><br> </font></p> <img src="fotos/buho.jpg" width="110" height="110"><br><br>OSCAR EDUARDO ORIHUELA</span>',
	'06-25-YYYY' : '<span> <font color="#428bca"><b><br> FELIZ CUMPLEA&Ntilde;OS <br> </b></font><font color="#428bca"><br> </font></p> <img src="fotos/vilma.jpg" width="110" height="110"><br><br>VILMA CONTRERAS</span>',
	'06-29-YYYY' : '<span> <font color="#428bca"><b><br> FELIZ CUMPLEA&Ntilde;OS <br> </b></font><font color="#428bca"><br> </font></p> <img src="fotos/jeannette.jpg" width="110" height="110"><br><br>JEANNETTE SALGUERO</span>',
	'06-30-YYYY' : '<span> <font color="#428bca"><b><br> FELIZ CUMPLEA&Ntilde;OS <br> </b></font><font color="#428bca"><br> </font></p> <img src="fotos/buho.jpg" width="110" height="110"><br><br>VLADIMIR YUGAR</span>',






<!-- FIN CALENDARIO ACT. -->




	<!--'05-09-2015': ['<a href="">event one</a>', '<span>event two</span>'],-->
	'10-DD-YYYY' : [
		{content : '<span>Ex: {\'10-DD-2014\' : {content : \'Something\', startDate : 10, endDate : 20}}</span>', startDate : 10, endDate : 20},
		{content : '<span>Ex: {\'10-DD-2014\' : {content : \'Something\', endDate : 20}}</span>', endDate: 20},
	]

};
