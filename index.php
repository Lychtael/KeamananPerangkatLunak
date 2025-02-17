<?php
session_start();

// Periksa apakah pengguna sudah login atau belum
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Beauty Website</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap"
    rel="stylesheet">
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
    crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
  <style>
    /* General Styles */
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f0f0f0;
      /* Warna background */
      color: #343a40;
      line-height: 1.6;
    }

    /* Header and Navigation */
    header {
      background-color: #fff;
      box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.08);
      padding: 1rem 0;
    }

    .navbar-brand {
      font-size: 1.5rem;
      font-weight: 600;
    }

    .navbar-nav .nav-link {
      color: #495057;
      padding: 0.75rem 1.25rem;
      font-size: 0.9rem;
    }

    .navbar-nav .nav-link:hover {
      color: #000;
    }

    .btn-outline-secondary {
      color: #6c757d;
      border-color: #6c757d;
      font-size: 0.9rem;
      padding: 0.5rem 1rem;
      border-radius: 0.2rem;
      transition: all 0.2s ease-in-out;
    }

    .btn-outline-secondary:hover {
      background-color: #6c757d;
      color: #fff;
    }

    /* Featured Section */
    .featured {
      padding: 5rem 0;
    }

    .featured small {
      color: #999;
      font-size: 0.8rem;
      text-transform: uppercase;
      letter-spacing: 0.1em;
      display: block;
      margin-bottom: 0.75rem;
    }

    .featured h1 {
      font-size: 3.2rem;
      font-weight: 700;
      line-height: 1.2;
      margin-bottom: 1.75rem;
    }

    .featured p {
      font-size: 1.1rem;
      color: #555;
      line-height: 1.7;
    }

    .btn-primary {
      background-color: #f06292;
      border-color: #f06292;
      padding: 0.75rem 1.75rem;
      font-size: 1rem;
      border-radius: 0.25rem;
      transition: all 0.2s ease;
    }

    .btn-primary:hover {
      background-color: #e91e63;
      border-color: #e91e63;
    }

    /* Categories Section */
    .categories {
      padding: 4rem 0;
    }

    .categories h2 {
      font-size: 2.5rem;
      font-weight: 600;
      margin-bottom: 1rem;
    }

    .categories .btn-outline-secondary {
      font-size: 0.9rem;
      padding: 0.6rem 1.2rem;
      border-radius: 0.25rem;
    }

    .category-card {
      border: none;
      box-shadow: 0 0.15rem 0.4rem rgba(0, 0, 0, 0.09);
      transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
      border-radius: 0.4rem;
      overflow: hidden;
    }

    .category-card:hover {
      transform: translateY(-0.3rem);
      box-shadow: 0 0.6rem 1.2rem rgba(0, 0, 0, 0.12);
    }

    .category-card img {
      border-radius: 0.4rem 0.4rem 0 0;
      object-fit: cover;
      width: 100%;
      height: 220px;
    }

    .category-card-body {
      padding: 1.5rem;
    }

    .category-card-title {
      font-size: 1.2rem;
      font-weight: 500;
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 0;
      color: #333;
    }

    .category-card .arrow {
      color: #777;
      font-size: 1.1rem;
    }

    /* Trending Section */
    .trending {
      background-color: #f8f9fa;
      padding: 4rem 0;
    }

    .trending-title {
      margin-bottom: 0.5rem;
    }

    .trending small {
      color: #999;
      font-size: 0.8rem;
      text-transform: uppercase;
      letter-spacing: 0.1em;
      display: block;
      margin-bottom: 0.25rem;
    }

    .trending h2 {
      font-size: 2.2rem;
      font-weight: 600;
    }

    .trending .btn-outline-secondary {
      font-size: 0.85rem;
      padding: 0.5rem 1rem;
      border-radius: 0.2rem;
    }

    .trending-card {
      border: none;
      box-shadow: 0 0.15rem 0.4rem rgba(0, 0, 0, 0.09);
      transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
      border-radius: 0.4rem;
      overflow: hidden;
      display: flex;
      flex-direction: column;
      height: 100%;
    }

    .trending-card:hover {
      transform: translateY(-0.3rem);
      box-shadow: 0 0.6rem 1.2rem rgba(0, 0, 0, 0.12);
    }

    .trending-card img {
      border-radius: 0.4rem 0.4rem 0 0;
      object-fit: cover;
      width: 100%;
      height: 200px;
    }

    .trending-card .card-body {
      padding: 1.5rem;
      flex-grow: 1;
    }

    .trending-card .card-title {
      font-size: 1.1rem;
      font-weight: 500;
      margin-bottom: 0.75rem;
      color: #333;
    }

    .trending-card .card-text {
      font-size: 0.9rem;
      color: #555;
    }

    .trending-card .card-footer {
      background-color: transparent;
      border-top: none;
      padding: 0 1.5rem 1.5rem 1.5rem;
      display: flex;
      align-items: center;
      justify-content: space-between;
      font-size: 0.75rem;
    }

    .trending-card .card-footer small {
      color: #777;
    }

    .trending-card .card-footer .arrow {
      color: #777;
      font-size: 1rem;
    }

    /* Featured Videos Section */
    .featured-videos {
      padding: 4rem 0;
      background-color: #f8f9fa;
      /* Adjust background color */
    }

    .featured-videos small {
      color: #999;
      font-size: 0.8rem;
      text-transform: uppercase;
      letter-spacing: 0.1em;
      display: block;
      margin-bottom: 0.25rem;
    }

    .featured-videos h2 {
      font-size: 2.2rem;
      font-weight: 600;
      margin-bottom: 1rem;
      /* Increased margin */
    }

    .featured-videos .video-container {
      position: relative;
      width: 100%;
      padding-bottom: 56.25%;
      /* 16:9 aspect ratio */
      height: 0;
      overflow: hidden;
      border-radius: 0.4rem;
      box-shadow: 0 0.15rem 0.4rem rgba(0, 0, 0, 0.09);
    }

    .featured-videos .video-container iframe {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
    }

    .featured-videos .video-list {
      margin-top: 2rem;
    }

    .featured-videos .video-list-item {
      padding: 1rem;
      border-radius: 0.4rem;
      background-color: #fff;
      box-shadow: 0 0.15rem 0.4rem rgba(0, 0, 0, 0.09);
      margin-bottom: 1rem;
      transition: all 0.2s ease-in-out;
      display: flex;
      justify-content: space-between;
      align-items: center;
      font-size: 0.9rem;
      /* Adjust font size */
      color: #444;
      /* Darker text color */
    }

    .featured-videos .video-list-item:hover {
      transform: translateY(-0.2rem);
      box-shadow: 0 0.3rem 0.6rem rgba(0, 0, 0, 0.12);
    }

    .featured-videos .video-list-item span {
      color: #777;
      font-size: 0.8rem;
      margin-left: 0.5rem;
      /* Add some spacing */
    }

    .featured-videos .video-list-item .arrow {
      color: #777;
      font-size: 1rem;
    }

    /* Testimonials Section */
    .testimonials {
      padding: 4rem 0;
      background-color: #f8f9fa;
      /* Same background color */
    }

    .testimonials h2 {
      font-size: 2.2rem;
      font-weight: 600;
      margin-bottom: 2rem;
      /* More space below title */
    }

    .testimonial-card {
      background-color: #fff;
      border: none;
      border-radius: 0.4rem;
      box-shadow: 0 0.15rem 0.4rem rgba(0, 0, 0, 0.09);
      padding: 2rem;
      /* Increase padding */
    }

    .testimonial-card .stars {
      color: #ffc107;
      /* Yellow color for stars */
      margin-bottom: 1rem;
      /* Space below stars */
    }

    .testimonial-card .testimonial-text {
      font-style: italic;
      color: #555;
      margin-bottom: 1.5rem;
      /* More space below text */
      font-size: 1.05rem;
      line-height: 1.7;
    }

    .testimonial-card .author {
      font-weight: 600;
      color: #333;
    }

    /* Subscription Section */
    .subscription {
      background-color: #f8f9fa;
      /* Adjust Background Color */
      padding: 5rem 0;
      /* Increase Padding */
    }

    .subscription-form {
      background-color: #fff;
      padding: 3rem;
      /* Increase Padding */
      border-radius: 0.4rem;
      box-shadow: 0 0.15rem 0.4rem rgba(0, 0, 0, 0.09);
    }

    .subscription small {
      color: #999;
      font-size: 0.8rem;
      text-transform: uppercase;
      letter-spacing: 0.1em;
      display: block;
      margin-bottom: 0.5rem;
      /* Adjust Spacing */
    }

    .subscription h2 {
      font-size: 2.5rem;
      /* Larger Font Size */
      font-weight: 600;
      margin-bottom: 1.5rem;
      /* More Spacing */
      line-height: 1.2;
    }

    .subscription p {
      color: #555;
      font-size: 1.1rem;
      margin-bottom: 3rem;
      /* More Spacing */
      line-height: 1.7;
    }

    .subscription .form-control {
      border-radius: 0.2rem;
      padding: 0.75rem;
      /* Adjust Padding */
    }

    .subscription .btn-primary {
      background-color: #f06292;
      border-color: #f06292;
      padding: 0.75rem 1.75rem;
      font-size: 1rem;
      border-radius: 0.2rem;
      transition: all 0.2s ease;
    }

    .subscription .btn-primary:hover {
      background-color: #e91e63;
      border-color: #e91e63;
    }

    .subscription-social {
      margin-top: 3rem;
      /* Increase Spacing */
      text-align: center;
    }

    .subscription-social a {
      color: #555;
      font-size: 1.5rem;
      margin: 0 1rem;
      /* Adjust Spacing */
      transition: color 0.2s ease-in-out;
      /* Smooth Transition */
    }

    .subscription-social a:hover {
      color: #333;
    }

    /* Footer */
    footer {
      background-color: #343a40;
      color: #fff;
      padding: 3rem 0;
      /* Increase Padding */
      text-align: center;
      font-size: 0.9rem;
    }

    /* Media Queries */
    @media (max-width: 768px) {
      .featured h1 {
        font-size: 2.8rem;
      }

      .featured p {
        font-size: 1rem;
      }

      .category-card img,
      .trending-card img {
        height: 180px;
      }

      .trending h2 {
        font-size: 2rem;
      }

      .subscription h2 {
        font-size: 1.8rem;
      }

      .subscription p {
        font-size: 1rem;
      }
    }

    .footer-socials a {
      margin: 0 0.5rem;
      color: #fff;
    }

    /* New Article Form Styles */
    .new-article-container {
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      width: 80%;
      max-width: 600px;
      margin: 0 auto;
      /* Center the form */
    }

    .new-article-container h1 {
      text-align: center;
      margin-bottom: 20px;
    }

    .new-article-container .upload-area {
      border: 2px dashed #ccc;
      padding: 20px;
      text-align: center;
      margin-bottom: 20px;
      cursor: pointer;
      background-color: #f8f9fa;
      /* Warna seperti gambar */
      position: relative;
      /* For positioning the loader */
    }

    .new-article-container .upload-area input[type="file"] {
      display: none;
    }

    .new-article-container .upload-area img {
      max-width: 100%;
      /* Make image responsive */
      max-height: 150px;
      /* Limit image height */
      margin-bottom: 10px;
      /* Add space below image */
    }

    .new-article-container .upload-area .loader {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      border: 5px solid #f3f3f3;
      border-top: 5px solid #3498db;
      border-radius: 50%;
      width: 40px;
      height: 40px;
      animation: spin 2s linear infinite;
      display: none;
      /* Initially hidden */
    }

    @keyframes spin {
      0% {
        transform: translate(-50%, -50%) rotate(0deg);
      }

      100% {
        transform: translate(-50%, -50%) rotate(360deg);
      }
    }

    .new-article-container .input-group {
      margin-bottom: 15px;
    }

    .new-article-container .input-group label {
      display: block;
      margin-bottom: 5px;
    }

    .new-article-container .input-group input[type="text"],
    .new-article-container .input-group textarea {
      width: 100%;
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }

    .new-article-container .input-group textarea {
      resize: vertical;
    }

    .new-article-container button {
      background-color: #f06292;
      /* Samakan dengan .btn-primary */
      border-color: #f06292;
      /* Samakan dengan .btn-primary */
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      width: 100%;
      transition: all 0.2s ease;
    }

    .new-article-container button:hover {
      background-color: #e91e63;
      /* Samakan dengan .btn-primary:hover */
      border-color: #e91e63;
      /* Samakan dengan .btn-primary:hover */
    }

    .new-article-container .upload-icon {
      font-size: 40px;
      color: #888;
      margin-bottom: 10px;
    }

    #uploadResponse {
      text-align: center;
      margin-top: 10px;
      font-style: italic;
      color: #555;
    }

    .remove-image {
      position: absolute;
      top: 5px;
      right: 5px;
      background-color: rgba(0, 0, 0, 0.5);
      color: white;
      border-radius: 50%;
      width: 20px;
      height: 20px;
      text-align: center;
      line-height: 20px;
      font-size: 14px;
      cursor: pointer;
      display: none;
    }

    .upload-area:hover .remove-image {
      display: block;
    }
  </style>
