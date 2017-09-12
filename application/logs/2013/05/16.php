<?php defined('SYSPATH') or die('No direct script access.'); ?>

2013-05-16 10:08:18 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2013-05-16 15:42:21 --- ERROR: ErrorException [ 8 ]: Undefined index: buscar ~ APPPATH/classes/controller/busqueda.php [ 37 ]
2013-05-16 15:43:38 --- ERROR: ErrorException [ 8 ]: Undefined index: buscar ~ APPPATH/classes/controller/busqueda.php [ 37 ]
2013-05-16 15:46:15 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2013-05-16 16:31:53 --- ERROR: ErrorException [ 8 ]: Undefined index: buscar ~ APPPATH/classes/controller/busqueda.php [ 37 ]
2013-05-16 17:18:59 --- ERROR: ErrorException [ 8 ]: Undefined index: buscar ~ APPPATH/classes/controller/busqueda.php [ 37 ]
2013-05-16 17:19:59 --- ERROR: ErrorException [ 8 ]: Undefined index: buscar ~ APPPATH/classes/controller/busqueda.php [ 37 ]
2013-05-16 17:20:10 --- ERROR: ErrorException [ 8 ]: Undefined index: buscar ~ APPPATH/classes/controller/busqueda.php [ 37 ]
2013-05-16 17:20:20 --- ERROR: ErrorException [ 8 ]: Undefined index: buscar ~ APPPATH/classes/controller/busqueda.php [ 37 ]