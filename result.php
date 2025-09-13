<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Result Management System</title>
    
    <!-- Modern CSS Framework -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary: #4e73df;
            --secondary: #1cc88a;
            --dark: #2c3e50;
            --light: #f8f9fc;
            --danger: #e74a3b;
            --warning: #f6c23e;
            --info: #36b9cc;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f5f7fb;
            color: #333;
        }
        
        .result-header {
            background: linear-gradient(135deg, var(--primary), #224abe);
            color: white;
            border-radius: 10px 10px 0 0;
            padding: 20px;
            margin-bottom: 0;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        
        .result-card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 6px 15px rgba(0,0,0,0.1);
            overflow: hidden;
            margin-bottom: 30px;
        }
        
        .student-info {
            background-color: white;
            padding: 25px;
            border-bottom: 1px solid #e3e6f0;
        }
        
        .student-info p {
            margin-bottom: 8px;
            font-size: 16px;
        }
        
        .student-info b {
            color: var(--dark);
        }
        
        .result-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
        }
        
        .result-table thead th {
            background-color: var(--primary);
            color: white;
            padding: 15px;
            text-align: center;
            font-weight: 600;
            border: none;
        }
        
        .result-table tbody td {
            padding: 15px;
            text-align: center;
            vertical-align: middle;
            border-bottom: 1px solid #e3e6f0;
        }
        
        .result-table tbody tr:nth-child(even) {
            background-color: #f8f9fc;
        }
        
        .result-table tbody tr:hover {
            background-color: #f0f3ff;
        }
        
        .summary-card {
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            margin-top: 20px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
        }
        
        .summary-item {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px dashed #e3e6f0;
        }
        
        .summary-item:last-child {
            border-bottom: none;
        }
        
        .summary-label {
            font-weight: 600;
            color: var(--dark);
        }
        
        .summary-value {
            font-weight: 700;
        }
        
        .total-marks {
            color: var(--primary);
            font-size: 1.1em;
        }
        
        .percentage {
            color: var(--secondary);
            font-size: 1.1em;
        }
        
        .cgpa {
            color: var(--info);
            font-size: 1.2em;
        }
        
        .print-btn {
            background: linear-gradient(135deg, var(--primary), #224abe);
            border: none;
            padding: 12px 25px;
            font-size: 16px;
            font-weight: 600;
            border-radius: 50px;
            color: white;
            transition: all 0.3s;
            box-shadow: 0 4px 8px rgba(78, 115, 223, 0.3);
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        
        .print-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(78, 115, 223, 0.4);
            color: white;
        }
        
        .back-link {
            color: var(--primary);
            font-weight: 500;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            transition: all 0.3s;
        }
        
        .back-link:hover {
            color: #224abe;
            text-decoration: underline;
        }
        
        .alert-custom {
            border-radius: 8px;
            padding: 15px;
            font-weight: 500;
        }
        
        .grade-A { color: #1cc88a; font-weight: 600; }
        .grade-B { color: #36b9cc; font-weight: 600; }
        .grade-C { color: #f6c23e; font-weight: 600; }
        .grade-D { color: #e74a3b; font-weight: 600; }
        .grade-F { color: #e74a3b; font-weight: 600; }
        
        @media print {
            body * {
                visibility: hidden;
            }
            #printable-area, #printable-area * {
                visibility: visible;
            }
            #printable-area {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
            }
            .no-print {
                display: none !important;
            }
        }
    </style>
</head>
<body>
    <div class="main-wrapper py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="result-card" id="printable-area">
                        <h3 class="result-header text-center">
                            <i class="fas fa-graduation-cap me-2"></i> Student Result Details
                        </h3>
                        
                        <div class="student-info">
                            <?php
                            $rollid = $_POST['rollid'];
                            $classid = $_POST['class'];
                            $_SESSION['rollid'] = $rollid;
                            $_SESSION['classid'] = $classid;
                            $qery = "SELECT tblstudents.StudentName,tblstudents.RollId,tblstudents.RegDate,tblstudents.StudentId,tblstudents.Status,tblclasses.ClassName,tblclasses.Section from tblstudents join tblclasses on tblclasses.id=tblstudents.ClassId where tblstudents.RollId=:rollid and tblstudents.ClassId=:classid";
                            $stmt = $dbh->prepare($qery);
                            $stmt->bindParam(':rollid', $rollid, PDO::PARAM_STR);
                            $stmt->bindParam(':classid', $classid, PDO::PARAM_STR);
                            $stmt->execute();
                            $resultss = $stmt->fetchAll(PDO::FETCH_OBJ);
                            $cnt = 1;
                            
                            if ($stmt->rowCount() > 0) {
                                foreach ($resultss as $row) {
                            ?>
                                <p><b><i class="fas fa-user-graduate me-2"></i> Student Name:</b> <?php echo htmlentities($row->StudentName); ?></p>
                                <p><b><i class="fas fa-id-card me-2"></i> Student Roll ID:</b> <?php echo htmlentities($row->RollId); ?></p>
                                <p><b><i class="fas fa-building me-2"></i> Department:</b> <?php echo htmlentities($row->ClassName); ?> (<?php echo htmlentities($row->Section); ?>)</p>
                            <?php 
                                }
                            ?>
                        </div>
                        
                        <div class="table-responsive px-3 pt-2">
                            <table class="result-table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Subject</th>
                                        <th>Marks</th>
                                        <th>Grade</th>
                                        <th>Credit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = "select t.StudentName,t.RollId,t.ClassId,t.marks,t.grade,t.credit,SubjectId,tblsubjects.SubjectName from (select sts.StudentName,sts.RollId,sts.ClassId,tr.marks,tr.grade,tr.credit,SubjectId from tblstudents as sts join  tblresult as tr on tr.StudentId=sts.StudentId) as t join tblsubjects on tblsubjects.id=t.SubjectId where (t.RollId=:rollid and t.ClassId=:classid)";
                                    $query = $dbh->prepare($query);
                                    $query->bindParam(':rollid', $rollid, PDO::PARAM_STR);
                                    $query->bindParam(':classid', $classid, PDO::PARAM_STR);
                                    $query->execute();
                                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                                    $cnt = 1;
                                    $totlcount = 0;
                                    $cgpa = 0;
                                    $totalcredits = 0;
                                    
                                    if ($countrow = $query->rowCount() > 0) {
                                        foreach ($results as $result) {
                                            $gradeClass = 'grade-' . $result->grade;
                                    ?>
                                            <tr>
                                                <td><?php echo htmlentities($cnt); ?></td>
                                                <td><?php echo htmlentities($result->SubjectName); ?></td>
                                                <td><?php echo htmlentities($totalmark = $result->marks); ?></td>
                                                <td class="<?php echo $gradeClass; ?>"><?php echo htmlentities($gr = $result->grade); ?></td>
                                                <td><?php echo htmlentities($totalcredit = $result->credit); ?></td>
                                            </tr>
                                    <?php
                                            $totlcount += $totalmark;
                                            $cgpa += $gr * $totalcredit;
                                            $totalcredits += $totalcredit;
                                            $cnt++;
                                        }
                                    ?>
                                </tbody>
                            </table>
                            
                            <div class="summary-card mt-4">
                                <div class="summary-item">
                                    <span class="summary-label">Total Marks:</span>
                                    <span class="summary-value total-marks"><?php echo htmlentities($totlcount); ?> out of <?php echo htmlentities($outof = ($cnt - 1) * 100); ?></span>
                                </div>
                                <div class="summary-item">
                                    <span class="summary-label">Percentage:</span>
                                    <span class="summary-value percentage"><?php echo htmlentities(round($totlcount * (100) / $outof, 2)); ?>%</span>
                                </div>
                                <div class="summary-item">
                                    <span class="summary-label">CGPA:</span>
                                    <span class="summary-value cgpa"><?php echo htmlentities(round($cgpa / $totalcredits, 2)); ?></span>
                                </div>
                            </div>
                            
                            <div class="d-flex justify-content-between mt-4 no-print">
                                <a href="index.php" class="back-link">
                                    <i class="fas fa-arrow-left me-1"></i> Back to Home
                                </a>
                                <button onclick="window.print()" class="print-btn no-print">
                                    <i class="fas fa-print me-1"></i> Print Result
                                </button>
                            </div>
                            <?php
                                    } else {
                            ?>
                                        <div class="alert alert-warning alert-custom mt-3">
                                            <i class="fas fa-exclamation-triangle me-2"></i> <strong>Notice!</strong> Your result has not been declared yet.
                                        </div>
                            <?php
                                    }
                            ?>
                        </div>
                        <?php
                            } else {
                        ?>
                                <div class="alert alert-danger alert-custom mt-3">
                                    <i class="fas fa-exclamation-circle me-2"></i> <strong>Error!</strong> Invalid Roll ID.
                                </div>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        function CallPrint(strid) {
            var prtContent = document.getElementById("printable-area");
            var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
            WinPrint.document.write('<html><head><title>Student Result</title>');
            WinPrint.document.write('<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">');
            WinPrint.document.write('<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">');
            WinPrint.document.write('<style>' + document.querySelector('style').innerHTML + '</style>');
            WinPrint.document.write('</head><body>');
            WinPrint.document.write(prtContent.innerHTML);
            WinPrint.document.write('</body></html>');
            WinPrint.document.close();
            WinPrint.focus();
            WinPrint.print();
            WinPrint.close();
        }
    </script>
</body>
</html>