<?php
class OrganizationsTableSeeder extends Seeder {

    public function run()
    {
        DB::table('organizations')->delete();

        $organizations = array(
            array('name' => 'SmartOSC','address_1'=>'266 Doi Can Street',
        'city'=>'Hanoi','state'=>'North VN'));
        DB::table('organizations')->insert($organizations);
    }

}