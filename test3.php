<?php

class BaseClient {
  public $firstName;
  public $lastName;
  private $address;
  
  public function getAddress() {
    return $this->address;
  }
  
  public function setAddress($address) {
    $this->address = $address;
  }

  
  public function name() {
    return 'Client: ' . $this->firstName . ' ' . $this->lastName;
  }
}

class Client extends BaseClient {
  public $phone;
  public $email;
  
  public function sendEmail($text) {
     
  }
}

$client1 = new Client;

$client1->firstName = 'Ivan';
$client1->lastName = 'Petrov';
//$client1->address = 'bul.Bulgaria 15';
$client1->setAddress('bul.Bulgaria 15');
$client1->phone = '0878555555';
$client1->email = 'ivan@abv.bg';
$client1->sendEmail('text j j j j');

echo $client1->getAddress();

$client2 = new Client;

$client2->firstName = 'Dimitar';
$client2->lastName = 'Ivanov';
$client2->address = 'bul.Vitosha 20';
$client2->sendEmail('text j j j j');

$client3 = new Client;

$client3->firstName = 'Matia';
$client3->lastName = 'Petrova';
$client3->address = 'bul.Bulgaria 15';

$a = [$client1, $client2, $client3];


//echo $client->name();

var_dump($a);


