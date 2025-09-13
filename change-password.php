<!-- includes/topbar.php -->
<nav class="navbar navbar-expand-lg fixed-top glass px-3 py-2">
  <div class="container-fluid">
    <!-- Brand -->
    <a class="navbar-brand fw-bold text-purple d-flex align-items-center gap-2" href="dashboard.php">
      <i class="fa-solid fa-graduation-cap"></i> SIBA Admin
    </a>

    <!-- Mobile toggler -->
    <button class="navbar-toggler border-0 text-white" type="button" data-bs-toggle="collapse" data-bs-target="#topNav" aria-controls="topNav" aria-expanded="false">
      <i class="fa-solid fa-bars"></i>
    </button>

    <!-- Nav items -->
    <div class="collapse navbar-collapse" id="topNav">
      <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-3">
        <li class="nav-item">
          <a class="nav-link text-purple" href="dashboard.php"><i class="fa-solid fa-house me-1"></i>Dashboard</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-purple" href="#" role="button" data-bs-toggle="dropdown">
            <i class="fa-solid fa-database me-1"></i>Manage
          </a>
          <ul class="dropdown-menu dropdown-menu-end glass">
            <li><a class="dropdown-item" href="manage-students.php"><i class="fa-solid fa-user-graduate me-2"></i>Students</a></li>
            <li><a class="dropdown-item" href="manage-subjects.php"><i class="fa-solid fa-book me-2"></i>Subjects</a></li>
            <li><a class="dropdown-item" href="manage-classes.php"><i class="fa-solid fa-landmark me-2"></i>Classes</a></li>
            <li><a class="dropdown-item" href="manage-results.php"><i class="fa-solid fa-chart-column me-2"></i>Results</a></li>
            <li><a class="dropdown-item" href="manage-notices.php"><i class="fa-regular fa-bell me-2"></i>Notices</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link text-purple" href="change-password.php"><i class="fa-solid fa-key me-1"></i>Password</a>
        </li>
        <li class="nav-item">
          <a class="btn btn-danger rounded-pill px-3 ms-lg-2" href="logout.php"><i class="fa-solid fa-right-from-bracket me-1"></i>Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<style>
  /* Custom Dark Purple */
  .text-purple {
    color: #4B0082 !important; /* Indigo/Dark Purple */
  }

  .navbar .nav-link{
    font-weight: 500;
    transition: .25s;
  }
  .navbar .nav-link:hover{
    color: #ffd166 !important; /* hover stays golden */
  }
  .navbar-brand{ 
    font-size: 1.2rem; 
    letter-spacing: .3px; 
  }
  .dropdown-menu.glass{
    background: rgba(255,255,255,.08);
    border: 1px solid rgba(255,255,255,.2);
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
  }
  .dropdown-menu.glass .dropdown-item{
    color: #fff;
  }
  .dropdown-menu.glass .dropdown-item:hover{
    background: rgba(255,255,255,.15);
  }
</style>

<?php
session_start();
error_reporting(0);
include('includes/config.php');

if (strlen($_SESSION['alogin']) == "") {
  header("Location: index.php");
  exit();
}

$msg = $error = "";

