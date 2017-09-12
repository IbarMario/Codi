<?php defined('SYSPATH') or die('No direct script access.'); ?>

2014-04-16 08:37:43 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-16 08:45:50 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-16 09:17:27 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-16 09:18:06 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-16 09:20:04 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-16 09:20:19 --- ERROR: Database_Exception [ 0 ]: [1242] Subquery returns more than 1 row ( SELECT s.id as id, s.padre,s.nur, s.derivado_por,s.derivado_a,s.nombre_emisor,s.nombre_receptor,s.cargo_emisor,s.cargo_receptor,s.de_oficina,s.a_oficina,s.fecha_emision,s.fecha_recepcion,
s.adjuntos, s.archivos, c.accion,e.id as id_estado,e.estado,s.oficial,s.hijo,s.proveido, s.observacion 
, IF(e.id=10,(SELECT carpetas.carpeta FROM archivados, carpetas WHERE archivados.nur=s.nur AND archivados.id_user=s.derivado_a AND archivados.id_carpeta=carpetas.id),'') as carpeta 
            FROM seguimiento s
            INNER JOIN acciones c ON s.accion=c.id
            INNER JOIN estados e ON s.estado=e.id
            WHERE s.nur='E-PRB/2014-01195'
            ORDER BY s.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-16 09:21:28 --- ERROR: Database_Exception [ 0 ]: [1242] Subquery returns more than 1 row ( SELECT s.id as id, s.padre,s.nur, s.derivado_por,s.derivado_a,s.nombre_emisor,s.nombre_receptor,s.cargo_emisor,s.cargo_receptor,s.de_oficina,s.a_oficina,s.fecha_emision,s.fecha_recepcion,
s.adjuntos, s.archivos, c.accion,e.id as id_estado,e.estado,s.oficial,s.hijo,s.proveido, s.observacion 
, IF(e.id=10,(SELECT carpetas.carpeta FROM archivados, carpetas WHERE archivados.nur=s.nur AND archivados.id_user=s.derivado_a AND archivados.id_carpeta=carpetas.id),'') as carpeta 
            FROM seguimiento s
            INNER JOIN acciones c ON s.accion=c.id
            INNER JOIN estados e ON s.estado=e.id
            WHERE s.nur='E-PRB/2014-01195'
            ORDER BY s.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-16 09:22:10 --- ERROR: Database_Exception [ 0 ]: [1242] Subquery returns more than 1 row ( SELECT s.id as id, s.padre,s.nur, s.derivado_por,s.derivado_a,s.nombre_emisor,s.nombre_receptor,s.cargo_emisor,s.cargo_receptor,s.de_oficina,s.a_oficina,s.fecha_emision,s.fecha_recepcion,
s.adjuntos, s.archivos, c.accion,e.id as id_estado,e.estado,s.oficial,s.hijo,s.proveido, s.observacion 
, IF(e.id=10,(SELECT carpetas.carpeta FROM archivados, carpetas WHERE archivados.nur=s.nur AND archivados.id_user=s.derivado_a AND archivados.id_carpeta=carpetas.id),'') as carpeta 
            FROM seguimiento s
            INNER JOIN acciones c ON s.accion=c.id
            INNER JOIN estados e ON s.estado=e.id
            WHERE s.nur='E-PRB/2014-01195'
            ORDER BY s.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-16 09:22:46 --- ERROR: Database_Exception [ 0 ]: [1242] Subquery returns more than 1 row ( SELECT s.id as id, s.padre,s.nur, s.derivado_por,s.derivado_a,s.nombre_emisor,s.nombre_receptor,s.cargo_emisor,s.cargo_receptor,s.de_oficina,s.a_oficina,s.fecha_emision,s.fecha_recepcion,
s.adjuntos, s.archivos, c.accion,e.id as id_estado,e.estado,s.oficial,s.hijo,s.proveido, s.observacion 
, IF(e.id=10,(SELECT carpetas.carpeta FROM archivados, carpetas WHERE archivados.nur=s.nur AND archivados.id_user=s.derivado_a AND archivados.id_carpeta=carpetas.id),'') as carpeta 
            FROM seguimiento s
            INNER JOIN acciones c ON s.accion=c.id
            INNER JOIN estados e ON s.estado=e.id
            WHERE s.nur='E-PRB/2014-01195'
            ORDER BY s.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-16 09:23:49 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-16 09:25:16 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-16 10:21:04 --- ERROR: Database_Exception [ 0 ]: [1242] Subquery returns more than 1 row ( SELECT s.id as id, s.padre,s.nur, s.derivado_por,s.derivado_a,s.nombre_emisor,s.nombre_receptor,s.cargo_emisor,s.cargo_receptor,s.de_oficina,s.a_oficina,s.fecha_emision,s.fecha_recepcion,
s.adjuntos, s.archivos, c.accion,e.id as id_estado,e.estado,s.oficial,s.hijo,s.proveido, s.observacion 
, IF(e.id=10,(SELECT carpetas.carpeta FROM archivados, carpetas WHERE archivados.nur=s.nur AND archivados.id_user=s.derivado_a AND archivados.id_carpeta=carpetas.id),'') as carpeta 
            FROM seguimiento s
            INNER JOIN acciones c ON s.accion=c.id
            INNER JOIN estados e ON s.estado=e.id
            WHERE s.nur='E-PRB/2014-01195'
            ORDER BY s.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-16 10:21:24 --- ERROR: Database_Exception [ 0 ]: [1242] Subquery returns more than 1 row ( SELECT s.id as id, s.padre,s.nur, s.derivado_por,s.derivado_a,s.nombre_emisor,s.nombre_receptor,s.cargo_emisor,s.cargo_receptor,s.de_oficina,s.a_oficina,s.fecha_emision,s.fecha_recepcion,
s.adjuntos, s.archivos, c.accion,e.id as id_estado,e.estado,s.oficial,s.hijo,s.proveido, s.observacion 
, IF(e.id=10,(SELECT carpetas.carpeta FROM archivados, carpetas WHERE archivados.nur=s.nur AND archivados.id_user=s.derivado_a AND archivados.id_carpeta=carpetas.id),'') as carpeta 
            FROM seguimiento s
            INNER JOIN acciones c ON s.accion=c.id
            INNER JOIN estados e ON s.estado=e.id
            WHERE s.nur='E-PRB/2014-01195'
            ORDER BY s.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-16 10:21:44 --- ERROR: Database_Exception [ 0 ]: [1242] Subquery returns more than 1 row ( SELECT s.id as id, s.padre,s.nur, s.derivado_por,s.derivado_a,s.nombre_emisor,s.nombre_receptor,s.cargo_emisor,s.cargo_receptor,s.de_oficina,s.a_oficina,s.fecha_emision,s.fecha_recepcion,
s.adjuntos, s.archivos, c.accion,e.id as id_estado,e.estado,s.oficial,s.hijo,s.proveido, s.observacion 
, IF(e.id=10,(SELECT carpetas.carpeta FROM archivados, carpetas WHERE archivados.nur=s.nur AND archivados.id_user=s.derivado_a AND archivados.id_carpeta=carpetas.id),'') as carpeta 
            FROM seguimiento s
            INNER JOIN acciones c ON s.accion=c.id
            INNER JOIN estados e ON s.estado=e.id
            WHERE s.nur='E-PRB/2014-01195'
            ORDER BY s.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-16 10:21:45 --- ERROR: Database_Exception [ 0 ]: [1242] Subquery returns more than 1 row ( SELECT s.id as id, s.padre,s.nur, s.derivado_por,s.derivado_a,s.nombre_emisor,s.nombre_receptor,s.cargo_emisor,s.cargo_receptor,s.de_oficina,s.a_oficina,s.fecha_emision,s.fecha_recepcion,
s.adjuntos, s.archivos, c.accion,e.id as id_estado,e.estado,s.oficial,s.hijo,s.proveido, s.observacion 
, IF(e.id=10,(SELECT carpetas.carpeta FROM archivados, carpetas WHERE archivados.nur=s.nur AND archivados.id_user=s.derivado_a AND archivados.id_carpeta=carpetas.id),'') as carpeta 
            FROM seguimiento s
            INNER JOIN acciones c ON s.accion=c.id
            INNER JOIN estados e ON s.estado=e.id
            WHERE s.nur='E-PRB/2014-01195'
            ORDER BY s.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-16 11:40:12 --- ERROR: Database_Exception [ 0 ]: [1242] Subquery returns more than 1 row ( SELECT s.id as id, s.padre,s.nur, s.derivado_por,s.derivado_a,s.nombre_emisor,s.nombre_receptor,s.cargo_emisor,s.cargo_receptor,s.de_oficina,s.a_oficina,s.fecha_emision,s.fecha_recepcion,
s.adjuntos, s.archivos, c.accion,e.id as id_estado,e.estado,s.oficial,s.hijo,s.proveido, s.observacion 
, IF(e.id=10,(SELECT carpetas.carpeta FROM archivados, carpetas WHERE archivados.nur=s.nur AND archivados.id_user=s.derivado_a AND archivados.id_carpeta=carpetas.id),'') as carpeta 
            FROM seguimiento s
            INNER JOIN acciones c ON s.accion=c.id
            INNER JOIN estados e ON s.estado=e.id
            WHERE s.nur='E-MDPyEP/2014-01967'
            ORDER BY s.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-16 11:40:16 --- ERROR: Database_Exception [ 0 ]: [1242] Subquery returns more than 1 row ( SELECT s.id as id, s.padre,s.nur, s.derivado_por,s.derivado_a,s.nombre_emisor,s.nombre_receptor,s.cargo_emisor,s.cargo_receptor,s.de_oficina,s.a_oficina,s.fecha_emision,s.fecha_recepcion,
s.adjuntos, s.archivos, c.accion,e.id as id_estado,e.estado,s.oficial,s.hijo,s.proveido, s.observacion 
, IF(e.id=10,(SELECT carpetas.carpeta FROM archivados, carpetas WHERE archivados.nur=s.nur AND archivados.id_user=s.derivado_a AND archivados.id_carpeta=carpetas.id),'') as carpeta 
            FROM seguimiento s
            INNER JOIN acciones c ON s.accion=c.id
            INNER JOIN estados e ON s.estado=e.id
            WHERE s.nur='E-MDPyEP/2014-01967'
            ORDER BY s.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-16 11:40:23 --- ERROR: Database_Exception [ 0 ]: [1242] Subquery returns more than 1 row ( SELECT s.id as id, s.padre,s.nur, s.derivado_por,s.derivado_a,s.nombre_emisor,s.nombre_receptor,s.cargo_emisor,s.cargo_receptor,s.de_oficina,s.a_oficina,s.fecha_emision,s.fecha_recepcion,
s.adjuntos, s.archivos, c.accion,e.id as id_estado,e.estado,s.oficial,s.hijo,s.proveido, s.observacion 
, IF(e.id=10,(SELECT carpetas.carpeta FROM archivados, carpetas WHERE archivados.nur=s.nur AND archivados.id_user=s.derivado_a AND archivados.id_carpeta=carpetas.id),'') as carpeta 
            FROM seguimiento s
            INNER JOIN acciones c ON s.accion=c.id
            INNER JOIN estados e ON s.estado=e.id
            WHERE s.nur='E-MDPyEP/2014-01967'
            ORDER BY s.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-16 11:40:28 --- ERROR: Database_Exception [ 0 ]: [1242] Subquery returns more than 1 row ( SELECT s.id as id, s.padre,s.nur, s.derivado_por,s.derivado_a,s.nombre_emisor,s.nombre_receptor,s.cargo_emisor,s.cargo_receptor,s.de_oficina,s.a_oficina,s.fecha_emision,s.fecha_recepcion,
s.adjuntos, s.archivos, c.accion,e.id as id_estado,e.estado,s.oficial,s.hijo,s.proveido, s.observacion 
, IF(e.id=10,(SELECT carpetas.carpeta FROM archivados, carpetas WHERE archivados.nur=s.nur AND archivados.id_user=s.derivado_a AND archivados.id_carpeta=carpetas.id),'') as carpeta 
            FROM seguimiento s
            INNER JOIN acciones c ON s.accion=c.id
            INNER JOIN estados e ON s.estado=e.id
            WHERE s.nur='E-MDPyEP/2014-01967'
            ORDER BY s.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-16 11:40:40 --- ERROR: Database_Exception [ 0 ]: [1242] Subquery returns more than 1 row ( SELECT s.id as id, s.padre,s.nur, s.derivado_por,s.derivado_a,s.nombre_emisor,s.nombre_receptor,s.cargo_emisor,s.cargo_receptor,s.de_oficina,s.a_oficina,s.fecha_emision,s.fecha_recepcion,
s.adjuntos, s.archivos, c.accion,e.id as id_estado,e.estado,s.oficial,s.hijo,s.proveido, s.observacion 
, IF(e.id=10,(SELECT carpetas.carpeta FROM archivados, carpetas WHERE archivados.nur=s.nur AND archivados.id_user=s.derivado_a AND archivados.id_carpeta=carpetas.id),'') as carpeta 
            FROM seguimiento s
            INNER JOIN acciones c ON s.accion=c.id
            INNER JOIN estados e ON s.estado=e.id
            WHERE s.nur='E-MDPyEP/2014-01967'
            ORDER BY s.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-16 11:40:50 --- ERROR: Database_Exception [ 0 ]: [1242] Subquery returns more than 1 row ( SELECT s.id as id, s.padre,s.nur, s.derivado_por,s.derivado_a,s.nombre_emisor,s.nombre_receptor,s.cargo_emisor,s.cargo_receptor,s.de_oficina,s.a_oficina,s.fecha_emision,s.fecha_recepcion,
s.adjuntos, s.archivos, c.accion,e.id as id_estado,e.estado,s.oficial,s.hijo,s.proveido, s.observacion 
, IF(e.id=10,(SELECT carpetas.carpeta FROM archivados, carpetas WHERE archivados.nur=s.nur AND archivados.id_user=s.derivado_a AND archivados.id_carpeta=carpetas.id),'') as carpeta 
            FROM seguimiento s
            INNER JOIN acciones c ON s.accion=c.id
            INNER JOIN estados e ON s.estado=e.id
            WHERE s.nur='E-MDPyEP/2014-01967'
            ORDER BY s.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-16 12:06:56 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-16 12:07:12 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-16 14:43:21 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-16 14:46:29 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-16 14:48:14 --- ERROR: Kohana_Exception [ 0 ]: The partida property does not exist in the Model_Poas class ~ MODPATH/orm/classes/kohana/orm.php [ 682 ]
2014-04-16 14:49:14 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-16 15:14:43 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-16 15:57:33 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-16 15:59:12 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-16 16:07:21 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-16 16:08:34 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-16 16:08:55 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-16 16:57:18 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-16 17:24:18 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-16 17:27:13 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-16 18:21:11 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-04-16 19:11:32 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]