<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>
    <br>
    <div class="row col-12">
        <div class="col-lg-3">
            <div class="container">
            </div>
                <?php include 'menu.php'; ?>
        </div>
        <div class="col-lg-9">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">Jadwal Pelajaran</h1>
                    <?php
                        
                        $koneksi        = mysqli_connect("localhost", "root", "", "jadwal");
                        $get_kelas_now  = mysqli_query($koneksi, "select * from kelas where id_kelas = ".$_GET['id_kelas']);
                        $kelas_now      = mysqli_fetch_array($get_kelas_now);
                    
                    ?>
                    <h2 class="card-title"><?php echo 'Kelas '.$kelas_now['kelas']; ?></h2>
                </div>
            </div>
            <br>
                <?php
                    session_start();
                    if(@$_SESSION['gagal']){
                ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Kesalahan! </strong><?php echo $_SESSION['gagal']; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php 
                unset($_SESSION['gagal']);
            } 
                
            ?>
            <div>
                <div class="table-responsive">
                    <table class="table table-striped text-center" style="overflow:scroll;">
                        <thead>
                            <tr>
                                <th>Jam</th>
                                <th>Senin</th>
                                <th>Selasa</th>
                                <th>Rabu</th>
                                <th>Kamis</th>
                                <th>Jumat</th>
                                <th>Sabtu</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                                $get_jam         = mysqli_query($koneksi, "select * from jam");
                                while($data_jam= mysqli_fetch_array($get_jam)){
                            ?>
                            <tr>
                                <td><?php echo $data_jam['mulai'].'-'.$data_jam['akhir']; ?></td>
                                <?php for($j=1; $j<=6; $j++){ ?>
                                <?php 
                                    $hari = '';
                                    if($j==1){
                                        $hari = "senin";
                                    }elseif($j==2){
                                        $hari = "selasa";
                                    }elseif($j==3){
                                        $hari = "rabu";
                                    }elseif($j==4){
                                        $hari = "kamis";
                                    }elseif($j==5){
                                        $hari = "jumat";
                                    }elseif($j==6){
                                        $hari = "sabtu";
                                    }
                                    ?>
                                <td>
                                    <form action="proses.php" method="post" id="form_id_<?php echo $j.'_'.$data_jam['id_jam']; ?>">
                                        <input type="hidden" name="id_kelas" value="<?php echo $_GET['id_kelas']; ?>">
                                        <input type="hidden" name="hari" value="<?php echo $hari; ?>">
                                        <input type="hidden" name="id_jam" value="<?php echo $data_jam['id_jam']; ?>">
                                        <?php

                                                $id_kelas = $_GET['id_kelas'];
                                                $id_jam = $data_jam['id_jam'];

                                                // echo $hari;

                                                //tampilkan data jadwal sekarang
                                                $get_jadwal         = mysqli_query($koneksi, 
                                                                        "select * from jadwal 
                                                                        join pelajaran on pelajaran.id_pelajaran = jadwal.id_pelajaran
                                                                        where id_jam='$id_jam' && id_kelas='$id_kelas' && hari='$hari'
                                                                        ");
                                                $data_jadwal         = mysqli_fetch_array($get_jadwal);

                                        ?>
                                        <input type="hidden" name="id_jadwal" value="<?php echo $data_jadwal['id_jadwal']; ?>">
                                        <select name="id_pelajaran" class="form-control" data-toggle="tooltip" data-placement="top" title="<?php echo $data_jadwal['pelajaran']; ?>"
                                            onChange="document.getElementById('form_id_<?php echo $j.'_'.$data_jam['id_jam']; ?>').submit();">
                                            <option value="">--Pilih Mata Kuliah--</option>
                                            <?php

                                                //tampilkan data mata pelajaran
                                                $get_pelajaran         = mysqli_query($koneksi, "select * from pelajaran");
                                                while($data_pelajaran= mysqli_fetch_array($get_pelajaran)){
                                            ?>
                                            <option
                                                <?php if($data_jadwal['id_pelajaran'] == $data_pelajaran['id_pelajaran']){ echo "selected"; } ?>
                                                value="<?php echo $data_pelajaran['id_pelajaran']; ?>">
                                                <?php echo $data_pelajaran['pelajaran']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </form>
                                    <form action="proses.php" method="post" id="form_id2_<?php echo $j.'_'.$data_jam['id_jam']; ?>">
                                        <?php
   

                                            $id_kelas = $_GET['id_kelas'];
                                            $id_jam = $data_jam['id_jam'];

                                            //tampilkan data id_jadwal
                                            $get_id_jadwal         = mysqli_query($koneksi, 
                                                                    "select * from jadwal 
                                                                    where id_jam='$id_jam' && id_kelas='$id_kelas' && hari='$hari' 
                                                                    ");
                                            $id_jadwal             = mysqli_fetch_array($get_id_jadwal);
                                        ?>
                                        <input type="hidden" name="id_jadwal" value="<?php echo $id_jadwal['id_jadwal']; ?>">
                                        <input type="hidden" name="id_jam" value="<?php echo $id_jam; ?>">
                                        <input type="hidden" name="hari" value="<?php echo $hari; ?>">
                                        <input type="hidden" name="id_kelas" value="<?php echo $id_kelas; ?>">

                                        <?php
                                            error_reporting(0);
                                            //guru tooltip
                                            $get_guru_tooltip         = mysqli_query($koneksi, 
                                            "select * from guru where id_guru = ".$id_jadwal['id_guru']);
                                            $guru_tooltip             = mysqli_fetch_array($get_guru_tooltip);
                                        ?>
                                        <select name="id_guru" class="form-control" data-toggle="tooltip" data-placement="top" title="<?php echo $guru_tooltip['nama']; ?>"
                                            onChange="document.getElementById('form_id2_<?php echo $j.'_'.$data_jam['id_jam']; ?>').submit();">
                                            <option value="">--Pilih Guru--</option>
                                            <?php
                                                //tampilkan data guru
                                                $get_guru         = mysqli_query($koneksi, "select * from guru");
                                                while($data_guru= mysqli_fetch_array($get_guru)){
                                            ?>
                                            <option  <?php if($id_jadwal['id_guru'] == $data_guru['id_guru']){ echo "selected"; } ?> value="<?php echo $data_guru['id_guru']; ?>">
                                                <?php echo $data_guru['nama']; ?> 
                                            </option>
                                            <?php } ?>
                                        </select>
                                    </form>
                                </td>
                                <?php } ?>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })

    </script>
</body>

</html>
