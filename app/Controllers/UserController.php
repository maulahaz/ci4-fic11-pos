<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\CIAuth;
use App\Libraries\Hash;
use CodeIgniter\Shield\Models\UserModel;
use CodeIgniter\Shield\Entities\User;

class UserController extends BaseController
{
    public $pageTitle = 'Homepage';

    public function profile()
    {
        $userId = auth()->id();

        $userModel = new UserModel();
        $userData = $userModel->findById($userId);
        $this->data['pageTitle'] =  $this->pageTitle;
        $this->data['pageLevel'] =  'user';
        $this->data['isFiltered'] =  false;

        return view('backend/pages/home', $this->data);
    }

    

}
