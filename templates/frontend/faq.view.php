<section id="faq" class="faq">
  <div class="container">
    <div class="row text-center">
      <h1 class="display-3 fw-bold text-uppercase">faq</h1>
      <div class="heading-line"></div>
      <p class="lead">Frequently asked questions, get knowledge beforehand</p>
    </div>

    <!-- ACCORDION CONTENT -->
    <div class="row mt-5">
      <div class="col-md-12">
        <div class="accordion" id="accordionExample">

          <?php if (!empty($faqs)): ?>
            <?php foreach ($faqs as $faq): ?>
              <div class="accordion-item shadow mb-3">
                <h2 class="accordion-header" id="heading<?= $faq['id'] ?>">
                  <button
                    class="accordion-button collapsed"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapse<?= $faq['id'] ?>"
                    aria-expanded="false"
                    aria-controls="collapse<?= $faq['id'] ?>">
                    <?= htmlspecialchars($faq['title']) ?>
                  </button>
                </h2>
                <div
                  id="collapse<?= $faq['id'] ?>"
                  class="accordion-collapse collapse"
                  aria-labelledby="heading<?= $faq['id'] ?>"
                  data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <?= nl2br(htmlspecialchars($faq['description'])) ?>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          <?php else: ?>
            <p class="text-center">No FAQs available.</p>
          <?php endif; ?>

        </div>
      </div>
    </div>
  </div>
</section>