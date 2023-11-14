<h2>ADD</h2>
<form action="addPost.php" method="post" enctype="multipart/form-data">
    <label for="title">Title:</label>
    <input type="text" id="title" name="post_title" required><br><br>
    <label for="content">Content:</label>
    <textarea id="content" name="post_text" required></textarea><br><br>
    <input type="submit" value="Add">
</form>
<?php

// session_start();
// if (!isset($_SESSION['user_id'])) {
//     header('Location: login.html');
// }

echo '<pre>';
print_r($_POST);
echo '</pre>';
if (isset($_POST['Add'])) {
    require_once 'user.php';
    require_once 'post.php';
    $post_title = $_POST['post_title'];
    $post_text = $_POST['post_text'];
    $add = new post();
    // $add->addPost($user_id, $post_title, $post_text)
    if ($add->addPost('1', $post_title, $post_text)) {
        header('location:show_post.php');
        # code...
    }
}
