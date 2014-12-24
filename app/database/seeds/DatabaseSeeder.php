<?php
class DatabaseSeeder extends Seeder {

    public function run()
    {
        $this->call('UserTableSeeder');
        $this->call('UserRolesTableSeeder');
        $this->call('CountriesTableSeeder');
        $this->call('OrganizationsTableSeeder');
        $this->command->info('Seeded Success.!');
    }

}