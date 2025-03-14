<?php
session_start();

if(!isset($_SESSION['email'])){
    header("Location: login.php");
    exit();
}

$foto = isset($_SESSION['pas_foto']) && file_exists($_SESSION['pas_foto']) ? $_SESSION['pas_foto'] : '';
?>

<!DOCTYPE html>
<html lang = "id">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-widht, initial-scale=1.0">
    <title>Biodata Diri</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <div class="container hasil-container">
        <div class="biodata-wrapper">
        <div class="biodata-text">
            <h2>Hasil Biodata</h2>
            <p><strong>Email: </strong><?php echo $_SESSION['email']; ?> </p>
            <p><strong>Nama : </strong><?php echo $_SESSION['nama']; ?> </p>
            <p><strong>Tempat lahir : </strong><?php echo $_SESSION['tempat_lahir']; ?> </p>
            <p><strong>Tanggal lahir : </strong><?php echo date("d-m-Y", strtotime($_SESSION['tanggal_lahir'])); ?> </p>
            <p><strong>SD : </strong><?php echo $_SESSION['SD']; ?> </p>
            <p><strong>SMP : </strong><?php echo $_SESSION['SMP']; ?> </p>
            <p><strong>SMA : </strong><?php echo $_SESSION['SMA']; ?> </p>
        </div>

        <?php if ($foto !== ''): ?>
            <div class="biodata-photo">
                <img src="<?php echo htmlspecialchars($foto); ?>" alt="Foto Profil" width="177px" height="236px">
            </div>
        <?php endif; ?>
        </div>

        <div class="logout-container">
        <a href = "logout.php" class="logout-link">Logout</a>
        </div>
    </div>
</body>
</html>
