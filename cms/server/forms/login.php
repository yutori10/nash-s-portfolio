<?php
session_start();
$mail = $_POST['mail'];
$dsn = "mysql:localhost; dbname=xxx; charset=utf8";
$username = "xxx";
$password = "xxx";

try {
    $dbh = new PDO($dsn, $username, $password);
} catch(PDOException $ex) {
    $msg = $ex->getMessage();
}

$sql = "SELECT * FROM users WHERE mail = :mail";
$stmt = $dbh->prepare($sql);
$stmt->bindValue('mail', $mail);
$stmt->execute();
$member = $stmt->fetch();
// 指定したハッシュとパスワードを照合
if(password_verify($_POST['pass'], $member['pass'])) {
    $_SESSION['id'] = $member['id'];
    $_SESSION['name'] = $member['name'];
    $msg = 'LOGIN SUCCESS';
    $link = '<a href="index.php">ホーム</a>';
} else {
    $msg = 'メールアドレスもしくはパスワードが間違っています。';
    $link = '<a href="login.php">戻る</a>';
}
?>

<h1><?php echo $msg; ?></h1>
<?php echo $link; ?>