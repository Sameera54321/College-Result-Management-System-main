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
if(strlen($_SESSION['alogin'])==""){
  header("Location: index.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Student Result Analysis System | Dashboard</title>

  <!-- Bootstrap 5 + Font Awesome 6 (modern UI) -->
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
      /* >>> Place your image at images/dashboard-bg.jpg (rename file to avoid spaces) */
      background: url('images/dashboard-bg.JPG') center/cover no-repeat fixed;
      position: relative;
      color: var(--txt);
      font-family: system-ui, -apple-system, Segoe UI, Roboto, 'Helvetica Neue', Arial, 'Noto Sans', 'Apple Color Emoji','Segoe UI Emoji', 'Segoe UI Symbol';
    }
    /* subtle dark overlay to ensure contrast */
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

    .page-header{
      display:flex; align-items:center; justify-content:space-between;
    }

    /* Stat cards */
    .stat-card{ transition: transform .3s ease, box-shadow .3s ease; border-radius: 20px; overflow: hidden; }
    .stat-card .card-body{ padding: 28px; }
    .stat-card:hover{ transform: translateY(-6px); box-shadow: 0 16px 40px rgba(0,0,0,.45); }
    .stat-icon{ font-size: 2.2rem; opacity: .95; }
    .stat-value{ font-size: 2.6rem; font-weight: 800; line-height: 1; }
    .stat-label{ opacity: .9; letter-spacing:.3px; }

    /* Quick links */
    .quick-link{ color:#fff; text-decoration:none; display:flex; align-items:center; gap:.75rem; padding: .9rem 1.1rem; border-radius: 14px; transition: .25s; }
    .quick-link:hover{ background: rgba(255,255,255,.14); transform: translateX(4px); }

    /* Pills colors (soft gradients) */
    .bg-soft-primary{ background: linear-gradient(135deg,#4ea1ff,#0066ff); }
    .bg-soft-danger{ background: linear-gradient(135deg,#ff6b6b,#c81e1e); }
    .bg-soft-warning{ background: linear-gradient(135deg,#ffd166,#ff9f1c); color:#1d1d1f; }
    .bg-soft-success{ background: linear-gradient(135deg,#21d190,#00b894); }

    /* Responsive tweaks */
    @media (max-width: 991px){
      .page-header{flex-direction:column; gap:1rem; align-items:flex-start;}
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
                <a class="quick-link" href="create-class.php"><i class="fa-solid fa-building"></i><span>Create Dept</span></a>
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
              <div class="page-header">
                <div>
                  <h2 class="mb-1">Dashboard</h2>
                  <div class="opacity-75">Welcome to Student Result Analysis System</div>
                </div>
                <div class="d-flex gap-2 flex-wrap">
                  <a href="add-students.php" class="btn btn-light btn-sm rounded-pill"><i class="fa-solid fa-user-plus me-1"></i> New Student</a>
                  <a href="create-subject.php" class="btn btn-light btn-sm rounded-pill"><i class="fa-solid fa-book-medical me-1"></i> New Subject</a>
                  <a href="add-result.php" class="btn btn-light btn-sm rounded-pill"><i class="fa-solid fa-plus me-1"></i> Add Result</a>
                </div>
              </div>
            </div>

            <?php
              // ===== Dynamic counters (keep your existing PDO $dbh) =====
              // Students
              $sql1 = "SELECT StudentId FROM tblstudents";
              $q1 = $dbh->prepare($sql1); $q1->execute(); $totalstudents = $q1->rowCount();
              // Subjects
              $sql2 = "SELECT id FROM tblsubjects";
              $q2 = $dbh->prepare($sql2); $q2->execute(); $totalsubjects = $q2->rowCount();
              // Classes
              $sql3 = "SELECT id FROM tblclasses";
              $q3 = $dbh->prepare($sql3); $q3->execute(); $totalclasses = $q3->rowCount();
              // Results (distinct students having results)
              $sql4 = "SELECT DISTINCT StudentId FROM tblresult";
              $q4 = $dbh->prepare($sql4); $q4->execute(); $totalresults = $q4->rowCount();
            ?>

            <div class="row g-4">
              <div class="col-md-6 col-xl-3">
                <a href="manage-students.php" class="text-decoration-none text-white">
                  <div class="card stat-card bg-soft-primary border-0">
                    <div class="card-body">
                      <div class="d-flex justify-content-between align-items-center">
                        <div>
                          <div class="stat-value"><?php echo htmlentities($totalstudents); ?></div>
                          <div class="stat-label">Regd Users</div>
                        </div>
                        <i class="fa-solid fa-users stat-icon"></i>
                      </div>
                    </div>
                  </div>
                </a>
              </div>

              <div class="col-md-6 col-xl-3">
                <a href="manage-subjects.php" class="text-decoration-none text-white">
                  <div class="card stat-card bg-soft-danger border-0">
                    <div class="card-body">
                      <div class="d-flex justify-content-between align-items-center">
                        <div>
                          <div class="stat-value"><?php echo htmlentities($totalsubjects); ?></div>
                          <div class="stat-label">Subjects Listed</div>
                        </div>
                        <i class="fa-solid fa-book stat-icon"></i>
                      </div>
                    </div>
                  </div>
                </a>
              </div>

              <div class="col-md-6 col-xl-3">
                <a href="manage-classes.php" class="text-decoration-none <?php /* yellow text needs dark text - keep white links */ ?>">
                  <div class="card stat-card bg-soft-warning border-0 text-dark">
                    <div class="card-body">
                      <div class="d-flex justify-content-between align-items-center">
                        <div>
                          <div class="stat-value"><?php echo htmlentities($totalclasses); ?></div>
                          <div class="stat-label">Total Classes</div>
                        </div>
                        <i class="fa-solid fa-landmark stat-icon"></i>
                      </div>
                    </div>
                  </div>
                </a>
              </div>

              <div class="col-md-6 col-xl-3">
                <a href="manage-results.php" class="text-decoration-none text-white">
                  <div class="card stat-card bg-soft-success border-0">
                    <div class="card-body">
                      <div class="d-flex justify-content-between align-items-center">
                        <div>
                          <div class="stat-value"><?php echo htmlentities($totalresults); ?></div>
                          <div class="stat-label">Results Declared</div>
                        </div>
                        <i class="fa-solid fa-file-lines stat-icon"></i>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
            </div>

            <!-- Optional: recent actions / helpful links -->
            <div class="glass p-4 mt-4">
              <div class="row g-3 align-items-stretch">
                <div class="col-md-6 col-xl-3">
                  <a href="manage-students.php" class="btn w-100 btn-outline-light rounded-4 py-3"><i class="fa-solid fa-table-list me-2"></i>Manage Students</a>
                </div>
                <div class="col-md-6 col-xl-3">
                  <a href="manage-subjects.php" class="btn w-100 btn-outline-light rounded-4 py-3"><i class="fa-solid fa-list-check me-2"></i>Manage Subjects</a>
                </div>
                <div class="col-md-6 col-xl-3">
                  <a href="manage-results.php" class="btn w-100 btn-outline-light rounded-4 py-3"><i class="fa-solid fa-chart-simple me-2"></i>Manage Results</a>
                </div>
                <div class="col-md-6 col-xl-3">
                  <a href="manage-notices.php" class="btn w-100 btn-outline-light rounded-4 py-3"><i class="fa-regular fa-bell me-2"></i>Manage Notices</a>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>