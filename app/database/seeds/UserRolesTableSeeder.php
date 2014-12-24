<?php
class UserRolesTableSeeder extends Seeder {

    public function run()
    {
        DB::table('user_roles')->delete();
        $userRoles = array(
            array('role_name' => 'Super Administrator','role_key'=>'SA'),
            array('role_name' => 'Brand Owner','role_key'=>'BO'),
            array('role_name' => 'Order Manager','role_key'=>'OM')
        );
        DB::table('user_roles')->insert($userRoles);
    }

}