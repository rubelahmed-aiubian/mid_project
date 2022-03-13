<h4>Admininstrative Registration</h4>
<form enctype="multipart/form-data">
    <select>
        <option disabled selected>Choose Role</option>
        <option value="admin">Admin</option>
        <option value="staff">Staff</option>
        <option value="seller">Seller</option>
    </select><br>
    <label for="full_name">Name:</label><br>
    <input type="text" id="full_name" name="full_name" placeholder="enter your full name"><br>
    <label for="email">Email:</label><br>
    <input type="email" placeholder="enter your email" id="email" name="email"><br>
    <label for="phone">Phone:</label><br>
    <input type="text" id="phone" name="phone" placeholder="+880123456789"><br>
    <label for="password">Password:</label><br>
    <input type="password" placeholder="enter your password" id="password" name="password"><br>
    <label for="profile_photo">Upload a photo</label><br>
    <input type="file" id="profile_photo" name="photo">
</form>
<a href="registration.php">Don't have any account?</a>
<a href="login.php">Go back to login</a>