<?php
if($_POST){
    $id_siswa=$_POST['id_siswa'];
    $nama_siswa=$_POST['nama_siswa'];
    $tanggal_lahir=$_POST['tanggal_lahir'];
    $alamat=$_POST['alamat'];
    $gender=$_POST['gender'];
    $username=$_POST['username'];
    $password= $_POST['password'];
    $id_kelas=$_POST['id_kelas'];
    if(empty($nama_siswa)){
        echo "<script>alert('nama siswa tidak boleh kosong');location.href='tambah_siswa.php';</script>";
 
    } elseif(empty($username)){
        echo "<script>alert('username tidak boleh kosong');location.href='tambah_siswa.php';</script>";
    } elseif(empty($password)){
        echo "<script>alert('password tidak boleh kosong');location.href='tambah_siswa.php';</script>";
    } else {
        include "koneksi.php";
        $insert=mysqli_query($koneksi,"insert into siswa (nama_siswa,tanggal_lahir, gender, alamat, username, password, id_kelas) value ('".$nama_siswa."','".$tanggal_lahir."','".$gender."','".$alamat."','".$username."','".md5($password)."','".$id_kelas."')") or die(mysqli_error($conn));
        if(empty($password)) {

            $update=mysqli_query($koneksi,"update siswa set nama_siswa='".$nama_siswa."',tanggal_lahir='".$tanggal_lahir."',gender='".$gender."', alamat='".$alamat."', username='".$username."', id_kelas='".$id_kelas."' where id_siswa = '".$id_siswa."' ") or die(mysqli_error($koneksi));
            if($update) {
                echo "<script>alert('Sukses update siswa');location.href='tampil_siswa.php';</script>";
            } else {
                echo "<script>alert('Gagal update siswa');location.href='ubah_siswa.php?id_siswa=".$id_siswa."';</script>";
            }
            } else {
                $update=mysqli_query($koneksi,"update siswa set nama_siswa='".$nama_siswa."',tanggal_lahir='".$tanggal_lahir."',gender='".$gender."', alamat='".$alamat."', username='".$username."', password='".md5($password)."', id_kelas='".$id_kelas."' where id_siswa = '".$id_siswa."'") or die(mysqli_error($koneksi));
                if ($update) {
                    echo "<script>alert('Sukses update siswa');location.href='tampil_siswa.php;'</script>";
                } else {
                    echo "<script>alert('Gagal update siswa');location.href='ubah_siswa.php?id_siswa=".$id_siswa."'</script>";
                }
            }
        }
    }
?>