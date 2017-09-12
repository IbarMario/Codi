<?php defined('SYSPATH') or die('No direct script access.'); ?>

2015-05-12 08:04:03 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2015-05-12 09:21:21 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2015-05-12 10:08:36 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2015-05-12 10:10:03 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2015-05-12 10:17:56 --- ERROR: ErrorException [ 8 ]: Undefined index: aceptar ~ APPPATH/classes/controller/hojaruta.php [ 71 ]
2015-05-12 10:17:59 --- ERROR: ErrorException [ 8 ]: Undefined index: aceptar ~ APPPATH/classes/controller/hojaruta.php [ 71 ]
2015-05-12 10:20:13 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2015-05-12 11:06:53 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2015-05-12 11:06:54 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2015-05-12 11:07:02 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2015-05-12 11:07:03 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2015-05-12 11:07:06 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2015-05-12 11:07:12 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2015-05-12 11:07:12 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2015-05-12 11:07:16 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2015-05-12 11:07:48 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 113 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2015-05-12 11:07:52 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 113 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2015-05-12 11:08:12 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 113 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2015-05-12 11:08:12 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 113 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2015-05-12 11:08:16 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 113 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2015-05-12 11:08:16 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 113 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2015-05-12 11:08:16 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 113 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2015-05-12 11:08:19 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 113 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2015-05-12 11:08:28 --- ERROR: Database_Exception [ 0 ]: [2003] Can't connect to MySQL server on '192.168.20.38' (4) ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2015-05-12 14:21:51 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2015-05-12 16:31:46 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2015-05-12 17:17:19 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2015-05-12 17:28:38 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2015-05-12 18:05:58 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2015-05-12 18:48:51 --- ERROR: ErrorException [ 8 ]: Undefined index: aceptar ~ APPPATH/classes/controller/hojaruta.php [ 71 ]
2015-05-12 19:20:14 --- ERROR: Kohana_Exception [ 0 ]: Cannot delete archivados model because it is not loaded. ~ MODPATH/orm/classes/kohana/orm.php [ 1383 ]
2015-05-12 20:54:33 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]