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

// For Deleting the notice
if($_GET['id']) {
    $id = $_GET['id'];
    $sql = "delete from tblnotice where id=:id";
    $query = $dbh->prepare($sql);
    $query->bindParam(':id',$id,PDO::PARAM_STR);
    $query->execute();
    $msg = "Notice deleted successfully";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Student Result Analysis System | Manage Notices</title>

  <!-- Bootstrap 5 + Font Awesome 6 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet" />
  <!-- DataTables CSS -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css"/>

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

    .page-header{
      display:flex; align-items:center; justify-content:space-between;
    }

    /* Table styling */
    .table-container {
      background: rgba(255,255,255,.08);
      border-radius: 15px;
      overflow: hidden;
    }
    table.dataTable {
      background: transparent;
      color: #fff;
      border-collapse: collapse;
    }
    table.dataTable thead th {
      border-bottom: 1px solid rgba(255,255,255,.2);
      color: #fff;
    }
    table.dataTable tbody tr {
      background: rgba(255,255,255,.05);
      transition: background .2s;
    }
    table.dataTable tbody tr:hover {
      background: rgba(255,255,255,.1);
    }
    table.dataTable tbody td {
      border-top: 1px solid rgba(255,255,255,.1);
      vertical-align: middle;
    }
    .dataTables_wrapper .dataTables_paginate .paginate_button {
      color: #fff !important;
      border: 1px solid rgba(255,255,255,.3);
      background: transparent;
      border-radius: 8px;
      margin: 0 3px;
    }
    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
      background: rgba(255,255,255,.15);
      border-color: rgba(255,255,255,.5);
    }
    .dataTables_wrapper .dataTables_paginate .paginate_button.current {
      background: rgba(255,255,255,.25);
      border-color: rgba(255,255,255,.5);
    }
    .dataTables_wrapper .dataTables_filter input {
      background: rgba(255,255,255,.1);
      border: 1px solid rgba(255,255,255,.3);
      color: #fff;
      border-radius: 8px;
      padding: 5px 10px;
    }
    .dataTables_wrapper .dataTables_length select {
      background: rgba(255,255,255,.1);
      border: 1px solid rgba(255,255,255,.3);
      color: #fff;
      border-radius: 8px;
      padding: 5px;
    }

    /* Action buttons */
    .action-btn {
      color: #fff;
      background: rgba(255,255,255,.1);
      border: none;
      width: 30px;
      height: 30px;
      border-radius: 50%;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      transition: all 0.2s;
    }
    .action-btn:hover {
      background: rgba(255,255,255,.2);
      transform: scale(1.1);
    }
    .action-btn.delete {
      color: #dc3545;
    }

    /* Quick links */
    .quick-link{ color:#fff; text-decoration:none; display:flex; align-items:center; gap:.75rem; padding: .9rem 1.1rem; border-radius: 14px; transition: .25s; }
    .quick-link:hover{ background: rgba(255,255,255,.14); transform: translateX(4px); }

    /* Alert messages */
    .alert {
      border: none;
      backdrop-filter: blur(10px);
      -webkit-backdrop-filter: blur(10px);
    }
    .alert-success {
      background: rgba(40, 167, 69, 0.2);
      color: #28a745;
    }
    .alert-danger {
      background: rgba(220, 53, 69, 0.2);
      color: #dc3545;
    }

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
                <a class="quick-link active" href="manage-notices.php"><i class="fa-regular fa-bell"></i><span>Manage Notices</span></a>
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
                  <h2 class="mb-1">Manage Notices</h2>
                  <div class="opacity-75">View and manage all system notices</div>
                </div>
                <div class="d-flex gap-2 flex-wrap">
                  <a href="add-notice.php" class="btn btn-light btn-sm rounded-pill"><i class="fa-solid fa-plus me-1"></i> Add Notice</a>
                </div>
              </div>
            </div>

            <?php if(isset($msg)) { ?>
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i>
                <?php echo htmlentities($msg); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            <?php } ?>

            <div class="glass p-4">
              <div class="table-container">
                <table id="noticesTable" class="table table-hover w-100">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Notice Title</th>
                      <th>Notice Details</th>
                      <th>Creation Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $sql = "SELECT * from tblnotice";
                    $query = $dbh->prepare($sql);
                    $query->execute();
                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                    $cnt = 1;
                    if($query->rowCount() > 0) {
                      foreach($results as $result) { 
                    ?>
                    <tr>
                      <td><?php echo htmlentities($cnt);?></td>
                      <td><?php echo htmlentities($result->noticeTitle);?></td>
                      <td><?php echo htmlentities($result->noticeDetails);?></td>
                      <td><?php echo htmlentities($result->postingDate);?></td>
                      <td>
                        <a href="manage-notices.php?id=<?php echo htmlentities($result->id);?>" 
                           onclick="return confirm('Do you really want to delete this notice?');"
                           class="action-btn delete" title="Delete Notice">
                          <i class="fas fa-trash"></i>
                        </a>
                      </td>
                    </tr>
                    <?php $cnt=$cnt+1; } } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

  <script>
    $(document).ready(function() {
      $('#noticesTable').DataTable({
        responsive: true,
        language: {
          search: "_INPUT_",
          searchPlaceholder: "Search notices...",
          lengthMenu: "Show _MENU_ notices per page",
          info: "Showing _START_ to _END_ of _TOTAL_ notices",
          infoEmpty: "No notices found",
          paginate: {
            previous: '<i class="fas fa-chevron-left"></i>',
            next: '<i class="fas fa-chevron-right"></i>'
          }
        },
        dom: '<"top"f>rt<"bottom"lip><"clear">',
        initComplete: function() {
          $('.dataTables_filter input').addClass('form-control');
          $('.dataTables_length select').addClass('form-select');
        }
      });
    });
  </script>
</body>
</html>