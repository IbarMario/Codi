<?php defined('SYSPATH') or die('No direct script access.'); ?>

2014-04-21 07:22:22 --- ERROR: Database_Exception [ 0 ]: [1242] Subquery returns more than 1 row ( SELECT s.id as id, s.padre,s.nur, s.derivado_por,s.derivado_a,s.nombre_emisor,s.nombre_receptor,s.cargo_emisor,s.cargo_receptor,s.de_oficina,s.a_oficina,s.fecha_emision,s.fecha_recepcion,
s.adjuntos, s.archivos, c.accion,e.id as id_estado,e.estado,s.oficial,s.hijo,s.proveido, s.observacion 
, IF(e.id=10,(SELECT carpetas.carpeta FROM archivados, carpetas WHERE archivados.nur=s.nur AND archivados.id_user=s.derivado_a AND archivados.id_carpeta=carpetas.id),'') as carpeta 
            FROM seguimiento s
            INNER JOIN acciones c ON s.accion=c.id
            INNER JOIN estados e ON s.estado=e.id
            WHERE s.nur='PRB/2014-00608'
            ORDER BY s.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-21 09:08:40 --- ERROR: Database_Exception [ 0 ]: [1242] Subquery returns more than 1 row ( SELECT s.id as id, s.padre,s.nur, s.derivado_por,s.derivado_a,s.nombre_emisor,s.nombre_receptor,s.cargo_emisor,s.cargo_receptor,s.de_oficina,s.a_oficina,s.fecha_emision,s.fecha_recepcion,
s.adjuntos, s.archivos, c.accion,e.id as id_estado,e.estado,s.oficial,s.hijo,s.proveido, s.observacion 
, IF(e.id=10,(SELECT carpetas.carpeta FROM archivados, carpetas WHERE archivados.nur=s.nur AND archivados.id_user=s.derivado_a AND archivados.id_carpeta=carpetas.id),'') as carpeta 
            FROM seguimiento s
            INNER JOIN acciones c ON s.accion=c.id
            INNER JOIN estados e ON s.estado=e.id
            WHERE s.nur='E-MDPyEP/2014-01967'
            ORDER BY s.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-21 09:08:44 --- ERROR: Database_Exception [ 0 ]: [1242] Subquery returns more than 1 row ( SELECT s.id as id, s.padre,s.nur, s.derivado_por,s.derivado_a,s.nombre_emisor,s.nombre_receptor,s.cargo_emisor,s.cargo_receptor,s.de_oficina,s.a_oficina,s.fecha_emision,s.fecha_recepcion,
s.adjuntos, s.archivos, c.accion,e.id as id_estado,e.estado,s.oficial,s.hijo,s.proveido, s.observacion 
, IF(e.id=10,(SELECT carpetas.carpeta FROM archivados, carpetas WHERE archivados.nur=s.nur AND archivados.id_user=s.derivado_a AND archivados.id_carpeta=carpetas.id),'') as carpeta 
            FROM seguimiento s
            INNER JOIN acciones c ON s.accion=c.id
            INNER JOIN estados e ON s.estado=e.id
            WHERE s.nur='E-MDPyEP/2014-01967'
            ORDER BY s.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-21 10:04:52 --- ERROR: Database_Exception [ 0 ]: [1242] Subquery returns more than 1 row ( SELECT s.id as id, s.padre,s.nur, s.derivado_por,s.derivado_a,s.nombre_emisor,s.nombre_receptor,s.cargo_emisor,s.cargo_receptor,s.de_oficina,s.a_oficina,s.fecha_emision,s.fecha_recepcion,
s.adjuntos, s.archivos, c.accion,e.id as id_estado,e.estado,s.oficial,s.hijo,s.proveido, s.observacion 
, IF(e.id=10,(SELECT carpetas.carpeta FROM archivados, carpetas WHERE archivados.nur=s.nur AND archivados.id_user=s.derivado_a AND archivados.id_carpeta=carpetas.id),'') as carpeta 
            FROM seguimiento s
            INNER JOIN acciones c ON s.accion=c.id
            INNER JOIN estados e ON s.estado=e.id
            WHERE s.nur='E-MDPyEP/2014-02085'
            ORDER BY s.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-21 10:05:10 --- ERROR: Database_Exception [ 0 ]: [1242] Subquery returns more than 1 row ( SELECT s.id as id, s.padre,s.nur, s.derivado_por,s.derivado_a,s.nombre_emisor,s.nombre_receptor,s.cargo_emisor,s.cargo_receptor,s.de_oficina,s.a_oficina,s.fecha_emision,s.fecha_recepcion,
s.adjuntos, s.archivos, c.accion,e.id as id_estado,e.estado,s.oficial,s.hijo,s.proveido, s.observacion 
, IF(e.id=10,(SELECT carpetas.carpeta FROM archivados, carpetas WHERE archivados.nur=s.nur AND archivados.id_user=s.derivado_a AND archivados.id_carpeta=carpetas.id),'') as carpeta 
            FROM seguimiento s
            INNER JOIN acciones c ON s.accion=c.id
            INNER JOIN estados e ON s.estado=e.id
            WHERE s.nur='E-MDPyEP/2014-02085'
            ORDER BY s.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-21 10:40:00 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-21 11:21:00 --- ERROR: ErrorException [ 8 ]: Undefined index: aceptar ~ APPPATH/classes/controller/hojaruta.php [ 71 ]
2014-04-21 15:30:11 --- ERROR: Database_Exception [ 0 ]: [1242] Subquery returns more than 1 row ( SELECT s.id as id, s.padre,s.nur, s.derivado_por,s.derivado_a,s.nombre_emisor,s.nombre_receptor,s.cargo_emisor,s.cargo_receptor,s.de_oficina,s.a_oficina,s.fecha_emision,s.fecha_recepcion,
s.adjuntos, s.archivos, c.accion,e.id as id_estado,e.estado,s.oficial,s.hijo,s.proveido, s.observacion 
, IF(e.id=10,(SELECT carpetas.carpeta FROM archivados, carpetas WHERE archivados.nur=s.nur AND archivados.id_user=s.derivado_a AND archivados.id_carpeta=carpetas.id),'') as carpeta 
            FROM seguimiento s
            INNER JOIN acciones c ON s.accion=c.id
            INNER JOIN estados e ON s.estado=e.id
            WHERE s.nur='PRB/2014-00557'
            ORDER BY s.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-21 15:54:22 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-21 15:55:34 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-21 15:55:56 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-21 16:02:41 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-21 16:05:22 --- ERROR: ErrorException [ 8 ]: Undefined index: aceptar ~ APPPATH/classes/controller/hojaruta.php [ 71 ]
2014-04-21 16:18:49 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-21 16:19:30 --- ERROR: Database_Exception [ 0 ]: [1242] Subquery returns more than 1 row ( SELECT s.id as id, s.padre,s.nur, s.derivado_por,s.derivado_a,s.nombre_emisor,s.nombre_receptor,s.cargo_emisor,s.cargo_receptor,s.de_oficina,s.a_oficina,s.fecha_emision,s.fecha_recepcion,
s.adjuntos, s.archivos, c.accion,e.id as id_estado,e.estado,s.oficial,s.hijo,s.proveido, s.observacion 
, IF(e.id=10,(SELECT carpetas.carpeta FROM archivados, carpetas WHERE archivados.nur=s.nur AND archivados.id_user=s.derivado_a AND archivados.id_carpeta=carpetas.id),'') as carpeta 
            FROM seguimiento s
            INNER JOIN acciones c ON s.accion=c.id
            INNER JOIN estados e ON s.estado=e.id
            WHERE s.nur='E-MDPyEP/2014-01600'
            ORDER BY s.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-21 17:00:08 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-21 17:56:47 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-21 17:58:23 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-21 17:59:21 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-21 18:27:20 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-21 18:35:46 --- ERROR: Database_Exception [ 0 ]: [1242] Subquery returns more than 1 row ( SELECT s.id as id, s.padre,s.nur, s.derivado_por,s.derivado_a,s.nombre_emisor,s.nombre_receptor,s.cargo_emisor,s.cargo_receptor,s.de_oficina,s.a_oficina,s.fecha_emision,s.fecha_recepcion,
s.adjuntos, s.archivos, c.accion,e.id as id_estado,e.estado,s.oficial,s.hijo,s.proveido, s.observacion 
, IF(e.id=10,(SELECT carpetas.carpeta FROM archivados, carpetas WHERE archivados.nur=s.nur AND archivados.id_user=s.derivado_a AND archivados.id_carpeta=carpetas.id),'') as carpeta 
            FROM seguimiento s
            INNER JOIN acciones c ON s.accion=c.id
            INNER JOIN estados e ON s.estado=e.id
            WHERE s.nur='E-MDPyEP/2014-01600'
            ORDER BY s.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-21 18:35:53 --- ERROR: Database_Exception [ 0 ]: [1242] Subquery returns more than 1 row ( SELECT s.id as id, s.padre,s.nur, s.derivado_por,s.derivado_a,s.nombre_emisor,s.nombre_receptor,s.cargo_emisor,s.cargo_receptor,s.de_oficina,s.a_oficina,s.fecha_emision,s.fecha_recepcion,
s.adjuntos, s.archivos, c.accion,e.id as id_estado,e.estado,s.oficial,s.hijo,s.proveido, s.observacion 
, IF(e.id=10,(SELECT carpetas.carpeta FROM archivados, carpetas WHERE archivados.nur=s.nur AND archivados.id_user=s.derivado_a AND archivados.id_carpeta=carpetas.id),'') as carpeta 
            FROM seguimiento s
            INNER JOIN acciones c ON s.accion=c.id
            INNER JOIN estados e ON s.estado=e.id
            WHERE s.nur='E-MDPyEP/2014-01600'
            ORDER BY s.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-21 18:35:59 --- ERROR: Database_Exception [ 0 ]: [1242] Subquery returns more than 1 row ( SELECT s.id as id, s.padre,s.nur, s.derivado_por,s.derivado_a,s.nombre_emisor,s.nombre_receptor,s.cargo_emisor,s.cargo_receptor,s.de_oficina,s.a_oficina,s.fecha_emision,s.fecha_recepcion,
s.adjuntos, s.archivos, c.accion,e.id as id_estado,e.estado,s.oficial,s.hijo,s.proveido, s.observacion 
, IF(e.id=10,(SELECT carpetas.carpeta FROM archivados, carpetas WHERE archivados.nur=s.nur AND archivados.id_user=s.derivado_a AND archivados.id_carpeta=carpetas.id),'') as carpeta 
            FROM seguimiento s
            INNER JOIN acciones c ON s.accion=c.id
            INNER JOIN estados e ON s.estado=e.id
            WHERE s.nur='E-MDPyEP/2014-01600'
            ORDER BY s.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-21 18:36:03 --- ERROR: Database_Exception [ 0 ]: [1242] Subquery returns more than 1 row ( SELECT s.id as id, s.padre,s.nur, s.derivado_por,s.derivado_a,s.nombre_emisor,s.nombre_receptor,s.cargo_emisor,s.cargo_receptor,s.de_oficina,s.a_oficina,s.fecha_emision,s.fecha_recepcion,
s.adjuntos, s.archivos, c.accion,e.id as id_estado,e.estado,s.oficial,s.hijo,s.proveido, s.observacion 
, IF(e.id=10,(SELECT carpetas.carpeta FROM archivados, carpetas WHERE archivados.nur=s.nur AND archivados.id_user=s.derivado_a AND archivados.id_carpeta=carpetas.id),'') as carpeta 
            FROM seguimiento s
            INNER JOIN acciones c ON s.accion=c.id
            INNER JOIN estados e ON s.estado=e.id
            WHERE s.nur='E-MDPyEP/2014-01600'
            ORDER BY s.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-21 18:46:28 --- ERROR: Database_Exception [ 0 ]: [1242] Subquery returns more than 1 row ( SELECT s.id as id, s.padre,s.nur, s.derivado_por,s.derivado_a,s.nombre_emisor,s.nombre_receptor,s.cargo_emisor,s.cargo_receptor,s.de_oficina,s.a_oficina,s.fecha_emision,s.fecha_recepcion,
s.adjuntos, s.archivos, c.accion,e.id as id_estado,e.estado,s.oficial,s.hijo,s.proveido, s.observacion 
, IF(e.id=10,(SELECT carpetas.carpeta FROM archivados, carpetas WHERE archivados.nur=s.nur AND archivados.id_user=s.derivado_a AND archivados.id_carpeta=carpetas.id),'') as carpeta 
            FROM seguimiento s
            INNER JOIN acciones c ON s.accion=c.id
            INNER JOIN estados e ON s.estado=e.id
            WHERE s.nur='E-MDPyEP/2014-01600'
            ORDER BY s.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-21 18:46:38 --- ERROR: Database_Exception [ 0 ]: [1242] Subquery returns more than 1 row ( SELECT s.id as id, s.padre,s.nur, s.derivado_por,s.derivado_a,s.nombre_emisor,s.nombre_receptor,s.cargo_emisor,s.cargo_receptor,s.de_oficina,s.a_oficina,s.fecha_emision,s.fecha_recepcion,
s.adjuntos, s.archivos, c.accion,e.id as id_estado,e.estado,s.oficial,s.hijo,s.proveido, s.observacion 
, IF(e.id=10,(SELECT carpetas.carpeta FROM archivados, carpetas WHERE archivados.nur=s.nur AND archivados.id_user=s.derivado_a AND archivados.id_carpeta=carpetas.id),'') as carpeta 
            FROM seguimiento s
            INNER JOIN acciones c ON s.accion=c.id
            INNER JOIN estados e ON s.estado=e.id
            WHERE s.nur='E-MDPyEP/2014-01600'
            ORDER BY s.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-21 18:46:50 --- ERROR: Database_Exception [ 0 ]: [1242] Subquery returns more than 1 row ( SELECT s.id as id, s.padre,s.nur, s.derivado_por,s.derivado_a,s.nombre_emisor,s.nombre_receptor,s.cargo_emisor,s.cargo_receptor,s.de_oficina,s.a_oficina,s.fecha_emision,s.fecha_recepcion,
s.adjuntos, s.archivos, c.accion,e.id as id_estado,e.estado,s.oficial,s.hijo,s.proveido, s.observacion 
, IF(e.id=10,(SELECT carpetas.carpeta FROM archivados, carpetas WHERE archivados.nur=s.nur AND archivados.id_user=s.derivado_a AND archivados.id_carpeta=carpetas.id),'') as carpeta 
            FROM seguimiento s
            INNER JOIN acciones c ON s.accion=c.id
            INNER JOIN estados e ON s.estado=e.id
            WHERE s.nur='E-MDPyEP/2014-01600'
            ORDER BY s.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-21 18:49:02 --- ERROR: Database_Exception [ 0 ]: [1242] Subquery returns more than 1 row ( SELECT s.id as id, s.padre,s.nur, s.derivado_por,s.derivado_a,s.nombre_emisor,s.nombre_receptor,s.cargo_emisor,s.cargo_receptor,s.de_oficina,s.a_oficina,s.fecha_emision,s.fecha_recepcion,
s.adjuntos, s.archivos, c.accion,e.id as id_estado,e.estado,s.oficial,s.hijo,s.proveido, s.observacion 
, IF(e.id=10,(SELECT carpetas.carpeta FROM archivados, carpetas WHERE archivados.nur=s.nur AND archivados.id_user=s.derivado_a AND archivados.id_carpeta=carpetas.id),'') as carpeta 
            FROM seguimiento s
            INNER JOIN acciones c ON s.accion=c.id
            INNER JOIN estados e ON s.estado=e.id
            WHERE s.nur='E-MDPyEP/2014-01600'
            ORDER BY s.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-21 18:50:05 --- ERROR: Database_Exception [ 0 ]: [1242] Subquery returns more than 1 row ( SELECT s.id as id, s.padre,s.nur, s.derivado_por,s.derivado_a,s.nombre_emisor,s.nombre_receptor,s.cargo_emisor,s.cargo_receptor,s.de_oficina,s.a_oficina,s.fecha_emision,s.fecha_recepcion,
s.adjuntos, s.archivos, c.accion,e.id as id_estado,e.estado,s.oficial,s.hijo,s.proveido, s.observacion 
, IF(e.id=10,(SELECT carpetas.carpeta FROM archivados, carpetas WHERE archivados.nur=s.nur AND archivados.id_user=s.derivado_a AND archivados.id_carpeta=carpetas.id),'') as carpeta 
            FROM seguimiento s
            INNER JOIN acciones c ON s.accion=c.id
            INNER JOIN estados e ON s.estado=e.id
            WHERE s.nur='E-MDPyEP/2014-01600'
            ORDER BY s.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-21 18:50:16 --- ERROR: Database_Exception [ 0 ]: [1242] Subquery returns more than 1 row ( SELECT s.id as id, s.padre,s.nur, s.derivado_por,s.derivado_a,s.nombre_emisor,s.nombre_receptor,s.cargo_emisor,s.cargo_receptor,s.de_oficina,s.a_oficina,s.fecha_emision,s.fecha_recepcion,
s.adjuntos, s.archivos, c.accion,e.id as id_estado,e.estado,s.oficial,s.hijo,s.proveido, s.observacion 
, IF(e.id=10,(SELECT carpetas.carpeta FROM archivados, carpetas WHERE archivados.nur=s.nur AND archivados.id_user=s.derivado_a AND archivados.id_carpeta=carpetas.id),'') as carpeta 
            FROM seguimiento s
            INNER JOIN acciones c ON s.accion=c.id
            INNER JOIN estados e ON s.estado=e.id
            WHERE s.nur='E-MDPyEP/2014-01600'
            ORDER BY s.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-21 18:50:36 --- ERROR: Database_Exception [ 0 ]: [1242] Subquery returns more than 1 row ( SELECT s.id as id, s.padre,s.nur, s.derivado_por,s.derivado_a,s.nombre_emisor,s.nombre_receptor,s.cargo_emisor,s.cargo_receptor,s.de_oficina,s.a_oficina,s.fecha_emision,s.fecha_recepcion,
s.adjuntos, s.archivos, c.accion,e.id as id_estado,e.estado,s.oficial,s.hijo,s.proveido, s.observacion 
, IF(e.id=10,(SELECT carpetas.carpeta FROM archivados, carpetas WHERE archivados.nur=s.nur AND archivados.id_user=s.derivado_a AND archivados.id_carpeta=carpetas.id),'') as carpeta 
            FROM seguimiento s
            INNER JOIN acciones c ON s.accion=c.id
            INNER JOIN estados e ON s.estado=e.id
            WHERE s.nur='E-MDPyEP/2014-01600'
            ORDER BY s.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-21 18:51:12 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-21 18:52:46 --- ERROR: Database_Exception [ 0 ]: [1242] Subquery returns more than 1 row ( SELECT s.id as id, s.padre,s.nur, s.derivado_por,s.derivado_a,s.nombre_emisor,s.nombre_receptor,s.cargo_emisor,s.cargo_receptor,s.de_oficina,s.a_oficina,s.fecha_emision,s.fecha_recepcion,
s.adjuntos, s.archivos, c.accion,e.id as id_estado,e.estado,s.oficial,s.hijo,s.proveido, s.observacion 
, IF(e.id=10,(SELECT carpetas.carpeta FROM archivados, carpetas WHERE archivados.nur=s.nur AND archivados.id_user=s.derivado_a AND archivados.id_carpeta=carpetas.id),'') as carpeta 
            FROM seguimiento s
            INNER JOIN acciones c ON s.accion=c.id
            INNER JOIN estados e ON s.estado=e.id
            WHERE s.nur='E-MDPyEP/2014-01844'
            ORDER BY s.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]