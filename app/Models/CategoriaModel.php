<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoriaModel extends Model
{
    protected $table = 'categorias';
    protected $primaryKey = 'cat_clave';
    protected $allowedFields = ['cat_nombre', 'cat_fecha_creacion'];
    protected $returnType = 'array';
}
