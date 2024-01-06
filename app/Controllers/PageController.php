<?php

namespace App\Controllers;

class PageController extends BaseController
{
    public function index()
    {
        // die('WEB > PageController');
        // dd(get_user());
        // dd(auth()->user()->roles);
        // dd(in_array(auth()->user()->roles, ['Admin', 'Webmaster','user'], true));

        $data = [
            'pageTitle' =>  'Homepage',
        ];

        return view('backend/pages/home', $data);
    }
}
