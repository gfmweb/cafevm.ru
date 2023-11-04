<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
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
            'role_id'=>[
                'type'          => 'INT',
                'default'       => 1
            ],
            'name' => [
                'type'          => 'VARCHAR',
                'constraint'    => '100',
            ],
            'phone' => [
                'type'          => 'VARCHAR',
                'constraint'    => '100',
            ],
            'birthday' => [
                'type'          => 'DATE',
                'null'          => true,
            ],
            'deposits' => [
                'type'          => 'INT',
                'default'       => 0,
            ],
            'actions' => [
                'type'          => 'JSON',
            ],
            'bonus' => [
                'type'          => 'INT',
                'default'       => 0,
            ],
            'telegram' => [
                'type'          => 'BIGINT',
                'null'          => true,
                'unique'        => true,
            ],
            'hash'=>[
                'type'          => 'VARCHAR',
                'constraint'    => '100',
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users',true);
    }


}
