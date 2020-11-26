<?php
    $koneksi = mysqli_connect("localhost", "root", "", "jadwal");
    $pelajaran = $_POST['pelajaran'];

    $insert =  mysqli_query($koneksi, "insert into pelajaran set pelajaran='$pelajaran' ");
    
    
    header('Location: mk.php');
?>