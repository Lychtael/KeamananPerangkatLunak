<?php
require_once '../config/database.php';
require_once '../models/Post.php';

class PostController {
    private $db;
    private $postModel;

    public function __construct() {
        $this->db = Database::connect();
        $this->postModel = new Post($this->db);
    }

    // 1. Ambil semua postingan
    public function getAllPosts() {
        return $this->postModel->getAll();
    }

    // 2. Ambil detail postingan berdasarkan ID
    public function getPostById($id) {
        return $this->postModel->getById($id);
    }

    // 3. Tambah postingan (hanya user login)
    public function createPost($title, $content, $userId, $categoryId) {
        if (empty($title) || empty($content)) {
            return "Judul dan konten harus diisi!";
        }
        return $this->postModel->create($title, $content, $userId, $categoryId);
    }

    // 4. Edit postingan (hanya pemilik postingan)
    public function updatePost($id, $title, $content, $userId, $categoryId) {
        $post = $this->postModel->getById($id);
        if (!$post || $post['user_id'] != $userId) {
            return "Tidak diizinkan mengedit postingan ini!";
        }
        return $this->postModel->update($id, $title, $content, $categoryId);
    }

    // 5. Hapus postingan (hanya pemilik postingan)
    public function deletePost($id, $userId) {
        $post = $this->postModel->getById($id);
        if (!$post || $post['user_id'] != $userId) {
            return "Tidak diizinkan menghapus postingan ini!";
        }
        return $this->postModel->delete($id);
    }
}
