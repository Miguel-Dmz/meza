<?php 
include('conexion/conexion.php');
session_start();
$aviso = false;
$aviso2 = false;
if($_SERVER["REQUEST_METHOD"] == "POST") {

    if(isset($_POST['id']) ) {
        $productID = $_POST['id'];
        $num = $_POST['num'];
        $sql = "SELECT stock FROM productos WHERE id_Productos='$productID'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc(); 
            $original = $row['stock'];
            $sql5 = "SELECT stock FROM carrito WHERE platoid='$productID'";
            $resultados = $conn->query($sql5);
            if ($resultados->num_rows > 0) {
                $rows = $resultados->fetch_assoc();
                $nuevoSTOCK = $rows['stock'];
                $actualizar = $original + $nuevoSTOCK;
                $sql = "UPDATE productos SET stock = $actualizar WHERE id_Productos = $productID";
                if ($conn->query($sql) === TRUE) {
                    //echo "<script type='text/javascript'>alert('Actualizado');</script>";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
            else {

            }
        }
        else {
            
        }
        
        

        $sql = "DELETE FROM carrito WHERE id = $num";
        if ($conn->query($sql) === TRUE) {
            //echo "<script type='text/javascript'>alert('Borrada la tabla');</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    else {
        $accion = $_POST['accion'];
        
        if($accion == "Vaciar Carrito") {
            
                
            $sql = "SELECT * FROM carrito";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $RUTA = $row['platoid'];
                        $RUTA = $conn->real_escape_string($RUTA);

                        $sql2 = "SELECT stock FROM productos WHERE id_Productos='$RUTA'";
                        $result2 = $conn->query($sql2);

                        if ($result2->num_rows > 0) {
                            $row2 = $result2->fetch_assoc(); 
                            $original = $row2['stock'];
                            $sql5 = "SELECT stock FROM carrito WHERE platoid='$RUTA'";
                            $resultados = $conn->query($sql5);
                            if ($resultados->num_rows > 0) {
                                $rows = $resultados->fetch_assoc();
                                $nuevoSTOCK = $rows['stock'];
                                $actualizar = $original + $nuevoSTOCK;
                                $sql = "UPDATE productos SET stock = $actualizar WHERE id_Productos = $RUTA";
                                if ($conn->query($sql) === TRUE) {
                                    //echo "<script type='text/javascript'>alert('Actualizado');</script>";
                                } else {
                                    echo "Error: " . $sql . "<br>" . $conn->error;
                                }
                            }
                            else {

                            }
                        }
                        else {

                        }
                        
                    }
                    
                } else {
                    $aviso2 = true;
                    //echo "<tr><td colspan='4'>No products found</td></tr>";
                }
                
            $sql = "DELETE FROM carrito";
            if ($conn->query($sql) === TRUE) {
                $aviso2 = true;
                //echo "<script type='text/javascript'>alert('Borrada la tabla');</script>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            
        }
        else if ($accion == "Comprar") {
            //$sql = "DELETE FROM carrito";
            //if ($conn->query($sql) === TRUE) {
            //    echo "<script type='text/javascript'>alert('Compra realizada exitosamente');</script>";
            //} else {
            //    echo "Error: " . $sql . "<br>" . $conn->error;
            //}
            $aviso = true;
        }
    }
    

    

    
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KeMonito</title>
    <link rel="stylesheet" href="styleCarrito.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="encabezado">
<h1>KeMonitos</h1>
<h2>Zapatitos</h2>
</div>
<?php if ($aviso): ?>
        <script type="text/javascript">
            
            var aviso = true;
        </script>
    <?php else: ?>
        <script type="text/javascript">
            var aviso = false;
        </script>
    <?php endif; ?>

    <?php if ($aviso2): ?>
        <script type="text/javascript">
            
            var aviso2 = true;
        </script>
    <?php else: ?>
        <script type="text/javascript">
            var aviso2 = false;
        </script>
    <?php endif; ?>

  <?php include("header.php") ?>


  <div class="text">Ticket</div>
        <div class="card-container">

        <div class="login-box">
        <div class="encabezado">
                <div class="titulo">
                <h2>KeMonitos</h2>
                <h2>Zapatitos</h2>
                </div>
            </div>
        <table>
            <tr>
                <th>Imagen de Producto</th>
                <th>Nombre de Producto</th>
                <th>Precio Original</th>
                <th>Precio Total</th>
                <th>Cantidad</th>
                <th>Eliminación</th>
            </tr>
            <?php
            $sql = "SELECT * FROM carrito";
            $result = $conn->query($sql);
            $precio = 0.00;

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $precio += $row['precioTotal'];

                    echo "<tr>";
                    echo "<td><img src='" . $row['image'] . "' alt='" . $row['name'] . "' width='50' height='50'></td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>$" . $row['price'] . "</td>";
                    echo "<td>$" . $row['precioTotal'] . "</td>";
                    echo "<td>" . $row['stock'] . "</td>";
                    echo "<td><form action='carrito.php' method='POST'>";
                    echo "<input type='hidden' name='id' value='". $row['platoid'] ."'>";
                    echo "<input type='hidden' name='num' value='". $row['id'] ."'>";
                    echo "<input type='submit' name='eliminar' value='eliminar' class='elimino'>";
                    echo "</form></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'></td></tr>";
            }
            ?>
        </table>
        <?php 
        $iva = ($precio*16)/100;
        $total = $precio + $iva;
        ?>
        <h2>SubTotal: $<?php echo "$precio" ?></h2>
        <h2>IVA: $<?php echo "$iva" ?></h2>
        <h2>TOTAL: $<?php echo "$total" ?></h2>
        <form action="carrito.php" method="post" >
            <input type="submit" name="accion" value="Vaciar Carrito" class="vacio">
            <input type="submit" name="accion" value="Comprar" class="compro">
        </form>
    </div>


            
            
        </div>
        <?php include 'footer.php'; ?>

        <div id="modal" class="modal">
        <div class="modal-content">
            <div><span class="close-button" onclick="cerrarModal()">&times;</span>
            <p id="modal-message" class="mensaje-modal">Lo lamentamos, pero para comprar tiene que iniciar sesion o registrarse</p></div>
            <a href="LoginRegister.php">
                <input type="button" value="Iniciar Sesión/Registrarse" class="btn btn--3">
                
            </a>
        </div>
    </div>
    <div id="modal2" class="modal">
        <div class="modal-content">
            <div><span class="close-button" onclick="cerrarModal2()">&times;</span>
            <p id="modal-message" class="mensaje-modal">Productos Eliminados de su carrito</p></div>
        </div>
    </div>
  
    <script src="script3.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>