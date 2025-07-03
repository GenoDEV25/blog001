<?php
namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PostModel;
use App\Models\CategoriaModel;

class Blog extends BaseController
{
    protected $postModel;

    public function __construct()
    {
        $this->postModel = new PostModel();
    }

    // Función principal
    public function index()
    {
        $catModel = new CategoriaModel();

        $data['posts'] = $this->postModel->getPostsWithCategory();
        $data['categorias'] = $catModel->findAll();

        return view('admin/blog/index', $data);
    }

    // Crear un post
    public function create()
    {
        helper(['form', 'filesystem']);

        $file = $this->request->getFile('pos_imagen');

        $data = [
            'pos_titulo' => $this->request->getPost('pos_titulo'),
            'pos_contenido' => $this->request->getPost('pos_contenido'),
            'pos_categoria_id' => $this->request->getPost('pos_categoria_id'),
            'pos_fecha_creacion' => date('Y-m-d')
        ];

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $name = $file->getRandomName();
            $file->move(FCPATH . 'uploads', $name);
            $data['pos_imagen'] = $name;
        }

        $this->postModel->insert($data);

        return redirect()->to(base_url('admin/blog'));
    }

    // Eliminar un post
    public function delete($id)
    {
        $post = $this->postModel->find($id);
        if ($post && !empty($post['pos_imagen'])) {
            $path = FCPATH . 'uploads/' . $post['pos_imagen'];
            if (file_exists($path)) {
                unlink($path);
            }
        }

        $this->postModel->delete($id);
        return redirect()->to(base_url('admin/blog'))->with('message', 'Post eliminado correctamente.');
    }

    // Editar un post
    public function update($id)
{
    helper(['form', 'filesystem']);
    $postModel = new PostModel();

    $post = $postModel->find($id);

    $data = [
        'pos_titulo' => $this->request->getPost('pos_titulo'),
        'pos_contenido' => $this->request->getPost('pos_contenido'),
        'pos_categoria_id' => $this->request->getPost('pos_categoria_id'),
        'pos_fecha_creacion' => date('Y-m-d')
    ];

    // Si se sube una nueva imagen, eliminar la anterior
    $file = $this->request->getFile('pos_imagen');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            if (!empty($post['pos_imagen'])) {
                $oldPath = FCPATH . 'uploads/' . $post['pos_imagen'];
                if (file_exists($oldPath)) {
                    unlink($oldPath);
                }
            }

            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads', $newName);
            $data['pos_imagen'] = $newName;
        }

        $postModel->update($id, $data);
        return redirect()->to(base_url('admin/blog'))->with('message', 'Post actualizado correctamente.');
    }

}
