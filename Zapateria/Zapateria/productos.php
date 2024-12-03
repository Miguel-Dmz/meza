<?php 
include('conexion/conexion.php');
session_start();
$aviso = false;


if($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['nombre'];
    $imagen = $_POST['img'];
    $price = $_POST['precio'];
    $stock = $_POST['stock'];
    $productID = $_POST['product_id'];

    $stock2 = $stock;
    $name = $conn->real_escape_string($name);
    $price = $conn->real_escape_string($price);
    $productID = $conn->real_escape_string($productID);
    $imagen = $conn->real_escape_string($imagen);
    $stock2 = $conn->real_escape_string($stock2);


    $stock = $stock - 1;

    $stock = $conn->real_escape_string($stock);

    if($stock < 0) {
        $aviso = true;
        //echo "<script type='text/javascript'>alert('NO HAY PRODUCTO');</script>";
    }
    else {
        $sql = "UPDATE productos SET stock = $stock WHERE id_Productos = $productID";

    if ($conn->query($sql) === TRUE) {
        //echo "<script type='text/javascript'>alert('Actualizado');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $sql = "SELECT price, stock, precioTotal FROM carrito WHERE platoid='$productID'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nuevoStock = $row['stock'] + 1;
        $nuevoPrecio = $nuevoStock * $row['price'];

        $sql3 = "UPDATE carrito SET stock = $nuevoStock, precioTotal = $nuevoPrecio WHERE platoid = $productID";
            if ($conn->query($sql3) === TRUE) {
                //echo "<script type='text/javascript'>alert('Agregado');</script>";

            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        
            
        
        
    }
    else {
        $sql = "INSERT INTO carrito (platoid,name,price,precioTotal, stock, cantidad,image) VALUES ('$productID','$name', '$price', '$price', '1', $stock,'$imagen')";
            if ($conn->query($sql) === TRUE) {
                //echo "<script type='text/javascript'>alert('Agregado');</script>";

            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
    }

    
    }
    

    $_SESSION['nombre'] = $name;
    $_SESSION['img'] = $imagen;
    $_SESSION['precio'] = $price;
    $_SESSION['stock'] = $stock;
    $_SESSION['productID'] = $productID;

    

    //echo "<script type='text/javascript'>alert('$stock');</script>";
}
else {
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
                        }
                        else {

                        }
                        $sql5 = "SELECT stock FROM carrito WHERE platoid='$RUTA'";
                        $resultados = $conn->query($sql5);
                        if ($resultados->num_rows > 0) {
                            $rows = $resultados->fetch_assoc();
                            $nuevoSTOCK = $rows['stock'];
                            $actualizar = $original + $nuevoSTOCK;
                        }
                        else {

                        }
                        
                        $sql = "UPDATE productos SET stock = $actualizar WHERE id_Productos = $RUTA";
                    if ($conn->query($sql) === TRUE) {
                        //echo "<script type='text/javascript'>alert('Actualizado');</script>";
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
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

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleMover.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>KeMonito</title>
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

    <?php include 'header.php'; ?>

    
        <div class="card-container">

            <?php
            $sql = "SELECT * FROM productos";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<form action='productos.php' method='POST' class='card'>";
                    echo "<img src='" . $row['image'] . "' alt='" . $row['nombre'] . "' >";
                    echo "<h2>" . $row['nombre'] . "</h2>";
                    echo "<p > $" . $row['precio'] . "</p>";
                    echo "<h3 >Cantidad: " . $row['stock'] . "</h3>";

                    echo "<input name='img' type='hidden' value='" . $row['image'] . "'>";
                    echo "<input name='nombre' type='hidden' value='" . $row['nombre'] . "'>";
                    echo "<input name='precio' type='hidden' value='" . $row['precio'] . "'>";
                    echo "<input name='stock' type='hidden' value='" . $row['stock'] . "'>";

                    echo "<input name='product_id' type='hidden' value='" . $row['id_Productos'] . "'>";
                    echo "<input type='submit'  value='agregar' class='btn btn--3'>";
                    echo "</form>";
                }
            } else {
                echo "<tr><td colspan='4'>No products found</td></tr>";
            }
            ?>
            <div class="back_to_top">
        <ion-icon name="chevron-up-outline">↑</ion-icon>
    </div>
    

    <script>
        // Mostrar botón de "volver arriba" al hacer scroll
        const backToTopButton = document.querySelector(".back_to_top");
        window.addEventListener("scroll", () => {
            if (window.pageYOffset > 100) {
                backToTopButton.classList.add("show");
            } else {
                backToTopButton.classList.remove("show");
            }
        });

        // Desplazarse suavemente hacia arriba al hacer clic en el botón
        backToTopButton.addEventListener("click", () => {
            window.scrollTo({
                top: 0,
                behavior: "smooth"
            });
        });
    </script>
        </div>
        
        <?php include 'footer.php'; ?>
    
    

    <div id="modal" class="modal">
        <div class="modal-content">
            <span class="close-button" onclick="cerrarModal()">&times;</span>
            <p id="modal-message">Lo lamentamos, pero ya no hay de este producto</p>
        </div>
    </div>


    <!--<script src="script.js"></script>-->
    <script src="script4.js"></script>
<script
      type="module"
      src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"
    ></script>
    <script
      nomodule
      src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"
    ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>