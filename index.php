<?php 

require 'connect.php';


if(isset($_POST["login"])) {
    
    $username = $_POST["username"];
    $password = $_POST["password"];

    // untuk cek apakah ada usernamenya di dalam table user
    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username' ");

    
    // cek username
    // mysqli_num_rows : untuk menghitung ada berapa baris yg dikembalikan dari fungsi select, jika ada nama username maka bernilai 1 (true), jika tidak 0
    // apakah ada baris yang dikembalikan dari mysqli_num_rows
    //echo mysqli_num_rows($result)

    if( mysqli_num_rows($result) === 1 ){
        
        // cek password
        $row = mysqli_fetch_assoc($result);
        // untuk mengecek string apakah sama dengan hashnya (password_hash)
        if (password_verify($password, $row["password"]) ){

            // $_SESSION["login"] = true;

            header("Location: dashboard.php");
            exit;
        }

    }

    $error = true;

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
    
    <title>Login</title>
    <style type="text/css">
        body{
            padding-top:150px;
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
        .pop-up{
            color:red;
        }
    </style>
</head>
<body>


<div class="container">

    <form action="" method="post" class="form-signup">
        <div class="card">
            <h3>Login</h3>
            <div class="form-group">
                <input type="text" name="username" class="form-control" placeholder="Username" required  autocomplete="off">
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Password">
            </div>
            <div class="form-group">
                <div class="d-grid gap-2">
                    <button class="btn btn-primary" name="login" type="submit" value="Submit">Login</button>
                </div>
            </div>
            <p>Don't have an account yet? <a href="register.php">Regist now</a></p>
        </div>
    </form>    
</div>

</body>
</html>