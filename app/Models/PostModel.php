<?php

namespace App\Models;

use CodeIgniter\Model;

class PostModel extends Model
{
    protected $table = 'posts';
    protected $primaryKey = 'pos_clave';
    protected $allowedFields = ['pos_titulo', 'pos_contenido', 'pos_imagen', 'pos_categoria_id', 'pos_fecha_creacion'];
    protected $returnType = 'array';

    public function getPostsWithCategory()
    {
        return $this->select('posts.*, categorias.cat_nombre')
                    ->join('categorias', 'categorias.cat_clave = posts.pos_categoria_id', 'left')
                    ->orderBy('pos_clave', 'ASC')
                    ->findAll();
    }
}
