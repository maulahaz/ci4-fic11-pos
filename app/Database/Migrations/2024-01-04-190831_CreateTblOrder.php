<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTblOrder extends Migration
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
            'order_date' => [
                'type' => 'TIMESTAMP',
            ],            
            'cashier_id' => [
                'type' => 'int',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'total_item' => [
                'type' => 'INT',
                'default' => 0,
            ],
            'total_price' => [
                'type' => 'INT',
                'default' => 0,
            ],
            'payment_method' =>[
                'type' => 'ENUM',
                'constraint' => ['cash', 'card', 'qris'],
            ],
            'created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL',
            'updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL'
        ]);
        $this->forge->addForeignKey('cashier_id', 'users', 'id');
        $this->forge->addKey('id', true);
        $this->forge->createTable('tbl_order');
    }

    public function down()
    {
        $this->forge->dropForeignKey('users','cashier_id');
        $this->forge->dropTable('tbl_order');
    }
}
