<?php

namespace App\Database\Seeds;
use Faker\Factory;
use CodeIgniter\Database\Seeder;

class OrderItemSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create();

        for ($i=0; $i < 50; $i++) { 
            $data = [
                'order_id' => $faker->numberBetween(1,50),
                'product_id' => $faker->numberBetween(1,50),
                'qty' => $faker->numberBetween(1,10),
                'total_price' => $faker->numberBetween(100,1000),
                'created_at' => $faker->dateTimeBetween('-2 month', '-1 days')->format('Y-m-d H:i:s'),
                'updated_at'=> date('Y-m-d H:i:s'),
            ];
            $this->db->table('tbl_order_item')->insert($data);
        }
    }
}
