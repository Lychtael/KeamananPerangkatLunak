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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beauty Innovations 2023</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/article.css">
</head>
<body>

    <div class="container my-5">
        <div class="row text-center">
            <div class="col-lg-8 mx-auto">
                <p class="tema">Featured</p>
                <h2 class="title">Inside BB: Product Development Journey<h2>
                <p class="paragraph">
                  Take an exclusive behind-the-scenes look at the creation of beauty products. Learn about commitment to quality, innovation, and the meticulous process that goes into each product.
                </p>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-12 mx-auto">
                <img src="img/trend4.png" width="100%" alt="">
            </div>
        </div>

        <div class="row mt-5">
          <div class="col-lg-8 mx-auto">
            <div class="content-title">
              <p class="section-title">Behind every beauty product is a journey of creativity, innovation, and dedication. At BB, the product development process is more than just creating makeup and skincare—it’s about crafting high-quality, effective, and inspiring products that cater to diverse beauty needs. In this edition, we take you behind the scenes of how a BB product comes to life, from initial concept to the final product that reaches your hands.</p>
              <h2>From Concept to Creation</h2>
              <p class="title-p">Every great product starts with an idea. The development team at BB constantly researches beauty trends, customer needs, and skincare innovations to identify gaps in the market. Whether it's a long-lasting foundation, a hydrating lip balm, or a multi-use highlighter, the goal is to create products that enhance beauty routines while solving everyday challenges. Extensive brainstorming, trend analysis, and expert consultations ensure that each concept is both innovative and practical.</p>
              <h2>The Science of Formulation</h2>
              <p class="title-p">Once a concept is finalized, the next step is formulation. BB’s team of chemists and skincare experts carefully select high-quality ingredients that not only deliver great results but are also safe for all skin types. Each formulation undergoes multiple rounds of testing, ensuring the right texture, pigmentation, and longevity. Whether it’s achieving the perfect lightweight foundation or a creamy, blendable eyeshadow, the formulation process is crucial in bringing BB’s vision to life.</p>
            </div>
            <div class="img-content">
              <img src="img/article2-content.png" width="100%" alt="">
            </div>

            <div class="hero mt-4">
              <h2>Bringing the Product to You</h2>
              <p class="title-m">After months of research, development, and refinement, the final product is ready to be launched. BB’s marketing and creative teams work together to bring the product to life through engaging campaigns, tutorials, and community engagement. Once it hits the market, customer feedback continues to shape future innovations, making each product a step forward in BB’s commitment to beauty excellence.</p>
              <p class="title-m">At BB, product development is more than just creating cosmetics—it’s about innovation, quality, and the confidence that comes with every product. Stay tuned for more exciting launches and behind-the-scenes insights into the world of BB beauty!</p>
            </div>
          </div>
        </div>

        <hr>
      <!-- start trending topics -->
        <div class="row mt-5 align-items-center justify-content-between">
          <div class="col-lg-6">
            <p class="section-subtitle">trending topics</p>
            <h2 class="section-title">Stay Trendy with Our</h2>
            <h2 class="section-title">Latest Insights</h2>
          </div>
        </div>

        <div class="row mt-2">
          <div class="col-lg-4 col-md-6 mt-4">
            <a class="trending" href="article4.html">
              <div class="card-trend">
                <div class="trend-image">
                    <img src="img/trend4.png" alt="Makeup Trends">
                </div>
                <div class="card-trend-content">
                  <h3 class="card-trend-title">Inside BB: Product Development Journey</h3>
                  <p>Take an exclusive behind-the-scenes look at the creation of beauty products. Learn about commitment to quality, innovation, and the meticulous process that goes into each product.</p>
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
                    <img src="img/trend5.png" alt="Makeup Trends">
                </div>
                <div class="card-trend-content">
                  <h3 class="card-trend-title">Exclusive Interview with Jenna Milhouse @missyb</h3>
                  <p>Gain insights from a renowned beauty influencer or expert in an exclusive interview. Discover their favorite beauty tips, product recommendations, and the secrets behind their success in the industry.</p>
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
                    <img src="img/trend6.png" alt="Makeup Trends">
                </div>
                <div class="card-trend-content">
                  <h3 class="card-trend-title">Step-by-Step Guide: Achieving the Perfect Smokey Eye</h3>
                  <p>Witness the incredible transformations of our valued customers. Read real stories of beauty journeys, complete with before-and-after photos, and be inspired by the power of self-care.</p>
                  <div class="card-trend-footer">
                    <p>Jane Doe <span>5min read</span></p>
                    <a href="article6.html" class="arrow-trend">→</a>
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>
      <!-- End trending topics -->

        <hr class="mt-5">


      <!-- start subscription -->
        <div class="subscription-container row align-items-center mb-5">
          <div class="col-md-6">
              <div class="subscription-text">
                  <h6 class="subscription-title">subscription</h6>
                  <h2>Join our exclusive</h2>
                  <h2>beauty community</h2>
                  <p>Elevate your beauty journey with personalized recommendations and stay connected with a community that shares your passion for self-care. Subscribe now and embark on a beauty adventure with us!</p>
                  <form>
                      <div class="input-group">
                          <input type="email" class="form-control" placeholder="Email Address">
                          <button class="btn subscribe-btn" type="submit">Subscribe</button>
                      </div>
                  </form>
              </div>
            </div>
            <div class="col-md-6 image-container">
                <img src="img/img_article.png" alt="Beauty Community">
            </div>
        </div>
        <!-- End subscription -->

        <hr>

        <!-- start question -->
        <div class="row mt-5">
          <div class="col-lg-12">
            <div class="question-text">
              <h6>questions</h6>
              <h2>Frequently Ask Questions</h2>
            </div>
          </div>
        </div>

        <div class="row mt-5 mb-5">
          <div class="col-lg-4">
            <div class="question-massage">
              <h3>How can I subscribe for updates?</h3>
              <p>Yes! We offer worldwide shipping. Shipping fees and delivery times vary depending on your location.</p>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="question-massage">
              <h3>Can you ship internationally?</h3>
              <p>Enter your email in the "Join our exclusive beauty community" section and click "Subscribe" to receive the latest beauty trends and tips.</p>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="question-massage">
              <h3>What are the skincare benefits of your products?</h3>
              <p>Our products provide deep hydration, nourishment, and protection with natural antioxidants. They help brighten, smooth, and restore skin health.</p>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="question-massage">
              <h3>How long will one product last?</h3>
              <p>With daily use, our serums and moisturizers typically last between 1 to 2 months, depending on the application amount.</p>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="question-massage">
              <h3>Do you offer a money-back guarantee?</h3>
              <p>Yes! If you're not satisfied, we offer a 30-day money-back guarantee. Just contact our support team for assistance.</p>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="question-massage">
              <h3>What is the best skincare routine?</h3>
              <p>A complete routine includes cleansing, toning, serum application, moisturizing, and SPF protection in the morning.</p>
            </div>
          </div>
        </div>
      <!-- end question -->

        <hr class="mb-5">
        <hr>

        <!-- Start testimoni -->
        <div class="row mt-5">
          <div class="col-lg-12">
            <div class="testimoni-text">
              <h2>Testimonials</h2>
            </div>
          </div>
        </div>

        <div class="row mt-5 mb-5">
          <div class="col-lg-3 col-md-6 testi">
            <div class="testimoni-massage">
              <div class="icon">
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
              </div>
              <p>"I've tried countless skincare brands, but this one truly stands out! My skin has never felt this hydrated and smooth. Highly recommend!"</p>
              <hr>
              <span>Emily Richards</span>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 testi">
            <div class="testimoni-massage">
              <div class="icon">
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
              </div>
              <p>"Absolutely love these products! My complexion looks brighter, and my skin feels so soft without any irritation."</p>
              <hr>
              <span>James Walker</span>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 testi">
            <div class="testimoni-massage">
              <div class="icon">
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
              </div>
              <p>"As someone with sensitive skin, I was hesitant to try new products, but this brand is a game-changer! Gentle yet effective!"</p>
              <hr>
              <span>Sophia Adams</span>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 testi">
            <div class="testimoni-massage">
              <div class="icon">
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
              </div>
              <p>"I've tried countless skincare brands, but this one truly stands out! My skin has never felt this hydrated and smooth. Highly recommend!"</p>
              <hr>
              <span>Emily Richards</span>
            </div>
          </div>
        </div>
        <!-- end testimoni -->

        <hr>

        <!-- start share -->
         <div class="row mt-5">
          <div class="col-lg-6 mx-auto">
            <div class="share-text">
              <h2 class="mb-5">SHARE YOUR THOUGHTS</h2>
              <p>We’d love to hear from you! Leave a comment below and share your experience with our products.</p>
              <ul class="custom-list">
                <li><i class="bi bi-volume-up-fill volume"></i> What do you think about our latest skincare collection?</li>
                <li><i class="bi bi-chat-fill chat"></i> Have you tried our best-selling serum? Let us know your thoughts!</li>
                <li><i class="bi bi-star-fill star"></i> Any skincare tips you swear by? Share them with our community!</li>
              </ul>
              <form>
                <div class="share-group">
                    <input type="text" class="form-control" placeholder="Comment">
                    <button class="btn share-btn" type="submit">Send</button>
                </div>
              </form>
            </div>
          </div>
         </div>
        <!-- end share -->

        <hr>

        <!-- start footer -->
        <footer class="footer">
          <div class="row">
            <div class="col-lg-4 col-md-4">
              <div class="social-icons">
                <a href="#"><i class="bi bi-facebook"></i></a>
                <a href="#"><i class="bi bi-instagram"></i></a>
                <a href="#"><i class="bi bi-youtube"></i></a>
              </div>
            </div>
      
            <div class="col-lg-4 col-md-4 text-center">
              <div class="footer-links">
                <a href="#">Privacy Policy</a>
                <a href="#">Cookie Policy</a>
              </div>
            </div>
    
            <div class="col-lg-4 col-md-4"></div>
          </div>
        </footer>
        <!-- end footer -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
