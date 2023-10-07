<?php
session_start();
include("config.php");
include("User.php");


$u = new User();
$error_msg = "";

if ($_POST) {
    if (!empty($_POST['username']) && $u->authenticate($_POST['username'], $_POST['password'])) {
        $_SESSION['user_id'] = $u->getUserId(); 
        header("location: index.php");
        exit;
    } else {
        $error_msg = $u->getError(); 
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
     img.background {
      position: absolute;
      left: 0px;
      top: 0px;
      z-index: -1;
      width: auto;
      height: 100%;
      filter: blur(5px);
    }

    .blur-background {
      backdrop-filter: blur(15px);
      padding: 10px 15px;
    }
    .card {
        border-radius: 10px;
}
.btn-custom {
    background-color: #483d8b;
    color: white; 
    
}
 
    @media (min-width: 768px) {
        .container {
            max-width: 450px;
        }
    }
    </style>
</head>

<body class="d-flex justify-content-center align-items-center" style="height: 100vh;">
<img class="background" src="https://carro.sg/blog/wp-content/uploads/2016/10/s3.amazonaws.com_.jpg" alt="Aleq" >

                     <div class="container ">
                        <div class="card shadow rounded mx-auto" >
                            <div class="card-header h4 text-center " style="background: #483d8b; color: white; padding: 15px;"><i class="bi bi-                                                          person-circle  "></i> Login </div>
                             <div class="card-body">
                                <form action="" method="post"  id="loginForm" class="row g-3">
                                    <div class="col-12">
                                        <input type="hidden" name="form_action" value="signin">
                                        <label for="username" class="form-label"><i class="bi bi-person"></i>&nbsp; Username</label>
                                        <input required type="text" class="form-control" id="username" name="username"                                                               placeholder="Enter username.">
                                    </div>
                                    <div class="col-12" >
                                        <label for="password" class="form-label"><i class="bi bi-lock"></i>&nbsp; Password</label>
                                        <input required type="password"	class="form-control" id="password"   			 											name="password" placeholder="Enter Password">
                                    </div>
                                  
                                
                                        <button type="submit" name="submit" value="submit"  class="btn btn-custom">Log In</button>
                                </form>
                            </div>
                             <div class="card-footer text-center">
                <a href="signup.php" class="sign" style="text-decoration: none;">Sign Up For New User</a>
            </div>
                        </div>
                    </div>
                

          
 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <?php include("footer.html"); ?>
</body>

</html>

