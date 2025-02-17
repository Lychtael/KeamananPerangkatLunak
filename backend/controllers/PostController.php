<?php
require_once 'models/Post.php';

class PostController
{
    private $postModel;

    public function __construct()
    {
        $this->postModel = new Post();
    }

    // Display all posts
    public function index()
    {
        $posts = $this->postModel->getAllPosts();
        require 'views/posts/index.php';
    }

    // Show a single post
    public function show($id)
    {
        $post = $this->postModel->getPostById($id);
        if (!$post) {
            die("Post not found.");
        }
        require 'views/posts/show.php';
    }

    // Show form to create a post
    public function create()
    {
        require 'views/posts/create.php';
    }

    // Store a new post
    public function store()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $title = trim($_POST['title']);
            $content = trim($_POST['content']);
            $keywords = trim($_POST['keywords']);
            $author_id = $_SESSION['user_id'];
    
            // Validate fields
            if (empty($title) || empty($content)) {
                die("Title and content cannot be empty.");
            }
    
            // Handle image upload
            $imagePath = null;
            if (!empty($_FILES["image"]["name"])) {
                $targetDir = "uploads/";
                $imageName = time() . "_" . basename($_FILES["image"]["name"]);
                $targetFile = $targetDir . $imageName;
                $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    
                // Validate file type
                $allowedTypes = ['jpg', 'jpeg', 'png'];
                if (!in_array($imageFileType, $allowedTypes)) {
                    die("Invalid image format. Allowed: JPG, JPEG, PNG.");
                }
    
                // Move uploaded file
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
                    $imagePath = $imageName;
                } else {
                    die("Image upload failed.");
                }
            }
    
            // Insert post into database
            $this->postModel->addPost($title, $content, $author_id, $imagePath, $keywords);
    
            header("Location: index.php?controller=post&action=index");
            exit();
        }
    }
    

    // Show form to edit a post
    public function edit($id)
    {
        $post = $this->postModel->getPostById($id);
        if (!$post) {
            die("Post not found.");
        }
        require 'views/posts/edit.php';
    }

    // Update an existing post
    public function update($id)
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $title = trim($_POST['title']);
            $content = trim($_POST['content']);

            if (empty($title) || empty($content)) {
                die("Title and content cannot be empty.");
            }

            $this->postModel->updatePost($id, $title, $content);
            header("Location: index.php?controller=post&action=index");
            exit();
        }
    }

    // Delete a post
    public function destroy($id)
    {
        $this->postModel->deletePost($id);
        header("Location: index.php?controller=post&action=index");
        exit();
    }
}
