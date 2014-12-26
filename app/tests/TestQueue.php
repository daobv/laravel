<?php

class TestQueue extends TestCase {

    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function setUp() {
        parent::setUp();

        Artisan::call('migrate');
        $this->seed();
        Mail::pretend(true);
    }
    public function tearDown() {
        parent::tearDown();
       // DB::statement('drop database coretest;');
    }
    public function testBasicExample()
    {
        //$environment = App::environment();
        //echo $environment;
       //DB::insert('insert into users (id, email) values (?, ?)', array(1, 'Dayle'));
        Queue::push('UserQueue@save', array('message' => "Con Cac 1234"));
        $redis = new Redis;
       $redis = Redis::connection();
      // $redis->set('test', 'Concac');
       $name = $redis->get('key_test');
        echo $name;
        //$crawler = $this->client->request('GET', '/');
        //$this->assertTrue($this->client->getResponse()->isOk());
       /// Queue::push('SendEmail@send', array('message' => $message));
    }
}
