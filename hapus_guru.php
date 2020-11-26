<?php
    $koneksi = mysqli_connect("localhost", "root", "", "jadwal");
    $id_guru = $_GET['id_guru'];

    mysqli_query($koneksi, "delete from guru where id_guru='$id_guru'");
    
    
    header('Location: guru.php');
?>