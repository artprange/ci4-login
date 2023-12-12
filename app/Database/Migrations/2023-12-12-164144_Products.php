<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Products extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'ProductId' =>[
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment'=> TRUE
            ],
            'Name' =>[
                'type' => 'VARCHAR',
                'constraint' => 128
            ],
            'Quantity' =>[
                'type' => 'INT'
            ],
            'Amount' =>[
                'type' => 'DOUBLE'
            ]
            ]);
            $this->forge->addKey('ProductId', TRUE);
            $this->forge->createTable('products');
    }

    public function down()
    {
        $this->forge->dropTable('products');
    }
}
