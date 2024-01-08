<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class OrderSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create();

        for ($i=0; $i < 50; $i++) { 
            $data = [
                'order_date' => $faker->dateTimeBetween('-2 month', '-1 days')->format('Y-m-d H:i:s'),
                'cashier_id' => $faker->randomElement([1,2]),
                'total_item' => $faker->numberBetween(1,10),
                'total_price' => $faker->numberBetween(100,1000),
                'payment_method' => $faker->randomElement(['cash', 'card', 'qris']),
                'updated_at'=> date('Y-m-d H:i:s'),
            ];
            $this->db->table('tbl_order')->insert($data);
        }
    }
}

//use CodeIgniter\I18n\Time;

// 'name'        =>    $faker->name,
// 'email'       =>    $faker->email,
// 'password'    =>    password_hash($faker->password, PASSWORD_DEFAULT),
// 'phone'       =>    $faker->phoneNumber,
// 'address'     =>    $faker->address,
// $faker->text;
