<?php
//setlocale(LC_TIME, 'spanish');
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mis Blogs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url('assets/css/footer.css') ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/css/header.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/index_usuarios.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/view_modal.css') ?>">
</head>
<body>

<!-- Header -->
<?= view('components/header') ?>

<div class="content-wrapper">
  <div class="container">
    <!-- Si no hay ningun post guardado en la BD -->
    <?php if (empty($posts)): ?>
      <div class="empty-state">
        <h4 class="mb-2">No hay posts por ahora...</h4>
        <p class="text-muted">¡Pronto habrá contenido nuevo! :D</p>
      </div>
    <?php else: ?>
    <!-- Carga de las tarjetas para ver posts -->
      <div class="posts-grid">
        <?php foreach ($posts as $post): ?>
          <div class=>
            <div class="post-card">
              <!-- Botón para ver un post completo (ojo) -->
              <button
                class="view-btn"
                data-bs-toggle="modal"
                data-bs-target="#modalVer"
                data-titulo="<?= esc($post['pos_titulo']) ?>"
                data-contenido="<?= esc($post['pos_contenido']) ?>"
                data-categoria="<?= esc($post['cat_nombre']) ?>"
                data-fecha="<?= date('F j, Y', strtotime($post['pos_fecha_creacion'])) ?>"
                data-imagen="<?= base_url('uploads/' . $post['pos_imagen']) ?>"
              >
                <i class="bi bi-eye"></i>
              </button>

              <!-- Carga de tarjetas -->
              <?php if (!empty($post['pos_imagen'])): ?>
                <img src="<?= base_url('uploads/' . $post['pos_imagen']) ?>" class="post-card-image" alt="imagen del post">
              <?php endif; ?>

              <div class="post-card-body">
                <h5 class="post-card-title"><?= esc($post['pos_titulo']) ?></h5>
                <p class="post-card-category"><?= esc($post['cat_nombre'] ?? 'Sin categoría') ?></p>
                <p class="post-card-date"><?= date('F j, Y', strtotime($post['pos_fecha_creacion'])) ?></p>
              </div>
            </div>
          </div>
        <?php endforeach ?>
      </div>
    <?php endif; ?>
  </div>
</div>

<!-- Footer -->
<?= view('components/footer') ?>

<!-- Modal para ver post completos -->
<?= view('blog/view_modal') ?>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/js/view_modal.js') ?>"></script>

</body>
</html>