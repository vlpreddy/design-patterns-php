<?php

class Singleton
{
    private static $instance;

    public static function getInstance()
    {
        if (null === static::$instance) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    protected function __construct()
    {
    }

    private function __clone()
    {
    }

    private function __wakeup()
    {
    }

    public function makeApiCall()
    {
        // Make the API call and return the results

    $opts = array('http' =>
        array(
            'method'  => 'GET',
            'header'  => 'Content-type: application/x-www-form-urlencoded',
        )
    );
    
    $context = stream_context_create($opts);
    $apiUrl = 'http://swapi.dev/api/people/1/';
    $response = file_get_contents($apiUrl, false, $context);
    echo "<pre>" .print_r($response) . "</pre>";
    //return json_decode($response);

    }
}

$singleton = Singleton::getInstance();
$results = $singleton->makeApiCall();


?>