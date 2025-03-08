<?php
session_start();

if(isset($_SESSION['email'])){
    header("Location: form.php");
    exit();
}

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if(empty($email) || empty($password)){
        $error = "Email dan password tidak boleh kosong!";
    }else{
        $email_bagian = explode("@", $email);

        if(count($email_bagian)==2){
            $domain = $email_bagian[1];

            if($password===$domain){
                $_SESSION['email'] = $email;
                header("Location: form.php");
                exit();
            }else{
                $error = "Password harus sesuai dengan domain email!";
            }
        }else{
            $error = "Format email tidak valid!";
        }
    } 
}
?>

<!DOCTYPE html>
<html lang = "id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <section class="login" id="login">
        <h2 class="section-title">Login</h2>
        
        <div class="container">
            <div class="login-box">
                <form method = "POST">
                    <label><i class ='bx bx-envelope'></i> Email </label>
                    <input type = "email" name = "email" required> <br>

                    <label><i class ='bx bx-lock'></i> Password </label>
                    <input type = "password" name = "password" required> <br>

                    <button type = "submit">OK</button>
                </form> 
            </div>

            <?php 
            if(isset($error)){
                echo "<p class='error-message'>$error</p>";
            }
            ?>

        </div>
    </section>
</body>

</html>
