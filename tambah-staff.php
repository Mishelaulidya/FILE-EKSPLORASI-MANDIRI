<?php
    include_once("./connect.php");

    if(isset($_POST["submit"])) {

        $nama = $_POST["nama"];
        $telp = $_POST["telp"];
        $email = $_POST["email"];

        // Tambahkan penanganan kesalahan
        $query = mysqli_query($db, "INSERT INTO staff (nama, telp, email) VALUES (
            '$nama', '$telp', '$email'
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
    <title>Form Tambah staff</title>
</head>
<body>
    <h1>Form tambah data staff</h1>

    <form action="" method="POST">

        <label for="nama">nama</label>
        <input type="text" id="nama" name="nama">

        <br>
        <br>

        <label for="telp">telp</label>
        <input type="text" id="telp" name="telp">

        <br>
        <br>

        <label for="email">email</label>
        <input type="text" id="email" name="email">

        <br>
        <br>

        <button type="submit" name="submit">Submit</button>

</form>

</body>
</html>