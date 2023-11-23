<?php 
    require 'koneksi.php';
    session_start();

    $query = "SELECT * FROM penerbit";
    $penerbitlist = mysqli_query($koneksi, $query);
    ?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Edit Buku</title>
</head>
<body>


<div class="container mt-4 card p-2" style="background-color: #FFA500;">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Buku
                        <a href="admin.php" class="btn btn-danger float-end">Kembali</a>
                    </h4>
                </div>
                <div class="card-body">

                    <?php
                    if (isset($_GET['id'])) {
                        $id = mysqli_real_escape_string($koneksi, $_GET['id']);
                        $query = "SELECT * FROM buku WHERE id='$id' ";
                        $query_run = mysqli_query($koneksi, $query);

                        if (mysqli_num_rows($query_run) > 0) {
                            $buku = mysqli_fetch_array($query_run);
                            ?>
                            <form action="controller.php" method="POST">
                                <input type="hidden" name="id" value="<?= $buku['id']; ?>">

                                <div class="mb-3">
                                    <label>Kategori</label>
                                    <input type="text" name="kategori" value="<?= $buku['kategori']; ?>"
                                           class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Nama Buku</label>
                                    <input type="text" name="nama_buku" value="<?= $buku['nama_buku']; ?>"
                                           class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Harga</label>
                                    <input type="number" name="harga" value="<?= $buku['harga']; ?>"
                                           class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Stok</label>
                                    <input type="text" name="stok" value="<?= $buku['stok']; ?>"
                                           class="form-control">
                                </div>

                                <div class="mb-3">
                            <label>
                                Penerbit
                            </label>
                             <select name="id_penerbit" class="form-select">        
                            <?php
                                foreach ($penerbitlist as $publisher) {
                                    if($publisher['id_penerbit']==$buku['id_penerbit']){
                                        ?>
                                        <option value=<?= $publisher['id_penerbit']?> selected><?= $publisher['nama']?></option>
                                        <?php  
                                    }else{ 
                                        ?>
                                        <option value=<?= $publisher['id_penerbit']?>><?= $publisher['nama']?></option>
                                        <?php
                                    }
                            ?>
                                    
                                <?php
                            }
                        ?>
                    </select>
                </div>
                                <div class="mb-3">
                                    <button type="submit" name="update_buku" class="btn btn-primary">
                                        Update buku
                                    </button>
                                </div>

                            </form>
                            <?php
                        } else {
                            echo "<h4>No Such Id Found</h4>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>