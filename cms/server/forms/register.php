<?php

// フォームの入力情報を変数として取得
/*
password_hash(string $password, string|int|null $algo, array $options = []):string
$password : 生パスワード
$algo : パスワードの暗号化アルゴリズム
$options : ランダムなsaltを生成してデフォルトのコストを使用。非推奨。

final public Exception::getMessage():string
パラメータなし。例外メッセージ文字列を返す。
*/
$name = $_POST['name'];
$mail = $_POST['mail'];
$pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
$dsn = "mysql:host=localhost; dbname=xxx; charset=utf8";
$username = "xxx";
$password = "xxx";

try {
    $dbh = new PDO($dsn, $username, $password);
} catch(PDOException) {
    $msg = $ex->getMessage();
}

// $mailがすでに登録されているかチェック
$sql = "SELECT * FROM users WHERE mail = :mail";
$stmt = $dbh->prepare($sql);
$stmt->bindValue(':mail', $mail);
$stmt->execute();
$member = $stmt->fetch();
if($member['mail']===$mail) {
    $msg = '同じメールアドレスが存在します。';
    $link = '<a href="signup.php">戻る</a>';
} else {
    $sql = "INSERT INTO users(name, mail, pass) VALUES (:name, :mail, :pass)";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':name', $name);
    $stmt->bindValue(':mail', $mail);
    $stmt->bindValue(':pass', $pass);
    $stmt->execute();
    $msg = '会員登録が完了しました。';
    $link = '<a href="login.php">ログインページ</a>';
}
?>

<h1><?php echo $msg; ?></h1>
<?php echo $link; ?>