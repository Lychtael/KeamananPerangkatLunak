<?php
require_once '../config/database.php';
require_once '../models/Comment.php';

class CommentController {
    private $db;
    private $commentModel;

    public function __construct() {
        $this->db = Database::connect();
        $this->commentModel = new Comment($this->db);
    }

    // 1. Ambil semua komentar untuk postingan tertentu
    public function getCommentsByPost($postId) {
        return $this->commentModel->getByPostId($postId);
    }

    // 2. Tambah komentar baru
    public function addComment($postId, $content, $userId = null) {
        // Jika user tidak login, set nama menjadi "Anonymous"
        $author = $userId ? $this->commentModel->getUsernameById($userId) : "Anonymous";
        return $this->commentModel->create($postId, $content, $author, $userId);
    }

    // 3. Hapus komentar (hanya pemilik atau admin)
    public function deleteComment($commentId, $userId) {
        $comment = $this->commentModel->getById($commentId);
        if (!$comment || ($comment['user_id'] != $userId && $userId !== 1)) {
            return "Tidak diizinkan menghapus komentar ini!";
        }
        return $this->commentModel->delete($commentId);
    }
}
?>
