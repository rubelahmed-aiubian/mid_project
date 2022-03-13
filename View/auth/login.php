<h4>Admininstrative Login</h4>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <select name="role">
        <option disabled selected value="empty">Choose Role</option>
        <option value="admin">Admin</option>
        <option value="staff">Staff</option>
        <option value="seller">Seller</option>
    </select><br>
    <label for="email">Email:</label><br>
    <input type="email" placeholder="enter your email" id="email" name="email" required><br>
    <label for="password">Password:</label><br>
    <input type="password" placeholder="enter your password" id="password" name="password" required><br>
    <label for="remember">Remember Me</label>
    <input type="checkbox" id="remember" name="remember_me">
</form>
<a href="registration.php">Don't have any account?</a>
<a href="/index.php">Go back to home</a>

<?php
