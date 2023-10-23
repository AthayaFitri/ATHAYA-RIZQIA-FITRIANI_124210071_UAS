<?php
    require "function.php";
    error_reporting(0);
    session_start();

    //Cek Cookie
    if(isset($_COOKIE['id']) && isset($_COOKIE['key'])){
        $id = $_COOKIE['id'];
        $key = $_COOKIE['key'];

        //Ambil username berdasarkan id
        $sql = "SELECT * FROM user WHERE id = '$id'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        
        //Cek cookie dan username
        if($key === hash('sha256', $row['username'])){
            $_SESSION['login'] = $row['username'];
        }
    }

    if(isset($_SESSION['login'])){
        header("Location: index.php");
    }

    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($conn, $sql);
        //Check Akun
        if($result->num_rows > 0){
            $row = mysqli_fetch_assoc($result);
            $_SESSION['login'] = $row['username'];

            //Create cookie
            if(isset($_POST['remember'])){
                setcookie('id', $row['id'], time()+(60*60*2));
                setcookie('key', hash('sha256', $row['username']), time()+(60*60*2));
                //expired 2 jam
                //hash adalah teknik mengacak, agar key tidak mudah terbaca oleh hacker 
                //dan keamanan tetap terjaga
            }

            //Go to dashboard
            header("Location: index.php");
        }else{
            echo "<script>alert('Anda gagal login. Harap login kembali.');</script>";
        }
    }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="images/logo.png" />
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>MyFriendsApp | | Log In</title>
</head>

<body>
    <div class="container">
        <form action="" method="POST" class="login">
            <center><img src="images/logo.png" width="50%" style="margin: 20px 0 20px;"></center>
            <div class="input-group">
                <input type="text" placeholder="Username" name="username" id="username" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Password" name="password" id="password" required>
                <div id="toggle" onclick="showHide();"></div>
                <script type="text/javascript">
                const password = document.getElementById('password');
                const toggle = document.getElementById('toggle');

                function showHide() {
                    if (password.type === 'password') {
                        password.setAttribute('type', 'text');
                        toggle.classList.add('hide');
                    } else {
                        password.setAttribute('type', 'password');
                        toggle.classList.remove('hide');
                    }
                }
                </script>
            </div>
            <div class="form-check">
                <input type="checkbox" name="remember" id="remember" class="form-check-input" />
                <label for="remember">Remember Me</label>
            </div>
            <div class="input-group">
                <button type="submit" name="submit" class="btn">Log In</button>
            </div>
        </form>
    </div>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>