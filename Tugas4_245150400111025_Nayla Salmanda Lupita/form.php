<?php
session_start();

if(!isset($_SESSION['email'])){
    header("Location: login.php");
    exit();
}

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $_SESSION['nama'] = $_POST['nama'];
    $_SESSION['tempat_lahir'] = $_POST['tempat_lahir'];
    $_SESSION['tanggal_lahir'] = $_POST['tanggal_lahir'];
    $_SESSION['SD'] = $_POST['SD'];
    $_SESSION['SMP'] = $_POST['SMP'];
    $_SESSION['SMA'] = $_POST['SMA'];

    header("Location: hasil.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang = "id">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-widht, initial-scale=1.0">
    <title>Form Biodata</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <div class="container">
        <h2>Isi Data Diri</h2>
        <form method = "POST">
            <label>Nama: </label>
            <input type="text" id="nama" name="nama" required><br>
            <label>Tempat lahir: </label>
            <input type="text" id="tempat_lahir" name="tempat_lahir" required><br>
            <label>Tanggal lahir: </label>
            <input type="date" id="tanggal_lahir" name="tanggal_lahir" required><br>
            <label>SD: </label>
            <input type="text" id="SD" name="SD" required><br>
            <label>SMP:  </label>
            <input type="text" id="SMP" name="SMP" required><br>
            <label>SMA: </label>
            <input type="text" id="SMA" name="SMA" required><br>

            <button type="submit">SUBMIT</button>
        </form>
    </div>
</body>
</html>