<?php
require 'vendor/autoload.php';

use Symfony\Component\DomCrawler\Crawler;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

    $url = getopt("u:");
    $order = getopt("o::");
    $client = new Client();
    $response = $client->get($url['u']);
    $body = $response->getBody();
    $crawler = new Crawler($body);
    $token =bin2hex(random_bytes(16));
    $text = array();
    $bank_list =  $crawler->filter('div.centrado')->each(function ($node, $i) use ($text)  {
        $text =  ['value'=> $node->text()];
        return $text;
    });
    sort($bank_list);
    print_r($bank_list);
?>