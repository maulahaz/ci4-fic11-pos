<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddRolesPhoneToTblUser extends Migration
{
    public function up()
    {
        $fields = [
            'phone' =>[
                'type'          => 'varchar',
                'constraint'    => 50,
                'after'         => 'username',
                'null'          => true,
            ],
            'roles' =>[
                'type'          => 'ENUM',
                'constraint'    => ['admin', 'staff', 'user'],
            ],
        ];
        $this->forge->addColumn('users', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('users', ['phone','roles']);
    }
}
