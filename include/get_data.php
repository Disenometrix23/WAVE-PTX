<?php 
    /**
     * Archivo que obtiene el listado de los leads
     * @var [leads] Array leads
     */
    $get_leads  = $connection->prepare("SELECT fecha, origen, nombre, tel, email FROM formulario ORDER BY fecha DESC");
    $get_leads->execute();
    $leads      = $get_leads->fetchAll();

    $connection = null;
?>