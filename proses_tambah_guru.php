<?php
    $koneksi = mysqli_connect("localhost", "root", "", "jadwal");
    $nama = $_POST['nama'];
    $jk = $_POST['jk'];
    $alamat = $_POST['alamat'];

    $insert =  mysqli_query($koneksi, "insert into guru set nama='$nama', jk='$jk', alamat='$alamat'");
    
    
    header('Location: guru.php');
?>