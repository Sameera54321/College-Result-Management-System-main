<?php
session_start();
error_reporting(0);
include('includes/config.php');
if($_SESSION['alogin']!=''){
    $_SESSION['alogin']='';
}
if(isset($_POST['login']))
{
    $uname=$_POST['username'];
    $password=$_POST['password'];
    $sql ="SELECT UserName,Password FROM admin WHERE UserName=:uname and Password=:password";
    $query= $dbh -> prepare($sql);
    $query-> bindParam(':uname', $uname, PDO::PARAM_STR);
    $query-> bindParam(':password', $password, PDO::PARAM_STR);
    $query-> execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    if($query->rowCount() > 0)
    {
        $_SESSION['alogin']=$_POST['username'];
        echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
    } else {
        echo "<script>alert('Invalid Details');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" media="screen">
    <link rel="stylesheet" href="css/font-awesome.min.css" media="screen">
    <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen">
    <style>
        body {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            overflow: hidden;
            background: #000;
            font-family: 'Arial', sans-serif;
        }
        
        .video-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            overflow: hidden;
        }
        
        .video-background iframe {
            width: 100%;
            height: 100%;
            object-fit: cover;
            pointer-events: none;
        }
        
        .video-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: -1;
        }
        
        .login-container {
            width: 100%;
            max-width: 400px;
            padding: 20px;
            z-index: 1;
        }
        
        .login-box {
            background: #C68FFA;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            padding: 30px;
            transition: all 0.3s ease;
        }
        
        .login-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.4);
        }
        
        .login-header {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .login-header h2 {
            color: white;
            font-weight: 600;
            margin-bottom: 10px;
            text-shadow: 0 1px 3px rgba(0, 0, 0, 0.3);
        }
        
        .system-title {
            text-align: center;
            color: white;
            margin-bottom: 30px;
            font-size: 24px;
            font-weight: bold;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
            z-index: 1;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-control {
            height: 45px;
            border-radius: 4px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            padding-left: 15px;
            transition: all 0.3s;
            background-color: rgba(255, 255, 255, 0.8);
        }
        
        .form-control:focus {
            border-color: #8E44AD;
            box-shadow: 0 0 8px rgba(142, 68, 173, 0.4);
            background-color: white;
        }
        
        .btn-login {
            background: #8E44AD;
            color: white;
            border: none;
            padding: 12px 20px;
            width: 100%;
            border-radius: 4px;
            font-size: 16px;
            transition: all 0.3s;
        }
        
        .btn-login:hover {
            background: #9B59B6;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        
        .footer-text {
            text-align: center;
            margin-top: 20px;
            color: rgba(255, 255, 255, 0.7);
            font-size: 13px;
        }
        
        .back-link {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: white;
            text-decoration: none;
            font-weight: 500;
        }
        
        .back-link:hover {
            text-decoration: underline;
            color: #f1c40f;
        }
        
        label {
            color: white;
            font-weight: 500;
            margin-bottom: 8px;
            display: block;
        }
    </style>
</head>
<body>
    <!-- cmps Video Background -->
    <div class="video-background">
  <video autoplay muted loop playsinline>
    <source src="images/cmps.mp4" type="video/mp4">
    Your browser does not support the video tag.
  </video>
</div>

<style>
.video-background {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  overflow: hidden;
  z-index: -1; /* keeps video behind content */
}

.video-background video {
  width: 100%;
  height: 100%;
  object-fit: cover; /* makes sure video covers entire screen */
}
</style>


    <div class="system-title"><h1>Student Result Analysis System</h1></div>

    <div class="login-container">
        <div class="login-box">
            <div class="login-header">
                <h2>Admin Login</h2>
            </div>
            <form class="form-horizontal" method="post">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="form-control" id="username" placeholder="Enter username">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Enter password">
                </div>
                <div class="form-group">
                    <button type="submit" name="login" class="btn btn-login">Sign In</button>
                </div>
                <a href="index.php" class="back-link">Back to Home</a>
            </form>
            <div class="footer-text">Student Result Analysis System</div>
        </div>
    </div>

    <!-- ========== COMMON JS FILES ========== -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <script src="js/bootstrap/bootstrap.min.js"></script>
</body>
</html>