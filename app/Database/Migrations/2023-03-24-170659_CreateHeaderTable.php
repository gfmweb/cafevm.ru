<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateHeaderTable extends Migration
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
                'type'          => 'Varchar',
                'constraint'    => 100
            ],
            'active' => [
                'type'          => 'Boolean',
                'default'       =>  false
            ],
            'is_ancor' => [
                'type'          => 'Boolean',
                'default'       =>  true
            ],
            'ancor_link' => [
                'type'          => 'Varchar',
                'constraint'    =>  100,
                'null'          =>  true
            ],
            'is_drop' => [
                'type'          => 'Boolean',
                'default'       =>  false
            ],
            'drop_menu' => [
                'type'          => 'Json',
                'null'          =>  true
            ],
            'is_button' => [
                'type'          => 'Boolean',
                'default'       => false
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('header');
    }

    public function down()
    {
        $this->forge->dropTable('header',true);
    }
}
