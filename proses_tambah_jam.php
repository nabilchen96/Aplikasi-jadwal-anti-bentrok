<?php
    $koneksi = mysqli_connect("localhost", "root", "", "jadwal");
    $jam = $_POST['jam'];
    $mulai = $_POST['mulai'];
    $akhir = $_POST['akhir'];

    $insert =  mysqli_query($koneksi, "insert into jam set jam='$jam', mulai='$mulai', akhir='$akhir'");
    
    
    header('Location: jam.php');
?>