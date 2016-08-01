<?php

use yii\db\Migration;

class m160801_093613_create_page extends Migration
{
    public function safeUp()
    {
		$this->createTable('page',[
			'id'=>$this->bigPrimaryKey(),
			'user_id' => $this->bigInteger()->notNull(),
			'live' => $this->boolean()->defaultValue(0),
			'title'=>$this->string(100)->notNull(),
			'content'=>$this->text(),
			'date_updated'=>'TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP',
			'date_published'=>$this->date()->defaultValue(NULL),
			'INDEX (user_id ASC)',
			'INDEX (date_published ASC)'
		]);
	    
	    $this->addForeignKey('fk_page_user','page','user_id','user','id','CASCADE','NO ACTION');
    }

    public function safeDown()
    {
        echo "m160801_093613_create_page cannot be reverted.\n";
		$this->dropForeignKey('fk_page_user','page');
	    $this->dropTable('page');
    }
}
