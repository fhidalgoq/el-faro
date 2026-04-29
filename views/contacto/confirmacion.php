<?php
/**
 * Vista: Confirmación de Contacto
 * Variable disponible: $contacto (instancia de Contacto)
 */
?>

<div class="row justify-content-center">
    <div class="col-lg-6 text-center">
        <div class="card border-0 shadow-sm rounded-3 p-5">
            <div class="mb-4">
                <i class="bi bi-check-circle-fill text-success" style="font-size: 4rem;"></i>
            </div>
            <h2 class="h4 fw-bold mb-2">¡Mensaje enviado con éxito!</h2>
            <p class="text-muted mb-4">
                Gracias <strong><?= htmlspecialchars($contacto->getNombre()) ?></strong>, hemos recibido tu mensaje
                con asunto <em>"<?= htmlspecialchars($contacto->getAsunto()) ?>"</em>.
                Te responderemos a <strong><?= htmlspecialchars($contacto->getEmail()) ?></strong> a la brevedad.
            </p>
            <a href="index.php" class="btn btn-faro">
                <i class="bi bi-house me-2"></i>Volver al inicio
            </a>
        </div>
    </div>
</div>
