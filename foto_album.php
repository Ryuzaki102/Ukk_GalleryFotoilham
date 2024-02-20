<?php
include "koneksi.php";

// Periksa apakah parameter albumid ada pada URL
if(isset($_GET['albumid'])){
    $albumid = $_GET['albumid'];

    // Query untuk mendapatkan informasi album
    $sqlAlbum = mysqli_query($conn, "SELECT * FROM album WHERE albumid='$albumid'");
    $dataAlbum = mysqli_fetch_array($sqlAlbum);

    // Query untuk mendapatkan foto berdasarkan album yang dipilih
    $sqlFoto = mysqli_query($conn, "SELECT * FROM foto WHERE albumid='$albumid'");
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
    <link rel="stylesheet" href="css/style.css?<?php echo time(); ?>">
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
                    <a class="nav-link me-3 active" aria-current="page" href="index.php">Home</a>
                    <a class="nav-link me-3" href="album.php">Album</a>
                    <?php
                        session_start();
                        if(!isset($_SESSION['userid'])){
                    ?>
                    <a class="nav-link me-3" href="login.php">Login</a>
                    <a class="nav-link me-3" href="register.php">Register</a>
                    <?php
                        }else{
                    ?>
                    <a class="nav-link me-3" href="logout.php">Logout</a>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="main-image">
            <div class="text-overlay">
                <h2>FOTO SAYA </h2>
                <!-- Tombol upload dengan atribut data-toggle dan data-target untuk memicu modal -->
            </div>
            <!-- Modal -->
        </div>
    </div>

    <div class="content container">
        <div class="bingkai d-flex mt-5">
            <?php
            // Loop untuk menampilkan foto berdasarkan album
            while ($data = mysqli_fetch_array($sqlFoto)) {
            ?>
            <div class="image">
                <img src="gambar/<?= $data['lokasifile'] ?>" width="200px">
                <div class="overlay">
                    <div class="judul-foto"><?= $data['judulfoto'] ?></div>
                    <div class="like-view">
                    <button type="button" class="btn" data-toggle="modal" data-target="#contohModal"
                        style="background-color: rgba(0, 0, 0, 0.425); " style="padding: 0;">
                        <img src="gambar/edit.png" alt="" style="width: 25px; height: 25px; padding: 0;">
                    </button>
                    <a href="hapus_foto.php?fotoid=<?=$data['fotoid']?>" class="mt-1"><img src="gambar/sampah.png" alt=""
                                style="width: 30px; height: 30px;"></a>

                        <!-- <a href="edit_foto.php?fotoid=<?= $data['fotoid'] ?>"> <img src="gambar/edit.png" alt=""
                                style="width: 30px; height: 30px;"> </a> -->
                    </div>
                </div>
            </div>
             <!-- Modal -->
             <div class="modal fade" id="contohModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 610px;">
                    <div class="modal-content">
                        <!-- Konten modal di sini -->
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalLabel">Update Your Image</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Formulir Create -->
                            <form action="update_foto.php" method="post" enctype="multipart/form-data">
                                <input type="text" name="fotoid" value="<?=$data['fotoid']?>" hidden>

                                <div class="form-genus d-flex">
                                    <div class="form-spesies-1">
                                        <div class="form-group">
                                            <label for="lokasifile">Choose Image</label>
                                            <!-- Tentukan lebar dan tinggi yang diinginkan -->
                                            <input type="file" class="form-control" id="lokasifile" name="lokasifile"
                                                accept="assets/img/upload-3-64.png" style="width: 250px; height: 300px;"
                                                required>
                                            <!-- Tampilkan pratinjau gambar jika dibutuhkan -->
                                            <img id="imagePreview"
                                                style="max-width: 100%; max-height: 200px; margin-top: 10px;" />
                                        </div>
                                    </div>
                                    <div class="form-spesies-2 ms-4 w-100">
                                        <div class="form-group">
                                            <label for="judulfoto">Judul Foto</label>
                                            <input type="text" class="form-control mt-2" id="judulfoto"
                                                name="judulfoto" required style="height: 50px;" value="<?=$data['judulfoto']?>">
                                        </div>
                                        <div class="form-group mt-3">
                                            <label for="AlbumID" class="form-label">Album</label>
                                            <select name="albumid">
                                                <?php
                                                     $userid=$_SESSION['userid'];
                                                     $sql2=mysqli_query($conn,"select * from album where userid='$userid'");
                                                     while($data2=mysqli_fetch_array($sql2)){
                                                ?>
                                                    <option value="<?=$data2['albumid']?>" <?php if($data2['albumid']==$data['albumid']){echo 'selected';}?>><?=$data2['namaalbum']?></option>
                                                </option>
                                                <?php
                                                    }
                                                ?>
                                            </select>

                                        </div>
                                        <div class="form-group mt-3">
                                            <label for="deskripsifoto">Deskripsi</label>
                                            <input type="text" class="form-control mt-2" id="deskripsifoto"
                                                name="deskripsifoto" required style="height: 80px;"  value="<?=$data['deskripsifoto']?>">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" value="ubah" name="submit"
                                    class="btn btn-primary">Update</button>
                        
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            }
            ?>
        </div>
    </div>

    <!-- footer -->
    <div class="" style="margin-top: 150px;">
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

                            <a class="btn btn-primary btn-floating m-1" style="background-color: #3b5998" href="#!"
                                role="button"><i class="fab fa-facebook-f"></i></a>

                            <a class="btn btn-primary btn-floating m-1" style="background-color: #55acee" href="#!"
                                role="button"><i class="fab fa-twitter"></i></a>

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
    <script>
        document.getElementById('gambar').addEventListener('change', function(e) {
            var fileInput = e.target;
            var file = fileInput.files[0];

            if (file) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('imagePreview').src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
        integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
    </script>
    <!-- choose one -->
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>

    <script>
        feather.replace();
    </script>

</body>

</html>
<?php
} else {
    // Jika parameter albumid tidak ditemukan, berikan pesan kesalahan atau arahkan pengguna ke halaman lain
    echo "Error: Parameter 'albumid' not found in URL";
}
?>
