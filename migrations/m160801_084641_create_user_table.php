<?php

use yii\db\Migration;
use yii\db\ColumnSchemaBuilder;

/**
 * Handles the creation for table `user`.
 */
class m160801_084641_create_user_table extends Migration
{
    public function safeUp()
    {
		$this->createTable('user',[
			'id'=>$this->integer(11)->notNull(),
			'username' =>$this->string(45)->notNull(),
			'email'=>$this->string(60)->notNull(),
			'pass'=>$this->string(64)->notNull(),
			'type' => "enum('public','author','admin') NOT NULL",
			'date_entered'=>'TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
			'PRIMARY KEY(id)',
			'UNIQUE INDEX username (username ASC)',
			'UNIQUE INDEX email (email ASC)'
		]);
    }

    public function safeDown()
    {
        $this->dropTable('user');
    }
}
