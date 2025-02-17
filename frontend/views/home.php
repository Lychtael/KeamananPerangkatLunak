<?php
session_start();

// Periksa apakah pengguna sudah login atau belum
if (!isset($_SESSION['user_id'])) {
    header("Location: frontend/views/login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Hello World!!!</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="css/home.css" />
  </head>
  <body>
    <div class="container py-5">
      <div class="row mb-5">
        <!-- Start kategori left -->
        <div class="col-lg-4 col-md-12 mb-4">
          <div class="nav-arrows">
            <span>←</span>
            <span class="arrow" style="color: #b76e79">→</span>
          </div>
          <div class="title-content">
            <p class="category-subtitle">Categories</p>
            <h2 class="category-title-1">Dive into</h2>
            <h2 class="category-title-2">Beauty</h2>
          </div>
        </div>
        <!-- End kategori left -->

        <!-- Start Kategori right -->
        <div class="col-lg-8 col-md-12">
          <div class="row g-3">
            <div class="col-lg-4 col-md-4">
              <a href="skincare.html">
                <div class="card">
                  <div class="card-body">
                    <div class="img-area mb-4">
                      <img src="img/skincare.png" class="img-fluid" alt="" />
                    </div>
                    <h3 class="card-title">
                      <a class="text" href="#">Skincare</a>
                      <a class="arrow-right" href="skincare.html">→</a>
                    </h3>
                  </div>
                </div>
              </a>
            </div>

            <div class="col-lg-4 col-md-4">
              <a href="haircare.html">
                <div class="card">
                  <div class="card-body">
                    <div class="img-area mb-4">
                      <img src="img/haircare.png" class="img-fluid" alt="" />
                    </div>
                    <h3 class="card-title">
                      <a class="text" href="#">Haircare</a>
                      <a class="arrow-right" href="haircare.html">→</a>
                    </h3>
                  </div>
                </div>
              </a>
            </div>

            <div class="col-lg-4 col-md-4">
              <a href="makeup.html">
                <div class="card">
                  <div class="card-body">
                    <div class="img-area mb-4">
                      <img src="img/makeup.png" class="img-fluid" alt="" />
                    </div>
                    <div class="card-title">
                      <a class="text" href="#">Makeup</a>
                      <a class="arrow-right" href="makeup.html">→</a>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
        </div>
        <!-- End   Kategori right -->
      </div>

      <hr />

      <!-- Start Trend Topik -->
      <div class="row align-items-center justify-content-between">
        <div class="col-lg-6">
          <p class="section-subtitle">trending topics</p>
          <h2 class="section-title">Stay Trendy with Our</h2>
          <h2 class="section-title">Latest Insights</h2>
        </div>
      </div>

      <div class="row mt-2">
        <div class="col-lg-4 col-md-6 mt-4">
          <a class="trending" href="article1.html">
            <div class="card-trend">
              <div class="trend-image">
                <img src="img/trend1.png" alt="Makeup Trends" />
              </div>
              <div class="card-trend-content">
                <h3 class="card-trend-title">
                  Seasonal Makeup Trends: Fall Edition
                </h3>
                <p>
                  Dive into the enchanting world of fall-inspired makeup trends.
                  From warm hues to bold lip colors, discover the latest beauty
                  trends that will elevate your autumn beauty routine.
                </p>
                <div class="card-trend-footer">
                  <p>Jane Doe <span>5min read</span></p>
                  <a href="article1.html" class="arrow-trend">→</a>
                </div>
              </div>
            </div>
          </a>
        </div>

        <div class="col-lg-4 col-md-6 mt-4">
          <a class="trending" href="article2.html">
            <div class="card-trend">
              <div class="trend-image">
                <img src="img/trend2.png" alt="Makeup Trends" />
              </div>
              <div class="card-trend-content">
                <h3 class="card-trend-title">
                  Reviewing the Latest Beauty Innovations in 2023
                </h3>
                <p>
                  Stay on the cutting edge of beauty with a comprehensive review
                  of the latest innovations in the industry. From skincare
                  breakthroughs to high-tech beauty gadgets, explore what's new
                  in 2023.
                </p>
                <div class="card-trend-footer">
                  <p>Jane Doe <span>5min read</span></p>
                  <a href="article2.html" class="arrow-trend">→</a>
                </div>
              </div>
            </div>
          </a>
        </div>

        <div class="col-lg-4 col-md-6 mt-4">
          <a class="trending" href="article3.html">
            <div class="card-trend">
              <div class="trend-image">
                <img src="img/trend3.png" alt="Makeup Trends" />
              </div>
              <div class="card-trend-content">
                <h3 class="card-trend-title">
                  Reader Spotlight: Transformation Stories
                </h3>
                <p>
                  Witness the incredible transformations of our valued
                  customers. Read real stories of beauty journeys, complete with
                  before-and-after photos, and be inspired by the power of
                  self-care.
                </p>
                <div class="card-trend-footer">
                  <p>Jane Doe <span>5min read</span></p>
                  <a href="article3.html" class="arrow-trend">→</a>
                </div>
              </div>
            </div>
          </a>
        </div>

        <div class="col-lg-4 col-md-6 mt-4">
          <a class="trending" href="article4.html">
            <div class="card-trend">
              <div class="trend-image">
                <img src="img/trend4.png" alt="Makeup Trends" />
              </div>
              <div class="card-trend-content">
                <h3 class="card-trend-title">
                  Inside BB: Product Development Journey
                </h3>
                <p>
                  Take an exclusive behind-the-scenes look at the creation of
                  beauty products. Learn about commitment to quality,
                  innovation, and the meticulous process that goes into each
                  product.
                </p>
                <div class="card-trend-footer">
                  <p>Jane Doe <span>5min read</span></p>
                  <a href="article4.html" class="arrow-trend">→</a>
                </div>
              </div>
            </div>
          </a>
        </div>

        <div class="col-lg-4 col-md-6 mt-4">
          <a class="trending" href="article5.html">
            <div class="card-trend">
              <div class="trend-image">
                <img src="img/trend5.png" alt="Makeup Trends" />
              </div>
              <div class="card-trend-content">
                <h3 class="card-trend-title">
                  Exclusive Interview with Jenna Milhouse @missyb
                </h3>
                <p>
                  Gain insights from a renowned beauty influencer or expert in
                  an exclusive interview. Discover their favorite beauty tips,
                  product recommendations, and the secrets behind their success
                  in the industry.
                </p>
                <div class="card-trend-footer">
                  <p>Jane Doe <span>5min read</span></p>
                  <a href="article5.html" class="arrow-trend">→</a>
                </div>
              </div>
            </div>
          </a>
        </div>

        <div class="col-lg-4 col-md-6 mt-4">
          <a class="trending" href="article6.html">
            <div class="card-trend">
              <div class="trend-image">
                <img src="img/trend6.png" alt="Makeup Trends" />
              </div>
              <div class="card-trend-content">
                <h3 class="card-trend-title">
                  Step-by-Step Guide: Achieving the Perfect Smokey Eye
                </h3>
                <p>
                  Witness the incredible transformations of our valued
                  customers. Read real stories of beauty journeys, complete with
                  before-and-after photos, and be inspired by the power of
                  self-care.
                </p>
                <div class="card-trend-footer">
                  <p>Jane Doe <span>5min read</span></p>
                  <a href="article6.html" class="arrow-trend">→</a>
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>
      <!-- End Trend Topik -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
