<?php
class PostTest extends CDbTestCase
{
	public $fixtures=array();

	public function testAuthor()
	{
		$post = Post::model()->findByPk(1);

		$this->assertNotNull($post);

		// Postのauthor(User)を取得できること
		$this->assertNotNull($post->author);
		$this->assertEquals("user1", $post->author->username);

	}

	public function testCategories()
	{
		$post = Post::model()->findByPk(1);

		$this->assertNotNull($post);

		// PostのCategory(複数)を取得できること
		$this->assertEquals(2, count($post->categories));
		$this->assertEquals("category1", $post->categories[0]->name);
		$this->assertEquals("category2", $post->categories[1]->name);

	}
}
