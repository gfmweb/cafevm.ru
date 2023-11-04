<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateHiroTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'is_active'=>[
                'type'          => 'Boolean',
                'default'       => false,
            ],
            'img'=>[
              'type'            => 'Varchar',
              'constraint'      => 64,
                'null'=>true,
            ],
            'yellow_big'=>[
                'type'            =>'Varchar',
                'constraint'      => 64,
                'null'=>true,
            ],
            'white_big'=>[
                'type'            => 'Varchar',
                'constraint'      => 64,
                'null'=>true,
            ],
            'text'=>[
              'type'             => 'TEXT',
              'null'             => true,
            ],
            'buttons'=>[
                'type'           => 'JSON'
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('hiro');
    }

    public function down()
    {
        $this->forge->dropTable('hiro',true);
    }
}
