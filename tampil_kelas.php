<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kelas</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>
<body>
<?php
        include "navbar.php";
    ?>
    <div class="container">
        <form action="tampil_kelas.php" method="post">
            <input type="text" name="cari" class="form-control"
            placeholder="Masukkan Keyword Pencarian" />
        </form>
        <h1>DATA KELAS</h1>
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                <th scope="col">id_kelas</th>
                <th scope="col">nama_kelas</th>
                <th scope="col">kelompok</th>
                <th scope="col">aksi</th>
                </tr>
            </thead>
            <tbody> 
                <?php 
                include "koneksi.php";
                if (isset($_POST["cari"])) {
                    // jika ada keyword pencarian
                    $cari = $_POST['cari'];
                    $query_kelas = mysqli_query($koneksi, 
                    "select * from kelas where id_kelas='$cari 'or nama_kelas='$cari'");
                } else {
                    // jika tdk ada keyword pencarian
                    $query_kelas = mysqli_query($koneksi, "select * from kelas");
                }
                while ($data_kelas = mysqli_fetch_array($query_kelas)) {
                ?> 
<tr>
    <td><?php echo $data_kelas["id_kelas"]; ?></td>
    <td><?php echo $data_kelas["nama_kelas"]; ?></td>
    <td><?php echo $data_kelas["kelompok"]; ?></td>
    <td>
        <a href="ubah_kelas.php?id_kelas=<?=$data_kelas['id_kelas']?>" class="btn btn-success">Perbarui</a>
        <a href="hapus_kelas.php?id_kelas=<?=$data_kelas['id_kelas']?>" class="btn btn-danger"
        onclick="return confirm('Apakah anda yakin menghapus data ini?')">Hapus</a>
    </td>
</tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <td><a href="tambah_kelas.php" class="btn btn-outline-success">Tambah Kelas</a>
            <td><a href="tambah_siswa.php" class="btn btn-success">Tambah Siswa</a>
        </tr>
    <?php
    ?>
  </tbody>
</table>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>