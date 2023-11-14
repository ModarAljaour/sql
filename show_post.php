<?php
session_start();
// echo '<pre>';
// print_r($_SESSION);
// echo '</pre>';
$username = $_SESSION['username'];
// require_once 'db/MysqliDb.php';
require_once 'post.php';
// require_once 'user.php';

$posts = new post();
$all_post =  $posts->getPost();

// $users = new user();
// $one_user = $users->getOneUser($username);
if (isset($_SESSION['user_id'])) {
    if ($_SESSION['role'] === 1) {
?>
        <a href="addPost.php"><button>add</button></a><br><br>
        <?php
    }
    foreach ($all_post as $key => $value) {
        echo "* post title : <br><br>" . $value['post_title'] . '<br><br>';
        echo "* post text : <br><br>" . $value['post_text'] . '<br><br>';
        if ($_SESSION['role'] === 1) {
        ?>
            <a href="updatePostForm.php?
            post_id=<?php echo $value['post_id'] ?>&&
            post_title=<?php echo $value['post_title'] ?>&&
            post_text=<?php echo $value['post_text'] ?>&&">
                <button>update</button></a>
            <a href="delete.php?post_id=<?php echo $value['post_id'] ?>"><button>delete</button></a>
<?php
        }
        echo '<hr>';
    }
}
