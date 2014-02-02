<?php

class DatabaseSeeder extends Seeder {

	public function run()
	{
		Eloquent::unguard();

		$this->call('UserTableSeeder');
		$this->command->info('User table seeded!');

		$this->call('ContestTableSeeder');
		$this->command->info('Contest table seeded!');

		$this->call('ActivityTableSeeder');
		$this->command->info('Activity table seeded!');

		$this->call('TestTableSeeder');
		$this->command->info('Test table seeded!');
	}
}