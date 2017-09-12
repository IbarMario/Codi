<?php defined('SYSPATH') or die('No direct script access.'); ?>

2014-12-27 10:23:10 --- ERROR: ErrorException [ 8 ]: Undefined index: id_seg ~ APPPATH/classes/controller/bandeja.php [ 99 ]
2014-12-27 10:40:12 --- ERROR: ErrorException [ 8 ]: Undefined index: id_seg ~ APPPATH/classes/controller/bandeja.php [ 99 ]
2014-12-27 10:40:18 --- ERROR: ErrorException [ 8 ]: Undefined index: id_seg ~ APPPATH/classes/controller/bandeja.php [ 99 ]
2014-12-27 10:40:24 --- ERROR: ErrorException [ 8 ]: Undefined index: id_seg ~ APPPATH/classes/controller/bandeja.php [ 99 ]
2014-12-27 10:40:31 --- ERROR: ErrorException [ 8 ]: Undefined index: id_seg ~ APPPATH/classes/controller/bandeja.php [ 99 ]
2014-12-27 10:40:44 --- ERROR: ErrorException [ 8 ]: Undefined index: id_seg ~ APPPATH/classes/controller/bandeja.php [ 99 ]
2014-12-27 13:32:57 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-12-27 14:48:25 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-12-27 14:49:04 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]