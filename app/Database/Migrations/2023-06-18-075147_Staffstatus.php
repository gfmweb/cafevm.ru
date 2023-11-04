<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Staffstatus extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'=>[
                    'type'           => 'INT',
                    'constraint'     => 5,
                    'unsigned'       => true,
                    'auto_increment' => true,
                ],
            'status'=>[
                'type'=>'VARCHAR',
                'constraint'     => 100,
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('staffstatus');
    }

    public function down()
    {
        $this->forge->dropTable('staffstatus',true);
    }
}
