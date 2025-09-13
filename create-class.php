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
if(strlen($_SESSION['alogin'])=="") {   
    header("Location: index.php"); 
} else {
    if(isset($_POST['submit'])) {
        $classname = $_POST['classname'];
        $section = $_POST['section'];
        $sql = "INSERT INTO tblclasses(ClassName,Section) VALUES(:classname,:section)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':classname',$classname,PDO::PARAM_STR);
        $query->bindParam(':section',$section,PDO::PARAM_STR);
        $query->execute();
        $lastInsertId = $dbh->lastInsertId();
        
        if($lastInsertId) {
            $msg = "Department Created successfully";
        } else {
            $error = "Something went wrong. Please try again";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Student Result Analysis System | Create Department</title>

  <!-- Bootstrap 5 + Font Awesome 6 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet" />

  <style>
    :root{
      --glass-bg: rgba(255,255,255,.12);
      --glass-brd: rgba(255,255,255,.25);
      --txt: #fff;
    }
    html, body{height:100%;}
    body{
      background: url('images/dashboard-bg.JPG') center/cover no-repeat fixed;
      position: relative;
      color: var(--txt);
      font-family: system-ui, -apple-system, Segoe UI, Roboto, 'Helvetica Neue', Arial, 'Noto Sans', 'Apple Color Emoji','Segoe UI Emoji', 'Segoe UI Symbol';
    }
    body::before{
      content: "";
      position: fixed; inset: 0;
      background: radial-gradient(80% 60% at 50% 0%, rgba(0,0,0,.35) 0%, rgba(0,0,0,.65) 100%);
      z-index: 0;
    }
    .content-wrapper, .main-wrapper{position: relative; z-index: 1;}

    /* Glassy container */
    .glass{
      background: var(--glass-bg);
      border: 1px solid var(--glass-brd);
      box-shadow: 0 10px 30px rgba(0,0,0,.35);
      backdrop-filter: blur(10px);
      -webkit-backdrop-filter: blur(10px);
      border-radius: 20px;
    }

    /* Form styling */
    .form-control {
      background-color: rgba(255,255,255,.1);
      border: 1px solid rgba(255,255,255,.2);
      color: white;
    }
    .form-control:focus {
      background-color: rgba(255,255,255,.2);
      border-color: rgba(255,255,255,.3);
      color: white;
      box-shadow: none;
    }
    .form-control::placeholder {
      color: rgba(255,255,255,.6);
    }
    .help-block {
      color: rgba(255,255,255,.7);
      font-size: 0.85rem;
    }
    
    /* Quick links */
    .quick-link{ 
      color:#fff; 
      text-decoration:none; 
      display:flex; 
      align-items:center; 
      gap:.75rem; 
      padding: .9rem 1.1rem; 
      border-radius: 14px; 
      transition: .25s; 
    }
    .quick-link:hover{ 
      background: rgba(255,255,255,.14); 
      transform: translateX(4px); 
    }
    
    /* Button styling */
    .btn-success {
      background-color: #00b894;
      border-color: #00b894;
    }
    .btn-success:hover {
      background-color: #00997b;
      border-color: #00997b;
    }
    
    /* Alert styling */
    .alert {
      background-color: rgba(255,255,255,.15);
      border: none;
      color: white;
    }
    .alert-success {
      background-color: rgba(0,184,148,.3);
    }
    .alert-danger {
      background-color: rgba(231,76,60,.3);
    }
  </style>
</head>
<body class="top-navbar-fixed">
  <div class="main-wrapper">
    <?php include('includes/topbar.php'); ?>
    <div class="content-wrapper">
      <div class="content-container container-xxl py-4">
        <div class="row g-4">
          <!-- Left nav (quick categories) -->
          <div class="col-lg-3">
            <div class="glass p-3 p-md-4 h-100">
              <div class="d-flex align-items-center gap-2 mb-3">
                <i class="fa-solid fa-graduation-cap"></i>
                <h5 class="m-0">SRAS · Admin</h5>
              </div>
              <div class="d-grid gap-2">
                <a class="quick-link" href="dashboard.php"><i class="fa-solid fa-house"></i><span>Dashboard</span></a>
                <a class="quick-link active" href="create-class.php"><i class="fa-solid fa-building"></i><span>Create Dept</span></a>
                <a class="quick-link" href="manage-classes.php"><i class="fa-regular fa-rectangle-list"></i><span>Manage Dept</span></a>
                <a class="quick-link" href="create-subject.php"><i class="fa-solid fa-book"></i><span>Create Subject</span></a>
                <a class="quick-link" href="manage-subjects.php"><i class="fa-solid fa-layer-group"></i><span>Manage Subjects</span></a>
                <a class="quick-link" href="manage-subjectcombination.php"><i class="fa-solid fa-diagram-project"></i><span>Manage Subject Combination</span></a>
                <a class="quick-link" href="add-students.php"><i class="fa-solid fa-user-plus"></i><span>Add Students</span></a>
                <a class="quick-link" href="manage-students.php"><i class="fa-solid fa-user-graduate"></i><span>Manage Students</span></a>
                <a class="quick-link" href="add-result.php"><i class="fa-solid fa-square-poll-horizontal"></i><span>Add Result</span></a>
                <a class="quick-link" href="manage-results.php"><i class="fa-solid fa-file-lines"></i><span>Manage Result</span></a>
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
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h2 class="mb-1">Create Department</h2>
                  <div class="opacity-75">Student Result Analysis System</div>
                </div>
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb" style="background-color: transparent; padding: 0;">
                    <li class="breadcrumb-item"><a href="dashboard.php"><i class="fa-solid fa-house me-1"></i> Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Departments</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create Department</li>
                  </ol>
                </nav>
              </div>
            </div>

            <div class="glass p-4">
              <?php if($msg){ ?>
                <div class="alert alert-success left-icon-alert" role="alert">
                  <strong><i class="fa-solid fa-check-circle me-2"></i>Success!</strong> <?php echo htmlentities($msg); ?>
                </div>
              <?php } else if($error){ ?>
                <div class="alert alert-danger left-icon-alert" role="alert">
                  <strong><i class="fa-solid fa-exclamation-circle me-2"></i>Error!</strong> <?php echo htmlentities($error); ?>
                </div>
              <?php } ?>

              <form method="post">
                <div class="mb-4">
                  <label for="classname" class="form-label">Department Name</label>
                  <input type="text" name="classname" class="form-control form-control-lg" required id="classname" placeholder="Enter department name">
                  <div class="help-block mt-2">Eg: Computer Science, Electrical Engineering, etc.</div>
                </div>
                
                <div class="mb-4">
                  <label for="section" class="form-label">Department Code</label>
                  <input type="text" name="section" class="form-control form-control-lg" required id="section" placeholder="Enter department code">
                  <div class="help-block mt-2">Eg: CS, EE, ME, etc.</div>
                </div>
                
                <div class="d-grid">
                  <button type="submit" name="submit" class="btn btn-success btn-lg py-3">
                    <i class="fa-solid fa-plus me-2"></i> Create Department
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php } ?>