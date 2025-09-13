<?php
session_start();
//error_reporting(0);
include('includes/config.php');?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>School Result Analysis System</title>
        <link rel="stylesheet" href="css/bootstrap.min.css" media="screen">
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen">
        <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen">
        <link rel="stylesheet" href="css/icheck/skins/flat/blue.css">
        <link rel="stylesheet" href="css/main.css" media="screen">
        <script src="js/modernizr/modernizr.min.js"></script>
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
                filter: brightness(0.6);
            }
            
            .main-wrapper {
                width: 100%;
                display: flex;
                justify-content: center;
                align-items: center;
            }
            
            .gradient-form-box {
                background: linear-gradient(135deg, rgba(26, 42, 108, 0.9), rgba(178, 31, 31, 0.9), rgba(253, 187, 45, 0.9));
                border-radius: 15px;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
                padding: 30px;
                color: white;
                transition: all 0.5s ease;
                width: 100%;
                max-width: 500px;
                backdrop-filter: blur(5px);
                border: 1px solid rgba(255, 255, 255, 0.2);
            }
            
            .gradient-form-box:hover {
                transform: scale(1.03);
                box-shadow: 0 15px 35px rgba(0, 0, 0, 0.7);
            }
            
            .form-control {
                background-color: rgba(255, 255, 255, 0.1);
                border: 1px solid rgba(255, 255, 255, 0.3);
                color: white !important;
                height: 45px;
                border-radius: 25px;
                padding-left: 20px;
                transition: all 0.3s;
            }
            
            .form-control:focus {
                background-color: rgba(255, 255, 255, 0.2);
                border: 1px solid rgba(255, 255, 255, 0.5);
                box-shadow: 0 0 10px rgba(255, 255, 255, 0.2);
            }
            
            .form-control::placeholder {
                color: rgba(255, 255, 255, 0.7);
            }
            
            .btn-custom {
                background: rgba(255, 255, 255, 0.2);
                border: 1px solid white;
                color: white;
                border-radius: 25px;
                padding: 10px 25px;
                transition: all 0.3s;
            }
            
            .btn-custom:hover {
                background: white;
                color: #1a2a6c;
                transform: translateY(-2px);
            }
            
            .panel-title {
                font-size: 24px;
                font-weight: 300;
                margin-bottom: 20px;
                text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.3);
            }
            
            label {
                font-weight: 300;
                margin-bottom: 8px;
                display: block;
                color: white;
            }
            
            .back-link {
                color: rgba(255, 255, 255, 0.8);
                transition: all 0.3s;
            }
            
            .back-link:hover {
                color: white;
                text-decoration: none;
            }
            
            select option {
                color: #333;
            }
            
            .text-muted {
                color: rgba(255, 255, 255, 0.7) !important;
            }
        </style>
    </head>
    <body>
        <!-- YouTube cmps Background -->
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




        <div class="main-wrapper">
            <div class="login-bg-color">
                <div class="row">
                    <div class="col-md-12">
                        <div class="gradient-form-box">
                            <div class="panel-heading">
                                <div class="panel-title text-center">
                                    <h4 style="color: white;">School Result Analysis System</h4>
                                </div>
                            </div>
                            <div class="panel-body p-20">
                                <form action="result.php" method="post">
                                    <div class="form-group">
                                        <label for="rollid">Enter your Roll Id</label>
                                        <input type="text" class="form-control" id="rollid" placeholder="Enter Your Roll Id" autocomplete="off" name="rollid">
                                    </div>
                                    <div class="form-group">
                                        <label for="default">Department</label>
                                        <select name="class" class="form-control" id="default" required="required">
                                            <option value="" style="color: #333;">Select Dept</option>
                                            <?php $sql = "SELECT * from tblclasses";
                                            $query = $dbh->prepare($sql);
                                            $query->execute();
                                            $results=$query->fetchAll(PDO::FETCH_OBJ);
                                            if($query->rowCount() > 0) {
                                                foreach($results as $result) { ?>
                                                    <option value="<?php echo htmlentities($result->id); ?>" style="color: #333;">
                                                        <?php echo htmlentities($result->ClassName); ?>&nbsp; Section <?php echo htmlentities($result->Section); ?>
                                                    </option>
                                                <?php }
                                            } ?>
                                        </select>
                                    </div>
                                    <div class="form-group mt-20 text-center">
                                        <button type="submit" class="btn btn-custom">
                                            <i class="fa fa-search"></i> Search Results
                                        </button>
                                    </div>
                                    <div class="text-center mt-20">
                                        <a href="index.php" class="back-link">
                                            <i class="fa fa-arrow-left"></i> Back to Home
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <p class="text-muted text-center mt-20">
                            <small>Student Result Analysis System</small>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- ========== COMMON JS FILES ========== -->
        <script src="js/jquery/jquery-2.2.4.min.js"></script>
        <script src="js/jquery-ui/jquery-ui.min.js"></script>
        <script src="js/bootstrap/bootstrap.min.js"></script>
        <script src="js/pace/pace.min.js"></script>
        <script src="js/lobipanel/lobipanel.min.js"></script>
        <script src="js/iscroll/iscroll.js"></script>

        <!-- ========== PAGE JS FILES ========== -->
        <script src="js/icheck/icheck.min.js"></script>

        <!-- ========== THEME JS ========== -->
        <script src="js/main.js"></script>
        <script>
            $(function(){
                $('input.flat-blue-style').iCheck({
                    checkboxClass: 'icheckbox_flat-blue'
                });
            });
        </script>
    </body>
</html>