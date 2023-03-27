<?php
  include 'koneksi.php';

  $query = 'SELECT * FROM data_barang';
  $sql = mysqli_query($conn, $query);
  $nomor = 1;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" />
    <title>belajar crud</title>
</head>

<body>
    <div class="container mt-5">
        <a href="kelola.php" type="button" class="btn btn-danger">
            Tambah Konten
            <i class="bi bi-plus-lg"></i>
        </a>
        <div class="table-responsive mt-5">
            <table class="table table-hover">
                <thead class="text-center">
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Jenis Barang</th>
                        <th>Harga Jual</th>
                        <th>Harga Beli</th>
                        <th>Gambar</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-center">

                    <?php
                     while ($result = mysqli_fetch_assoc($sql)){
                  ?>
                    <tr class="align-middle">
                        <td><?php echo $nomor++; ?></td>
                        <td><?php echo $result['nama_barang']; ?></td>
                        <td><?php echo $result['jenis_barang']; ?></td>
                        <td><?php echo $result['harga_beli']; ?></td>
                        <td><?php echo $result['harga_jual']; ?></td>
                        <td>
                            <img src="img/<?php echo $result['gambar_barang']; ?>"
                                alt="<?php echo $result['gambar_barang']; ?>" style="width: 100px" />
                        </td>
                        <td><?php echo $result['stok']; ?></td>
                        <td>
                            <a href="proses.php?hapus=<?php echo $result['id_barang']; ?>" type="button"
                                class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin??')"><i
                                    class="bi bi-trash-fill"></i></a>

                            <a href="kelola.php?ubah=<?php echo $result['id_barang']; ?>" type="button"
                                class="btn btn-sm btn-success"><i class="bi bi-pen"></i></a>
                        </td>
                    </tr>
                    <?php
                     }   
                    ?>


                </tbody>
            </table>
        </div>
    </div>
</body>

</html>