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
                <h2 class="title">Exclusive Interview with Jenna Milhouse @missyb<h2>
                <p class="paragraph">
                  Gain insights from a renowned beauty influencer or expert in an exclusive interview. Discover their favorite beauty tips, product recommendations, and the secrets behind their success in the industry.
                </p>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-12 mx-auto">
                <img src="img/trend5.png" width="100%" alt="">
            </div>
        </div>

        <div class="row mt-5">
          <div class="col-lg-8 mx-auto">
            <div class="content-title">
              <p class="section-title">In this exclusive interview, we sit down with Jenna Milhouse, the beauty influencer and content creator behind @missyb, to discuss her journey, beauty philosophy, and the secrets behind her signature looks. Known for her effortless glam and empowering approach to beauty, Jenna has built a loyal following by sharing her passion for makeup, skincare, and self-confidence.</p>
              <h2>From Passion to Influence</h2>
              <p class="title-p">Jenna’s love for beauty started at a young age, experimenting with makeup and discovering the power it has to enhance confidence. “I’ve always believed that beauty is about self-expression,” she shares. “It’s not about covering up, but about celebrating who you are.” What started as a hobby soon turned into a career when she began posting tutorials and product reviews online, quickly gaining a dedicated community of beauty lovers.</p>
              <h2>Her Go-To Beauty Routine</h2>
              <p class="title-p">When it comes to her personal beauty routine, Jenna swears by a minimal yet effective approach. “Skincare is my number one priority,” she says. “A great base makes all the difference, so I always focus on hydration and SPF.” For makeup, her signature look includes dewy skin, soft neutral eyeshadows, and a bold lip. “I love a statement lip—whether it’s a classic red or a deep berry, it instantly elevates any look.”</p>
            </div>
            <div class="img-content">
              <img src="img/article2-content.png" width="100%" alt="">
            </div>

            <div class="hero mt-4">
              <h2>Empowering Confidence Through Beauty</h2>
              <p class="title-m">Beyond makeup, Jenna’s mission is to inspire confidence in others. “Beauty isn’t just about how you look—it’s about how you feel,” she emphasizes. Through her content, she encourages people to embrace their individuality and find joy in self-care. “If a bold eyeliner or a swipe of lipstick makes you feel amazing, then that’s what beauty is all about.”</p>
              <p class="title-m">With her authentic approach and passion for empowering others, Jenna Milhouse continues to be a shining force in the beauty industry. Follow her journey at @missyb for more tips, trends, and inspiration!</p>
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
