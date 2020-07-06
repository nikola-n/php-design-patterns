<?php

interface Logger
{
    public function log($data);
}

class LogToFile implements Logger
{

    public function log($data)
    {
        var_dump('Log the data to a file.');
    }
}

class LogToDatabase implements Logger
{

    public function log($data)
    {
        var_dump('Log the data to the database.');

    }
}

class LogToXWebService implements Logger
{

    public function log($data)
    {
        var_dump('Log the data to a Saas site.');
    }
}

//class App
//{
//    //this method reference one of the classes (algorithms)
//    public function log($data)
//    {
//        //in the past
//        $logger = new LogToFile();
//
//        $logger->log($data);
//    }
//}
//
//$app = new App;
//
//$app->log('Some Information here');

//Now that we coupled tightly our app class to a specific logger we have no easy way to
//swap this out and this is where the strategy pattern and polymorphism come into play.


//context class
class App
{
    public function log($data, Logger $logger = null)
    {
        $logger = $logger ?: new LogToFile();
        $logger->log($data);
    }
}

$app = new App;

$app->log('some data',new LogToXWebService);