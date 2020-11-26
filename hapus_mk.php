<?php
    $koneksi = mysqli_connect("localhost", "root", "", "jadwal");
    $id_pelajaran = $_GET['id_pelajaran'];

    mysqli_query($koneksi, "delete from pelajaran where id_pelajaran='$id_pelajaran'");
    
    
    header('Location: mk.php');
?>