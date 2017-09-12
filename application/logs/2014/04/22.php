<?php defined('SYSPATH') or die('No direct script access.'); ?>

2014-04-22 08:08:43 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-22 08:50:58 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-22 09:00:27 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-22 09:45:29 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-22 09:51:01 --- ERROR: Database_Exception [ 0 ]: [1242] Subquery returns more than 1 row ( SELECT s.id as id, s.padre,s.nur, s.derivado_por,s.derivado_a,s.nombre_emisor,s.nombre_receptor,s.cargo_emisor,s.cargo_receptor,s.de_oficina,s.a_oficina,s.fecha_emision,s.fecha_recepcion,
s.adjuntos, s.archivos, c.accion,e.id as id_estado,e.estado,s.oficial,s.hijo,s.proveido, s.observacion 
, IF(e.id=10,(SELECT carpetas.carpeta FROM archivados, carpetas WHERE archivados.nur=s.nur AND archivados.id_user=s.derivado_a AND archivados.id_carpeta=carpetas.id),'') as carpeta 
            FROM seguimiento s
            INNER JOIN acciones c ON s.accion=c.id
            INNER JOIN estados e ON s.estado=e.id
            WHERE s.nur='E-MDPyEP/2014-01600'
            ORDER BY s.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-22 09:51:08 --- ERROR: Database_Exception [ 0 ]: [1242] Subquery returns more than 1 row ( SELECT s.id as id, s.padre,s.nur, s.derivado_por,s.derivado_a,s.nombre_emisor,s.nombre_receptor,s.cargo_emisor,s.cargo_receptor,s.de_oficina,s.a_oficina,s.fecha_emision,s.fecha_recepcion,
s.adjuntos, s.archivos, c.accion,e.id as id_estado,e.estado,s.oficial,s.hijo,s.proveido, s.observacion 
, IF(e.id=10,(SELECT carpetas.carpeta FROM archivados, carpetas WHERE archivados.nur=s.nur AND archivados.id_user=s.derivado_a AND archivados.id_carpeta=carpetas.id),'') as carpeta 
            FROM seguimiento s
            INNER JOIN acciones c ON s.accion=c.id
            INNER JOIN estados e ON s.estado=e.id
            WHERE s.nur='E-MDPyEP/2014-01600'
            ORDER BY s.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-22 10:11:21 --- ERROR: Database_Exception [ 0 ]: [1242] Subquery returns more than 1 row ( SELECT s.id as id, s.padre,s.nur, s.derivado_por,s.derivado_a,s.nombre_emisor,s.nombre_receptor,s.cargo_emisor,s.cargo_receptor,s.de_oficina,s.a_oficina,s.fecha_emision,s.fecha_recepcion,
s.adjuntos, s.archivos, c.accion,e.id as id_estado,e.estado,s.oficial,s.hijo,s.proveido, s.observacion 
, IF(e.id=10,(SELECT carpetas.carpeta FROM archivados, carpetas WHERE archivados.nur=s.nur AND archivados.id_user=s.derivado_a AND archivados.id_carpeta=carpetas.id),'') as carpeta 
            FROM seguimiento s
            INNER JOIN acciones c ON s.accion=c.id
            INNER JOIN estados e ON s.estado=e.id
            WHERE s.nur='E-MDPyEP/2014-01600'
            ORDER BY s.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-22 10:11:21 --- ERROR: Database_Exception [ 0 ]: [1242] Subquery returns more than 1 row ( SELECT s.id as id, s.padre,s.nur, s.derivado_por,s.derivado_a,s.nombre_emisor,s.nombre_receptor,s.cargo_emisor,s.cargo_receptor,s.de_oficina,s.a_oficina,s.fecha_emision,s.fecha_recepcion,
s.adjuntos, s.archivos, c.accion,e.id as id_estado,e.estado,s.oficial,s.hijo,s.proveido, s.observacion 
, IF(e.id=10,(SELECT carpetas.carpeta FROM archivados, carpetas WHERE archivados.nur=s.nur AND archivados.id_user=s.derivado_a AND archivados.id_carpeta=carpetas.id),'') as carpeta 
            FROM seguimiento s
            INNER JOIN acciones c ON s.accion=c.id
            INNER JOIN estados e ON s.estado=e.id
            WHERE s.nur='E-MDPyEP/2014-01600'
            ORDER BY s.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-22 10:11:38 --- ERROR: Database_Exception [ 0 ]: [1242] Subquery returns more than 1 row ( SELECT s.id as id, s.padre,s.nur, s.derivado_por,s.derivado_a,s.nombre_emisor,s.nombre_receptor,s.cargo_emisor,s.cargo_receptor,s.de_oficina,s.a_oficina,s.fecha_emision,s.fecha_recepcion,
s.adjuntos, s.archivos, c.accion,e.id as id_estado,e.estado,s.oficial,s.hijo,s.proveido, s.observacion 
, IF(e.id=10,(SELECT carpetas.carpeta FROM archivados, carpetas WHERE archivados.nur=s.nur AND archivados.id_user=s.derivado_a AND archivados.id_carpeta=carpetas.id),'') as carpeta 
            FROM seguimiento s
            INNER JOIN acciones c ON s.accion=c.id
            INNER JOIN estados e ON s.estado=e.id
            WHERE s.nur='E-MDPyEP/2014-01600'
            ORDER BY s.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-22 10:11:38 --- ERROR: Database_Exception [ 0 ]: [1242] Subquery returns more than 1 row ( SELECT s.id as id, s.padre,s.nur, s.derivado_por,s.derivado_a,s.nombre_emisor,s.nombre_receptor,s.cargo_emisor,s.cargo_receptor,s.de_oficina,s.a_oficina,s.fecha_emision,s.fecha_recepcion,
s.adjuntos, s.archivos, c.accion,e.id as id_estado,e.estado,s.oficial,s.hijo,s.proveido, s.observacion 
, IF(e.id=10,(SELECT carpetas.carpeta FROM archivados, carpetas WHERE archivados.nur=s.nur AND archivados.id_user=s.derivado_a AND archivados.id_carpeta=carpetas.id),'') as carpeta 
            FROM seguimiento s
            INNER JOIN acciones c ON s.accion=c.id
            INNER JOIN estados e ON s.estado=e.id
            WHERE s.nur='E-MDPyEP/2014-01600'
            ORDER BY s.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-22 11:11:14 --- ERROR: Database_Exception [ 0 ]: [1242] Subquery returns more than 1 row ( SELECT s.id as id, s.padre,s.nur, s.derivado_por,s.derivado_a,s.nombre_emisor,s.nombre_receptor,s.cargo_emisor,s.cargo_receptor,s.de_oficina,s.a_oficina,s.fecha_emision,s.fecha_recepcion,
s.adjuntos, s.archivos, c.accion,e.id as id_estado,e.estado,s.oficial,s.hijo,s.proveido, s.observacion 
, IF(e.id=10,(SELECT carpetas.carpeta FROM archivados, carpetas WHERE archivados.nur=s.nur AND archivados.id_user=s.derivado_a AND archivados.id_carpeta=carpetas.id),'') as carpeta 
            FROM seguimiento s
            INNER JOIN acciones c ON s.accion=c.id
            INNER JOIN estados e ON s.estado=e.id
            WHERE s.nur='E-MDPyEP/2014-01600'
            ORDER BY s.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-22 11:54:50 --- ERROR: Database_Exception [ 0 ]: [1242] Subquery returns more than 1 row ( SELECT s.id as id, s.padre,s.nur, s.derivado_por,s.derivado_a,s.nombre_emisor,s.nombre_receptor,s.cargo_emisor,s.cargo_receptor,s.de_oficina,s.a_oficina,s.fecha_emision,s.fecha_recepcion,
s.adjuntos, s.archivos, c.accion,e.id as id_estado,e.estado,s.oficial,s.hijo,s.proveido, s.observacion 
, IF(e.id=10,(SELECT carpetas.carpeta FROM archivados, carpetas WHERE archivados.nur=s.nur AND archivados.id_user=s.derivado_a AND archivados.id_carpeta=carpetas.id),'') as carpeta 
            FROM seguimiento s
            INNER JOIN acciones c ON s.accion=c.id
            INNER JOIN estados e ON s.estado=e.id
            WHERE s.nur='MDPyEP/2014-02171'
            ORDER BY s.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-22 11:56:46 --- ERROR: Database_Exception [ 0 ]: [1242] Subquery returns more than 1 row ( SELECT s.id as id, s.padre,s.nur, s.derivado_por,s.derivado_a,s.nombre_emisor,s.nombre_receptor,s.cargo_emisor,s.cargo_receptor,s.de_oficina,s.a_oficina,s.fecha_emision,s.fecha_recepcion,
s.adjuntos, s.archivos, c.accion,e.id as id_estado,e.estado,s.oficial,s.hijo,s.proveido, s.observacion 
, IF(e.id=10,(SELECT carpetas.carpeta FROM archivados, carpetas WHERE archivados.nur=s.nur AND archivados.id_user=s.derivado_a AND archivados.id_carpeta=carpetas.id),'') as carpeta 
            FROM seguimiento s
            INNER JOIN acciones c ON s.accion=c.id
            INNER JOIN estados e ON s.estado=e.id
            WHERE s.nur='MDPyEP/2014-02171'
            ORDER BY s.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-22 12:25:51 --- ERROR: Database_Exception [ 0 ]: [1242] Subquery returns more than 1 row ( SELECT s.id as id, s.padre,s.nur, s.derivado_por,s.derivado_a,s.nombre_emisor,s.nombre_receptor,s.cargo_emisor,s.cargo_receptor,s.de_oficina,s.a_oficina,s.fecha_emision,s.fecha_recepcion,
s.adjuntos, s.archivos, c.accion,e.id as id_estado,e.estado,s.oficial,s.hijo,s.proveido, s.observacion 
, IF(e.id=10,(SELECT carpetas.carpeta FROM archivados, carpetas WHERE archivados.nur=s.nur AND archivados.id_user=s.derivado_a AND archivados.id_carpeta=carpetas.id),'') as carpeta 
            FROM seguimiento s
            INNER JOIN acciones c ON s.accion=c.id
            INNER JOIN estados e ON s.estado=e.id
            WHERE s.nur='E-MDPyEP/2014-01575'
            ORDER BY s.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-22 12:25:58 --- ERROR: Database_Exception [ 0 ]: [1242] Subquery returns more than 1 row ( SELECT s.id as id, s.padre,s.nur, s.derivado_por,s.derivado_a,s.nombre_emisor,s.nombre_receptor,s.cargo_emisor,s.cargo_receptor,s.de_oficina,s.a_oficina,s.fecha_emision,s.fecha_recepcion,
s.adjuntos, s.archivos, c.accion,e.id as id_estado,e.estado,s.oficial,s.hijo,s.proveido, s.observacion 
, IF(e.id=10,(SELECT carpetas.carpeta FROM archivados, carpetas WHERE archivados.nur=s.nur AND archivados.id_user=s.derivado_a AND archivados.id_carpeta=carpetas.id),'') as carpeta 
            FROM seguimiento s
            INNER JOIN acciones c ON s.accion=c.id
            INNER JOIN estados e ON s.estado=e.id
            WHERE s.nur='E-MDPyEP/2014-01575'
            ORDER BY s.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-22 14:17:56 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-22 14:24:30 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-22 14:46:34 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-22 15:09:13 --- ERROR: Database_Exception [ 0 ]: [1242] Subquery returns more than 1 row ( SELECT s.id as id, s.padre,s.nur, s.derivado_por,s.derivado_a,s.nombre_emisor,s.nombre_receptor,s.cargo_emisor,s.cargo_receptor,s.de_oficina,s.a_oficina,s.fecha_emision,s.fecha_recepcion,
s.adjuntos, s.archivos, c.accion,e.id as id_estado,e.estado,s.oficial,s.hijo,s.proveido, s.observacion 
, IF(e.id=10,(SELECT carpetas.carpeta FROM archivados, carpetas WHERE archivados.nur=s.nur AND archivados.id_user=s.derivado_a AND archivados.id_carpeta=carpetas.id),'') as carpeta 
            FROM seguimiento s
            INNER JOIN acciones c ON s.accion=c.id
            INNER JOIN estados e ON s.estado=e.id
            WHERE s.nur='E-MDPyEP/2014-01600'
            ORDER BY s.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-22 15:09:27 --- ERROR: Database_Exception [ 0 ]: [1242] Subquery returns more than 1 row ( SELECT s.id as id, s.padre,s.nur, s.derivado_por,s.derivado_a,s.nombre_emisor,s.nombre_receptor,s.cargo_emisor,s.cargo_receptor,s.de_oficina,s.a_oficina,s.fecha_emision,s.fecha_recepcion,
s.adjuntos, s.archivos, c.accion,e.id as id_estado,e.estado,s.oficial,s.hijo,s.proveido, s.observacion 
, IF(e.id=10,(SELECT carpetas.carpeta FROM archivados, carpetas WHERE archivados.nur=s.nur AND archivados.id_user=s.derivado_a AND archivados.id_carpeta=carpetas.id),'') as carpeta 
            FROM seguimiento s
            INNER JOIN acciones c ON s.accion=c.id
            INNER JOIN estados e ON s.estado=e.id
            WHERE s.nur='E-MDPyEP/2014-01600'
            ORDER BY s.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-22 15:09:42 --- ERROR: Database_Exception [ 0 ]: [1242] Subquery returns more than 1 row ( SELECT s.id as id, s.padre,s.nur, s.derivado_por,s.derivado_a,s.nombre_emisor,s.nombre_receptor,s.cargo_emisor,s.cargo_receptor,s.de_oficina,s.a_oficina,s.fecha_emision,s.fecha_recepcion,
s.adjuntos, s.archivos, c.accion,e.id as id_estado,e.estado,s.oficial,s.hijo,s.proveido, s.observacion 
, IF(e.id=10,(SELECT carpetas.carpeta FROM archivados, carpetas WHERE archivados.nur=s.nur AND archivados.id_user=s.derivado_a AND archivados.id_carpeta=carpetas.id),'') as carpeta 
            FROM seguimiento s
            INNER JOIN acciones c ON s.accion=c.id
            INNER JOIN estados e ON s.estado=e.id
            WHERE s.nur='E-MDPyEP/2014-01600'
            ORDER BY s.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-22 15:16:00 --- ERROR: Database_Exception [ 0 ]: [1242] Subquery returns more than 1 row ( SELECT s.id as id, s.padre,s.nur, s.derivado_por,s.derivado_a,s.nombre_emisor,s.nombre_receptor,s.cargo_emisor,s.cargo_receptor,s.de_oficina,s.a_oficina,s.fecha_emision,s.fecha_recepcion,
s.adjuntos, s.archivos, c.accion,e.id as id_estado,e.estado,s.oficial,s.hijo,s.proveido, s.observacion 
, IF(e.id=10,(SELECT carpetas.carpeta FROM archivados, carpetas WHERE archivados.nur=s.nur AND archivados.id_user=s.derivado_a AND archivados.id_carpeta=carpetas.id),'') as carpeta 
            FROM seguimiento s
            INNER JOIN acciones c ON s.accion=c.id
            INNER JOIN estados e ON s.estado=e.id
            WHERE s.nur='E-MDPyEP/2014-01600'
            ORDER BY s.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-22 15:16:09 --- ERROR: Database_Exception [ 0 ]: [1242] Subquery returns more than 1 row ( SELECT s.id as id, s.padre,s.nur, s.derivado_por,s.derivado_a,s.nombre_emisor,s.nombre_receptor,s.cargo_emisor,s.cargo_receptor,s.de_oficina,s.a_oficina,s.fecha_emision,s.fecha_recepcion,
s.adjuntos, s.archivos, c.accion,e.id as id_estado,e.estado,s.oficial,s.hijo,s.proveido, s.observacion 
, IF(e.id=10,(SELECT carpetas.carpeta FROM archivados, carpetas WHERE archivados.nur=s.nur AND archivados.id_user=s.derivado_a AND archivados.id_carpeta=carpetas.id),'') as carpeta 
            FROM seguimiento s
            INNER JOIN acciones c ON s.accion=c.id
            INNER JOIN estados e ON s.estado=e.id
            WHERE s.nur='E-MDPyEP/2014-01600'
            ORDER BY s.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-22 15:18:22 --- ERROR: Database_Exception [ 0 ]: [1242] Subquery returns more than 1 row ( SELECT s.id as id, s.padre,s.nur, s.derivado_por,s.derivado_a,s.nombre_emisor,s.nombre_receptor,s.cargo_emisor,s.cargo_receptor,s.de_oficina,s.a_oficina,s.fecha_emision,s.fecha_recepcion,
s.adjuntos, s.archivos, c.accion,e.id as id_estado,e.estado,s.oficial,s.hijo,s.proveido, s.observacion 
, IF(e.id=10,(SELECT carpetas.carpeta FROM archivados, carpetas WHERE archivados.nur=s.nur AND archivados.id_user=s.derivado_a AND archivados.id_carpeta=carpetas.id),'') as carpeta 
            FROM seguimiento s
            INNER JOIN acciones c ON s.accion=c.id
            INNER JOIN estados e ON s.estado=e.id
            WHERE s.nur='E-MDPyEP/2014-01600'
            ORDER BY s.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-22 15:20:05 --- ERROR: Database_Exception [ 0 ]: [1242] Subquery returns more than 1 row ( SELECT s.id as id, s.padre,s.nur, s.derivado_por,s.derivado_a,s.nombre_emisor,s.nombre_receptor,s.cargo_emisor,s.cargo_receptor,s.de_oficina,s.a_oficina,s.fecha_emision,s.fecha_recepcion,
s.adjuntos, s.archivos, c.accion,e.id as id_estado,e.estado,s.oficial,s.hijo,s.proveido, s.observacion 
, IF(e.id=10,(SELECT carpetas.carpeta FROM archivados, carpetas WHERE archivados.nur=s.nur AND archivados.id_user=s.derivado_a AND archivados.id_carpeta=carpetas.id),'') as carpeta 
            FROM seguimiento s
            INNER JOIN acciones c ON s.accion=c.id
            INNER JOIN estados e ON s.estado=e.id
            WHERE s.nur='E-MDPyEP/2014-01600'
            ORDER BY s.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-22 15:20:52 --- ERROR: Database_Exception [ 0 ]: [1242] Subquery returns more than 1 row ( SELECT s.id as id, s.padre,s.nur, s.derivado_por,s.derivado_a,s.nombre_emisor,s.nombre_receptor,s.cargo_emisor,s.cargo_receptor,s.de_oficina,s.a_oficina,s.fecha_emision,s.fecha_recepcion,
s.adjuntos, s.archivos, c.accion,e.id as id_estado,e.estado,s.oficial,s.hijo,s.proveido, s.observacion 
, IF(e.id=10,(SELECT carpetas.carpeta FROM archivados, carpetas WHERE archivados.nur=s.nur AND archivados.id_user=s.derivado_a AND archivados.id_carpeta=carpetas.id),'') as carpeta 
            FROM seguimiento s
            INNER JOIN acciones c ON s.accion=c.id
            INNER JOIN estados e ON s.estado=e.id
            WHERE s.nur='E-MDPyEP/2014-01600'
            ORDER BY s.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-22 15:22:30 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-22 15:23:43 --- ERROR: Database_Exception [ 0 ]: [1242] Subquery returns more than 1 row ( SELECT s.id as id, s.padre,s.nur, s.derivado_por,s.derivado_a,s.nombre_emisor,s.nombre_receptor,s.cargo_emisor,s.cargo_receptor,s.de_oficina,s.a_oficina,s.fecha_emision,s.fecha_recepcion,
s.adjuntos, s.archivos, c.accion,e.id as id_estado,e.estado,s.oficial,s.hijo,s.proveido, s.observacion 
, IF(e.id=10,(SELECT carpetas.carpeta FROM archivados, carpetas WHERE archivados.nur=s.nur AND archivados.id_user=s.derivado_a AND archivados.id_carpeta=carpetas.id),'') as carpeta 
            FROM seguimiento s
            INNER JOIN acciones c ON s.accion=c.id
            INNER JOIN estados e ON s.estado=e.id
            WHERE s.nur='E-MDPyEP/2014-01600'
            ORDER BY s.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-22 15:27:00 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-22 15:27:32 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-22 15:30:01 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-22 16:01:51 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-22 16:12:47 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-22 16:13:18 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-22 16:39:55 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-22 17:22:12 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-22 18:59:24 --- ERROR: ErrorException [ 8 ]: Undefined index: aceptar ~ APPPATH/classes/controller/hojaruta.php [ 71 ]
2014-04-22 19:50:15 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]