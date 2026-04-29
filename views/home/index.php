<?php
/**
 * Vista: Inicio / Portada
 */
?>

<!-- Noticias destacadas (RQ-04) -->
<section class="mb-5" aria-labelledby="sec-destacadas">
    <h2 class="section-title" id="sec-destacadas">Noticias destacadas</h2>
    <div class="row g-4">
        <!-- Noticia principal -->
        <?php if ($destacado): ?>
        <div class="col-lg-7">
            <div class="card card-featured h-100">
                <img src="<?= htmlspecialchars($destacado->getImagen()) ?>"
                     class="card-img-top" alt="<?= htmlspecialchars($destacado->getTitulo()) ?>"
                     style="height:320px; object-fit:cover;">
                <div class="card-body p-4">
                    <span class="cat-badge <?= badgeClass($destacado->getSeccion()) ?> mb-2 d-inline-block">
                        <?= htmlspecialchars($destacado->getCategoria()) ?>
                    </span>
                    <h3 class="featured-title mt-2"><?= htmlspecialchars($destacado->getTitulo()) ?></h3>
                    <p class="text-muted"><?= htmlspecialchars($destacado->getResumen()) ?></p>
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <small class="text-muted"><i class="bi bi-clock me-1"></i><?= htmlspecialchars($destacado->getFecha()) ?></small>
                        <a href="#" class="btn btn-faro btn-sm">Leer artículo <i class="bi bi-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <!-- Noticias secundarias (sidebar) (RQ-05) -->
        <div class="col-lg-5">
            <div class="d-flex flex-column gap-3 h-100">
                <?php foreach ($secundarios as $art): ?>
                <div class="card card-side flex-row overflow-hidden">
                    <img src="<?= htmlspecialchars($art->getImagen()) ?>"
                         alt="<?= htmlspecialchars($art->getTitulo()) ?>"
                         style="width:120px; height:110px; object-fit:cover; flex-shrink:0;">
                    <div class="card-body p-3">
                        <span class="cat-badge <?= badgeClass($art->getSeccion()) ?> d-inline-block mb-1">
                            <?= htmlspecialchars($art->getCategoria()) ?>
                        </span>
                        <h4 class="fs-6 fw-bold mb-1 mt-1"><?= htmlspecialchars($art->getTitulo()) ?></h4>
                        <small class="text-muted"><i class="bi bi-clock me-1"></i><?= htmlspecialchars($art->getFecha()) ?></small>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<!-- Más noticias (RQ-05) -->
<section class="mb-5" aria-labelledby="sec-mas">
    <h2 class="section-title" id="sec-mas">Más noticias</h2>
    <div class="row g-3">
        <?php foreach ($masArticulos as $art): ?>
        <div class="col-md-4">
            <div class="card card-small h-100 position-relative">
                <img src="<?= htmlspecialchars($art->getImagen()) ?>"
                     class="card-img-top" alt="<?= htmlspecialchars($art->getTitulo()) ?>"
                     style="height:155px; object-fit:cover;">
                <div class="card-body">
                    <span class="cat-badge <?= badgeClass($art->getSeccion()) ?> d-inline-block mb-2">
                        <?= htmlspecialchars($art->getCategoria()) ?>
                    </span>
                    <h5 class="card-title fw-bold"><?= htmlspecialchars($art->getTitulo()) ?></h5>
                    <p class="card-text small text-muted"><?= htmlspecialchars($art->getResumen()) ?></p>
                </div>
                <div class="card-footer small text-muted">
                    <i class="bi bi-clock me-1"></i><?= htmlspecialchars($art->getFecha()) ?>
                </div>
                <a href="#" class="stretched-link" aria-label="Leer: <?= htmlspecialchars($art->getTitulo()) ?>"></a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</section>
