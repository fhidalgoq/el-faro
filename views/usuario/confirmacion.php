<?php
/**
 * Vista: Confirmación de Registro
 * Variable disponible: $usuario (instancia de Usuario)
 */
?>

<div class="row justify-content-center">
    <div class="col-lg-6 text-center">
        <div class="card border-0 shadow-sm rounded-3 p-5">
            <div class="mb-4">
                <i class="bi bi-person-check-fill text-success" style="font-size: 4rem;"></i>
            </div>
            <h2 class="h4 fw-bold mb-2">¡Cuenta creada con éxito!</h2>
            <p class="text-muted mb-1">
                Bienvenido/a, <strong><?= htmlspecialchars($usuario->getNombre()) ?></strong>.
            </p>
            <p class="text-muted mb-2">
                Tu cuenta ha sido registrada con el correo
                <strong><?= htmlspecialchars($usuario->getEmail()) ?></strong>.<br>
                <small>Fecha de registro: <?= htmlspecialchars($usuario->getFechaRegistro()) ?></small>
            </p>
            <p class="text-success small mb-4">
                <i class="bi bi-check-circle me-1"></i>
                Has iniciado sesión. Tu nombre aparece en la barra superior mientras navegues el sitio.
            </p>
            <a href="index.php" class="btn btn-faro">
                <i class="bi bi-newspaper me-2"></i>Ver las noticias
            </a>
        </div>
    </div>
</div>
