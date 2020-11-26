<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
</head>

<body>
    <br>
    <div class="row col-12">
        <div class="col-3">
            <div class="container">
                <?php include 'menu.php'; ?>
            </div>
        </div>
        <div class="col-9">
            <div class="container">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">Daftar Guru</h1>
                        <a href="tambah_guru.php" class="btn btn-primary btn-sm"> Tambah Guru</a>
                    </div>
                </div>
                <br>
                <div class="table-responsive">
                    <table class="table table-striped" id="table_id">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Alamat</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $koneksi = mysqli_connect("localhost", "root", "", "jadwal");
                                $no = 1;
                                $select         = "select * from guru";
                                $select         = mysqli_query($koneksi, $select);
                                while($data= mysqli_fetch_array($select)){
                            ?>
                            <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $data['nama']; ?></td>
                                    <td><?php echo $data['jk']; ?></td>
                                    <td><?php echo $data['alamat']; ?></td>
                                    <td>
                                        <a href="edit_guru.php?id_guru=<?php echo $data['id_guru']; ?>" class="btn btn-sm btn-success"> Edit</a>
                                    </td>
                                    <td>
                                        <a href="hapus_guru.php?id_guru=<?php echo $data['id_guru']; ?>" class="btn btn-sm btn-danger"> Hapus</a>
                                    </td>
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
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js">
    </script>

    <!-- fungsi datatable -->
    <script>
        $(document).ready(function () {
            $('#table_id').DataTable();
        });

    </script>
</body>

</html>
