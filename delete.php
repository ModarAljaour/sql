<h2>Delete</h2>
<?php

require_once("post.php");
if (isset($_GET["post_id"])) {
    $post = new post();
    $post_id = $_GET["post_id"];
    if ($post->deletePost($post_id)) {

?>
        <script>
            alert("the post has been deleted successfully!!")
        </script>
<?php
        header("REFRESH:0 ; URL=show_post.php");
    }
} else {
    echo "<h2> forbidden </h2>";
}
