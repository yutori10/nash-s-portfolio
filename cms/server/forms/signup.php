<h1>Sign Up</h1>
<form action="register.php" method="post">
    <div class="name_req">
        <label>
            Account name : 
            <input type="text" name="name" required>
        </label>
    </div>
    <div class="address_req">
        <label>
            Mail Address : 
            <input type="text" name="mail" required>
        </label>
    </div>
    <div class="pass_req">
        <label>
            Password : 
            <input type="password" name="pass" required>
        </label>
    </div>
    <input type="submit" value="Register">
</form>
<p>すでに登録済みの方は<a href="login.php">こちら</a>から</p>