<section id="companies" class="companies">
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
    <path fill="#fff" fill-opacity="1" d="M0,96L48,128C96,160,192,224,288,213.3C384,203,480,117,576,117.3C672,117,768,203,864,202.7C960,203,1056,117,1152,117.3C1248,117,1344,203,1392,245.3L1440,288L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path>
  </svg>

  <div class="container">
    <div class="row text-center">
      <h1 class="display-3 fw-bold">Our Partners</h1>
      <hr style="width: 100px; height: 3px;" class="mx-auto">
      <p class="lead pt-1">Trusted by companies like</p>
    </div>

    <div class="row align-items-center justify-content-center">
      <div id="carouselCompanies" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">

          <?php if (!empty($companies)): ?>
            <?php foreach ($companies as $index => $company): ?>
              <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                <div class="companies__logo-box shadow-sm text-center p-3">
                  <img src="http://localhost/portfolio-project/storage/<?= htmlspecialchars($company['logo']); ?>"
                    alt="Company Logo"
                    class="img-fluid">
                </div>
              </div>
            <?php endforeach; ?>
          <?php endif; ?>

        </div>

        <!-- Carousel controls -->
        <div class="text-center">
          <button class="btn btn-outline-dark fas fa-long-arrow-alt-left" type="button" data-bs-target="#carouselCompanies" data-bs-slide="prev"></button>
          <button class="btn btn-outline-dark fas fa-long-arrow-alt-right" type="button" data-bs-target="#carouselCompanies" data-bs-slide="next"></button>
        </div>
      </div>
    </div>
  </div>

  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
    <path fill="#fff" fill-opacity="1" d="M0,96L48,128C96,160,192,224,288,213.3C384,203,480,117,576,117.3C672,117,768,203,864,202.7C960,203,1056,117,1152,117.3C1248,117,1344,203,1392,245.3L1440,288L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
  </svg>
</section>