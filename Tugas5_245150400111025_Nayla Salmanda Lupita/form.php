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

    if (isset($_FILES["pas_foto"]) && $_FILES["pas_foto"]["error"] == 0){
        $allowedTypes = ["jpg", "jpeg", "png"];
        $file = $_FILES["pas_foto"];
        $filetype = strtolower (pathinfo($file["name"], PATHINFO_EXTENSION));
        $filesize = $_FILES["pas_foto"]["size"];
        $filetmp = $_FILES["pas_foto"]["tmp_name"];

        if ($filesize > 2097152) {
            echo "Ukuran file terlalu besar. Maksimal 2MB.";
            exit();
        } else if (!in_array($filetype, $allowedTypes)) {
            echo "Format file tidak didukung.";
            exit();
        }
        $uploadDir = "datafoto/";
        if (!is_dir($uploadDir)){
            mkdir($uploadDir, 0777, true);
        }

        $newFileName = uniqid() . "." . $filetype;
        $uploadPath = $uploadDir . $newFileName;

        if (move_uploaded_file($filetmp, $uploadPath)){
            $_SESSION["pas_foto"] = $uploadPath;
        } else {
            echo "Gagal mengunggah file.";
            exit();
        }
    }


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
        <form method = "POST" enctype="multipart/form-data">
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
            <label>Pas foto: </label>
            <input type="file" id="pas_foto" name="pas_foto" accept="image/*" required><br>

            <button type="submit">SUBMIT</button>
        </form>
    </div>
</body>
</html>