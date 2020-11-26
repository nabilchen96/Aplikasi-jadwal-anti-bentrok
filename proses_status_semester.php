<?php
    session_start();
    $koneksi = mysqli_connect("localhost", "root", "", "jadwal");

    $id_semester = $_GET['id_semester'];
    $status     = $_GET['status'];


    //cek data status yg aktif
    $jumlah_status = mysqli_query($koneksi, "select count(*) as total from semester where status='1'");
    $jumlah_status  = mysqli_fetch_array($jumlah_status);

    // echo $jumlah_status['total'];
    // die;

    if($jumlah_status['total'] > 0){
        if($status == 1){
            mysqli_query($koneksi, "update semester set status='0' where id_semester='$id_semester'");
        }else{
            $_SESSION['gagal'] = "non-aktifkan semester yang sedang aktif terlebih dahulu";
            header('Location: semester.php');
        }
    }else{
        $status = $status == 0 ? 1 : 0;
        mysqli_query($koneksi, "update semester set status='$status' where id_semester='$id_semester'");
    }
    
    
    header('Location: semester.php');
?>