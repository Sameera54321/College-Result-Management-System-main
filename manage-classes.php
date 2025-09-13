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
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Student Result Analysis System | Manage Departments</title>

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

    /* Table styling */
    .table {
      color: var(--txt);
    }
    .table th {
      background-color: rgba(255,255,255,.1);
      border-bottom: 1px solid rgba(255,255,255,.2);
    }
    .table td {
      border-bottom: 1px solid rgba(255,255,255,.1);
      vertical-align: middle;
    }
    .table-hover tbody tr:hover {
      background-color: rgba(255,255,255,.08);
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
    
    /* Action buttons */
    .action-btn {
      color: rgba(255,255,255,.7);
      transition: all 0.3s;
      margin: 0 5px;
    }
    .action-btn:hover {
      color: #fff;
      transform: scale(1.2);
    }
    .edit-btn:hover {
      color: #4ea1ff;
    }
    .delete-btn:hover {
      color: #ff6b6b;
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
    
    /* Breadcrumb styling */
    .breadcrumb {
      background-color: transparent;
      padding: 0;
    }
    .breadcrumb-item a {
      color: rgba(255,255,255,.8);
      text-decoration: none;
    }
    .breadcrumb-item.active {
      color: rgba(255,255,255,.6);
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
                <a class="quick-link active" href="manage-classes.php"><i class="fa-regular fa-rectangle-list"></i><span>Manage Dept</span></a>
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
                  <h2 class="mb-1">Manage Departments</h2>
                  <div class="opacity-75">View and manage all departments</div>
                </div>
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard.php"><i class="fa-solid fa-house me-1"></i> Home</a></li>
                    <li class="breadcrumb-item">Department</li>
                    <li class="breadcrumb-item active" aria-current="page">Manage Departments</li>
                  </ol>
                </nav>
              </div>
            </div>

            <?php if(isset($msg)){ ?>
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong><i class="fa-solid fa-check-circle me-2"></i>Success!</strong> <?php echo htmlentities($msg); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            <?php } else if(isset($error)){ ?>
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong><i class="fa-solid fa-exclamation-circle me-2"></i>Error!</strong> <?php echo htmlentities($error); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            <?php } ?>

            <div class="glass p-4">
              <div class="table-responsive">
                <table id="departmentsTable" class="table table-hover" style="width:100%">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Department Name</th>
                      <th>Section</th>
                      <th>Creation Date</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $sql = "SELECT * from tblclasses";
                    $query = $dbh->prepare($sql);
                    $query->execute();
                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                    $cnt = 1;
                    if($query->rowCount() > 0) {
                      foreach($results as $result) { 
                    ?>
                    <tr>
                      <td><?php echo htmlentities($cnt); ?></td>
                      <td><?php echo htmlentities($result->ClassName); ?></td>
                      <td><?php echo htmlentities($result->Section); ?></td>
                      <td><?php echo htmlentities($result->CreationDate); ?></td>
                      <td>
                        <a href="edit-class.php?classid=<?php echo htmlentities($result->id); ?>" class="action-btn edit-btn" title="Edit">
                          <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <a href="#" class="action-btn delete-btn" title="Delete" onclick="confirmDelete(<?php echo htmlentities($result->id); ?>)">
                          <i class="fa-solid fa-trash"></i>
                        </a>
                      </td>
                    </tr>
                    <?php 
                      $cnt++;
                      } 
                    } 
                    ?>
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
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

  <script>
    // Initialize DataTable
    $(document).ready(function() {
      $('#departmentsTable').DataTable({
        responsive: true,
        language: {
          search: "_INPUT_",
          searchPlaceholder: "Search departments...",
        }
      });
    });

    // Delete confirmation function
    function confirmDelete(id) {
      if(confirm('Are you sure you want to delete this department?')) {
        window.location.href = 'delete-class.php?classid=' + id;
      }
    }
  </script>
</body>
</html>
<?php } ?>