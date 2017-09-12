<?php defined('SYSPATH') or die('No direct script access.'); ?>

2017-06-19 08:22:17 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2017-06-19 08:24:06 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2017-06-19 09:48:46 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2017-06-19 10:59:01 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2017-06-19 11:45:20 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2017-06-19 12:14:24 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2017-06-19 13:41:39 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2017-06-19 14:34:17 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2017-06-19 16:43:07 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2017-06-19 18:09:18 --- ERROR: ErrorException [ 8 ]: Undefined index: aceptar ~ APPPATH/classes/controller/hojaruta.php [ 71 ]
2017-06-19 18:27:29 --- ERROR: ErrorException [ 8 ]: Undefined index: aceptar ~ APPPATH/classes/controller/hojaruta.php [ 71 ]
2017-06-19 19:38:43 --- ERROR: Database_Exception [ 0 ]: [1317] Query execution was interrupted ( SELECT `users`.* FROM `users` WHERE `username` = 'sistemas' LIMIT 1 ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2017-06-19 19:38:43 --- ERROR: Database_Exception [ 0 ]: [1317] Query execution was interrupted ( SELECT `users`.* FROM `users` WHERE `username` = 'especialista.analisis' LIMIT 1 ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2017-06-19 19:38:43 --- ERROR: ErrorException [ 2 ]: mysql_query(): Unable to save result set ~ MODPATH/database/classes/kohana/database/mysql.php [ 173 ]
2017-06-19 19:38:43 --- ERROR: Database_Exception [ 0 ]: [1317] Query execution was interrupted ( SELECT `users`.* FROM `users` WHERE `username` = 'regional.scz.snp' LIMIT 1 ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2017-06-19 19:39:01 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2017-06-19 19:39:04 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2017-06-19 19:39:06 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2017-06-19 19:39:08 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2017-06-19 19:39:10 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2017-06-19 19:39:41 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 113 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2017-06-19 19:39:51 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 113 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2017-06-19 19:39:56 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 113 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2017-06-19 19:39:56 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 113 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2017-06-19 19:39:56 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 113 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2017-06-19 19:40:02 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 113 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2017-06-19 19:40:02 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 113 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2017-06-19 19:40:02 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 113 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2017-06-19 19:40:07 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 113 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2017-06-19 19:40:07 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 113 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2017-06-19 19:40:11 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 113 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2017-06-19 19:40:11 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 113 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2017-06-19 19:40:11 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 113 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2017-06-19 19:40:14 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 113 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2017-06-19 19:40:14 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 113 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2017-06-19 19:40:19 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 113 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2017-06-19 19:40:19 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 113 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2017-06-19 19:40:23 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 113 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2017-06-19 19:40:23 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 113 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2017-06-19 19:40:24 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2017-06-19 19:40:26 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2017-06-19 19:40:27 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2017-06-19 19:40:29 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2017-06-19 19:40:30 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2017-06-19 19:40:31 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2017-06-19 19:40:32 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2017-06-19 19:40:33 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2017-06-19 19:40:34 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2017-06-19 19:40:35 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]