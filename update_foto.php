<?php
include "koneksi.php";
session_start();

// Periksa apakah fotoid dikirimkan melalui POST
if(isset($_POST['fotoid'])) {
    $fotoid = $_POST['fotoid'];
    $judulfoto = $_POST['judulfoto'];
    $deskripsifoto = $_POST['deskripsifoto'];
    $albumid = $_POST['albumid'];

    // Jika upload gambar baru
    if($_FILES['lokasifile']['name'] != "") {
        $rand = rand();
        $ekstensi = array('png','jpg','jpeg','gif');
        $filename = $_FILES['lokasifile']['name'];
        $ukuran = $_FILES['lokasifile']['size'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        
        if(!in_array($ext, $ekstensi)) {
            header("location:foto.php");
            exit(); // Segera keluar setelah redirect
        } else {
            if($ukuran < 1044070) {
                $xx = $rand.'_'.$filename;
                move_uploaded_file($_FILES['lokasifile']['tmp_name'], 'gambar/'.$rand.'_'.$filename);
                
                // Perbarui foto dengan fotoid tertentu
                mysqli_query($conn, "UPDATE foto SET judulfoto='$judulfoto', deskripsifoto='$deskripsifoto', lokasifile='$xx', albumid='$albumid' WHERE fotoid='$fotoid'");
                header("location:album.php");
                exit(); // Segera keluar setelah redirect
            } else {
                header("location:album.php");
                exit(); // Segera keluar setelah redirect
            }
        }
    } else {
        // Perbarui foto tanpa mengubah gambar
        mysqli_query($conn, "UPDATE foto SET judulfoto='$judulfoto', deskripsifoto='$deskripsifoto', albumid='$albumid' WHERE fotoid='$fotoid'");
        header("location:album.php");
        exit(); // Segera keluar setelah redirect
    }
} else {
    // Jika fotoid tidak ditemukan dalam POST, kembalikan pengguna ke halaman foto
    header("location:foto.php");
    exit(); // Segera keluar setelah redirect
}
?>
