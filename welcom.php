<?php
    session_start();
    error_reporting(0);
    require_once 'conn.php';

    if (isset($_POST["btn"])) {
        
        session_destroy();
        Header('Location: connect.php');
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

    <div class="container">
        <div class="row align-items-center vh-100">
            <div class="col-6 mx-auto">
                <div class="card shadow border">
                    <div class="card-body d-flex p-5 flex-column align-items-center">
                        <p class="card-text p-3" style="letter-spacing: 5px;">Welcome <strong class="card-text display-1"><?php echo $_SESSION["user"]; ?></strong><br><label class="text-warning" style="letter-spacing: 5px;">You will see something new</label></p>
                        <form action="" method="POST">
                            <button type="submit" name="btn" class="btn btn-primary">
                                LogOut <span class="badge text-warning"><i class="fa-solid fa-right-from-bracket"></i></span>
                            </button>
                        </form>
                    </div>
                </div>
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