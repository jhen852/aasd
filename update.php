<?php 
//obtener
include ("conexion.php");
if(isset($_GET['editar'])){
            $editar= $_GET['editar'];
            $consulta = "SELECT nombre_RazonSocial, paterno,materno,ci,nit,fono,direccion FROM cliente WHERE ci='$editar'";
            $ejecutar = sqlsrv_query($conn, $consulta);
            $fila = sqlsrv_fetch_array($ejecutar);
            $nombre=$fila['nombre_RazonSocial'];
            $paterno=$fila['paterno'];
            $materno=$fila['materno'];
            $direccion=$fila['direccion'];
            $fono=$fila['fono'];
            $nit=$fila['nit'];
            $ci=$fila['ci'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EDITAR</title>
    <link href="https://fonts.googleapis.com/css?family=Raleway:200,300,400,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/estilo_formulario.css">
</head>
<body>
    <div class="contenedor"><br><br>

        <form action="" method="post">
        <!--Actualizar Cliente-->
        <H2>ACTUALIZAR A UN CLIENTE</H2><br>
                    <div class="form-group">
                <input type="text" name="nombre1" placeholder="Nombre Razon Social" class="input__text" value="<?php echo $nombre; ?>">
                <input type="text" name="paterno1" placeholder="Apellido Paterno" class="input__text" value="<?php echo $paterno; ?>">
            </div>
            <div class="form-group">
                <input type="text" name="materno1" placeholder="Apellido Materno" class="input__text" value="<?php echo $materno; ?>">
                <input type="text" name="direccion1" placeholder="Direccion" class="input__text"  value="<?php echo $direccion; ?>">
                
            </div>
            <div class="form-group">
                <input type="text" name="fono1" placeholder="Fono" class="input__text" value="<?php echo $fono; ?>">
                <input type="text" name="nit1" placeholder="Nit" class="input__text" value="<?php echo $nit; ?>">
            </div>
            <DIV>
            <input type="text" name="ci1" placeholder="ci" class="input__text"  value="<?php echo $ci; ?>">
            </DIV>
            <div class="btn__group">
                <a href="index.php" class="btn btn__danger">Cancelar</a>
                <input type="submit" name="mostrar" value="Actualizar" class="btn btn__primary">
               
            </div>
        </form>
    </div>

<?php
//actualizar
if(isset($_POST['mostrar'])){
    $actualizado_nombre=$_POST['nombre1'];
    $actualizado_paterno=$_POST['paterno1'];
    $actualizado_materno=$_POST['materno1'];
    $actualizado_direccion=$_POST['direccion1'];
    $actualizado_fono=$_POST['fono1'];
    $actualizado_nit=$_POST['nit1'];
    $actualizado_ci=$_POST['ci1'];

     $actualizado= "UPDATE CLIENTE SET nombre_RazonSocial='$actualizado_nombre', ci='$actualizado_ci', materno='$actualizado_materno' ,paterno='$actualizado_paterno' , direccion='$actualizado_direccion' , fono='$actualizado_fono',nit='$actualizado_nit' WHERE ci='$editar'";
     $añadir = sqlsrv_query($conn, $actualizado);

        if($añadir){
            echo "<script>alert('Datos actualizados')</script>";
            echo "<script>window.open('index1.php', '_self')</script>";
        }else {
            echo "no se pudo añadir";
        }       
    }
}
    ?>
    </body>  
 </html>
