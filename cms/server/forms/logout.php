<?php
session_start();
$_SESSION = array();// セッションの中身をすべて削除
session_destroy();// セッションを破壊する
?>

<p>ログアウトしました。</p>
<a href="login.php">ログインへ</a>