<?php
    include "../koneksi.php";
    session_start();

    $fotoid=$_POST['fotoid'];
    $isikomentar=$_POST['isikomentar'];
    $tanggalkomentar=date("Y-m-d");
    $userid=$_SESSION['userid'];

    $sql=mysqli_query($conn,"insert into komentarfoto values('','$fotoid','$userid','$isikomentar','$tanggalkomentar')");

    header("location:../frontend/view.php?id=".$fotoid);
?>