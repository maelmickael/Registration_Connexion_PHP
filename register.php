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
    error_reporting(0);
    require_once 'conn.php';

    if (isset($_POST["psd"]) && isset($_POST["mail"]) && isset($_POST["pwd"])) {
        
        $psd = $_POST["psd"];
        $mail = $_POST["mail"];
        $pwd = $_POST["pwd"];

        if (!empty($psd) && !empty($mail) && !empty($pwd)) {
            $pseudo = input_($psd);
            $email = input_($mail);
            $password = input_($pwd);

            if (!preg_match("/^[a-zA-Z]*$/",$pseudo)) {
                $errPsd = "<label class='text-danger'> Pseudo not correct </label>";
            }else {
                $successPsd = "<label class='text-success'> Pseudo is correct </label>";
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errMail = "<label class='text-danger'> write mail correctly </label>";
            }else {
                $successMail = "<label class='text-success'> Mail is correct </label>";
            }

            if (strlen($password) < 4) {
                $errPwd = "<label class='text-warning'>Passwords not strong </label>";
            } else {
                $successPwd = "<label class='text-success'> Password is good </label>";
            }
            
            
            if ($successPsd && $successMail && $successPwd) {

                $insert = " INSERT INTO `regist`(`id`, `pseudo`, `mail`, `pwd`)
                                VALUES ('','$pseudo','$email','$password') ";
                $result = mysqli_query($conn, $insert);
                    
                if ($result) {
                    
                    echo '<script type="text/javascript">swal("'.$pseudo.'", " is add in the database successfully ", "success");</script>';
                }else {
                    echo 'Recording failed ' . $insert . mysqli_error($conn);
                }
            }
               
            

        }else {
            echo '<script type="text/javascript">swal("Oupss...!", "One of any fields connot be empty", "error");</script>';
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


    <div class="container mt-3 text-center" style="width: 35rem;"><br>
    <img src="img/logo.png" width="250px" alt="logo">
       <div class="card mt-3">
        <div class="card-body p-5">
            <figure>
                <blockquote class="blockquote">
                    <p class="display-6 text-info">SignUp</p>
                </blockquote>
                <figcaption class="blockquote-footer">
                    Write your <cite title="Source Title">correct informations</cite>
                </figcaption>
            </figure>
            <form action="" method="post" id="form" class="text-start">
                <div class="mb-3 mt-3 abs">
                    <label for="psd" class="form-label">Pseudo</label>
                    <input type="text" name="psd" id="psd" class="form-control" value="<?php echo $pseudo; ?>">
                    <span><?php echo $errPsd; ?></span>
                    <span><?php echo $successPsd; ?></span>
                </div>
                <div class="mb-3 abs">
                    <label for="mail" class="form-label">Email</label>
                    <input type="mail" name="mail" id="email" class="form-control" value="<?php echo $email; ?>">
                    <span><?php echo $errMail; ?></span>
                    <span><?php echo $successMail; ?></span>
                </div>
                <div class="mb-3 abs">
                    <label for="pwd" class="form-label">Password</label>
                    <input type="password" name="pwd" id="pwd" class="form-control" value="<?php echo $password; ?>">
                    <span><?php echo $errPwd; ?></span>
                    <span><?php echo $successPwd; ?></span>
                </div>
                <div class="form-check form-switch mb-3">
                    <input class="form-check-input" type="checkbox" role="switch" id="chk">
                    <label class="form-check-label" for="chk">Remember me</label>
                </div>
                <div class="d-grid mb-3">
                    <button type="submit" id="submit" class="btn btn-outline-info" onclick="error()">SignUp</button>
                </div>
            </form>
            <a href="connect.php" style="color: rgba(11, 124, 180, 0.5);text-decoration: none;"><em>I've an account yet? Go to connexion right now</em> <i class="fa-solid fa-arrow-right-long"></i></a>
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