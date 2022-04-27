<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = ($_GET["id"]);
    $query = "SELECT * FROM produk WHERE id='$id'";
    $result = mysqli_query($koneksi, $query);

    if (!$result) {
        die ("Query Error: " . mysqli_errno($koneksi) .
            " - " . mysqli_error($koneksi));
    }
    $data = mysqli_fetch_assoc($result);

    if (!count($data)) {
        echo "<script>alert('Data tidak ditemukan pada database');window.location='index.php';</script>";
    }
} else {
    echo "<script>alert('Masukkan data id.');window.location='index.php';</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>CRUD</title>
    <style type="text/css">
        * {
            font-family: "Trebuchet MS";
        }

        h1 {
            text-transform: uppercase;
            color: black;
        }

        button {
            background-color: black;
            color: white;
            padding: 10px;
            text-decoration: none;
            font-size: 12px;
            border: 0px;
            margin-top: 20px;
        }

        label {
            margin-top: 10px;
            float: left;
            text-align: left;
            width: 100%;
        }

        input {
            padding: 6px;
            width: 100%;
            box-sizing: border-box;
            background: #f8f8f8;
            border: 2px solid #ccc;
            outline-color: black;
        }

        div {
            width: 100%;
            height: auto;
        }

        .base {
            width: 400px;
            height: auto;
            padding: 20px;
            margin-left: auto;
            margin-right: auto;
            background: #ededed;
        }
    </style>
</head>
<body>
<center>
    <h1>Edit Produk <?php echo $data['nama_produk']; ?></h1>
    <center>
        <form method="POST" action="proses_edit.php" enctype="multipart/form-data">
            <section class="base">
                <input name="id" value="<?php echo $data['id']; ?>" hidden/>
                <div>
                    <label>Gambar Produk</label>
                    <img src="gambar/<?php echo $data['gambar_produk']; ?>"
                         style="width: 120px;float: left;margin-bottom: 5px;">
                    <input type="file" name="gambar_produk"/>
                    <i style="float: left;font-size: 11px;color: red">Keterangan : Tidak ada preview gambar</i>
                </div>
                <div>
                    <label>Nama Produk</label>
                    <input type="text" name="nama_produk" value="<?php echo $data['nama_produk']; ?>" autofocus=""
                           required=""/>
                </div>
                <div>
                    <label>Harga Beli</label>
                    <input type="text" name="harga_beli" required="" value="<?php echo $data['harga_beli']; ?>"/>
                </div>
                <div>
                    <label>Harga Jual</label>
                    <input type="text" name="harga_jual" required="" value="<?php echo $data['harga_jual']; ?>"/>
                </div>
                <div>
                    <label>Stok Barang</label>
                    <input type="text" name="stok_barang" required="" value="<?php echo $data['stok_barang']; ?>"/>
                </div>
                <div>
                    <button type="submit">Simpan Perubahan</button>
                </div>
            </section>
        </form>
</body>
</html>