<!-- Modal Editar Post -->
<div class="modal fade" id="modalEditar" tabindex="-1" aria-labelledby="modalEditarLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <form id="formEditar" action="" method="POST" enctype="multipart/form-data" class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalEditarLabel">Editar Post</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>

      <div class="modal-body">
        <input type="hidden" id="edit_pos_clave" name="pos_clave">

        <div class="form-group">
          <label for="edit_pos_titulo" class="form-label">Título</label>
          <input type="text" class="form-control" id="edit_pos_titulo" name="pos_titulo" required>
        </div>

        <div class="form-group">
          <label for="edit_pos_contenido" class="form-label">Contenido</label>
          <textarea class="form-control" id="edit_pos_contenido" name="pos_contenido" rows="4"></textarea>
        </div>

        <div class="form-group">
          <label for="edit_pos_categoria_id" class="form-label">Categoría</label>
          <select class="form-select" id="edit_pos_categoria_id" name="pos_categoria_id" required>
            <option value="">Seleccione una categoría</option>
            <?php foreach ($categorias as $cat): ?>
              <option value="<?= esc($cat['cat_clave']) ?>"><?= esc($cat['cat_nombre']) ?></option>
            <?php endforeach; ?>
          </select>
        </div>

        <div class="form-group">
          <label for="edit_pos_imagen" class="form-label">Imagen (opcional)</label>
          <input type="file" class="form-control" id="edit_pos_imagen" name="pos_imagen" accept="image/*">
          <img id="edit_preview_imagen" src="#" class="img-preview">
        </div>
      </div>

      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
      </div>
    </form>
  </div>
</div>