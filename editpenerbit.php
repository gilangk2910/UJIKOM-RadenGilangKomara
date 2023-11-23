<?php
session_start();
require 'koneksi.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Edit Penerbit</title>
</head>
<body>

<div class="container mt-4 card p-2" style="background-color: #FFA500;">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Penerbit
                        <a href="admin.php" class="btn btn-danger float-end">Kembali</a>
                    </h4>
                </div>
                <div class="card-body">

                    <?php
                    if (isset($_GET['id'])) {
                        $id_penerbit = mysqli_real_escape_string($koneksi, $_GET['id']);
                        $query = "SELECT * FROM penerbit WHERE id_penerbit='$id_penerbit' ";
                        $query_run = mysqli_query($koneksi, $query);

                        if (mysqli_num_rows($query_run) > 0) {
                            $penerbit = mysqli_fetch_array($query_run);
                            ?>
                            <form action="controller.php" method="POST">
                                <input type="hidden" name="id_penerbit" value="<?= $penerbit['id_penerbit']; ?>">

                                <div class="mb-3">
                                    <label>Nama Penerbit</label>
                                    <input type="text" name="nama" value="<?= $penerbit['nama']; ?>"
                                           class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Alamat</label>
                                    <input type="text" name="alamat" value="<?= $penerbit['alamat']; ?>"
                                           class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Kota</label>
                                    <input type="text" name="kota" value="<?= $penerbit['kota']; ?>"
                                           class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Telepon</label>
                                    <input type="number" name="telepon" value="<?= $penerbit['telepon']; ?>"
                                           class="form-control">
                                </div>
                                <div class="mb-3">
                                    <button type="submit" name="update_penerbit" class="btn btn-dark">
                                        Update Penerbit
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