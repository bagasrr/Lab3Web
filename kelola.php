<?php
    include 'koneksi.php';
    $nama_barang = '';
    $jenis_barang = '';
    $harga_beli = '';
    $harga_jual = '';
    $stok = '';

    if(isset($_GET['ubah'])){
        $id_barang = $_GET['ubah'];

        $query = "SELECT * FROM data_barang WHERE id_barang = '$id_barang';";
        $sql = mysqli_query($conn, $query);

        $result = mysqli_fetch_assoc($sql);

        // var_dump($result);

        $nama_barang = $result['nama_barang'];
        $jenis_barang = $result['jenis_barang'];
        $harga_beli = $result['harga_beli'];
        $harga_jual = $result['harga_jual'];
        $stok = $result['stok'];
        // echo $alamat;

        // die();
    }

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" />
    <title>Tambah</title>
</head>

<body>
    <div class="container mt-5">
        <form action="proses.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" value="<?php echo $id_barang; ?>" name="id_barang">
            <div class="mb-3 row">
                <label for="nama_barang" class="col-sm-2 col-form-label">Nama Barang</label>
                <div class="col-sm-10">
                    <input required type="text" name="nama_barang" class="form-control" id="nama_barang"
                        placeholder="Masukkan Nama Barang" value="<?php echo $nama_barang; ?>" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="jenis_barang" class="col-sm-2 col-form-label"> Jenis barang </label>
                <div class="col-sm-10">
                    <select required class="form-select" name="jenis_barang" id="jkel">
                        <option <?php if($jenis_barang == "Komputer"){echo "selected";} ?> value="Komputer">Komputer
                        </option>
                        <option <?php if($jenis_barang == "Gear"){echo "selected";} ?> value="Gear">Gear
                        </option>
                        <option <?php if($jenis_barang == "Perabotan"){echo "selected";} ?> value="Perabotan">Perabotan
                        </option>
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="harga_beli" class="col-sm-2 col-form-label">Harga Beli</label>
                <div class="col-sm-10">
                    <input required type="text" name="harga_beli" class="form-control" id="harga_beli"
                        placeholder="Masukkan Harga Beli" value="<?php echo $harga_beli; ?>" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="harga_jual" class="col-sm-2 col-form-label">Harga Jual</label>
                <div class="col-sm-10">
                    <input required type="text" name="harga_jual" class="form-control" id="harga_jual"
                        placeholder="Masukkan Harga Jual" value="<?php echo $harga_jual; ?>" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="gambar_barang" class="col-sm-2 form-label"> Gambar </label>
                <div class="col-sm-10">
                    <input <?php if(!isset($_GET['ubah'])){echo "required";} ?> class="form-control"
                        name="gambar_barang" type="file" id="gambar_barang" accept="image/" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="stok" class="col-sm-2 form-label">Stok</label>
                <div class="col-sm-10">
                    <input required type="text" name="stok" class="form-control" id="stok" placeholder="Masukkan Stok"
                        value="<?php echo $stok; ?>" />
                </div>
            </div>

            <div class="mb-3 d-flex justify-content-center">

                <?php
                if (isset($_GET['ubah'])) {
                ?>
                <button type="submit" name="aksi" value="edit" class="btn btn-primary me-2"><i
                        class="bi bi-check">Simpan</i></button>
                <?php
                } else {
                ?>
                <button type="submit" name="aksi" value="add" class="btn btn-primary me-2"><i
                        class="bi bi-check">Tambahkan</i></button>
                <?php } ?>


                <a href="index.php" class="btn btn-danger"><i class="bi bi-x">Batal</i></a>
            </div>

        </form>
    </div>
</body>

</html>