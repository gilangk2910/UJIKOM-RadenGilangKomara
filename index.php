<?php
    session_start();
    require 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Halaman Utama</title>
</head>
<body>


<div class="container mt-4 card p-2" style="background-color: #FFA500;">
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
  <a class="navbar-brand" style="color:#000000;"><h4>UNIBOOKSSTORE</h4></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#"><h6>Home</h6></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="admin.php"><h6>Admin</h6></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="pengadaan.php"><h6>Pengadaan</h6></a>
        </li>
      </ul>
      <form method="GET" action="" class="d-flex" role="search">
        <input class="form-control me-2" name="search" type="text" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success " type="submit">Search</button>
      </form>
    </nav>
    
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 align="center">
                    Data Buku
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr class="table-dark">
                                <th>ID Buku</th>
                                <th>Kategori</th>
                                <th>Nama Buku</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th>Penerbit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $keyword = isset($_GET['search']) ? $_GET['search'] : '';
                                $query = "SELECT * FROM buku JOIN penerbit ON buku.id_penerbit=penerbit.id_penerbit";
                                if ($keyword != '') {
                                    $query = $query . " " . "WHERE nama_buku LIKE '%$keyword%' ";
                                }
                                $query_result = mysqli_query($koneksi, $query);
                                if (mysqli_num_rows($query_result) > 0){
                                    foreach ($query_result as $buku){
                                    ?>
                                    <tr>
                                        <td><?= $buku['id']; ?></td>
                                        <td><?= $buku['kategori']; ?></td>
                                        <td><?= $buku['nama_buku']; ?></td>
                                        <td><?= $buku['harga']; ?></td>
                                        <td><?= $buku['stok']; ?></td>
                                        <td><?= $buku['nama']; ?></td>
                                    </tr>
                            <?php
                                    }
                                } else {
                                    echo '<h5 class="text-center">Tidak ada data tersedia</h5>';
                                }
                            ?>
                        </tbody>
                    </table>
