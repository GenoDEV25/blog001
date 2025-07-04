<?php helper('url'); ?>

<!-- Pagina principal -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mini Blog - Inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/css/home.css') ?>" rel="stylesheet">
</head>
<body>

<div class="center-container">
    <h1 class="home-title">Bienvenido a BlogLogo</h1>
    <div class="home-buttons-section">
        <a href="<?= base_url('/admin/blog') ?>" class="btn-main">Administrador</a>
        <a href="<?= base_url('blog') ?>" class="btn-main">Usuario</a>
    </div>
</div>

</body>
</html>