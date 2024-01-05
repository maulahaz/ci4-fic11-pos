<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTblOrderItem extends Migration
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
            'order_id' => [
                'type' => 'int',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'product_id' => [
                'type' => 'int',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'qty' => [
                'type' => 'INT',
                'default' => 0,
            ],
            'total_price' => [
                'type' => 'INT',
                'default' => 0,
            ],
            'created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL',
            'updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL'
        ]);
        $this->forge->addForeignKey('order_id', 'tbl_order', 'id');
        $this->forge->addForeignKey('product_id', 'tbl_product', 'id');
        $this->forge->addKey('id', true);
        $this->forge->createTable('tbl_order_item');
    }

    public function down()
    {
        $this->forge->dropForeignKey('tbl_order','order_id');
        $this->forge->dropForeignKey('tbl_product','product_id');
        $this->forge->dropTable('tbl_order_item');
    }
}
