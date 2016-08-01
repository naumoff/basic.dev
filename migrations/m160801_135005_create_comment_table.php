<?php

use yii\db\Migration;

class m160801_135005_create_comment_table extends Migration
{

    public function safeUp()
    {
        $this->createTable('comment', [
            'id' => $this->bigPrimaryKey(),
	        'user_id' => $this->bigInteger()->notNull(),
	        'page_id' => $this->bigInteger()->notNull(),
	        'comment' => $this->text()->notNull(),
	        'date_entered' => $this->timestamp()->notNull().' DEFAULT CURRENT_TIMESTAMP',
	        'INDEX (user_id ASC)',
	        'INDEX (page_id ASC)',
	        'INDEX (date_entered ASC)',
	        'FOREIGN KEY(user_id) REFERENCES user(id)
	          ON DELETE CASCADE ON UPDATE NO ACTION',
	        'FOREIGN KEY(page_id) REFERENCES page(id)
	          ON DELETE CASCADE ON UPDATE NO ACTION',
        ]);
    }


    public function safeDown()
    {
    	$this->dropForeignKey('user_id','comment');
	    $this->dropForeignKey('page_id','comment');
        $this->dropTable('comment');
    }
}
