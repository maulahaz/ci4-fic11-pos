<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Libraries\CIAuth;
use App\Libraries\Hash;

class CategoryController extends BaseController
{

    public function index()
    {
        die('Admin >> Category');

        $data = [
            'pageTitle' =>  'User List',
        ];

        return view('backend/users/list', $data);
    }

    

}
