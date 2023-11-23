<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Tambah Penerbit</title>
</head>
<body>
<div class="container mt-4 card p-2" style="background-color: #FFA500;">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        Tambah Penerbit
                        <a href="admin.php" class="btn btn-danger float-end">Kembali</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="controller.php" method="post">

                        <div class="mb-3">
                            <label>
                                Nama Penerbit
                            </label>
                                <input type="text" name="nama" class="form-control">
            
                        </div>

                        <div class="mb-3">
                            <label>
                                Alamat
                        </label>
                                <input type="text" name="alamat" class="form-control">
                            
                        </div>

                        <div class="mb-3">
                            <label>
                                Kota
                            </label>
                                <input type="text" name="kota" class="form-control">
                           
                        </div>

                        <div class="mb-3">
                            <label>
                                Telepon
                            </label>
                                <input type="number" name="telepon" class="form-control">
                        
                        </div>

                        <div class="mb-3">
                            <button type="submit" name="simpan_penerbit" class="btn btn-dark">Simpan Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>