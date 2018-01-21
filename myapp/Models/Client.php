<?php
namespace Models;

class Client extends BaseModel implements ModelInterface
{
    protected $table = 'clients';
    protected $fields = ['first_name', 'last_name', 'phone', 'email'];
}