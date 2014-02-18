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

		$this->call('ParticipantTableSeeder');
		$this->command->info('Participant table seeded!');

		$this->call('GroupTableSeeder');
		$this->command->info('Group table seeded!');

		$this->call('MemberTableSeeder');
		$this->command->info('Member table seeded!');

		$this->call('JuryTableSeeder');
		$this->command->info('Jury table seeded!');
	}
}