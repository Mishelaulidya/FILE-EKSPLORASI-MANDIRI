<?php
    include_once("./connect.php");

    $query = mysqli_query($db, "SELECT * FROM staff");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar staff</title>
</head>
<body>
    <h1> Daftar Staff </h1>

    <table border="2">
        <tr>
            <td>Nama</td>
            <td>Telepon</td>
            <td>Email</td>
            <td>Action</td>
        </tr>

        <?php foreach ($query as $staff) { ?>
            <tr>
                <td><?php echo $staff["nama"] ?></td>
                <td><?php echo $staff["telp"] ?></td>
                <td><?php echo $staff["email"] ?></td>
                <td><a href=<?php echo"edit-staff.php?id=" . $staff["id"] ?>>Edit</a>|
                <a href=<?php echo"delete-staff.php?id=" . $staff["id"] ?>>Delete</a></td> 
            </tr>

        <?php } ?>
        </table>

        <br>
        <a href="./tambah-staff.php">Tambah data staff</a>
        <br>

        <a href="./index.php">Kembali ke halaman utama</a>
</body>
</html>