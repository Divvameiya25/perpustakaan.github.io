<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Kelas</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    </head>
    <body>
    <div class="container">
        <div class="card" style="margin: 20px;">
        <div class="card-header"><h1>Perbarui siswa</h1></div>
        <div class="card-body">
        <form action="proses_ubah_siswa.php" method="POST">
            <input type="hidden" name="id_siswa" value="<?= $dt_kelas['id_siswa'] ?>">
            <div class="mb-2">
        <?php
        include "koneksi.php";
        $qry_get_siswa=mysqli_query($koneksi,"select * from siswa where id_siswa = '".$_GET['id_siswa']."'");
        $dt_siswa=mysqli_fetch_array($qry_get_siswa);     
        ?>
        <h3>Tambah Siswa</h3>
        <form action="proses_tambah_siswa.php" method="post">
        <input type="hidden" name="id_siswa" value="<?=$dt_siswa['id_siswa']?>">
        Nama Siswa : 
        <input type="text" name="nama_siswa" value="<?=$dt_siswa['nama_siswa']?>" class="form-control">
        Tanggal lahir : 
        <input type="date" name="tanggal_lahir" value="<?=$dt_siswa['tanggal_lahir']?>" class="form-control">
        Gender :
        <?php $arr_gender=array('L'=>'Laki- laki','P'=>'Perempuan');?>
        <select name="gender" class="form-control">
            <option></option>
            <?php foreach ($arr_gender as $key_gender => $val_gender):if($key_gender==$dt_siswa['gender']){
                $selek="selected";
                } else {
                    $selek="";
                }
            ?>
            <option value="<?=$key_gender?>" 
            <?=$selek?>><?=$val_gender?></option>
            <?php endforeach ?>
            </select>
        Alamat :
        <textarea name="alamat" class="form-control" rows="4"><?=$dt_siswa['alamat']?></textarea>
        Kelas :
        <select name="id_kelas" class="form-control">
            <option></option>
            <?php
            include "koneksi.php";
            $qry_kelas=mysqli_query($koneksi,"select * from kelas");
            while($data_kelas=mysqli_fetch_array($qry_kelas)){
                if($data_kelas['id_kelas']==$dt_siswa['id_kelas']) {
                    $selek="selected";
                }  else {
                    $selek="";
                }
                   echo '<option value="'.$data_kelas['id_kelas'].'"'.$selek.'>'.$data_kelas['nama_kelas'].'</option>';
                }
                ?>
            </select>
            Username :
                <input type="text" name="username"
                value="<?=$dt_siswa['username']?>" class="form-control">
            Password :
            <input type="password" name="password" value="" 
            class="form-control">
            <input type="submit" name="simpan" value="Ubah Siswa"
            class="btn btn-primary">
        </form>


        
    </body>
</html>