</head>

<body>

  <header class="bg-light py-3">
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand fw-bold" href="#">Beauty</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
          data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
          aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link" href="#">Featured</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">How-To</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Expert Advice</a>
            </li>
          </ul>
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
            <li class="nav-item">
  <a class="nav-link btn btn-outline-secondary" href="#" id="logoutBtn">Logout</a>
</li>

          </ul>
        </div>
      </nav>
    </div>
  </header>

  <main class="container py-5">

    <section class="featured">
      <div class="row">
        <div class="col-md-6">
          <small class="text-muted fw-bold">FEATURED</small>
          <h1 class="fw-bold">10 Must-Have Skincare Products for Radiant Skin</h1>
          <p class="text-secondary">Explore the essential skincare products that can transform your
            daily
            routine.
            From hydrating serums
            to powerful antioxidants, discover the secrets to achieving radiant and healthy skin.
          </p>
          <a href="#" class="btn btn-primary">Read More</a>
        </div>
        <div class="col-md-6">
          <img src="img/featured.jpeg" alt="Featured Image" class="img-fluid rounded">
        </div>
      </div>
    </section>

    <section class="categories">
      <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Dive into Beauty</h2>
        <a href="#" class="btn btn-outline-secondary btn-sm">See More</a>
      </div>

      <div class="row">
        <div class="col-md-4">
          <div class="card category-card">
            <img src="img/skincare.jpeg" class="card-img-top" alt="Skincare">
            <div class="card-body">
              <h5 class="card-title">Skincare
                <span class="arrow">→</span>
              </h5>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card category-card">
            <img src="img/haircare.jpeg" class="card-img-top" alt="Haircare">
            <div class="card-body">
              <h5 class="card-title">Haircare
                <span class="arrow">→</span>
              </h5>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card category-card">
            <img src="img/makeup.jpeg" class="card-img-top" alt="Makeup">
            <div class="card-body">
              <h5 class="card-title">Makeup
                <span class="arrow">→</span>
              </h5>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="trending">
      <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
          <div class="trending-title">
            <small class="text-muted fw-bold">TRENDING TOPICS</small>
            <h2 class="fw-bold">Stay Trendy with Our Latest Insights</h2>
          </div>
          <a href="#" class="btn btn-outline-secondary btn-sm">See More</a>
        </div>

        <div class="row">
          <div class="col-md-4 mb-4">
            <div class="card h-100 trending-card">
              <img src="img/seasonal-makeup.jpeg" class="card-img-top" alt="Seasonal Makeup Trends">
              <div class="card-body">
                <h5 class="card-title">Seasonal Makeup Trends: Fall Edition</h5>
                <p class="card-text text-secondary">Dive into the enchanting world of fall-inspired
                  makeup trends.
                  From warm hues to bold lip colors, discover the latest beauty trends that will
                  elevate
                  your
                  autumn beauty routine.</p>
              </div>
              <div class="card-footer">
                <small class="text-muted">Jane Doe</small>
                <small class="text-muted ms-2">5min read</small>
                <span class="arrow">→</span>
              </div>
            </div>
          </div>

          <div class="col-md-4 mb-4">
            <div class="card h-100 trending-card">
              <img src="img/beauty-innovations.jpeg" class="card-img-top"
                alt="Beauty Innovations 2023">
              <div class="card-body">
                <h5 class="card-title">Reviewing the Latest Beauty Innovations in 2023</h5>
                <p class="card-text text-secondary">Stay on the cutting edge of beauty with a
                  comprehensive
                  review of the latest innovations in the industry. From skincare breakthroughs to
                  high-tech
                  beauty gadgets, explore what's new in 2023.</p>
              </div>
              <div class="card-footer">
                <small class="text-muted">Jane Doe</small>
                <small class="text-muted ms-2">5min read</small>
                <span class="arrow">→</span>
              </div>
            </div>
          </div>

          <div class="col-md-4 mb-4">
            <div class="card h-100 trending-card">
              <img src="img/transformation-stories.jpeg" class="card-img-top"
                alt="Transformation Stories">
              <div class="card-body">
                <h5 class="card-title">Reader Spotlight: Transformation Stories</h5>
                <p class="card-text text-secondary">Witness the incredible transformations of our valued
                  customers.
                  Read real stories of beauty journeys, complete with before-and-after photos, and be
                  inspired by
                  the power of self-care.</p>
              </div>
              <div class="card-footer">
                <small class="text-muted">Jane Doe</small>
                <small class="text-muted ms-2">5min read</small>
                <span class="arrow">→</span>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-4">
            <div class="card h-100 trending-card">
              <img src="img/product-development.jpeg" class="card-img-top"
                alt="Product Development Journey">
              <div class="card-body">
                <h5 class="card-title">Inside BB: Product Development Journey</h5>
                <p class="card-text text-secondary">Take an exclusive behind-the-scenes look at the
                  creation of
                  beauty products. Learn about commitment to quality, innovation, and the meticulous
                  process
                  that
                  goes into each product.</p>
              </div>
              <div class="card-footer">
                <small class="text-muted">Jane Doe</small>
                <small class="text-muted ms-2">5min read</small>
                <span class="arrow">→</span>
              </div>
            </div>
          </div>

          <div class="col-md-4 mb-4">
            <div class="card h-100 trending-card">
              <img src="img/exclusive-interview.jpeg" class="card-img-top"
                alt="Exclusive Interview">
              <div class="card-body">
                <h5 class="card-title">Exclusive Interview with Jenna Milhouse @missyb</h5>
                <p class="card-text text-secondary">Gain insights from a renowned beauty influencer or
                  expert in an
                  exclusive interview. Discover their favorite beauty tips, product recommendations,
                  and
                  the
                  secrets
                  behind their success in the industry.</p>
              </div>
              <div class="card-footer">
                <small class="text-muted">Jane Doe</small>
                <small class="text-muted ms-2">5min read</small>
                <span class="arrow">→</span>
              </div>
            </div>
          </div>

          <div class="col-md-4 mb-4">
            <div class="card h-100 trending-card">
              <img src="img/perfect-smokey-eye.jpeg" class="card-img-top" alt="Perfect Smokey Eye">
              <div class="card-body">
                <h5 class="card-title">Step-by-Step Guide: Achieving the Perfect Smokey Eye</h5>
                <p class="card-text text-secondary">Witness the incredible stories of beauty journeys,
                  complete with
                  before-and-after photos, and be inspired by the power of self-care.</p>
              </div>
              <div class="card-footer">
                <small class="text-muted">Jane Doe</small>
                <small class="text-muted ms-2">5min read</small>
                <span class="arrow">→</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Featured Videos Section -->
    <section class="featured-videos py-5">
      <div class="container">
        <small class="text-muted fw-bold">ADVICE</small>
        <h2 class="fw-bold">Featured Videos</h2>

        <div class="row">
          <div class="col-md-8">
            <div class="video-container">
              <iframe src="https://www.youtube.com/embed/your-video-id" title="YouTube video player"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen></iframe>
            </div>
          </div>
          <div class="col-md-4">
            <div class="video-list">
              <div class="video-list-item">
                <div>Reader Spotlight: Transformation Stories</div>
                <span>Advice</span>
                <span>15:48</span>
                <span class="arrow">→</span>
              </div>
              <div class="video-list-item">
                <div>Guest Expert Takeover: Interactive Beauty Experiences</div>
                <span>Experts</span>
                <span>15:48</span>
                <span class="arrow">→</span>
              </div>
              <div class="video-list-item">
                <div>Step-by-Step Guide: Achieving the Perfect Smokey Eye</div>
                <span>Tutorial</span>
                <span>15:48</span>
                <span class="arrow">→</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Testimonials Section -->
    <section class="testimonials py-5">
      <div class="container">
        <h2 class="fw-bold text-center">Testimonials</h2>
        <div class="row">
          <div class="col-md-3 mb-4">
            <div class="card testimonial-card">
              <div class="stars">
                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                  class="fas fa-star"></i><i class="fas fa-star"></i>
              </div>
              <p class="testimonial-text">"I've tried countless skincare brands, but this one truly
                stands out! My skin has never felt this hydrated and smooth. Highly recommend!"</p>
              <p class="author">Emily Richards</p>
            </div>
          </div>
          <div class="col-md-3 mb-4">
            <div class="card testimonial-card">
              <div class="stars">
                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                  class="fas fa-star"></i><i class="fas fa-star"></i>
              </div>
              <p class="testimonial-text">"Absolutely love these products! My complexion looks brighter,
                and my skin feels so soft without any irritation."</p>
              <p class="author">James Walker</p>
            </div>
          </div>
          <div class="col-md-3 mb-4">
            <div class="card testimonial-card">
              <div class="stars">
                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                  class="fas fa-star"></i><i class="fas fa-star"></i>
              </div>
              <p class="testimonial-text">"As someone with sensitive skin, I was hesitant to try new
                products, but this brand is a game-changer! Gentle yet effective!"</p>
              <p class="author">Sophia Adams</p>
            </div>
          </div>
          <div class="col-md-3 mb-4">
            <div class="card testimonial-card">
              <div class="stars">
                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                  class="fas fa-star"></i><i class="fas fa-star"></i>
              </div>
              <p class="testimonial-text">"I ve tried countless skincare brands, but this one truly
                stands out! My skin has never felt this hydrated and smooth. Highly recommend!"</p>
              <p class="author">Emily Richards</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- New Article Form Section -->
    <section class="py-5">
      <div class="container new-article-container">
        <h1>New Article</h1>
        <div class="upload-area" onclick="document.getElementById('imageUpload').click();">
          <img id="imagePreview" src="#" alt="Image Preview" style="display: none;">
          <i class="fas fa-cloud-upload-alt upload-icon" id="uploadIcon"></i>
          <div class="loader" id="loadingIndicator"></div>
          <p><b id="uploadText">Upload Image</b></p>
          <div class="remove-image" onclick="removeImage()">×</div>
          <p>Supported Formats: JPG, PNG, JPEG</p>
          <input type="file" id="imageUpload" accept="image/jpeg, image/png">
        </div>
        <div class="input-group">
          <label for="title">Title</label>
          <input type="text" id="title" name="title">
        </div>
        <div class="input-group">
          <label for="author">Author</label>
          <input type="text" id="author" name="author">
        </div>
        <div class="input-group">
          <label for="content">Article Content</label>
          <textarea id="content" name="content" rows="5"></textarea>
        </div>
        <div class="input-group">
          <label for="keywords">Keywords</label>
          <input type="text" id="keywords" name="keywords">
        </div>
        <button type="submit" id="publishButton">Publish</button>
        <div id="uploadResponse"></div>
      </div>
    </section>

  </main>

  <section class="subscription py-5">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6">
          <div class="subscription-form">
            <small class="text-muted fw-bold">SUBSCRIPTION</small>
            <h2 class="fw-bold">Join our exclusive beauty community</h2>
            <p class="text-secondary">Elevate your beauty journey with personalized recommendations and stay
              connected with a community that shares your passion for self-care. Subscribe now and embark
              on
              a
              beauty adventure with us!</p>
            <form>
              <div class="mb-3">
                <input type="email" class="form-control" id="emailAddress"
                  placeholder="Email Address">
              </div>
              <button type="submit" class="btn btn-primary">Subscribe</button>
            </form>
          </div>
        </div>
        <div class="col-md-6">
          <img src="img/subscription.jpeg" alt="Subscription Image" class="img-fluid rounded">
        </div>
      </div>
    </div>
  </section>

  <footer class="bg-dark text-white py-4">
    <div class="container text-center">
      <div class="subscription-social">
        <a href="#"><i class="fab fa-facebook"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
        <a href="#"><i class="fab fa-youtube"></i></a>
      </div>
      <p>©
        <?php echo date('Y'); ?> Beauty Website. All rights reserved.</p>
    </div>
  </footer>

  <script>
    let uploadHandled = false;
    let fileChosen = false; // Flag to prevent multiple clicks

    // Simulate click on upload area, only run once
    document.querySelector('.upload-area').addEventListener('click', function(event) {
      if (!fileChosen) {
        document.getElementById('imageUpload').click();
        fileChosen = true; // Disable future clicks
        event.preventDefault(); // Prevent any further actions
      }

    });

    document.getElementById("logoutBtn").addEventListener("click", async function(e) {
    e.preventDefault(); // Mencegah halaman untuk reload

    // Hapus cookie atau sesi yang berkaitan dengan login (misalnya 'Bearer')
    document.cookie = "Bearer=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;"; // Hapus cookie 'Bearer'
    
    // Arahkan pengguna ke halaman logout atau login
    window.location.href = "login.php"; // Ganti dengan URL yang sesuai dengan aplikasi Anda
});

    document.getElementById('imageUpload').addEventListener('change', function(event) {

      if (uploadHandled) {
        return;
      }
      uploadHandled = true; // Set the flag to prevent further execution

      const file = event.target.files[0];
      const uploadResponseDiv = document.getElementById('uploadResponse');
      const uploadIcon = document.getElementById('uploadIcon');
      const loadingIndicator = document.getElementById('loadingIndicator');
      const imagePreview = document.getElementById('imagePreview');
      const uploadText = document.getElementById('uploadText');
      const removeButton = document.querySelector('.remove-image');

      if (file) {
        //Show the loader and hide the image preview and icon
        uploadIcon.style.display = "none";
        loadingIndicator.style.display = "block";
        imagePreview.style.display = "none";
        uploadText.style.display = "none";
        removeButton.style.display = "none";

        //Read the image and show a preview
        const reader = new FileReader();

        reader.onload = function(e) {
          imagePreview.src = e.target.result; //Set the image source to the read data
          imagePreview.style.display = "block"; // Show the image
          uploadIcon.style.display = "none"; // Hide the upload icon
          uploadText.style.display = "none"; // Hide the upload text
          removeButton.style.display = "block";

          //Simulate upload success after 2 second
          setTimeout(() => {
            loadingIndicator.style.display = "none"; //Hide the loader
            uploadResponseDiv.textContent = "Upload completed!"; //Show text
          }, 2000);
        }
        reader.readAsDataURL(file); // trigger the file read

        console.log('Selected file:', file.name);
      } else {
        //Hide the image and loader when cancelled
        loadingIndicator.style.display = "none";
        imagePreview.style.display = "none";
        uploadIcon.style.display = "block"; // Show the upload icon
        uploadText.style.display = "block"; // Show the upload text
        uploadResponseDiv.textContent = ""; //Clear Uploaded Message
        removeButton.style.display = "none";
      }
    });

    //Get primary button style
    const primaryButton = document.querySelector('.btn-primary');

    //Get publish button element
    const publishButton = document.querySelector('#publishButton');

    //Check if primatyButton and publishButton exist
    if (primaryButton && publishButton) {
      //Copy style from primaryButton to publishButton
      publishButton.style.backgroundColor = primaryButton.style.backgroundColor;
      publishButton.style.borderColor = primaryButton.style.borderColor;
      publishButton.style.color = 'white'; // Ensure text color is white
    }
    // Remove image function
    function removeImage() {
      const imagePreview = document.getElementById('imagePreview');
      const uploadIcon = document.getElementById('uploadIcon');
      const uploadText = document.getElementById('uploadText');
      const removeButton = document.querySelector('.remove-image');
      const uploadResponseDiv = document.getElementById('uploadResponse');

      imagePreview.src = "#"; // Reset image source
      imagePreview.style.display = "none"; // Hide image
      uploadIcon.style.display = "block"; // Show upload icon
      uploadText.style.display = "block"; // Show upload text
      removeButton.style.display = "none"; // Hide remove button
      uploadResponseDiv.textContent = ""; // Clear upload message

      uploadHandled = false; // Enable a future upload
      fileChosen = false; // Enable future click of upload area

    }
  </script>
  <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>