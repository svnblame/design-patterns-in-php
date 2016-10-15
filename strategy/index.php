<?php

// Encapsulate and make a family of algorithms interchangeable

interface Logger
{
    public function log($data);
}

// Define a family of algorithms

class LogToFile implements Logger
{
    public function log($data)
    {
        var_dump('Log the data to a FILE: ' . $data);
    }
}

class LogToDatabase implements Logger
{
    public function log($data)
    {
        var_dump('Log the data to a DATABASE: ' . $data);
    }
}

class LogToXWebService implements Logger
{
    public function log($data)
    {
        var_dump('Log the data to a SAAS: ' . $data);
    }
}

// Client usage example
class App
{
    public function log($data, Logger $logger)
    {
        $logger->log($data);
    }
}

$app = new App;
$app->log('Some information here...', new LogToXWebService());
