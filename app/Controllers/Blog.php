<?php

namespace App\Controllers;

use App\Models\PostModel;
use CodeIgniter\Controller;

class Blog extends Controller
{
    public function index()
    {
        $model = new PostModel();
        $data['posts'] = $model->getPostsWithCategory();

        return view('blog/index', $data);
    }
}
