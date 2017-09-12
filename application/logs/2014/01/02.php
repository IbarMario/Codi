<?php defined('SYSPATH') or die('No direct script access.'); ?>

2014-01-02 08:46:22 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'and p.estado = 1
                and e.estado = 1
                and a.estado =' at line 6 ( select a.id, a.codigo, a.partida
                from pvprogramaticas p 
                inner join pvejecuciones e on p.id = e.id_programatica
                inner join pvpartidas a on e.id_partida = a.id
                where p.id = 
                and p.estado = 1
                and e.estado = 1
                and a.estado = 1 ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-01-02 08:46:39 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'and p.estado = 1
                and e.estado = 1
                and a.estado =' at line 6 ( select a.id, a.codigo, a.partida
                from pvprogramaticas p 
                inner join pvejecuciones e on p.id = e.id_programatica
                inner join pvpartidas a on e.id_partida = a.id
                where p.id = 
                and p.estado = 1
                and e.estado = 1
                and a.estado = 1 ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-01-02 08:46:52 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'and p.estado = 1
                and e.estado = 1
                and a.estado =' at line 6 ( select a.id, a.codigo, a.partida
                from pvprogramaticas p 
                inner join pvejecuciones e on p.id = e.id_programatica
                inner join pvpartidas a on e.id_partida = a.id
                where p.id = 
                and p.estado = 1
                and e.estado = 1
                and a.estado = 1 ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-01-02 10:16:04 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-01-02 10:25:50 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-01-02 11:02:33 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-01-02 15:05:04 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-01-02 15:26:06 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'and p.estado = 1
                and e.estado = 1
                and a.estado =' at line 6 ( select a.id, a.codigo, a.partida
                from pvprogramaticas p 
                inner join pvejecuciones e on p.id = e.id_programatica
                inner join pvpartidas a on e.id_partida = a.id
                where p.id = 
                and p.estado = 1
                and e.estado = 1
                and a.estado = 1 ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-01-02 15:26:22 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'and p.estado = 1
                and e.estado = 1
                and a.estado =' at line 6 ( select a.id, a.codigo, a.partida
                from pvprogramaticas p 
                inner join pvejecuciones e on p.id = e.id_programatica
                inner join pvpartidas a on e.id_partida = a.id
                where p.id = 
                and p.estado = 1
                and e.estado = 1
                and a.estado = 1 ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-01-02 15:43:41 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'and p.estado = 1
                and e.estado = 1
                and a.estado =' at line 6 ( select a.id, a.codigo, a.partida
                from pvprogramaticas p 
                inner join pvejecuciones e on p.id = e.id_programatica
                inner join pvpartidas a on e.id_partida = a.id
                where p.id = 
                and p.estado = 1
                and e.estado = 1
                and a.estado = 1 ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-01-02 15:54:11 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-01-02 15:55:46 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-01-02 15:55:57 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-01-02 15:56:40 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-01-02 15:57:50 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-01-02 15:58:00 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-01-02 15:58:10 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-01-02 15:59:00 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-01-02 16:29:22 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-01-02 16:39:14 --- ERROR: ErrorException [ 8 ]: Undefined index: buscar ~ APPPATH/classes/controller/busqueda.php [ 37 ]
2014-01-02 16:48:19 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-01-02 16:49:20 --- ERROR: ErrorException [ 8 ]: Undefined index: buscar ~ APPPATH/classes/controller/busqueda.php [ 37 ]
2014-01-02 17:59:30 --- ERROR: ErrorException [ 8 ]: Undefined index: buscar ~ APPPATH/classes/controller/busqueda.php [ 37 ]
2014-01-02 17:59:42 --- ERROR: ErrorException [ 8 ]: Undefined index: buscar ~ APPPATH/classes/controller/busqueda.php [ 37 ]
2014-01-02 18:08:06 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-01-02 18:12:59 --- ERROR: ErrorException [ 8 ]: Undefined index: buscar ~ APPPATH/classes/controller/busqueda.php [ 37 ]
2014-01-02 18:13:11 --- ERROR: ErrorException [ 8 ]: Undefined index: buscar ~ APPPATH/classes/controller/busqueda.php [ 37 ]
2014-01-02 18:58:39 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-01-02 19:14:26 --- ERROR: ErrorException [ 8 ]: Undefined index: buscar ~ APPPATH/classes/controller/busqueda.php [ 37 ]