<?php defined('SYSPATH') or die('No direct script access.'); ?>

2017-05-25 08:11:29 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2017-05-25 08:13:25 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2017-05-25 08:41:30 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2017-05-25 09:21:35 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2017-05-25 09:48:29 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2017-05-25 10:20:00 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2017-05-25 10:30:26 --- ERROR: Kohana_Exception [ 0 ]: Cannot delete archivados model because it is not loaded. ~ MODPATH/orm/classes/kohana/orm.php [ 1383 ]
2017-05-25 10:30:32 --- ERROR: Kohana_Exception [ 0 ]: Cannot delete archivados model because it is not loaded. ~ MODPATH/orm/classes/kohana/orm.php [ 1383 ]
2017-05-25 10:38:02 --- ERROR: ErrorException [ 8 ]: Undefined index: aceptar ~ APPPATH/classes/controller/hojaruta.php [ 71 ]
2017-05-25 10:55:52 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2017-05-25 11:38:38 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'DIRECTOR GENERAL EJECUTIVO%'
        or nur like '%'DIRECTOR GENERAL EJECUTIVO%'' at line 3 ( SELECT COUNT(*) as count FROM documentos d,
        ( SELECT id  FROM documentos
        WHERE codigo like '%'DIRECTOR GENERAL EJECUTIVO%'
        or nur like '%'DIRECTOR GENERAL EJECUTIVO%'
	 or institucion_remitente like '%'DIRECTOR GENERAL EJECUTIVO%'
        or referencia like '%'DIRECTOR GENERAL EJECUTIVO%' 
        or nombre_remitente like '%'DIRECTOR GENERAL EJECUTIVO%'
        or nombre_destinatario like '%'DIRECTOR GENERAL EJECUTIVO%') as x
        WHERE x.id=d.id
        and d.id_entidad='1' AND d.fecha_creacion between  DATE_FORMAT(CURDATE(), '%Y-01-01 00:00:00') and CURRENT_TIMESTAMP() ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2017-05-25 17:24:51 --- ERROR: ErrorException [ 8 ]: Undefined index: aceptar ~ APPPATH/classes/controller/hojaruta.php [ 71 ]
2017-05-25 17:54:41 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2017-05-25 17:55:47 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2017-05-25 20:10:44 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]