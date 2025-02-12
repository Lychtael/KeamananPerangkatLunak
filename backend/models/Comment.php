<?php
require_once __DIR__ . '/../config/database.php';

class Comment {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function addComment($postId, $userId, $comment) {
        $name = ($userId) ? $this->getUserName($userId) : "Anonymous";
        $stmt = $this->pdo->prepare("INSERT INTO comments (post_id, user_id, name, comment, created_at) VALUES (?, ?, ?, ?, NOW())");
        return $stmt->execute([$postId, $userId, $name, $comment]);
    }

    public function getCommentsByPost($postId) {
        $stmt = $this->pdo->prepare("SELECT * FROM comments WHERE post_id = ? ORDER BY created_at DESC");
        $stmt->execute([$postId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    private function getUserName($userId) {
        $stmt = $this->pdo->prepare("SELECT name FROM users WHERE id = ?");
        $stmt->execute([$userId]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user ? $user['name'] : "Anonymous";
    }
}
?>
