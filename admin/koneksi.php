<?php

    $serverName ="localhost";
    $userName = "root";
    $password = "";
    $database = "belajar_laravel";

    //buat koneksi
    $koneksi = mysqli_connect($serverName,$userName,$password,$database);

    //cek koneksi
    //if(!$koneksi){
        //die("konesi gagal".mysqli_connect_error());
        //errorno muncul angka
        //eror muncul string
    //}
    //else {
       // echo"koneksi berhasil";
    //}
?>