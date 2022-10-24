<?php
require 'function.php';

if( isset($_POST["login"]) ){
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    //cek username
    if( mysqli_num_rows($result) === 1 ) {
        
        //cek password
        $row = mysqli_fetch_assoc($result);
        if( password_verify($password, $row["password"]) ){
            header("Location: index.php");
            exit;
        }
    }

    $error = true;

}

?>
<!DOCTYPE html>
<html>
<head>
    <title>login</title>
</head>
<body>
    
<h1>Halaman Login</h1>

<?php if( isset($error) ) : ?>
    <p style="color: red; font-style: italic;">username atau password salah!</p>
<?php endif; ?>

<form action="" method="post">
    <label for="username">username  :</label>
    <input type="text" name="username" id="username">
    <br>
    <label for="password">password  :</label>
    <input type="password" name="password" id="password">
    <br>
    <button type="submit" name="login">Login</button>
    <br>
    <a href="registrasi.php">Registrasi</a>
</form>

</body>
</html>