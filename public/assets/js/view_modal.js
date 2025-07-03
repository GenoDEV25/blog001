// Script para manejar el modal de visualización de un posts específico
const modalVer = document.getElementById('modalVer');

if (modalVer) {
    modalVer.addEventListener('show.bs.modal', function (event) {
    const button = event.relatedTarget;

    // Obtener datos del botón ver
    const titulo = button.getAttribute('data-titulo');
    const contenido = button.getAttribute('data-contenido');
    const categoria = button.getAttribute('data-categoria');
    const fecha = button.getAttribute('data-fecha');
    const imagen = button.getAttribute('data-imagen');

    // Actualizar contenido del modal
    modalVer.querySelector('#ver_titulo').textContent = titulo;
    modalVer.querySelector('#ver_categoria_fecha').textContent = `${categoria} - ${fecha}`;

    // Aceptamos saltos de linea en la descripción :D
    const contenidoConSaltos = contenido.replace(/\n/g, '<br>');
    modalVer.querySelector('#ver_contenido').innerHTML = contenidoConSaltos;

    modalVer.querySelector('#ver_imagen').src = imagen;
    });
}