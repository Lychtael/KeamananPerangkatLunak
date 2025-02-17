<?php
require_once 'config/Database.php';

class Post
{
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function getAllPosts()
    {
        $query = "SELECT * FROM posts ORDER BY created_at DESC";
        $result = $this->db->query($query);
        return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
    }

    public function getPostById($id)
    {
        $query = "SELECT * FROM posts WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function addPost($title, $content, $author_id, $image_path, $keywords)
    {
        $query = "INSERT INTO posts (title, content, author_id, image_path, keywords, created_at) 
                  VALUES (?, ?, ?, ?, ?, NOW())";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("ssiss", $title, $content, $author_id, $image_path, $keywords);
        return $stmt->execute();
    }

    public function updatePost($id, $title, $content, $image_path = null)
    {
        if ($image_path) {
            $query = "UPDATE posts SET title = ?, content = ?, image_path = ? WHERE id = ?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param("sssi", $title, $content, $image_path, $id);
        } else {
            $query = "UPDATE posts SET title = ?, content = ? WHERE id = ?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param("ssi", $title, $content, $id);
        }
        return $stmt->execute();
    }

    public function deletePost($id)
    {
        $query = "DELETE FROM posts WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
