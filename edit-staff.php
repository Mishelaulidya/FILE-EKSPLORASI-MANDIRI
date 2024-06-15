<?php
    include_once("./connect.php");

    $id = $_GET["id"];

    $query_get_data = mysqli_query($db, "SELECT * from staff where id=$id");
    $staff = mysqli_fetch_assoc($query_get_data);

    if(isset($_POST["submit"])) {

        $nama = $_POST["nama"];
        $telp = $_POST["telp"];
        $email = $_POST["email"];

        // Tambahkan penanganan kesalahan
        $query = mysqli_query($db, "UPDATE staff SET nama='$nama', telp='$telp', email='$email' WHERE id=$id ");
        
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
    <h1>Form edit data staff</h1>

    <form action="" method="POST">

        <label for="nama">nama</label>
        <input value="<?php echo $staff['nama'] ?>" type="text" id="nama" name="nama">
 
        <br>
        <br>

        <label for="telp">telp</label>
        <input value="<?php echo $staff['telp'] ?>" type="text" id="telp" name="telp">

        <br>
        <br>

        <label for="email">email</label>
        <input value="<?php echo $staff['email'] ?>" type="text" id="email" name="email">

        <br>
        <br>

        <button type="submit" name="submit">Submit</button>

</form>

</body>
</html>