<?php defined('SYSPATH') or die('No direct script access.'); ?>

2016-05-09 08:35:56 --- ERROR: Kohana_Exception [ 0 ]: Cannot delete archivados model because it is not loaded. ~ MODPATH/orm/classes/kohana/orm.php [ 1383 ]
2016-05-09 08:38:29 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2016-05-09 08:38:43 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2016-05-09 08:39:24 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2016-05-09 08:39:55 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '%'
        or nur like '%'%'
	 or institucion_remitente like '%'%'
        or re' at line 3 ( SELECT COUNT(*) as count FROM documentos d,
        ( SELECT id  FROM documentos
        WHERE codigo like '%'%'
        or nur like '%'%'
	 or institucion_remitente like '%'%'
        or referencia like '%'%' 
        or nombre_remitente like '%'%'
        or nombre_destinatario like '%'%') as x
        WHERE x.id=d.id
        and d.id_entidad='1' AND d.fecha_creacion between  DATE_FORMAT(CURDATE(), '%Y-01-01 00:00:00') and CURRENT_TIMESTAMP() ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2016-05-09 08:41:54 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2016-05-09 09:55:12 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2016-05-09 09:56:47 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2016-05-09 10:08:10 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2016-05-09 10:27:47 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2016-05-09 10:28:08 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2016-05-09 10:28:26 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2016-05-09 10:28:44 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2016-05-09 11:42:34 --- ERROR: ErrorException [ 8 ]: Undefined index: aceptar ~ APPPATH/classes/controller/hojaruta.php [ 71 ]
2016-05-09 12:02:19 --- ERROR: ErrorException [ 8 ]: Undefined index: aceptar ~ APPPATH/classes/controller/hojaruta.php [ 71 ]
2016-05-09 14:15:14 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2016-05-09 14:35:42 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2016-05-09 15:04:02 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2016-05-09 15:07:55 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2016-05-09 16:01:21 --- ERROR: Database_Exception [ 0 ]: [2003] Can't connect to MySQL server on '192.168.20.38' (4) ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2016-05-09 16:01:57 --- ERROR: Database_Exception [ 0 ]: [2003] Can't connect to MySQL server on '192.168.20.38' (4) ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2016-05-09 16:01:57 --- ERROR: Database_Exception [ 0 ]: [2003] Can't connect to MySQL server on '192.168.20.38' (4) ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2016-05-09 16:02:14 --- ERROR: Database_Exception [ 0 ]: [2003] Can't connect to MySQL server on '192.168.20.38' (4) ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2016-05-09 16:02:19 --- ERROR: Database_Exception [ 0 ]: [2003] Can't connect to MySQL server on '192.168.20.38' (4) ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2016-05-09 16:02:24 --- ERROR: Database_Exception [ 0 ]: [2003] Can't connect to MySQL server on '192.168.20.38' (4) ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2016-05-09 16:02:29 --- ERROR: Database_Exception [ 0 ]: [2003] Can't connect to MySQL server on '192.168.20.38' (4) ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2016-05-09 16:02:29 --- ERROR: Database_Exception [ 0 ]: [2003] Can't connect to MySQL server on '192.168.20.38' (4) ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2016-05-09 16:02:31 --- ERROR: Database_Exception [ 0 ]: [2003] Can't connect to MySQL server on '192.168.20.38' (4) ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2016-05-09 16:02:38 --- ERROR: Database_Exception [ 0 ]: [2003] Can't connect to MySQL server on '192.168.20.38' (4) ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2016-05-09 16:02:39 --- ERROR: Database_Exception [ 0 ]: [2003] Can't connect to MySQL server on '192.168.20.38' (4) ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2016-05-09 16:03:24 --- ERROR: Database_Exception [ 0 ]: [2003] Can't connect to MySQL server on '192.168.20.38' (4) ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2016-05-09 16:03:27 --- ERROR: Database_Exception [ 0 ]: [2003] Can't connect to MySQL server on '192.168.20.38' (4) ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2016-05-09 16:03:33 --- ERROR: Database_Exception [ 0 ]: [2003] Can't connect to MySQL server on '192.168.20.38' (4) ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2016-05-09 16:03:33 --- ERROR: Database_Exception [ 0 ]: [2003] Can't connect to MySQL server on '192.168.20.38' (4) ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2016-05-09 16:03:43 --- ERROR: Database_Exception [ 0 ]: [2003] Can't connect to MySQL server on '192.168.20.38' (4) ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2016-05-09 16:03:46 --- ERROR: Database_Exception [ 0 ]: [2003] Can't connect to MySQL server on '192.168.20.38' (4) ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2016-05-09 16:03:56 --- ERROR: Database_Exception [ 0 ]: [2003] Can't connect to MySQL server on '192.168.20.38' (4) ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2016-05-09 16:04:48 --- ERROR: Database_Exception [ 0 ]: [2003] Can't connect to MySQL server on '192.168.20.38' (4) ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2016-05-09 16:04:57 --- ERROR: Database_Exception [ 0 ]: [2003] Can't connect to MySQL server on '192.168.20.38' (4) ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2016-05-09 16:05:01 --- ERROR: Database_Exception [ 0 ]: [2003] Can't connect to MySQL server on '192.168.20.38' (4) ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2016-05-09 16:05:03 --- ERROR: Database_Exception [ 0 ]: [2003] Can't connect to MySQL server on '192.168.20.38' (4) ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2016-05-09 16:05:21 --- ERROR: Database_Exception [ 0 ]: [2003] Can't connect to MySQL server on '192.168.20.38' (4) ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2016-05-09 16:06:38 --- ERROR: Database_Exception [ 0 ]: [2003] Can't connect to MySQL server on '192.168.20.38' (4) ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2016-05-09 16:06:57 --- ERROR: Database_Exception [ 0 ]: [2003] Can't connect to MySQL server on '192.168.20.38' (4) ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2016-05-09 16:07:16 --- ERROR: Database_Exception [ 0 ]: [2003] Can't connect to MySQL server on '192.168.20.38' (4) ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2016-05-09 16:07:27 --- ERROR: Database_Exception [ 0 ]: [2003] Can't connect to MySQL server on '192.168.20.38' (4) ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2016-05-09 16:07:48 --- ERROR: Database_Exception [ 0 ]: [2003] Can't connect to MySQL server on '192.168.20.38' (4) ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2016-05-09 16:07:56 --- ERROR: Database_Exception [ 0 ]: [2003] Can't connect to MySQL server on '192.168.20.38' (4) ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2016-05-09 16:08:01 --- ERROR: Database_Exception [ 0 ]: [2003] Can't connect to MySQL server on '192.168.20.38' (4) ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2016-05-09 16:10:34 --- ERROR: Database_Exception [ 0 ]: [2003] Can't connect to MySQL server on '192.168.20.38' (4) ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2016-05-09 16:10:45 --- ERROR: Database_Exception [ 0 ]: [2003] Can't connect to MySQL server on '192.168.20.38' (4) ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2016-05-09 16:10:59 --- ERROR: Database_Exception [ 0 ]: [2003] Can't connect to MySQL server on '192.168.20.38' (4) ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2016-05-09 16:11:04 --- ERROR: Database_Exception [ 0 ]: [2003] Can't connect to MySQL server on '192.168.20.38' (4) ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2016-05-09 16:11:09 --- ERROR: Database_Exception [ 0 ]: [2003] Can't connect to MySQL server on '192.168.20.38' (4) ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2016-05-09 16:11:25 --- ERROR: Database_Exception [ 0 ]: [2003] Can't connect to MySQL server on '192.168.20.38' (4) ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2016-05-09 16:11:29 --- ERROR: Database_Exception [ 0 ]: [2003] Can't connect to MySQL server on '192.168.20.38' (4) ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2016-05-09 16:11:30 --- ERROR: Database_Exception [ 0 ]: [2003] Can't connect to MySQL server on '192.168.20.38' (4) ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2016-05-09 16:11:47 --- ERROR: Database_Exception [ 0 ]: [2003] Can't connect to MySQL server on '192.168.20.38' (4) ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2016-05-09 16:11:52 --- ERROR: Database_Exception [ 0 ]: [2003] Can't connect to MySQL server on '192.168.20.38' (4) ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2016-05-09 16:11:59 --- ERROR: Database_Exception [ 0 ]: [2003] Can't connect to MySQL server on '192.168.20.38' (4) ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2016-05-09 16:12:01 --- ERROR: Database_Exception [ 0 ]: [2003] Can't connect to MySQL server on '192.168.20.38' (4) ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2016-05-09 16:12:04 --- ERROR: Database_Exception [ 0 ]: [2003] Can't connect to MySQL server on '192.168.20.38' (4) ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2016-05-09 16:12:09 --- ERROR: Database_Exception [ 0 ]: [2003] Can't connect to MySQL server on '192.168.20.38' (4) ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2016-05-09 16:12:33 --- ERROR: Database_Exception [ 0 ]: [2003] Can't connect to MySQL server on '192.168.20.38' (4) ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2016-05-09 16:12:34 --- ERROR: Database_Exception [ 0 ]: [2003] Can't connect to MySQL server on '192.168.20.38' (4) ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2016-05-09 16:12:35 --- ERROR: Database_Exception [ 0 ]: [2003] Can't connect to MySQL server on '192.168.20.38' (4) ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2016-05-09 16:12:52 --- ERROR: Database_Exception [ 0 ]: [2003] Can't connect to MySQL server on '192.168.20.38' (4) ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2016-05-09 16:12:55 --- ERROR: Database_Exception [ 0 ]: [2003] Can't connect to MySQL server on '192.168.20.38' (4) ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2016-05-09 16:13:27 --- ERROR: Database_Exception [ 0 ]: [2003] Can't connect to MySQL server on '192.168.20.38' (4) ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2016-05-09 16:13:38 --- ERROR: Database_Exception [ 0 ]: [2003] Can't connect to MySQL server on '192.168.20.38' (4) ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2016-05-09 16:13:47 --- ERROR: Database_Exception [ 0 ]: [2003] Can't connect to MySQL server on '192.168.20.38' (4) ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2016-05-09 16:13:47 --- ERROR: Database_Exception [ 0 ]: [2003] Can't connect to MySQL server on '192.168.20.38' (4) ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2016-05-09 16:13:54 --- ERROR: Database_Exception [ 0 ]: [2003] Can't connect to MySQL server on '192.168.20.38' (4) ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2016-05-09 16:14:08 --- ERROR: Database_Exception [ 0 ]: [2003] Can't connect to MySQL server on '192.168.20.38' (4) ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2016-05-09 16:14:25 --- ERROR: Database_Exception [ 0 ]: [2003] Can't connect to MySQL server on '192.168.20.38' (4) ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2016-05-09 16:14:33 --- ERROR: Database_Exception [ 0 ]: [2003] Can't connect to MySQL server on '192.168.20.38' (4) ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2016-05-09 16:14:40 --- ERROR: Database_Exception [ 0 ]: [2003] Can't connect to MySQL server on '192.168.20.38' (4) ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2016-05-09 16:14:56 --- ERROR: Database_Exception [ 0 ]: [2003] Can't connect to MySQL server on '192.168.20.38' (4) ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2016-05-09 16:15:08 --- ERROR: Database_Exception [ 0 ]: [2003] Can't connect to MySQL server on '192.168.20.38' (4) ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2016-05-09 16:15:14 --- ERROR: Database_Exception [ 0 ]: [2003] Can't connect to MySQL server on '192.168.20.38' (4) ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2016-05-09 16:15:24 --- ERROR: Database_Exception [ 0 ]: [2003] Can't connect to MySQL server on '192.168.20.38' (4) ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2016-05-09 16:15:24 --- ERROR: Database_Exception [ 0 ]: [2003] Can't connect to MySQL server on '192.168.20.38' (4) ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2016-05-09 16:15:24 --- ERROR: Database_Exception [ 0 ]: [2003] Can't connect to MySQL server on '192.168.20.38' (4) ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2016-05-09 16:15:30 --- ERROR: Database_Exception [ 0 ]: [2003] Can't connect to MySQL server on '192.168.20.38' (4) ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2016-05-09 16:15:42 --- ERROR: Database_Exception [ 0 ]: [2003] Can't connect to MySQL server on '192.168.20.38' (4) ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2016-05-09 16:15:49 --- ERROR: Database_Exception [ 0 ]: [2003] Can't connect to MySQL server on '192.168.20.38' (4) ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2016-05-09 16:15:57 --- ERROR: Database_Exception [ 0 ]: [2003] Can't connect to MySQL server on '192.168.20.38' (4) ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2016-05-09 16:15:58 --- ERROR: Database_Exception [ 0 ]: [2003] Can't connect to MySQL server on '192.168.20.38' (4) ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2016-05-09 16:16:10 --- ERROR: Database_Exception [ 0 ]: [2003] Can't connect to MySQL server on '192.168.20.38' (4) ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2016-05-09 16:16:24 --- ERROR: Database_Exception [ 0 ]: [2003] Can't connect to MySQL server on '192.168.20.38' (4) ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2016-05-09 16:16:28 --- ERROR: Database_Exception [ 0 ]: [2003] Can't connect to MySQL server on '192.168.20.38' (4) ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2016-05-09 16:16:33 --- ERROR: Database_Exception [ 0 ]: [2003] Can't connect to MySQL server on '192.168.20.38' (4) ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2016-05-09 16:16:35 --- ERROR: Database_Exception [ 0 ]: [2003] Can't connect to MySQL server on '192.168.20.38' (4) ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2016-05-09 16:16:36 --- ERROR: Database_Exception [ 0 ]: [2003] Can't connect to MySQL server on '192.168.20.38' (4) ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2016-05-09 16:16:38 --- ERROR: Database_Exception [ 0 ]: [2003] Can't connect to MySQL server on '192.168.20.38' (4) ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2016-05-09 16:16:57 --- ERROR: Database_Exception [ 0 ]: [2003] Can't connect to MySQL server on '192.168.20.38' (4) ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2016-05-09 16:17:05 --- ERROR: Database_Exception [ 0 ]: [2003] Can't connect to MySQL server on '192.168.20.38' (4) ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2016-05-09 16:17:10 --- ERROR: Database_Exception [ 0 ]: [2003] Can't connect to MySQL server on '192.168.20.38' (4) ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2016-05-09 16:17:24 --- ERROR: Database_Exception [ 0 ]: [2003] Can't connect to MySQL server on '192.168.20.38' (4) ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2016-05-09 16:17:48 --- ERROR: Database_Exception [ 0 ]: [2003] Can't connect to MySQL server on '192.168.20.38' (4) ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2016-05-09 16:17:57 --- ERROR: Database_Exception [ 0 ]: [2003] Can't connect to MySQL server on '192.168.20.38' (4) ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2016-05-09 16:18:10 --- ERROR: Database_Exception [ 0 ]: [2003] Can't connect to MySQL server on '192.168.20.38' (4) ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2016-05-09 16:18:11 --- ERROR: Database_Exception [ 0 ]: [2003] Can't connect to MySQL server on '192.168.20.38' (4) ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2016-05-09 16:22:24 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2016-05-09 16:24:30 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2016-05-09 16:27:33 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2016-05-09 16:28:07 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2016-05-09 17:04:08 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2016-05-09 17:05:05 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2016-05-09 17:54:47 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2016-05-09 17:58:06 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2016-05-09 18:00:21 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2016-05-09 18:22:07 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2016-05-09 18:26:01 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2016-05-09 18:40:12 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2016-05-09 18:43:38 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2016-05-09 18:53:18 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2016-05-09 19:07:01 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2016-05-09 19:07:34 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]