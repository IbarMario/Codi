<?php defined('SYSPATH') or die('No direct script access.'); ?>

2014-04-17 08:05:39 --- ERROR: Database_Exception [ 0 ]: [1242] Subquery returns more than 1 row ( SELECT s.id as id, s.padre,s.nur, s.derivado_por,s.derivado_a,s.nombre_emisor,s.nombre_receptor,s.cargo_emisor,s.cargo_receptor,s.de_oficina,s.a_oficina,s.fecha_emision,s.fecha_recepcion,
s.adjuntos, s.archivos, c.accion,e.id as id_estado,e.estado,s.oficial,s.hijo,s.proveido, s.observacion 
, IF(e.id=10,(SELECT carpetas.carpeta FROM archivados, carpetas WHERE archivados.nur=s.nur AND archivados.id_user=s.derivado_a AND archivados.id_carpeta=carpetas.id),'') as carpeta 
            FROM seguimiento s
            INNER JOIN acciones c ON s.accion=c.id
            INNER JOIN estados e ON s.estado=e.id
            WHERE s.nur='MDPyEP/2014-02504'
            ORDER BY s.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-17 08:05:52 --- ERROR: Database_Exception [ 0 ]: [1242] Subquery returns more than 1 row ( SELECT s.id as id, s.padre,s.nur, s.derivado_por,s.derivado_a,s.nombre_emisor,s.nombre_receptor,s.cargo_emisor,s.cargo_receptor,s.de_oficina,s.a_oficina,s.fecha_emision,s.fecha_recepcion,
s.adjuntos, s.archivos, c.accion,e.id as id_estado,e.estado,s.oficial,s.hijo,s.proveido, s.observacion 
, IF(e.id=10,(SELECT carpetas.carpeta FROM archivados, carpetas WHERE archivados.nur=s.nur AND archivados.id_user=s.derivado_a AND archivados.id_carpeta=carpetas.id),'') as carpeta 
            FROM seguimiento s
            INNER JOIN acciones c ON s.accion=c.id
            INNER JOIN estados e ON s.estado=e.id
            WHERE s.nur='MDPyEP/2014-02504'
            ORDER BY s.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-17 08:06:17 --- ERROR: Database_Exception [ 0 ]: [1242] Subquery returns more than 1 row ( SELECT s.id as id, s.padre,s.nur, s.derivado_por,s.derivado_a,s.nombre_emisor,s.nombre_receptor,s.cargo_emisor,s.cargo_receptor,s.de_oficina,s.a_oficina,s.fecha_emision,s.fecha_recepcion,
s.adjuntos, s.archivos, c.accion,e.id as id_estado,e.estado,s.oficial,s.hijo,s.proveido, s.observacion 
, IF(e.id=10,(SELECT carpetas.carpeta FROM archivados, carpetas WHERE archivados.nur=s.nur AND archivados.id_user=s.derivado_a AND archivados.id_carpeta=carpetas.id),'') as carpeta 
            FROM seguimiento s
            INNER JOIN acciones c ON s.accion=c.id
            INNER JOIN estados e ON s.estado=e.id
            WHERE s.nur='MDPyEP/2014-02504'
            ORDER BY s.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-17 08:46:34 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-17 08:57:43 --- ERROR: Database_Exception [ 0 ]: [1242] Subquery returns more than 1 row ( SELECT s.id as id, s.padre,s.nur, s.derivado_por,s.derivado_a,s.nombre_emisor,s.nombre_receptor,s.cargo_emisor,s.cargo_receptor,s.de_oficina,s.a_oficina,s.fecha_emision,s.fecha_recepcion,
s.adjuntos, s.archivos, c.accion,e.id as id_estado,e.estado,s.oficial,s.hijo,s.proveido, s.observacion 
, IF(e.id=10,(SELECT carpetas.carpeta FROM archivados, carpetas WHERE archivados.nur=s.nur AND archivados.id_user=s.derivado_a AND archivados.id_carpeta=carpetas.id),'') as carpeta 
            FROM seguimiento s
            INNER JOIN acciones c ON s.accion=c.id
            INNER JOIN estados e ON s.estado=e.id
            WHERE s.nur='PRB/2014-00138'
            ORDER BY s.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-17 08:58:39 --- ERROR: Database_Exception [ 0 ]: [1242] Subquery returns more than 1 row ( SELECT s.id as id, s.padre,s.nur, s.derivado_por,s.derivado_a,s.nombre_emisor,s.nombre_receptor,s.cargo_emisor,s.cargo_receptor,s.de_oficina,s.a_oficina,s.fecha_emision,s.fecha_recepcion,
s.adjuntos, s.archivos, c.accion,e.id as id_estado,e.estado,s.oficial,s.hijo,s.proveido, s.observacion 
, IF(e.id=10,(SELECT carpetas.carpeta FROM archivados, carpetas WHERE archivados.nur=s.nur AND archivados.id_user=s.derivado_a AND archivados.id_carpeta=carpetas.id),'') as carpeta 
            FROM seguimiento s
            INNER JOIN acciones c ON s.accion=c.id
            INNER JOIN estados e ON s.estado=e.id
            WHERE s.nur='PRB/2014-00138'
            ORDER BY s.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-17 08:59:07 --- ERROR: Database_Exception [ 0 ]: [1242] Subquery returns more than 1 row ( SELECT s.id as id, s.padre,s.nur, s.derivado_por,s.derivado_a,s.nombre_emisor,s.nombre_receptor,s.cargo_emisor,s.cargo_receptor,s.de_oficina,s.a_oficina,s.fecha_emision,s.fecha_recepcion,
s.adjuntos, s.archivos, c.accion,e.id as id_estado,e.estado,s.oficial,s.hijo,s.proveido, s.observacion 
, IF(e.id=10,(SELECT carpetas.carpeta FROM archivados, carpetas WHERE archivados.nur=s.nur AND archivados.id_user=s.derivado_a AND archivados.id_carpeta=carpetas.id),'') as carpeta 
            FROM seguimiento s
            INNER JOIN acciones c ON s.accion=c.id
            INNER JOIN estados e ON s.estado=e.id
            WHERE s.nur='PRB/2014-00138'
            ORDER BY s.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-17 08:59:14 --- ERROR: Database_Exception [ 0 ]: [1242] Subquery returns more than 1 row ( SELECT s.id as id, s.padre,s.nur, s.derivado_por,s.derivado_a,s.nombre_emisor,s.nombre_receptor,s.cargo_emisor,s.cargo_receptor,s.de_oficina,s.a_oficina,s.fecha_emision,s.fecha_recepcion,
s.adjuntos, s.archivos, c.accion,e.id as id_estado,e.estado,s.oficial,s.hijo,s.proveido, s.observacion 
, IF(e.id=10,(SELECT carpetas.carpeta FROM archivados, carpetas WHERE archivados.nur=s.nur AND archivados.id_user=s.derivado_a AND archivados.id_carpeta=carpetas.id),'') as carpeta 
            FROM seguimiento s
            INNER JOIN acciones c ON s.accion=c.id
            INNER JOIN estados e ON s.estado=e.id
            WHERE s.nur='PRB/2014-00138'
            ORDER BY s.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-17 09:04:39 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-17 09:06:55 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-17 09:10:17 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-17 09:37:10 --- ERROR: Database_Exception [ 0 ]: [1242] Subquery returns more than 1 row ( SELECT s.id as id, s.padre,s.nur, s.derivado_por,s.derivado_a,s.nombre_emisor,s.nombre_receptor,s.cargo_emisor,s.cargo_receptor,s.de_oficina,s.a_oficina,s.fecha_emision,s.fecha_recepcion,
s.adjuntos, s.archivos, c.accion,e.id as id_estado,e.estado,s.oficial,s.hijo,s.proveido, s.observacion 
, IF(e.id=10,(SELECT carpetas.carpeta FROM archivados, carpetas WHERE archivados.nur=s.nur AND archivados.id_user=s.derivado_a AND archivados.id_carpeta=carpetas.id),'') as carpeta 
            FROM seguimiento s
            INNER JOIN acciones c ON s.accion=c.id
            INNER JOIN estados e ON s.estado=e.id
            WHERE s.nur='E-MDPyEP/2014-00435'
            ORDER BY s.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-17 09:37:17 --- ERROR: Database_Exception [ 0 ]: [1242] Subquery returns more than 1 row ( SELECT s.id as id, s.padre,s.nur, s.derivado_por,s.derivado_a,s.nombre_emisor,s.nombre_receptor,s.cargo_emisor,s.cargo_receptor,s.de_oficina,s.a_oficina,s.fecha_emision,s.fecha_recepcion,
s.adjuntos, s.archivos, c.accion,e.id as id_estado,e.estado,s.oficial,s.hijo,s.proveido, s.observacion 
, IF(e.id=10,(SELECT carpetas.carpeta FROM archivados, carpetas WHERE archivados.nur=s.nur AND archivados.id_user=s.derivado_a AND archivados.id_carpeta=carpetas.id),'') as carpeta 
            FROM seguimiento s
            INNER JOIN acciones c ON s.accion=c.id
            INNER JOIN estados e ON s.estado=e.id
            WHERE s.nur='E-MDPyEP/2014-00435'
            ORDER BY s.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-17 09:37:27 --- ERROR: Database_Exception [ 0 ]: [1242] Subquery returns more than 1 row ( SELECT s.id as id, s.padre,s.nur, s.derivado_por,s.derivado_a,s.nombre_emisor,s.nombre_receptor,s.cargo_emisor,s.cargo_receptor,s.de_oficina,s.a_oficina,s.fecha_emision,s.fecha_recepcion,
s.adjuntos, s.archivos, c.accion,e.id as id_estado,e.estado,s.oficial,s.hijo,s.proveido, s.observacion 
, IF(e.id=10,(SELECT carpetas.carpeta FROM archivados, carpetas WHERE archivados.nur=s.nur AND archivados.id_user=s.derivado_a AND archivados.id_carpeta=carpetas.id),'') as carpeta 
            FROM seguimiento s
            INNER JOIN acciones c ON s.accion=c.id
            INNER JOIN estados e ON s.estado=e.id
            WHERE s.nur='PRB/2014-00138'
            ORDER BY s.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-17 10:08:37 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-17 10:11:43 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-17 10:40:16 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-17 10:42:37 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-17 10:44:31 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-17 10:51:25 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-17 11:12:18 --- ERROR: ErrorException [ 8 ]: Undefined index: aceptar ~ APPPATH/classes/controller/hojaruta.php [ 71 ]
2014-04-17 12:12:51 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-17 15:06:21 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]