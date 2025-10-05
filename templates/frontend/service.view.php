<section id="services" class="services">
  <div class="container">
    <div class="row text-center">
      <h1 class="display-3 fw-bold">Our Services</h1>
      <div class="heading-line mb-1"></div>
    </div>
    <!-- Marketing -->
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 services mt-4">
        <div class="services__content">
          <h3 class="display-3--title mt-1"><?= htmlspecialchars($marketing['title']); ?></h3>
          <p class="lh-lg"><?= htmlspecialchars($marketing['description']); ?></p>
          <button type="button" class="rounded-pill btn-rounded border-primary">Learn more
            <span><i class="fas fa-arrow-right"></i></span>
          </button>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 services mt-4 text-end">
        <div class="services__pic">
          <img src="/assets/frontend/images/services/marketing.png"
            alt="<?= htmlspecialchars($marketing['title']); ?> illustration"
            class="img-fluid">
        </div>
      </div>
    </div>

    <!-- Web Development -->
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 services mt-4 text-start">
        <div class="services__pic">
          <img src="/assets/frontend/images/services/webdev.png"
            alt="<?= htmlspecialchars($webDev['title']); ?> illustration"
            class="img-fluid">
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 services mt-4">
        <div class="services__content">
          <h3 class="display-3--title mt-1"><?= htmlspecialchars($webDev['title']); ?></h3>
          <p class="lh-lg"><?= htmlspecialchars($webDev['description']); ?></p>
          <button type="button" class="rounded-pill btn-rounded border-primary">Learn more
            <span><i class="fas fa-arrow-right"></i></span>
          </button>
        </div>
      </div>
    </div>

    <!-- Cloud Hosting -->
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 services mt-4">
        <div class="services__content">
          <h3 class="display-3--title mt-1"><?= htmlspecialchars($cloudHosting['title']); ?></h3>
          <p class="lh-lg"><?= htmlspecialchars($cloudHosting['description']); ?></p>
          <button type="button" class="rounded-pill btn-rounded border-primary">Learn more
            <span><i class="fas fa-arrow-right"></i></span>
          </button>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 services mt-4 text-end">
        <div class="services__pic">
          <img src="/assets/frontend/images/services/cloud.png"
            alt="<?= htmlspecialchars($cloudHosting['title']); ?> illustration"
            class="img-fluid">
        </div>
      </div>
    </div>