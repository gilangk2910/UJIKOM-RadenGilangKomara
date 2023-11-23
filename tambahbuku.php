<?php 
    require 'koneksi.php';
    session_start();

    $query = "SELECT * FROM penerbit";
    $penerbitlist = mysqli_query($koneksi, $query);
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Tambah Buku</title>
</head>
<body>
<div class="container mt-4 card p-2" style="background-color: #FFA500;">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        Tambah Buku
                        <a href="admin.php" class="btn btn-danger float-end">Kembali</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="controller.php" method="post">

                        <div class="mb-3">
                            <label>
                                Kategori
                            </label>
                                <input type="text" name="kategori" class="form-control" >
                        </div>

                        <div class="mb-3">
                            <label>
                                Nama Buku
                            </label>    
                                <input type="text" name="nama_buku" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>
                                Harga
                            </label>
                                <input type="number" name="harga" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>
                                Stok
                            </label>
                                <input type="text" name="stok" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>
                                Penerbit
                            </label>
                             <select name="id_penerbit" class="form-select">
                            <?php
                                foreach ($penerbitlist as $publisher) {
                            ?>
                                    <option value=<?= $publisher['id_penerbit']?>><?= $publisher['nama']?></option>
                                <?php
                            }
                        ?>
                    </select>
                </div>
                          <div class="mb-3">
                            <button type="submit" name="simpan_buku" class="btn btn-dark">Simpan Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>