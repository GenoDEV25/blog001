<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini Blog - Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">
</head>
<body>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1 class="title-dark">Mini Blog Dashboard</h1>
                    <button type="button" class="btn btn-success btn-add" data-bs-toggle="modal" data-bs-target="#createModal">
                        <i class="fas fa-plus"></i> Nuevo Post
                    </button>
                </div>

                <!-- Posts Grid -->
                <div class="row" id="postsContainer">
                    <?php if (!empty($posts)): ?>
                        <?php foreach ($posts as $post): ?>
                            <div class="col-lg-4 col-md-6 mb-4" data-post-id="<?= $post['pos_clave'] ?>">
                                <div class="card post-card">
                                    <?php if ($post['pos_imagen']): ?>
                                        <img src="<?= $post['pos_imagen'] ?>" class="card-img-top post-image" alt="<?= htmlspecialchars($post['pos_titulo']) ?>">
                                    <?php else: ?>
                                        <div class="card-img-top post-image-placeholder d-flex align-items-center justify-content-center">
                                            <i class="fas fa-image fa-3x text-muted"></i>
                                        </div>
                                    <?php endif; ?>
                                    
                                    <div class="card-body">
                                        <h5 class="card-title title-dark"><?= htmlspecialchars($post['pos_titulo']) ?></h5>
                                        
                                        <div class="mb-2">
                                            <small class="text-muted">
                                                <i class="fas fa-calendar"></i> <?= date('d/m/Y', strtotime($post['pos_fecha_creacion'])) ?>
                                            </small>
                                            <?php if ($post['cat_nombre']): ?>
                                                <span class="badge bg-primary ms-2"><?= htmlspecialchars($post['cat_nombre']) ?></span>
                                            <?php endif; ?>
                                        </div>
                                        
                                        <?php if ($post['pos_contenido']): ?>
                                            <p class="card-text"><?= substr(htmlspecialchars($post['pos_contenido']), 0, 100) ?><?= strlen($post['pos_contenido']) > 100 ? '...' : '' ?></p>
                                        <?php endif; ?>
                                        
                                        <div class="card-actions">
                                            <button type="button" class="btn btn-sm btn-outline-primary btn-edit" 
                                                    data-post-id="<?= $post['pos_clave'] ?>">
                                                <i class="fas fa-edit"></i> Editar
                                            </button>
                                            <button type="button" class="btn btn-sm btn-outline-danger btn-delete" 
                                                    data-post-id="<?= $post['pos_clave'] ?>" 
                                                    data-post-title="<?= htmlspecialchars($post['pos_titulo']) ?>">
                                                <i class="fas fa-trash"></i> Eliminar
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="col-12">
                            <div class="alert alert-info text-center">
                                <i class="fas fa-info-circle fa-2x mb-3"></i>
                                <h4>No hay posts disponibles</h4>
                                <p>Comienza creando tu primer post haciendo clic en "Nuevo Post"</p>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Crear Post -->
    <div class="modal fade" id="createModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title title-dark">Crear Nuevo Post</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form id="createForm">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="createTitulo" class="form-label">Título *</label>
                                    <input type="text" class="form-control" id="createTitulo" name="titulo" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="createFecha" class="form-label">Fecha de Creación *</label>
                                    <input type="date" class="form-control" id="createFecha" name="fecha_creacion" required>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="createCategoria" class="form-label">Categoría *</label>
                            <select class="form-select" id="createCategoria" name="categoria_id" required>
                                <option value="">Seleccionar categoría</option>
                                <?php foreach ($categorias as $categoria): ?>
                                    <option value="<?= $categoria['cat_clave'] ?>"><?= htmlspecialchars($categoria['cat_nombre']) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="createImagen" class="form-label">URL de Imagen</label>
                            <input type="url" class="form-control" id="createImagen" name="imagen" placeholder="https://ejemplo.com/imagen.jpg">
                        </div>
                        <div class="mb-3">
                            <label for="createContenido" class="form-label">Contenido</label>
                            <textarea class="form-control" id="createContenido" name="contenido" rows="4"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-accept">Crear Post</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Editar Post -->
    <div class="modal fade" id="editModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title title-dark">Editar Post</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form id="editForm">
                    <input type="hidden" id="editId" name="id">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="editTitulo" class="form-label">Título *</label>
                                    <input type="text" class="form-control" id="editTitulo" name="titulo" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="editFecha" class="form-label">Fecha de Creación *</label>
                                    <input type="date" class="form-control" id="editFecha" name="fecha_creacion" required>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="editCategoria" class="form-label">Categoría *</label>
                            <select class="form-select" id="editCategoria" name="categoria_id" required>
                                <option value="">Seleccionar categoría</option>
                                <?php foreach ($categorias as $categoria): ?>
                                    <option value="<?= $categoria['cat_clave'] ?>"><?= htmlspecialchars($categoria['cat_nombre']) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="editImagen" class="form-label">URL de Imagen</label>
                            <input type="url" class="form-control" id="editImagen" name="imagen" placeholder="https://ejemplo.com/imagen.jpg">
                        </div>
                        <div class="mb-3">
                            <label for="editContenido" class="form-label">Contenido</label>
                            <textarea class="form-control" id="editContenido" name="contenido" rows="4"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-accept">Actualizar Post</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Eliminar Post -->
    <div class="modal fade" id="deleteModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title title-dark">Confirmar Eliminación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <i class="fas fa-exclamation-triangle fa-3x text-warning mb-3"></i>
                        <h4>¿Estás seguro?</h4>
                        <p>¿Deseas eliminar el post "<span id="deletePostTitle"></span>"?</p>
                        <p class="text-danger"><small>Esta acción no se puede deshacer.</small></p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-accept" id="confirmDelete">Sí, Eliminar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets/js/app.js') ?>"></script>
</body>
</html>