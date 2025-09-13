<?php
error_reporting(0);
include('includes/config.php'); 
// lecturers data
$lecturers = [
  ["name" => "Mr.Sarath Chandrasekara", "image" => "Sarath.PNG", "role" => "Lecturer in IT "],
  ["name" => "Ms. Bhagya Thilakarathne", "image" => "Bhagya.PNG", "role" => "Lecturer in IT "],
  ["name" => "Mr. Anupama Yaparathne",    "image" => "Anupama.PNG", "role" => "Lecturer in IT "],
  ["name" => "Ms. Asha Madushi",  "image" => "Asha.PNG", "role" => "Lecturer in IT "],
  ["name" => "Ms. Ashani Ariyarathne", "image" => "Ashani.PNG", "role" => "Lecturer in IT "],
  ["name" => "Mr. Roshan Ranatunga",   "image" => "Roshan.PNG", "role" => "Lecturer in IT "],
  ["name" => "Mr. Dayan Wijesekera", "image" => "Dayan.JPG", "role" => "Lecturer in IT "],
  ["name" => "Mr. Venura Lakshman", "image" => "Venura.JPG", "role" => "Lecturer in IT "],
  ["name" => "Mr. U. Pradeepkumara", "image" => "Pradeepkumara.JPG", "role" => "Lecturer in IT "],
  ["name" => "Ms. Rasadari Kumarasinghe", "image" => "Rasadari.JPG", "role" => "Lecturer in IT "],
];
// Footer data
$aboutText = "Donec viverra nunc eu neque porta, quis laoreet nisl gravida. 
Proin gravida, diam ut consectetur porttitor.";

$navigationLinks = [
    "Home" => "#",
    "About Us" => "#",
    "Services" => "#",
    "Team" => "#",
    "Gallery" => "#",
    "Mail Us" => "#"
];

$otherLinks = [
    "Media" => "#",
    "Mobile Apps" => "#",
    "Privacy Policy" => "#"
];

$contactInfo = [
    "email" => "info@siba.edu.lk",
    "phone" => "0812 421 693",
    "fax"   => "0812 421 693"
];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Student Result Mark Analysis System</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    
        <meta charset="UTF-8">

        <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>About Us - University</title>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }
    .about-section {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 40px;
    }
    .about-image img {
        width: 350px;
        border-radius: 10px;
    }
    .about-text {
        margin-left: 30px;
    }
    .about-text h2 {
        font-size: 40px;
        color: #f1b502;
    }
    .about-text button {
        background-color: #001f4d;
        color: white;
        padding: 10px 20px;
        border: none;
        cursor: pointer;
        margin-top: 10px;
    }
    .about-text button:hover {
        background-color: #003080;
    }
    #moreInfo {
        display: none;
        margin-top: 20px;
        background-color: #f7f7f7;
        padding: 20px;
        border-radius: 8px;
    }
    #moreInfo img {
        width: 200px;
        display: block;
        margin-bottom: 10px;
    }
</style>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Our Services</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background: #fff;
        margin: 0;
        padding: 0;
    }
    .services-section {
        text-align: center;
        padding: 50px 20px;
    }
    .services-section h2 {
        font-size: 36px;
        font-weight: bold;
        color: #0a1a33;
        margin-bottom: 10px;
    }
    .services-section .icon {
        color: orange;
        font-size: 50px;
        margin-bottom: 15px;
    }
    .services-section p {
        color: #777;
        font-size: 14px;
        line-height: 1.6;
    }
    .services-container {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 40px;
        margin-top: 40px;
    }
    .service-box {
        width: 300px;
        padding: 20px;
    }
    .service-box h3 {
        font-size: 20px;
        font-weight: bold;
        color: #000;
        margin-bottom: 10px;
    }
</style>
<!-- Using Font Awesome for Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Transitions</title>
    <link rel="stylesheet" href="style.css">
