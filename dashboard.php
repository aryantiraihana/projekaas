<?php 

require 'connect.php';

$transaksi = query("SELECT tanggal, sum(jmltiket) as jmltiket,sum(total) as total FROM transaksi group by tanggal ORDER BY tanggal DESC");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css"> 
    <style>
      body{
        background: linear-gradient(90deg, rgba(58,79,180,1) 0%, rgba(70,136,255,1) 50%, rgba(69,252,244,1) 100%);
      }
      h4{
        color:#FFFFFF;
      }
      .container{
        padding-top:50px;
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
            <a href="#">Beranda</a>
            <a href="pembelian.php">Pemesanan</a>
        </div>

        <div class="logout">
            <a href="index.php">Logout</a>
        </div>
    </div>

    <br>
    <br>
    <div class="container">
    <h4 class="text-center">Laporan Pemesanan Tiket SeaLife</h4>
    <table class="table table-striped">
    <thead class="table-light">
      <tr>
        <th scope="col">No.</th>
        <th scope="col">Tanggal</th>
        <th scope="col">Jumlah Tiket</th>
        <th scope="col">Total</th>
      </tr>
    </thead>

    <?php $i = 1; ?>
    <?php foreach ($transaksi as $pay) :?>

    <tbody>
      <tr>
        <th scope="row"><?= $i ?></th>
        <td><?= $pay["tanggal"]; ?></td>
        <td><?= $pay["jmltiket"]; ?></td>
        <td><?= $pay["total"]; ?></td>
      </tr>
      
      <?php $i++; ?>
      <?php endforeach ?>
    </tbody>

  </table>
</div>
</body>
</html>