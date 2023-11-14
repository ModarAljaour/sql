<?php
$post_id = $_GET['post_id'];
$post_title = $_GET['post_title'];
$post_text = $_GET['post_text'];
// require_once 'post.php';
// $posts = new post();
// $one_post = $posts->getOnePost($post_id);
// echo '<pre>';
// print_r($one_post);
?>
<h2>update Form</h2>

<form action="updatePost.php?post_id=<?php echo $post_id ?>" method="post">
  post title :
  <input type="text" name="post_title" value="<?php echo $post_title ?>" /><br /><br />
  post text :
  <input type="text" name="post_text" id="" value="<?php echo $post_text  ?>" /><br /><br />
  <input type="submit" value="update" name="update" />
</form>