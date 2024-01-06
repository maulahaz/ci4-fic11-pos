<?php

namespace App\Database\Seeds;
use Faker\Factory;
use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create();

        $data = [
            'username' => 'administrator',
            'phone' => '0818000999',
            'role' => 'admin',
        ];

        $this->db->table('users')->insert($data);
    }
}
