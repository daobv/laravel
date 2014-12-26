<?php
class OrganizationsTableSeeder extends Seeder {

    public function run()
    {
        DB::table('organizations')->delete();

        $organizations = array(
            array('name' => 'SmartOSC','address_1'=>'266 Doi Can Street',
        'city'=>'Hanoi','state'=>'North VN','zip'=>'3242','country_id'=>230,
                'phone_number'=>'+843215423545','contact_name'=>'SmartOSC',
                'email'=>'contact@smartosc.com'));
        DB::table('organizations')->insert($organizations);
    }

}