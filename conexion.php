<?php
  //NOMBRE DE TU SERVIDOR
    $severName="DESKTOP-JIQ06IT";
    //EL NOMBRE DE lA BASE DE DATOS QUE UTILIZAREMOS EN ESTE EJEMPLO EL DE SUPER MERCADO
    //$connectionInfo = array("Database"=>"Super_Mercado1", "UID"=>"quispeJ", "PWD"=>"123", "CharacterSet"=>"UTF-8");
    $connectionInfo=array("Database"=>"Super_Mercado");
    $conn=sqlsrv_connect($severName,$connectionInfo);
    if ($conn) {
        echo "Conexion exitosa";
    }else {
         echo "no se pudo conectar";
    }
?>
