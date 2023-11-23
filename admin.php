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
    <title>Halaman Admin</title>
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
          <a class="nav-link active" aria-current="page" href="index.php"><h6>Home</h6></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><h6>Admin</h6></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="pengadaan.php"><h6>Pengadaan</h6></a>
        </li>
      </ul>
    </nav>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                    Data Buku
                    <a href="tambahbuku.php" class="btn btn-outline-dark float-end">Tambah Buku</a>
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
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $query = "SELECT * FROM buku JOIN penerbit ON buku.id_penerbit=penerbit.id_penerbit";
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
                                        <td>
                                            <a href="editbuku.php?id=<?=$buku['id']; ?>" class="btn btn-outline-success btn-sm m-1">Edit</a>
                                            <form action="controller.php" method="POST" class="d-inline">
                                                <button type="submit" name="delete_buku" value="<?= $buku['id']; ?>"
                                                    class="btn btn-outline-danger btn-sm m-1">Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php
                                    }
                                } else {
                                    echo '<h5 class="text-center">Tidak ada data tersedia</h5>';
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container mt-4 card p-2" style="background-color: #FFA500;">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                    Data Penerbit
                    <a href="tambahpenerbit.php" class="btn btn-outline-dark float-end">Tambah Penerbit</a>
                    </h4>
                </div>
                <div class="card-body">
                <table class="table table-bordered table-striped">
                        <thead>
                            <tr class="table-dark">
                                <th>ID Penerbit</th>
                                <th>Nama Penerbit</th>
                                <th>Alamat</th>
                                <th>Kota</th>
                                <th>Telepon</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $query = "SELECT * FROM penerbit";
                                $query_result = mysqli_query($koneksi, $query);
                                if (mysqli_num_rows($query_result) > 0){
                                    foreach ($query_result as $penerbit){
                                    ?>
                                    <tr>
                                        <td><?= $penerbit['id_penerbit']; ?></td>
                                        <td><?= $penerbit['nama']; ?></td>
                                        <td><?= $penerbit['alamat']; ?></td>
                                        <td><?= $penerbit['kota']; ?></td>
                                        <td><?= $penerbit['telepon']; ?></td>
                                        <td>
                                        <a href="editpenerbit.php?id=<?=$penerbit['id_penerbit']; ?>" class="btn btn-outline-success btn-sm m-1">Edit</a>
                                            <form action="controller.php" method="POST" class="d-inline">
                                                <button type="submit" name="delete_penerbit" value="<?= $penerbit['id_penerbit']; ?>"
                                                    class="btn btn-outline-danger btn-sm m-1">Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php
                                    }
                                } else {
                                    echo '<h5 class="text-center">Tidak ada data tersedia</h5>';
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>