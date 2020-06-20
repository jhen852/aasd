<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Super Mercardo</title>
    <link href="https://fonts.googleapis.com/css?family=Raleway:200,300,400,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
    <header class="hero">
        <div class="textos-hero">
            <h1>Super Mercado</h1>
            <p>Pedidos desde Casa</p>
            <a href="#producto">Producto</a> <br>
            <a href="#cliente">Agregar Cliente</a><br>
            <a href="#mostrar">Mostrar Cliente</a><br>
            <!-- <a href="#mostrando">Mostrar Cliente</a> -->
        </div>
        <div class="svg-hero" style="height: 150px; overflow: hidden;"><svg viewBox="0 0 500 150" preserveAspectRatio="none"
                style="height: 100%; width: 100%;">
                <path d="M0.00,49.98 C149.99,150.00 349.20,-49.98 500.00,49.98 L500.00,150.00 L0.00,150.00 Z"
                    style="stroke: none; fill: #fff;"></path>
            </svg></div>
    </header>
    <section class="galeria">
        <div class="contenedor">
            <h2 class="titulo">Productos</h2>
            <article class="galeria-cont">
                <img src="img/uno.jpg" alt="">
                <img src="img/dos.jpg" alt="">
                <img src="img/tres.jpg" alt="">
                <img src="img/cuatro.jpg" alt="">
                <img src="img/cinco.jpg" alt="">
                <img src="img/seis.jpg" alt="">
                <a href="" class="ctp">HACER PEDIDO</a>
            </article>
        </div>
    </section>

    <section class="info-last">

        <div class="contenedor last-section">
            <div class="contenedor-textos-main">
                <h2 class="titulo left">Super Mercado</h2>
                <p class="parrafo">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolorum reprehenderit nostrum expedita quasi odio architecto laudantium sunt nemo dicta atque?</p>
                <a href="" class="cta">Direccion</a>
            </div>
            <img src="img/mercado.jpg">
        </div>
        
        <div class="svg-wave" style="height: 150px; overflow: hidden;"><svg viewBox="0 0 500 150" preserveAspectRatio="none"
            style="height: 100%; width: 100%;">
            <path d="M0.00,49.98 C149.99,150.00 349.20,-49.98 500.00,49.98 L500.00,150.00 L0.00,150.00 Z"
                style="stroke: none; fill: #f5576c;"></path>
        </svg></div>
    </section>
<!-- 
    <footer id="producto">
        <div class="contenedor">
            <h2 class="titulo">Productos</h2>
            <form action="" class="form">
                <input class="input"  type="text" name="" id="" placeholder="Nombre">
                <input class="input"  type="email" name="" id="" placeholder="Email">
                <textarea  class="input" name="" id="" cols="30" rows="10" placeholder="Mensaje"></textarea>
                <input class="input"  type="submit" value="Enviar">
            </form>
        </div>
    </footer> -->
    <footer id="cliente">
        <div class="contenedor">
            <h2 class="titulo">Agregar Cliente</h2>
            <form action="" class="form" method="POST">

                <input type="text" name="nombre" placeholder="Nombre Razon Social" class="input">
                <input type="text" name="paterno" placeholder="Apellido Paterno" class="input">

                <input type="text" name="materno" placeholder="Apellido Materno" class="input">
                <input type="text" name="direccion" placeholder="Direccion" class="input">

                <input type="text" name="fono" placeholder="Fono" class="input">
                <input type="text" name="nit" placeholder="Nit" class="input">
                <input type="text" name="ci" placeholder="CI" class="input"><br>

                <input class="input"  type="submit" value="Enviar">
                <input type="submit" name="guardar" value="Agregar" class="input">
                <input type="submit" name="mostrar" value="Mostrar" class="input" >
            </form>
        </div>
    </footer>
    <div style="height: 150px; overflow: hidden;" ><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;"><path d="M0.00,49.98 C143.62,119.89 336.05,-24.17 500.00,49.98 L500.00,0.00 L0.00,0.00 Z" style="stroke: none; fill: #f5576c;"></path></svg></div>
    <?php
        include ("conexion.php");
        if (isset($_POST['guardar'])) {
            $nombre=$_POST['nombre'];
            $paterno=$_POST['paterno'];
            $materno=$_POST['materno'];
            $direccion=$_POST['direccion'];
            $fono=$_POST['fono'];
            $nit=$_POST['nit'];
            $ci=$_POST['ci'];
            $sql="INSERT INTO CLIENTE (nit,ci,paterno,materno,nombre_RazonSocial,direccion,fono)VALUES('$nit','$ci','$paterno','$materno','$nombre','$direccion','$fono')";
            $ejecutar= sqlsrv_query($conn,$sql);
            if ($ejecutar) {
                echo "Se inserto correctamente";
            }else {
                echo "FALLO";
            }

        } 
        if (isset($_POST['mostrar'])) {
    ?>

            <table class="bg-amarillo contenedor sombra" id="mostrar">
            <tbody>
                <tr class="head">
                            <td>CI</td>
                            <td>NOMBRE</td>
                            <td>APELLIDO PATERNO</td>
                            <td>APELLIDO MATERNO</td>
                            <td>DIRECCION</td>
                            <td>NIT</td>
                            <td>FONO</td>
                            <td >Editar</td>
                            <td >Eliminar</td>
                </tr>
                <?php

                        $consulta ="SELECT * FROM CLIENTE";     
                        $ejecutar=sqlsrv_query($conn,$consulta);       
               ?>
                      <h3 class="titulo"><center>Mostrando...</center></h3>
               <?php   
                        while ($fila=sqlsrv_fetch_array($ejecutar)) {
                            $nombre=$fila['nombre_RazonSocial'];
                            $paterno=$fila['paterno'];
                            $materno=$fila['materno'];
                            $direccion=$fila['direccion'];
                            $fono=$fila['fono'];
                            $nit=$fila['nit'];
                            $ci=$fila['ci'];
             ?>
        
                <tr align="center">
                            <td><?php echo  $ci; ?></td>
                            <td><?php echo   $nombre;?></td>
                            <td><?php echo  $paterno; ?></td>
                            <td><?php echo  $materno; ?></td>
                            <td><?php echo  $direccion; ?></td>
                            <td><?php echo  $nit; ?></td>
                            <td><?php echo  $fono; ?></td>
                            <td><a href="UPDATE.php?editar=<?php echo $ci; ?>"  class="btn__update" >Editar</a></td>
                            <td><a href="index1.php?borrar=<?php echo $ci; ?>" class="btn__delete">Borrar</a></td>
        
                        </tr>
                        <?php  } ?>
                        <?php
             }
                                  if (isset($_GET['borrar'])) {
                                      $borrar=$_GET['borrar'];
                                      $consulta="DELETE FROM CLIENTE WHERE ci='$borrar'";
                                      $ejecutar = sqlsrv_query($conn, $consulta);
        
                    if($ejecutar){
                        echo "<script>alert('El usuario ha sido borrado')</script>";
                        echo "<script>window.open('INDEX1.php', '_self')</script>";
                    }   
                                  }
                            
                        ?>
                        
          </tbody>   
        </table>
        

    <script src="https://kit.fontawesome.com/c15b744a04.js" crossorigin="anonymous"></script>
</body>
</html>