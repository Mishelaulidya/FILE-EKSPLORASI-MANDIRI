<?php
require_once __DIR__ . '/vendor/autoload.php';

// Konfigurasi koneksi ke database
$dsn = 'mysql:host=localhost;dbname=perpustakaan_saya';
$username = 'root';
$password = '';

// Membuat koneksi PDO
$pdo = new PDO($dsn, $username, $password);

// Kueri untuk mengambil data buku dari database
$query = $pdo->query('SELECT * FROM buku')->fetchAll(PDO::FETCH_ASSOC);

$html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Isi Buku</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1> Daftar isi Buku </h1>
    <table>
        <tr>
            <th>Judul</th>
            <th>ISBN</th>
            <th>Unit</th>
        </tr>';

// Loop melalui data buku dan tambahkan baris untuk setiap buku
foreach ($query as $buku) {
    $html .= '<tr>
                <td>' . $buku["Judul"] . '</td>
                <td>' . $buku["Isbn"] . '</td>
                <td>' . $buku["Unit"] . '</td>
            </tr>';
}

$html .= '</table>
</body>
</html>';

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$mpdf->Output();
?>