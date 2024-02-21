<?php

// Memeriksa apakah sesi sudah dimulai
if (session_status() == PHP_SESSION_NONE) {
    // Jika belum, mulai sesi
    session_start();
}


include '../koneksi.php';

$fotoid = $_GET['id'];
$sql = mysqli_query($conn, "SELECT * FROM foto WHERE fotoid = $fotoid");
$dataFoto = mysqli_fetch_array($sql);


// Ambil fotoid dari URL
$fotoid = $_GET['id'];

// Query untuk mendapatkan data foto
$sql = mysqli_query($conn, "SELECT * FROM foto WHERE fotoid='$fotoid'");
$data = mysqli_fetch_array($sql);

if (isset($_GET['id'])) {
    $fotoid = $_GET['id'];

    // Lakukan query hanya jika 'fotoid' sudah di-set
    $sql = mysqli_query($conn, "SELECT * FROM foto WHERE fotoid='$fotoid'");
    while ($data = mysqli_fetch_array($sql)) 

    $sqlFoto = mysqli_query($conn, "SELECT * FROM foto WHERE fotoid='$fotoid'");
    $dataFoto = mysqli_fetch_array($sqlFoto);
    
    $sqlKomentar = mysqli_query($conn, "SELECT * FROM komentarfoto JOIN user ON komentarfoto.userid = user.userid WHERE komentarfoto.fotoid='$fotoid'");
{
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="../css/style.css?<?php echo time(); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


</head>

<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand ms-5" href="#">Gallery</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto me-5"> <!-- Tambahkan class "ms-auto" di sini -->
                    <a class="nav-link me-3 active" aria-current="page" href="../index.php">Home</a>
                    <a class="nav-link me-3" href="album.php">Album</a>
                    <?php
                        if(!isset($_SESSION['userid'])){
                    ?>
                    <a class="nav-link me-3" href="login.php">Login</a>
                    <a class="nav-link me-3" href="register.php">Register</a>
                    <?php
                        }else{
                    ?>
                    <a class="nav-link me-3" href="../backend/logout.php">Logout</a>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </nav>

    <div class="view-container mt-5">
        <div class="view-image">
            <img src="../gambar/<?= $dataFoto['lokasifile'] ?>" alt="" class="img-fluid">
        </div>
        <div class="view-content">
            <div class="view-title d-flex">
                <h3 class=""><?= $dataFoto['judulfoto'] ?></h3>
            </div>
            <p style="font-size: 18px;" class="mt-3"><?= $dataFoto['deskripsifoto'] ?></p>
            <hr>
            <p class="text-komentar">Komentar</p>

            <div class="komentar-container scrollable">
                <?php
        // Loop untuk menampilkan komentar
        while ($data = mysqli_fetch_array($sqlKomentar)) {
                ?>
                <div class="box-komen mb-3">
                    <p class="user-komen"> <?= $data['namalengkap'] ?></p>
                    <p class="isi-komen"> <?= $data['isikomentar'] ?></p>
                </div>
                <?php
                    }
                ?>
            </div>

            <div class="form-komentar mt-auto">
                <!-- Tambahkan class "mt-auto" untuk meletakkan formulir di bagian bawah -->
                <form action="../backend/tambah_komentar.php" method="post">
                    <div class="mt-0 mb-0">
                        <div class="waduh d-flex">
                            <p style="font-style: italic;">Tulis Komentar</p>
                            <div class="wadau d-flex">
                                <?php
                                $fotoid = $_GET['id'];
                                $queryJumlahLike = "SELECT COUNT(*) as jumlah_like FROM `likefoto` WHERE fotoid='$fotoid'";
                                $resultJumlahLike = mysqli_query($conn, $queryJumlahLike);
                                $dataJumlahLike = mysqli_fetch_assoc($resultJumlahLike);
                                $jumlahLike = $dataJumlahLike['jumlah_like'];
                                ?>
                                <p style="font-weight: 600; margin-top: 4px; color: maroon;"><?= $jumlahLike ?> Like</p>
                                <a href="../backend/like.php?fotoid=<?= $fotoid ?>"> <img src="../gambar/like.png" alt=""
                                        style="width: 30px; height: 30px;"> </a>
                            </div>

                        </div>
                        <?php
                            include "../koneksi.php";
                            $fotoid = $_GET['id'];
                            $sql = mysqli_query($conn, "select * from foto where fotoid='$fotoid'");
                            while ($data = mysqli_fetch_array($sql)) {
                        ?>
                        <input type="text" name="fotoid" value="<?= $data['fotoid'] ?>" hidden>
                        <input name="isikomentar" class="form-control"
                            style="margin-top: -7px; border-radius: 10px; height: 50px;"></input>
                    </div>
                    <div class="text-end mt-2">
                        <button type="submit" value="Tambah" class="btn btn-primary">Kirim</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <!-- footer -->
    <div class=" mt-5">
        <footer class="text-center text-lg-start text-white" style="background-color: #929fba">
            <div class="container p-4 pb-0">
                <section class="">
                    <div class="row">
                        <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                            <h6 class="text-uppercase mb-4 font-weight-bold">
                                Arifin Ilham
                            </h6>
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid quisquam velit facilis,
                                earum doloremque suscipit.
                            </p>
                        </div>

                        <hr class="w-100 clearfix d-md-none" />

                        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                            <h6 class="text-uppercase mb-4 font-weight-bold">Catatan Kaki</h6>
                            <p>
                                <a class="text-white">MDBootstrap</a>
                            </p>
                            <p>
                                <a class="text-white">Box Shadow</a>
                            </p>
                            <p>
                                <a class="text-white">BrandFlow</a>
                            </p>
                            <p>
                                <a class="text-white">Bootstrap Angular</a>
                            </p>
                        </div>
                        <!-- Grid column -->

                        <hr class="w-100 clearfix d-md-none" />

                        <hr class="w-100 clearfix d-md-none" />

                        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                            <h6 class="text-uppercase mb-4 font-weight-bold">Contact</h6>
                            <p><i class="fas fa-home mr-3"></i> Padang, Kuranji, IDN</p>
                            <p><i class="fas fa-envelope mr-3"></i> muhammadarifinilham209@gmail.com</p>
                            <p><i class="fas fa-phone mr-3"></i> + 62 576 260 8340</p>
                            <p><i class="fas fa-print mr-3"></i> + 62 234 567 89</p>
                        </div>

                        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
                            <h6 class="text-uppercase mb-4 font-weight-bold">Follow us</h6>

                            <a class="btn btn-primary btn-floating m-1" style="background-color: #3b5998"
                                href="#!" role="button"><i class="fab fa-facebook-f"></i></a>

                            <a class="btn btn-primary btn-floating m-1" style="background-color: #55acee"
                                href="#!" role="button"><i class="fab fa-twitter"></i></a>

                            <a class="btn btn-primary btn-floating m-1" style="background-color: #dd4b39"
                                href="#!" role="button"><i class="fab fa-google"></i></a>

                            <a class="btn btn-primary btn-floating m-1" style="background-color: #ac2bac"
                                href="#!" role="button"><i class="fab fa-instagram"></i></a>

                            <a class="btn btn-primary btn-floating m-1" style="background-color: #0082ca"
                                href="#!" role="button"><i class="fab fa-linkedin-in"></i></a>

                            <a class="btn btn-primary btn-floating m-1" style="background-color: #333333"
                                href="#!" role="button"><i class="fab fa-github"></i></a>
                        </div>
                    </div>
                </section>
            </div>

            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
                © 2024 Copyright:
                <a class="text-white">Muhammad Arifin Ilham</a>
            </div>
        </footer>
    </div>
</body>

</html>
<?php } ?>
<?php
    }
} else {
    // Jika 'fotoid' tidak ada, berikan pesan kesalahan atau arahkan pengguna ke halaman lain
    echo "Error: Parameter 'fotoid' not found in URL";
}
?>
