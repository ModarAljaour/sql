<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
</head>

<body>
    <form action="" method="post">
        <center>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <br><br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <br><br>
            <label for="role">role:</label>
            <select name="role" id="">
                <option value="user">user</option>
                <option value="admin">admin</option>
            </select><br><br>
            <input type="submit" value="register" name="register">
        </center>
    </form>
</body>

</html>
<?php
if (isset($_POST['register'])) {
    
    require_once 'user.php';
    $user = new user();

    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    if ($user->register($username, $password, $role)) {
        header('location:login.html');
    } else {
        echo 'false register';
    }
}
