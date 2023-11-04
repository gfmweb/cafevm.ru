<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateStaffTable extends Migration
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
          'name'=>[
              'type'=>'VARCHAR',
              'constraint'     => 100,
          ],
          'password'=>[
              'type'=>'VARCHAR',
              'constraint'     => 100,
          ],
          'must_change'=>[
              'type'=>'BOOLEAN',
              'default' => 1,
          ],
          'role_id'=>[
              'type'=>'INT',
              'constraint'     => 5,
              'unsigned'       => true,
          ],
          'status_id'=>[
              'type'=>'INT',
              'constraint'     => 5,
              'unsigned'       => true,
          ],
          'created_at datetime default current_timestamp',
          'updated_at datetime default current_timestamp on update current_timestamp',
      ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('staff');
    }

    public function down()
    {
        $this->forge->dropTable('staff',true);
    }
}
