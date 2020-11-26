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
                    </div>
                </div>
                <br>
                <?php
                    $koneksi = mysqli_connect("localhost", "root", "", "jadwal");
                    $id_guru = $_GET['id_guru'];
                    $guru = mysqli_query($koneksi, "select * from guru where id_guru='$id_guru'");
                    $guru = mysqli_fetch_array($guru);
                ?>
                <form method="post" action="proses_edit_guru.php">
                    <input type="hidden" name="id_guru" value="<?php echo $id_guru; ?>">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Guru</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            placeholder="Nama Guru" name="nama" value="<?php echo $guru['nama']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Jenis Kelamin</label>
                        <select name="jk" id="" class="form-control">
                            <option <?php echo $guru['jk'] == 'laki-laki' ? 'selected':''; ?> value="laki-laki">laki-laki</option>
                            <option <?php echo $guru['jk'] == 'perempuan' ? 'selected':''; ?> value="perempuan">perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Alamat</label>
                        <textarea name="alamat" id="" cols="30" rows="5" class="form-control"><?php echo $guru['alamat']; ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
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
