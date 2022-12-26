<?php
$q="";
if(isset($_GET['submit']) && !empty($_GET['q'])) {
    $q = $_GET['q'];
    $sql_where =" WHERE nama LIKE '{$q}%";
}

$title = 'Data Barang';
include_once ("koneksi.php");

// query untuk menampilkan data
$sql = 'SELECT * FROM data_barang';
$result = mysqli_query($conn, $sql);
include_once ('header.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="style.css" rel="stylesheet" type="text/css" />
    <title>Data Barang</title>
</head>

<body>
    <div class="container">
    <?php
        echo '<a href="tambah.php" class=btn btn-large"><h2>Tambah Barang</h2></a>';
        ?>
        <br></br>
        <form action="" method="get">
            <label for="q">Cari Data: </label>
            <input type="text" id="q" name="q" class="input-q" value="<?php echo $q ?>" size="20" autofocus 
            placeholder="Masukkan Data" autocomplete="off">
            <input type="Submit" name="Submit" value="Cari" class="btn btn-primary">
          
        </form>
        <br> 

        <div class="main">
            <table border="1" cellpadding="10" cellspacing="0">
                <tr>
                    <th>Gambar</th>
                    <th>Nama Barang</th>
                    <th>Katagori</th>
                    <th>Harga Jual</th>
                    <th>Harga Beli</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
                <?php if ($result) : ?>
                    <?php while ($row = mysqli_fetch_array($result)) : ?>
                        <tr>
                        <td><img src="gambar/<?= $row['Gambar'];?>" alt="<?=
                        $row['Nama'];?>"></td>
                        <td><?= $row['Nama'];?></td>
                        <td><?= $row['Kategori'];?></td>
                        <td><?= $row['Harga_Beli'];?></td>
                        <td><?= $row['Harga_Jual'];?></td>
                        <td><?= $row['Stok'];?></td>
                        <td> 
                            <a class="tombol3" href="ubah.php?id=<?= $row['Id_Barang'];?>">Ubah</a>
                            <a class="tombol3" href="hapus.php?id=<?= $row['Id_Barang'];?>">Hapus</a> </td>
                        </tr>
                    <?php endwhile;
                else : ?>
                    <tr>
                        <td colspan="7">Belum ada data</td>
                    </tr>
                <?php endif; ?>
            </table>
        </div>
    </div>
    <br><br />

    <?php require('footer.php'); ?>
</body>

</html>