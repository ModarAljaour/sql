<?php
require_once 'conn.php';
class post
{
    public $db;
    public function __construct()
    {
        $db = Database::getInstance();
        $this->db = $db->getConnection();
    }
    public function getPost()
    {
        return $this->db->get('posts');
    }
    public function getOnePost($post_id)
    {
        $this->db->where('post_id', $post_id);
        return $this->db->get('posts');
    }
    // public function getPostByUserID($user_id)
    // {
    //     $this->db->where("user_id", $user_id);
    //     return $this->db->get("posts");
    // }
    public function addPost($user_id, $post_title, $post_text)
    {
        $data = array(
            "user_id" => $user_id,
            "post_title" => $post_title,
            "post_text" => $post_text
        );
        $this->db->insert('posts', $data);
    }
    public function updatePost($post_id, $post_text, $post_title)
    {
        $data = array(
            "post_title" => $post_title,
            "post_text" => $post_text
        );
        $this->db->where('post_id', $post_id);
        $this->db->update('posts', $data);
    }
    public function deletePost($post_id)
    {
        $this->db->where('post_id', $post_id);
        return $this->db->delete('posts');
    }
}
