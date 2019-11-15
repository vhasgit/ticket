<?php session_start(); require ('funciones.php'); 

$conexion = conexion("$datodb[tabla]", "$datodb[usuario]", "$datodb[pass]");
if (!$conexion) {
  header('Location: error.php');
}

$num_tickets = contartickets($conexion); // numero total de tickets, con estatus no verificado
$ticketporhoja = 10;

$total_pag = num_paginas($num_tickets,$ticketporhoja); // calcula la paginacion en base al numero de tickets a mostrar
ceil ($total_pag);
$tickets = obtener_ticket($ticketporhoja, $conexion);

require 'views/index.view.php';


?>
