<?php


define ('RUTA', 'http://10.30.77.99:80/Victor/tickets/'); // Se agrego una constante  con la direccion del blog, para tener la ruta siempre disponible y enviar los archivos a la ruta pirncipal

/* Ip del equipo aunque este proxeado el equipo*/


function getRealIP() {

        if (!empty($_SERVER['HTTP_CLIENT_IP']))
            return $_SERVER['HTTP_CLIENT_IP'];
           
        if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
       
        return $_SERVER['REMOTE_ADDR'];
}

?>