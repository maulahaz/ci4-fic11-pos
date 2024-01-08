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
        $productModel = new \App\Models\ProductModel();
        
        $file = $request->getFile('picture');
        $filename = $file->getRandomName();

        $rules = [
            "name" => "required|min_length[3]|is_unique[tbl_product.name]",
            "price" => "required|numeric"
            "stock" => "required|numeric"
            "category" => "required|not_in_list[food,drink,snack]"
            "picture" => "required"
        ];

        if (!$this->validate($rules)) {
            $response = [
                "status" => false,
                "message" => $this->validator->getErrors(),
                "data" => []
            ];
        }else{
            $save = $productModel->save([
                    'name' => $request->getVar('name'),
                    'price' => $request->getVar('price'),
                    'stock' => $request->getVar('stock'),
                    'category'  => $request->getVar('category'),
                    'picture' => $filename,
                    'created_at' => date("Y-m-d H:i:s"),
                ]);
            $file->move('uploads/img', $filename);

            if($save){
                $response = ['status'=>1, 'message'=>'New data has been saved.'];
            }else{
                $response = ['status'=>0, 'message'=>'Something went wrong.'];
            }
        }
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
