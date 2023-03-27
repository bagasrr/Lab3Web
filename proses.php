<?php
    include 'koneksi.php';


    if(isset($_POST['aksi'])){
        if($_POST['aksi'] == "add"){
            // var_dump($_FILES) ;
            // die();

            $nama_barang = $_POST['nama_barang'];
            $jenis_barang = $_POST['jenis_barang'];
            $harga_beli = $_POST['harga_beli'];
            $harga_jual = $_POST['harga_jual'];
            $gambar = $_FILES['gambar_barang']['name'];
            $stok = $_POST['stok'];

            $dir = "img/";
            $tmpFile = $_FILES['gambar_barang']['tmp_name'];

            move_uploaded_file($tmpFile, $dir.$gambar);
            // die();


            $query = "INSERT INTO data_barang VALUES(null, '$nama_barang', '$jenis_barang', '$harga_beli', '$harga_jual','$gambar', '$stok')";
            $sql = mysqli_query($conn, $query);

            if($sql){
                header('location: index.php');
            } else{
                echo $query;
            }            

        } else if($_POST['aksi'] == "edit"){

            echo "edit data";
            die();

            $id_barang = $_POST['id_barang'];
            $nama_barang = $_POST['nama_barang'];
            $jenis_barang = $_POST['jenis_barang'];
            $harga_beli = $_POST['harga_beli'];
            $harga_jual = $_POST['harga_jual'];
            $gambar = $_FILES['gambar_barang']['name'];
            $stok = $_POST['stok'];
            
            $selectQuery = "SELECT * FROM data_barang WHERE id_barang = '$id_barang'";
            $selectSql = mysqli_query($conn, $selectQuery);
            $result = mysqli_fetch_assoc($selectSql);

            echo $result;
            die();

            if($_FILES['gambar_barang']['name'] == ""){
                $gambar = $result['gambar_barang'];
            } else {
                $gambar = $_FILES['gambar_barang']['name'];
                $tmpFile = $_FILES['gambar_barang']['tmp_name'];
                unlink("img/".$result['gambar_barang']);
                move_uploaded_file($tmpFile, "img/".$_FILES['gambar_barang']['name']);
            }


            $query = "UPDATE data_barang SET nama_barang='$nama_barang', jenis_barang='$jenis_barang', harga_beli='$harga_beli', harga_jual='$harga_jual', gambar_barang='$gambar', stok='$stok' WHERE id_barang = '$id_barang';";

            $sql = mysqli_query($conn, $query);
            header('location: index.php');

        }
    }

    if(isset($_GET['hapus'])){
        $id_barang = $_GET['hapus'];

        $selectQuery = "SELECT * FROM data_barang WHERE id_barang = '$id_barang'";
        $selectSql = mysqli_query($conn, $selectQuery);
        $result = mysqli_fetch_assoc($selectSql);
        unlink("img/".$result['gambar_barang']);

        $query = "DELETE FROM data_barang WHERE id_barang = '$id_barang';";
        $sql = mysqli_query($conn, $query);

        if($sql){
            header('location: index.php');
        } else{
            echo $query;
        }

    }
?>