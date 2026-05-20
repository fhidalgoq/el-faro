<?php
/**
 * Vista parcial: Header compartido
 * Incluye: barra de avisos, topbar de marca y navbar Bootstrap 5.3
 * Variable esperada: $paginaActiva (string) — p.ej: 'home', 'deporte', 'negocios', etc.
 */
$paginaActiva = $paginaActiva ?? 'home';
$usuarioLogeado = Auth::logeado();
$nombreUsuario  = Auth::nombre();

$navLinks = [
    'home'       => ['href' => 'index.php',                         'icon' => 'bi-house',    'label' => 'Inicio'],
    'deporte'    => ['href' => 'index.php?page=deporte',            'icon' => 'bi-trophy',   'label' => 'Deporte'],
    'negocios'   => ['href' => 'index.php?page=negocios',           'icon' => 'bi-graph-up', 'label' => 'Negocios'],
];

$dropdownLinks = [
    'tecnologia' => ['href' => 'index.php?page=tecnologia', 'icon' => 'bi-cpu',     'color' => 'text-primary', 'label' => 'Tecnología'],
    'cultura'    => ['href' => 'index.php?page=cultura',    'icon' => 'bi-palette',  'color' => 'text-danger',  'label' => 'Cultura'],
];

$enDropdown = in_array($paginaActiva, array_keys($dropdownLinks));
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($tituloPagina ?? 'El Faro') ?> | El Faro</title>
    <meta name="description" content="<?= htmlspecialchars($metaDesc ?? 'Periódico digital El Faro. Noticias de actualidad, deporte, negocios, tecnología y cultura.') ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="assets/css/custom.css">
</head>
<body>
    <a class="skip-link" href="#contenido">Saltar al contenido principal</a>

    <!-- RQ-07: Barra de avisos -->
    <div class="alert alert-warning alert-dismissible fade show mb-0 rounded-0 alert-bar" role="alert">
        <div class="container d-flex align-items-center gap-2">
            <i class="bi bi-lightning-charge-fill text-warning-emphasis"></i>
            <span><?= $avisoTexto ?? '<b>Última hora:</b> Municipio anuncia plan integral de mejoramiento urbano para el sector oriente.' ?></span>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
    </div>

    <!-- Topbar de marca -->
    <div class="topbar-brand text-white">
        <div class="container d-flex justify-content-between align-items-center py-3 flex-wrap gap-3">
            <div class="d-flex align-items-center gap-3">
                <img src="https://thumbs.dreamstime.com/z/logotipo-de-faro-formado-por-un-dise%C3%B1o-sencillo-y-moderno-estilo-minimalista-elegante-el-llamativo-capta-la-esencia-fuerza-gu%C3%ADa-280336023.jpg"
                    alt="Logotipo de El Faro" class="logo-img rounded-circle" width="72" height="72">
                <div>
                    <p class="eyebrow">Periódico digital</p>
                    <h1>El Faro</h1>
                    <p class="tagline"><?= htmlspecialchars($taglinePagina ?? 'Informando con veracidad y compromiso.') ?></p>
                </div>
            </div>
            <div class="text-end d-none d-md-block">
                <p class="mb-0 small opacity-75"><i class="bi bi-geo-alt-fill me-1"></i>Santiago de Chile</p>
                <p class="mb-0 small opacity-75">
                    <?php if ($usuarioLogeado): ?>
                    <span class="user-badge me-2" title="Sesión activa">
                        <i class="bi bi-person-circle me-1"></i><?= htmlspecialchars($nombreUsuario) ?>
                    </span>
                    <a href="index.php?page=logout" class="text-white-50 text-decoration-none me-2"
                       title="Cerrar sesión">
                        <i class="bi bi-box-arrow-right me-1"></i>Salir
                    </a>
                    <?php else: ?>
                    <a href="index.php?page=registro" class="text-white-50 text-decoration-none me-2">
                        <i class="bi bi-person-plus me-1"></i>Registrarse
                    </a>
                    <?php endif; ?>
                    <a href="index.php?page=contacto" class="text-white-50 text-decoration-none">
                        <i class="bi bi-envelope me-1"></i>Contacto
                    </a>
                </p>
            </div>
        </div>
    </div>

    <!-- Navbar principal -->
    <nav class="main-nav navbar navbar-expand-lg navbar-dark" aria-label="Menú principal">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain"
                aria-controls="navbarMain" aria-expanded="false" aria-label="Abrir menú">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarMain">
                <ul class="navbar-nav me-auto gap-1">
                    <?php foreach ($navLinks as $key => $link): ?>
                    <li class="nav-item">
                        <a class="nav-link <?= $paginaActiva === $key ? 'active' : '' ?>"
                           href="<?= $link['href'] ?>"
                           <?= $paginaActiva === $key ? 'aria-current="page"' : '' ?>>
                            <i class="bi <?= $link['icon'] ?> me-1"></i><?= $link['label'] ?>
                        </a>
                    </li>
                    <?php endforeach; ?>

                    <!-- Dropdown: Más secciones -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle <?= $enDropdown ? 'active' : '' ?>"
                           href="#" id="dropdownMas" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false"
                           <?= $enDropdown ? 'aria-current="true"' : '' ?>>
                            <i class="bi bi-grid me-1"></i>Más secciones
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMas">
                            <?php foreach ($dropdownLinks as $key => $link): ?>
                            <li>
                                <a class="dropdown-item <?= $paginaActiva === $key ? 'active' : '' ?>"
                                   href="<?= $link['href'] ?>">
                                    <i class="bi <?= $link['icon'] ?> me-2 <?= $link['color'] ?>"></i><?= $link['label'] ?>
                                </a>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </li>

                    <!-- Contacto y Registro en mobile -->
                    <li class="nav-item d-lg-none">
                        <a class="nav-link <?= $paginaActiva === 'contacto' ? 'active' : '' ?>" href="index.php?page=contacto">
                            <i class="bi bi-envelope me-1"></i>Contacto
                        </a>
                    </li>
                    <?php if ($usuarioLogeado): ?>
                    <li class="nav-item d-lg-none">
                        <span class="nav-link user-nav-name">
                            <i class="bi bi-person-circle me-1"></i><?= htmlspecialchars($nombreUsuario) ?>
                        </span>
                    </li>
                    <li class="nav-item d-lg-none">
                        <a class="nav-link" href="index.php?page=logout">
                            <i class="bi bi-box-arrow-right me-1"></i>Cerrar sesión
                        </a>
                    </li>
                    <?php else: ?>
                    <li class="nav-item d-lg-none">
                        <a class="nav-link <?= $paginaActiva === 'registro' ? 'active' : '' ?>" href="index.php?page=registro">
                            <i class="bi bi-person-plus me-1"></i>Registrarse
                        </a>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenido principal -->
    <main id="contenido" class="py-4">
        <div class="container">
