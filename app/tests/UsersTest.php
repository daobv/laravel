<?php

class UsersTest extends TestCase {

    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        // DB::statement('create database coretest;');
        // Artisan::call('migrate');
        //$this->seed();
        // Mail::pretend(true);
    }

    public function tearDown()
    {
        parent::tearDown();
        // DB::statement('drop database coretest;');
    }
    public function testLogin(){

     //$this->call('POST', 'users/login',array('email'=>'dao.hunter@gmail.com','password'=>'12345'));
    }
    public function testRegister(){
    $this->call('POST', 'users/register',array('email'=>'dao.hunter@gmail.com','password'=>'12345','first_name'=>'Dao','last_name'=>'Bui'));

    }
}
