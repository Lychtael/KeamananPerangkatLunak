<?php
class Comment {
    private $conn;
    private $table = "comments";

    public function __construct($db) {
        $this->conn = $db;
    }

    // 1. Ambil semua komentar berdasarkan post ID
    public function getByPostId($postId) {
        $query = "SELECT * FROM " . $this->table . " WHERE post_id = :post_id ORDER BY created_at DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":post_id", $postId);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // 2. Ambil komentar berdasarkan ID
    public function getById($id) {
        $query = "SELECT * FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // 3. Tambah komentar baru
    public function create($postId, $content, $author, $userId = null) {
        $query = "INSERT INTO " . $this->table . " (post_id, content, author, user_id) 
                  VALUES (:post_id, :content, :author, :user_id)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":post_id", $postId);
        $stmt->bindParam(":content", $content);
        $stmt->bindParam(":author", $author);
        $stmt->bindParam(":user_id", $userId, PDO::PARAM_NULL);
        return $stmt->execute();
    }

    // 4. Hapus komentar berdasarkan ID
    public function delete($id) {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }

    // 5. Ambil username berdasarkan user ID (digunakan di CommentController)
    public function getUsernameById($userId) {
        $query = "SELECT username FROM users WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $userId);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ? $result['username'] : "Anonymous";
    }
}
?>
