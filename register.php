<?php 

require 'connect.php';

if(isset($_POST["register"])){

    if(registrasi($_POST) > 0){
        echo "<script>
            alert('User has been added succesfully');
            document.location.href = 'login.php';
        </script>";

    }else{
        echo mysqli_error($conn);
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <title>Registrasi</title>
    <style type="text/css">
        body{
            padding-top:170px;
            background: linear-gradient(90deg, rgba(58,79,180,1) 0%, rgba(70,136,255,1) 50%, rgba(69,252,244,1) 100%);
        }
        .card{
            box-shadow: 1px 2px 8px rgba(0, 0, 0, 0.65);
            padding:35px;
        }
        .form-signup{
            margin: 0 auto;
            max-width: 350px;
        }
        .form-group{
            margin-top:10px;
            margin-bottom:10px;
        }
        img{
            margin-left:70px;
        }
    </style>
</head>
<body>

<div class="container">

    <form action="" method="post" class="form-signup">
        <div class="card">
            <h3>Register <i class='fa fa-user'></i></h3>
            <p>Create an account</p>
            <div class="form-group">
                <input type="text" name="username" id="username" class="form-control" placeholder="Username" required  autocomplete="off">
            </div>
            <div class="form-group">
                <input type="password" name="password" id="password" class="form-control" placeholder="Password">
            </div>
            <div class="form-group">
                <input type="password" name="conf_password" id="conf_password" class="form-control" placeholder="Konfirmasi Password">
            </div>
            <div class="form-group">
                <div class="d-grid gap-2">
                    <button class="btn btn-primary" type="submit" name="register" value="Submit">Regist</button>
                </div>
            </div>
        </div>
    </form>    
</div>

</body>
</html>