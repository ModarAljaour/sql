<?php
session_start();
if (isset($_SERVER['REQUEST_METHOD']) == 'POST') {

    require_once 'user.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = new user();

    $login_chk = $user->login($username, $password);

    if ($login_chk) {
        header('Location:show_post.php');
    } else {
?>
        <script>
            alert("Invalid username or password");
        </script>
<?php
        header('REFRESH:0,URL=register.php');
    }
}
