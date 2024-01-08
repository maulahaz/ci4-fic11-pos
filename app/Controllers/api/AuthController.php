<?php

namespace App\Controllers\api;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\Shield\Models\UserModel;
use CodeIgniter\Shield\Entities\User;

class AuthController extends ResourceController
{
    protected $helpers = ['MHzFunctions'];

    function test()
    {
        // die('Test: accessDenied');
        // return $this->respond(auth("tokens")->loggedIn()); //--output: true
        // return $this->respond(auth()->user()); //--output: user data
        // return $this->response->setJson(auth()->user()->email); //--output: user['email']
        // return $this->response->setJson(auth()->id()); //--output: user['id']
        return $this->response->setJson(get_user()); //--output: user['roles']
    }

    public function accessDenied()
    {
        // die('Test: accessDenied');

        return $this->respondCreated([
            "status" => false,
            "message" => "Invalid access",
            "data" => []
        ]);
    }

    //--Post
    public function login()
    {

        if(auth()->loggedIn()){
            auth()->logout();
        }

        $rules = [
            "email" => "required|valid_email",
            "password" => "required"
        ];

        if (!$this->validate($rules)) {

            $response = [
                "status" => false,
                "message" => $this->validator->getErrors(),
                "data" => []
            ];
        } else {

            //--success
            $credentials = [
                "email" => $this->request->getVar("email"),
                "password" => $this->request->getVar("password")
            ];

            $loginAttempt = auth()->attempt($credentials);

            if (!$loginAttempt->isOK()) {

                $response = [
                    "status" => false,
                    "message" => "Invalid login details",
                    "data" => []
                ];
            } else {

                //--We have a valid data set
                $userObject = new UserModel();

                $userData = $userObject->findById(auth()->id());

                $token = $userData->generateAccessToken("MHz-is_mysecretkey");

                $auth_token = $token->raw_token;

                $response = [
                    "status" => true,
                    "message" => "User logged in successfully",
                    "data" => [
                        "token" => $auth_token
                    ]
                ];
            }
        }

        return $this->respondCreated($response);
    }

    //--Post
    public function register()
    {
        // die('Test: register');

        $rules = [
            "username"  => "required|is_unique[users.username]",
            "email"     => "required|valid_email|is_unique[auth_identities.secret]",
            "password"  => "required"
        ];

        if (!$this->validate($rules)) {

            $response = [
                "status"    => false,
                "message"   => $this->validator->getErrors(),
                "data"      => []
            ];
        } else {

            //--User Model
            $userObject = new UserModel();

            //--User Entity
            $userEntityObject = new User([
                "username" => $this->request->getVar("username"),
                "email" => $this->request->getVar("email"),
                "password" => $this->request->getVar("password")
            ]);

            $userObject->save($userEntityObject);

            $response = [
                "status" => true,
                "message" => "User saved successfully",
                "data" => []
            ];
        }

        return $this->respondCreated($response);
    }

    //--Get
    public function profile()
    {
        $userId = auth()->id();

        $userObject = new UserModel();

        $userData = $userObject->findById($userId);

        return $this->respondCreated([
            "status" => true,
            "message" => "Profile information of logged in user",
            "data" => [
                "user" => $userData
            ]
        ]);
    }

    //--Get
    public function logout()
    {
        auth()->logout();

        auth()->user()->revokeAllAccessTokens();

        return $this->respondCreated([
            "status" => true,
            "message" => "User logged out successfully",
            "data" => []
        ]);
    }
}
