<?php

namespace App\Controllers\api;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class ProductController extends ResourceController
{
    public function index()
    {
        $model = new \App\Models\ProductModel();
        $data['data'] = $model->orderBy('id', 'DESC')->findAll();
        return $this->respond($data);
    }

    public function show($id = null)
    {
        $model = new \App\Models\ProductModel();
        $data = $model->where('id', $id)->first();
        if($data){
            return $this->respond($data);
        }else{
            return $this->failNotFound('No data found');
        }
    }

    public function create()
    {
        $model = new \App\Models\ProductModel();
        $data = [
            'email' => $this->request->getVar('email'),
        ];
        $model->insert($data);
        $response = [
            'status'   => 201,
            'error'    => null,
            'messages' => [
                'success' => 'Data successfully saved'
            ]
        ];
        return $this->respondCreated($response);
    }

    public function update($id = null)
    {
        $model = new \App\Models\ProductModel();
        $id = $this->request->getVar('id');
        $data = $model->where('id', $id);
        if(!$data){
            return $this->failNotFound('No data found');
        }else{
            $data = [
                'name' => $this->request->getVar('name'),
                'email'  => $this->request->getVar('email'),
            ];
            $model->update($id, $data);
            $response = [
              'status'   => 200,
              'error'    => null,
              'messages' => [
                  'success' => 'Data successfully updated'
              ]
          ];
          return $this->respond($response);
        }
    }

    public function delete($id = null)
    {
        $model = new \App\Models\ProductModel();
        $data = $model->where('id', $id)->delete($id);
        if($data){
            $model->delete($id);
            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'Data successfully deleted'
                ]
            ];
            return $this->respondDeleted($response);
        }else{
            return $this->failNotFound('No data found');
        }
    }
}
