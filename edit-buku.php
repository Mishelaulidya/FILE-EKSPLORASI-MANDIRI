<?php
    include_once("./connect.php");

    $id = $_GET["id"];

    $query_get_data = mysqli_query($db, "SELECT * from buku where id=$id");
    $buku = mysqli_fetch_assoc($query_get_data);

    if(isset($_POST["submit"])) {

        $judul = $_POST["judul"];
        $isbn = $_POST["isbn"];
        $unit = $_POST["unit"];

        // Tambahkan penanganan kesalahan
        $query = mysqli_query($db, "UPDATE buku SET judul='$judul', isbn='$isbn', unit='$unit' WHERE id=$id ");
        
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
    <h1>Form edit data buku</h1>

    <form action="" method="POST">

        <label for="judul">judul</label>
        <input value="<?php echo $buku['judul'] ?>" type="text" id="judul" name="judul">
 
        <br>
        <br>

        <label for="isbn">isbn</label>
        <input value="<?php echo $buku['isbn'] ?>" type="text" id="isbn" name="isbn">

        <br>
        <br>

        <label for="unit">unit</label>
        <input value="<?php echo $buku['unit'] ?>" type="text" id="unit" name="unit">

        <br>
        <br>

        <button type="submit" name="submit">Submit</button>

</form>

</body>
</html>