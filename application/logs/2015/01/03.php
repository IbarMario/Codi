<?php defined('SYSPATH') or die('No direct script access.'); ?>

2015-01-03 10:42:13 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'E-MDPyEP/2014-04858'%'
        or nur like '%'E-MDPyEP/2014-04858'%'
        o' at line 3 ( SELECT COUNT(*) as count FROM documentos d,
        ( SELECT id  FROM documentos
        WHERE codigo like '%'E-MDPyEP/2014-04858'%'
        or nur like '%'E-MDPyEP/2014-04858'%'
        or referencia like '%'E-MDPyEP/2014-04858'%' 
        or nombre_remitente like '%'E-MDPyEP/2014-04858'%'
        or nombre_destinatario like '%'E-MDPyEP/2014-04858'%') as x
        WHERE x.id=d.id
        and d.id_entidad='1' AND d.fecha_creacion between  DATE_FORMAT(CURDATE(), '%Y-01-01 00:00:00') and CURRENT_TIMESTAMP() ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]