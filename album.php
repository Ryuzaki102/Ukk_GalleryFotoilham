<?php
session_start();
if (!isset($_SESSION['userid'])) {
    header('location:login.php');
}

// Memeriksa apakah sesi sudah dimulai
if (session_status() == PHP_SESSION_NONE) {
    // Jika belum, mulai sesi
    session_start();
}

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
    <h1 class="text-center mt-3">My Album</h1>
    <div class="container d-flex mt-5">
        <div class="bingkai-album-create">
            <button type="button" class="btn" data-toggle="modal" data-target="#contohModal">
                <img src="gambar/plus.png" alt="" style="width: 50px;">
            </button>
        </div>
        <!-- modal -->
        <div class="modal fade" id="contohModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 500px;">
                <div class="modal-content">
                    <!-- Konten modal di sini -->
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalLabel">Create New Album</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Formulir Create -->
                        <form action="tambah_album.php" method="post" enctype="multipart/form-data">
                            <div class="form-genus d-flex">
                                <div class="form-spesies-2 ms-2 w-100">
                                    <div class="form-group">
                                        <label for="namaalbum">Nama Album</label>
                                        <input type="text" class="form-control mt-2" id="namaalbum" name="namaalbum"
                                            required style="height: 50px;">
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="deskripsi">Deskripsi</label>
                                        <input type="text" class="form-control mt-2" id="deskripsi" name="deskripsi"
                                            required style="height: 80px;">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" value="Tambah" name="submit"
                                class="btn btn-primary ms-2 mt-3">Upload</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <?php
            include "koneksi.php";
            $userid = $_SESSION['userid'];
            $sql = mysqli_query($conn, "SELECT * FROM album WHERE userid='$userid'");
            while ($data = mysqli_fetch_array($sql)) {
        ?>
        <div class="bingkai-album ms-4">
            <h3 class="text-center align-middle"><?= $data['namaalbum'] ?> </h3>
            <div class="delete">
                <div class="like-view">
                    <!-- Tambahkan tautan untuk melihat foto pada album tertentu -->
                    <a href="foto_album.php?albumid=<?= $data['albumid'] ?>" class="view me-1" alt="">
                        <td><span data-feather="image"></span></td>
                    </a>
                    <a href="edit_album.php?albumid=<?= $data['albumid'] ?>" class="view me-1" alt="">
                        <td><span data-feather="edit"></span></td>
                    </a>
                    <a href="hapus_album.php?albumid=<?= $data['albumid'] ?>"  class="view" alt="">
                        <td><span data-feather="trash"></span></td>
                    </a>
                </div>
            </div>
        </div>
        <?php
}
?>

    </div>



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
