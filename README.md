# ticket
debes contar con un servidor o bien el programa XAMP para ejecutar este mini sistema de tickets, el cual necesita PHP y mysql o mariadb para ejecutarse de forma correcta.

en el archivo funciones, debes modificar el usuario y password por el corresponda al de tu base de datos, de esta manera se modificara en el resto del programa

dudas a: victor_hugo_perez87@hotmail.com

Se debe Crear una Base de datos con el nombre "tickets" con utf-8 en español, o bien modificar las sentencias, anexo a esto los SQL necesarios para que sea mas facil, generar las tablas con sus valores
Tablas a crear

tabla "estatus"
Campos
"id"		tipo INT Not null auto incrementado
"estado" 	tipo tinytext 50 caracteres 
CREATE TABLE `tickets`.`estatus` ( `id` INT(11) NOT NULL AUTO_INCREMENT , `estado` TINYTEXT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB; 
-----------------------------------------------------------

tabla "tickets"
"folio"			tipo int autoincrement no null
"fecha_levantamiento"	tipo tinytext 50 caracteres
"usuario" 		tipo varchar 50 caracteres
"correo"		tipo varchar 50 caracteres
"departamento"		tipo varchar 50 caracteres
"ip"			tipo varchar 50 caracteres
"sucursal"		tipo tinytext 20 caracteres
"falla"			tipo tinytext 150 caracteres
"solucion"		tipo tinytext 250 caracteres
"estatus"		tipo int 5 caracteres

CREATE TABLE `tickets`.`tickets` ( `folio` INT NOT NULL AUTO_INCREMENT , `fecha_levantamiento` TINYTEXT NOT NULL , `usuario` VARCHAR(50) NOT NULL , `correo` VARCHAR(50) NOT NULL , `departamento` VARCHAR(50) NOT NULL , `ip` VARCHAR(50) NOT NULL , `sucursal` TINYTEXT NOT NULL , `falla` TINYTEXT NOT NULL , `solucion` TINYTEXT NOT NULL , `estatus` INT(5) NOT NULL , PRIMARY KEY (`folio`)) ENGINE = InnoDB; 
-----------------------------------------------------------

tabla "usuarios"
"usuario" tipo tinytext 
"password" tipo tinytext 


CREATE TABLE `tickets`.`usuarios` ( `usuario` TINYTEXT NOT NULL , `password` TINYTEXT NOT NULL ) ENGINE = InnoDB; 
---------------------------------------------------------
