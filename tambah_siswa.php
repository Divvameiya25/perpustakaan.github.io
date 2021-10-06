<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" 
    crossorigin="anonymous">
    <title>Tambah </title>
    <style>
        div {
            padding-top: 20px;
            padding-bottom: 20px;
        }
    </style>
</head>
<body>
<?php
        include "navbar.php";
    ?>
    <div class="p-3 mb-2 bg-dark text-white">
    <div class = "container">
    <h3  class = "text-center"> Data Siswa</h3>  
    <form action="proses_tambah_siswa.php" method="post">
        Nama Siswa :
        <br><input type="text" name="nama_siswa" value="" class="form-control"></br>
        Tanggal Lahir : 
        <br><input type="date" name="tanggal_lahir" value="" class="form-control"></br>
        Gender : 
        <br><select name="gender" class="form-control">
            <option></option>
            <option value="L">Laki-laki</option>
            <option value="P">Perempuan</option>
        </select></br>
        Alamat : 
        <br><textarea name="alamat" class="form-control" rows="4"></textarea></br>
        Kelas :
        <br><select name="id_kelas" class="form-control">
            <option></option>
            <?php 
            include "koneksi.php";
                $qry_kelas=mysqli_query($koneksi,"select * from kelas");
                    while($data_kelas=mysqli_fetch_array($qry_kelas)){
                    echo '<option value="'.$data_kelas['id_kelas'].'">'.$data_kelas['nama_kelas'].'</option>';    
            }
            ?>
        </select></br>
        Username : 
        <br><input type="text" name="username" value="" class="form-control"></br>
        Password : 
        <br><input type="password" name="password" value="" class="form-control"></br>
        <input type="submit" name="simpan" value="Tambah Siswa" class="btn btn-light">
    </form>
    </div>
    </div>
            
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>