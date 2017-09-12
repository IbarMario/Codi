<?php defined('SYSPATH') or die('No direct script access.'); ?>

2014-01-29 09:35:13 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-01-29 10:09:01 --- ERROR: Database_Exception [ 0 ]: [1317] Query execution was interrupted ( SELECT s.id, s.padre,s.hijo,s.id_seguimiento,s.nur, s.nombre_emisor,s.cargo_emisor,s.de_oficina,s.fecha_emision as fecha,s.fecha_recepcion as fecha2, c.accion, s.oficial, s.hijo, s.proveido,s.adjuntos,s.archivos
             , d.codigo, d.nombre_destinatario, d.cargo_destinatario, p.proceso,d.referencia,d.id as id_doc,s.prioridad
              FROM seguimiento s
              INNER JOIN documentos d ON s.nur=d.nur
              INNER JOIN acciones c ON s.accion=c.id      
              INNER JOIN procesos p ON p.id=d.id_proceso
              WHERE s.estado='1'
              AND s.derivado_a='277'
              AND d.original='1'
              ORDER BY s.fecha_emision DESC ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-01-29 10:09:02 --- ERROR: Database_Exception [ 0 ]: [1317] Query execution was interrupted ( SELECT s.id, s.padre,s.hijo,s.id_seguimiento,s.nur, s.nombre_emisor,s.cargo_emisor,s.de_oficina,s.fecha_emision as fecha,s.fecha_recepcion as fecha2, c.accion, s.oficial, s.hijo, s.proveido,s.adjuntos,s.archivos
             , d.codigo, d.nombre_destinatario, d.cargo_destinatario, p.proceso,d.referencia,d.id as id_doc,s.prioridad
              FROM seguimiento s
              INNER JOIN documentos d ON s.nur=d.nur
              INNER JOIN acciones c ON s.accion=c.id      
              INNER JOIN procesos p ON p.id=d.id_proceso
              WHERE s.estado='1'
              AND s.derivado_a='307'
              AND d.original='1'
              ORDER BY s.fecha_emision DESC ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-01-29 10:09:02 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-01-29 10:09:02 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-01-29 10:09:02 --- ERROR: Database_Exception [ 0 ]: [1317] Query execution was interrupted ( SELECT s.id, s.padre,s.hijo,s.id_seguimiento,s.nur, s.nombre_emisor,s.cargo_emisor,s.de_oficina,s.fecha_emision as fecha,s.fecha_recepcion as fecha2, c.accion, s.oficial, s.hijo, s.proveido,s.adjuntos,s.archivos
             , d.codigo, d.nombre_destinatario, d.cargo_destinatario, p.proceso,d.referencia,d.id as id_doc,s.prioridad,d.fucov
              FROM seguimiento s
              INNER JOIN documentos d ON s.nur=d.nur
              INNER JOIN acciones c ON s.accion=c.id      
              INNER JOIN procesos p ON p.id=d.id_proceso
              WHERE s.estado=2
              AND s.derivado_a='313'
              AND d.original='1'
              ORDER BY s.fecha_recepcion DESC ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-01-29 10:09:02 --- ERROR: Database_Exception [ 0 ]: [1317] Query execution was interrupted ( SELECT s.id, s.padre,s.hijo,s.id_seguimiento,s.nur, s.nombre_emisor,s.cargo_emisor,s.de_oficina,s.fecha_emision as fecha,s.fecha_recepcion as fecha2, c.accion, s.oficial, s.hijo, s.proveido,s.adjuntos,s.archivos
             , d.codigo, d.nombre_destinatario, d.cargo_destinatario, p.proceso,d.referencia,d.id as id_doc,s.prioridad,d.fucov
              FROM seguimiento s
              INNER JOIN documentos d ON s.nur=d.nur
              INNER JOIN acciones c ON s.accion=c.id      
              INNER JOIN procesos p ON p.id=d.id_proceso
              WHERE s.estado=2
              AND s.derivado_a='498'
              AND d.original='1'
              ORDER BY s.fecha_recepcion DESC ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-01-29 10:09:02 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-01-29 10:09:02 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-01-29 10:09:02 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-01-29 10:09:07 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-01-29 10:09:07 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-01-29 10:09:13 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-01-29 10:09:14 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-01-29 10:09:17 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-01-29 10:09:22 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-01-29 10:09:23 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-01-29 10:09:25 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-01-29 10:09:59 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 113 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-01-29 10:09:59 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 113 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-01-29 10:10:02 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 113 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-01-29 10:10:02 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 113 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-01-29 10:55:33 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-01-29 14:42:36 --- ERROR: ErrorException [ 8 ]: Undefined index: aceptar ~ APPPATH/classes/controller/hojaruta.php [ 71 ]
2014-01-29 14:59:19 --- ERROR: ErrorException [ 8 ]: Undefined index: aceptar ~ APPPATH/classes/controller/hojaruta.php [ 71 ]
2014-01-29 15:11:40 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-01-29 15:31:08 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-01-29 15:31:23 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-01-29 15:56:19 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-01-29 16:30:51 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-01-29 16:31:26 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-01-29 16:39:26 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-01-29 16:46:52 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-01-29 17:05:55 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-01-29 17:30:35 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-01-29 17:32:37 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-01-29 17:36:29 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-01-29 17:43:49 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND estado=1' at line 1 ( SELECT monto,moneda FROM pvcategoriatipos WHERE id_categoria=1 AND id_tipoviaje= AND estado=1 ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-01-29 17:43:56 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND estado=1' at line 1 ( SELECT monto,moneda FROM pvcategoriatipos WHERE id_categoria=2 AND id_tipoviaje= AND estado=1 ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-01-29 19:06:12 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-01-29 19:12:32 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-01-29 19:15:34 --- ERROR: Database_Exception [ 0 ]: [1062] Duplicate entry '' for key 2 ( INSERT INTO `documentos` (`nombre_destinatario`, `cargo_destinatario`, `institucion_destinatario`, `nombre_remitente`, `cargo_remitente`, `mosca_remitente`, `referencia`, `contenido`, `adjuntos`, `copias`, `nombre_via`, `cargo_via`, `titulo`, `id_proceso`, `fucov`) VALUES ('GUILLERMO ANTONIO CALVETTI BERNAL', 'JEFE DE LA UNIDAD DE COMPLEJOS PRODUCTIVOS', '', 'RICHARD EDWIN CADENA BELZU', 'TECNICO EN SEGUIMIENTO A LA  AGRICULTURA', 'RCB', 'REUNION CON EL SECTOR CAÑERO', '', '', '', '', '', '', '1', 0) ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-01-29 19:15:49 --- ERROR: Database_Exception [ 0 ]: [1062] Duplicate entry '' for key 2 ( INSERT INTO `documentos` (`nombre_destinatario`, `cargo_destinatario`, `institucion_destinatario`, `nombre_remitente`, `cargo_remitente`, `mosca_remitente`, `referencia`, `contenido`, `adjuntos`, `copias`, `nombre_via`, `cargo_via`, `titulo`, `id_proceso`, `fucov`) VALUES ('GUILLERMO ANTONIO CALVETTI BERNAL', 'JEFE DE LA UNIDAD DE COMPLEJOS PRODUCTIVOS', '', 'RICHARD EDWIN CADENA BELZU', 'TECNICO EN SEGUIMIENTO A LA  AGRICULTURA', 'RCB', 'REUNION CON EL SECTOR CAÑERO', '', '', '', '', '', '', '1', 0) ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-01-29 19:16:20 --- ERROR: Database_Exception [ 0 ]: [1062] Duplicate entry '' for key 2 ( INSERT INTO `documentos` (`nombre_destinatario`, `cargo_destinatario`, `institucion_destinatario`, `nombre_remitente`, `cargo_remitente`, `mosca_remitente`, `referencia`, `contenido`, `adjuntos`, `copias`, `nombre_via`, `cargo_via`, `titulo`, `id_proceso`, `fucov`) VALUES ('GUILLERMO ANTONIO CALVETTI BERNAL', 'JEFE DE LA UNIDAD DE COMPLEJOS PRODUCTIVOS', '', 'RICHARD EDWIN CADENA BELZU', 'TECNICO EN SEGUIMIENTO A LA  AGRICULTURA', 'RCB', 'REUNION CON EL SECTOR CAÑERO', '', '', '', '', '', '', '1', 0) ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-01-29 19:47:47 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-01-29 19:53:01 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]