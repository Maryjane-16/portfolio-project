<section id="testimonials" class="testimonials">
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
    <path fill="#fff" fill-opacity="1" d="M0,96L48,128C96,160,192,224,288,213.3C384,203,480,117,576,117.3C672,117,768,203,864,202.7C960,203,1056,117,1152,117.3C1248,117,1344,203,1392,245.3L1440,288L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path>
  </svg>
  <div class="container">
    <div class="row text-center text-white">
      <h1 class="display-3 fw-bold">Testimonials</h1>
      <hr style="width: 100px; height: 3px; " class="mx-auto">
      <p class="lead pt-1">what our clients are saying</p>
    </div>

    <!-- START THE CAROUSEL CONTENT  -->
    <div class="row align-items-center">
      <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">


          <?php if (!empty($testimonials)): ?>
            <?php foreach ($testimonials as $index => $testimonial): ?>
              <!-- CAROUSEL ITEM 1 -->
              <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                <!-- testimonials card  -->
                <div class="testimonials__card">
                  <p class="lh-lg">
                    <i class="fas fa-quote-left"></i>
                    <?= htmlspecialchars($testimonial['review']); ?>
                    <i class="fas fa-quote-right"></i>
                  <div class="ratings p-1">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                  </div>
                  </p>
                </div>
                <!-- client picture  -->
                <div class="testimonials__picture">
                  <img src="http://localhost/portfolio-project/storage/<?= htmlspecialchars($testimonial["photo"]); ?>" alt="client picture" class="rounded-circle img-fluid">
                </div>
                <!-- client name & role  -->
                <div class="testimonials__name">
                  <h3><?= htmlspecialchars($testimonial['name']); ?></h3>
                  <p class="fw-light"><?= htmlspecialchars($testimonial['position']); ?></p>
                </div>
              </div>

            <?php endforeach; ?>
          <?php endif; ?>


        </div>
        <div class="text-center">
          <button class="btn btn-outline-light fas fa-long-arrow-alt-left" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
          </button>
          <button class="btn btn-outline-light fas fa-long-arrow-alt-right" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
          </button>
        </div>
      </div>
    </div>
  </div>
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
    <path fill="#fff" fill-opacity="1" d="M0,96L48,128C96,160,192,224,288,213.3C384,203,480,117,576,117.3C672,117,768,203,864,202.7C960,203,1056,117,1152,117.3C1248,117,1344,203,1392,245.3L1440,288L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
  </svg>
</section>