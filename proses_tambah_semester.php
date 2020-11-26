<?php
    $koneksi = mysqli_connect("localhost", "root", "", "jadwal");
    $tahun = $_POST['tahun'];
    $semester = $_POST['semester'];
    $status = 0;

    $insert =  mysqli_query($koneksi, "insert into semester set tahun='$tahun', semester='$semester', status='$status'");
    
    
    header('Location: semester.php');
?>