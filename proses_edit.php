<?php
include 'koneksi.php';

$id = $_POST['id'];
$gambar_produk = $_FILES['gambar_produk']['name'];
$nama_produk = $_POST['nama_produk'];
$harga_beli = $_POST['harga_beli'];
$harga_jual = $_POST['harga_jual'];
$stok_barang = $_POST['stok_barang'];

if ($gambar_produk != "") {
    $ekstensi_diperbolehkan = array('png', 'jpg');
    $x = explode('.', $gambar_produk);
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['gambar_produk']['tmp_name'];
    $angka_acak = rand(1, 999);
    $nama_gambar_baru = $angka_acak . '-' . $gambar_produk;
    if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
        move_uploaded_file($file_tmp, 'gambar/' . $nama_gambar_baru);
        $query = "UPDATE produk SET gambar_produk = '$nama_gambar_baru', nama_produk = '$nama_produk', harga_beli = '$harga_beli', harga_jual = '$harga_jual', stok_barang = '$stok_barang'";
        $query .= "WHERE id = '$id'";
        $result = mysqli_query($koneksi, $query);
        if (!$result) {
            die ("Query gagal dijalankan: " . mysqli_errno($koneksi) .
                " - " . mysqli_error($koneksi));
        } else {
            echo "<script>alert('Data berhasil diubah.');window.location='index.php';</script>";
        }
    } else {
        echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='tambah_produk.php';</script>";
    }
} else {
    $query = "UPDATE produk SET nama_produk = '$nama_produk', harga_beli = '$harga_beli', harga_jual = '$harga_jual', stok_barang = '$stok_barang'";
    $query .= "WHERE id = '$id'";
    $result = mysqli_query($koneksi, $query);
    if (!$result) {
        die ("Query gagal dijalankan: " . mysqli_errno($koneksi) .
            " - " . mysqli_error($koneksi));
    } else {
        echo "<script>alert('Data berhasil diubah.');window.location='index.php';</script>";
    }
}

 

