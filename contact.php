<?php
// process_contact.php
session_start();

/* ---------- CONFIGURE ---------- */
$SEND_TO_EMAIL = "your-email@example.com";   // <— change to your inbox
$SITE_NAME     = "Your Website";             // used in email subject
$use_db        = false;                      // set true if you want to save to MySQL
$db = [
  'dsn'  => 'mysql:host=localhost;dbname=contact_form;charset=utf8mb4',
  'user' => 'root',
  'pass' => ''
];
/* -------------------------------- */

function redirect_ok() {
  header("Location: contact.php?ok=1"); exit;
}
function redirect_err($msg) {
  header("Location: contact.php?err=".urlencode($msg)); exit;
}

/* CSRF */
if (!isset($_POST['csrf'], $_SESSION['csrf']) || !hash_equals($_SESSION['csrf'], $_POST['csrf'])) {
  redirect_err("Security token invalid. Please try again.");
}

/* Collect & validate */
$fields = [
  'name'    => trim($_POST['name'] ?? ''),
  'phone'   => trim($_POST['phone'] ?? ''),
  'email'   => trim($_POST['email'] ?? ''),
  'subject' => trim($_POST['subject'] ?? ''),
  'message' => trim($_POST['message'] ?? '')
];

if ($fields['name']==='' || $fields['phone']==='' || $fields['email']==='' || $fields['subject']==='' || $fields['message']==='') {
  redirect_err("All fields are required.");
}
if (!filter_var($fields['email'], FILTER_VALIDATE_EMAIL)) {
  redirect_err("Please enter a valid email address.");
}

/* simple header-injection guard */
foreach ($fields as $k => $v) {
  if (preg_match('/[\r\n](to:|from:|cc:|bcc:)/i', $v)) {
    redirect_err("Invalid input detected.");
  }
}

/* Email compose (plain text) */
$subject = "[$SITE_NAME] Contact: ".$fields['subject'];
$body =
  "You received a new contact message:\n\n".
  "Name   : {$fields['name']}\n".
  "Phone  : {$fields['phone']}\n".
  "Email  : {$fields['email']}\n".
  "Subject: {$fields['subject']}\n".
  "Message:\n{$fields['message']}\n\n".
  "Time: ".date('Y-m-d H:i:s');

$headers = [];
$headers[] = "From: ".$SITE_NAME." <no-reply@".$_SERVER['SERVER_NAME'].">";
$headers[] = "Reply-To: ".$fields['email'];
$headers[] = "Content-Type: text/plain; charset=UTF-8";
$headers_str = implode("\r\n", $headers);

/* Send (uses PHP's mail(); for better reliability configure SMTP or PHPMailer) */
$sent = @mail($SEND_TO_EMAIL, $subject, $body, $headers_str);
if (!$sent) {
  // if mail() is disabled on your host, fail gracefully
  // you can still enable DB save below so you don’t lose messages
  // or switch to PHPMailer/SMTP.
}

/* Optional: save to DB */
if ($use_db) {
  try {
    $pdo = new PDO($db['dsn'], $db['user'], $db['pass'], [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
    $stmt = $pdo->prepare("INSERT INTO messages(name, phone, email, subject, message, created_at) VALUES(?,?,?,?,?,NOW())");
    $stmt->execute([
      $fields['name'], $fields['phone'], $fields['email'], $fields['subject'], $fields['message']
    ]);
  } catch (Throwable $e) {
    // Log in real apps:
    // error_log($e->getMessage());
  }
}

redirect_ok();