<style>
   .lecturers {
    display: grid;
    grid-template-columns: repeat(5, 1fr); /* 5 images per row */
    gap: 15px;
    justify-items: center;
    align-items: center;
    margin-top: 20px;
}
.card {
    position: relative;
    width: 260px;   /* increased width */
    height: 330px;  /* increased height */
    overflow: hidden;
    border-radius: 10px;
    background: #fff;
    text-align: center;
    box-shadow: 0 4px 10px rgba(0,0,0,0.2);
    transition: transform 0.3s ease; /* smooth zoom */
}
.card:hover {
    transform: scale(1.05); /* slight zoom on hover */
}
.card img {
    width: 100%;
    height: 100%;
    object-fit: cover; /* maintain proportions */
    transition: transform 0.3s ease;
}
.card:hover img {
    transform: scale(1.1); /* image zooms slightly more than card */
}
.card .name {
    position: absolute;
    bottom: 5px;
    left: 0;
    width: 100%;
    background: rgba(0,0,0,0.6);
    color: #fff;
    font-size: 16px;  /* slightly bigger text */
    padding: 6px;     /* slightly more padding */
}
</style>

        <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Mail Us — Contact</title>
  <style>
    :root{
      --primary:#f4a915; /* orange block */
      --ink:#0c2a4d;     /* dark blue text */
      --muted:#6b7b8a;   /* light text */
      --card:#eef1f5;    /* light grey cards */
      --border:#d9dee5;
    }
    *{box-sizing:border-box}
    body{margin:0;font-family:system-ui,-apple-system,Segoe UI,Roboto,Ubuntu,Arial,sans-serif;color:#1b1f24;line-height:1.5;background:#fff}
    .wrap{max-width:980px;margin:0 auto;padding:32px 16px}
    h1{font-weight:700;text-align:center;color:var(--ink);margin:18px 0 8px}
    .divider{display:flex;align-items:center;justify-content:center;gap:12px;margin-bottom:28px;color:#c2a33a}
    .divider:before,.divider:after{content:"";width:60px;height:2px;background:#c2a33a;display:inline-block}
    .grid{display:grid;grid-template-columns:repeat(3,1fr);gap:16px;margin-bottom:28px}
    .card{background:var(--card);border:1px solid var(--border);border-radius:6px;padding:20px}
    .card h3{margin:0 0 6px;color:var(--ink);font-size:18px}
    .card p{margin:0;color:var(--muted);font-size:14px}
    .form-wrap{background:var(--primary);border-radius:6px;padding:28px;margin-top:14px;border:1px solid #e39a0c}
    h2{color:var(--ink);text-align:center;font-size:32px;margin:14px 0 22px}
    label{display:block;font-size:14px;color:#0f223c;margin:6px 0}
    input,textarea{width:100%;padding:12px 14px;border:1px solid #1b1f240f;border-radius:4px;font-size:15px;outline:none}
    input::placeholder,textarea::placeholder{color:#9aa6b2}
    textarea{min-height:140px;resize:vertical}
    .row{display:grid;grid-template-columns:1fr 1fr;gap:12px}
    .mt{margin-top:12px}
    .btn{display:inline-block;background:#111;color:#fff;border:none;padding:12px 28px;border-radius:4px;font-weight:600;cursor:pointer;letter-spacing:.5px}
    .center{text-align:center}
    .msg{max-width:820px;margin:0 auto 16px;padding:12px 16px;border-radius:6px;font-size:14px}
    .msg.ok{background:#e9f8ef;border:1px solid #98d6a5;color:#0f6f2a}
    .msg.err{background:#fff2f2;border:1px solid #f4b6b6;color:#8a0f0f}
    @media (max-width:800px){ .grid{grid-template-columns:1fr} .row{grid-template-columns:1fr} }
  </style>
        <!-- footer-->
    <meta charset="UTF-8">
    <title>Footer Example</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        footer {
            background: #fff;
            color: #333;
            padding: 50px 10%;
        }
        .footer-columns {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }
        .footer-col {
            flex: 1;
            min-width: 200px;
            margin: 10px;
        }
        .footer-col h3 {
            color: #002147;
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 10px;
            position: relative;
        }
        .footer-col h3::after {
            content: "";
            display: block;
            width: 40px;
            height: 2px;
            background: #f5a623;
            margin-top: 5px;
        }
        .footer-col p {
            color: #777;
            line-height: 1.6;
        }
        .footer-col ul {
            list-style: none;
            padding: 0;
        }
        .footer-col ul li {
            margin: 8px 0;
        }
        .footer-col ul li a {
            color: #333;
            text-decoration: none;
        }
        .footer-col ul li a:hover {
            color: #f5a623;
        }
        .footer-col ul li::before {
            content: "» ";
            color: #f5a623;
        }
        .contact-info li {
            list-style: none;
            margin: 8px 0;
            display: flex;
            align-items: center;
        }
        .contact-info li span {
            margin-left: 8px;
        }
        .footer-bottom {
            background: linear-gradient(to right, #f5a623, #f2b91c);
            text-align: center;
            padding: 15px;
            color: #fff;
            font-size: 14px;
            margin-top: 20px;
        }
        .footer-bottom a {
            color: #002147;
            text-decoration: none;
            font-weight: bold;
        }
    </style>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Animated Footer</title>
    <link rel="stylesheet" href="./styles.css" />
    <!-- footer-->
    </head>
    <body>
        <!-- Responsive navbar-->
   <?php
// header.php
// Set $active to one of: home, about, services, team, gallery, mail
if (!isset($active)) { $active = 'home'; }

$menu = [
  'home'    => ['label' => 'HOME',      'href' => 'index.php'],
  'about'   => ['label' => 'ABOUT US',  'href' => 'about.php'],
  'services'=> ['label' => 'SERVICES',  'href' => 'services.php'],
  'team'    => ['label' => 'GALLERY',      'href' => 'team.php'],
  'gallery' => ['label' => 'TEAM',   'href' => 'gallery.php'],
  'mail'    => ['label' => 'MAIL US',   'href' => 'contact.php'],
  'ADMIN'    => ['label' => 'ADMIN',   'href' => 'admin-login.php'],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>SIBA RESULTS</title>

  <!-- Bootstrap & Icons (CDN). Replace with local files if you prefer -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

  <style>
    :root{
      --navy:#0a2945;   /* header bg */
      --gold:#f4a013;   /* accents */
      --gold-700:#cc8508;
      --text:#ffffff;
    }
    .sch-navbar{
      background: var(--navy);
      padding-top:.6rem; padding-bottom:.6rem;
    }
    .navbar-brand{
      font-weight:700; letter-spacing:.5px; color:#fff !important;
      display:flex; align-items:center; gap:.55rem;
    }
    .navbar-brand .logo-book{
      width:28px; height:28px; display:inline-grid; place-items:center;
      background:var(--gold); color:#12263a; border-radius:.4rem;
    }
    .navbar-nav .nav-link{
      color:rgba(255,255,255,.85) !important;
      font-weight:600; letter-spacing:.4px; padding:.75rem 1rem;
      position:relative;
    }
    .navbar-nav .nav-link:hover{ color:#fff !important; }
    .navbar-nav .nav-link.active{
      color:var(--gold) !important;
    }
    .navbar-nav .nav-link.active::after{
      content:""; position:absolute; left:1rem; right:1rem; bottom:.35rem;
      height:3px; background:var(--gold); border-radius:2px;
    }
    /* Sign-in pill */
    .btn-signin{
      background:var(--gold); color:#12263a; font-weight:700; border:none;
      padding:.55rem 1rem; border-radius:999px;
    }
    .btn-signin:hover{ background:var(--gold-700); color:#0b1f33; }
    /* Search pill */
    .search-pill{
      background:#fff; border-radius:999px; overflow:hidden;
      display:flex; align-items:center;
    }
    .search-pill input{
      border:none; outline:none; box-shadow:none !important;
      padding:.55rem .9rem; min-width:180px;
    }
    .search-pill button{
      border:none; background:var(--gold); color:#12263a;
      padding:.55rem .85rem;
    }
    .search-pill button:hover{ background:var(--gold-700); }
    /* Toggler color */
    .navbar-toggler{ border-color:rgba(255,255,255,.35); }
    .navbar-toggler-icon{ filter: invert(1) grayscale(100%); }
  </style>
</head>
<body>
<nav class="navbar navbar-expand-lg sch-navbar">
  <div class="container">
    <a class="navbar-brand" href="index.php">
      <span class="logo-book"><i class="fa-solid fa-book-open"></i></span>
      <span><h3><b>SIBA RESULT</h3></b></span>
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#schNav" aria-controls="schNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="schNav">
      <ul class="navbar-nav mx-lg-auto mb-2 mb-lg-0">
        <?php foreach ($menu as $key => $item): ?>
          <li class="nav-item">
            <a class="nav-link <?php echo ($active===$key)?'active':''; ?>" href="<?php echo htmlspecialchars($item['href']); ?>">
              <?php echo htmlspecialchars($item['label']); ?>
            </a>
          </li>
        <?php endforeach; ?>
      </ul>

      <div class="d-flex align-items-center gap-2">
        <a href="find-result.php" class="btn btn-signin">
          <i class="fa-solid fa-right-to-bracket me-1"></i> SIGN IN NOW
        </a>

        <form class="search-pill" action="search.php" method="get">
          <input type="text" name="q" placeholder="Search" aria-label="Search" style="background-color: white; color: black;" />
          <button type="submit" title="Search" style="background-color: white;">
            <i class="fa-solid fa-magnifying-glass"></i>
          </button>
        </form>
      </div>
    </div>
  </div>
</nav>

<!-- Your page content starts below -->
<!-- ... -->

<!-- Bootstrap JS (CDN). Place before closing body -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "srms");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$msg = "";

// Form submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name_applicant'];
    $mobile = $_POST['mobile_no'];
    $dob = $_POST['date_of_birth'];
    $address = $_POST['address'];
    $father = $_POST['father_name'];
    $district = $_POST['district'];
    $gender = $_POST['gender'];
    $state = $_POST['state'];

    $stmt = $conn->prepare("INSERT INTO admissions 
        (name_applicant, mobile_no, date_of_birth, address, father_name, district, gender, state)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssss", $name, $mobile, $dob, $address, $father, $district, $gender, $state);

    if ($stmt->execute()) {
        $msg = "✅ Admission form submitted successfully!";
    } else {
        $msg = "❌ Error: " . $stmt->error;
    }
    $stmt->close();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admission Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin:0;
            background:#f5f5f5;
        }
        .container {
            display: flex;
            flex-wrap: wrap;
        }
        .left, .right {
            flex: 1;
            min-width: 300px;
            padding: 20px;
        }
        .left iframe {
            width: 100%;
            height: 100%;
            min-height: 400px;
            border: none;
        }
        .form-box {
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }
        .form-box h2 {
            margin-bottom: 10px;
            text-align: center;
        }
        .form-box p {
            text-align: center;
            color: #f4a013;
            font-weight: bold;
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin: 10px 0 4px;
            font-weight: bold;
        }
        input {
            width: 100%;
            padding: 8px;
            border: none;
            background: #0a2945;
            color: white;
            border-radius: 3px;
        }
        button {
            background: #f4a013;
            border: none;
            color: white;
            font-weight: bold;
            padding: 10px;
            width: 100%;
            margin-top: 15px;
            cursor: pointer;
        }
        button:hover {
            background: #d8910e;
        }
        .msg {
            text-align: center;
            margin-bottom: 10px;
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="services-section text-center py-5" style="background-color:#D9C6F0;">
<div class="container">
    <!-- Left: YouTube video -->
    <div class="left">
        <iframe src="https://www.youtube.com/embed/KCyudi_WGGQ?si=QGWTx21xh02zOpdA?autoplay=0&mute=0" allowfullscreen></iframe>
    </div>

    <!-- Right: Admission Form -->
    <div class="right">
        <div class="form-box">
            <h2>ADMISSION FORM</h2>
            <p>ENTER THE FOLLOWING DETAILS</p>

            <?php if($msg) echo "<div class='msg'>$msg</div>"; ?>

            <form method="post">
                <label>Name Of Applicant :</label>
                <input type="text" name="name_applicant" required>

                <label>Mobile No :</label>
                <input type="text" name="mobile_no" required>

                <label>Date Of Birth :</label>
                <input type="date" name="date_of_birth" required>

                <label>Address :</label>
                <input type="text" name="address" required>

                <label>Father Name :</label>
                <input type="text" name="father_name" required>

                <label>District :</label>
                <input type="text" name="district" required>

                <label>Gender :</label>
                <input type="text" name="gender" required>

                <label>State :</label>
                <input type="text" name="state" required>

                <button type="submit">SUBMIT</button>
            </form>
        </div>
    </div>
</div>
</div>

<div class="services-section text-center py-5" style="background-color:#C1A2E7;">
<div class="about-section" style="display:flex; width:95%; max-width:1400px; margin:auto; gap:20px; align-items:stretch;">
    <!-- Left: Image -->
    <div class="about-image" style="flex:1; display:flex;">
        <img src="Campus Student.JPG" alt="Campus Student" style="width:80%; height:80%; object-fit:cover;">
    </div>

    <!-- Right: Text -->
    <div class="about-text" style="flex:1; display:flex; flex-direction:column;">
        <h2><b>WELCOME TO OUR UNIVERSITY</b></h2>
        <div class="divider d-flex justify-content-center text-center mb-4" style="font-size:2rem;">🎓</div>
        <p><h6><b>The Sri Lanka International Buddhist Academy,</b> is a leading non-state higher education institute in Sri Lanka, founded in 2009 with the blessings of the Most Venerable Prelates of the Asgiriya and Malwatta chapters. The vision for SIBA Campus was initiated by the then-incumbent Diyawadana Nilame of the Sri Dalada Maligawa, who recognized the need for an institution that could blend quality higher education with the timeless values of Buddhism.
            Located in a serene and eco-friendly monastic environment, SIBA Campus provides a unique academic atmosphere that promotes both intellectual growth and personal well-being. 
            In addition to academic programs, SIBA Campus emphasizes character building, leadership development, and community service. Students are encouraged to take part in cultural, social, and environmental initiatives that reinforce the institution’s core values of compassion, wisdom, and service. This holistic approach ensures that graduates are not only academically qualified but also socially responsible global citizens.
            With its strong foundation in Buddhist ethics, modern teaching methodologies, and a commitment to innovation, SIBA Campus continues to be a hub for knowledge, personal transformation, and sustainable development. It stands as a living example of how education, when combined with moral principles, can inspire individuals to create a better future for themselves and the world. 
        <h6></p>
    </div>
</div>
</div>

<div class="services-section text-center py-5" style="background-color:#A97DDE;">
    <h1 class="mb-3"><b>Our Services</b></h1>
    <div class="divider text-center mb-4" style="font-size:2rem;">🎓</div>
    <div class="icon mb-4"><i class="fas fa-graduation-cap"></i></div>

    <div class="services-container d-flex flex-wrap justify-content-center">
        <div class="service-box m-3 p-3 bg-white rounded shadow" style="max-width:300px;">
            <div class="icon mb-2"><i class="fas fa-graduation-cap"></i></div>
            <h3>SCHOLARSHIP FACILITY</h3>
            <p>SIBA (Sri Lanka International Buddhist Academy) Campus offers scholarship opportunities for students pursuing their Bachelor of Arts degrees in Buddhist Leadership and Pali. These scholarships are offered by the Sri Dalada Maligawa and are available for students who have passed the Advanced Level examination.</p>
        </div>

        <div class="service-box m-3 p-3 bg-white rounded shadow" style="max-width:300px;">
            <div class="icon mb-2"><i class="fas fa-user-tie"></i></div>
            <h3>SKILLED LECTURERS</h3>
            <p>Skilled lecturers are a key strength of SIBA Campus, playing a vital role in shaping future leaders and fostering a strong sense of community among educators. They are adaptable, embracing new teaching methods and technologies, and are dedicated to mentoring and inspiring students. SIBA emphasizes practical learning and provides lecturers who are not only knowledgeable but also approachable and supportive.</p>
        </div>

        <div class="service-box m-3 p-3 bg-white rounded shadow" style="max-width:300px;">
            <div class="icon mb-2"><i class="fas fa-book"></i></div>
            <h3>BOOK LIBRARY & STORE</h3>
            <p>SIBA's Peer Bookseller Resource Library is a collection of resources designed to support independent booksellers. It includes tools, downloads, and information that booksellers can use to improve their businesses and address common challenges. The library is a member benefit, available only to current students.</p>
        </div>
    </div>
</div>

<style>
    .service-box {
        transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
        transform: scale(1);
        cursor: pointer;
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .service-box:hover {
        transform: scale(1.05);
        box-shadow: 0 10px 20px rgba(0,0,0,0.2) !important;
        z-index: 10;
    }

    .service-box .icon i {
        font-size: 2.5rem;
        color: #4EB3DF;
        transition: all 0.3s ease;
    }

    .service-box:hover .icon i {
        transform: scale(1.2);
    }

    .service-box h3 {
        color: #2c3e50;
        transition: all 0.3s ease;
    }

    .service-box:hover h3 {
        color: #4EB3DF;
    }

    .service-box p {
        flex-grow: 1;
    }
</style>

<div class="services-section text-center py-5" style="background-color:#9059D4;">
<h1 class="text-center w-100 mb-4" style="color: white;"><b>Our Gallery</b></h1>
<div class="divider text-center mb-4" style="font-size:2rem; width:100%;">🎓</div>
<div class="row justify-content-center">

        <!-- Column 1 -->
        <div class="col-12 col-sm-6 col-md-4 col-lg-2 mb-4">
            <div class="gallery-item position-relative">
                <img src="images/s1.jpg" 
                     class="img-fluid rounded gallery-img" alt="Gallery Image">
                <div class="overlay position-absolute top-0 start-0 w-100 h-100 d-flex flex-column justify-content-center align-items-center text-white"
                     style="background: rgba(0,0,0,0.5); opacity:0; transition:0.3s;">
                    <h1>Amazing Caption</h1>
                    <h2>Your Caption Here</h2>
                </div>
            </div>
        </div>

        <!-- Column 2 -->
        <div class="col-12 col-sm-6 col-md-4 col-lg-2 mb-4">
            <div class="gallery-item position-relative">
                <img src="images/s2.jpg" 
                     class="img-fluid rounded gallery-img" alt="Gallery Image">
                <div class="overlay position-absolute top-0 start-0 w-100 h-100 d-flex flex-column justify-content-center align-items-center text-white"
                     style="background: rgba(0,0,0,0.5); opacity:0; transition:0.3s;">
                    <h1>Amazing Caption</h1>
                    <h2>Your Caption Here</h2>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-4 col-lg-2 mb-4">
            <div class="gallery-item position-relative">
                <img src="images/s3.jpg" 
                     class="img-fluid rounded gallery-img" alt="Gallery Image">
                <div class="overlay position-absolute top-0 start-0 w-100 h-100 d-flex flex-column justify-content-center align-items-center text-white"
                     style="background: rgba(0,0,0,0.5); opacity:0; transition:0.3s;">
                    <h1>Amazing Caption</h1>
                    <h2>Your Caption Here</h2>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-4 col-lg-2 mb-4">
            <div class="gallery-item position-relative">
                <img src="images/s4.jpg" 
                     class="img-fluid rounded gallery-img" alt="Gallery Image">
                <div class="overlay position-absolute top-0 start-0 w-100 h-100 d-flex flex-column justify-content-center align-items-center text-white"
                     style="background: rgba(0,0,0,0.5); opacity:0; transition:0.3s;">
                    <h1>Amazing Caption</h1>
                    <h2>Your Caption Here</h2>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-4 col-lg-2 mb-4">
            <div class="gallery-item position-relative">
                <img src="images/s5.jpg" 
                     class="img-fluid rounded gallery-img" alt="Gallery Image">
                <div class="overlay position-absolute top-0 start-0 w-100 h-100 d-flex flex-column justify-content-center align-items-center text-white"
                     style="background: rgba(0,0,0,0.5); opacity:0; transition:0.3s;">
                    <h1>Amazing Caption</h1>
                    <h2>Your Caption Here</h2>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-4 col-lg-2 mb-4">
            <div class="gallery-item position-relative">
                <img src="images/s6.jpg" 
                     class="img-fluid rounded gallery-img" alt="Gallery Image">
                <div class="overlay position-absolute top-0 start-0 w-100 h-100 d-flex flex-column justify-content-center align-items-center text-white"
                     style="background: rgba(0,0,0,0.5); opacity:0; transition:0.3s;">
                    <h1>Amazing Caption</h1>
                    <h2>Your Caption Here</h2>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-4 col-lg-2 mb-4">
            <div class="gallery-item position-relative">
                <img src="images/s7.jpg" 
                     class="img-fluid rounded gallery-img" alt="Gallery Image">
                <div class="overlay position-absolute top-0 start-0 w-100 h-100 d-flex flex-column justify-content-center align-items-center text-white"
                     style="background: rgba(0,0,0,0.5); opacity:0; transition:0.3s;">
                    <h1>Amazing Caption</h1>
                    <h2>Your Caption Here</h2>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-4 col-lg-2 mb-4">
            <div class="gallery-item position-relative">
                <img src="images/s8.jpg" 
                     class="img-fluid rounded gallery-img" alt="Gallery Image">
                <div class="overlay position-absolute top-0 start-0 w-100 h-100 d-flex flex-column justify-content-center align-items-center text-white"
                     style="background: rgba(0,0,0,0.5); opacity:0; transition:0.3s;">
                    <h1>Amazing Caption</h1>
                    <h2>Your Caption Here</h2>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-4 col-lg-2 mb-4">
            <div class="gallery-item position-relative">
                <img src="images/s9.jpg" 
                     class="img-fluid rounded gallery-img" alt="Gallery Image">
                <div class="overlay position-absolute top-0 start-0 w-100 h-100 d-flex flex-column justify-content-center align-items-center text-white"
                     style="background: rgba(0,0,0,0.5); opacity:0; transition:0.3s;">
                    <h1>Amazing Caption</h1>
                    <h2>Your Caption Here</h2>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-4 col-lg-2 mb-4">
            <div class="gallery-item position-relative">
                <img src="images/s10.jpg" 
                     class="img-fluid rounded gallery-img" alt="Gallery Image">
                <div class="overlay position-absolute top-0 start-0 w-100 h-100 d-flex flex-column justify-content-center align-items-center text-white"
                     style="background: rgba(0,0,0,0.5); opacity:0; transition:0.3s;">
                    <h1>Amazing Caption</h1>
                    <h2>Your Caption Here</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.gallery-item {
    overflow: hidden;
    border-radius: 8px !important;
    transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
}

.gallery-img {
    width: 330px;
    height: 330px;
    object-fit: cover;
    transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
}

.gallery-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.3);
    z-index: 10;
}

.gallery-item:hover .overlay {
    opacity: 1;
}

.gallery-item:hover .gallery-img {
    transform: scale(1.15);
}

.overlay h1 {
    font-size: 1.8rem;
    margin-bottom: 0.5rem;
    text-shadow: 1px 1px 3px rgba(0,0,0,0.8);
}

.overlay h2 {
    font-size: 1.2rem;
    text-shadow: 1px 1px 3px rgba(0,0,0,0.8);
}
</style>

<script>
function showMore() {
    var box = document.getElementById("moreInfo");
    if (box.style.display === "none") {
        box.style.display = "block";
    } else {
        box.style.display = "none";
    }
}
</script>

<div class="services-section text-center py-5" style="background-color:#7834CB;">
  <h1 style="color:white;"><b>Our Skilled Lecturers</b></h1>
  <div class="divider d-flex justify-content-center text-center mb-4" style="font-size:2rem;">🎓</div>

  <div class="lecturers">
    <?php foreach ($lecturers as $lec): ?>
        <div class="card">
            <img src="<?php echo $lec['image']; ?>" alt="<?php echo $lec['name']; ?>">
            <div class="name"><?php echo $lec['name']; ?></div>
        </div>
    <?php endforeach; ?>
  </div>
</div>


<div class="services-section text-center py-5" style="background-color:#672DAD;">
  <div class="wrap">
      <h1 style="color:white;"><b>Mail Us</b></h1>
      <div class="divider d-flex justify-content-center text-center mb-4" style="font-size:2rem;">🎓</div>
      
      <!-- Top info cards -->
      <div class="grid" style="display:flex; justify-content:center; gap:20px; flex-wrap:wrap;">
        <div class="card" style="background:#fff; padding:20px; border-radius:10px; width:200px; box-shadow:0 4px 10px rgba(0,0,0,0.2); transition: transform 0.3s ease;">
          <h3><b>Address</b></h3>
          <p><b>SIBA Campus, Pallekele, Kundasale<br>Sri Lanka 20168.</b></p>
        </div>
        <div class="card" style="background:#fff; padding:20px; border-radius:10px; width:200px; box-shadow:0 4px 10px rgba(0,0,0,0.2); transition: transform 0.3s ease;">
          <h3><b>Phone</b></h3>
          <p><b>0812 421 693<br>0812 421 693</b></p>
        </div>
        <div class="card" style="background:#fff; padding:20px; border-radius:10px; width:200px; box-shadow:0 4px 10px rgba(0,0,0,0.2); transition: transform 0.3s ease;">
          <h3><b>Email</bs></h3>
          <p><b>info@siba.edu.lk<br>info@siba.edu.com<b></p>
        </div>
      </div>
  </div>
</div>

<style>
  .grid .card:hover {
      transform: scale(1.05); /* smooth zoom on hover */
  }
</style>


<div class="services-section text-center py-5" style="background-color:#4D2182;">
    <h1 style="color:white; margin-bottom:20px;"><b>Get In Touch</b></h1>
    <div class="divider d-flex justify-content-center text-center mb-4" style="font-size:2rem;">🎓</div>

    <!-- Feedback Messages -->
    <?php if(isset($_GET['ok'])): ?>
        <div style="max-width:820px; margin:0 auto 16px; padding:12px 16px; border-radius:6px; font-size:14px; background:#e9f8ef; border:1px solid #98d6a5; color:#0f6f2a;">
            Thanks! Your message has been sent.
        </div>
    <?php elseif(isset($_GET['err'])): ?>
        <div style="max-width:820px; margin:0 auto 16px; padding:12px 16px; border-radius:6px; font-size:14px; background:#fff2f2; border:1px solid #f4b6b6; color:#8a0f0f;">
            <?= htmlspecialchars($_GET['err']) ?>
        </div>
    <?php endif; ?>

    <!-- Creative Form Box -->
    <div style="max-width:800px; margin:0 auto; background: linear-gradient(135deg, #1e3c5a, #2a5b80); padding:40px; border-radius:15px; box-shadow:0 10px 25px rgba(0,0,0,0.3); color:white;">
        <form method="post" action="process_contact.php" novalidate>
            
            <div style="display:grid; grid-template-columns:1fr 1fr; gap:20px;">
                <div>
                    <label for="name" style="display:block; font-size:14px; margin:6px 0;">Name*</label>
                    <input id="name" name="name" type="text" placeholder="Name" required style="width:100%; padding:14px 16px; border:none; border-radius:8px; font-size:15px; outline:none; color:#111;">
                </div>
                <div>
                    <label for="phone" style="display:block; font-size:14px; margin:6px 0;">Phone Number*</label>
                    <input id="phone" name="phone" type="tel" placeholder="Phone Number" required style="width:100%; padding:14px 16px; border:none; border-radius:8px; font-size:15px; outline:none; color:#111;">
                </div>
            </div>

            <div style="display:grid; grid-template-columns:1fr 1fr; gap:20px; margin-top:20px;">
                <div>
                    <label for="email" style="display:block; font-size:14px; margin:6px 0;">E-mail*</label>
                    <input id="email" name="email" type="email" placeholder="E-mail" required style="width:100%; padding:14px 16px; border:none; border-radius:8px; font-size:15px; outline:none; color:#111;">
                </div>
                <div>
                    <label for="subject" style="display:block; font-size:14px; margin:6px 0;">Subject*</label>
                    <input id="subject" name="subject" type="text" placeholder="Subject" required style="width:100%; padding:14px 16px; border:none; border-radius:8px; font-size:15px; outline:none; color:#111;">
                </div>
            </div>

            <div style="margin-top:20px;">
                <label for="message" style="display:block; font-size:14px; margin:6px 0;">Message*</label>
                <textarea id="message" name="message" placeholder="Message" required style="width:100%; padding:14px 16px; border:none; border-radius:8px; font-size:15px; outline:none; min-height:160px; resize:vertical; color:#111;"></textarea>
            </div>

            <!-- CSRF token -->
            <?php
              session_start();
              if (empty($_SESSION['csrf'])) { $_SESSION['csrf'] = bin2hex(random_bytes(16)); }
            ?>
            <input type="hidden" name="csrf" value="<?php echo $_SESSION['csrf']; ?>">

            <div style="text-align:center; margin-top:25px;">
                <button type="submit" style="display:inline-block; background:#ffcc00; color:#111; border:none; padding:14px 32px; border-radius:50px; font-weight:600; cursor:pointer; letter-spacing:.5px; transition:0.3s; box-shadow:0 5px 15px rgba(0,0,0,0.2);">
                    SEND
                </button>
            </div>
        </form>
    </div>
</div>

<style>
    /* Hover effect for submit button */
    .services-section button:hover {
        transform: scale(1.05);
        box-shadow:0 8px 20px rgba(0,0,0,0.3);
    }
    /* Smooth focus for inputs */
    .services-section input:focus,
    .services-section textarea:focus {
        box-shadow: 0 0 8px rgba(255,204,0,0.7);
    }
</style>

        <!-- Footer -->
        <footer>
      <div class="footer-waves">
        <div class="wave" id="wave1"></div>
        <div class="wave" id="wave2"></div>
        <div class="wave" id="wave3"></div>
        <div class="wave" id="wave4"></div>
      </div>
      <ul>
        <li>
          <a href="#">
            <img class="footer-icons" src="./F.png" alt="Facebook" />
          </a>
        </li>
        <li>
          <a href="#">
            <img class="footer-icons" src="./G.png" alt="Google" />
          </a>
        </li>
        <li>
          <a href="#">
            <img class="footer-icons" src="./I.png" alt="Instagram" />
          </a>
        </li>
        <li>
          <a href="#">
            <img class="footer-icons" src="./L.png" alt="LinkedIn" />
          </a>
        </li>
        <li>
          <a href="#">
            <img class="footer-icons" src="./T.png" alt="Twitter" />
          </a>
        </li>
        <li>
          <a href="#">
            <img class="footer-icons" src="./Y.png" alt="YouTube" />
          </a>
        </li>
      </ul>
      <ul class="footer-links">
        <li><a class="footer-link" href="#">Home</a></li>
        <li><a class="footer-link" href="#">Portfolio</a></li>
        <li><a class="footer-link" href="#">Contact</a></li>
      </ul>
      <div class="footer-bottom">
          © 2025 SIBA CAMPUS. All rights reserved | Design by <a href="#" style="color: #002147; text-decoration: none; font-weight: bold;">Sameera</a>.
      </div>
    </footer>
  </body>
</html>

