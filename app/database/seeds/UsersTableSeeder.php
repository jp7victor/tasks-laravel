<?php

class UsersTableSeeder extends Seeder {

	public function run ()
	{

		User::truncate();

		User::create([
			'username' => 'teste',
			'email'	   => 'teste@jp7.com.br',
			'password' => '1234'

		]);

		User::create([
			'username' => 'teste2',
			'email'	   => 'teste2@jp7.com.br',
			'password' => '1234'

		]);
	
	}

}
