<?php

class m120221_203450_first_release extends CDbMigration
{
	public function up()
	{
 		$this->createTable('{{post}}', array(
			'id' => 'pk',
			'title' => 'string NOT NULL',
			'content' => 'text',
			'create_time' => 'datetime',
			'author_id' => 'integer',
 		));
 		$this->createTable('{{post_category}}', array(
			'post_id' => 'integer',
 			'category_id' => 'integer',
 		));
 		$this->createTable('{{category}}', array(
			'id' => 'pk',
 			'name' => 'string NOT NULL',
 		));
 		$this->createTable('{{user}}', array(
			'id' => 'pk',
 			'username' => 'string NOT NULL',
 			'password' => 'string',
 			'email' => 'string',
 		));
 		$this->createTable('{{profile}}', array(
			'owner_id' => 'pk',
 			'photo' => 'binary',
 			'website' => 'string',
 		));

 		$this->addForeignKey('fk_post_owner_id', '{{post}}',
 			'author_id', '{{user}}', 'id', 'CASCADE', 'CASCADE');
 		$this->addForeignKey('fk_profile_owner_id', '{{profile}}',
 			'owner_id', '{{user}}', 'id', 'CASCADE', 'CASCADE');
 		$this->addForeignKey('fk_post_category_1', '{{post_category}}',
 			'post_id', '{{post}}', 'id', 'CASCADE', 'CASCADE');
 		$this->addForeignKey('fk_post_category_2', '{{post_category}}',
 			'category_id', '{{category}}', 'id', 'CASCADE', 'CASCADE');
	}

	public function down()
	{
 		$this->dropForeignKey('fk_post_owner_id', '{{post}}');
 		$this->dropForeignKey('fk_profile_owner_id', '{{profile}}');
 		$this->dropForeignKey('fk_post_category_1', '{{post_category}}');
 		$this->dropForeignKey('fk_post_category_2', '{{post_category}}');

		$this->dropTable('{{post}}');
		$this->dropTable('{{post_category}}');
		$this->dropTable('{{category}}');
		$this->dropTable('{{user}}');
		$this->dropTable('{{profile}}');
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}