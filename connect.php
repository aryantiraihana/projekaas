<?php 

$conn = mysqli_connect("localhost", "id20939783_aryantiraihana", "HA~SL}ilC*=P?V<6", "id20939783_admin");


function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $boxs = [];
        while($box = mysqli_fetch_assoc($result)){
            $boxs[] = $box;
        }
        return $boxs;
}

function input($data){
    global $conn;
    $tanggal = htmlspecialchars($data["tanggal"]);
    $harga = htmlspecialchars($data["harga"]);
    $jmltiket = htmlspecialchars($data["jmltiket"]);
    $total = htmlspecialchars($data["total"]);


    $query = "INSERT INTO transaksi
            VALUES ('','', '$tanggal', '$harga','$jmltiket','$total')
            ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function registrasi($data){
    global $conn;

    $username = strtolower(stripslashes(htmlspecialchars($data["username"])));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $conf_password = mysqli_real_escape_string($conn, $data["conf_password"]);

    $result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");
    if (mysqli_fetch_assoc($result)){
        echo "<script>
            alert('Username already exist!');
            </script>";

        return false;
    }

    if($password !== $conf_password){
        echo "<script>
        alert('Those password did not match. Try again.');
        </script>";

        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($conn, "INSERT INTO users VALUES ('', '$username', '$password')");

    return mysqli_affected_rows($conn);
}



?>