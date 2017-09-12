<?php defined('SYSPATH') or die('No direct script access.'); ?>

2014-02-04 08:41:08 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-02-04 08:57:18 --- ERROR: ErrorException [ 8 ]: Undefined index: carpeta_lista ~ APPPATH/classes/controller/bandeja.php [ 180 ]
2014-02-04 09:12:20 --- ERROR: Database_Exception [ 0 ]: [1317] Query execution was interrupted ( SELECT s.id, s.padre,s.hijo,s.id_seguimiento,s.nur, s.nombre_emisor,s.cargo_emisor,s.de_oficina,s.fecha_emision as fecha,s.fecha_recepcion as fecha2, c.accion, s.oficial, s.hijo, s.proveido,s.adjuntos,s.archivos
             , d.codigo, d.nombre_destinatario, d.cargo_destinatario, p.proceso,d.referencia,d.id as id_doc,s.prioridad
              FROM seguimiento s
              INNER JOIN documentos d ON s.nur=d.nur
              INNER JOIN acciones c ON s.accion=c.id      
              INNER JOIN procesos p ON p.id=d.id_proceso
              WHERE s.estado='1'
              AND s.derivado_a='470'
              AND d.original='1'
              ORDER BY s.fecha_emision DESC ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-02-04 09:12:20 --- ERROR: Database_Exception [ 0 ]: [1317] Query execution was interrupted ( SELECT s.id, s.padre,s.hijo,s.id_seguimiento,s.nur, s.nombre_emisor,s.cargo_emisor,s.de_oficina,s.fecha_emision as fecha,s.fecha_recepcion as fecha2, c.accion, s.oficial, s.hijo, s.proveido,s.adjuntos,s.archivos
             , d.codigo, d.nombre_destinatario, d.cargo_destinatario, p.proceso,d.referencia,d.id as id_doc,s.prioridad
              FROM seguimiento s
              INNER JOIN documentos d ON s.nur=d.nur
              INNER JOIN acciones c ON s.accion=c.id      
              INNER JOIN procesos p ON p.id=d.id_proceso
              WHERE s.estado='1'
              AND s.derivado_a='236'
              AND d.original='1'
              ORDER BY s.fecha_emision DESC ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-02-04 09:12:20 --- ERROR: Database_Exception [ 0 ]: [1317] Query execution was interrupted ( SELECT s.id, s.padre,s.hijo,s.id_seguimiento,s.nur, s.nombre_emisor,s.cargo_emisor,s.de_oficina,s.fecha_emision as fecha,s.fecha_recepcion as fecha2, c.accion, s.oficial, s.hijo, s.proveido,s.adjuntos,s.archivos
             , d.codigo, d.nombre_destinatario, d.cargo_destinatario, p.proceso,d.referencia,d.id as id_doc,s.prioridad,d.fucov
              FROM seguimiento s
              INNER JOIN documentos d ON s.nur=d.nur
              INNER JOIN acciones c ON s.accion=c.id      
              INNER JOIN procesos p ON p.id=d.id_proceso
              WHERE s.estado=2
              AND s.derivado_a='354'
              AND d.original='1'
              ORDER BY s.fecha_recepcion DESC ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-02-04 09:12:20 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-02-04 09:12:20 --- ERROR: Database_Exception [ 0 ]: [1317] Query execution was interrupted ( SELECT s.id, s.padre,s.hijo,s.id_seguimiento,s.nur, s.nombre_emisor,s.cargo_emisor,s.de_oficina,s.fecha_emision as fecha,s.fecha_recepcion as fecha2, c.accion, s.oficial, s.hijo, s.proveido,s.adjuntos,s.archivos
             , d.codigo, d.nombre_destinatario, d.cargo_destinatario, p.proceso,d.referencia,d.id as id_doc,s.prioridad,d.fucov
              FROM seguimiento s
              INNER JOIN documentos d ON s.nur=d.nur
              INNER JOIN acciones c ON s.accion=c.id      
              INNER JOIN procesos p ON p.id=d.id_proceso
              WHERE s.estado=2
              AND s.derivado_a='218'
              AND d.original='1'
              ORDER BY s.fecha_recepcion DESC ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-02-04 09:12:21 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-02-04 09:12:24 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-02-04 09:12:27 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-02-04 09:12:35 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-02-04 09:12:42 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-02-04 09:12:43 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-02-04 09:13:17 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 113 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-02-04 09:13:17 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 113 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-02-04 09:13:21 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 113 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-02-04 09:13:21 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 113 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-02-04 09:13:21 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 113 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-02-04 09:13:26 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 113 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-02-04 09:13:26 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 113 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-02-04 09:13:26 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 113 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-02-04 09:13:27 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-02-04 09:13:28 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-02-04 09:13:29 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-02-04 09:28:06 --- ERROR: Database_Exception [ 0 ]: [1317] Query execution was interrupted ( SELECT s.id, s.padre,s.hijo,s.id_seguimiento,s.nur, s.nombre_emisor,s.cargo_emisor,s.de_oficina,s.fecha_emision as fecha,s.fecha_recepcion as fecha2, c.accion, s.oficial, s.hijo, s.proveido,s.adjuntos,s.archivos
             , d.codigo, d.nombre_destinatario, d.cargo_destinatario, p.proceso,d.referencia,d.id as id_doc,s.prioridad
              FROM seguimiento s
              INNER JOIN documentos d ON s.nur=d.nur
              INNER JOIN acciones c ON s.accion=c.id      
              INNER JOIN procesos p ON p.id=d.id_proceso
              WHERE s.estado='1'
              AND s.derivado_a='368'
              AND d.original='1'
              ORDER BY s.fecha_emision DESC ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-02-04 09:28:06 --- ERROR: Database_Exception [ 0 ]: [1317] Query execution was interrupted ( SELECT s.id, s.padre,s.hijo,s.id_seguimiento,s.nur, s.nombre_emisor,s.cargo_emisor,s.de_oficina,s.fecha_emision as fecha,s.fecha_recepcion as fecha2, c.accion, s.oficial, s.hijo, s.proveido,s.adjuntos,s.archivos
             , d.codigo, d.nombre_destinatario, d.cargo_destinatario, p.proceso,d.referencia,d.id as id_doc,s.prioridad
              FROM seguimiento s
              INNER JOIN documentos d ON s.nur=d.nur
              INNER JOIN acciones c ON s.accion=c.id      
              INNER JOIN procesos p ON p.id=d.id_proceso
              WHERE s.estado='1'
              AND s.derivado_a='473'
              AND d.original='1'
              ORDER BY s.fecha_emision DESC ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-02-04 09:28:06 --- ERROR: Database_Exception [ 0 ]: [1317] Query execution was interrupted ( SELECT s.id, s.padre,s.hijo,s.id_seguimiento,s.nur, s.nombre_emisor,s.cargo_emisor,s.de_oficina,s.fecha_emision as fecha,s.fecha_recepcion as fecha2, c.accion, s.oficial, s.hijo, s.proveido,s.adjuntos,s.archivos
             , d.codigo, d.nombre_destinatario, d.cargo_destinatario, p.proceso,d.referencia,d.id as id_doc,s.prioridad
              FROM seguimiento s
              INNER JOIN documentos d ON s.nur=d.nur
              INNER JOIN acciones c ON s.accion=c.id      
              INNER JOIN procesos p ON p.id=d.id_proceso
              WHERE s.estado='1'
              AND s.derivado_a='354'
              AND d.original='1'
              ORDER BY s.fecha_emision DESC ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-02-04 09:28:06 --- ERROR: ErrorException [ 2 ]: mysql_query(): Unable to save result set ~ MODPATH/database/classes/kohana/database/mysql.php [ 173 ]
2014-02-04 09:28:06 --- ERROR: Database_Exception [ 0 ]: [1317] Query execution was interrupted ( SELECT s.id, s.padre,s.hijo,s.id_seguimiento,s.nur, s.nombre_emisor,s.cargo_emisor,s.de_oficina,s.fecha_emision as fecha,s.fecha_recepcion as fecha2, c.accion, s.oficial, s.hijo, s.proveido,s.adjuntos,s.archivos
             , d.codigo, d.nombre_destinatario, d.cargo_destinatario, p.proceso,d.referencia,d.id as id_doc,s.prioridad,d.fucov
              FROM seguimiento s
              INNER JOIN documentos d ON s.nur=d.nur
              INNER JOIN acciones c ON s.accion=c.id      
              INNER JOIN procesos p ON p.id=d.id_proceso
              WHERE s.estado=2
              AND s.derivado_a='362'
              AND d.original='1'
              ORDER BY s.fecha_recepcion DESC ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-02-04 09:28:06 --- ERROR: Database_Exception [ 0 ]: [1317] Query execution was interrupted ( SELECT s.id, s.padre,s.hijo,s.id_seguimiento,s.nur, s.nombre_emisor,s.cargo_emisor,s.de_oficina,s.fecha_emision as fecha,s.fecha_recepcion as fecha2, c.accion, s.oficial, s.hijo, s.proveido,s.adjuntos,s.archivos
             , d.codigo, d.nombre_destinatario, d.cargo_destinatario, p.proceso,d.referencia,d.id as id_doc,s.prioridad
              FROM seguimiento s
              INNER JOIN documentos d ON s.nur=d.nur
              INNER JOIN acciones c ON s.accion=c.id      
              INNER JOIN procesos p ON p.id=d.id_proceso
              WHERE s.estado='1'
              AND s.derivado_a='259'
              AND d.original='1'
              ORDER BY s.fecha_emision DESC ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-02-04 09:28:07 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-02-04 09:28:07 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-02-04 09:28:07 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-02-04 09:28:07 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-02-04 09:28:10 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-02-04 09:28:10 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-02-04 09:28:13 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-02-04 09:28:14 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-02-04 09:28:23 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-02-04 09:28:24 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-02-04 09:28:25 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-02-04 09:28:28 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-02-04 09:29:00 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 113 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-02-04 09:29:00 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 113 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-02-04 09:29:00 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 113 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-02-04 09:29:03 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 113 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-02-04 09:29:03 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 113 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-02-04 09:29:11 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 113 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-02-04 09:29:13 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-02-04 09:38:43 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-02-04 09:40:16 --- ERROR: ErrorException [ 8 ]: Undefined index: carpeta_lista ~ APPPATH/classes/controller/bandeja.php [ 180 ]
2014-02-04 10:10:15 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-02-04 10:34:23 --- ERROR: Database_Exception [ 0 ]: [1317] Query execution was interrupted ( SELECT s.id, s.padre,s.hijo,s.id_seguimiento,s.nur, s.nombre_emisor,s.cargo_emisor,s.de_oficina,s.fecha_emision as fecha,s.fecha_recepcion as fecha2, c.accion, s.oficial, s.hijo, s.proveido,s.adjuntos,s.archivos
             , d.codigo, d.nombre_destinatario, d.cargo_destinatario, p.proceso,d.referencia,d.id as id_doc,s.prioridad,d.fucov
              FROM seguimiento s
              INNER JOIN documentos d ON s.nur=d.nur
              INNER JOIN acciones c ON s.accion=c.id      
              INNER JOIN procesos p ON p.id=d.id_proceso
              WHERE s.estado=2
              AND s.derivado_a='262'
              AND d.original='1'
              ORDER BY s.fecha_recepcion DESC ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-02-04 10:34:23 --- ERROR: Database_Exception [ 0 ]: [1317] Query execution was interrupted ( SELECT s.id, s.padre,s.hijo,s.id_seguimiento,s.nur, s.nombre_emisor,s.cargo_emisor,s.de_oficina,s.fecha_emision as fecha,s.fecha_recepcion as fecha2, c.accion, s.oficial, s.hijo, s.proveido,s.adjuntos,s.archivos
             , d.codigo, d.nombre_destinatario, d.cargo_destinatario, p.proceso,d.referencia,d.id as id_doc,s.prioridad
              FROM seguimiento s
              INNER JOIN documentos d ON s.nur=d.nur
              INNER JOIN acciones c ON s.accion=c.id      
              INNER JOIN procesos p ON p.id=d.id_proceso
              WHERE s.estado='1'
              AND s.derivado_a='329'
              AND d.original='1'
              ORDER BY s.fecha_emision DESC ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-02-04 10:34:23 --- ERROR: Database_Exception [ 0 ]: [1317] Query execution was interrupted ( SELECT s.id, s.padre,s.nur, s.nombre_receptor,s.cargo_receptor,s.a_oficina,s.fecha_emision as fecha, c.accion, s.oficial, s.hijo, s.proveido,s.adjuntos,s.archivos
             ,d.id as id_documento, d.codigo, d.cite_original, d.nombre_destinatario, d.cargo_destinatario, p.proceso,d.referencia
              FROM seguimiento s
              INNER JOIN documentos d ON s.nur=d.nur
              INNER JOIN acciones c ON s.accion=c.id      
              INNER JOIN procesos p ON p.id=d.id_proceso												
              WHERE s.estado=1
              AND s.derivado_por='218'
              AND d.original=1 
              ORDER BY s.fecha_emision DESC ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-02-04 10:34:23 --- ERROR: Database_Exception [ 0 ]: [1317] Query execution was interrupted ( SELECT s.id, s.padre,s.hijo,s.id_seguimiento,s.nur, s.nombre_emisor,s.cargo_emisor,s.de_oficina,s.fecha_emision as fecha,s.fecha_recepcion as fecha2, c.accion, s.oficial, s.hijo, s.proveido,s.adjuntos,s.archivos
             , d.codigo, d.nombre_destinatario, d.cargo_destinatario, p.proceso,d.referencia,d.id as id_doc,s.prioridad
              FROM seguimiento s
              INNER JOIN documentos d ON s.nur=d.nur
              INNER JOIN acciones c ON s.accion=c.id      
              INNER JOIN procesos p ON p.id=d.id_proceso
              WHERE s.estado='1'
              AND s.derivado_a='500'
              AND d.original='1'
              ORDER BY s.fecha_emision DESC ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-02-04 10:34:23 --- ERROR: Database_Exception [ 0 ]: [1317] Query execution was interrupted ( SELECT s.id, s.padre,s.nur, s.nombre_receptor,s.cargo_receptor,s.a_oficina,s.fecha_emision as fecha, c.accion, s.oficial, s.hijo, s.proveido,s.adjuntos,s.archivos
             ,d.id as id_documento, d.codigo, d.cite_original, d.nombre_destinatario, d.cargo_destinatario, p.proceso,d.referencia
              FROM seguimiento s
              INNER JOIN documentos d ON s.nur=d.nur
              INNER JOIN acciones c ON s.accion=c.id      
              INNER JOIN procesos p ON p.id=d.id_proceso												
              WHERE s.estado=1
              AND s.derivado_por='28'
              AND d.original=1 
              ORDER BY s.fecha_emision DESC ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-02-04 10:34:23 --- ERROR: Database_Exception [ 0 ]: [1317] Query execution was interrupted ( SELECT s.id, s.padre,s.hijo,s.id_seguimiento,s.nur, s.nombre_emisor,s.cargo_emisor,s.de_oficina,s.fecha_emision as fecha,s.fecha_recepcion as fecha2, c.accion, s.oficial, s.hijo, s.proveido,s.adjuntos,s.archivos
             , d.codigo, d.nombre_destinatario, d.cargo_destinatario, p.proceso,d.referencia,d.id as id_doc,s.prioridad
              FROM seguimiento s
              INNER JOIN documentos d ON s.nur=d.nur
              INNER JOIN acciones c ON s.accion=c.id      
              INNER JOIN procesos p ON p.id=d.id_proceso
              WHERE s.estado='1'
              AND s.derivado_a='22'
              AND d.original='1'
              ORDER BY s.fecha_emision DESC ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-02-04 10:34:23 --- ERROR: Database_Exception [ 0 ]: [1317] Query execution was interrupted ( SELECT s.id, s.padre,s.hijo,s.id_seguimiento,s.nur, s.nombre_emisor,s.cargo_emisor,s.de_oficina,s.fecha_emision as fecha,s.fecha_recepcion as fecha2, c.accion, s.oficial, s.hijo, s.proveido,s.adjuntos,s.archivos
             , d.codigo, d.nombre_destinatario, d.cargo_destinatario, p.proceso,d.referencia,d.id as id_doc,s.prioridad
              FROM seguimiento s
              INNER JOIN documentos d ON s.nur=d.nur
              INNER JOIN acciones c ON s.accion=c.id      
              INNER JOIN procesos p ON p.id=d.id_proceso
              WHERE s.estado='1'
              AND s.derivado_a='400'
              AND d.original='1'
              ORDER BY s.fecha_emision DESC ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-02-04 10:34:23 --- ERROR: Database_Exception [ 0 ]: [1317] Query execution was interrupted ( SELECT s.id, s.padre,s.hijo,s.id_seguimiento,s.nur, s.nombre_emisor,s.cargo_emisor,s.de_oficina,s.fecha_emision as fecha,s.fecha_recepcion as fecha2, c.accion, s.oficial, s.hijo, s.proveido,s.adjuntos,s.archivos
             , d.codigo, d.nombre_destinatario, d.cargo_destinatario, p.proceso,d.referencia,d.id as id_doc,s.prioridad
              FROM seguimiento s
              INNER JOIN documentos d ON s.nur=d.nur
              INNER JOIN acciones c ON s.accion=c.id      
              INNER JOIN procesos p ON p.id=d.id_proceso
              WHERE s.estado='1'
              AND s.derivado_a='362'
              AND d.original='1'
              ORDER BY s.fecha_emision DESC ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-02-04 10:34:23 --- ERROR: Database_Exception [ 0 ]: [1317] Query execution was interrupted ( SELECT s.id, s.padre,s.nur, s.nombre_receptor,s.cargo_receptor,s.a_oficina,s.fecha_emision as fecha, c.accion, s.oficial, s.hijo, s.proveido,s.adjuntos,s.archivos
             ,d.id as id_documento, d.codigo, d.cite_original, d.nombre_destinatario, d.cargo_destinatario, p.proceso,d.referencia
              FROM seguimiento s
              INNER JOIN documentos d ON s.nur=d.nur
              INNER JOIN acciones c ON s.accion=c.id      
              INNER JOIN procesos p ON p.id=d.id_proceso												
              WHERE s.estado=1
              AND s.derivado_por='218'
              AND d.original=1 
              ORDER BY s.fecha_emision DESC ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-02-04 10:34:23 --- ERROR: Database_Exception [ 0 ]: [1317] Query execution was interrupted ( SELECT s.id, s.padre,s.hijo,s.id_seguimiento,s.nur, s.nombre_emisor,s.cargo_emisor,s.de_oficina,s.fecha_emision as fecha,s.fecha_recepcion as fecha2, c.accion, s.oficial, s.hijo, s.proveido,s.adjuntos,s.archivos
             , d.codigo, d.nombre_destinatario, d.cargo_destinatario, p.proceso,d.referencia,d.id as id_doc,s.prioridad,d.fucov
              FROM seguimiento s
              INNER JOIN documentos d ON s.nur=d.nur
              INNER JOIN acciones c ON s.accion=c.id      
              INNER JOIN procesos p ON p.id=d.id_proceso
              WHERE s.estado=2
              AND s.derivado_a='259'
              AND d.original='1'
              ORDER BY s.fecha_recepcion DESC ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-02-04 10:34:23 --- ERROR: Database_Exception [ 0 ]: [1317] Query execution was interrupted ( SELECT s.id, s.padre,s.hijo,s.id_seguimiento,s.nur, s.nombre_emisor,s.cargo_emisor,s.de_oficina,s.fecha_emision as fecha,s.fecha_recepcion as fecha2, c.accion, s.oficial, s.hijo, s.proveido,s.adjuntos,s.archivos
             , d.codigo, d.nombre_destinatario, d.cargo_destinatario, p.proceso,d.referencia,d.id as id_doc,s.prioridad
              FROM seguimiento s
              INNER JOIN documentos d ON s.nur=d.nur
              INNER JOIN acciones c ON s.accion=c.id      
              INNER JOIN procesos p ON p.id=d.id_proceso
              WHERE s.estado='1'
              AND s.derivado_a='265'
              AND d.original='1'
              ORDER BY s.fecha_emision DESC ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-02-04 10:34:23 --- ERROR: ErrorException [ 2 ]: mysql_query(): Unable to save result set ~ MODPATH/database/classes/kohana/database/mysql.php [ 173 ]
2014-02-04 10:34:23 --- ERROR: Database_Exception [ 0 ]: [1317] Query execution was interrupted ( SELECT s.id, s.padre,s.nur, s.nombre_receptor,s.cargo_receptor,s.a_oficina,s.fecha_emision as fecha, c.accion, s.oficial, s.hijo, s.proveido,s.adjuntos,s.archivos
             ,d.id as id_documento, d.codigo, d.cite_original, d.nombre_destinatario, d.cargo_destinatario, p.proceso,d.referencia
              FROM seguimiento s
              INNER JOIN documentos d ON s.nur=d.nur
              INNER JOIN acciones c ON s.accion=c.id      
              INNER JOIN procesos p ON p.id=d.id_proceso												
              WHERE s.estado=1
              AND s.derivado_por='220'
              AND d.original=1 
              ORDER BY s.fecha_emision DESC ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-02-04 10:34:23 --- ERROR: Database_Exception [ 0 ]: [1317] Query execution was interrupted ( SELECT s.id, s.padre,s.hijo,s.id_seguimiento,s.nur, s.nombre_emisor,s.cargo_emisor,s.de_oficina,s.fecha_emision as fecha,s.fecha_recepcion as fecha2, c.accion, s.oficial, s.hijo, s.proveido,s.adjuntos,s.archivos
             , d.codigo, d.nombre_destinatario, d.cargo_destinatario, p.proceso,d.referencia,d.id as id_doc,s.prioridad,d.fucov
              FROM seguimiento s
              INNER JOIN documentos d ON s.nur=d.nur
              INNER JOIN acciones c ON s.accion=c.id      
              INNER JOIN procesos p ON p.id=d.id_proceso
              WHERE s.estado=2
              AND s.derivado_a='488'
              AND d.original='1'
              ORDER BY s.fecha_recepcion DESC ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-02-04 10:34:23 --- ERROR: Database_Exception [ 0 ]: [1317] Query execution was interrupted ( SELECT s.id, s.padre,s.hijo,s.id_seguimiento,s.nur, s.nombre_emisor,s.cargo_emisor,s.de_oficina,s.fecha_emision as fecha,s.fecha_recepcion as fecha2, c.accion, s.oficial, s.hijo, s.proveido,s.adjuntos,s.archivos
             , d.codigo, d.nombre_destinatario, d.cargo_destinatario, p.proceso,d.referencia,d.id as id_doc,s.prioridad
              FROM seguimiento s
              INNER JOIN documentos d ON s.nur=d.nur
              INNER JOIN acciones c ON s.accion=c.id      
              INNER JOIN procesos p ON p.id=d.id_proceso
              WHERE s.estado='1'
              AND s.derivado_a='408'
              AND d.original='1'
              ORDER BY s.fecha_emision DESC ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-02-04 10:34:23 --- ERROR: Database_Exception [ 0 ]: [1317] Query execution was interrupted ( SELECT s.id, s.padre,s.hijo,s.id_seguimiento,s.nur, s.nombre_emisor,s.cargo_emisor,s.de_oficina,s.fecha_emision as fecha,s.fecha_recepcion as fecha2, c.accion, s.oficial, s.hijo, s.proveido,s.adjuntos,s.archivos
             , d.codigo, d.nombre_destinatario, d.cargo_destinatario, p.proceso,d.referencia,d.id as id_doc,s.prioridad,d.fucov
              FROM seguimiento s
              INNER JOIN documentos d ON s.nur=d.nur
              INNER JOIN acciones c ON s.accion=c.id      
              INNER JOIN procesos p ON p.id=d.id_proceso
              WHERE s.estado=2
              AND s.derivado_a='226'
              AND d.original='1'
              ORDER BY s.fecha_recepcion DESC ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-02-04 10:34:23 --- ERROR: Database_Exception [ 0 ]: [1317] Query execution was interrupted ( SELECT s.id, s.padre,s.hijo,s.id_seguimiento,s.nur, s.nombre_emisor,s.cargo_emisor,s.de_oficina,s.fecha_emision as fecha,s.fecha_recepcion as fecha2, c.accion, s.oficial, s.hijo, s.proveido,s.adjuntos,s.archivos
             , d.codigo, d.nombre_destinatario, d.cargo_destinatario, p.proceso,d.referencia,d.id as id_doc,s.prioridad,d.fucov
              FROM seguimiento s
              INNER JOIN documentos d ON s.nur=d.nur
              INNER JOIN acciones c ON s.accion=c.id      
              INNER JOIN procesos p ON p.id=d.id_proceso
              WHERE s.estado=2
              AND s.derivado_a='497'
              AND d.original='1'
              ORDER BY s.fecha_recepcion DESC ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-02-04 10:34:23 --- ERROR: Database_Exception [ 0 ]: [1317] Query execution was interrupted ( SELECT s.id, s.padre,s.hijo,s.id_seguimiento,s.nur, s.nombre_emisor,s.cargo_emisor,s.de_oficina,s.fecha_emision as fecha,s.fecha_recepcion as fecha2, c.accion, s.oficial, s.hijo, s.proveido,s.adjuntos,s.archivos
             , d.codigo, d.nombre_destinatario, d.cargo_destinatario, p.proceso,d.referencia,d.id as id_doc,s.prioridad
              FROM seguimiento s
              INNER JOIN documentos d ON s.nur=d.nur
              INNER JOIN acciones c ON s.accion=c.id      
              INNER JOIN procesos p ON p.id=d.id_proceso
              WHERE s.estado='1'
              AND s.derivado_a='303'
              AND d.original='1'
              ORDER BY s.fecha_emision DESC ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-02-04 10:34:23 --- ERROR: Database_Exception [ 0 ]: [1317] Query execution was interrupted ( SELECT s.id, s.padre,s.hijo,s.id_seguimiento,s.nur, s.nombre_emisor,s.cargo_emisor,s.de_oficina,s.fecha_emision as fecha,s.fecha_recepcion as fecha2, c.accion, s.oficial, s.hijo, s.proveido,s.adjuntos,s.archivos
             , d.codigo, d.nombre_destinatario, d.cargo_destinatario, p.proceso,d.referencia,d.id as id_doc,s.prioridad
              FROM seguimiento s
              INNER JOIN documentos d ON s.nur=d.nur
              INNER JOIN acciones c ON s.accion=c.id      
              INNER JOIN procesos p ON p.id=d.id_proceso
              WHERE s.estado='1'
              AND s.derivado_a='405'
              AND d.original='1'
              ORDER BY s.fecha_emision DESC ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-02-04 10:34:24 --- ERROR: Database_Exception [ 0 ]: [1317] Query execution was interrupted ( SELECT s.id, s.padre,s.hijo,s.id_seguimiento,s.nur, s.nombre_emisor,s.cargo_emisor,s.de_oficina,s.fecha_emision as fecha,s.fecha_recepcion as fecha2, c.accion, s.oficial, s.hijo, s.proveido,s.adjuntos,s.archivos
             , d.codigo, d.nombre_destinatario, d.cargo_destinatario, p.proceso,d.referencia,d.id as id_doc,s.prioridad
              FROM seguimiento s
              INNER JOIN documentos d ON s.nur=d.nur
              INNER JOIN acciones c ON s.accion=c.id      
              INNER JOIN procesos p ON p.id=d.id_proceso
              WHERE s.estado='1'
              AND s.derivado_a='416'
              AND d.original='1'
              ORDER BY s.fecha_emision DESC ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-02-04 10:34:24 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-02-04 10:34:24 --- ERROR: Database_Exception [ 0 ]: [1317] Query execution was interrupted ( SELECT s.id, s.padre,s.hijo,s.id_seguimiento,s.nur, s.nombre_emisor,s.cargo_emisor,s.de_oficina,s.fecha_emision as fecha,s.fecha_recepcion as fecha2, c.accion, s.oficial, s.hijo, s.proveido,s.adjuntos,s.archivos
             , d.codigo, d.nombre_destinatario, d.cargo_destinatario, p.proceso,d.referencia,d.id as id_doc,s.prioridad,d.fucov
              FROM seguimiento s
              INNER JOIN documentos d ON s.nur=d.nur
              INNER JOIN acciones c ON s.accion=c.id      
              INNER JOIN procesos p ON p.id=d.id_proceso
              WHERE s.estado=2
              AND s.derivado_a='277'
              AND d.original='1'
              ORDER BY s.fecha_recepcion DESC ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-02-04 10:34:24 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-02-04 10:34:24 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-02-04 10:34:24 --- ERROR: Database_Exception [ 0 ]: [1317] Query execution was interrupted ( SELECT s.id, s.padre,s.hijo,s.id_seguimiento,s.nur, s.nombre_emisor,s.cargo_emisor,s.de_oficina,s.fecha_emision as fecha,s.fecha_recepcion as fecha2, c.accion, s.oficial, s.hijo, s.proveido,s.adjuntos,s.archivos
             , d.codigo, d.nombre_destinatario, d.cargo_destinatario, p.proceso,d.referencia,d.id as id_doc,s.prioridad
              FROM seguimiento s
              INNER JOIN documentos d ON s.nur=d.nur
              INNER JOIN acciones c ON s.accion=c.id      
              INNER JOIN procesos p ON p.id=d.id_proceso
              WHERE s.estado='1'
              AND s.derivado_a='400'
              AND d.original='1'
              ORDER BY s.fecha_emision DESC ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-02-04 10:34:24 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-02-04 10:34:24 --- ERROR: Database_Exception [ 0 ]: [1317] Query execution was interrupted ( SELECT s.id, s.padre,s.hijo,s.id_seguimiento,s.nur, s.nombre_emisor,s.cargo_emisor,s.de_oficina,s.fecha_emision as fecha,s.fecha_recepcion as fecha2, c.accion, s.oficial, s.hijo, s.proveido,s.adjuntos,s.archivos
             , d.codigo, d.nombre_destinatario, d.cargo_destinatario, p.proceso,d.referencia,d.id as id_doc,s.prioridad,d.fucov
              FROM seguimiento s
              INNER JOIN documentos d ON s.nur=d.nur
              INNER JOIN acciones c ON s.accion=c.id      
              INNER JOIN procesos p ON p.id=d.id_proceso
              WHERE s.estado=2
              AND s.derivado_a='499'
              AND d.original='1'
              ORDER BY s.fecha_recepcion DESC ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-02-04 10:34:24 --- ERROR: Database_Exception [ 0 ]: [1317] Query execution was interrupted ( SELECT s.id, s.padre,s.hijo,s.id_seguimiento,s.nur, s.nombre_emisor,s.cargo_emisor,s.de_oficina,s.fecha_emision as fecha,s.fecha_recepcion as fecha2, c.accion, s.oficial, s.hijo, s.proveido,s.adjuntos,s.archivos
             , d.codigo, d.nombre_destinatario, d.cargo_destinatario, p.proceso,d.referencia,d.id as id_doc,s.prioridad
              FROM seguimiento s
              INNER JOIN documentos d ON s.nur=d.nur
              INNER JOIN acciones c ON s.accion=c.id      
              INNER JOIN procesos p ON p.id=d.id_proceso
              WHERE s.estado='1'
              AND s.derivado_a='313'
              AND d.original='1'
              ORDER BY s.fecha_emision DESC ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-02-04 10:34:24 --- ERROR: Database_Exception [ 0 ]: [1317] Query execution was interrupted ( SELECT s.id, s.padre,s.hijo,s.id_seguimiento,s.nur, s.nombre_emisor,s.cargo_emisor,s.de_oficina,s.fecha_emision as fecha,s.fecha_recepcion as fecha2, c.accion, s.oficial, s.hijo, s.proveido,s.adjuntos,s.archivos
             , d.codigo, d.nombre_destinatario, d.cargo_destinatario, p.proceso,d.referencia,d.id as id_doc,s.prioridad
              FROM seguimiento s
              INNER JOIN documentos d ON s.nur=d.nur
              INNER JOIN acciones c ON s.accion=c.id      
              INNER JOIN procesos p ON p.id=d.id_proceso
              WHERE s.estado='1'
              AND s.derivado_a='533'
              AND d.original='1'
              ORDER BY s.fecha_emision DESC ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-02-04 10:34:24 --- ERROR: Database_Exception [ 0 ]: [1317] Query execution was interrupted ( SELECT s.id, s.padre,s.nur, s.nombre_receptor,s.cargo_receptor,s.a_oficina,s.fecha_emision as fecha, c.accion, s.oficial, s.hijo, s.proveido,s.adjuntos,s.archivos
             ,d.id as id_documento, d.codigo, d.cite_original, d.nombre_destinatario, d.cargo_destinatario, p.proceso,d.referencia
              FROM seguimiento s
              INNER JOIN documentos d ON s.nur=d.nur
              INNER JOIN acciones c ON s.accion=c.id      
              INNER JOIN procesos p ON p.id=d.id_proceso												
              WHERE s.estado=1
              AND s.derivado_por='220'
              AND d.original=1 
              ORDER BY s.fecha_emision DESC ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-02-04 10:34:24 --- ERROR: Database_Exception [ 0 ]: [1317] Query execution was interrupted ( SELECT s.id, s.padre,s.hijo,s.id_seguimiento,s.nur, s.nombre_emisor,s.cargo_emisor,s.de_oficina,s.fecha_emision as fecha,s.fecha_recepcion as fecha2, c.accion, s.oficial, s.hijo, s.proveido,s.adjuntos,s.archivos
             , d.codigo, d.nombre_destinatario, d.cargo_destinatario, p.proceso,d.referencia,d.id as id_doc,s.prioridad
              FROM seguimiento s
              INNER JOIN documentos d ON s.nur=d.nur
              INNER JOIN acciones c ON s.accion=c.id      
              INNER JOIN procesos p ON p.id=d.id_proceso
              WHERE s.estado='1'
              AND s.derivado_a='2'
              AND d.original='1'
              ORDER BY s.fecha_emision DESC ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-02-04 10:34:24 --- ERROR: Database_Exception [ 0 ]: [1317] Query execution was interrupted ( SELECT s.id, s.padre,s.hijo,s.id_seguimiento,s.nur, s.nombre_emisor,s.cargo_emisor,s.de_oficina,s.fecha_emision as fecha,s.fecha_recepcion as fecha2, c.accion, s.oficial, s.hijo, s.proveido,s.adjuntos,s.archivos
             , d.codigo, d.nombre_destinatario, d.cargo_destinatario, p.proceso,d.referencia,d.id as id_doc,s.prioridad
              FROM seguimiento s
              INNER JOIN documentos d ON s.nur=d.nur
              INNER JOIN acciones c ON s.accion=c.id      
              INNER JOIN procesos p ON p.id=d.id_proceso
              WHERE s.estado='1'
              AND s.derivado_a='332'
              AND d.original='1'
              ORDER BY s.fecha_emision DESC ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-02-04 10:34:24 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-02-04 10:34:24 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-02-04 10:34:24 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-02-04 10:34:24 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-02-04 10:34:24 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-02-04 10:34:24 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-02-04 10:34:24 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-02-04 10:34:24 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-02-04 10:34:24 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-02-04 10:34:24 --- ERROR: Database_Exception [ 0 ]: [1317] Query execution was interrupted ( SELECT s.id, s.padre,s.hijo,s.id_seguimiento,s.nur, s.nombre_emisor,s.cargo_emisor,s.de_oficina,s.fecha_emision as fecha,s.fecha_recepcion as fecha2, c.accion, s.oficial, s.hijo, s.proveido,s.adjuntos,s.archivos
             , d.codigo, d.nombre_destinatario, d.cargo_destinatario, p.proceso,d.referencia,d.id as id_doc,s.prioridad
              FROM seguimiento s
              INNER JOIN documentos d ON s.nur=d.nur
              INNER JOIN acciones c ON s.accion=c.id      
              INNER JOIN procesos p ON p.id=d.id_proceso
              WHERE s.estado='1'
              AND s.derivado_a='311'
              AND d.original='1'
              ORDER BY s.fecha_emision DESC ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-02-04 10:34:24 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-02-04 10:34:24 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-02-04 10:34:24 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-02-04 10:34:24 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-02-04 10:34:24 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-02-04 10:34:24 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-02-04 10:34:24 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-02-04 10:34:24 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-02-04 10:34:24 --- ERROR: Database_Exception [ 0 ]: [1317] Query execution was interrupted ( SELECT s.id, s.padre,s.hijo,s.id_seguimiento,s.nur, s.nombre_emisor,s.cargo_emisor,s.de_oficina,s.fecha_emision as fecha,s.fecha_recepcion as fecha2, c.accion, s.oficial, s.hijo, s.proveido,s.adjuntos,s.archivos
             , d.codigo, d.nombre_destinatario, d.cargo_destinatario, p.proceso,d.referencia,d.id as id_doc,s.prioridad
              FROM seguimiento s
              INNER JOIN documentos d ON s.nur=d.nur
              INNER JOIN acciones c ON s.accion=c.id      
              INNER JOIN procesos p ON p.id=d.id_proceso
              WHERE s.estado='1'
              AND s.derivado_a='362'
              AND d.original='1'
              ORDER BY s.fecha_emision DESC ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-02-04 10:34:24 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-02-04 10:34:24 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-02-04 10:34:24 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-02-04 10:34:24 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-02-04 10:34:24 --- ERROR: Database_Exception [ 0 ]: [1317] Query execution was interrupted ( SELECT s.id, s.padre,s.hijo,s.id_seguimiento,s.nur, s.nombre_emisor,s.cargo_emisor,s.de_oficina,s.fecha_emision as fecha,s.fecha_recepcion as fecha2, c.accion, s.oficial, s.hijo, s.proveido,s.adjuntos,s.archivos
             , d.codigo, d.nombre_destinatario, d.cargo_destinatario, p.proceso,d.referencia,d.id as id_doc,s.prioridad
              FROM seguimiento s
              INNER JOIN documentos d ON s.nur=d.nur
              INNER JOIN acciones c ON s.accion=c.id      
              INNER JOIN procesos p ON p.id=d.id_proceso
              WHERE s.estado='1'
              AND s.derivado_a='238'
              AND d.original='1'
              ORDER BY s.fecha_emision DESC ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-02-04 10:34:24 --- ERROR: Database_Exception [ 0 ]: [1317] Query execution was interrupted ( SELECT s.id, s.padre,s.hijo,s.id_seguimiento,s.nur, s.nombre_emisor,s.cargo_emisor,s.de_oficina,s.fecha_emision as fecha,s.fecha_recepcion as fecha2, c.accion, s.oficial, s.hijo, s.proveido,s.adjuntos,s.archivos
             , d.codigo, d.nombre_destinatario, d.cargo_destinatario, p.proceso,d.referencia,d.id as id_doc,s.prioridad,d.fucov
              FROM seguimiento s
              INNER JOIN documentos d ON s.nur=d.nur
              INNER JOIN acciones c ON s.accion=c.id      
              INNER JOIN procesos p ON p.id=d.id_proceso
              WHERE s.estado=2
              AND s.derivado_a='421'
              AND d.original='1'
              ORDER BY s.fecha_recepcion DESC ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-02-04 10:34:24 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-02-04 10:34:24 --- ERROR: Database_Exception [ 0 ]: [1317] Query execution was interrupted ( SELECT d.id,d.codigo,d.nombre_destinatario,d.cargo_destinatario,d.nombre_via,d.cargo_via,d.nombre_remitente,d.cargo_remitente,d.fecha_creacion,d.referencia,d.nur,t.tipo,d.estado,s.estado as seg_estado
            FROM documentos d            
            INNER JOIN tipos t ON t.id=d.id_tipo
	    LEFT JOIN seguimiento s ON d.nur=s.nur AND d.id_seguimiento=0 AND s.derivado_por='23'
            WHERE d.id_user='23' 
            ORDER BY d.fecha_creacion DESC
            LIMIT 10 ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-02-04 10:34:24 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-02-04 10:34:24 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-02-04 10:34:24 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-02-04 10:34:25 --- ERROR: Database_Exception [ 0 ]: [1317] Query execution was interrupted ( SELECT s.id, s.padre,s.hijo,s.id_seguimiento,s.nur, s.nombre_emisor,s.cargo_emisor,s.de_oficina,s.fecha_emision as fecha,s.fecha_recepcion as fecha2, c.accion, s.oficial, s.hijo, s.proveido,s.adjuntos,s.archivos
             , d.codigo, d.nombre_destinatario, d.cargo_destinatario, p.proceso,d.referencia,d.id as id_doc,s.prioridad
              FROM seguimiento s
              INNER JOIN documentos d ON s.nur=d.nur
              INNER JOIN acciones c ON s.accion=c.id      
              INNER JOIN procesos p ON p.id=d.id_proceso
              WHERE s.estado='1'
              AND s.derivado_a='441'
              AND d.original='1'
              ORDER BY s.fecha_emision DESC ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-02-04 10:34:25 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-02-04 10:34:25 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-02-04 10:48:23 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-02-04 11:05:34 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-02-04 11:05:51 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-02-04 11:05:52 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-02-04 11:05:59 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-02-04 11:06:19 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 113 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-02-04 11:06:23 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 113 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-02-04 11:06:26 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 113 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-02-04 11:06:26 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 113 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-02-04 11:06:29 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 113 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-02-04 11:06:29 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 113 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-02-04 11:06:29 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 113 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-02-04 11:06:34 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 113 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-02-04 11:06:34 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 113 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-02-04 11:06:34 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 113 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-02-04 11:06:39 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 113 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-02-04 11:06:40 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-02-04 11:06:43 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-02-04 11:16:09 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-02-04 11:16:10 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-02-04 11:16:11 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2014-02-04 11:26:36 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-02-04 11:34:55 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-02-04 11:36:00 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-02-04 11:40:47 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-02-04 11:42:06 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-02-04 14:52:48 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-02-04 15:01:15 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-02-04 15:06:12 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-02-04 15:07:20 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-02-04 15:07:55 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-02-04 15:21:35 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-02-04 15:21:43 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-02-04 15:21:49 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-02-04 16:23:37 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-02-04 16:26:16 --- ERROR: ErrorException [ 8 ]: Undefined index: aceptar ~ APPPATH/classes/controller/hojaruta.php [ 71 ]
2014-02-04 16:29:28 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-02-04 16:50:41 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-02-04 16:54:46 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-02-04 16:56:28 --- ERROR: ErrorException [ 8 ]: Undefined index: aceptar ~ APPPATH/classes/controller/hojaruta.php [ 71 ]
2014-02-04 17:03:04 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-02-04 17:29:18 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-02-04 17:29:31 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-02-04 17:55:29 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-02-04 18:05:21 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-02-04 18:11:07 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-02-04 18:20:05 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-02-04 18:29:29 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-02-04 18:29:30 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-02-04 18:29:38 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-02-04 18:42:40 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]