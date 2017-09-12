<?php defined('SYSPATH') or die('No direct script access.'); ?>

2014-06-03 10:10:58 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-06-03 10:24:03 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-06-03 10:58:18 --- ERROR: ErrorException [ 8 ]: Undefined index: aceptar ~ APPPATH/classes/controller/hojaruta.php [ 71 ]
2014-06-03 10:58:28 --- ERROR: ErrorException [ 8 ]: Undefined index: aceptar ~ APPPATH/classes/controller/hojaruta.php [ 71 ]
2014-06-03 11:47:37 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-06-03 11:50:59 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-06-03 14:48:49 --- ERROR: ErrorException [ 2 ]: session_start(): The session id is too long or contains illegal characters, valid characters are a-z, A-Z, 0-9 and '-,' ~ SYSPATH/classes/kohana/session/native.php [ 43 ]
2014-06-03 16:18:05 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-06-03 16:39:21 --- ERROR: Database_Exception [ 0 ]: [1267] Illegal mix of collations (latin1_swedish_ci,IMPLICIT) and (utf8_general_ci,COERCIBLE) for operation '=' ( SELECT `documentos`.* FROM `documentos` WHERE `cite_original` = 'CAR/MDPYEP/DGA/RRHH N 0255′2014' AND `id_oficina` = '59' LIMIT 1 ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-06-03 17:07:32 --- ERROR: ErrorException [ 2 ]: session_start(): The session id is too long or contains illegal characters, valid characters are a-z, A-Z, 0-9 and '-,' ~ SYSPATH/classes/kohana/session/native.php [ 43 ]
2014-06-03 17:25:10 --- ERROR: Database_Exception [ 0 ]: [1267] Illegal mix of collations (latin1_swedish_ci,IMPLICIT) and (utf8_general_ci,COERCIBLE) for operation '=' ( SELECT `documentos`.* FROM `documentos` WHERE `cite_original` = 'vο 77g/2arイ' AND `id_oficina` = '59' LIMIT 1 ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-06-03 17:25:16 --- ERROR: Database_Exception [ 0 ]: [1267] Illegal mix of collations (latin1_swedish_ci,IMPLICIT) and (utf8_general_ci,COERCIBLE) for operation '=' ( SELECT `documentos`.* FROM `documentos` WHERE `cite_original` = 'vο 77g/2arイ' AND `id_oficina` = '59' LIMIT 1 ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-06-03 17:44:31 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2014-06-03 17:58:31 --- ERROR: ErrorException [ 8 ]: Undefined index: sw_contenido ~ APPPATH/classes/controller/documento.php [ 528 ]
2014-06-03 18:01:12 --- ERROR: ErrorException [ 8 ]: Undefined index: sw_contenido ~ APPPATH/classes/controller/documento.php [ 528 ]
2014-06-03 18:02:36 --- ERROR: ErrorException [ 8 ]: Undefined index: sw_contenido ~ APPPATH/classes/controller/documento.php [ 528 ]
2014-06-03 18:04:09 --- ERROR: ErrorException [ 8 ]: Undefined index: sw_contenido ~ APPPATH/classes/controller/documento.php [ 528 ]
2014-06-03 18:07:08 --- ERROR: ErrorException [ 8 ]: Undefined index: sw_contenido ~ APPPATH/classes/controller/documento.php [ 528 ]