<?php

class ExampleTest extends TestCase {

	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */
	public function testBasicExample()
	{
        echo "con cặc, test thành công";
		//$crawler = $this->client->request('GET', '/');

		//$this->assertTrue($this->client->getResponse()->isOk());
	}
    public function testRegister(){
        $this->call('POST', 'users/register',array('email'=>'dao.hunter@gmail.com','password'=>'12345','first_name'=>'Dao','last_name'=>'Bui'));

    }
}
