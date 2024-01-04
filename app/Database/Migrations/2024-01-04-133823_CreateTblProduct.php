<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
// use CodeIgniter\Database\RawSql;

class CreateTblProduct extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'description' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'price' => [
                'type' => 'INT',
                'default' => 0,
            ],
            'stock' => [
                'type' => 'INT',
                'default' => 0,
            ],
            'category' =>[
                'type' => 'ENUM',
                'constraint' => ['food', 'drink', 'snack'],
            ],
            'picture' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
        ]);
        $this->forge->addField('created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL');
        $this->forge->addField('updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL');
        $this->forge->addKey('id', true);
        $this->forge->createTable('tbl_product');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_product');
    }
}
