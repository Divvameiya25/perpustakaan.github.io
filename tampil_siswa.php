<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>
<body>
<?php
        include "navbar.php";
    ?>
    <div class="container">
        <form action="tampil_siswa.php" method="post">
            <input type="text" name="cari" class="form-control"
            placeholder="Masukkan Keyword Pencarian" />
        </form>
        <h1>DATA SISWA</h1>
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                <th scope="col">id_siswa</th>
                <th scope="col">nama_siswa</th>
                <th scope="col">tanggal_lahir</th>
                <th scope="col">gender</th>
                <th scope="col">alamat</th>
                <th scope="col">username</th>
                <th scope="col">password</th>
                <th scope="col">id_kelas</th>

                </tr>
            </thead>
            <tbody>
                <?php 
                include "koneksi.php";
                if (isset($_POST["cari"])) {
                    //jika ada keyword pencarian
                    $cari = $_POST["cari"];
                    $query_siswa = mysqli_query($koneksi,"select * from siswa join kelas on siswa.id_kelas=kelas.id_kelas where siswa.id_siswa ='$cari' or siswa.nama_siswa  like '%$cari%'");
                } else {
                    //jika tidak ada keyword pencarian
                    $query_siswa = mysqli_query($koneksi, "select * from siswa join kelas on siswa.id_kelas=kelas.id_kelas");
                }
                while ($data_siswa = mysqli_fetch_array($query_siswa)) {?>
                    <tr>
                        <td><?php echo $data_siswa["id_siswa"] ?></td>
                        <td><?php echo $data_siswa["nama_siswa"] ?></td>
                        <td><?php echo $data_siswa["tanggal_lahir"] ?></td>
                        <td><?php echo $data_siswa["gender"] ?></td>
                        <td><?php echo $data_siswa["alamat"] ?></td>
                        <td><?php echo $data_siswa["username"] ?></td>
                        <td><?php echo $data_siswa["password"] ?></td>
                        <td><?php echo $data_siswa["id_kelas"] ?></td>
                    </tr>
                    <td>
        <a href="ubah_siswa.php?id_siswa=<?=$data_siswa['id_siswa']?>" class="btn btn-success">Perbarui</a>
        <a href="hapus_siswa.php?id_siswa=<?=$data_siswa['id_siswa']?>" class="btn btn-danger"
        onclick="return confirm('Apakah anda yakin menghapus data ini?')">Hapus</a>
    </td>
                <?php }?>
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