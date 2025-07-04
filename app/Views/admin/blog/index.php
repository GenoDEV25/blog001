<?php helper('url'); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url('assets/css/footer.css') ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/css/header.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/index_admin.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/create_modal.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/edit_modal.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/delete_modal.css') ?>">
</head>
<body>

<!-- Header  -->
<?= view('components/header') ?>

<div class="content-wrapper">
    <div class="container admin-container">
        <!-- Título y botón de añadir -->
        <div class="admin-header">
            <h2 class="admin-title"> .</h2>
            <button class="btn-add desktop-only" data-bs-toggle="modal" data-bs-target="#modalCrear">Añadir</button>
            <div class="mobile-only">
                <button class="btn-add" data-bs-toggle="modal" data-bs-target="#modalCrear">Añadir</button>
            </div>
        </div>

        <!-- Mensaje cuando no hay posts -->
        <?php if (empty($posts)): ?>
            <div class="empty-state">
                <h4>No hay posts disponibles</h4>
                <p>¡Añade el primer post! 😄</p>
            </div>
        <?php else: ?>
            <!-- Grid de posts -->
            <div class="posts-grid">
                <?php foreach ($posts as $post): ?>
                    <div class="post-card-wrapper">
                        <div class="post-card">
                            <?php if (!empty($post['pos_imagen'])): ?>
                                <img src="<?= base_url('uploads/' . $post['pos_imagen']) ?>" class="post-image" alt="imagen del post">
                            <?php endif; ?>
                            <div class="post-content">
                                <h5 class="post-title"><?= esc($post['pos_titulo']) ?></h5>
                                <p class="post-category"><?= esc($post['cat_nombre'] ?? 'Sin categoría') ?></p>
                                <p class="post-date"><?= strftime('%B %e, %Y', strtotime($post['pos_fecha_creacion'])) ?></p>

                                <!-- Botones de acción -->
                                <div class="action-buttons">
                                    <button
                                        type="button"
                                        class="btn-edit"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modalEditar"
                                        data-id="<?= $post['pos_clave'] ?>"
                                        data-titulo="<?= esc($post['pos_titulo']) ?>"
                                        data-contenido="<?= esc($post['pos_contenido']) ?>"
                                        data-categoria="<?= $post['pos_categoria_id'] ?>"
                                        data-imagen="<?= base_url('uploads/' . $post['pos_imagen']) ?>"
                                    >
                                        ✏️ Editar
                                    </button>

                                    <button
                                        type="button"
                                        class="btn-delete"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modalEliminar"
                                        data-id="<?= $post['pos_clave'] ?>"
                                    >
                                        🗑️ Eliminar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</div>

<!-- Footer -->
<?= view('components/footer') ?>

<!-- Modales -->
<?= view('admin/blog/create_modal') ?>
<?= view('admin/blog/edit_modal') ?>
<?= view('admin/blog/delete_modal') ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const BASE_URL = '<?= base_url() ?>';
</script>
<script src="<?= base_url('assets/js/admin_blog.js') ?>"></script>

</body>
</html>