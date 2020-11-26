<?php
    $koneksi = mysqli_connect("localhost", "root", "", "jadwal");
    $pelajaran = $_POST['pelajaran'];
    $id_pelajaran = $_POST['id_pelajaran'];

    $insert =  mysqli_query($koneksi, "update pelajaran set pelajaran='$pelajaran' where id_pelajaran = '$id_pelajaran' ");
    
    
    header('Location: mk.php');
?>