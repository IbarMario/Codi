<?php defined('SYSPATH') or die('No direct script access.'); ?>

2013-12-27 10:41:41 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2013-12-27 10:50:27 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2013-12-27 10:57:57 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2013-12-27 11:29:08 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2013-12-27 11:29:13 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2013-12-27 12:03:22 --- ERROR: ErrorException [ 8 ]: Undefined index: buscar ~ APPPATH/classes/controller/busqueda.php [ 37 ]
2013-12-27 13:11:54 --- ERROR: Database_Exception [ 0 ]: [1054] Unknown column 'id_obj_est' in 'where clause' ( SELECT `pvogestiones`.* FROM `pvogestiones` WHERE `id_obj_est` = '8' AND `id_oficina` = '11' ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2013-12-27 13:14:51 --- ERROR: Database_Exception [ 0 ]: [1054] Unknown column 'id_obj_est' in 'where clause' ( SELECT `pvogestiones`.* FROM `pvogestiones` WHERE `id_obj_est` = '3' AND `id_oficina` = '11' ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2013-12-27 13:16:10 --- ERROR: ErrorException [ 8 ]: Undefined index: id_tipo ~ APPPATH/views/user/inicio.php [ 137 ]
2013-12-27 13:16:25 --- ERROR: ErrorException [ 8 ]: Undefined index: id_tipo ~ APPPATH/views/user/inicio.php [ 137 ]
2013-12-27 13:16:27 --- ERROR: ErrorException [ 8 ]: Undefined index: id_tipo ~ APPPATH/views/user/inicio.php [ 137 ]
2013-12-27 13:16:35 --- ERROR: ErrorException [ 8 ]: Undefined index: id_tipo ~ APPPATH/views/user/inicio.php [ 137 ]
2013-12-27 13:17:11 --- ERROR: ErrorException [ 8 ]: Undefined index: id_tipo ~ APPPATH/views/user/inicio.php [ 137 ]
2013-12-27 13:17:41 --- ERROR: ErrorException [ 8 ]: Undefined index: id_tipo ~ APPPATH/views/user/inicio.php [ 137 ]
2013-12-27 13:31:39 --- ERROR: ErrorException [ 8 ]: Undefined index: id_tipo ~ APPPATH/views/user/inicio.php [ 137 ]
2013-12-27 14:31:44 --- ERROR: ErrorException [ 8 ]: Undefined index: id_tipo ~ APPPATH/views/user/inicio.php [ 137 ]
2013-12-27 14:31:49 --- ERROR: ErrorException [ 8 ]: Undefined index: id_tipo ~ APPPATH/views/user/inicio.php [ 137 ]
2013-12-27 14:32:00 --- ERROR: ErrorException [ 8 ]: Undefined index: id_tipo ~ APPPATH/views/user/inicio.php [ 137 ]
2013-12-27 16:00:37 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2013-12-27 16:16:39 --- ERROR: ErrorException [ 8 ]: Undefined index: id_tipo ~ APPPATH/views/user/inicio.php [ 137 ]
2013-12-27 16:17:11 --- ERROR: ErrorException [ 8 ]: Undefined index: id_tipo ~ APPPATH/views/user/inicio.php [ 137 ]
2013-12-27 16:17:18 --- ERROR: ErrorException [ 8 ]: Undefined index: id_tipo ~ APPPATH/views/user/inicio.php [ 137 ]
2013-12-27 16:17:19 --- ERROR: ErrorException [ 8 ]: Undefined index: id_tipo ~ APPPATH/views/user/inicio.php [ 137 ]
2013-12-27 16:17:20 --- ERROR: ErrorException [ 8 ]: Undefined index: id_tipo ~ APPPATH/views/user/inicio.php [ 137 ]
2013-12-27 16:17:21 --- ERROR: ErrorException [ 8 ]: Undefined index: id_tipo ~ APPPATH/views/user/inicio.php [ 137 ]
2013-12-27 16:17:23 --- ERROR: ErrorException [ 8 ]: Undefined index: id_tipo ~ APPPATH/views/user/inicio.php [ 137 ]
2013-12-27 16:17:59 --- ERROR: ErrorException [ 8 ]: Undefined index: id_tipo ~ APPPATH/views/user/inicio.php [ 137 ]
2013-12-27 17:21:52 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2013-12-27 18:31:46 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2013-12-27 18:31:54 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2013-12-27 19:29:07 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]