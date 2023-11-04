<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateActionTable extends Migration
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
            'name'=>[
              'type'=>'VARCHAR',
              'constraint'     => 100,
            ],
            'alias'=>[
                'type'=>'VARCHAR',
                'constraint'     => 100,
            ],
            'is_active'=>[
                'type'          => 'Boolean',
                'default'       => false,
            ],
            'close_status'=>[
                'type'          => 'Boolean',
                'default'       =>  false,
            ],
            'img'=>[
                'type'            => 'Varchar',
                'constraint'      => 256,
                'null'=>true,
            ],
            'rules'=>[
                'type'            =>'Text',
                'null'=>true,
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('actions');
    }

    public function down()
    {
        $this->forge->dropTable('actions',true);
    }
}
