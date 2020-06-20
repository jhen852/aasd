<?php 
$serverName = "DESKTOP-JIQ06IT";
$connectionInfo = array("Database"=>"Super_Mercado1");

$conn = sqlsrv_connect( $serverName, $connectionInfo);
if( $conn === false )
{
echo "No es posible conectarse al servidor.</br>";
die( print_r( sqlsrv_errors(), true));
}else{
    
    $sql = "{call mostrar()}";
     $stmt = sqlsrv_prepare($conn, $sql);
     if (!sqlsrv_execute($stmt)) {
         echo "Fallo";
         die;
     }
     echo "Procedimiento "."<br/><br/>"; 
     while($row = sqlsrv_fetch_array($stmt)){
         echo $row[0];
         echo $row[1];
         echo $row[2];
         echo $row[3];
         echo $row[4];
         echo $row[5];
         echo $row[6]."<br/>";

     }
}
echo "PROCEDIMIENTO con dos 2 parametros"."<br/><br/>"; 
$sql = "{call myproc(?,?)}";
$uno='111';
$dos='1/1/2014';
$parametros=array(
    array( &$uno, SQLSRV_PARAM_IN ),
    array( &$dos, SQLSRV_PARAM_IN )
);
     $stmt = sqlsrv_prepare($conn, $sql,$parametros);
     if (!sqlsrv_execute($stmt)) {
         echo "Fallo";
         die;
     }
     while($row = sqlsrv_fetch_array($stmt)){
         //echo $row[0].;
         echo $row[0];
         echo $row[1]."<br/>";

     }

echo "VISTA"."<br/>"; 
echo "mostrar todos los registros de cargo con una vista"."<br/><br/>"; 
$sql ="SELECT * FROM dbo.view2";     
$ejecutar=sqlsrv_query($conn,$sql);  
     $stmt = sqlsrv_prepare($conn, $sql);
     if (!sqlsrv_execute($stmt)) {
         echo "Fallo";
         die;
     }
     while($row = sqlsrv_fetch_array($stmt)){
         echo $row[0];
        echo $row[1];
         echo $row[2]."<br/>";

     }

?>