if (isset($_POST['submit'])) {
  // Keep MD5 for compatibility with your current DB schema
  $password    = md5($_POST['password']);
  $newpassword = md5($_POST['newpassword']);
  $username    = $_SESSION['alogin'];

  $sql = "SELECT Password FROM admin WHERE UserName=:username AND Password=:password";
  $query = $dbh->prepare($sql);
  $query->bindParam(':username', $username, PDO::PARAM_STR);
  $query->bindParam(':password', $password, PDO::PARAM_STR);
  $query->execute();

  if ($query->rowCount() > 0) {
    $con = "UPDATE admin SET Password=:newpassword WHERE UserName=:username";
    $chngpwd1 = $dbh->prepare($con);
    $chngpwd1->bindParam(':username', $username, PDO::PARAM_STR);
    $chngpwd1->bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
    $chngpwd1->execute();
    $msg = "Your password was successfully changed.";
  } else {
    $error = "Your current password is wrong.";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Admin Change Password</title>

  <!-- Bootstrap 5 + Font Awesome 6 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet"/>

  <style>
    :root{
      --glass-bg: rgba(255,255,255,.12);
      --glass-brd: rgba(255,255,255,.25);
      --txt: #fff;
      --purple: #4B0082;
      --gold: #ffd166;
    }
    html, body{height:100%;}
    body{
      /* Use same background as dashboard; match filename/case exactly */
      background: url('images/dashboard-bg.JPG') center/cover no-repeat fixed;
      color: var(--txt);
      font-family: system-ui, -apple-system, Segoe UI, Roboto, 'Helvetica Neue', Arial, 'Noto Sans';
    }
    body::before{
      content:"";
      position: fixed; inset:0;
      background: radial-gradient(80% 60% at 50% 0%, rgba(0,0,0,.35) 0%, rgba(0,0,0,.65) 100%);
      z-index:0;
    }
    .main-wrapper, .content-wrapper{ position: relative; z-index:1; }
    .glass{
      background: var(--glass-bg);
      border: 1px solid var(--glass-brd);
      box-shadow: 0 10px 30px rgba(0,0,0,.35);
      backdrop-filter: blur(10px);
      -webkit-backdrop-filter: blur(10px);
      border-radius: 20px;
    }
    .text-purple{ color: var(--purple) !important; }
    .page-header{ display:flex; align-items:center; justify-content:space-between; }

    /* Sidebar quick links (same style as dashboard) */
    .quick-link{ color:#fff; text-decoration:none; display:flex; align-items:center; gap:.75rem; padding:.9rem 1.1rem; border-radius:14px; transition:.25s; }
    .quick-link:hover{ background: rgba(255,255,255,.14); transform: translateX(4px); }

    /* Card + form styles */
    .form-card .form-label{ color:#fff; opacity:.9; }
    .btn-primary{
      background: var(--purple); border-color: var(--purple);
    }
    .btn-primary:hover{
      background: #3f0070; border-color: #3f0070;
    }

    /* Keep stat-style backgrounds for consistency if needed later */
    .bg-soft-primary{ background: linear-gradient(135deg,#4ea1ff,#0066ff); }
    .bg-soft-danger{ background: linear-gradient(135deg,#ff6b6b,#c81e1e); }
    .bg-soft-warning{ background: linear-gradient(135deg,#ffd166,#ff9f1c); color:#1d1d1f; }
    .bg-soft-success{ background: linear-gradient(135deg,#21d190,#00b894); }

    @media (max-width: 991px){
      .page-header{ flex-direction:column; gap:1rem; align-items:flex-start; }
    }
  </style>
  <script>
    function valid(){
      var np = document.querySelector('input[name="newpassword"]').value;
      var cp = document.querySelector('input[name="confirmpassword"]').value;
      if(np !== cp){
        alert("New Password and Confirm Password do not match!");
        return false;
      }
      return true;
    }
  </script>
</head>
<body class="top-navbar-fixed">
  <div class="main-wrapper">
    <?php include('includes/topbar.php'); ?>

    <div class="content-wrapper">
      <div class="content-container container-xxl py-4">
        <div class="row g-4">

          <!-- Left glass sidebar (same as dashboard) -->
          <div class="col-lg-3">
            <div class="glass p-3 p-md-4 h-100">
              <div class="d-flex align-items-center gap-2 mb-3">
                <i class="fa-solid fa-graduation-cap"></i>
                <h5 class="m-0">SRAS · Admin</h5>
              </div>
              <div class="d-grid gap-2">
                <a class="quick-link" href="dashboard.php"><i class="fa-solid fa-house"></i><span>Dashboard</span></a>

                <!-- Department links (corrected) -->
                <a class="quick-link" href="create-dept.php"><i class="fa-solid fa-building"></i><span>Create Department</span></a>
                <a class="quick-link" href="manage-dept.php"><i class="fa-regular fa-rectangle-list"></i><span>Manage Department</span></a>

                <a class="quick-link" href="create-subject.php"><i class="fa-solid fa-book"></i><span>Create Subject</span></a>
                <a class="quick-link" href="manage-subjects.php"><i class="fa-solid fa-layer-group"></i><span>Manage Subjects</span></a>
                <a class="quick-link" href="add-subjectcombination.php"><i class="fa-solid fa-shuffle"></i><span>Add Subject Combination</span></a>
                <a class="quick-link" href="manage-subjectcombination.php"><i class="fa-solid fa-diagram-project"></i><span>Manage Subject Combination</span></a>
                <a class="quick-link" href="add-students.php"><i class="fa-solid fa-user-plus"></i><span>Add Students</span></a>
                <a class="quick-link" href="manage-students.php"><i class="fa-solid fa-user-graduate"></i><span>Manage Students</span></a>
                <a class="quick-link" href="add-result.php"><i class="fa-solid fa-square-poll-horizontal"></i><span>Add Result</span></a>
                <a class="quick-link" href="manage-results.php"><i class="fa-solid fa-file-lines"></i><span>Manage Results</span></a>
                <a class="quick-link" href="add-notice.php"><i class="fa-solid fa-bullhorn"></i><span>Add Notice</span></a>
                <a class="quick-link" href="manage-notices.php"><i class="fa-regular fa-bell"></i><span>Manage Notices</span></a>
                <a class="quick-link" href="change-password.php"><i class="fa-solid fa-lock"></i><span>Admin Change Password</span></a>
                <a class="quick-link text-danger" href="logout.php"><i class="fa-solid fa-right-from-bracket"></i><span>Logout</span></a>
              </div>
            </div>
          </div>

          <!-- Main content -->
          <div class="col-lg-9">
            <div class="glass p-4 mb-4">
              <div class="page-header">
                <div>
                  <h2 class="mb-1 text-purple"><i class="fa-solid fa-key me-2"></i>Admin Change Password</h2>
                  <div class="opacity-75">Keep your account secure — choose a strong password.</div>
                </div>
              </div>
            </div>

            <!-- Alerts -->
            <?php if($msg){ ?>
              <div class="alert alert-success glass border-0">
                <strong>Success:</strong> <?php echo htmlentities($msg); ?>
              </div>
            <?php } else if($error){ ?>
              <div class="alert alert-danger glass border-0">
                <strong>Error:</strong> <?php echo htmlentities($error); ?>
              </div>
            <?php } ?>

            <!-- Form card -->
            <div class="glass p-4 form-card">
              <form name="chngpwd" method="post" onsubmit="return valid();">
                <div class="mb-3">
                  <label class="form-label">Current Password</label>
                  <input type="password" name="password" class="form-control rounded-3" required>
                </div>
                <div class="mb-3">
                  <label class="form-label">New Password</label>
                  <input type="password" name="newpassword" class="form-control rounded-3" required>
                </div>
                <div class="mb-4">
                  <label class="form-label">Confirm Password</label>
                  <input type="password" name="confirmpassword" class="form-control rounded-3" required>
                </div>

                <div class="d-flex gap-2">
                  <button type="submit" name="submit" class="btn btn-primary rounded-pill px-4">
                    <i class="fa-solid fa-check me-1"></i> Change
                  </button>
                  <a href="dashboard.php" class="btn btn-outline-light rounded-pill px-4">
                    <i class="fa-solid fa-arrow-left me-1"></i> Back
                  </a>
                </div>
              </form>
            </div>

          </div><!-- /col -->
        </div><!-- /row -->
      </div><!-- /container -->
    </div><!-- /content-wrapper -->
  </div><!-- /main-wrapper -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
