<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="css\bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<?php
include('config.php');
session_start();
if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cedula = $_POST['cedula'];
    $password_hash = password_hash($password, PASSWORD_BCRYPT);
    $query = $connection->prepare("SELECT * FROM users WHERE email=:email");
    $query->bindParam("email", $email, PDO::PARAM_STR);
    $query->execute();
    if ($query->rowCount() > 0) {
        echo '<div class="alert alert-primary" role="alert">
                    El correo ya esta registrado!!
                </div>';
    }
    $query = $connection->prepare("SELECT * FROM users WHERE cedula=:cedula");
    $query->bindParam("cedula", $cedula, PDO::PARAM_STR);
    $query->execute();
    if ($query->rowCount() > 0) {
        echo '<div class="alert alert-primary" role="alert">
                la cedula ya esta registrado!!
                    </div>';
    }
    if ($query->rowCount() == 0) {
        $query = $connection->prepare("INSERT INTO users(username,password,email,cedula) VALUES (:username,:password_hash,:email,:cedula)");
        $query->bindParam("username", $username, PDO::PARAM_STR);
        $query->bindParam("password_hash", $password_hash, PDO::PARAM_STR);
        $query->bindParam("email", $email, PDO::PARAM_STR);
        $query->bindParam("cedula", $cedula, PDO::PARAM_STR);
        $result = $query->execute();
        if ($result) {
            echo '<div class="alert alert-primary" role="alert">
                    Registro exitoso!!
                    </div>';
        } else {
            echo '<div class="alert alert-primary" role="alert">
                    Registro fallido!!
                </div>';
        }
    }
}
?>

<body>
    <section class="vh-100 bg-image"
    style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
        <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-10 col-lg-5 col-xl-5">
            <div class="card bg-dark text-white" style="border-radius: 15px;">
                <div class="card-body p-3 text-center">
                    <h2 class="text-uppercase text-center mb-5">Crea una cuenta</h2>

                    <form method="post" action="" name="signup-form" >
                         <div class= "d-flex justify-content-center ">
                            <div class="align-items-center">
                            <!--Elemento centrado con flexbox-->  
                                    <div class="form-outline form-white mb-4">
                                    <input type="text" id="form3Example1cg" class="form-control form-control-lg" name="username" pattern="[a-zA-Z0-9]+" require  />
                                    <label class="form-label" for="form3Example1cg">Usuario</label>
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                    <input type="email" id="form3Example3cg" class="form-control form-control-lg" name="email" require />
                                    <label class="form-label" for="form3Example3cg">Email</label>
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                    <input type="cedula" id="form3Example3cg" class="form-control form-control-lg" name="cedula" require />
                                    <label class="form-label" for="form3Example3cg">Cedula</label>
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                    <input type="password" id="form3Example4cg" class="form-control form-control-lg" name="password" require />
                                    <label class="form-label" for="form3Example4cg">Password</label>
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                    <input type="password" id="form3Example4cdg" class="form-control form-control-lg" require/>
                                    <label class="form-label" for="form3Example4cdg">Repetir el password</label>
                                    </div>
                            </div>                      
                        </div>  

                        <div class="d-flex justify-content-center">
                        <button type="submit" name="register" value="register"
                            class="btn btn-outline-light btn-md px-3">Registrar</button>
                        </div>

                        <p class="mb-0">Ya tienes una cuenta? <a href="index.php"
                            class="text-white-50 fw-bold"><u>Logea aqui</u></a></p>

                    </form>

                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    </section>







    <!-- <div class="Registro">
            <h1> Formulario de registro </h1>

            <form method="post" action="" name="signup-form">
                <div class="form-element">
                    <label>username</label>
                    <input type="text" name="username" pattern="[a-zA-Z0-9]+" require />
                </div>
                <div class="form-element">
                    <label>Email</label>
                    <input type="email" name="email" require />         
                </div>
                <div class="form-element">
                    <label>Cedula</label>
                    <input type="cedula" name="cedula" require />         
                </div>  
                <div class="form-element">
                    <label>Password</label>
                    <input type="password" name="password" require />         
                </div>
                <button type="submit" name="register" value="register">Registrar</button>
                <a href="login.php"> Ya estoy registrado </a>
            </form> 
    </div>         -->
</body>    