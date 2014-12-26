<?php
class DatabaseSeeder extends Seeder {

    public function run()
    {
      //  $this->call('UsersTableSeeder');
        $this->call('UserRolesTableSeeder');
        $this->call('CountriesTableSeeder');
        $this->call('OrganizationsTableSeeder');
        $this->command->info('Seeded Success.!');
    	$this->call('TweetsTableSeeder');
		$this->call('CampaignsTableSeeder');
	}

}