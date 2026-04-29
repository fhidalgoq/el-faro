<?php
/**
 * Vista: Formulario de Registro de Usuario
 * Variables disponibles: $errores (array), $datos (array con valores previos)
 */
?>

<div class="row justify-content-center">
    <div class="col-lg-6">

        <div class="card border-0 shadow-sm rounded-3 overflow-hidden">
            <div class="card-header py-3" style="background: var(--faro-primary);">
                <h2 class="h5 text-white mb-0"><i class="bi bi-person-plus-fill me-2"></i>Crear cuenta en El Faro</h2>
            </div>
            <div class="card-body p-4">

                <?php if (!empty($errores)): ?>
                <div class="alert alert-danger" role="alert">
                    <strong><i class="bi bi-exclamation-triangle-fill me-1"></i>Por favor corrige los siguientes errores:</strong>
                    <ul class="mb-0 mt-2">
                        <?php foreach ($errores as $error): ?>
                        <li><?= htmlspecialchars($error) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <?php endif; ?>

                <p class="text-muted mb-4">Regístrate gratis y accede a contenido exclusivo, boletines diarios y más beneficios para lectores de El Faro.</p>

                <form method="POST" action="index.php?page=registro" novalidate>

                    <div class="mb-3">
                        <label for="nombre" class="form-label fw-semibold">Nombre completo <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="nombre" name="nombre"
                               value="<?= htmlspecialchars($datos['nombre'] ?? '') ?>"
                               placeholder="Ej: María González" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold">Correo electrónico <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" id="email" name="email"
                               value="<?= htmlspecialchars($datos['email'] ?? '') ?>"
                               placeholder="tu@correo.cl" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label fw-semibold">Contraseña <span class="text-danger">*</span></label>
                        <input type="password" class="form-control" id="password" name="password"
                               placeholder="Mínimo 6 caracteres" required minlength="6">
                        <div class="form-text">Usa al menos 6 caracteres.</div>
                    </div>

                    <div class="mb-4">
                        <label for="password_confirm" class="form-label fw-semibold">Confirmar contraseña <span class="text-danger">*</span></label>
                        <input type="password" class="form-control" id="password_confirm" name="password_confirm"
                               placeholder="Repite tu contraseña" required>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-faro">
                            <i class="bi bi-person-check me-2"></i>Crear mi cuenta
                        </button>
                    </div>

                    <p class="text-center text-muted small mt-3 mb-0">
                        ¿Ya tienes cuenta? <a href="index.php">Volver al inicio</a>
                    </p>
                </form>
            </div>
        </div>

    </div>
</div>
