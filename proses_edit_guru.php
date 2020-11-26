<?php
    $koneksi = mysqli_connect("localhost", "root", "", "jadwal");
    $nama = $_POST['nama'];
    $jk = $_POST['jk'];
    $alamat = $_POST['alamat'];
    $id_guru = $_POST['id_guru'];

    mysqli_query($koneksi, "update guru set nama='$nama', jk='$jk', alamat='$alamat' where id_guru='$id_guru' ");
    
    
    header('Location: guru.php');
?>