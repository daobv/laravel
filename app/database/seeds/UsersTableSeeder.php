<?php
class UsersTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        $user = array('email' => 'dao.hunter@gmail.com',
            'password'=>'12345',
            'last_name'=>'Bui','first_name'=>'Dao','power_message'=>'Con Cac',
            'logo'=>'logo.png','privacy'=>'Cac Con',
            'role_id'=>'1','organization_id'=>'1','remember_token'=>'gdeqwdsadasd343545',
            );
        DB::table('users')->insert($user);
    }

}