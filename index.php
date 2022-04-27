<?php
include('koneksi.php');
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

        table {
            border: solid 1px #DDEEEE;
            border-collapse: collapse;
            border-spacing: 0;
            width: 70%;
            margin: 10px auto 10px auto;
        }

        table thead th {
            background-color: greenyellow;
            border: solid 1px #DDEEEE;
            color: black;
            padding: 10px;
            text-align: left;
            text-shadow: 1px 1px 1px #fff;
            text-decoration: none;
            text-align: center;
        }

        table tbody td {
            border: solid 1px #DDEEEE;
            color: #333;
            padding: 10px;
            text-shadow: 1px 1px 1px #fff;
        }

        a {
            background-color: black;
            color: #fff;
            padding: 10px;
            text-decoration: none;
            font-size: 12px;
        }
    </style>
</head>
<body>
<center><h1>Soal Tes Praktek PHP Programmer</h1>
    <center>
        <h2>&copy; 2022 - <?php echo "Fauzan Alghifari"; ?></h2>
        <center><a href="tambah_produk.php">Tambah Barang</a>
            <center>
                <br/>
                <table>
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Foto Barang</th>
                        <th>Nama Barang</th>
                        <th>Harga Beli</th>
                        <th>Harga Jual</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $query = "SELECT * FROM produk ORDER BY id ASC";
                    $result = mysqli_query($koneksi, $query);
                    if (!$result) {
                        die ("Query Error: " . mysqli_errno($koneksi) .
                            " - " . mysqli_error($koneksi));
                    }

                    $no = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td style="text-align: center;"><img src="gambar/<?php echo $row['gambar_produk']; ?>"
                                                                 style="width: 120px;"></td>
                            <td><?php echo $row['nama_produk']; ?></td>
                            <td>Rp <?php echo number_format($row['harga_beli'], 0, ',', '.'); ?></td>
                            <td>Rp <?php echo number_format($row['harga_jual'], 0, ',', '.'); ?></td>
                            <td><?php echo $row['stok_barang']; ?></td>
                            <td>
                                <a href="edit_produk.php?id=<?php echo $row['id']; ?>">Edit</a> |
                                <a href="proses_hapus.php?id=<?php echo $row['id']; ?>"
                                   onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a>
                            </td>
                        </tr>

                        <?php
                        $no++;
                    }
                    ?>
                    </tbody>
                </table>
</body>
</html>