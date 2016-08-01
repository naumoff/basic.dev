<?php

use yii\db\Migration;

class m160801_141245_create_file_table extends Migration
{

    public function safeUp()
    {
        $this->createTable('file', [
            'id' => $this->bigPrimaryKey(),
	        'user_id'=>$this->bigInteger()->notNull(),
	        'name'=>$this->string(80)->notNull(),
	        'type'=>$this->string(45)->notNull(),
	        'size'=>$this->integer()->notNull(),
	        'description'=>$this->text()->defaultValue(NULL),
	        'date_entered'=>$this->timestamp()->notNull().' DEFAULT CURRENT_TIMESTAMP',
	        'date_updated'=>$this->dateTime()->defaultValue(NULL),
	        'INDEX (user_id ASC)',
	        'INDEX (name ASC)',
	        'INDEX (date_entered ASC)',
        ]);
	    $this->addForeignKey('user_id','file','user_id','user','id','CASCADE','NO ACTION');
    }

    public function safeDown()
    {
    	$this->dropForeignKey('user_id','file');
        $this->dropTable('file');
    }
}
