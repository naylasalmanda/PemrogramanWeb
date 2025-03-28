<?php
session_start();

if(!isset($_SESSION['mahasiswa'])){
    $_SESSION['mahasiswa'] = [];
}

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $nama = trim($_POST['nama']);
    $nim = trim($_POST['nim']);
    $alamat = trim($_POST['alamat']);
    $editIndex = isset($_POST['edit_index']) ? $_POST['edit_index'] : -1 ;

    if(!empty($nama) && !empty($nim) && !empty($alamat)){
        if($editIndex >= 0){
            $_SESSION['mahasiswa'][$editIndex] = ["nama" => $nama, "nim" => $nim, "alamat" => $alamat];
        }else{
            $_SESSION['mahasiswa'][] = ["nama" => $nama, "nim" => $nim, "alamat" => $alamat];
        }
    } 
}

if(isset($_GET['delete'])){
    $index = $_GET['delete'];
    if(isset($_SESSION['mahasiswa'][$index])){
        array_splice($_SESSION['mahasiswa'], $index, 1);
    }
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

$editData = ["nama" => "", "nim" => "", "alamat" => ""];
$editIndex = -1;
if(isset($_GET['edit'])){
    $index = $_GET['edit'];
    if(isset($_SESSION['mahasiswa'][$index])){
        $editData = $_SESSION['mahasiswa'][$index];
        $editIndex = $index;
    }
}
?>

<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form & Tabel Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <div class="container">
        <div class="form-box">
        <h2>Form Mahasiswa</h2>
        <form method="POST">
            <input type="hidden" name="edit_index" value="<?=$editIndex ?>">
            
            <label>Nama</label> <br>
            <input type="text" name="nama" value="<?= htmlspecialchars($editData['nama']) ?>" required> <br><br>
            
            <label>NIM</label> <br>
            <input type="text" name="nim" value="<?= htmlspecialchars($editData['nim']) ?>" required> <br><br>
            
            <label>Alamat</label> <br>
            <input type="text" name="alamat" value="<?= htmlspecialchars($editData['alamat']) ?>" required> <br><br>

            <button type = "submit"> <?= $editIndex >= 0 ? "Update" : "Simpan" ?> </button>
        </form>
        </div>
    </div>

        <div class="container">
            <div class="table-box">
                <h2>Tabel Mahasiswa</h2>
                <table border="1" cellpadding="10" cellspacing="0">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NIM</th>
                        <th>Alamat</th>
                        <th>Action</th>
                    </tr>
                    <?php if(!empty($_SESSION['mahasiswa'])): ?>
                        <?php foreach($_SESSION['mahasiswa'] as $index => $mhs): ?>
                            <tr>
                                <td><?= $index + 1 ?></td>
                                <td><?= htmlspecialchars($mhs['nama']) ?></td>
                                <td><?= htmlspecialchars($mhs['nim']) ?></td>
                                <td><?= htmlspecialchars($mhs['alamat']) ?></td>
                                <td>
                                    <a href="?edit=<?= $index ?>">Edit</a> |
                                    <a href="?delete=<?= $index ?>" onclick="return confirm('Apakah Anda ingin menghapus data ini?')">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                            <tr>
                                <td colspan="5" style="text-align: center;">Belum ada data</td>
                            </tr>
                    <?php endif; ?>
                </table>
            </div>
        </div>

</body>

</html>