<?php
    $koneksi = mysqli_connect("localhost", "root", "", "jadwal");
    $id_semester = $_GET['id_semester'];

    mysqli_query($koneksi, "delete from semester where id_semester='$id_semester'");
    
    
    header('Location: semester.php');
?>