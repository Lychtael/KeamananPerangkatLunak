<?php
require_once '../config/database.php';
require_once '../models/Category.php';

class CategoryController {
    private $db;
    private $categoryModel;

    public function __construct() {
        $this->db = Database::connect();
        $this->categoryModel = new Category($this->db);
    }

    // 1. Ambil semua kategori
    public function getAllCategories() {
        return $this->categoryModel->getAll();
    }

    // 2. Tambah kategori baru (hanya admin)
    public function createCategory($name, $userId) {
        if ($userId !== 1) {
            return "Hanya admin yang dapat menambahkan kategori!";
        }
        return $this->categoryModel->create($name);
    }

    // 3. Hapus kategori (hanya admin)
    public function deleteCategory($categoryId, $userId) {
        if ($userId !== 1) {
            return "Hanya admin yang dapat menghapus kategori!";
        }
        return $this->categoryModel->delete($categoryId);
    }
}
?>
