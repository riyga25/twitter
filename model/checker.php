<?php
ini_set('display_errors', 1);
require_once('TwitterAPIExchange.php');

/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
$settings = array(
    'oauth_access_token' => "your_token",
    'oauth_access_token_secret' => "your_secret_token",
    'consumer_key' => "your_consumer_key",
    'consumer_secret' => "your_consumer_secret"
);

$tweet = '940597594648186881';

$url = 'https://api.twitter.com/1.1/statuses/retweets/'.$tweet.'.json';
$getfield = '?count=100' ;
$requestMethod = 'GET';
$twitter = new TwitterAPIExchange($settings);
$json = $twitter->setGetfield($getfield)
    ->buildOauth($url, $requestMethod)
    ->performRequest();

$tweets = json_decode($json,true);

$i =0;
foreach ($tweets as $user){
    $resize_img = str_replace('_normal', '', $user['user']['profile_image_url']);

    $ppl[$i]['id']=$user['user']['id'];
    $ppl[$i]['name']=$user['user']['name'];
    $ppl[$i]['image']=$resize_img;
    $ppl[$i]['nick']=$user['user']['screen_name'];
    $i++;
}
