<?php

namespace App\Controllers;

class PageController extends BaseController
{
    public $pageTitle = 'Homepage';

    //--Public Page, accessible without Login
    public function index()
    {
        $this->data['webTitleXtra'] =  $this->pageTitle;
        $this->data['pageTitle'] =  $this->pageTitle;
        $this->data['pageLevel'] =  'user';
        $this->data['isFiltered'] =  false;

        return view('backend/pages/home', $this->data);
    }

    //--Public Page, Required Login
    public function dashboard()
    {
        $this->data['webTitleXtra'] =  $this->pageTitle;
        $this->data['pageTitle'] =  'Dashboard';
        $this->data['pageLevel'] =  'user';

        return view('backend/pages/home', $this->data);
    }

    function forbidden()
    {
        $this->data['pageTitle']  = $this->pageTitle;
        return view('frontend/pages/forbidden', $this->data);
    }

    function undercon()
    {
        $this->data['pageTitle']  = $this->pageTitle;
        return view('frontend/pages/undercon', $data);
    }
}
