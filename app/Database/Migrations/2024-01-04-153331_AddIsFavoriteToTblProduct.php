<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddIsFavoriteToTblProduct extends Migration
{
    public function up()
    {
        $fields = [
            'is_favorite' =>[
                'type'          => 'boolean',
                'after'         => 'category',
                'default'       => false,
            ],
        ];
        $this->forge->addColumn('tbl_product', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('tbl_product', ['is_favorite']);
    }
}
