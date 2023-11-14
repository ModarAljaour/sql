<center>UPDATE POST</center>
<?php
// echo '<pre>';
// print_r($_POST);
// echo '</pre>';
$post_id =  $_GET['post_id'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $post_title = $_POST['post_title'];
    $post_text = $_POST['post_text'];
    require_once 'post.php';
    $posts = new post();
    $edit_post = $posts->updatePost($post_id, $post_text, $post_title);
    header('location:show_post.php');
    // if ($edit_post) {
    // header('location:show_post.php');
    // }else{
    // echo 'false edit';
    // }
}
