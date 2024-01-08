<?php

namespace App\Controllers;

class HomeController extends BaseController
{
    public function index()
    {
        die('WEB > Site');
        
        $data = [
            'pageTitle' =>  'Homepage',
        ];

        return view('backend/pages/home', $data);
    }
}
