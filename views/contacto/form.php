<?php
/**
 * Vista: Formulario de Contacto
 * Variables disponibles: $errores (array), $datos (array con valores previos)
 */
?>

<div class="row justify-content-center">
    <div class="col-lg-7">

        <div class="card border-0 shadow-sm rounded-3 overflow-hidden">
            <div class="card-header py-3" style="background: var(--faro-primary);">
                <h2 class="h5 text-white mb-0"><i class="bi bi-envelope-fill me-2"></i>Formulario de Contacto</h2>
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

                <p class="text-muted mb-4">¿Tienes alguna consulta, sugerencia o quieres contactar a nuestra redacción? Completa el formulario y te responderemos a la brevedad.</p>

                <?php if (Auth::logeado()): ?>
                <div class="alert alert-info py-2" role="status">
                    <i class="bi bi-person-check me-1"></i>
                    Hemos completado tu nombre y correo porque tienes sesión iniciada.
                </div>
                <?php endif; ?>

                <form method="POST" action="index.php?page=contacto" class="form-ux">

                    <div class="mb-3">
                        <label for="nombre" class="form-label fw-semibold">Nombre completo <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="nombre" name="nombre"
                               value="<?= htmlspecialchars($datos['nombre'] ?? '') ?>"
                               placeholder="Ej: Juan Pérez" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold">Correo electrónico <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" id="email" name="email"
                               value="<?= htmlspecialchars($datos['email'] ?? '') ?>"
                               placeholder="tu@correo.cl" required>
                    </div>

                    <div class="mb-3">
                        <label for="asunto" class="form-label fw-semibold">Asunto <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="asunto" name="asunto"
                               value="<?= htmlspecialchars($datos['asunto'] ?? '') ?>"
                               placeholder="Ej: Consulta sobre suscripción" required>
                    </div>

                    <div class="mb-4">
                        <label for="mensaje" class="form-label fw-semibold">Mensaje <span class="text-danger">*</span></label>
                        <textarea class="form-control" id="mensaje" name="mensaje" rows="5"
                                  placeholder="Escribe tu mensaje aquí..." required minlength="10"
                                  maxlength="1000"><?= htmlspecialchars($datos['mensaje'] ?? '') ?></textarea>
                        <div class="form-text">Mínimo 10 caracteres.</div>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-faro">
                            <i class="bi bi-send me-2"></i>Enviar mensaje
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
