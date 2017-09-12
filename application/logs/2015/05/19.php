<?php defined('SYSPATH') or die('No direct script access.'); ?>

2015-05-19 08:51:36 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2015-05-19 10:13:22 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2015-05-19 10:13:26 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2015-05-19 11:22:05 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2015-05-19 11:22:09 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2015-05-19 11:22:11 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2015-05-19 11:22:14 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2015-05-19 11:22:21 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2015-05-19 11:22:21 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2015-05-19 11:22:25 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2015-05-19 11:22:52 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 113 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2015-05-19 11:22:52 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 113 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2015-05-19 11:22:55 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 113 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2015-05-19 11:22:55 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 113 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2015-05-19 11:22:55 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 113 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2015-05-19 11:23:01 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 113 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2015-05-19 11:23:06 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 113 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2015-05-19 11:23:06 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 113 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2015-05-19 11:23:10 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 113 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2015-05-19 11:23:10 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 113 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2015-05-19 11:23:17 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 113 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2015-05-19 11:23:17 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 113 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2015-05-19 11:23:17 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 113 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2015-05-19 11:23:20 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 113 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2015-05-19 11:23:26 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 113 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2015-05-19 11:23:26 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 113 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2015-05-19 11:23:33 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2015-05-19 11:23:33 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2015-05-19 11:23:36 --- ERROR: Database_Exception [ 0 ]: [2013] Lost connection to MySQL server at 'reading initial communication packet', system error: 111 ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ]
2015-05-19 13:36:07 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2015-05-19 13:38:21 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2015-05-19 14:58:09 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2015-05-19 15:03:55 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2015-05-19 15:26:20 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2015-05-19 15:31:23 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2015-05-19 16:56:01 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2015-05-19 17:04:43 --- ERROR: Kohana_Exception [ 0 ]: Cannot delete archivados model because it is not loaded. ~ MODPATH/orm/classes/kohana/orm.php [ 1383 ]
2015-05-19 17:04:44 --- ERROR: Kohana_Exception [ 0 ]: Cannot delete archivados model because it is not loaded. ~ MODPATH/orm/classes/kohana/orm.php [ 1383 ]
2015-05-19 17:04:50 --- ERROR: Kohana_Exception [ 0 ]: Cannot delete archivados model because it is not loaded. ~ MODPATH/orm/classes/kohana/orm.php [ 1383 ]
2015-05-19 17:08:44 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2015-05-19 17:14:27 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2015-05-19 17:22:29 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]