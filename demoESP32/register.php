<?php 

session_start();
$connect = new mysqli("localhost", "id16723080_root", "D@nggD@ngg1234", "id16723080_users");
        // cho phep php luu tieng viet vao data base
        mysqli_set_charset($connect,"utf8");
        //kiem tra ket noi co thanh cong hay khong
        if ($connect->connect_error) {
            var_dump($connect->connect_error);
            die();
        }
   if (!empty($_POST)) {
        
 
    $username = $_POST["username"];
    $password = $_POST["password"];
    $password2 = $_POST["password2"];

    $result = mysqli_query ($connect, "SELECT username FROM userdb WHERE username = '$username' ");
    
    if (mysqli_fetch_assoc($result) ){
        echo "
        <script>
            alert('Tên người dùng đã đăng ký');
        </script>
        ";
        exit();
    }
    elseif ( $password !== $password2){
        echo "
        <script>
        alert('Mật không khớp')
        </script>
        ";
        exit();
    }

    else {
        $query = "INSERT INTO userdb(username,password) VALUES ('".$username."','".$password."')";
        mysqli_query($connect,$query);
        $connect->close();
        header("Location: login.php");
    }
    }
    
?>

<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Register</title>
    <link rel="icon" href="https://i.pinimg.com/originals/fd/95/c0/fd95c076013bc3f5ced0ec0d82de5640.jpg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <link href="https://fonts.googleapis.com/css?family=Muli|Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="loginstyle.css">
</head>
<body>
    <article id="main">
        <div class="container">
            <div class="row">
                <div class="col-md-6 d-none d-sm-none d-md-block" style="border-right: 1.5px solid #f2f2f2">
                    <img src="https://i.pinimg.com/originals/fd/95/c0/fd95c076013bc3f5ced0ec0d82de5640.jpg">
                </div>
                <div class="col-md-6" style="border-left: 1.5px solid #f2f2f2">
                    <a href="#" class="design">Design by Bx</a>
                    <div class="row">
                        <div class="col-md-10 mx-auto">
                            <h1><span>Register</span> </h1>
                            <?php if (isset($error)): ?>
                            <p style="color : red; font-style: italic">Tài khoản đã tồn tại</p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-md-9 mx-auto">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label class="sr-only" for="username">Username</label>
                                    <div class="input-group">
                                        <input type="text" name="username" class="form-control" id="username" placeholder="Username">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="far fa-user"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="Password">Password</label>
                                    <div class="input-group">
                                        <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="far fa-eye-slash"></i>
                                            </div>
                                        </div>
                                    </div>
                                     <label class="sr-only" for="Password">Confirm Password</label>
                                    <div class="input-group">
                                        <input type="password" name="password2" class="form-control" id="password2" placeholder="Cofirm Password" style="margin-top: 15px">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"style="margin-top: 15px">
                                                <i class="far fa-eye-slash"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="login.php" id="emailHelp" class="form-text text-muted text-right">Bạn đã có tài khoản?</a>
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="register">R E G I S T E R</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </article>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>