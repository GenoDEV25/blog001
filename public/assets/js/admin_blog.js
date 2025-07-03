/**
 * Maneja la funcionalidad de los modales y preview de imágenes
 */

document.addEventListener('DOMContentLoaded', function() {

    // Eliminar
    const modalEliminar = document.getElementById('modalEliminar');
    if (modalEliminar) {
        modalEliminar.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            const postId = button.getAttribute('data-id');
            const form = modalEliminar.querySelector('#formEliminar');
            if (form && postId) {
                form.action = `${BASE_URL}admin/blog/delete/${postId}`;
            }
        });
    }

    // Editar
    const modalEditar = document.getElementById('modalEditar');
    if (modalEditar) {
        modalEditar.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;

            // Obtener los valores del post
            const id = button.getAttribute('data-id');
            const titulo = button.getAttribute('data-titulo');
            const contenido = button.getAttribute('data-contenido');
            const categoria = button.getAttribute('data-categoria');
            const imagen = button.getAttribute('data-imagen');

            // Llenar los campos del modal
            const editClave = modalEditar.querySelector('#edit_pos_clave');
            const editTitulo = modalEditar.querySelector('#edit_pos_titulo');
            const editContenido = modalEditar.querySelector('#edit_pos_contenido');
            const editCategoria = modalEditar.querySelector('#edit_pos_categoria_id');
            const formEditar = modalEditar.querySelector('#formEditar');

            if (editClave) editClave.value = id || '';
            if (editTitulo) editTitulo.value = titulo || '';
            if (editContenido) editContenido.value = contenido || '';
            if (editCategoria) editCategoria.value = categoria || '';

            // Manejar preview de imagen
            const preview = modalEditar.querySelector('#edit_preview_imagen');
            if (preview) {
                if (imagen && imagen !== `${BASE_URL}uploads/`) {
                    preview.src = imagen;
                    preview.classList.remove('d-none');
                } else {
                    preview.classList.add('d-none');
                    preview.src = '#';
                }
            }

            if (formEditar && id) {
                formEditar.action = `${BASE_URL}admin/blog/update/${id}`;
            }
        });
    }

    // Previsualizar imagen al crear
    const inputImagen = document.getElementById('pos_imagen');
    if (inputImagen) {
        inputImagen.addEventListener('change', function (e) {
            const input = e.target;
            const preview = document.getElementById('preview_imagen');

            if (input.files && input.files[0] && preview) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    preview.src = e.target.result;
                    preview.classList.remove('d-none');
                };
                reader.readAsDataURL(input.files[0]);
            } else if (preview) {
                preview.classList.add('d-none');
                preview.src = "#";
            }
        });
    }

    // Previsualizar imagen al editar
    const inputEditImagen = document.getElementById('edit_pos_imagen');
    if (inputEditImagen) {
        inputEditImagen.addEventListener('change', function (e) {
            const input = e.target;
            const preview = document.getElementById('edit_preview_imagen');

            if (input.files && input.files[0] && preview) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    preview.src = e.target.result;
                    preview.classList.remove('d-none');
                };
                reader.readAsDataURL(input.files[0]);
            } else if (preview) {
                preview.classList.add('d-none');
                preview.src = "#";
            }
        });
    }

    // Mdales funcionan
    const modales = document.querySelectorAll('.modal');
    modales.forEach(modal => {
        modal.addEventListener('shown.bs.modal', function() {
            this.style.zIndex = '1055';
            const backdrop = document.querySelector('.modal-backdrop');
            if (backdrop) {
                backdrop.style.zIndex = '1050';
            }
        });

        modal.addEventListener('hidden.bs.modal', function() {
            const backdrops = document.querySelectorAll('.modal-backdrop');
            backdrops.forEach(backdrop => backdrop.remove());
        });
    });

    // Valcidacion de formularios
    const forms = document.querySelectorAll('.needs-validation');
    forms.forEach(form => {
        form.addEventListener('submit', function(event) {
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add('was-validated');
        });
    });

    // Limpiar formularios
    function limpiarFormulario(formId) {
        const form = document.getElementById(formId);
        if (form) {
            form.reset();
            form.classList.remove('was-validated');
            const previews = form.querySelectorAll('img[id*="preview"]');
            previews.forEach(preview => {
                preview.src = '#';
                preview.classList.add('d-none');
            });
        }
    }
    document.getElementById('modalCrear')?.addEventListener('hidden.bs.modal', function() {
        limpiarFormulario('formCrear');
    });

    document.getElementById('modalEditar')?.addEventListener('hidden.bs.modal', function() {
        limpiarFormulario('formEditar');
    });

    // Confirmación de eliminar
    const botonesEliminar = document.querySelectorAll('.btn-delete');
    botonesEliminar.forEach(boton => {
        boton.addEventListener('click', function() {
            const titulo = this.closest('.post-card').querySelector('.post-title').textContent;
            const modalBody = document.querySelector('#modalEliminar .modal-body p');
            if (modalBody) {
                modalBody.textContent = `¿Estás seguro de que deseas eliminar el post "${titulo}"?`;
            }
        });
    });

    // Errores
    function mostrarError(mensaje) {
        console.error('Error en admin_blog.js:', mensaje);
    }

    // Fechas
    function formatearFecha(fecha) {
        return new Date(fecha).toLocaleDateString('es-ES', {
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        });
    }

    // Hacer funciones disponibles globalmente si es necesario
    window.AdminBlog = {
        limpiarFormulario,
        mostrarError,
        formatearFecha
    };

    console.log('Admin Blog JS cargado correctamente');
});