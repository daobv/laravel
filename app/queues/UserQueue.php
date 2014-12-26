<?php

class UserQueue
{
    public function fire($job, $data)
    {
        // do something with $data['twitter_handle']

        $job->delete();
    }
    public function save($job,$data){

    }
    public function register($job,$data){
        $user = $data['user'];
        $email = $user['email'];

        echo $email."\n";
        /*Mail::send('emails.welcome', array('key' => 'value'), function($message)
        {
            $message->to('foo@example.com', 'John Smith')->subject('Welcome!');
        });*/
        $job->delete();
    }
}