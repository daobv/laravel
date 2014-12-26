<?php
class CampaignQueue
{
    public function fire($job, $data)
    {
        // do something with $data['twitter_handle']

        $job->delete();
    }
    public function save($job,$data){

        $redis = new Redis();
        $redis = Redis::connection();
        $redis->set('email', json_encode($data));
        $name = $redis->get('email');
        echo $name;
        $job->delete();
    }
    public function sendEmail(){

    }
}