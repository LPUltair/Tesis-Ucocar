<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portada</title>
    <link rel="stylesheet" href="css\bootstrap.css">
    <link rel="stylesheet" href="css\style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<?php
    include('config.php');
    session_start();
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $query = $connection->prepare("SELECT * FROM users WHERE username=:username");
        $query->bindParam("username", $username, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        if (!$result) {
            echo '
                <div class="alert alert-danger pb-1 mb-0">
                    <p>Usuario o contraseña incorrecto!</p>
                </div>
            ';
        } else {
            if (password_verify($password, $result['password'])) {
                $_SESSION['user_id'] = $result['ID'];
                header("Location: main.php");
                exit;
                echo '
                    <div class="alert-succes">
                        <p>felicitaciones has ingresado!</p>
                    </div>
                ';
            } else {
                echo '
                    <div class="alert alert-danger">
                        <p>Usuario o contraseña incorrecto!</p>
                    </div>
                ';
            }
        }
            
    }
?>

<body>
    <div class="bg">
    <!-- <div class="content"> -->
        <section class="vh-100 gradient-custom">
        <div class="container-md py-2 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-dark text-white" style="border-radius: 1rem;">
                <div class="card-body p-4 text-center">

                    <div class="mt-md-2">
                        <form method="POST">
                        <h2 class="fw-bold mb-2 text-uppercase">Inicio de Sesión</h2>
                        <p class="text-white-50 mb-3">Ingrese usuario y contraseña por favor.</p>

                        <div class="form-outline form-white mb-1">
                            <input type="text" class="form-control form-control-md" name="username" pattern="[a-zA-Z0-9]+" required/>
                            <label class="form-label" for="typeEmailX">Usuario</label>
                        </div>

                        <div class="form-outline form-white mb-1">
                            <input type="password"  class="form-control form-control-md" name="password" required/>
                            <label class="form-label" for="typePasswordX">Contraseña</label>
                        </div>

                        <button class="btn btn-outline-light btn-md px-3" type="submit" name="login" value="login">Ingresar</button>
                        </form>
                    </div>

                    <div>
                    <p class="mb-0">¿No tienes una cuenta? <a href="register.php" class="text-white-50 fw-bold">Registrar</a>
                    </p>
                    </div>

                </div>
                </div>
            </div>
            </div>
        </div>
        </section>
    </div>
</body>
</html>