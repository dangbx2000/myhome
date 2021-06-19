<?php 

session_start();

if (isset($_SESSION["login"])){
    header("Location: index.php");
    exit;
}
require_once 'connection.php';
   $connect = new mysqli("localhost", "id16723080_root", "D@nggD@ngg1234", "id16723080_users");
        // cho phep php luu tieng viet vao data base
        mysqli_set_charset($connect,"utf8");
        //kiem tra ket noi co thanh cong hay khong
        if ($connect->connect_error) {
            var_dump($connect->connect_error);
            die();
        }
if (isset($_POST["login"])){

    $username = $_POST["username"];
    $password = $_POST["password"];

     $query  = "SELECT * FROM userdb WHERE username='".$username."' AND password='".$password."'";
             $result = mysqli_query($connect,$query);
            $data   = array();
            while ($row = mysqli_fetch_array($result,1)) {
                $data[] = $row;
             }
             //dong ket noi
             $connect->close();
             if ($data != null && count($data) > 0) {
                 header("Location: index.php");
                 exit();
             }
    // $ketqua = mysqli_query($connect, "SELECT * FROM userdb WHERE username = '$username' ");

    // if (mysqli_num_rows($ketqua) === 1 ){

    //     $row = mysqli_fetch_assoc($ketqua);
    //     if (password_verify($password, $row["password"]) ){

    //         $_SESSION["login"] = true;

    //         header("Location: index.php");
    //         exit;
    //     }
    }
    // $error = true;
    
 // }

?>

<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Login</title>
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
                            <h1><span>Login</span> as a Administrator</h1>
                            <?php if (isset($error)): ?>
                            <p style="color : red; font-style: italic">Sai tên đăng nhập hoặt mật khẩu</p>
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
                                    <a href="#" id="emailHelp" class="form-text text-muted text-right">Quên mật khầu?</a>
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="login">L O G I N</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </article>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>