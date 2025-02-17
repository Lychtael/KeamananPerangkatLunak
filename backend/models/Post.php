<?php
class Post {
    private $conn;
    private $table = "posts";

    public function __construct($db) {
        $this->conn = $db;
    }

    // 1. Ambil semua postingan (dengan kategori & user)
    public function getAll() {
        $query = "SELECT p.id, p.title, p.content, p.created_at, 
                         u.username AS author, c.name AS category 
                  FROM " . $this->table . " p
                  JOIN users u ON p.user_id = u.id
                  JOIN categories c ON p.category_id = c.id
                  ORDER BY p.created_at DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // 2. Ambil postingan berdasarkan ID
    public function getById($id) {
        $query = "SELECT p.id, p.title, p.content, p.created_at, 
                         u.username AS author, c.name AS category 
                  FROM " . $this->table . " p
                  JOIN users u ON p.user_id = u.id
                  JOIN categories c ON p.category_id = c.id
                  WHERE p.id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // 3. Tambah postingan baru
    public function create($title, $content, $userId, $categoryId) {
        $query = "INSERT INTO " . $this->table . " (title, content, user_id, category_id) 
                  VALUES (:title, :content, :user_id, :category_id)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":title", $title);
        $stmt->bindParam(":content", $content);
        $stmt->bindParam(":user_id", $userId);
        $stmt->bindParam(":category_id", $categoryId);
        return $stmt->execute();
    }

    // 4. Edit postingan (hanya pemilik)
    public function update($id, $title, $content, $categoryId) {
        $query = "UPDATE " . $this->table . " 
                  SET title = :title, content = :content, category_id = :category_id
                  WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":title", $title);
        $stmt->bindParam(":content", $content);
        $stmt->bindParam(":category_id", $categoryId);
        return $stmt->execute();
    }

    // 5. Hapus postingan (hanya pemilik)
    public function delete($id) {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }
}
?>
