<?php
require 'vendor/autoload.php';

use Symfony\Component\DomCrawler\Crawler;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

    $url = getopt("u:");
    $order = getopt("o::");
    $client = new Client();
    try {
        $response = $client->get($url['u'],[['debug'=>false],'headers' =>['Authorization' => '']]);
        die(print_r( $response->getBody()->getContents() ));
    } catch (ClientException $e) {
        // An exception was raised but there is an HTTP response body
        // with the exception (in case of 404 and similar errors)
        $response = $e->getResponse();
        $responseBodyAsString = $response->getBody()->getContents();
        echo $response->getStatusCode() . PHP_EOL;
        echo $responseBodyAsString;
    }
?>