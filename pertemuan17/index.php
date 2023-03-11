<?php
    session_start();
    if(!isset($_SESSION["login"])){
        header("Location: login.php");
        exit;
    }
    require 'functions.php';
    $games = query("SELECT * FROM games ORDER BY id ASC");

    // tombol cari ditekan
    if(isset($_POST["cari"])){
        $games = cari($_POST["keyword"]);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Games</title>
</head>
<body>
    <a href="logout.php">Logout</a>
    <h1>Daftar Mahasiswa</h1>
    <a href="tambah.php">Tambah Data Games</a>
    <br><br>

    <form action="" method="POST">
        <input type="text" name="keyword" size="50" placeholder="input your search.." autocomplete="off" autofocus>
        <button type="submit" name="cari">Search!</button>
    </form>
    <br>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Action</th>
            <th>Nama</th>
            <th>Genre</th>
            <th>Tipe</th>
            <th>Platform</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach($games as $row): ?>
        <tr style="text-align: center;">
            <td><?= $i?></td>
            <td>
                <a href="ubah.php?id=<?= $row["id"]; ?>">Edit</a> |
                <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Apakah ingin menghapus?');">Delete</a>
            </td>
            <td><?= $row["nama"]; ?></td>
            <td><?= $row["genre"]; ?></td>
            <td><?= $row["tipe"]; ?></td>
            <td><?= $row["platform"]; ?></td>
        </tr>
        <?php $i++ ?>
        <?php endforeach; ?>
    </table>
</body>
</html>