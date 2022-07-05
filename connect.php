<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
</html>
<?php

    session_start();
    error_reporting(0);
    require_once 'conn.php';

    if (isset($_POST["psd"]) && isset($_POST["pwd"])) {
        
        $psd = $_POST["psd"];
        $pwd = $_POST["pwd"];

        if (!empty($psd) && !empty($pwd)) {
            $pseudo = input_($psd);
            $password = input_($pwd);

            
            $sel = "SELECT `pseudo`, `pwd` FROM `regist`";
            $result = mysqli_query($conn, $sel);

            if (mysqli_num_rows($result) > 0) {
                
                while ($row = mysqli_fetch_assoc($result)) {
                    
                    $pseudoRow = $row["pseudo"];
                    $passwordRow = $row["pwd"];

                    if ($pseudoRow == $pseudo && $passwordRow == $password) {
                        
                        $_SESSION["user"] = $pseudoRow;
                        Header('Location: welcom.php');
                    }else {
                        echo '<script type="text/javascript">swal("Oupss...!", "You are not a member of this site, PLEASE create an account", "error");</script>';
                    }

                }
            }
            

        }else {
            echo '<script type="text/javascript">swal("Oupss...!", "Connexion require to fill all fields", "error");</script>';
        }
    }

    

    function input_($data){
        $data = trim($data);
        $data = htmlspecialchars($data);
        $data = stripslashes($data);
        return $data;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Fontawesome css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
    <!-- Link css -->
    <link rel="stylesheet" href="css/register.css">
    <title>REGISTRATION</title>
</head>
<body>


    <div class="container mt-3 text-center" style="width: 28rem;"><br><br><br>
    <img src="img/logo.png" width="250px" alt="logo">
       <div class="card mt-3">
        <div class="card-body p-5">
            <figure>
                <blockquote class="blockquote">
                    <p class="display-6 text-warning">SignUp</p>
                </blockquote>
                <figcaption class="blockquote-footer">
                    Write your <cite title="Source Title">correct informations</cite>
                </figcaption>
            </figure>
            <form action="" method="post" id="form" class="text-start">
                <div class="mb-3 mt-3 abs">
                    <label for="psd" class="form-label">Pseudo</label>
                    <input type="text" name="psd" id="psd" class="form-control">
                    <span><?php echo $errPsd; ?></span>
                    <span><?php echo $successPsd; ?></span>
                </div>
                <div class="mb-3 abs">
                    <label for="pwd" class="form-label">Password</label>
                    <input type="password" name="pwd" id="pwd" class="form-control">
                    <span><?php echo $errPwd; ?></span>
                    <span><?php echo $successPwd; ?></span>
                </div>
                <div class="form-check form-switch mb-3">
                    <input class="form-check-input" type="checkbox" role="switch" id="chk">
                    <label class="form-check-label" for="chk">Remember me</label>
                </div>
                <div class="d-grid mb-3">
                    <button type="submit" id="submit" class="btn btn-outline-warning" onclick="error()">SignUp</button>
                </div>
            </form>
            <a href="register.php" style="color: rgba(241, 196, 10, 0.7); text-decoration: none;"><em>You don't have an account?</em> <i class="fa-solid fa-arrow-right-long"></i></i></a>
        </div>
       </div>
    </div>


<!-- Bootstrap Js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js"></script>
<!-- Fontawesome Js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"></script>
<!-- link Js -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
</body>
</html