<?php 
session_start();
include('conexion/conexion.php');
$usuarioInfound = false;
$passwordIncorrect = false;
if (isset($_POST['accion'])) {
    $accion = $_POST['accion'];
    if ($accion == "login") {
        if($_SERVER["REQUEST_METHOD"] == "POST") {

            $username = $_POST['username'];
            $password = $_POST['clave'];

            
            //Prevenir SQL Injection
            $username = $conn->real_escape_string($username);
            $password = $conn->real_escape_string($password);

            $sql = "SELECT id_Cliente, password FROM cliente WHERE nombre='$username'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                if (password_verify($password,$row['password'])) {
                    $_SESSION['login_user']=$username;
                    if ($_SESSION['login_user'] == "Cesar_Admin") {
                        header("Location: PerfilAdmin/PerfilAdmin.php");
                    }
                    else {
                        header("Location: PerfilCliente/PaginaPrincipal.php");
                    }
                    
                }
                else {
                    $usuarioInfound = true;

                /*echo "Invalid password";*/ 
                }
                
            }
            else {
                $passwordIncorrect = true;
                /*echo "No user found.";*/
            }
        }
    }
    else if ($accion == "register") {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST['user'];
            $password = $_POST['password'];
            $correo = $_POST['correo'];
            $direccion = $_POST['direccion'];
            $telefono = $_POST['telefono'];

            // Prevenir SQL Injection
            $username = $conn->real_escape_string($username);
            $password = $conn->real_escape_string($password);
            $correo = $conn->real_escape_string($correo);
            $direccion = $conn->real_escape_string($direccion);
            $telefono = $conn->real_escape_string($telefono);
        
            // Hash de la contraseña
            $password_hashed = password_hash($password, PASSWORD_BCRYPT);
        
            $sql = "INSERT INTO cliente (nombre, correo, password, direccion, telefono) VALUES ('$username', '$correo','$password_hashed', '$direccion', '$telefono')";
        
            if ($conn->query($sql) === TRUE) {
                $shouldShowAlert = true;
        
            if ($shouldShowAlert) {
                $_SESSION['login_user']=$username;
                //echo "<script type='text/javascript'>alert('Usuario registrado');</script>";
                header("Location: PerfilCliente/PaginaPrincipal.php");
            }
                /*echo "User registered successfully!";*/
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
    else {
        
    }
}
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KeMonito</title>
    <link rel="stylesheet" href="estilos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body onload="mostrarLogin()">
<div class="encabezado">
<h1>KeMonitos</h1>
<h2>Zapatitos</h2>
</div>
  <?php include("header.php") ?>

  <main>
        <div class="contenedor">
            <div class="form-container">
                <form action="LoginRegister.php" method="post" class="formulario" id="formulario-login">
                    <h2>Iniciar sesión</h2>
                    <input type="hidden" name="accion" value="login">
                    <input type="text" placeholder="Nombre de usuario" name="username" class="input" required>
                    <input type="password" placeholder="Clave" name="clave" class="input" required>
                    <input type="submit" value="Entrar" class="button">
                    <p>¿No tienes cuenta? <a href="#" id="link-registrarse">Regístrate aquí</a></p>
                </form>
                <form action="LoginRegister.php" method="post" class="formulario" id="formulario-register">
                    <h2>Crea tu cuenta</h2>
                    <input type="hidden" name="accion" value="register">
                    
                    <input type="text" placeholder="Nombre de usuario" name="user" class="input" required>
                    <input type="email" placeholder="Correo electrónico" name="correo" class="input" required>
                    <input type="password" placeholder="Clave" name="password" class="input" required>
                    <input type="text" placeholder="Direccion" name="direccion" class="input" required>
                    <input type="number" placeholder="Telefono" name="telefono" class="input" required>
                    <input type="submit" value="Crear cuenta" class="button">
                    <p>¿Ya tienes cuenta? <a href="#" id="link-iniciar-sesion">Inicia sesión aquí</a></p>
                </form>
            </div>
        </div>
        
        
    </main>
    <?php if ($usuarioInfound): ?>
        <script type="text/javascript">
            
            var usuarioInfound = true;
        </script>
    <?php else: ?>
        <script type="text/javascript">
            var usuarioInfound = false;
        </script>
    <?php endif; ?>

    <?php if ($passwordIncorrect): ?>
        <script type="text/javascript">
            
            var passwordIncorrect = true;
        </script>
    <?php else: ?>
        <script type="text/javascript">
            var passwordIncorrect = false;
        </script>
    <?php endif; ?>

  

  <?php include("footer.php") ?>
  <script src="script2.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>