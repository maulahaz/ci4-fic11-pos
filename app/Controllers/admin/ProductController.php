<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;

class ProductController extends BaseController
{

    public function index()
    {
        // die('Admin >> Product');

        $data = [
            'pageTitle' =>  'Product List',
        ];

        return view('backend/users/list', $data);
    }

    

}
