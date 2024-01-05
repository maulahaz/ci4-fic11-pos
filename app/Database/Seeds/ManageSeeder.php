<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ManageSeeder extends Seeder
{
    public function run()
    {
        $this->call('ProductSeeder');
        $this->call('OrderSeeder');
        $this->call('OrderItemSeeder');
    }
}
