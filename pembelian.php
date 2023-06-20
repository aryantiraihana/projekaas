<?php 

    require 'connect.php';
    
    if(isset($_POST["pesan"])) {
        if(input($_POST) > 0){
            echo "<script>
            alert('Pemesanan Berhasil');
             document.location.href = 'dashboard.php';
            </script>";
        }else{
            echo "<script>
            alert('Pemesanan Gagal');
             document.location.href = 'dashboard.php';
            </script>";
        }
    }
       $harga = "";
       $jmltiket = "";
       
    if(isset($_POST['harga'])and ($_POST['jmltiket'])){
       $harga = $_POST['harga'];    #mengambil nilai didalam
       $jmltiket = $_POST['jmltiket'];    #formulir sesuai name yang ada
       $hasil = $harga * $jmltiket;
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Form Pemesanan</title>
    <style type="text/css">
        body{
            background: linear-gradient(90deg, rgba(58,79,180,1) 0%, rgba(70,136,255,1) 50%, rgba(69,252,244,1) 100%);
        }
        .container{
            padding-top:80px;
        }
        .form-transaksi{
            margin: 0 auto;
            max-width: 350px;
        }
        .card{
            box-shadow: 1px 2px 30px rgba(0, 0, 0, 0.65);
            padding: 50px 35px;
        }
        .form-group{
            margin-top:10px;
            margin-bottom:10px;
        }
    </style>
</head>
<body>
    
    <div class="nav">
        <input type="checkbox" id="nav-check">
            <div class="nav-header">
                <div class="nav-title">
                SeaLife
                </div>
            </div>
            <div class="nav-btn">
                <label for="nav-check">
                <span></span>
                <span></span>
                <span></span>
                </label>
            </div>
            
            <div class="nav-links">
                <a href="dashboard.php">Beranda</a>
                <a href="#">Pemesanan</a>
            </div>

            <div class="logout">
                <a href="index.php">Logout</a>
            </div>
        </div>
    <section>
    <div class="container">    
   
    <form action="" method="post" class="form-transaksi">
        <div class="card">
        <h2>Pemesanan Tiket</h2>    
            <div class="form-group">
                <label for="">Tanggal</label>
                <input type="date" name="tanggal" value="<?php echo date('Y-m-d'); ?>" id="tanggal" required >
            </div>
            <div class="form-group">
                <label for="">Harga</label>
                <input type="text" name="harga" required value="200000" id="harga" readonly>
            </div>
            <div class="form-group">
                <label for="">Qty</label>
                <input type="number" name="jmltiket" id="jmltiket" value="<?php echo $jmltiket; ?>" required>
                <button class="btn btn-primary mt-1" type="submit" name="hitung" value = "hitung">Hitung</button>
            </div>
            <div class="form-group">
                <label for="">Total</label>
                <input type="number" name="total" id="total" value="<?php echo $hasil; ?>"  
            </div>
            <div class="form-group">
                <div class="d-grid gap-2">
                    <button class="btn btn-success mt-1" type="submit" name="pesan">Pesan Sekarang</button>
                </div>
            </div>
        </div>
    </form>
   
    </div>  
    </section>
    

</body>
</html>