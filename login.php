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
    <link rel="stylesheet" href="css/login.css?<?php echo time(); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <title>Halaman Login</title>
    <style>
        body {
            background-image: url(gambar/xzcc.jpg);
            background-size: cover;
            position: relative;
        }

        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: -100;
            /* Mengatur lapisan di belakang konten */
        }
    </style>
</head>

<body>
    <form method="post" action="proses_login.php">
        <h2 class="text-center text-white pt-4">Login Form</h2>
        <div class="login container-fluid">
            <div class="form-login">
                <div class="content">
                    <div class="logo" style="margin-left: 72px;"><img src="gambar/logo.png" alt=""
                            width="100px">
                    </div>
                    <div class="form-floating">
                        <input type="text" name="username" class="form-control" id="username"
                            placeholder="name@example.com" autofocus required>
                        <label for="email">Username</label>

                    </div>
                    <div class="form-floating">
                        <input type="password" name="password" class="form-control" id="password"
                            placeholder="Password" required>
                        <label for="password">Password</label>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" id="remember-me" name="remember_me">
                        <label for="remember-me" class="text-white mt-2">Ingat Saya</label>
                    </div>
                    <button type="submit" value="Login" name="login" class="bg-primary mt-2 p-2 text-white"
                        style="width: 100%">Login</button>
                    <p class="text-center text-white mt-2">Dont have account? <a href="register.php" style="color: salmon;">
                            Registered</a></p>
                </div>

            </div>
        </div>
    </form>
</body>

</html>
