<?php

use yii\db\Migration;

class m160801_144051_create_junction_table_for_file_and_page extends Migration
{
    public function safeUp()
    {
		$this->createTable('page_has_file',[
			'page_id'=>$this->bigInteger()->notNull(),
			'file_id'=>$this->bigInteger()->notNull(),
			'PRIMARY KEY (page_id, file_id)',
			'INDEX(file_id ASC)',
			'INDEX(page_id ASC)',
			'CONSTRAINT fk_file_id FOREIGN KEY(file_id) REFERENCES file(id)
	          ON DELETE CASCADE ON UPDATE NO ACTION',
			'CONSTRAINT fk_page_id FOREIGN KEY(page_id) REFERENCES page(id)
	          ON DELETE CASCADE ON UPDATE NO ACTION'
			]);
    }

    public function safeDown()
    {
        echo "m160801_144051_create_junction_file_and_page cannot be reverted.\n";
		$this->dropForeignKey('fk_file_id','page_has_file');
	    $this->dropForeignKey('fk_page_id','page_has_file');
	    $this->dropTable('page_has_file');
    }

}
