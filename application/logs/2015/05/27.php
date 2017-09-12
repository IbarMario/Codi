<?php defined('SYSPATH') or die('No direct script access.'); ?>

2015-05-27 16:03:29 --- ERROR: Kohana_Exception [ 0 ]: Cannot delete archivados model because it is not loaded. ~ MODPATH/orm/classes/kohana/orm.php [ 1383 ]
2015-05-27 16:04:07 --- ERROR: Kohana_Exception [ 0 ]: Cannot delete archivados model because it is not loaded. ~ MODPATH/orm/classes/kohana/orm.php [ 1383 ]
2015-05-27 16:04:13 --- ERROR: Kohana_Exception [ 0 ]: Cannot delete archivados model because it is not loaded. ~ MODPATH/orm/classes/kohana/orm.php [ 1383 ]
2015-05-27 16:09:45 --- ERROR: Kohana_Exception [ 0 ]: Cannot delete archivados model because it is not loaded. ~ MODPATH/orm/classes/kohana/orm.php [ 1383 ]
2015-05-27 16:33:06 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2015-05-27 16:59:08 --- ERROR: ErrorException [ 8 ]: Undefined index: id_seg ~ APPPATH/classes/controller/bandeja.php [ 99 ]
2015-05-27 16:59:16 --- ERROR: ErrorException [ 8 ]: Undefined index: id_seg ~ APPPATH/classes/controller/bandeja.php [ 99 ]
2015-05-27 16:59:23 --- ERROR: ErrorException [ 8 ]: Undefined index: id_seg ~ APPPATH/classes/controller/bandeja.php [ 99 ]
2015-05-27 16:59:34 --- ERROR: ErrorException [ 8 ]: Undefined index: id_seg ~ APPPATH/classes/controller/bandeja.php [ 99 ]
2015-05-27 16:59:45 --- ERROR: ErrorException [ 8 ]: Undefined index: id_seg ~ APPPATH/classes/controller/bandeja.php [ 99 ]
2015-05-27 16:59:55 --- ERROR: ErrorException [ 8 ]: Undefined index: id_seg ~ APPPATH/classes/controller/bandeja.php [ 99 ]
2015-05-27 17:00:07 --- ERROR: ErrorException [ 8 ]: Undefined index: id_seg ~ APPPATH/classes/controller/bandeja.php [ 99 ]
2015-05-27 17:01:10 --- ERROR: ErrorException [ 8 ]: Undefined index: id_seg ~ APPPATH/classes/controller/bandeja.php [ 99 ]
2015-05-27 17:07:46 --- ERROR: ErrorException [ 8 ]: Undefined index: id_seg ~ APPPATH/classes/controller/bandeja.php [ 99 ]
2015-05-27 17:07:52 --- ERROR: ErrorException [ 8 ]: Undefined index: id_seg ~ APPPATH/classes/controller/bandeja.php [ 99 ]
2015-05-27 17:08:10 --- ERROR: ErrorException [ 8 ]: Undefined index: id_seg ~ APPPATH/classes/controller/bandeja.php [ 99 ]
2015-05-27 17:11:04 --- ERROR: ErrorException [ 8 ]: Undefined index: id_seg ~ APPPATH/classes/controller/bandeja.php [ 99 ]
2015-05-27 17:16:03 --- ERROR: ErrorException [ 8 ]: Undefined index: id_seg ~ APPPATH/classes/controller/bandeja.php [ 99 ]
2015-05-27 17:16:16 --- ERROR: ErrorException [ 8 ]: Undefined index: id_seg ~ APPPATH/classes/controller/bandeja.php [ 99 ]
2015-05-27 17:16:26 --- ERROR: ErrorException [ 8 ]: Undefined index: id_seg ~ APPPATH/classes/controller/bandeja.php [ 99 ]
2015-05-27 17:16:58 --- ERROR: ErrorException [ 8 ]: Undefined index: id_seg ~ APPPATH/classes/controller/bandeja.php [ 99 ]
2015-05-27 17:24:46 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2015-05-27 17:26:33 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2015-05-27 17:39:34 --- ERROR: ErrorException [ 8 ]: Undefined index: id_seg ~ APPPATH/classes/controller/bandeja.php [ 99 ]
2015-05-27 17:40:14 --- ERROR: ErrorException [ 8 ]: Undefined index: id_seg ~ APPPATH/classes/controller/bandeja.php [ 99 ]
2015-05-27 17:41:18 --- ERROR: ErrorException [ 8 ]: Undefined index: id_seg ~ APPPATH/classes/controller/bandeja.php [ 99 ]
2015-05-27 17:54:47 --- ERROR: ErrorException [ 8 ]: Undefined index: id_seg ~ APPPATH/classes/controller/bandeja.php [ 99 ]
2015-05-27 17:55:42 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2015-05-27 18:57:09 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]