<section id="portfolio" class="portfolio">
  <div class="container">
    <div class="row text-center mt-5">
      <h1 class="display-3 fw-bold text-capitalize">Latest work</h1>
      <div class="heading-line"></div>
      <p class="lead">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint porro temporibus distinctio.
      </p>
    </div>

    <!-- FILTER BUTTONS  -->
    <div class="row mt-5 mb-4 g-3 text-center">
      <div class="col-md-12">
        <button class="btn btn-outline-primary" type="button">All</button>
        <button class="btn btn-outline-primary" type="button">Websites</button>
        <button class="btn btn-outline-primary" type="button">Design</button>
        <button class="btn btn-outline-primary" type="button">Mockup</button>
      </div>
    </div>

    <!-- START THE PORTFOLIO ITEMS  -->
    <div class="row">
      <?php if (!empty($portfolios)): ?>
        <?php foreach ($portfolios as $portfolio): ?>
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="portfolio-box shadow">
              <!-- portfolio image -->
              <img
                src="http://localhost/portfolio-project/storage/<?= htmlspecialchars($portfolio['image']); ?>"
                alt="<?= htmlspecialchars($portfolio['title']); ?>"
                title="<?= htmlspecialchars($portfolio['title']); ?>"
                class="img-fluid">
              <div class="portfolio-info">
                <div class="caption">
                  <h4><?= htmlspecialchars($portfolio['title']); ?></h4>
                  <p><?= htmlspecialchars($portfolio['category']); ?></p>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <p class="text-center">No portfolio items available yet.</p>
      <?php endif; ?>
    </div>
  </div>
</section>