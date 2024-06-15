<?php
    include_once("./connect.php");

    if(isset($_POST["submit"])) {

        $judul = $_POST["judul"];
        $isbn = $_POST["isbn"];
        $unit = $_POST["unit"];

        // Tambahkan penanganan kesalahan
        $query = mysqli_query($db, "INSERT INTO buku (judul, isbn, unit) VALUES (
            '$judul', '$isbn', '$unit'
            )");
        
        if (!$query) {
            echo "Error: " . mysqli_error($db);
        } else {
            echo "Data telah ditambahkan ke database.";
        }
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tambah Buku</title>
</head>
<body>
    <h1>Form tambah data buku</h1>

    <form action="" method="POST">

        <label for="judul">judul</label>
        <input type="text" id="judul" name="judul">

        <br>
        <br>

        <label for="isbn">isbn</label>
        <input type="text" id="isbn" name="isbn">

        <br>
        <br>

        <label for="unit">unit</label>
        <input type="text" id="unit" name="unit">

        <br>
        <br>

        <button type="submit" name="submit">Submit</button>

</form>

        
        <a href="./buku.php">Lihat daftar buku</a>

</body>
</html>