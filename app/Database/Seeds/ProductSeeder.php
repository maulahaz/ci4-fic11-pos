<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
// use Faker\Factory;
use App\Models\ProductModel;

class ProductSeeder extends Seeder
{
    public function run()
    {
        // $faker = Factory::create();        
        // $formatters = [
        //     'name' => $faker->name,
        //     'description' => $faker->text,
        //     'price' => $faker->randomElement([10,100]),
        //     'stock' => $faker->randomElement([1,20]),
        //     'category' => $faker->randomElement(['food', 'drink', 'snack']),
        //     'is_favorite' => $faker->randomElement([0,1]),
        //     'picture' => Faker\Provider\Image::imageUrl(400, 400),
        // ];        
        // $fabricator = new Fabricator(ProductModel::class, $formatters);
        // $fabricator->create();

        // for ($i=0; $i < 50; $i++) { 
        //     $product = $this->generateFakeProduct();
        //     $this->db->table('tbl_product')->insert($product);
        // }

        //--Helper to generate random values
         helper('text');

        //--Insert 5 Records with Dynamic values 
        for($num=0;$num<50;$num++){
            $product = new ProductModel();  
            $insertdata['name'] = random_string('alpha');
            $insertdata['description'] = random_string('alpha',50);
            $insertdata['price'] = rand(10,100);
            $insertdata['stock'] = rand(1,20);
            $insertdata['category'] = alternator('food', 'drink', 'snack');    
            $insertdata['is_favorite'] = alternator(0,1);    
            $insertdata['picture'] = random_string('alpha',10);   
            $product->insert($insertdata);
        }

        
    }

    private function generateFakeProduct()
    {
        $faker = Factory::create();        
        $formatters = [
            'name' => $faker->name,
            'description' => $faker->text,
            'price' => $faker->randomElement([10,100]),
            'stock' => $faker->randomElement([1,20]),
            'category' => $faker->randomElement(['food', 'drink', 'snack']),
            'is_favorite' => $faker->randomElement([0,1]),
            'picture' => Faker\Provider\Image::imageUrl(400, 400),
        ];        
        $fabricator = new Fabricator(ProductModel::class, $formatters);
        $fabricator->create();
    }
}
