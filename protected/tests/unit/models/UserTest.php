<?php
class UserTest extends CDbTestCase
{
	public $fixtures=array();

	public function testProfile()
	{
		$user = User::model()->findByPk(1);

		$this->assertNotNull($user);

		// UserのProfileが取得できること
		$this->assertNotNull($user->profile);
		$this->assertEquals("user1 website", $user->profile->website);


	}

	public function testPosts()
	{
		$user = User::model()->findByPk(1);

		$this->assertNotNull($user);

		// Userが登録したPost(複数)を取得できること
		$this->assertEquals(2, count($user->posts));
		$this->assertEquals("post1 title", $user->posts[0]->title);
		$this->assertEquals("post2 title", $user->posts[1]->title);

	}
}
