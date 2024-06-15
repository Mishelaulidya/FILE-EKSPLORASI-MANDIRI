<?php
    include_once("./connect.php");

    $query = mysqli_query($db, "SELECT * FROM buku");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku</title>
</head>

<style>
    @media print {
        .tambahBuku, .BackHome, .cetak{
            display : none;
        }
    }
</style>

<body>
    <h1> Daftar Buku </h1>

    <table border="2">
        <tr>
            <td>Judul</td>
            <td>ISBN</td>
            <td>Unit</td>
            <td>Action</td>
        </tr>

        <?php foreach ($query as $buku) { ?>
            <tr>
                <td><?php echo $buku["Judul"] ?></td>
                <td><?php echo $buku["Isbn"] ?></td>
                <td><?php echo $buku["Unit"] ?></td>
                <td><a href=<?php echo"edit-buku.php?id=" . $buku["Id"] ?>>Edit</a>|
                <a href=<?php echo"delete-buku.php?id=" . $buku["Id"] ?>>Delete</a></td> 
            </tr>

        <?php } ?>
        </table>

        <br>
        <a href="./tambah-buku.php" class="tambahBuku">Tambah data buku</a>

        <br>
        <a href="./index.php" class="BackHome">Kembali ke halaman utama</a>

        <br>
        <a href="./cetak.php" class="cetak" target="Blank">Cetak Daftar Buku</a>


</body>
</html>