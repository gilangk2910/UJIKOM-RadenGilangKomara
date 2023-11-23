<?php
require 'koneksi.php';

if (isset($_POST['delete_buku'])) {
    $id = mysqli_real_escape_string($koneksi, $_POST['delete_buku']);

    $query = "DELETE FROM buku WHERE id='$id' ";
    $query_run = mysqli_query($koneksi, $query);
    if ($query_run) {
        $_SESSION['message'] = "Data Berhasil Dihapus";
        header("Location: admin.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Data Gagal Dihapus";
        header("Location: admin.php");
        exit(0);
    }
}

if (isset($_POST['update_buku'])) {
    $id = mysqli_real_escape_string($koneksi, $_POST['id']);

    $kategori = mysqli_real_escape_string($koneksi, $_POST['kategori']);
    $nama_buku = mysqli_real_escape_string($koneksi, $_POST['nama_buku']);
    $harga = mysqli_real_escape_string($koneksi, $_POST['harga']);
    $stok = mysqli_real_escape_string($koneksi, $_POST['stok']);
    $id_penerbit = mysqli_real_escape_string($koneksi, $_POST['id_penerbit']);

    $query = "UPDATE buku SET kategori='$kategori', nama_buku='$nama_buku', harga='$harga', stok='$stok', id_penerbit='$id_penerbit' WHERE id='$id' ";
    $query_run = mysqli_query($koneksi, $query);
    if ($query_run) {
        $_SESSION['message'] = "Data Berhasil Dihapus";
        header("Location: admin.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Data Gagal Dihapus";
        header("Location: admin.php");
        exit(0);
    }
}

if (isset($_POST['simpan_buku'])) {
    $kategori = mysqli_real_escape_string($koneksi, $_POST['kategori']);
    $nama_buku = mysqli_real_escape_string($koneksi, $_POST['nama_buku']);
    $harga = mysqli_real_escape_string($koneksi, $_POST['harga']);
    $stok = mysqli_real_escape_string($koneksi, $_POST['stok']);
    $id_penerbit = mysqli_real_escape_string($koneksi, $_POST['id_penerbit']);

    $query = "INSERT INTO buku (kategori,nama_buku,harga,stok,id_penerbit) VALUES ('$kategori','$nama_buku','$harga','$stok','$id_penerbit')";

    $query_run = mysqli_query($koneksi, $query);
    if ($query_run) {
        $_SESSION['message'] = "Data Berhasil Dihapus";
        header("Location: admin.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Data Gagal Dihapus";
        header("Location: admin.php");
        exit(0);
    }
}

if (isset($_POST['delete_penerbit'])) {
    $id_penerbit = mysqli_real_escape_string($koneksi, $_POST['delete_penerbit']);

    $query = "DELETE FROM penerbit WHERE id_penerbit='$id_penerbit'";
    $query_run = mysqli_query($koneksi, $query);
    if ($query_run) {
        $_SESSION['message'] = "Data Berhasil Dihapus";
        header("Location: admin.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Data Gagal Dihapus";
        header("Location: admin.php");
        exit(0);
    }
    
}

if (isset($_POST['update_penerbit'])) {
    $id_penerbit = mysqli_real_escape_string($koneksi, $_POST['id_penerbit']);

    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);
    $kota = mysqli_real_escape_string($koneksi, $_POST['kota']);
    $telepon = mysqli_real_escape_string($koneksi, $_POST['telepon']);

    $query = "UPDATE penerbit SET nama='$nama', alamat='$alamat', kota='$kota', telepon='$telepon' WHERE id_penerbit='$id_penerbit' ";
    $query_run = mysqli_query($koneksi, $query);
    if ($query_run) {
        $_SESSION['message'] = "Data Berhasil Dihapus";
        header("Location: admin.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Data Gagal Dihapus";
        header("Location: admin.php");
        exit(0);
    }
}


if (isset($_POST['simpan_penerbit'])) {
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);
    $kota = mysqli_real_escape_string($koneksi, $_POST['kota']);
    $telepon = mysqli_real_escape_string($koneksi, $_POST['telepon']);

    $query = "INSERT INTO penerbit (nama,alamat,kota,telepon) VALUES ('$nama','$alamat','$kota','$telepon')";

    $query_run = mysqli_query($koneksi, $query);
    if ($query_run) {
        $_SESSION['message'] = "Data Berhasil Dihapus";
        header("Location: admin.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Data Gagal Dihapus";
        header("Location: admin.php");
        exit(0);
    }
}   

?>