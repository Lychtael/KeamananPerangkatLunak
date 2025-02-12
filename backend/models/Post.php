<?php
require_once __DIR__ . '/../config/database.php';

class Post {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function createPost($userId, $title, $content, $categoryId) {
        $stmt = $this->pdo->prepare("INSERT INTO posts (user_id, title, content, category_id, created_at) VALUES (?, ?, ?, ?, NOW())");
        return $stmt->execute([$userId, $title, $content, $categoryId]);
    }

    public function getPostById($id) {
        $stmt = $this->pdo->prepare("SELECT posts.*, users.name AS author, categories.name AS category 
                                     FROM posts 
                                     JOIN users ON posts.user_id = users.id 
                                     JOIN categories ON posts.category_id = categories.id
                                     WHERE posts.id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllPosts() {
        $stmt = $this->pdo->query("SELECT posts.*, users.name AS author, categories.name AS category 
                                   FROM posts 
                                   JOIN users ON posts.user_id = users.id 
                                   JOIN categories ON posts.category_id = categories.id
                                   ORDER BY posts.created_at DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deletePost($id, $userId) {
        $stmt = $this->pdo->prepare("DELETE FROM posts WHERE id = ? AND user_id = ?");
        return $stmt->execute([$id, $userId]);
    }
}
?>
